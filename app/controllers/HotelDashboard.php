<?php

// Session validation is only applied to the constructor
// bcz a dashboard controller 
class HotelDashboard extends Controller
{
   public function __construct()
   {
      Session::validateSession([4]);
      $this->reservationModel = $this->model('ReservationModel');
      $this->customerModel = $this->model('CustomerModel');
      $this->serviceProviderModel = $this->model('ServiceProviderModel');
      $this->adminModel = $this->model('AdminModel');
      $this->userModel = $this->model('UserModel');
      $this->hotelModel = $this->model('HotelModel');
   }

   public function home()
   {
      $this->view('hotelManager/home-hotel');
   }
   public function addservices()
   {
      redirect('HotelService/addNewService');
   }
   public function viewservices()
   {
      redirect('HotelService/viewAllServices');
   }

   public function profileSettings()
   {
      Session::validateSession([4]);
      $result = $this->userModel->getUser(Session::getUser("email"));
      $profile_id = Session::getUser("id");
      $profiledata = $this->serviceProviderModel->getServiceProviderDetailsByID($profile_id);
      $profiledata = $this->serviceProviderModel->getServiceProviderDetailsByID($profile_id);
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
            $this->view('hotelManager/hotel_profileSettings', $resArr);
         }

         else //no errors
         {
            if (password_verify($data['currentPassword'], $hashedPassword))
            {
               if ($data['newPassword1'] != $data['newPassword2'])
               {
                  $data['confirmPassword_error'] = "New Passwords dont't match";
                  $resArr = array($data,$profiledata);
                  $this->view('hotelManager/hotel_profileSettings', $resArr);
               }
               if (empty($data['currentPassword_error']) && empty($data['newPassword_error']) && empty($data['confirmPassword_error']))
               {
                  $this->userModel->updatePassword($data['email'], $data['newPassword1']);
                  Toast::setToast(1, "Password changed successfully", "");
                  $this->view('hotelManager/hotel_profileSettings', $resArr);
               }
            }
            else
            {
               $data['currentPassword_error'] = "Incorrect password";
               $resArr = array($data,$profiledata);
               $this->view('hotelManager/hotel_profileSettings', $resArr);
            }

            $this->view('hotelManager/hotel_profileSettings', $resArr);
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
         $this->view('hotelManager/hotel_profileSettings', $resArr);
      }
   }

   public function chat()
   {
      $unique_id = Session::get("unique_id");
      $users = $this->hotelModel->getChatUsers($unique_id);
      $this->view('hotelManager/chat_users', $users);
   }

   public function chatWith()
   {
      if(isset($_GET['user_id'])){
         $user_id=trim($_GET['user_id']);
      }
      else
      $user_id=0;
      
      $user = $this->hotelModel->getUserByUserId($user_id);
      $this->view('hotelManager/chat', $user);
   }

   public function payment()
   {
      $this->view('hotelManager/payment', '');
   }

   public function reports()
   {
      $this->view('hotelManager/Reports', '');
   }

   public function reservationDetails()
   {
         $spID = Session::getUser("id");
         if(isset($_GET['rv_id'])){
            $rvID=$_GET['rv_id'];
         }
         $hoteldetailslist = $this->hotelModel->getServicesByServiceProvider($spID);
         $reservationsList = $this->reservationModel->getReservationDetails();
         $customerlist = $this->customerModel->getCustomerDetails();
         $result = array($spID,$rvID,$reservationsList,$customerlist,$hoteldetailslist);
         $this->view('hotelManager/view-reservation',$result);
   }

   public function reservationLog()
   {
         $spID = Session::getUser("id");

         $reservationsList = $this->reservationModel->getReservationDetails();
         $customerlist = $this->customerModel->getCustomerDetails();
         $result = array($spID, $reservationsList, $customerlist);
         $this->view('hotelManager/Reservationlog',$result);
   }


   public function editService()
   {
      $this->view('hotelManager/edit-service', '');
   }

   public function logout()
   {
      redirect('User/signout');
   }

}
