<?php
class Superadmin extends Controller
{
   public function __construct()
   {
      Session::validateSession([1]);
      $this->userModel = $this->model('UserModel');
   }

   public function dashboard()
   {
      if($_SERVER['REQUEST_METHOD'] == 'POST'){

         $data = [
            'email' => trim($_POST['email']),
            'email_error' => '',
         ];

         $data['email_error'] = validateEmail($data['email']);

         if (empty($data['email_error']))
         {
            $user = $this->userModel->getUser($data['email']);

            if (!$user)
            {
               $SMSResponse = EMAIL::sendAdminRgisterFormEmail($data['email']);

               if ($SMSResponse)
               {
                  Toast::setToast(1, "Admin Registration Link sent!", "Thank you.");
                  $this->view('superAdmin/superadmindashboard',$data);
               }
               else
               {
                  $data['email_error'] = "Check you email again";
               }
            }

            else{
               $data['email_error'] ="Email Already Exists";
            }

            if (!empty($data['email_error']))
            {
               $this->view('superAdmin/superadmindashboard',$data);
            }
         }else{
            $this->view('superAdmin/superadmindashboard',$data);
         }
         
      }
      
      else
      {
         $data = [
            'email' => '',
            'email_error' => '',
         ];
         $this->view('superAdmin/superadmindashboard',$data);
      }
      
   }
}