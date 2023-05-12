<?php
class ServiceProvider extends Controller
{
   public function __construct()
   {
      $this->serviceProviderModel = $this->model('ServiceProviderModel');
      $this->userModel = $this->model('userModel');
      $this->OTPModel = $this->model('OTPManagementModel');
   }

   public function register()
   {
      // If the request is a post
      if ($_SERVER['REQUEST_METHOD'] == 'POST')
      {
         $targetDir = APPROOT."/../public/images/uploadimages/proofdoc/";
         $fileName = basename($_FILES["proofdoc"]["name"]);
         $completePath = $targetDir . $fileName;
         $fileType = pathinfo($completePath,PATHINFO_EXTENSION);
         $allowTypes = array('jpg','png','jpeg','gif','pdf');

         $filename_without_ext = substr($fileName, 0, strrpos($fileName, "."));

         $uniqueFileName = $filename_without_ext.time().".".$fileType;
         $targetFilePath = $targetDir . $uniqueFileName;
         $statusMsg = '';

         // Data is loaded
         $data = [
    
            'business_id' => trim($_POST['business_id']),
            'company_name' => trim($_POST['company_name']),
            'email' => trim($_POST['email']),
            'OTP' => trim($_POST['OTP']),
            'password' => trim($_POST['password']),
            'confirmPassword' => trim($_POST['confirmPassword']),
            'accname' => trim($_POST['accname']),
            'accnumber' => trim($_POST['accnumber']),
            'bank' => trim($_POST['bank']),
            'branch' => trim($_POST['branch']),
            'district' => trim($_POST['district']),
            'contactno' => trim($_POST['contactno']),
            'service_type' => trim($_POST['service_type']),
            'travel_flag' => trim($_POST['travel_flag']),
            'business_id_error' => '',
            'companyname_error' => '',
            'email_error' => '',
            'proofdoc_error' => $statusMsg,
            'OTP_error' => '',
            'password_error' => '',
            'confirmPassword_error' => '',
            'accName_error' => '',
            'accNumber_error' => '',
            'bank_error' => '',
            'branch_error' => '',
            'district_error' => '',
            'contactno_error' => '',
            'service_type_error' => '',
            'travel_flag_error' => ''
         ];

         // If the OTP is requested
         if ($_POST['action'] == "getOTP")
         {
            // Validating email
            $data['email_error'] = validateEmail($data['email']);
            if (empty($data['email_error']))
            {
               // Checking if already registered
               $isUserExists = $this->serviceProviderModel->checkServiceProviderExists($data['email']);

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
            $this->view('registerServiceProvider', $data);
         }
         // If registration is selected
         else if ($_POST['action'] == "register")
         {
            // Validate everything
            $data['business_id_error'] = emptyCheck($data['business_id']);
            $data['companyname_error'] = emptyCheck($data['company_name']);
            $data['email_error'] = validateEmail($data['email']);
            $data['contactno_error'] = validateContactno($data['contactno']);
            $data['OTP_error'] = emptyCheck($data['OTP']);
            $data['accName_error'] = validateNames($data['accname']);
            $data['accNumber_error'] = emptyCheck($data['accnumber']);
            $data['bank_error'] = emptyCheck($data['bank']);
            $data['branch_error'] = emptyCheck($data['branch']);
            $data['district_error'] = districtValidation($data['district']);
            $data['service_type_error'] = emptyCheck($data['service_type']);
            $data['travel_flag_error'] = emptyCheck($data['travel_flag']);
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
               empty($data['business_id_error']) && empty($data['companyname_error']) && empty($data['email_error']) && empty($data['proofdoc']) &&
               empty($data['OTP_error']) && empty($data['password_error']) && empty($data['confirmPassword_error']) && 
               empty($data['accName_error']) && empty($data['accNumber_error']) && empty($data['bank_error']) && empty($data['branch_error'])
               && empty($data['contactno_error']) && empty($data['district_error']) && empty($data['service_type_error']) && empty($data['travel_flag_error'])
            )
            {
               // OTP verification
               $isVerified = $this->OTPModel->verifyOTP($data['email'], $data['OTP'], 1);

               //If OTP is not requested or previously-used or incorrect
               if ($isVerified == 0)
               {
                  $data['OTP_error'] = "Incorrect OTP";
                  $this->view('registerServiceProvider', $data);
               }
               else if ($isVerified == 2)
               {
                  $data['OTP_error'] = "Please generate a new OTP";
                  $this->view('registerServiceProvider', $data);
               }
               else
               {
                  if(in_array($fileType, $allowTypes)){
                     // Upload file to server
                     if(move_uploaded_file($_FILES["proofdoc"]["tmp_name"], $targetFilePath)){
                           $statusMsg = '';
                           
                     }else{
                           $statusMsg = "Sorry, there was an error uploading your file.";
                     }
                  }else{
                     $statusMsg = 'Sorry, only JPG, JPEG, PNG, GIF, & PDF files are allowed to upload.';
                  }
                  // $ran_id = rand(time(), 100000000);
                  // $status = "Active now";
                  $this->userModel->beginTransaction();
                  $this->userModel->registerUser($data['email'], $data['password'], $data['service_type']);
                  // $this->userModel->registerChatUser($ran_id,$data['company_name'],'',$data['email'],$status);
                  $this->serviceProviderModel->registerServiceProvider($data);
                  $this->serviceProviderModel->addProofDoc($data['email'], $uniqueFileName);
                  $this->OTPModel->removeOTP($data['email'], 1);

                  //System log
                  if (Session::getUser("email"))
                  {
                     Toast::setToast(1, "Service Provider account created Successful!", '');
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
               $this->view('registerServiceProvider', $data);
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
            'business_id' => '',
            'company_name' => '',
            'email' => '',
            'OTP' => '',
            'password' => '',
            'confirmPassword' => '',
            'accname' => '',
            'accnumber' => '',
            'bank' => '',
            'branch' => '',
            'district' => '',
            'contactno' => '',
            'service_type' => '',
            'travel_flag' => '',
            'business_id_error' => '',
            'companyname_error' => '',
            'email_error' => '',
            'proofdoc_error' => '',
            'OTP_error' => '',
            'password_error' => '',
            'confirmPassword_error' => '',
            'accName_error' => '',
            'accNumber_error' => '',
            'bank_error' => '',
            'branch_error' => '',
            'district_error' => '',
            'contactno_error' => '',
            'service_type_error' => '',
            'travel_flag_error' => ''
         ];
         $this->view('registerServiceProvider', $data);
      }
   }
   
}
