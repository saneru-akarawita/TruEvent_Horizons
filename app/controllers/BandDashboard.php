<?php

// Session validation is only applied to the constructor
// bcz a dashboard controller 
class BandDashboard extends Controller
{
   public function __construct()
   {
      Session::validateSession([6]);
      $this->reservationModel = $this->model('ReservationModel');
      $this->customerModel = $this->model('CustomerModel');
      $this->serviceProviderModel = $this->model('ServiceProviderModel');
      $this->adminModel = $this->model('AdminModel');
      $this->userModel = $this->model('UserModel');
      $this->bandModel = $this->model('BandModel');
      $this->hotelModel = $this->model('HotelModel');
      $this->decoModel = $this->model('DecoModel');
      $this->photographyModel = $this->model('PhotographyModel');
   }

   public function home()
   {
      $this->view('band/homepage');
   }
   public function addservices()
   {
      redirect('BandService/addNewService');
   }
   public function viewservices()
   {
      redirect('BandService/viewAllServices');
   }

   public function profileSettings()
   {
      Session::validateSession([6]);
      $result = $this->userModel->getUser(Session::getUser("email"));
      $profile_id = Session::getUser("id");
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
            $this->view('band/band_profileSettings', $resArr);
         }

         else //no errors
         {
            if (password_verify($data['currentPassword'], $hashedPassword))
            {
               if ($data['newPassword1'] != $data['newPassword2'])
               {
                  $data['confirmPassword_error'] = "New Passwords dont't match";
                  $resArr = array($data,$profiledata);
                  $this->view('band/band_profileSettings', $resArr);
               }
               if (empty($data['currentPassword_error']) && empty($data['newPassword_error']) && empty($data['confirmPassword_error']))
               {
                  $this->userModel->updatePassword($data['email'], $data['newPassword1']);
                  Toast::setToast(1, "Password changed successfully", "");
                  $this->view('band/band_profileSettings', $resArr);
               }
            }
            else
            {
               $data['currentPassword_error'] = "Incorrect password";
               $resArr = array($data,$profiledata);
               $this->view('band/band_profileSettings', $resArr);
            }

            $this->view('band/band_profileSettings', $resArr);
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
         $this->view('band/band_profileSettings', $resArr);
      }
   }

   public function chat()
   {
      $unique_id = Session::get("unique_id");
      $users = $this->bandModel->getChatUsers($unique_id);
      $this->view('band/chat_users', $users);
   }

   public function chatWith()
   {
      if(isset($_GET['user_id'])){
         $user_id=trim($_GET['user_id']);
      }
      else
      $user_id=0;
      
      $user = $this->bandModel->getUserByUserId($user_id);
      $this->view('band/chat', $user);
   }

      //------------- view offers functions start -------------------

   public function randomGen($min, $numberOfServices, $quantity) {
      $numbers = range($min, $numberOfServices);
      shuffle($numbers);
      return array_slice($numbers, 0, $quantity);
   }

   public function generateRandomArrayforEachServiceType($numberOfServices) {

      $min = 1;

      if($numberOfServices >= 4) {
         $quantity = 4;
      } else {
         $quantity = $numberOfServices;
      }

      $randomNoArray = $this->randomGen($min, $numberOfServices, $quantity);
      return $randomNoArray;
   }


   public function viewOffers()
   {
      $serviceProviderDetails = $this->serviceProviderModel->getServiceProviderDetails();
      $hotelServiceNo = $this->hotelModel->getNumberofServices();
      $decoServiceNo = $this->decoModel->getNumberofServices();
      $bandServiceNo = $this->bandModel->getNumberofServices();
      $photographyServiceNo = $this->photographyModel->getNumberofServices();

      

      $randomServicesHotel = $this->hotelModel->getRandomServicesFromHotel($this->generateRandomArrayforEachServiceType($hotelServiceNo));
      $randomServicesDeco = $this->decoModel->getRandomServicesFromDeco($this->generateRandomArrayforEachServiceType($decoServiceNo));
      $randomServicesBand = $this->bandModel->getRandomServicesFromBand($this->generateRandomArrayforEachServiceType($bandServiceNo));
      $randomServicesPhotography = $this->photographyModel->getRandomServicesFromPhotography($this->generateRandomArrayforEachServiceType($photographyServiceNo));

      $resultArray = array($serviceProviderDetails,$randomServicesHotel,$randomServicesDeco,$randomServicesBand,$randomServicesPhotography);
      
      $this->view('common/special-offers', $resultArray);
   }

   //------------- view offers functions ends -------------------
   

   public function reservationDetails()
   {
         $spID = Session::getUser("id");
         if(isset($_GET['service_id'])){
            $serviceid=$_GET['service_id'];
         }
         if(isset($_GET['rv_id'])){
            $rvid=$_GET['rv_id'];
         }
         $banddetailslist = $this->bandModel->getServicesByServiceProvider($spID);
         $reservationsList = $this->reservationModel->getReservationDetails();
         $customerlist = $this->customerModel->getCustomerDetails();
         $result0 = array($spID,$serviceid,$rvid,$reservationsList,$customerlist,$banddetailslist);
         $this->view('band/view-reservation',$result0);
   }

   public function payment()
   {
      $paymentLogs = $this->reservationModel->getPaymentLogDetails();
      $reservationDetailsAll = $this->reservationModel->getReservationDetails();
      $customerDetails = $this->customerModel->getCustomerDetails();
      $loggedUserID = Session::getUser("id");

      $PaymentLogArray = [];

      foreach($paymentLogs as $paymentLog) {
         $reservation_id = $paymentLog->Booking_ID;
         $reservationDetails = $this->reservationModel->getReservationDetailsByReservationID($reservation_id);
         $sp_id_array = explode (",", $reservationDetails->sp_id);
         if(in_array($loggedUserID, $sp_id_array)){
            array_push($PaymentLogArray, $paymentLog);
         }
      }

      $result = array($PaymentLogArray, $reservationDetailsAll, $customerDetails);
      $this->view('common/sp_payment_log', $result);
   }

   public function reports()
   {
      $this->view('band/Reports', '');
   }
   
   public function reservationLog()
   {
         $spID = Session::getUser("id");
         $reservationsList = $this->reservationModel->getReservationDetails();
         $customerlist = $this->customerModel->getCustomerDetails();
         $packageConfirmationlist = $this->reservationModel->getPackageConfirmationDetails();
         $result = array($spID, $reservationsList, $customerlist,$packageConfirmationlist);
         $this->view('Band/Reservationlog',$result);
   }

   public function calendar(){

      if ($_SERVER['REQUEST_METHOD'] == 'POST')
      {
         $data = [
            'sp_user_id' => trim($_POST['spID']),
            'title' => trim($_POST['eventname']),
            'start' => trim($_POST['startdate']),
            'end' => trim($_POST['enddate'])
         ];

         $this->reservationModel->addEvent($data);
         $usermail = Session::getUser('email');
         $spID = $this->serviceProviderModel->getServiceProviderUserData($usermail);
         $events = $this->customerModel->getEvents($spID[0]);
         $this->view("calendar/index", $events);
             
      }else{
         $usermail = Session::getUser('email');
         $spID = $this->serviceProviderModel->getServiceProviderUserData($usermail);
         $events = $this->customerModel->getEvents($spID[0]);
         $this->view("calendar/index", $events);
      }
   }

   public function logout()
   {
      redirect('User/signout');
   }

}
