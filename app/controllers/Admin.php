<?php
class Admin extends Controller
{
   public function __construct()
   {
      $this->adminModel = $this->model('AdminModel');
      $this->userModel = $this->model('userModel');
      $this->OTPModel = $this->model('OTPManagementModel');
   }

   public function register()
   {
      // If the request is a post
      if ($_SERVER['REQUEST_METHOD'] == 'POST')
      {
         // Data is loaded
         $data = [
            'fname' => trim($_POST['fname']),
            'lname' => trim($_POST['lname']),
            'email' => trim($_POST['email']),
            'OTP' => trim($_POST['OTP']),
            'password' => trim($_POST['password']),
            'confirmPassword' => trim($_POST['confirmPassword']),
            'accname' => trim($_POST['accname']),
            'accnumber' => trim($_POST['accnumber']),
            'bank' => trim($_POST['bank']),
            'branch' => trim($_POST['branch']),
            'fname_error' => '',
            'lname_error' => '',
            'email_error' => '',
            'OTP_error' => '',
            'password_error' => '',
            'confirmPassword_error' => '',
            'accName_error' => '',
            'accNumber_error' => '',
            'bank_error' => '',
            'branch_error' => ''
         ];

         // If the OTP is requested
         if ($_POST['action'] == "getOTP")
         {
            // Validating email
            $data['email_error'] = validateEmail($data['email']);
            if (empty($data['email_error']))
            {
               // Checking if already registered
               $isUserExists = $this->adminModel->checkAdminExists($data['email']);

               if ($isUserExists)
               {
                  $data['email_error'] = "Email is already registered";
               }
               else
               { 
                  $OTP = $this->OTPModel->requestOTP($data['email'], 1);
                  if ($OTP)
                  {
                     // Send otp
                     $SMSResponse = EMAIL::sendEmailVerifySMS($data['email'], $OTP);

                     //If OTP sent successfull then store the OTP
                     if ($SMSResponse)
                     {
                        $this->OTPModel->storeOTP($data['email'], $OTP, 1);
                        Toast::setToast(1, "Verification OTP sent!", "Check you email for the OTP.");
                     }
                     // If sending OTP sending fails
                     else
                     {
                        $data['email_error'] = "Check you email again";
                     }
                  }

                  // The sent pin is not timeout
                  else
                  {
                     $data['email_error'] = "OTP has been sent already";
                  }
               }
            }
            //  providing the view again
            $this->view('registerAdmin', $data);
         }
         // If registration is selected
         else if ($_POST['action'] == "register")
         {
            // Validate everything
            $data['fname_error'] = emptyCheck($data['fname']);
            $data['lname_error'] = emptyCheck($data['lname']);
            $data['email_error'] = validateEmail($data['email']);
            $data['OTP_error'] = emptyCheck($data['OTP']);
            $data['accName_error'] = emptyCheck($data['accname']);
            $data['accNumber_error'] = emptyCheck($data['accnumber']);
            $data['bank_error'] = emptyCheck($data['bank']);
            $data['branch_error'] = emptyCheck($data['branch']);
            // TODO: Check Password strength here
            $data['password_error'] = emptyCheck($data['password']);
            $data['confirmPassword_error'] = emptyCheck($data['confirmPassword']);
            if (empty($data['password_error']) && empty($data['confirmPassword_error']) && $data['password'] != $data['confirmPassword'])
            {
               $data['confirmPassword_error'] = "Passwords dont't match";
            }

            $uppercase = preg_match('@[A-Z]@', $data['password']);
            $lowercase = preg_match('@[a-z]@', $data['password']);
            $number    = preg_match('@[0-9]@', $data['password']);
            $specialChars = preg_match('@[^\w]@', $data['password']);

            if(!$uppercase || !$lowercase || !$number || !$specialChars || strlen($data['password']) < 8) {
               $data['password_error'] = "Password should be at least 8 characters in length and should include at least one upper case letter, 
                                    one number, and one special character.";
            }

            if (
               empty($data['fname_error']) && empty($data['lname_error']) && empty($data['email_error']) &&
               empty($data['OTP_error']) && empty($data['password_error']) && empty($data['confirmPassword_error']) && 
               empty($data['accName_error']) && empty($data['accNumber_error']) && empty($data['bank_error']) && empty($data['branch_error'])
            )
            {
               // OTP verification
               $isVerified = $this->OTPModel->verifyOTP($data['email'], $data['OTP'], 1);

               //If OTP is not requested or previously-used or incorrect
               if ($isVerified == 0)
               {
                  $data['OTP_error'] = "Incorrect OTP";
                  $this->view('registerAdmin', $data);
               }
               else if ($isVerified == 2)
               {
                  $data['OTP_error'] = "Please generate a new OTP";
                  $this->view('registerAdmin', $data);
               }
               else
               {
                  $ran_id = rand(time(), 100000000);
                  $status = "Active now";
                  $this->userModel->beginTransaction();
                  $this->userModel->registerUser($data['email'], $data['password'], 2);
                  $this->userModel->registerChatUser($ran_id,$data['fname'],$data['lname'],$data['email'],$status);
                  $this->adminModel->registerAdmin($data);
                  $this->OTPModel->removeOTP($data['email'], 1);

                  //System log
                  if (Session::getUser("email"))
                  {
                     Toast::setToast(1, "Admin account created Successful!", '');
                  }
                  else
                  {
                     Toast::setToast(1, "Registration Successful!", "You can login to your account now.");
                  }

                  $this->userModel->commit();
                  header('location: ' . URLROOT . '/user/signin');
               }
            }
            else
            {
               $this->view('registerAdmin', $data);
            }
         }
         else
         {
            die("Something went wrong");
         }
      }
      else
      {
         $data = [
            'fname' => '',
            'lname' => '',
            'email' => '',
            'OTP' => '',
            'password' => '',
            'confirmPassword' => '',
            'accname' => '',
            'accnumber' => '',
            'bank' => '',
            'branch' => '',
            'fname_error' => '',
            'lname_error' => '',
            'email_error' => '',
            'OTP_error' => '',
            'password_error' => '',
            'confirmPassword_error' => '',
            'accName_error' => '',
            'accNumber_error' => '',
            'bank_error' => '',
            'branch_error' => ''
         ];
         $this->view('registerAdmin', $data);
      }
   }
   
}
