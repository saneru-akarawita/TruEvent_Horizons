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
      $this->decoModel = $this->model('DecoModel');
      $this->hotelModel = $this->model('HotelModel');
      $this->bandModel = $this->model('BandModel');
      $this->photographyModel = $this->model('PhotographyModel');
      $this->reservationModel = $this->model('ReservationModel');
   }

   public function home()
   {
      $no_of_customers = $this->customerModel->getNumberofCustomers();
      $no_of_service_providers = $this->serviceProviderModel->getNumberofServiceProviders();
      $no_of_reservations = $this->reservationModel->getNumberofReservationsByPaid();
      $no_of_decos = $this->decoModel->getNumberofServices();
      $no_of_hotels = $this->hotelModel->getNumberofServices();
      $no_of_bands = $this->bandModel->getNumberofServices();
      $no_of_photographies = $this->photographyModel->getNumberofServices();

      $data = [
         'no_of_customers' => $no_of_customers,
         'no_of_service_providers' => $no_of_service_providers,
         'no_of_reservations' => $no_of_reservations,
         'no_of_decos' => $no_of_decos,
         'no_of_hotels' => $no_of_hotels,
         'no_of_bands' => $no_of_bands,
         'no_of_photographies' => $no_of_photographies,
         'no_of_services'=> $no_of_decos+$no_of_hotels+$no_of_bands+$no_of_photographies
      ];

      $this->view('admin/admin-home',$data);
   }
   public function addpackages()
   {
      redirect('Packages/addNewPackage');
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
      $this->view('common/services',  $result);
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
            'img_source'=>$result->img,
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
            'img_source'=>$result->img,
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
      $reservationDetails = $this->reservationModel->getReservationDetails();
      $customerDetails = $this->customerModel->getCustomerDetails();

      $result = array($paymentLogs,$reservationDetails,$customerDetails);
      $this->view('admin/payment', $result);
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

         $data = [
            'query' => $query,
            'checkBoxArray' => $checkBoxArray,
            'dataRows' => $dataRows,
            'customerDetails' => $customerdetails
         ];

         $this->view('admin/Reports', $data);
      }
      else{
         $dataRows = $this->reservationModel->getReservationDetails();
         $customerdetails = $this->customerModel->getCustomerDetails();
         $emptyArray = [[],[],[],[],[]];
         $data = [
            'query' => '',
            'checkBoxArray' => $emptyArray,
            'dataRows' => $dataRows,
            'customerDetails' => $customerdetails
         ];
         $this->view('admin/Reports', $data);
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


   public function generatereportsforService(){
      $resultofreservation = [];

      $data = [
         'startDate' => "",
         'endDate' => "",
         'spType' => ""
      ];
      
      if($_SERVER['REQUEST_METHOD'] == 'POST'){
         if(isset($_POST['startDate']) && isset($_POST['endDate']) && isset($_POST['spType'])){
               $data = [
                  'startDate' => trim($_POST['startDate']),
                  'endDate' => trim($_POST['endDate']),
                  'spType' => trim($_POST['spType'])
               ];
            }
         }
               $reservationDetailsByService = $this->reservationModel->getReservationDetailsForSelectedServiceByDate($data['startDate'],$data['endDate'],$data['spType']);
               $customerDetails = $this->customerModel->getCustomerDetails();
               $reservationincomeforselectedService = $this->reservationModel->getReservationIncomeByDateForSelectedService($data['startDate'],$data['endDate'],$data['spType']);
               $totalCount = $this->reservationModel->getNoOfReservationsByDateForSelectedService($data['startDate'],$data['endDate'],$data['spType']);
               $totalIncome = $this->reservationModel->getIncomeByDateForSelectedService($data['startDate'],$data['endDate'],$data['spType']);
      
               $labels = ['January','February','March','April','May','June','July','August','September','October','November','December'];
               $values = [0,0,0,0,0,0,0,0,0,0,0,0];

               for($k=0; $k<12; $k++){
                  foreach($totalCount as $t3){
                     if($labels[$k] == $t3->Month){
                        $values[$k] = $t3->TotalReservationsSelectedService;
                     }
                  }
               }
            
               $monthVsReservationsSelectedService = [
                  'labels' => $labels,
                  'data' => $values
               ];

               $label2 = ['January','February','March','April','May','June','July','August','September','October','November','December'];
               $value2 = [0,0,0,0,0,0,0,0,0,0,0,0];

               for($m=0; $m<12; $m++){
                  foreach($totalIncome as $t4){
                     if($label2[$m] == $t4->Month){
                        $value2[$m] = $t4->totalPricePerMonthSelectedService;
                     }
                  }
               }
         
               $monthVsIncomeSelectedService = [
                  'label' => $label2,
                  'dataVal' => $value2
               ];

      $resultofreservation = array($data['startDate'],$data['endDate'],$data['spType'],$reservationDetailsByService, $customerDetails, $reservationincomeforselectedService, $monthVsReservationsSelectedService,$monthVsIncomeSelectedService);    
      $this->view('admin/generateReport-service',$resultofreservation);
}

public function generatereportsforPackage(){
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
            $reservationDetailsByPackage = $this->reservationModel->getReservationDetailsForSelectedPackageByDate($data['startDate'],$data['endDate']);
            $customerDetails = $this->customerModel->getCustomerDetails();
            $reservationincomeforpackage = $this->reservationModel->getReservationIncomeByDateForPackage($data['startDate'],$data['endDate']);
            $totalCountPackages = $this->reservationModel->getNoOfReservationsByDateForPackage($data['startDate'],$data['endDate']);
            $totalIncomePackageMonth = $this->reservationModel->getIncomeByDateForPackage($data['startDate'],$data['endDate']);
   
            $labels = ['January','February','March','April','May','June','July','August','September','October','November','December'];
            $values = [0,0,0,0,0,0,0,0,0,0,0,0];

            for($i=0; $i<12; $i++){
               foreach($totalCountPackages as $t){
                  if($labels[$i] == $t->Month){
                     $values[$i] = $t->TotalReservationsPackage;
                  }
               }
            }
         
            $monthVsReservationsPackage = [
               'labels' => $labels,
               'data' => $values
            ];

            $label2 = ['January','February','March','April','May','June','July','August','September','October','November','December'];
            $value2 = [0,0,0,0,0,0,0,0,0,0,0,0];

            for($j=0; $j<12; $j++){
               foreach($totalIncomePackageMonth as $t2){
                  if($label2[$j] == $t2->Month){
                     $value2[$j] = $t2->totalPricePerMonthPackage;
                  }
               }
            }
      
            $monthVsIncomePackage = [
               'label' => $label2,
               'dataVal' => $value2
            ];

            $resultofreservation = array($data['startDate'],$data['endDate'],$reservationDetailsByPackage, $customerDetails, $reservationincomeforpackage, $monthVsReservationsPackage,$monthVsIncomePackage);              
            $this->view('admin/generateReport-package',$resultofreservation);  
      
}

   public function downloadReport(){

   }

   public function reservationLog()
   {
      $this->view('admin/Reservationlog', '');
   }

   public function approveReject()
   {
      if ($_SERVER["REQUEST_METHOD"] == "POST") {
         $val = explode("||", $_POST['submit']);
         $email = $val[1];
         if ($val[0] == 'Approve') {
            $this->acceptServiceProvider($email);
         } else if ($val[0] == 'Reject') {
            $this->rejectServiceProvider($email);
         }
     }
   }

   public function enableDisable()
   {
      if ($_SERVER["REQUEST_METHOD"] == "POST") {
         $val = explode("||", $_POST['submit']);
         $email = $val[1];
         if ($val[0] == 'Enable') {
            $this->activateUser($email);
         } else if ($val[0] == 'Disable') {
            $this->disableUser($email);
         }
     }
   }

   public function acceptServiceProvider($email)
   {

      //call model
      $this->userModel->updateVerificationStatus($email,"verified");
      //call chatregisteruser
      $serviceProviderData = $this->serviceProviderModel->getServiceProviderUserData($email);
      //Array ( [0] => 7 [1] => Mt. Lavenia Hotel [2] => 4 )
      $ran_id = rand(time(), 100000000);
      $status = "Active now";
      $this->userModel->registerChatUser($ran_id,$serviceProviderData[1],'',$email,$status);
      EMAIL::sendUserAccVerification($email);
      redirect('AdminDashboard/userManagement');
   }

   public function rejectServiceProvider($email)
   {

      //call model
      $this->userModel->removeUserAccount($email);
      EMAIL::sendUserAccRejection($email);
      redirect('AdminDashboard/userManagement');
   }

   public function disableUser($email)
   {
      //call model
      $this->userModel->updateVerificationStatus($email,"disable");
      $this->userModel->setChatUserStatus($email,"disable");
      EMAIL::sendUserAccDisable($email);
      redirect('AdminDashboard/userManagement');
   }

   public function activateUser($email)
   {

      //call model
      $this->userModel->updateVerificationStatus($email,"verified");
      $this->userModel->setChatUserStatus($email,"verified");
      EMAIL::sendUserAccEnable($email);
      redirect('AdminDashboard/userManagement');
   }

   public function userManagement()
   {
      $users = $this->userModel->getAllGeneralUsers();
      $serviceProviders = $this->serviceProviderModel->getServiceProviderDetails();
      $customers = $this->customerModel->getCustomerDetails();
      $result = array($users, $serviceProviders, $customers);
      $this->view('admin/user_management', $result);
   }

   public function logout()
   {
      redirect('User/signout');
   }

}
