<?php

class User extends Controller
{
   public function __construct()
   {
      $this->userModel = $this->model('UserModel');
      $this->OTPModel = $this->model('OTPManagementModel');
      $this->customerModel = $this->model('CustomerModel');
      $this->serviceProviderModel = $this->model('ServiceProviderModel');
      $this->adminModel = $this->model('AdminModel');
   }

   public function signin()
   {

      if ($_SERVER['REQUEST_METHOD'] == 'POST') {
         $data = [
            'email' => trim($_POST['email']),
            'password' => trim($_POST['password']),
            'email_error' => '',
            'password_error' => ''
         ];

         $data['email_error'] = validateEmail($data['email']);
         $data['password_error'] = emptyCheck($data['password']);

         if (empty($data['email_error']) && empty($data['password_error'])) {
            $user = $this->userModel->getUser($data['email']);

            if (!empty($user)) {
               $tooManyAttempts =  $this->checkFailedAttempts($data['email']);

               if ($tooManyAttempts) {
                  $data['email_error'] = "Too many failed attempts.<br>Please reset the password!";
               } else {
                  $hashedPassword = $user->password;

                  if (password_verify($data['password'], $hashedPassword)) {

                     //methanata if ekk gahapn verified nm enna nathm view ekk wait for verification
                     if ($user->vstatus == "pending") {
                        $this->accountState($viewtype = "pending");
                     } elseif ($user->vstatus == "disable") {
                        $this->accountState($viewtype = "disable");
                     } else {
                        $unique_chat_id = $this->userModel->getUserByUniqueID($data['email']);
                        $this->userModel->resetFailedAttempts($data['email']);
                        $this->OTPModel->removeOTP($data['email'], 2);
                        $this->createUserSession($user);
                        Session::setSingle("unique_id", $unique_chat_id->unique_id);
                        $msg = "Active now";
                        $this->userModel->setChatUserOffline($unique_chat_id->unique_id, $msg);
                        $this->provideIntialView();
                     }
                  } else {
                     $this->userModel->incrementFailedAttempts($data['email']);
                     $data['password_error'] = "Incorrect password";
                  }
               }
            } else {
               $data['email_error'] = "User does not exists.";
            }

            if (!empty($data['email_error']) || !empty($data['password_error'])) {
               $this->view('signin', $data);
            }
         } else {
            $this->view('signin', $data);
         }
      } else {
         $data = [
            'email' => '',
            'password' => '',
            'email_error' => '',
            'password_error' => ''
         ];
         $this->view('signin', $data);
      }
   }

   public function resetPassword()
   {
      // If the request is a post
      if ($_SERVER['REQUEST_METHOD'] == 'POST') {
         // Data is loaded
         $data = [
            'email' => trim($_POST['email']),
            'OTP' => trim($_POST['OTP']),
            'newPassword' => trim($_POST['password']),
            'confirmNewPassword' => trim($_POST['confirmPassword']),
            'email_error' => '',
            'OTP_error' => '',
            'newPassword_error' => '',
            'confirmNewPassword_error' => ''
         ];

         // If the OTP is requested
         if ($_POST['action'] == "getOTP") {
            $data['email_error'] = validateEmail($data['email']);

            if (empty($data['email_error'])) {
               // Checking if already registered
               $isLoginExists = $this->userModel->checkLoginExists($data['email']);
               // Handle already registered but inactive customers properly
               if ($isLoginExists) {
                  // If no issues
                  //GET otp
                  $OTP = $this->OTPModel->requestOTP($data['email'], 2);
                  if ($OTP) {
                     // Send otp
                     $SMSResponse = EMAIL::sendPasswordResetSMS($data['email'], $OTP);

                     //If OTP sent successfull then store the OTP
                     if ($SMSResponse) {
                        $this->OTPModel->storeOTP($data['email'], $OTP,  2);
                        Toast::setToast(1, "Password recovery OTP sent!", "Check you email for the OTP.");
                     }
                     // If sending OTP sending fails
                     else {
                        $data['email_error'] = "Check you email again";
                     }
                  } else {
                     $data['email_error'] = "OTP has been sent already";
                  }
               } else {
                  $data['email_error'] = "User does not exists";
               }
            }
            //  providing the view again
            $this->view('resetPassword', $data);
         }
         // If registration is selected
         else if ($_POST['action'] == "save") {
            // Validate everything

            // Validating mobileNumber
            $data['email_error'] = validateEmail($data['email']);
            $data['OTP_error'] = emptyCheck($data['OTP']);

            $data['newPassword_error'] = emptyCheck($data['newPassword']);
            $data['confirmNewPassword_error'] = emptyCheck($data['confirmNewPassword']);

            $uppercase = preg_match('@[A-Z]@', $data['newPassword']);
            $lowercase = preg_match('@[a-z]@', $data['newPassword']);
            $number    = preg_match('@[0-9]@', $data['newPassword']);
            $specialChars = preg_match('@[^\w]@', $data['newPassword']);

            if (!$uppercase || !$lowercase || !$number || !$specialChars || strlen($data['newPassword']) < 8) {
               $data['newPassword_error'] = "Password should be at least 8 characters in length and should include at least one upper case letter, 
                                    one number, and one special character.";
            }

            if (empty($data['newPassword_error']) && empty($data['confirmNewPassword_error']) && $data['newPassword'] != $data['confirmNewPassword']) {
               $data['confirmNewPassword_error'] = "New Passwords dont't match";
            }

            if (
               empty($data['email_error']) && empty($data['OTP_error']) && empty($data['newPassword_error']) && empty($data['confirmNewPassword_error'])
            ) {
               // OTP verification
               $isVerified = $this->OTPModel->verifyOTP($data['email'], $data['OTP'], 2);

               //If OTP is not requested or previously-used or incorrect
               if ($isVerified == 0) {
                  $data['OTP_error'] = "Incorrect OTP";
                  $this->view('resetPassword', $data);
               } else if ($isVerified == 2) {
                  $data['OTP_error'] = "Please generate a new OTP";
                  $this->view('resetPassword', $data);
               } else {
                  $this->userModel->beginTransaction();
                  $this->userModel->updatePassword($data['email'], $data['newPassword']);
                  $this->userModel->resetFailedAttempts($data['email']);
                  $this->OTPModel->removeOTP($data['email'], 2);
                  $this->userModel->commit();

                  //System log
                  $user = $this->userModel->getUser($data['email']);
                  // die($this->getUserData($user)[1]);
                  Toast::setToast(1, "Password recovery successful!", "Sign in using new password.");
                  header('location: ' . URLROOT . '/user/signin');
               }
            } else {
               $this->view('resetPassword', $data);
            }
         } else {
            die("Something went wrong");
         }
      } else {
         $data = [
            'email' => '',
            'OTP' => '',
            'newPassword' => '',
            'confirmNewPassword' => '',
            'email_error' => '',
            'OTP_error' => '',
            'newPassword_error' => '',
            'confirmNewPassword_error' => ''
         ];
         $this->view('resetPassword', $data);
      }
   }

   private function createUserSession($user)
   {
      Session::setBundle(
         "user",
         [
            "email" => $user->email,
            "type" => $user->user_type,
            "id" => $this->getUserData($user)[0],
            "name" =>  $this->getUserData($user)[1],
            "password" => $user->password
         ]
      );
   }

   public function provideIntialView()
   {
      if (Session::hasLoggedIn()) {
         switch (Session::getUser("type")) {
            case 1:
               redirect('superadmin/dashboard');
               break;
            case 2:
               redirect('adminDashboard/home');
               break;
            case 3:
               redirect('customerDashboard/home');
               break;
            case 4:
               redirect('hotelDashboard/home');
               break;
            case 5:
               redirect('decoDashboard/home');
               break;
            case 6:
               redirect('bandDashboard/home');
               break;
            case 7:
               redirect('photographyDashboard/home');
               break;
            default:
               redirect('User/signin');
               break;
         }
      } else {
         redirect('home');
      }
   }

   public function getUserData($user)
   {
      switch ($user->user_type) {
         case 1:
         case 2:
            return $this->adminModel->getAdminUserData($user->email);
            break;
         case 3:
            return $this->customerModel->getCustomerUserData($user->email);
            break;
         case 4:
            return $this->serviceProviderModel->getServiceProviderUserData($user->email);
            break;
         case 5:
            return $this->serviceProviderModel->getServiceProviderUserData($user->email);
            break;
         case 6:
            return $this->serviceProviderModel->getServiceProviderUserData($user->email);
            break;
         case 7:
            return $this->serviceProviderModel->getServiceProviderUserData($user->email);
            break;
         default:
            return [null, null];
            break;
      }
   }

   public function checkFailedAttempts($email)
   {
      $allowedMaxFailedAttempts = 3; // consecutive
      $currentFailedAttempts = $this->userModel->getFailedAttempts($email);

      if ($currentFailedAttempts >= $allowedMaxFailedAttempts)
         return true;
      else
         return false;
   }


   public function signout()
   {
      $msg = "Offline now";
      $this->userModel->setChatUserOffline(Session::get("unique_id"), $msg);
      Session::clear('user');
      session_destroy();
      redirect('User/signin');
   }

   // public function getUserHeaderImg()
   // {
   //    if (Session::getUser("type") == 6)
   //    {
   //       $result = $this->customerModel->getCustomerByMobileNo(Session::getUser("mobileNo"))->imgPath;
   //       if ($result)
   //       {
   //          $path = 'http://localhost/TruEvent_Horizons/public/images/customerImgs/' . $result;
   //       }
   //       else
   //       {
   //          $path = 'http://localhost/TruEvent_Horizons/public/images/customerImgs/male.jpg';
   //       }
   //    }
   //    else
   //    {
   //       $result = Session::getUser("img");
   //       // $this->staffModel->getStaffUserData(Session::getUser("mobileNo"));
   //       // $result = 'hhhh';
   //       if ($result)
   //       {
   //          $path = 'http://localhost/TruEvent_Horizons/public/images/staffImgs/' . $result;
   //       }
   //       else
   //       {
   //          $path = 'http://localhost/TruEvent_Horizons/public/images/staffImgs/male.jpg';
   //       }
   //    }

   //    header('Content-Type: application/json; charset=utf-8');
   //    print_r(json_encode($path));
   // }

   public function accountState($type)
   {
      if ($type == "disable") {
         $this->view('accsuspend', '');
      } elseif ($type == "pending") {
         $this->view('verification', '');
      }
   }


   public function policy()
   {
      $this->view('policy', '');
   }
}
