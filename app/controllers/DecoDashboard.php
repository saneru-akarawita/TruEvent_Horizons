<?php

// Session validation is only applied to the constructor
// bcz a dashboard controller 
class DecoDashboard extends Controller
{
   public function __construct()
   {
      Session::validateSession([5]);
      $this->reservationModel = $this->model('ReservationModel');
      $this->customerModel = $this->model('CustomerModel');
      $this->serviceProviderModel = $this->model('ServiceProviderModel');
      $this->adminModel = $this->model('AdminModel');
      $this->decoModel = $this->model('DecoModel');
      $this->userModel = $this->model('UserModel');
      $this->hotelModel = $this->model('HotelModel');
      $this->bandModel = $this->model('BandModel');
      $this->photographyModel = $this->model('PhotographyModel');

   }

   public function home()
   {
      $this->view('decoCompany/homepage');
   }
   public function addservices()
   {
      redirect('DecoService/addNewService');
   }
   public function viewservices()
   {
      redirect('DecoService/viewAllServices');
   }

   public function profileSettings()
   {
      //validate user session with required user types
      Session::validateSession([5]);

      //get user data and profile ID from the database
      $result = $this->userModel->getUser(Session::getUser("email"));
      $profile_id = Session::getUser("id");
      $profiledata = $this->serviceProviderModel->getServiceProviderDetailsByID($profile_id);

      //get hashed password from the database
      $hashedPassword = $result->password;

      if ($_SERVER['REQUEST_METHOD'] == 'POST')
      {
         //prepare data array with input from form fields
         $data = [
            'email' => $result->email,
            'img_source'=>$result->img,
            'currentPassword' => trim($_POST['currentpw']),
            'newPassword1' => trim($_POST['newpw']),
            'newPassword2' => trim($_POST['confirmnewpw']),
            'currentPassword_error' => '',
            'newPassword_error' => '',
            'confirmPassword_error' => ''
         ];

         //check if input fields are empty and set corresponding errors
         $data['currentPassword_error'] = emptyCheck($data['currentPassword']);
         $data['newPassword_error'] = emptyCheck($data['newPassword1']);
         $data['confirmPassword_error'] = emptyCheck($data['newPassword2']);

         //create a result array with data and profile information 
         $resArr = array($data,$profiledata);

         //check if ant error exists and display form with errors
         if (!empty($data['currentPassword_error']) || !empty($data['newPassword_error']) || !empty($data['confirmPassword_error'])) //have errors
         {
            $this->view('decoCompany/deco_profileSettings', $resArr);
         }

         else //no errors
         {
            //check if current password matches the hashed password
            if (password_verify($data['currentPassword'], $hashedPassword))
            {

               //check if new password matches the confirm password
               if ($data['newPassword1'] != $data['newPassword2'])
               {
                  //set error for mismatched new passwords and display form with errors
                  $data['confirmPassword_error'] = "New Passwords dont't match";
                  $resArr = array($data,$profiledata);
                  $this->view('decoCompany/deco_profileSettings', $resArr);
               }
               //if all conditions pass, update the user password 
               if (empty($data['currentPassword_error']) && empty($data['newPassword_error']) && empty($data['confirmPassword_error']))
               {
                  $this->userModel->updatePassword($data['email'], $data['newPassword1']);
                  Toast::setToast(1, "Password changed successfully", "");
                  $this->view('decoCompany/deco_profileSettings', $resArr);
               }
            }
            else
            {
               $data['currentPassword_error'] = "Incorrect password";
               $resArr = array($data,$profiledata);
               $this->view('decoCompany/deco_profileSettings', $resArr);
            }

            $this->view('decoCompany/deco_profileSettings', $resArr);
         }
      }
      else
      {
         $data = [
            'email' => $result->email,
            'img_source'=>$result->img,
            'currentPassword' => '',
            'newPassword1' => '',
            'newPassword2' => '',
            'currentPassword_error' => '',
            'newPassword_error' => '',
            'confirmPassword_error' => ''
         ];

         $resArr = array($data,$profiledata);
         $this->view('decoCompany/deco_profileSettings', $resArr);
      }
   }

   public function chat()
   {
      $unique_id = Session::get("unique_id");
      $users = $this->decoModel->getChatUsers($unique_id);
      $this->view('decoCompany/chat_users', $users);
   }

   public function chatWith()
   {
      if(isset($_GET['user_id'])){
         $user_id=trim($_GET['user_id']);
      }
      else
      $user_id=0;
      
      $user = $this->decoModel->getUserByUserId($user_id);
      $this->view('decoCompany/chat', $user);
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
      if ($_SERVER['REQUEST_METHOD'] == 'POST'){

         if(isset($_POST['year']))
            $years = $_POST['year'];
         else
            $years = [];
         if(isset($_POST['month']))
            $months = $_POST['month'];
         else
            $months = [];
         if(isset($_POST['status']))
            $status = $_POST['status'];
         else
            $status = [];
         if(isset($_POST['payment']))
            $payment = $_POST['payment'];
         else
            $payment = [];
         if(isset($_POST['type']))
            $type = $_POST['type'];
         else
            $type = [];

         $query = $this->generate_sql_query($years, $months, $status, $payment, $type);
         $checkBoxArray = array($years, $months, $status, $payment, $type);

         $dataRows = $this->reservationModel->getReservationDetailsByQuery($query);
         $customerdetails = $this->customerModel->getCustomerDetails();

         $loggedUserID = Session::getUser("id");

         $ReportLogArray = [];

         foreach($dataRows as $dataRow) {
            $reservation_id = $dataRow->rv_id;
            $reservationDetails = $this->reservationModel->getReservationDetailsByReservationID($reservation_id);
            $sp_id_array = explode (",", $reservationDetails->sp_id);
            if(in_array($loggedUserID, $sp_id_array)){
               array_push($ReportLogArray, $dataRow);
            }
         }

         $data = [
            'query' => $query,
            'checkBoxArray' => $checkBoxArray,
            'dataRows' => $ReportLogArray,
            'customerDetails' => $customerdetails
         ];

         $this->view('common/sp_reports', $data);
      }
      else{
         $dataRows = $this->reservationModel->getReservationDetails();
         $customerdetails = $this->customerModel->getCustomerDetails();
         $emptyArray = [[],[],[],[],[]];

         $loggedUserID = Session::getUser("id");

         $ReportLogArray = [];

         foreach($dataRows as $dataRow) {
            $reservation_id = $dataRow->rv_id;
            $reservationDetails = $this->reservationModel->getReservationDetailsByReservationID($reservation_id);
            $sp_id_array = explode (",", $reservationDetails->sp_id);
            if(in_array($loggedUserID, $sp_id_array)){
               array_push($ReportLogArray, $dataRow);
            }
         }

         $data = [
            'query' => '',
            'checkBoxArray' => $emptyArray,
            'dataRows' => $ReportLogArray,
            'customerDetails' => $customerdetails
         ];
         $this->view('common/sp_reports', $data);
      }
      
   }

   public function generate_sql_query($years = [], $months = [], $statuses = [], $payments = [], $rv_types = []) {
		// Start with the SELECT statement to get all columns
		$query = "SELECT * FROM customerrvdetails";
		
		// Check if any constraints were selected
		if (!empty($years) || !empty($months) || !empty($statuses) || !empty($payments) || !empty($rv_types)) {
			// Add the WHERE keyword to indicate constraints
			$query .= " WHERE ";
			
			// Add each constraint as an AND condition
			$conditions = [];
			
			if (!empty($years)) {
				$years_str = implode(", ", array_map('intval', $years));
				$conditions[] = "year(rvDate) IN ($years_str)";
			}
				
			if (!empty($months)) {
				$months_str = implode(", ", array_map(function ($month) { return "'$month'"; }, $months));
				$conditions[] = "month(rvDate) IN ($months_str)";
			}
			
			if (!empty($statuses)) {
				$statuses_str = implode(", ", array_map(function ($status) { return "'$status'"; }, $statuses));
				$conditions[] = "status IN ($statuses_str)";
			}
			
			if (!empty($payments)) {
				$payments_str = implode(", ", array_map(function ($payment) { return "'$payment'"; }, $payments));
				$conditions[] = "payment IN ($payments_str)";
			}
			
			if (!empty($rv_types)) {
				$rv_types_str = implode(", ", array_map(function ($rv_type) { return "'$rv_type'"; }, $rv_types));
				$conditions[] = "rvType IN ($rv_types_str)";
			}
			
			// Join all conditions with the AND keyword
			$query .= implode(" AND ", $conditions);

         $query .= "ORDER BY customer_id, rvDate";
		}
		
		return $query;
	}

   public function downloadReport(){

   }
   
   public function generatereports(){
      $userID = Session::getUser("id");
      $userType = Session::getUser("type");
      $resultofreservation = [];
      
      $data = [
         'startDate' => "",
         'endDate' => ""
      ];
      
      if($_SERVER['REQUEST_METHOD'] == 'POST'){
         if(isset($_POST['startDate']) && isset($_POST['endDate'])){
            $data = [
               'startDate' => trim($_POST['startDate']),
               'endDate' => trim($_POST['endDate'])
            ];
         }
      } 
      $reservationDetails = $this->reservationModel->getReservationDetailsByDateForService($data['startDate'],$data['endDate'],$userID,$userType);
      $customerDetails = $this->customerModel->getCustomerDetails();
      $result1 = $this->serviceProviderModel->getTotalIncomeBasedOnSPIDForPackage($data['startDate'],$data['endDate'], $userID, $userType);
      $result2 = $this->serviceProviderModel->getTotalIncomeBasedOnSPIDForService($data['startDate'],$data['endDate'], $userID);
      $totalCountofService = $this->reservationModel->getNoOfReservationsByDateForService($data['startDate'],$data['endDate'],$userID);
      $totalCountofPackage = $this->reservationModel->getNoOfReservationsByDateForPackages($data['startDate'],$data['endDate'],$userID);
      $result3 = $this->serviceProviderModel->getTotalIncomeBasedOnSPIDForPackageMonthly($data['startDate'],$data['endDate'], $userID, $userType);
      $result4 = $this->serviceProviderModel->getTotalIncomeBasedOnSPIDForServiceMonthly($data['startDate'],$data['endDate'], $userID);
  
      $start = new DateTime($data['startDate']);
      $end = new DateTime($data['endDate']);
      
      $selectedMonthIndex = intval(date('m', strtotime($data['startDate']))) - 1;
      $labels = [];
      $values = [];

      for ($i = 0; $i < 12; $i++) {
         $monthIndex = ($selectedMonthIndex + $i) % 12;
         $labels[] = date('M', mktime(0, 0, 0, $monthIndex + 1, 1));
         $values[] = 0;
      }

      foreach ($totalCountofService as $t3) {
         $monthIndex = array_search($t3->Month, $labels);
         if ($monthIndex !== false) {
            $values[$monthIndex] = $t3->TotalReservationsofService;
         }
      }

      $monthVsReservationsService = [
         'labels' => $labels,
         'data' => $values
      ];


      $label2 = [];
      $valSet = [];

      for ($i = 0; $i < 12; $i++) {
         $monthIndex = ($selectedMonthIndex + $i) % 12;
         $label2[] = date('M', mktime(0, 0, 0, $monthIndex + 1, 1));
         $valSet[] = 0;
      }

      foreach ($totalCountofPackage as $t3) {
         $monthIndex = array_search($t3->Month, $label2);
         if ($monthIndex !== false) {
            $valSet[$monthIndex] = $t3->TotalReservationsofPackages;
         }
      }
   
      $monthVsReservationsPackage = [
         'label2' => $label2,
         'data2' => $valSet
      ];


      $Dates = [];
      $DateVal = [];
      foreach($result3 as $key=>$val){
         $Dates[]=$key;
         $DateVal[]=$val;
      }

      $monthVsIncomePackage = [
         'label' => $Dates,
         'data' => $DateVal
      ];

      $Date = [];
      $DateValues = [];
      foreach($result4 as $key=>$val){
         $Date[]=$key;
         $DateValues[]=$val;
      }

      $monthVsIncomeService = [
         'labelVal' => $Date,
         'dataVal' => $DateValues
      ];

      $resultofreservation = array($data['startDate'],$data['endDate'],$reservationDetails, $customerDetails, $result1, $result2, $monthVsReservationsService,$monthVsReservationsPackage, $monthVsIncomePackage, $monthVsIncomeService);  
      $this->view('decoCompany/Reports',$resultofreservation);

   }

   public function reservationDetails()
   {
         $spID = Session::getUser("id");
         if(isset($_GET['service_id'])){
            $serviceid=$_GET['service_id'];
         }
         if(isset($_GET['rv_id'])){
            $rvid=$_GET['rv_id'];
         }
         $decodetailslist = $this->decoModel->getServicesByServiceProvider($spID);
         $reservationsList = $this->reservationModel->getReservationDetails();
         $customerlist = $this->customerModel->getCustomerDetails();
         $DecoPrice = $this->reservationModel-> getDecoPrice($rvid);
         $packageConfirmationlist = $this->reservationModel->getPackageConfirmationDetails();
         $result1 = array($spID,$serviceid,$rvid,$reservationsList,$customerlist,$decodetailslist,$DecoPrice,$packageConfirmationlist);
         $this->view('decoCompany/view-reservation',$result1);
   }


   public function reservationLog()
   {
         $spID = Session::getUser("id");
         $reservationsList = $this->reservationModel->getReservationDetails();
         $customerlist = $this->customerModel->getCustomerDetails();
         $packageConfirmationlist = $this->reservationModel->getPackageConfirmationDetails();
         $packageDetails = $this->reservationModel->getReservationDetailsPackage();
         $result = array($spID, $reservationsList, $customerlist, $packageConfirmationlist,$packageDetails);
      $this->view('decoCompany/Reservationlog',$result);
   }

   public function calendar(){

      if ($_SERVER['REQUEST_METHOD'] == 'POST')
      {
         $data = [
            'sp_user_id' => trim($_POST['spID']),
            'title' => trim($_POST['eventname']),
            'start' => trim($_POST['startdate']),
            'end' => trim($_POST['enddate']),
            'rv_id' => 0
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
