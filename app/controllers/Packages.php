<?php
class Packages extends Controller
{
   public function __construct()
   {
      Session::validateSession([2]);
      $this->packageModel = $this->model('PackageModel');
      $this->decoModel = $this->model('DecoModel');
      $this->serviceProviderModel = $this->model('ServiceProviderModel');
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
         $notfound ="Not Found";
         $data = [
            'pcode' => trim($_POST['pcode']),
            'name' => trim($_POST['name']),
            'price' => trim($_POST['price']),
            'package_type'=>trim($_POST['package_type']),
            'bands' => isset($_POST['bands']) ? trim($_POST['bands']) : trim($notfound),
            'decorations' => isset($_POST['decorations']) ? trim($_POST['decorations']) : trim($notfound),
            'photography' => isset($_POST['photography']) ? trim($_POST['photography']) : trim($notfound),

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
            $data['package_type_error'] = emptyCheck($data['package_type']);
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
               $this->view('admin/admin-add-packages', $data);
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

         $result = array($data, $decoresult, $spresult);

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

   public function editPackage($id){

   }

   public function deletePackage($id){

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
