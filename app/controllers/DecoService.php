<?php
class DecoService extends Controller
{
   public function __construct()
   {
      Session::validateSession([5]);
      $this->decoModel = $this->model('DecoModel');
   }

   public function viewAllServices()
   {
      $serviceproviderID = Session::getUser("id");
      $result = $this->decoModel->getServicesByServiceProvider($serviceproviderID);
      $this->view('decoCompany/serviceslist',  $result);
   }

   public function addNewService()
   {

      if ($_SERVER['REQUEST_METHOD'] == 'POST')
      {
         $checkbox1=$_POST['decoration'];  
            $chk="";  
            foreach($checkbox1 as $chk1)  
               {  
                  $chk .= $chk1.", ";  
               }  

         $data = [

            'name' => trim($_POST['service_name']),
            'price' => trim($_POST['price']),
            'decoration'=>$chk,
            'other_deco' => trim($_POST['other_deco']),
            'theme' => trim($_POST['theme']),
            'service_provider_id' => Session::getUser("id"),

            'name_error' => '',
            'description_error'=>'',
            'price_error' => '',
            'other_deco_error' => '',
            'theme_error' => ''
         ];

         if ($_POST['action'] == "addservice")
         {
            // Validate everything
            $data['name_error'] = emptyCheck($data['name']);
            $data['price_error'] = validatePrice($data['price']);
            $data['theme_error'] = emptyCheck($data['theme']);

            if (
               empty($data['theme_error']) && empty($data['name_error']) && empty($data['price_error'])
            )
            {
                
               $this->decoModel->beginTransaction();
               $this->decoModel->addDecoService($data);
               $this->decoModel->commit();

               Toast::setToast(1, "Service Added Successfully!!!", "");

               redirect('decoService/viewAllServices');
               
            }
            else
            {
               $this->view('decoCompany/addservices', $data);
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
            'decoration'=>'',
            'other_deco' => '',
            'theme' => '',
            'service_provider_id' => '',

            'name_error' => '',
            'price_error' => '',
            'theme_error' => ''
         ];

         $this->view('decoCompany/addservices', $data);
      }
   }

   public function viewEachService(){
         if(isset($_GET['service_id'])){
            $id=$_GET['service_id'];
            $result = $this->decoModel->getDecoServiceDetailsByServiceID($id);
            $this->view('decoCompany/viewoneservice', $result);
         }
   }

   public function editService($id){

   }

   public function deleteService($id){

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
   public function logout()
   {
      redirect('User/signout');
   }
 
}
