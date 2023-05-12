<?php
class DecoService extends Controller
{
   public function __construct()
   {
      //validate that the session belongs to a user with a role ID of 5
      Session::validateSession([5]);
      //load the deco model to interact with the database
      $this->decoModel = $this->model('DecoModel');
   }

   public function viewAllServices()
   {
      //get the ID of the logged in service provider from the session
      $serviceproviderID = Session::getUser("id");
      //retrieve the details of all the services provided by the service provider
      $result = $this->decoModel->getServicesByServiceProvider($serviceproviderID);
      //load the view and pass the retrieved data from the database
      $this->view('decoCompany/serviceslist',  $result);
   }

   public function addNewService()
   {

      //check if the form has been submitted
      if ($_SERVER['REQUEST_METHOD'] == 'POST')
      {
         $chk=""; 

         //check if the 'decoration' field has been checked and set its value to $chk
         if(isset($_POST['decoration'])){
            $checkbox1=$_POST['decoration'];  
               
               foreach($checkbox1 as $chk1)  
                  {  
                     $chk .= $chk1.", ";  
                  }
         }  


         //collect the data submitted through the form and set default values for error messages
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
            'deco_error' => '',
            'theme_error' => ''
         ];

         //check if the form is being submitted to add a new service
         if ($_POST['action'] == "addservice")
         {
            // Validate everything
            $data['name_error'] = emptyCheck($data['name']);
            $data['price_error'] = validatePrice($data['price']);
            $data['theme_error'] = emptyCheck($data['theme']);
            $data['deco_error'] = emptyCheck($data['decoration']);


            //if all fields are valid, add the new service and redirect to the services list page
            if (
               empty($data['theme_error']) && empty($data['name_error']) && empty($data['price_error']) && empty($data['deco_error'])
            )
            {
                
               $this->decoModel->beginTransaction();
               $this->decoModel->addDecoService($data);
               $this->decoModel->commit();

               Toast::setToast(1, "Service Added Successfully!!!", "");

               redirect('decoService/viewAllServices');
               
            }
            //if any filed is invalid, show the form with error messages
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
      //if the form has not been submitted, show the form with default values
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
            'theme_error' => '',
            'deco_error' => ''
         ];

         $this->view('decoCompany/addservices', $data);
      }
   }

   public function viewEachService(){
         //check if the service_id is set in GET parameters
         if(isset($_GET['service_id'])){
            //get the service_id from the GET parameters
            $id=$_GET['service_id'];
            //get the details of the service from the database using the model
            $result = $this->decoModel->getDecoServiceDetailsByServiceID($id);
            //display the view with the service details
            $this->view('decoCompany/viewoneservice', $result);
         }
   }

   public function editService(){

      //check if service_id is set in the URL parameter
      if(isset($_GET['service_id'])){
         $sv_editid=intval(trim($_GET['service_id']));
      }

      //check if the request method is POST
      if ($_SERVER['REQUEST_METHOD'] == 'POST')
      {
         $chk="";
         
         //check if the decoration checkbox is set in the POST data
         if(isset($_POST['decoration'])){
            $checkbox1=$_POST['decoration'];  
               
               //concatenate all the selected decoration items
               foreach($checkbox1 as $chk1)  
                  {  
                     $chk .= $chk1.", ";  
                  }
         }   

         //store all the form data in an array
         $data = [

            'name' => trim($_POST['service_name']),
            'price' => trim($_POST['price']),
            'decoration'=>$chk,
            'other_deco' => trim($_POST['other_deco']),
            'theme' => trim($_POST['theme']),
            'sv_id' => trim($_POST['sv_id']),

            'name_error' => '',
            'description_error'=>'',
            'price_error' => '',
            'deco_error' => '',
            'theme_error' => ''
         ];

         //check if the form action is editservice
         if ($_POST['action'] == "editservice")
         {
            // Validate all form inputs
            $data['name_error'] = emptyCheck($data['name']);
            $data['price_error'] = validatePrice($data['price']);
            $data['theme_error'] = emptyCheck($data['theme']);
            $data['deco_error'] = emptyCheck($data['decoration']);

            //check if all the inputs are valid, if yes then update the service
            if (
               empty($data['theme_error']) && empty($data['name_error']) && empty($data['price_error']) && empty($data['deco_error'])
            )
            {
               //start a database transaction 
               $this->decoModel->beginTransaction();
               //update the service in the database
               $this->decoModel->editDecoServicebyID($data['sv_id'], $data);
               //commit the database transaction
               $this->decoModel->commit();

               //show success toast message and redirect to view all services page
               Toast::setToast(1, "Service Edited Successfully!!!", "");

               redirect('decoService/viewAllServices');
               
            }

            //if any input is invalid, then show the form again with error messages
            else
            {
               $this->view('decoCompany/editservice', $data);
            }
         }

         //if the form action is not editservice, then show an error message
         else
         {
            die("Something went wrong");
         }
         
      }

      //if the request method is not POST, then show the form with service details
      else
      {

         //get the service details by service_id from the database
         $svdetails = $this->decoModel->getDecoServiceDetailsByServiceID($sv_editid);

         //store the service details in an array
         $data = [
            'name' => $svdetails->service_name,
            'price' => $svdetails->price,
            'decoration'=> $svdetails->decoration_item,
            'other_deco' => $svdetails->other_decoration,
            'theme' => $svdetails->theme,
            'sv_id' => $sv_editid,

            'name_error' => '',
            'price_error' => '',
            'theme_error' => '',
            'deco_error' => ''
         ];

         //display the view editservice
         $this->view('decoCompany/editservice', $data);
      }
   }

   public function deleteService($id){

   }

   public function activate(){
      if (isset($_GET['service_id'])){

         //get the service_id from the URL parameters
         $service_id=$_GET['service_id'];
   
         //activate the service in the database using the decoModel
         if($this->decoModel->activate_deactivate("activate",1,$service_id))
            //redirect to view all services page if successful
            redirect('DecoService/viewAllServices');
     }
   
   }

   public function deactivate(){
      if (isset($_GET['service_id'])){

         //get the service_id from the URL parameters
         $service_id=$_GET['service_id'];

         //deactivate the service in the database using the decoModel
         if($this->decoModel->activate_deactivate("deactivate",0,$service_id))
            
            redirect('DecoService/viewAllServices');
     }

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
