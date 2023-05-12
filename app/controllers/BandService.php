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

         $targetDir = APPROOT."/../public/images/uploadimages/band/";
         $fileName = basename($_FILES["band_image"]["name"]);
         $completePath = $targetDir . $fileName;
         $fileType = pathinfo($completePath,PATHINFO_EXTENSION);
         $allowTypes = array('jpg','png','jpeg','gif','pdf');

         $filename_without_ext = substr($fileName, 0, strrpos($fileName, "."));

         $uniqueFileName = $filename_without_ext.time().".".$fileType;
         $targetFilePath = $targetDir . $uniqueFileName;
         $statusMsg = '';

         $data = [

            'name' => trim($_POST['service_name']),
            'band_image' => $uniqueFileName,
            'price' => trim($_POST['price']),
            'band'=>$chk,
            'other_band' => trim($_POST['other_band']),
            'num_players' => trim($_POST['num_players']),
            'service_provider_id' => Session::getUser("id"),
            'duration' => trim($_POST['duration']),

            'name_error' => '',
            'band_image_error'=>$statusMsg,
            'description_error'=>'',
            'price_error' => '',
            'band_error' => '',
            'num_players_error' => '',
            'duration_error' => '',
         ];

         if ($_POST['action'] == "addservice")
         {
            // Validate everything
            $data['name_error'] = emptyCheck($data['name']);
            $data['price_error'] = validatePrice($data['price']);
            $data['num_players_error'] = positiveIntegerValidation($data['num_players']);
            $data['band_error'] = emptyCheck($data['band']);
            $data['duration_error'] = positiveDecimalValidation($data['duration']);
         

            if (
               empty($data['num_players_error']) && empty($data['name_error']) && empty($data['price_error']) 
               && empty($data['band_error'] ) && empty($data['duration_error']) && empty($data['band_image_error'])
            )
            {
             
               if(in_array($fileType, $allowTypes)){
                  // Upload file to server
                  if(move_uploaded_file($_FILES["band_image"]["tmp_name"], $targetFilePath)){
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
            'band_image' => '',
            'price' => '',
            'band'=>'',
            'other_band' => '',
            'num_players' => '',
            'service_provider_id' => '',
            'duration' => '',

            'name_error' => '',
            'band_image_error'=>'',
            'price_error' => '',
            'num_players_error' => '',
            'band_error' => '',
            'duration_error' => ''

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
            'duration' => trim($_POST['duration']),

            'name_error' => '',
            'description_error'=>'',
            'price_error' => '',
            'band_error' => '',
            'num_players_error' => '',
            'duration_error' => '',
         ];

         if ($_POST['action'] == "editservice")
         {
            // Validate everything
            $data['name_error'] = emptyCheck($data['name']);
            $data['price_error'] = validatePrice($data['price']);
            $data['num_players_error'] = positiveIntegerValidation($data['num_players']);
            $data['band_error'] = emptyCheck($data['band']);
            $data['duration_error'] = positiveDecimalValidation($data['duration']);

            if (
               empty($data['name_error']) && empty($data['price_error']) && empty($data['num_players_error']) && empty($data['band_error']) && empty($data['duration_error'])
            )
            {
                
               $this->bandModel->beginTransaction();
               $this->bandModel->editBandServicebyID($data['sv_id'], $data);
               $this->bandModel->commit();
               Toast::setToast(1, "Service Edited Successfully", "");
               redirect('BandService/viewAllServices');
               
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
            'duration' => $svdetails->duration,

            'name_error' => '',
            'price_error' => '',
            'num_players_error' => '',
            'band_error' => '',
            'duration_error' => ''
         ];

         $this->view('band/editservice', $data);
      }
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
