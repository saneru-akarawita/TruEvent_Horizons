<?php
class Customer extends Controller
{
   public function __construct()
   {
      $this->customerModel = $this->model('CustomerModel');
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
            'contactno' => trim($_POST['contactno']),
            'district' => trim($_POST['district']),
            'fname_error' => '',
            'lname_error' => '',
            'email_error' => '',
            'OTP_error' => '',
            'password_error' => '',
            'confirmPassword_error' => '',
            'contactno_error' => '',
            'district_error' => ''
         ];

         // If the OTP is requested
         if ($_POST['action'] == "getOTP")
         {
            // Validating email
            $data['email_error'] = validateEmail($data['email']);
            if (empty($data['email_error']))
            {
               // Checking if already registered
               $isUserExists = $this->customerModel->checkCustomerExists($data['email']);

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
            $this->view('registerCustomer', $data);
         }
         // If registration is selected
         else if ($_POST['action'] == "register")
         {
            // Validate everything
            $data['fname_error'] = emptyCheck($data['fname']);
            $data['lname_error'] = emptyCheck($data['lname']);
            $data['email_error'] = validateEmail($data['email']);
            $data['contactno_error'] = validateContactno($data['contactno']);
            $data['OTP_error'] = emptyCheck($data['OTP']);
            $data['district_error'] = emptyCheck($data['district']);

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
               empty($data['OTP_error']) && empty($data['password_error']) && empty($data['confirmPassword_error']) 
               && empty($data['district_error']) && empty($data['contactno_error'])
            )
            {
               // OTP verification
               $isVerified = $this->OTPModel->verifyOTP($data['email'], $data['OTP'], 1);

               //If OTP is not requested or previously-used or incorrect
               if ($isVerified == 0)
               {
                  $data['OTP_error'] = "Incorrect OTP";
                  $this->view('registerCustomer', $data);
               }
               else if ($isVerified == 2)
               {
                  $data['OTP_error'] = "Please generate a new OTP";
                  $this->view('registerCustomer', $data);
               }
               else
               {
                  $ran_id = rand(time(), 100000000);
                  $status = "Active now";
                  $this->userModel->beginTransaction();
                  $this->userModel->registerUser($data['email'], $data['password'], 3);
                  $this->userModel->registerChatUser($ran_id,$data['fname'],$data['lname'],$data['email'],$status);
                  $this->customerModel->registerCustomer($data);
                  $this->OTPModel->removeOTP($data['email'], 1);

                  if (Session::getUser("email"))
                  {
                     Toast::setToast(1, "Customer account created Successful!", '');
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
               $this->view('registerCustomer', $data);
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
            'contactno' => '',
            'district' => '',
            'fname_error' => '',
            'lname_error' => '',
            'email_error' => '',
            'OTP_error' => '',
            'password_error' => '',
            'confirmPassword_error' => '',
            'contactno_error' => '',
            'district_error' => ''
         ];
         $this->view('registerCustomer', $data);
      }
   }

   public function changePassword()
   {
      Session::validateSession([3]);
      $result = $this->userModel->getUser(Session::getUser("email"));
      $hashedPassword = $result->password;
      if ($_SERVER['REQUEST_METHOD'] == 'POST')
      {
         $data = [
            'email' => $result->email,
            'currentPassword' => trim($_POST['currentPassword']),
            'newPassword1' => trim($_POST['password1']),
            'newPassword2' => trim($_POST['password2']),
            'currentPassword_error' => '',
            'newPassword_error' => '',
            'confirmPassword_error' => ''
         ];

         $data['currentPassword_error'] = emptyCheck($data['currentPassword']);
         $data['newPassword_error'] = emptyCheck($data['newPassword1']);
         $data['confirmPassword_error'] = emptyCheck($data['newPassword2']);
         if (!empty($data['currentPassword_error']) || !empty($data['newPassword_error']) || !empty($data['confirmPassword_error'])) //have errors
         {
            $this->view('customer/cust_profileSettings', $data);
         }

         else //no errors
         {
            if (password_verify($data['currentPassword'], $hashedPassword))
            {
               if ($data['newPassword1'] != $data['newPassword2'])
               {
                  $data['confirmPassword_error'] = "New Passwords dont't match";
                  $this->view('customer/cust_profileSettings', $data);
               }
               if (empty($data['currentPassword_error']) && empty($data['newPassword_error']) && empty($data['confirmPassword_error']))
               {
                  $this->userModel->updatePassword($data['email'], $data['newPassword1']);
                  Toast::setToast(1, "Password changed successfully", "");
                  $this->view('customer/cust_profileSettings', $data);
               }
            }
            else
            {
               $data['currentPassword_error'] = "Incorrect password";
               $this->view('customer/cust_profileSettings', $data);
            }

            $this->view('customer/cust_profileSettings', $data);
         }
      }
      else
      {
         $data = [
            'email' => $result->email,
            'currentPassword' => '',
            'newPassword1' => '',
            'newPassword2' => '',
            'currentPassword_error' => '',
            'newPassword_error' => '',
            'confirmPassword_error' => ''
         ];
         $this->view('customer/cust_profileSettings', $data=[]);
      }
   }

   public function getHashForPayment(){
      $merchant_id="1222593";
      $order_id=$_POST['order_id'];
      $amount=$_POST['amount'];
      $currency="LKR";
      $merchant_secret="MTM1MTk0NTU2Mzc3NzcxODU4NTM5MzE3OTIzOTgyNTcxNjM3NTk=";
      $hash = strtoupper(
         md5(
               $merchant_id . 
               $order_id . 
               number_format($amount, 2, '.', '') . 
               $currency .  
               strtoupper(md5($merchant_secret)) 
         ) 
      );
      echo $hash;
   }
   
}
