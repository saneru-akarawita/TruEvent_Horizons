<?php
class HotelService extends Controller
{
   public function __construct()
   {
      Session::validateSession([4]);
      $this->hotelModel = $this->model('HotelModel');
   }

   public function viewAllServices()
   {
      $serviceproviderID = Session::getUser("id");
      $result = $this->hotelModel->getServicesByServiceProvider($serviceproviderID);
      $this->view('hotelManager/view-services-more',  $result);
   }

   public function addNewService()
   {

      if ($_SERVER['REQUEST_METHOD'] == 'POST')
      {

         $data = [

            'event_name' => trim($_POST['event_name']),
            'hotel_image' => trim($_POST['hotel_image']),
            'hall_name'=>trim($_POST['hall_name']),
            'location' => trim($_POST['location']),
            'max_crowd' => trim($_POST['max_crowd']),
            'price' => trim($_POST['price']),
            'hall_type' => trim($_POST['hall_type']),
            'ac_status'=>trim($_POST['ac_status']),
            'other_facilities' => trim($_POST['other_facilities']),
            'service_provider_id' => Session::getUser("id"),

            'event_name_error' => '',
            'hotel_image_error'=>'',
            'hall_name_error' => '',
            'location_error' => '',
            'max_crowd_error' => '',
            'price_error' => '',
            'hall_type_error'=>'',
            'ac_status_error' => ''
            
         ];

         if ($_POST['action'] == "addservices")
         {
            // Validate everything
            $data['event_name_error'] = emptyCheck($data['event_name']);
            $data['hotel_image_error'] = emptyCheck($data['hotel_image']);
            $data['price_error'] = validatePrice($data['price']);
            $data['hall_name_error'] = emptyCheck($data['hall_name']);
            $data['location_error'] = emptyCheck($data['location']);
            $data['max_crowd_error'] = emptyCheck($data['max_crowd']);
            $data['hall_type_error'] = emptyCheck($data['hall_type']);
            $data['ac_status_error'] = emptyCheck($data['ac_status']);

            if (
               empty($data['event_name_error']) && empty($data['hotel_image_error']) && empty($data['price_error']) && empty($data['hall_name_error']) 
               && empty($data['location_error']) && empty($data['max_crowd_error']) && empty($data['hall_type_error']) && empty($data['ac_status_error'])
            )
            {
                
               $this->hotelModel->beginTransaction();
               $this->hotelModel->addHotelService($data);
               $this->hotelModel->commit();

               Toast::setToast(1, "Service Added Successfully!!!", "");

               redirect('HotelService/viewAllServices');
               
            }
            else
            {
               $this->view('hotelManager/add-service-hotel', $data);
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
            'hotel_image' => '',
            'hall_name'=>'',
            'location' => '',
            'max_crowd' => '',
            'price' => '',
            'hall_type' => '',
            'ac_status'=>'',
            'other_facilities' => '',
            'service_provider_id' => '',

            'event_name_error' => '',
            'hotel_image_error'=>'',
            'hall_name_error' => '',
            'location_error' => '',
            'max_crowd_error' => '',
            'price_error' => '',
            'hall_type_error'=>'',
            'ac_status_error' => ''
         ];

         $this->view('hotelManager/add-service-hotel', $data);
      }
   }

   public function viewEachService(){
         if(isset($_GET['service_id'])){
            $id=$_GET['service_id'];
            $result = $this->hotelModel->getHotelServiceDetailsByServiceID($id);
            $this->view('hotelManager/view-each-service', $result);
         }
   }

   public function editService(){

      if(isset($_GET['service_id'])){
         $sv_editid=intval(trim($_GET['service_id']));
      }

      if ($_SERVER['REQUEST_METHOD'] == 'POST')
      {
         $checkbox1=$_POST['hotel'];  
            $chk="";  
            foreach($checkbox1 as $chk1)  
               {  
                  $chk .= $chk1.", ";  
               }  

         $data = [

            'event_name' => trim($_POST['event_name']),
            'hall_name'=>trim($_POST['hall_name']),
            'location' => trim($_POST['location']),
            'max_crowd' => trim($_POST['max_crowd']),
            'price' => trim($_POST['price']),
            'hall_type' => trim($_POST['hall_type']),
            'ac_status'=>trim($_POST['ac_status']),
            'other_facilities' => trim($_POST['other_facilities']),
            'sv_id' => trim($_POST['sv_id']),

            'event_name_error' => '',
            'hotel_image_error'=>'',
            'hall_name_error' => '',
            'location_error' => '',
            'max_crowd_error' => '',
            'price_error' => '',
            'hall_type_error'=>'',
            'ac_status_error' => ''
         ];

         if ($_POST['action'] == "editservice")
         {
            // Validate everything
            $data['event_name_error'] = emptyCheck($data['event_name']);
            $data['price_error'] = validatePrice($data['price']);
            $data['hall_name_error'] = emptyCheck($data['hall_name']);
            $data['location_error'] = emptyCheck($data['location']);
            $data['max_crowd_error'] = emptyCheck($data['max_crowd']);
            $data['hall_type_error'] = emptyCheck($data['hall_type']);
            $data['ac_status_error'] = emptyCheck($data['ac_status']);

            if (
               empty($data['event_name_error']) && empty($data['hotel_image_error']) && empty($data['price_error']) && empty($data['hall_name_error']) 
               && empty($data['location_error']) && empty($data['max_crowd_error']) && empty($data['hall_type_error']) && empty($data['ac_status_error'])
            )
            {
                
               $this->hotelModel->beginTransaction();
               $this->hotelModel->editHotelServicebyID($data['sv_id'],$data);
               $this->hotelModel->commit();

               Toast::setToast(1, "Service Edited Successfully!!!", "");

               redirect('HotelService/viewAllServices');
               
            }
            else
            {
               $this->view('hotelManager/edit-service', $data);
            }
         }
         else
         {
            die("Something went wrong");
         }
         
      }
      else
      {

         $svdetails = $this->hotelModel->gethotelServiceDetailsByServiceID($sv_editid);
         
         $data = [
            'event_name' =>  $svdetails->event_name,
            'hall_name'=>  $svdetails->hall_name,
            'location' =>  $svdetails->location,
            'max_crowd' =>  $svdetails->max_crowd,
            'price' =>  $svdetails->price,
            'hall_type' =>  $svdetails->hall_type,
            'ac_status'=>  $svdetails->ac_status,
            'other_facilities' =>  $svdetails->other_facilities,
            'sv_id' =>  $sv_editid,

            'event_name_error' => '',
            'hall_name_error' => '',
            'location_error' => '',
            'max_crowd_error' => '',
            'price_error' => '',
            'hall_type_error'=>'',
            'ac_status_error' => ''
         ];

         $this->view('hotelManager/edit-service', $data);
      }
   }

   public function deleteService($id){

   }

   public function activate(){
      if (isset($_GET['service_id'])){

         $service_id=$_GET['service_id'];
   
         if($this->hotelModel->activate_deactivate("activate",1,$service_id))
            redirect('HotelService/viewAllServices');
     }
   
   }

   public function deactivate(){
      if (isset($_GET['service_id'])){

         $service_id=$_GET['service_id'];

         if($this->hotelModel->activate_deactivate("deactivate",0,$service_id))
            redirect('HotelService/viewAllServices');
     }

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
   public function logout()
   {
      redirect('User/signout');
   }
 
}
