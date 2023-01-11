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
         $checkbox1=$_POST['band'];  
            $chk="";  
            foreach($checkbox1 as $chk1)  
               {  
                  $chk .= $chk1.", ";  
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
            'other_band_error' => '',
            'num_players_error' => ''
         ];

         if ($_POST['action'] == "addservice")
         {
            // Validate everything
            $data['name_error'] = emptyCheck($data['name']);
            $data['price_error'] = validatePrice($data['price']);
            $data['num_players_error'] = emptyCheck($data['num_players']);

            if (
               empty($data['num_players_error']) && empty($data['name_error']) && empty($data['price_error'])
            )
            {
                
               $this->bandModel->beginTransaction();
               $this->bandModel->addBandService($data);
               $this->bandModel->commit();

               Toast::setToast(1, "Service Added Successfully!!!", "");

               redirect('band/viewAllServices');
               
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
            'num_players_error' => ''
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

   public function editService($id){

   }

   public function deleteService($id){

   }


   public function home()
   {
      $this->view('band/homepage');
   }
   public function addservices()
   {
      redirect('band/addNewService');
   }
   public function viewservices()
   {
      redirect('band/viewAllServices');
   }
   public function logout()
   {
      redirect('User/signout');
   }
 
}
