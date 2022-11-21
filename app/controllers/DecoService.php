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
      $result = $this->decoModel->getDecoServiceDetails();
      $this->view('decoCompany/serviceslist',  $result);
   }

   public function addNewService()
   {

      if ($_SERVER['REQUEST_METHOD'] == 'POST')
      {

         $data = [

            'name' => trim($_POST['service_name']),
            'price' => trim($_POST['price']),
            'description'=>trim($_POST['description']),
            'occasion' => trim($_POST['occasion']),
            'theme' => trim($_POST['theme']),

            'name_error' => '',
            'description_error'=>'',
            'price_error' => '',
            'occasion_error' => '',
            'theme_error' => ''
         ];

         if ($_POST['action'] == "addservice")
         {
            // Validate everything
            $data['name_error'] = emptyCheck($data['name']);
            $data['description_error'] = emptyCheck($data['description']);
            $data['price_error'] = validatePrice($data['price']);
            $data['occasion_error'] = emptyCheck($data['occasion']);
            $data['theme_error'] = emptyCheck($data['theme']);

            if (
               empty($data['theme_error']) && empty($data['name_error']) && empty($data['price_error']) && empty($data['description_error']) && empty($data['occasion_error'])
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
               $this->view('decoCompany/addservice', $data);
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
            'description'=>'',
            'occasion' => '',
            'theme' => '',

            'name_error' => '',
            'description_error'=>'',
            'price_error' => '',
            'occasion_error' => '',
            'theme_error' => ''
         ];

         $this->view('decoCompany/addservice', $data);
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
