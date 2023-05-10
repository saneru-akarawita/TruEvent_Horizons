<?php
class CustomerReservation extends Controller
{
   public function __construct()
   {
      Session::validateSession([3]);
      $this->reservationModel = $this->model('ReservationModel');
      $this->serviceProviderModel = $this->model('ServiceProviderModel');
      $this->decoModel = $this->model('DecoModel');
      $this->hotelModel = $this->model('HotelModel');
      $this->bandModel = $this->model('BandModel');
      $this->photographyModel = $this->model('PhotographyModel');
      $this->packageModel = $this->model('PackageModel');
      $this->customerModel = $this->model('CustomerModel');
   }

   public function getPriceFromServiceIDType($service_type, $service_id)
   {
      switch ($service_type) {
         case 'Hotel':
            $result = $this->hotelModel->getPriceFromServiceID($service_id);
            break;
         case 'Decoration':
            $result = $this->decoModel->getPriceFromServiceID($service_id);
            break;
         case 'Band':
            $result = $this->bandModel->getPriceFromServiceID($service_id);
            break;
         case 'Photography':
            $result = $this->photographyModel->getPriceFromServiceID($service_id);
            break;
         default:
            $result = $this->packageModel->getPriceFromPackageID($service_id);
            break;
      }
      return $result;
   }

   public function addReservation()
   {

      if ($_SERVER['REQUEST_METHOD'] == 'POST')
      {
         $rv_type = trim($_POST['rv_type']);
         $service_type = trim($_POST['service_type']);

         if($service_type == "Hotel"){
            $crowd =  trim($_POST['crowdcount']);
         }
         else{
            $crowd = NULL;
         }

         if($rv_type=='service'){
            $data = [

               'rv_type' => trim($_POST['rv_type']),
               'service_type' => trim($_POST['service_type']),
               'service_name' => trim($_POST['service_name']),
               'event_name' => trim($_POST['event_name']),
               'rvdate' => trim($_POST['rvdate']),
               'rvtime' => trim($_POST['rvtime']),
               'customer_id' => Session::getUser("id"),
               'svp_id' => trim($_POST['sp_id']),
               'price' => trim($_POST['price']),
               'service_id' => trim($_POST['service_id']),
               'crowdcount' => $crowd,
               
   
               'rv_type_error' => '',
               'service_type_error'=>'',
               'package_type_error' => '',
               'package_name_error' => '',
               'service_name_error' => '',
               'event_name_error' => '',
               'rvdate_error' => '',
               'rvtime_error' => ''
               
            ];
         }
         else{
            $data = [

               'rv_type' => trim($_POST['rv_type']),
               'package_type'=>trim($_POST['package_type']),
               'package_name' => trim($_POST['package_name']),
               'event_name' => trim($_POST['event_name']),
               'rvdate' => trim($_POST['rvdate']),
               'rvtime' => trim($_POST['rvtime']),
               'customer_id' => Session::getUser("id"),
               'spv_id_string' => trim($_POST['spv_id_string']),
               'price' => trim($_POST['price']),
               'package_id'=>trim($_POST['package_id']),
   
               'rv_type_error' => '',
               'service_type_error'=>'',
               'package_type_error' => '',
               'package_name_error' => '',
               'service_name_error' => '',
               'event_name_error' => '',
               'rvdate_error' => '',
               'rvtime_error' => ''
               
            ];
         }

         
         if ($_POST['action'] == "addrv")
         {
            // Validate everything
            $data['event_name_error'] = emptyCheck($data['event_name']);
            $data['rvdate_error'] = dateFormatValidation($data['rvdate']);
            $data['rvtime_error'] = timeFormatValidation($data['rvtime']);

            if (
               empty($data['rv_type_error']) && empty($data['service_type_error']) && empty($data['package_type_error']) && empty($data['package_name_error']) 
               && empty($data['service_name_error']) && empty($data['event_name_error']) && empty($data['rvdate_error']) && empty($data['rvtime_error'])
            )
            {
                
               $this->reservationModel->beginTransaction();
               $this->reservationModel->addReservation($data);
               
               Toast::setToast(1, "Service Added Successfully!!!", '');
               $this->reservationModel->commit();

               redirect('CustomerReservation/viewReservationLog');
               
            }
            else
            {
               $this->view('customer/customer-reservation', $data);
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
            'rv_type' => '',
            'service_type' => '',
            'package_type'=>'',
            'service_name' => '',
            'package_name' => '',
            'event_name' => '',
            'rvdate' => '',
            'rvtime' => '',
            'crowdcount' => '',

            'rv_type_error' => '',
            'service_type_error'=>'',
            'package_type_error' => '',
            'package_name_error' => '',
            'service_name_error' => '',
            'event_name_error' => '',
            'rvdate_error' => '',
            'rvtime_error' => ''
         ];

         $result = array('',$data);

         $this->view('customer/customer-reservation', $result);
      }
   }


   public function addReservationByServices(){

      if(isset($_GET['service_name']) && isset($_GET['service_type'])){
         $name=$_GET['service_name'];
         $type=$_GET['service_type'];
         $spID=$_GET['sp_id'];
         $service_id = $_GET['service_id'];
         if($type == "Hotel"){
            $maxcrowd = $_GET['maxcrowd'];
         }
        
         $price = $this->getPriceFromServiceIDType($type, $service_id);

         if ($_SERVER['REQUEST_METHOD'] == 'POST')
         {
            $rv_type = trim($_POST['rv_type']);
            if($type == "Hotel"){
               $crowd =  trim($_POST['crowdcount']);
            }
            else{
               $crowd = NULL;
            }
            if($rv_type=='service'){
               $data = [

                  'rv_type' => trim($_POST['rv_type']),
                  'service_type' => trim($_POST['service_type']),
                  'service_name' => trim($_POST['service_name']),
                  'event_name' => trim($_POST['event_name']),
                  'rvdate' => trim($_POST['rvdate']),
                  'rvtime' => trim($_POST['rvtime']),
                  'customer_id' => Session::getUser("id"),
                  'svp_id' => trim($_POST['sp_id']),
                  'price' => trim($_POST['price']),
                  'service_id'=>trim($_POST['service_id']),
                  'crowdcount' => $crowd,
      
                  'rv_type_error' => '',
                  'service_type_error'=>'',
                  'package_type_error' => '',
                  'package_name_error' => '',
                  'service_name_error' => '',
                  'event_name_error' => '',
                  'rvdate_error' => '',
                  'rvtime_error' => ''
                  
               ];
            }
            else{
               $data = [
                  'rv_type' => trim($_POST['rv_type']),
                  'package_type'=>trim($_POST['package_type']),
                  'package_name' => trim($_POST['package_name']),
                  'event_name' => trim($_POST['event_name']),
                  'rvdate' => trim($_POST['rvdate']),
                  'rvtime' => trim($_POST['rvtime']),
                  'customer_id' => Session::getUser("id"),
                  'spv_id_string' => trim($_POST['spv_id_string']),
                  'price' => trim($_POST['price']),
                  'package_id'=>trim($_POST['package_id']),
      
                  'rv_type_error' => '',
                  'service_type_error'=>'',
                  'package_type_error' => '',
                  'package_name_error' => '',
                  'service_name_error' => '',
                  'event_name_error' => '',
                  'rvdate_error' => '',
                  'rvtime_error' => ''

               ];
            }

            

            if ($_POST['action'] == "addrv")
            {
               // Validate everything
               $data['event_name_error'] = emptyCheck($data['event_name']);
               $data['rvdate_error'] = dateFormatValidation($data['rvdate']);
               $data['rvtime_error'] = timeFormatValidation($data['rvtime']);

               if (
                  empty($data['rv_type_error']) && empty($data['service_type_error']) && empty($data['package_type_error']) && empty($data['package_name_error']) 
                  && empty($data['service_name_error']) && empty($data['event_name_error']) && empty($data['rvdate_error']) && empty($data['rvtime_error'])
               )
               {
                  
                  $this->reservationModel->beginTransaction();
                  $this->reservationModel->addReservation($data);

                  Toast::setToast(1, "Service Added Successfully!!!", '');
                  $this->reservationModel->commit();

                  redirect('CustomerReservation/viewReservationLog');
                  
               }
               else
               {
                  $this->view('customer/customer-reservation', $data);
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
               'event_name' => '',
               'rvdate' => '',
               'rvtime' => '',
               'svp_id' => $spID,
               'price' => $price->price,
               'service_id' => $service_id,
               'crowdcount' => '',

               'rv_type_error' => '',
               'service_type_error'=>'',
               'package_type_error' => '',
               'package_name_error' => '',
               'service_name_error' => '',
               'event_name_error' => '',
               'rvdate_error' => '',
               'rvtime_error' => ''
            ];

            
            if($type == "Hotel"){
               $result = array($type,$name,$data,$maxcrowd);
            }else{
               $result = array($type,$name,$data);
            }
            $this->view('customer/customer-reservation', $result);

         }
  
      }

   }


   public function addReservationByPackages(){

      if(isset($_GET['package_name']) && isset($_GET['package_type'])){
         $name=$_GET['package_name'];
         $type=$_GET['package_type'];
         $sp_id_string = $_GET['sp_id_string'];
         $package_id = $_GET['package_id'];

         $price = $this->getPriceFromServiceIDType("Package", $package_id);

         if ($_SERVER['REQUEST_METHOD'] == 'POST')
         {
            $rv_type = trim($_POST['rv_type']);
            if($rv_type=='package'){
               $data = [

                  'rv_type' => trim($_POST['rv_type']),
                  'package_type'=>trim($_POST['package_type']),
                  'package_name' => trim($_POST['package_name']),
                  'event_name' => trim($_POST['event_name']),
                  'rvdate' => trim($_POST['rvdate']),
                  'rvtime' => trim($_POST['rvtime']),
                  'customer_id' => Session::getUser("id"),
                  'spv_id_string' => trim($_POST['spv_id_string']),
                  'price' => trim($_POST['price']),
                  'package_id'=>trim($_POST['package_id']),
      
                  'rv_type_error' => '',
                  'service_type_error'=>'',
                  'package_type_error' => '',
                  'package_name_error' => '',
                  'service_name_error' => '',
                  'event_name_error' => '',
                  'rvdate_error' => '',
                  'rvtime_error' => ''
                  
               ];
            }
            

            if ($_POST['action'] == "addrv")
            {
               // Validate everything
               $data['event_name_error'] = emptyCheck($data['event_name']);
               $data['rvdate_error'] = dateFormatValidation($data['rvdate']);
               $data['rvtime_error'] = timeFormatValidation($data['rvtime']);

               if (
                  empty($data['rv_type_error']) && empty($data['service_type_error']) && empty($data['package_type_error']) && empty($data['package_name_error']) 
                  && empty($data['service_name_error']) && empty($data['event_name_error']) && empty($data['rvdate_error']) && empty($data['rvtime_error'])
               )
               {
                  
                  $this->reservationModel->beginTransaction();
                  $this->reservationModel->addReservation($data);

                  Toast::setToast(1, "Service Added Successfully!!!", '');
                  $this->reservationModel->commit();

                  redirect('CustomerReservation/viewReservationLog');
                  
               }
               else
               {
                  $this->view('customer/customer-reservation', $data);
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
               'event_name' => '',
               'rvdate' => '',
               'rvtime' => '',
               'svp_id_string' => $sp_id_string,
               'package_id' => $package_id,
               'price' => $price->price,

               'rv_type_error' => '',
               'service_type_error'=>'',
               'package_type_error' => '',
               'package_name_error' => '',
               'service_name_error' => '',
               'event_name_error' => '',
               'rvdate_error' => '',
               'rvtime_error' => ''
            ];

            $result = array($type,$name,$data);
            $this->view('customer/customer-reservation', $result);

         }
  
      }

   }
   

   public function viewReservationLog(){
      $customerID = Session::getUser("id");
      $reservationsList = $this->reservationModel->getReservationsByCustomer($customerID);
      //$result = $this->reservationModel->getReservationDetails();
      $this->view('customer/reservationlog', $reservationsList);

   }

   public function editReservation(){
      if(isset($_GET['rv_id'])){
         $rv_editid=intval(trim($_GET['rv_id']));
      }
   
      if($_SERVER['REQUEST_METHOD'] == 'POST')
      {
            $data = [
               'event_name' => trim($_POST['event_name']),
               'rvdate' => trim($_POST['rvdate']),
               'rvtime' => trim($_POST['rvtime']),
               'rv_id' => trim($_POST['rv_id']),
   
               'event_name_error' => '',
               'rvdate_error' => '',
               'rvtime_error' => ''
               
            ];

            if ($_POST['action'] == "editrv")
            {
               // Validate everything
               $data['event_name_error'] = emptyCheck($data['event_name']);
               $data['rvdate_error'] = dateFormatValidation($data['rvdate']);
               $data['rvtime_error'] = emptyCheck($data['rvtime']);

               if (
                  empty($data['event_name_error']) && empty($data['rvdate_error']) && empty($data['rvtime_error'])
               )
               {
                  echo $data['rv_id'];
                  $this->reservationModel->beginTransaction();
                  $this->reservationModel->editReservation($data['rv_id'], $data);
                  Toast::setToast(1, "Reservation Edited Successfully!!!", '');
                  $this->reservationModel->commit();

                  redirect('CustomerReservation/viewReservationLog');
                  
               }
               else
               {
                  $this->view('customer/edit-service-package', $data);
               }
            }
            else
            {
               die("Something went wrong");
            }


      }
      else
      {
            $rvdata = $this->reservationModel->getReservationDetailsByReservationID($rv_editid);
            $data = [
               'event_name' => $rvdata->eventName,
               'rvdate' => $rvdata->rvDate,
               'rvtime' => $rvdata->rvTime,
               'rv_id' => $rv_editid,
               'event_name_error' => '',
               'rvdate_error' => '',
               'rvtime_error' => ''
            ];

            $this->view('customer/edit-service-package', $data);

          }
   }

   public function viewServiceReservationDetailsHotel()
   {

         if(isset($_GET['service_id'])){
            $serviceid=$_GET['service_id'];
         }

         if(isset($_GET['spType'])){
            $serviceType=$_GET['spType'];
         } 
      
         if(isset($_GET['sp_id'])){
            $spid=$_GET['sp_id'];
         }

         if(isset($_GET['rv_id'])){
            $rvid=$_GET['rv_id'];
         }

         $reservationsList = $this->reservationModel->getReservationDetails();
         $serviceproviderdetailList = $this->serviceProviderModel->getServiceProviderDetails();
         $hoteldetailslist = $this->hotelModel->getServicesByServiceProvider($spid);
         $result11 = array($serviceid,$serviceType,$spid,$rvid,$reservationsList,$serviceproviderdetailList,$hoteldetailslist);
         $this->view('customer/view-reservation-details-hotel',$result11);   
   }
 
   public function viewServiceReservationDetailsDeco()
   {
         // $customerID = Session::getUser("id");
         if(isset($_GET['service_id'])){
            $serviceid=$_GET['service_id'];
         }

         if(isset($_GET['spType'])){
            $serviceType=$_GET['spType'];
         } 
      
         if(isset($_GET['sp_id'])){
            $spid=$_GET['sp_id'];
         }

         if(isset($_GET['rv_id'])){
            $rvid=$_GET['rv_id'];
         }

         $reservationsList = $this->reservationModel->getReservationDetails();
         $serviceproviderdetailList = $this->serviceProviderModel->getServiceProviderDetails();
         $decodetailslist = $this->decoModel->getServicesByServiceProvider($spid);
         $result12 = array($serviceid,$serviceType,$spid,$rvid,$reservationsList,$serviceproviderdetailList,$decodetailslist);
         $this->view('customer/view-reservation-details-deco',$result12);
        
   }


   public function viewServiceReservationDetailsBand()
   {
         // $customerID = Session::getUser("id");
         if(isset($_GET['service_id'])){
            $serviceid=$_GET['service_id'];
         }

         if(isset($_GET['spType'])){
            $serviceType=$_GET['spType'];
         } 
      
         if(isset($_GET['sp_id'])){
            $spid=$_GET['sp_id'];
         }

         if(isset($_GET['rv_id'])){
            $rvid=$_GET['rv_id'];
         }

         $reservationsList = $this->reservationModel->getReservationDetails();
         $serviceproviderdetailList = $this->serviceProviderModel->getServiceProviderDetails();
         $banddetailslist = $this->bandModel->getServicesByServiceProvider($spid);
         $result13 = array($serviceid,$serviceType,$spid,$rvid,$reservationsList,$serviceproviderdetailList,$banddetailslist);
         $this->view('customer/view-reservation-details-band',$result13);
        
   }

   public function viewServiceReservationDetailsPhotography()
   {
         // $customerID = Session::getUser("id");
         if(isset($_GET['service_id'])){
            $serviceid=$_GET['service_id'];
         }

         if(isset($_GET['spType'])){
            $serviceType=$_GET['spType'];
         } 
      
         if(isset($_GET['sp_id'])){
            $spid=$_GET['sp_id'];
         }

         if(isset($_GET['rv_id'])){
            $rvid=$_GET['rv_id'];
         }

         $reservationsList = $this->reservationModel->getReservationDetails();
         $serviceproviderdetailList = $this->serviceProviderModel->getServiceProviderDetails();
         $photographydetailslist = $this->photographyModel->getServicesByServiceProvider($spid);
         $result14 = array($serviceid,$serviceType,$spid,$rvid,$reservationsList,$serviceproviderdetailList,$photographydetailslist);
         $this->view('customer/view-reservation-details-photography',$result14);
         
   }

   public function viewPackageReservationDetails()
   {

         if(isset($_GET['rv_id'])){
            $rvID=$_GET['rv_id'];
         }

         if(isset($_GET['service_id'])){
            $packageID=$_GET['service_id'];
         }

         $reservationsList = $this->reservationModel->getReservationDetails();
         $packageDetails = $this->packageModel->getPackageDetails();
         $resultpackage = array($rvID,$packageID,$reservationsList,$packageDetails);
         $this->view('customer/view-package-reservationlog',$resultpackage);   
   }
   
   public function deleteReservation(){

      if(isset($_GET['rv_id'])){
         $rvid=$_GET['rv_id'];

         $reservationDetails = $this->reservationModel->getReservationDetailsByReservationID($rvid);
         $serviceProviderDetails = $this->serviceProviderModel->getServiceProviderDetailsByID($reservationDetails->sp_id);
         $customerDetails = $this->customerModel->getCustomerDetailsByID($reservationDetails->customer_id);

         $email = $serviceProviderDetails->email;

         $emailData = [
            "sp_name" => $serviceProviderDetails->company_name,
            "event_name" => $reservationDetails->eventName,
            "customer_name" => $customerDetails->fname." ".$customerDetails->lname,
         ];

         $eventData = [
            "sp_user_id" => $reservationDetails->sp_id,
            "title" => $reservationDetails->eventName,
            "start" => $reservationDetails->rvDate,
            "end" => $reservationDetails->rvDate,
            "rv_id" => $rvid,
         ];

         $data =[
            "status" => "decline",
            "rv_id" => $rvid,
            "payment" => "not-paid"
         ];

         if($reservationDetails->status == "confirm"){
            EMAIL::sendReservationCancelToServiceProvider($email,$emailData);
            //cancel calendar event
            $this->reservationModel->deleteEvent($eventData);
            //cancel payment data
            $this->reservationModel->deletePayment($rvid);
         }

         $this->reservationModel->updateRvDetails($data);

         redirect('CustomerReservation/viewReservationLog');

      }
   }


   public function deleteReservationPackage(){

      if(isset($_GET['rv_id'])){
         $rvid=$_GET['rv_id'];

         $reservationDetails = $this->reservationModel->getReservationDetailsByReservationID($rvid);
         $customerDetails = $this->customerModel->getCustomerDetailsByID($reservationDetails->customer_id);
         $sp_id_string = $reservationDetails->sp_id;
         $sp_id_arr = explode (",", $sp_id_string);

         $eventData = [
            "title" => $reservationDetails->eventName,
            "start" => $reservationDetails->rvDate,
            "end" => $reservationDetails->rvDate,
            "rv_id" => $rvid,
         ];

         $data =[
            "status" => "decline",
            "rv_id" => $rvid,
            "payment" => "not-paid"
         ];

         if($reservationDetails->status == "confirm"){

            foreach ($sp_id_arr as $new_sp_id) :
               $serviceProviderDetails = $this->serviceProviderModel->getServiceProviderDetailsByID($new_sp_id);
               $email = $serviceProviderDetails->email;

               $emailData = [
                  "sp_name" => $serviceProviderDetails->company_name,
                  "event_name" => $reservationDetails->eventName,
                  "customer_name" => $customerDetails->fname." ".$customerDetails->lname,
               ];

               EMAIL::sendReservationCancelToServiceProvider($email,$emailData);
            endforeach;
            //cancel payment data
            $this->reservationModel->deletePayment($rvid);
         }
         
         $this->reservationModel->deleteEvent($eventData);
         $this->reservationModel->deleteFromPackageConfirmation($rvid);
         $this->reservationModel->updateRvDetails($data);

         redirect('CustomerReservation/viewReservationLog');

      }
   }

   public function home()
   {
      $this->view('customer/customer-home');
   }

   public function viewservices()
   {
      redirect('customerDashboard/viewservices');
   }
   public function logout()
   {
      redirect('User/signout');
   }
 
}
