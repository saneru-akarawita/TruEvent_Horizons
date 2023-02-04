<?php
class CustomerReservation extends Controller
{
   public function __construct()
   {
      Session::validateSession([3]);
      $this->reservationModel = $this->model('ReservationModel');
      $this->decoModel = $this->model('DecoModel');
      $this->hotelModel = $this->model('HotelModel');
      $this->bandModel = $this->model('BandModel');
      $this->photographyModel = $this->model('PhotographyModel');
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
            // $result = $this->packageModel->getPriceFromPackageID($package_id);
            break;
      }
      return $result;
   }

   public function addReservation()
   {

      if ($_SERVER['REQUEST_METHOD'] == 'POST')
      {
         $rv_type = trim($_POST['rv_type']);

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
               'svp_id' => trim($_POST['sp_id']),
               'price' => trim($_POST['price']),
   
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
            $data['rvdate_error'] = emptyCheck($data['rvdate']);
            $data['rvtime_error'] = emptyCheck($data['rvtime']);

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
         $price = $this->getPriceFromServiceIDType($type, $service_id);

         if ($_SERVER['REQUEST_METHOD'] == 'POST')
         {
            $rv_type = trim($_POST['rv_type']);
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
                  'svp_id' => trim($_POST['sp_id']),
                  'price' => trim($_POST['price']),
      
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
               $data['rvdate_error'] = emptyCheck($data['rvdate']);
               $data['rvtime_error'] = emptyCheck($data['rvtime']);

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
               $data['rvdate_error'] = emptyCheck($data['rvdate']);
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

   public function deleteReservation($id){

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
