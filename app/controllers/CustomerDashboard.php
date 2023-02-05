<?php

// Session validation is only applied to the constructor
// bcz a dashboard controller 
class CustomerDashboard extends Controller
{
   public function __construct()
   {
      Session::validateSession([3]);
      $this->decoModel = $this->model('DecoModel');
      $this->hotelModel = $this->model('HotelModel');
      $this->userModel = $this->model('userModel');
      $this->serviceProviderModel = $this->model('ServiceProviderModel');
      $this->customerModel = $this->model('CustomerModel');
      $this->bandModel = $this->model('BandModel');
      $this->photographyModel = $this->model('PhotographyModel');
      $this->reservationModel = $this->model('ReservationModel');
     
   }

   public function home()
   {
      $this->view('customer/customer-home');
   }
   public function addreservation()
   {
      redirect('CustomerReservation/addReservation');
   }

    public function viewreservationlog()
   {
      redirect('CustomerReservation/viewReservationLog');
   }

   public function viewpackages()
   {
      redirect('Packages/viewAllPackages');
   }

   public function viewservices()
   {
      $result1 = $this->serviceProviderModel->getServiceProviderDetails();
      $result2 = $this->decoModel->getDecoServiceDetails();
      $result3 = $this->hotelModel->getHotelServiceDetails();
      $result6 = $this->photographyModel->getPhotographyServiceDetails();
      $result8 = $this->bandModel->getBandServiceDetails();
      
      $result = array($result1, $result2, $result3,$result8,$result6);
      $this->view('customer/services',  $result);
   }

   public function profileSettings()
   {
      Session::validateSession([3]);
      $result = $this->userModel->getUser(Session::getUser("email"));
      $profile_id = Session::getUser("id");
      $profiledata = $this->customerModel->getCustomerDetailsByID($profile_id);
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
            $this->view('customer/cust_profileSettings', $resArr);
         }

         else //no errors
         {
            if (password_verify($data['currentPassword'], $hashedPassword))
            {
               if ($data['newPassword1'] != $data['newPassword2'])
               {
                  $data['confirmPassword_error'] = "New Passwords dont't match";
                  $resArr = array($data,$profiledata);
                  $this->view('customer/cust_profileSettings', $resArr);
               }
               if (empty($data['currentPassword_error']) && empty($data['newPassword_error']) && empty($data['confirmPassword_error']))
               {
                  $this->userModel->updatePassword($data['email'], $data['newPassword1']);
                  Toast::setToast(1, "Password changed successfully", "");
                  $this->view('customer/cust_profileSettings', $resArr);
               }
            }
            else
            {
               $data['currentPassword_error'] = "Incorrect password";
               $resArr = array($data,$profiledata);
               $this->view('customer/cust_profileSettings', $resArr);
            }

            $this->view('customer/cust_profileSettings', $resArr);
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
         $this->view('customer/cust_profileSettings', $resArr);
      }
   }

   public function viewEachServiceHotel()
   {
      
      if(isset($_GET['service_id'])){
         $service_id = $_GET['service_id'];
      }
      $result1 = $this->serviceProviderModel->getServiceProviderDetails();
      $result3 = $this->hotelModel->getHotelServiceDetails();
      $result4 = array($service_id, $result1, $result3);
      $this->view('customer/view-each-service-hotel',$result4);
   }

   public function viewEachServiceDeco()
   {
      
      if(isset($_GET['service_id'])){
         $service_id = $_GET['service_id'];
      }
      $result1 = $this->serviceProviderModel->getServiceProviderDetails();
      $result2 = $this->decoModel->getDecoServiceDetails();
      $result5 = array($service_id, $result1, $result2);
      $this->view('customer/view-each-service-deco',$result5);
   }

   public function viewEachServicePhotography()
   {
      
      if(isset($_GET['service_id'])){
         $service_id = $_GET['service_id'];
      }
      $result1 = $this->serviceProviderModel->getServiceProviderDetails();
      $result6 = $this->photographyModel->getPhotographyServiceDetails();
      $result7 = array($service_id, $result1, $result6);
      $this->view('customer/view-each-service-photography',$result7);
   }

   public function viewEachServiceBand()
   {
      
      if(isset($_GET['service_id'])){
         $service_id = $_GET['service_id'];
      }
      $result1 = $this->serviceProviderModel->getServiceProviderDetails();
      $result8 = $this->bandModel->getBandServiceDetails();
      $result9 = array($service_id, $result1, $result8);
      $this->view('customer/view-each-service-band',$result9);
   }


   public function provideFeedback()
   {

      if ($_SERVER['REQUEST_METHOD'] == 'POST')
      {
         
         $data = [

            'service_type' => trim($_POST['service_type']),
            'service_name' => trim($_POST['service_name']),
            'event_name' => trim($_POST['event_name']),
            'customername' => trim($_POST['customername']),
            'contactno' => trim($_POST['contactno']),
            'eob' => trim($_POST['feedbackval1']),
            'aos' => trim($_POST['feedbackval2']),
            'vom' => trim($_POST['feedbackval3']),
            'qos' => trim($_POST['feedbackval4']),
            'cs' => trim($_POST['feedbackval5']),
            'complaint' => trim($_POST['improvement']),

            'service_type_error'=>'',
            'service_name_error' => '',
            'event_name_error' => '',
            'customername_error' => '',
            'contactno_error' => '',
            'eob_error' => '',
            'aos_error' => '',
            'vom_error' => '',
            'qos_error' => '',
            'cs_error' => ''
            
         ];
       

         if ($_POST['action'] == "addfeedback")
         {
            // Validate everything
            $data['event_name_error'] = emptyCheck($data['event_name']);
            $data['service_type_error'] = emptyCheck($data['service_type']);
            $data['service_name_error'] = emptyCheck($data['service_name']);
            $data['customername_error'] = emptyCheck($data['customername']);
            $data['contactno_error'] = validateContactno($data['contactno']);
            $data['eob_error'] = emptyCheck($data['eob']);
            $data['aos_error'] = emptyCheck($data['aos']);
            $data['vom_error'] = emptyCheck($data['vom']);
            $data['qos_error'] = emptyCheck($data['qos']);
            $data['cs_error'] = emptyCheck($data['cs']);

            if (
               empty($data['event_name_error']) &&
               empty($data['service_type_error']) &&
               empty($data['service_name_error']) &&
               empty($data['customername_error']) &&
               empty($data['contactno_error']) &&
               empty($data['eob_error']) &&
               empty($data['aos_error']) &&
               empty($data['vom_error']) &&
               empty($data['qos_error']) &&
               empty($data['cs_error'])
            )
            {
                
               $this->customerModel->beginTransaction();
               $this->customerModel->provideFeedback($data);
               Toast::setToast(1, "Feedback Added Successfully!!!", '');
               $this->customerModel->commit();

               redirect('CustomerDashboard/home');
               
            }
            else
            {
               redirect('CustomerDashboard/provideFeedback', $data);
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
            'service_type' => '',
            'service_name' => '',
            'event_name' => '',
            'customername' => '',
            'contactno' => '',
            'eob' => '',
            'aos' => '',
            'vom' => '',
            'qos' => '',
            'cs' => '',
            'complaint' => '',

            'service_type_error'=>'',
            'service_name_error' => '',
            'event_name_error' => '',
            'customername_error' => '',
            'contactno_error' => '',
            'eob_error' => '',
            'aos_error' => '',
            'vom_error' => '',
            'qos_error' => '',
            'cs_error' => ''
         ];

         $reservations = $this->reservationModel->getReservationsByCustomer(Session::getUser("id"));
         $customerdetails = $this ->customerModel->getCustomerDetailsByID(Session::getUser("id"));
         $result = array($reservations, $customerdetails, $data);

         $this->view('customer/customer_feedback',$result);
      }
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

      

      $randomServicesHotel = $this->hotelModel->getRandomServicesFromHotel($this->generateRandomArrayforEachServiceType($hotelServiceNo));
      $randomServicesDeco = $this->decoModel->getRandomServicesFromDeco($this->generateRandomArrayforEachServiceType($decoServiceNo));

      $resultArray = array($serviceProviderDetails,$randomServicesHotel,$randomServicesDeco);
      
      $this->view('customer/special-offers', $resultArray);
   }

   //------------- view offers functions ends -------------------

   public function advancePaymentSuccess()
   {
      $this->view('customer/advance-payment-success', '');
   }

   public function chat()
   {
      $unique_id = Session::get("unique_id");
      $users = $this->customerModel->getChatUsers($unique_id);
      $this->view('customer/chat_users', $users);
   }

   public function chatWith()
   {
      if(isset($_GET['user_id'])){
         $user_id=trim($_GET['user_id']);
      }
      else
      $user_id=0;
      
      $user = $this->customerModel->getUserByUserId($user_id);
      $this->view('customer/chat', $user);
   }

   public function makeAdvancePayment()
   {
      $this->view('customer/make-advance-payment', '');
   }

   public function makeFullPayment()
   {
      $this->view('customer/make-full-payment', '');
   }

   public function totalPaymentSuccess()
   {
      $this->view('customer/total-payment-success', '');
   }

   public function logout()
   {
      redirect('User/signout');
   }

}
