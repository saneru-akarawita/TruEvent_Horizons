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
         $chk=""; 
         if(isset($_POST['decoration'])){
            $checkbox1=$_POST['decoration'];  
               
               foreach($checkbox1 as $chk1)  
                  {  
                     $chk .= $chk1.", ";  
                  }
         }  

         $targetDir = APPROOT."/../public/images/uploadimages/deco/";
         $fileName = basename($_FILES["deco_image"]["name"]);
         $completePath = $targetDir . $fileName;
         $fileType = pathinfo($completePath,PATHINFO_EXTENSION);
         $allowTypes = array('jpg','png','jpeg','gif','pdf');

         $filename_without_ext = substr($fileName, 0, strrpos($fileName, "."));

         $uniqueFileName = $filename_without_ext.time().".".$fileType;
         $targetFilePath = $targetDir . $uniqueFileName;
         $statusMsg = '';


         $data = [

            'name' => trim($_POST['service_name']),
            'deco_image' => $uniqueFileName,
            'price' => trim($_POST['price']),
            'decoration'=>$chk,
            'other_deco' => trim($_POST['other_deco']),
            'theme' => trim($_POST['theme']),
            'service_provider_id' => Session::getUser("id"),

            'name_error' => '',
            'deco_image_error'=>$statusMsg,
            'description_error'=>'',
            'price_error' => '',
            'deco_error' => '',
            'theme_error' => ''
         ];

         if ($_POST['action'] == "addservice")
         {
            // Validate everything
            $data['name_error'] = emptyCheck($data['name']);
            $data['price_error'] = validatePrice($data['price']);
            $data['theme_error'] = emptyCheck($data['theme']);
            $data['deco_error'] = emptyCheck($data['decoration']);

            if (
               empty($data['theme_error']) && empty($data['name_error'])
                && empty($data['price_error']) && empty($data['deco_error']) && empty($data['deco_image_error'])
            )
            {
               if(in_array($fileType, $allowTypes)){
                  // Upload file to server
                  if(move_uploaded_file($_FILES["deco_image"]["tmp_name"], $targetFilePath)){
                     if($fileType == "jpg" || $fileType == "jpeg"){
                        $image = imagecreatefromjpeg($targetFilePath); // Assuming the uploaded file is JPEG format
                        $resizedImage = imagescale($image, 5500, 3667); // Resize the image to the desired dimensions
                        imagejpeg($resizedImage, $targetFilePath, 80);
                        $statusMsg = '';
                     }else if($fileType == "png"){
                        $image = imagecreatefrompng($targetFilePath); // Assuming the uploaded file is PNG format
                        $resizedImage = imagescale($image, 5500, 3667); // Resize the image to the desired dimensions
                        imagepng($resizedImage, $targetFilePath, 8);
                        $statusMsg = '';
                     }
                        
                  }else{
                        $statusMsg = "Sorry, there was an error uploading your file.";
                  }
               }else{
                  $statusMsg = 'Sorry, only JPG, JPEG, PNG, GIF, & PDF files are allowed to upload.';
               }

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
            'deco_image' => '',
            'price' => '',
            'decoration'=>'',
            'other_deco' => '',
            'theme' => '',
            'service_provider_id' => '',

            'name_error' => '',
            'price_error' => '',
            'theme_error' => '',
            'deco_error' => '',
            'deco_image_error'=>''
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

   public function editService(){

      if(isset($_GET['service_id'])){
         $sv_editid=intval(trim($_GET['service_id']));
      }

      if ($_SERVER['REQUEST_METHOD'] == 'POST')
      {
         $chk=""; 
         if(isset($_POST['decoration'])){
            $checkbox1=$_POST['decoration'];  
               
               foreach($checkbox1 as $chk1)  
                  {  
                     $chk .= $chk1.", ";  
                  }
         }   

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

         if ($_POST['action'] == "editservice")
         {
            // Validate everything
            $data['name_error'] = emptyCheck($data['name']);
            $data['price_error'] = validatePrice($data['price']);
            $data['theme_error'] = emptyCheck($data['theme']);
            $data['deco_error'] = emptyCheck($data['decoration']);

            if (
               empty($data['theme_error']) && empty($data['name_error']) && empty($data['price_error']) && empty($data['deco_error'])
            )
            {
                
               $this->decoModel->beginTransaction();
               $this->decoModel->editDecoServicebyID($data['sv_id'], $data);
               $this->decoModel->commit();

               Toast::setToast(1, "Service Edited Successfully!!!", "");

               redirect('decoService/viewAllServices');
               
            }
            else
            {
               $this->view('decoCompany/editservice', $data);
            }
         }
         else
         {
            die("Something went wrong");
         }
         
      }
      else
      {
         $svdetails = $this->decoModel->getDecoServiceDetailsByServiceID($sv_editid);

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

         $this->view('decoCompany/editservice', $data);
      }
   }

   public function deleteService($id){

   }

   public function activate(){
      if (isset($_GET['service_id'])){

         $service_id=$_GET['service_id'];
   
         if($this->decoModel->activate_deactivate("activate",1,$service_id))
            redirect('DecoService/viewAllServices');
     }
   
   }

   public function deactivate(){
      if (isset($_GET['service_id'])){

         $service_id=$_GET['service_id'];

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
