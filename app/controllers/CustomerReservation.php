<?php
class CustomerReservation extends Controller
{
   public function __construct()
   {
      Session::validateSession([3]);
      $this->reservationModel = $this->model('ReservationModel');
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

   public function editReservation($id){

   }

   public function deleteReservation($id){

   }

   public function home()
   {
      $this->view('customer/customer-home');
   }
   public function addservices()
   {
      redirect('DecoService/addNewService');
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