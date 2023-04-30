<?php
class BandService extends Controller
{
   public function __construct()
   {
      Session::validateSession([6]);
      $this->bandModel = $this->model('BandModel');
   }

   public function viewAllServices()
   {
      $serviceproviderID = Session::getUser("id");
      $result = $this->bandModel->getServicesByServiceProvider($serviceproviderID);
      $this->view('band/serviceslist',  $result);
   }

   public function addNewService()
   {

      if ($_SERVER['REQUEST_METHOD'] == 'POST')
      {
         $chk="";
         if(isset($_POST['band'])){
            $checkbox1=$_POST['band'];  
               
               foreach($checkbox1 as $chk1)  
                  {  
                     $chk .= $chk1.", ";  
                  } 
         } 

         $data = [

            'name' => trim($_POST['service_name']),
            'price' => trim($_POST['price']),
            'band'=>$chk,
            'other_band' => trim($_POST['other_band']),
            'num_players' => trim($_POST['num_players']),
            'service_provider_id' => Session::getUser("id"),

            'name_error' => '',
            'description_error'=>'',
            'price_error' => '',
            'band_error' => '',
            'num_players_error' => ''
         ];

         if ($_POST['action'] == "addservice")
         {
            // Validate everything
            $data['name_error'] = emptyCheck($data['name']);
            $data['price_error'] = validatePrice($data['price']);
            $data['num_players_error'] = emptyCheck($data['num_players']);
            $data['band_error'] = emptyCheck($data['band']);

            if (
               empty($data['num_players_error']) && empty($data['name_error']) && empty($data['price_error']) && empty($data['band_error'])
            )
            {
                
               $this->bandModel->beginTransaction();
               $this->bandModel->addBandService($data);
               $this->bandModel->commit();

               Toast::setToast(1, "Service Added Successfully!!!", "");

               redirect('BandService/viewAllServices');
               
            }
            else
            {
               $this->view('band/addservices', $data);
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
            'name' => '',
            'price' => '',
            'band'=>'',
            'other_band' => '',
            'num_players' => '',
            'service_provider_id' => '',

            'name_error' => '',
            'price_error' => '',
            'num_players_error' => '',
            'band_error' => ''
         ];

         $this->view('band/addservices', $data);
      }
   }

   public function viewEachService(){
         if(isset($_GET['service_id'])){
            $id=$_GET['service_id'];
            $result = $this->bandModel->getBandServiceDetailsByServiceID($id);
            $this->view('band/viewoneservice', $result);
         }
   }

   public function editService(){

      if(isset($_GET['service_id'])){
         $sv_editid=intval(trim($_GET['service_id']));
      }

      if ($_SERVER['REQUEST_METHOD'] == 'POST')
      {
         $chk="";
         if(isset($_POST['band'])){
            $checkbox1=$_POST['band'];    
               foreach($checkbox1 as $chk1)  
                  {  
                     $chk .= $chk1.", ";  
                  } 
         } 

         $data = [

            'name' => trim($_POST['service_name']),
            'price' => trim($_POST['price']),
            'band'=>$chk,
            'other_band' => trim($_POST['other_band']),
            'num_players' => trim($_POST['num_players']),
            'sv_id' => trim($_POST['sv_id']),

            'name_error' => '',
            'description_error'=>'',
            'price_error' => '',
            'band_error' => '',
            'num_players_error' => ''
         ];

         if ($_POST['action'] == "editservice")
         {
            // Validate everything
            $data['name_error'] = emptyCheck($data['name']);
            $data['price_error'] = validatePrice($data['price']);
            $data['num_players_error'] = emptyCheck($data['num_players']);
            $data['band_error'] = emptyCheck($data['band']);

            if (
               empty($data['name_error']) && empty($data['price_error']) && empty($data['num_players_error']) && empty($data['band_error'])
            )
            {
                
               $this->bandModel->beginTransaction();
               $this->bandModel->editBandServicebyID($data['sv_id'], $data);
               $this->bandModel->commit();

               Toast::setToast(1, "Service Edited Successfully!!!", "");

               redirect('bandService/viewAllServices');
               
            }
            else
            {
               $this->view('band/editservice', $data);
            }
         }
         else
         {
            die("Something went wrong");
         }
         
      }
      else
      {
         $svdetails = $this->bandModel->getBandServiceDetailsByServiceID($sv_editid);

         $data = [
            'name' => $svdetails->service_name,
            'price' => $svdetails->price,
            'band'=> $svdetails->band_type,
            'other_band' => $svdetails->other_band_type,
            'num_players' => $svdetails->no_of_players,
            'sv_id' => $sv_editid,

            
            'name_error' => '',
            'price_error' => '',
            'num_players_error' => '',
            'band_error' => ''
         ];

         $this->view('band/editservice', $data);
      }
   }

   public function deleteService($id){

   }
 
   public function activate(){
      if (isset($_GET['service_id'])){

         $service_id=$_GET['service_id'];
   
         if($this->bandModel->activate_deactivate("activate",1,$service_id))
            redirect('BandService/viewAllServices');
     }
   
   }

   public function deactivate(){
      if (isset($_GET['service_id'])){

         $service_id=$_GET['service_id'];

         if($this->bandModel->activate_deactivate("deactivate",0,$service_id))
            redirect('BandService/viewAllServices');
     }

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
   public function logout()
   {
      redirect('User/signout');
   }
 
}
