<?php
class PhotographyService extends Controller
{
   public function __construct()
   {
      Session::validateSession([6]);
      $this->photographyModel = $this->model('PhotographyModel');
   }

   public function viewAllServices()
   {
      $serviceproviderID = Session::getUser("id");
      $result = $this->photographyModel->getServicesByServiceProvider($serviceproviderID);
      $this->view('photography/serviceslist',  $result);
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
            'photography'=>$chk,
            'other_photography' => trim($_POST['other_photography']),
            // 'num_players' => trim($_POST['num_players']),
            'service_provider_id' => Session::getUser("id"),

            'name_error' => '',
            'description_error'=>'',
            'price_error' => '',
            'other_photography_error' => ''
            // 'num_members_error' => ''
         ];

         if ($_POST['action'] == "addservice")
         {
            // Validate everything
            $data['name_error'] = emptyCheck($data['name']);
            $data['price_error'] = validatePrice($data['price']);
            // $data['num_members_error'] = emptyCheck($data['num_members']);

            if (
               // empty($data['num_players_error']) && 
               empty($data['name_error']) && empty($data['price_error'])
            )
            {
                
               $this->photographyModel->beginTransaction();
               $this->photographyModel->addPhotographyService($data);
               $this->photographyModel->commit();

               Toast::setToast(1, "Service Added Successfully!!!", "");

               redirect('PhotographyService/viewAllServices');
               
            }
            else
            {
               $this->view('photography/addservices', $data);
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
            'photography'=>'',
            'other_photography' => '',
            // 'num_members' => '',
            'service_provider_id' => '',

            'name_error' => '',
            'price_error' => ''
            // 'num_members_error' => ''
         ];

         $this->view('photography/addservices', $data);
      }
   }

   public function viewEachService(){
         if(isset($_GET['service_id'])){
            $id=$_GET['service_id'];
            $result = $this->photographyModel->getBandServiceDetailsByServiceID($id);
            $this->view('photography/viewoneservice', $result);
         }
   }

   public function editService($id){

   }

   public function deleteService($id){

   }

   public function activate(){
      if (isset($_GET['service_id'])){

         $service_id=$_GET['service_id'];
   
         if($this->photographyModel->activate_deactivate("activate",1,$service_id))
            redirect('PhotographyService/viewAllServices');
     }
   
   }

   public function deactivate(){
      if (isset($_GET['service_id'])){

         $service_id=$_GET['service_id'];

         if($this->photographyModel->activate_deactivate("deactivate",0,$service_id))
            redirect('PhotographyService/viewAllServices');
     }

   }



   public function home()
   {
      $this->view('photography/homepage');
   }
   public function addservices()
   {
      redirect('PhotographyService/addNewService');
   }
   public function viewservices()
   {
      redirect('PhotographyService/viewAllServices');
   }
   public function logout()
   {
      redirect('User/signout');
   }
 
}
