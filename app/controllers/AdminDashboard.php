<?php

// Session validation is only applied to the constructor
// bcz a dashboard controller 
class AdminDashboard extends Controller
{
   public function __construct()
   {
      Session::validateSession([2]);
      $this->customerModel = $this->model('CustomerModel');
      $this->serviceProviderModel = $this->model('ServiceProviderModel');
      $this->adminModel = $this->model('AdminModel');
      $this->userModel = $this->model('UserModel');
   }

   public function home()
   {
      $this->view('admin/admin-home');
   }
   public function addpackages()
   {
      redirect('Packages/addNewPackage');
   }
   public function viewpackages()
   {
      redirect('Packages/viewAllPackages');
   }

   public function profileSettings()
   {
      Session::validateSession([2]);
      $result = $this->userModel->getUser(Session::getUser("email"));
      $profile_id = Session::getUser("id");
      $profiledata = $this->adminModel->getAdminDetailsByID($profile_id);
      $hashedPassword = $result->password;

      if ($_SERVER['REQUEST_METHOD'] == 'POST')
      {
         $data = [
            'email' => $result->email,
            'currentPassword' => trim($_POST['currentpw']),
            'newPassword1' => trim($_POST['newpw']),
            'newPassword2' => trim($_POST['confirmnewpw']),
            'currentPassword_error' => '',
            'newPassword_error' => '',
            'confirmPassword_error' => ''
         ];

         $data['currentPassword_error'] = emptyCheck($data['currentPassword']);
         $data['newPassword_error'] = emptyCheck($data['newPassword1']);
         $data['confirmPassword_error'] = emptyCheck($data['newPassword2']);

         $resArr = array($data,$profiledata);

         if (!empty($data['currentPassword_error']) || !empty($data['newPassword_error']) || !empty($data['confirmPassword_error'])) //have errors
         {
            $this->view('admin/admin_profileSettings', $resArr);
         }

         else //no errors
         {
            if (password_verify($data['currentPassword'], $hashedPassword))
            {
               if ($data['newPassword1'] != $data['newPassword2'])
               {
                  $data['confirmPassword_error'] = "New Passwords dont't match";
                  $resArr = array($data,$profiledata);
                  $this->view('admin/admin_profileSettings', $resArr);
               }
               if (empty($data['currentPassword_error']) && empty($data['newPassword_error']) && empty($data['confirmPassword_error']))
               {
                  $this->userModel->updatePassword($data['email'], $data['newPassword1']);
                  Toast::setToast(1, "Password changed successfully", "");
                  $this->view('admin/admin_profileSettings', $resArr);
               }
            }
            else
            {
               $data['currentPassword_error'] = "Incorrect password";
               $resArr = array($data,$profiledata);
               $this->view('admin/admin_profileSettings', $resArr);
            }

            $this->view('admin/admin_profileSettings', $resArr);
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

         $resArr = array($data,$profiledata);
         $this->view('admin/admin_profileSettings', $resArr);
      }
   }

   public function reviewComplaints(){
      $complaints = $this->adminModel->getFeedback();
      $this->view('admin/reviewComplaints', $complaints);
   }

   public function chat()
   {
      $unique_id = Session::get("unique_id");
      $users = $this->adminModel->getChatUsers($unique_id);
      $this->view('admin/chat_users', $users);
   }

   public function chatWith()
   {
      if(isset($_GET['user_id'])){
         $user_id=trim($_GET['user_id']);
      }
      else
      $user_id=0;
      
      $user = $this->adminModel->getUserByUserId($user_id);
      $this->view('admin/chat', $user);
   }

   public function payment()
   {
      $this->view('admin/payment', '');
   }

   public function reports()
   {
      $this->view('admin/Reports', '');
   }

   public function reservationLog()
   {
      $this->view('admin/Reservationlog', '');
   }

   public function generateReports()
   {
      $this->view('admin/generate-reports', '');
   }

   public function logout()
   {
      redirect('User/signout');
   }

}
