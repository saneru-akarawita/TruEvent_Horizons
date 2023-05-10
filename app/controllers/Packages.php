<?php
class Packages extends Controller
{
   public function __construct()
   {
      Session::validateSession([2]);
      $this->packageModel = $this->model('PackageModel');
      $this->decoModel = $this->model('DecoModel');
      $this->serviceProviderModel = $this->model('ServiceProviderModel');
      $this->adminModel = $this->model('AdminModel');
      $this->bandModel = $this->model('BandModel');
      $this->photographyModel = $this->model('PhotographyModel');
   }

   public function viewAllPackages()
   {
      $result = $this->packageModel->getPackageDetails();
      $this->view('admin/view-packages',  $result);
   }

   public function addNewPackage()
   {

      if ($_SERVER['REQUEST_METHOD'] == 'POST')
      {

         if(isset($_POST['bands']))
         {
            $temp = explode("|",$_POST['bands']);
            $bands = $temp[0];
            $band_sp_id = 0;
            if(isset($temp[1])){
               $band_sp_id = $temp[1];
            }
            $band_sv_id = 0;
            if(isset($temp[2])){
               $band_sv_id = $temp[2];
            }
         }

         if(isset($_POST['decorations']))
         {
            $temp = explode("|",$_POST['decorations']);
            $decorations = $temp[0];
            $deco_sp_id = 0;
            if(isset($temp[1])){
               $deco_sp_id = $temp[1];
            }
            $deco_sv_id = 0;
            if(isset($temp[2])){
               $deco_sv_id = $temp[2];
            }
         }

         if(isset($_POST['photography']))
         {
            $temp = explode("|",$_POST['photography']);
            $photography = $temp[0];
            $photo_sp_id = 0;
            if(isset($temp[1])){
               $photo_sp_id = $temp[1];
            }
            $photo_sv_id = 0;
            if(isset($temp[2])){
               $photo_sv_id = $temp[2];
            }
         }

         $sp_id_string = join(',', array_filter(array($band_sp_id, $deco_sp_id, $photo_sp_id)));


         $notfound ="Not Found";
         $data = [
            'pcode' => trim($_POST['pcode']),
            'name' => trim($_POST['name']),
            'price' => trim($_POST['price']),
            'package_type'=>trim($_POST['package_type']),
            'bands' => isset($_POST['bands']) ? $bands : trim($notfound),
            'decorations' => isset($_POST['decorations']) ? $decorations : trim($notfound),
            'photography' => isset($_POST['photography']) ? $photography : trim($notfound),
            'sp_id_string' => $sp_id_string,
            'band_sv_id' => $band_sv_id,
            'deco_sv_id' => $deco_sv_id,
            'photo_sv_id' => $photo_sv_id,

            'pcode_error' => '',
            'name_error' => '',
            'price_error' => '',
            'bands_error' => '',
            'decorations_error' => '',
            'photography_error' => ''
         ];

         if ($_POST['action'] == "addpackage")
         {
            // Validate everything
            $data['pcode_error'] = emptyCheck($data['pcode']);
            $data['name_error'] = emptyCheck($data['name']);
            $data['package_type_error'] = packageTypeValidation($data['package_type']);
            $data['price_error'] = validatePrice($data['price']);

            if(emptyCheck($data['bands']) && emptyCheck($data['decorations']) && emptyCheck($data['photography'])){
               $data['bands_error'] = "At least one Service should be Added!";
            }

            if (
               empty($data['pcode_error']) && empty($data['name_error']) && empty($data['price_error']) && empty($data['bands_error']) && empty($data['package_type_error'])
            )
            {
                
               $this->packageModel->beginTransaction();
               $this->packageModel->addPackage($data);
               $this->packageModel->commit();

               Toast::setToast(1, "Package Added Successfully!!!", "");

               redirect('Packages/viewAllPackages');
               
            }
            else
            {
               $decoresult = $this->decoModel->getDecoServiceDetails();
               $bandresult = $this->bandModel->getBandServiceDetails();
               $photographyresult = $this->photographyModel->getPhotographyServiceDetails();
               $spresult = $this->serviceProviderModel->getServiceProviderDetails();
               $result = array($data, $decoresult,$bandresult,$photographyresult, $spresult);
               $this->view('admin/admin-add-packages', $result);
            }
         }
         else
         {
            die("Something went wrong");
         }
         
      }
      else
      {

         $decoresult = $this->decoModel->getDecoServiceDetails();
         $bandresult = $this->bandModel->getBandServiceDetails();
         $photographyresult = $this->photographyModel->getPhotographyServiceDetails();
         $spresult = $this->serviceProviderModel->getServiceProviderDetails();

         $data = [
            'pcode' => '',
            'name' => '',
            'price' => '',
            'package_type'=>'',
            'bands' => '',
            'decorations' => '',
            'photography' => '',

            'pcode_error' => '',
            'name_error' => '',
            'package_type_error'=>'',
            'price_error' => '',
            'bands_error' => '',
            'decorations_error' => '',
            'photography_error' => ''
         ];

         $result = array($data, $decoresult,$bandresult,$photographyresult, $spresult);

         $this->view('admin/admin-add-packages', $result);
      }
   }

   public function viewEachPackage(){
         if(isset($_GET['package_id'])){
            $id=$_GET['package_id'];
            $result = $this->packageModel->getPackageDetailsByPackageID($id);
            $this->view('admin/view-each-package', $result);
         }
   }

   public function editPackage(){

      if(isset($_GET['package_id'])){
         $package_editid=intval(trim($_GET['package_id']));
      }

      if ($_SERVER['REQUEST_METHOD'] == 'POST')
      {
         
         if(isset($_POST['bands']))
         {
            $temp = explode("|",$_POST['bands']);
            $bands = $temp[0];
            $band_sp_id = 0;
            if(isset($temp[1])){
               $band_sp_id = $temp[1];
            }
            $band_sv_id = 0;
            if(isset($temp[2])){
               $band_sv_id = $temp[2];
            }
         }

         if(isset($_POST['decorations']))
         {
            $temp = explode("|",$_POST['decorations']);
            $decorations = $temp[0];
            $deco_sp_id = 0;
            if(isset($temp[1])){
               $deco_sp_id = $temp[1];
            }
            $deco_sv_id = 0;
            if(isset($temp[2])){
               $deco_sv_id = $temp[2];
            }
         }

         if(isset($_POST['photography']))
         {
            $temp = explode("|",$_POST['photography']);
            $photography = $temp[0];
            $photo_sp_id = 0;
            if(isset($temp[1])){
               $photo_sp_id = $temp[1];
            }
            $photo_sv_id = 0;
            if(isset($temp[2])){
               $photo_sv_id = $temp[2];
            }
         }

         $sp_id_string = join(',', array_filter(array($band_sp_id, $deco_sp_id, $photo_sp_id)));


         $notfound ="Not Found";

         $data = [

            'pcode' => trim($_POST['pcode']),
            'name' => trim($_POST['name']),
            'price' => trim($_POST['price']),
            'package_type'=>trim($_POST['package_type']),
            'bands' => isset($_POST['bands']) ? $bands : trim($notfound),
            'decorations' => isset($_POST['decorations']) ? $decorations : trim($notfound),
            'photography' => isset($_POST['photography']) ? $photography : trim($notfound),
            'package_id'=> trim($_POST['package_id']),
            'sp_id_string' => $sp_id_string,
            'band_sv_id' => $band_sv_id,
            'deco_sv_id' => $deco_sv_id,
            'photo_sv_id' => $photo_sv_id,

            'pcode_error' => '',
            'name_error' => '',
            'price_error' => '',
            'bands_error' => '',
            'decorations_error' => '',
            'photography_error' => ''
         ];

         if ($_POST['action'] == "editpackage")
         {
            // Validate everything
            $data['pcode_error'] = emptyCheck($data['pcode']);
            $data['name_error'] = emptyCheck($data['name']);
            $data['package_type_error'] = packageTypeValidation($data['package_type']);
            $data['price_error'] = validatePrice($data['price']);

            if(emptyCheck($data['bands']) && emptyCheck($data['decorations']) && emptyCheck($data['photography'])){
               $data['bands_error'] = "At least one Service should be Added!";
            }
          
            if (
               empty($data['pcode_error']) && empty($data['name_error']) && empty($data['price_error']) && empty($data['bands_error']) && empty($data['package_type_error'])
            )
            {
                
               $this->packageModel->beginTransaction();
               $this->packageModel->editPackagebByID($data['package_id'], $data);
               $this->packageModel->commit();

               Toast::setToast(1, "Package Edited Successfully!!!", "");

               redirect('packages/viewAllPackages');
               
            }
            else
            {
               $decoresult = $this->decoModel->getDecoServiceDetails();
               $bandresult = $this->bandModel->getBandServiceDetails();
               $photographyresult = $this->photographyModel->getPhotographyServiceDetails();
               $spresult = $this->serviceProviderModel->getServiceProviderDetails();
               $result = array($data, $decoresult, $bandresult, $photographyresult, $spresult);
               $this->view('admin/edit-packages', $result);
            }
         }
         else
         {
            die("Something went wrong");
         }
         
      }
      else
      {
         $packagedetails = $this->packageModel->getPackageDetailsByPackageID($package_editid);
         $decoresult = $this->decoModel->getDecoServiceDetails();
         $bandresult = $this->bandModel->getBandServiceDetails();
         $photographyresult = $this->photographyModel->getPhotographyServiceDetails();
         $spresult = $this->serviceProviderModel->getServiceProviderDetails();

         $data = [
            'pcode' => $packagedetails -> package_code,
            'name' => $packagedetails -> package_name,
            'price' => $packagedetails -> price,
            'package_type'=> $packagedetails -> package_type,
            'bands' => $packagedetails -> band_choice,
            'decorations' => $packagedetails -> deco_choice,
            'photography' => $packagedetails -> photo_choice,
            'package_id'=>$package_editid,

            'pcode_error' => '',
            'name_error' => '',
            'package_type_error'=>'',
            'price_error' => '',
            'bands_error' => '',
            'decorations_error' => '',
            'photography_error' => ''

         ];

         $result = array($data, $decoresult, $bandresult, $photographyresult, $spresult);

         $this->view('admin/edit-packages', $result);

      }
   }

   public function deletePackage($id){

   }

   public function activate(){
      if (isset($_GET['package_id'])){

         $package_id=$_GET['package_id'];
   
         if($this->packageModel->activate_deactivate("activate",1,$package_id))
            redirect('Packages/viewAllPackages');
     }
   
   }

   public function deactivate(){
      if (isset($_GET['package_id'])){

         $service_id=$_GET['package_id'];

         if($this->packageModel->activate_deactivate("deactivate",0,$service_id))
            redirect('Packages/viewAllPackages');
     }

   }

   public function viewBandDetails(){
      if(isset($_GET['band_id'])){
         $band_id = $_GET['band_id'];
      }   
      $result1 = $this->serviceProviderModel->getServiceProviderDetails();
      $result2 = $this->bandModel->getBandServiceDetails();
      $resultarr1 = array($band_id,$result1,$result2);
      $this->view('admin/viewBandDetails', $resultarr1);
   }

   public function viewDecoDetails(){
      if(isset($_GET['deco_id'])){
         $deco_id = $_GET['deco_id'];
      }   
      $result3 = $this->serviceProviderModel->getServiceProviderDetails();
      $result4 = $this->decoModel->getDecoServiceDetails();
      $resultarr2 = array($deco_id,$result3,$result4);
      $this->view('admin/viewDecoDetails', $resultarr2);
   }

   public function viewPhotoDetails(){
      if(isset($_GET['photo_id'])){
         $photo_id = $_GET['photo_id'];
      }   
      $result5 = $this->serviceProviderModel->getServiceProviderDetails();
      $result6 = $this->photographyModel->getPhotographyServiceDetails();
      $resultarr3 = array($photo_id,$result5,$result6);
      $this->view('admin/viewPhotoDetails', $resultarr3);
   }

   public function home()
   {
      $this->view('admin/admin-home');
   }
   public function addpackages()
   {
      redirect('Packages/addNewPackage');
   }
   public function viewpackages()
   {
      redirect('Packages/viewAllPackages');
   }
   public function logout()
   {
      redirect('User/signout');
   }
 
}
