<?php
class Packages extends Controller
{
   public function __construct()
   {
      $this->packageModel = $this->model('PackageModel');
   }

   public function viewAllPackages()
   {

      // $serviceNames = $this->packageModel->getServiceDetails();
      // $serviceTypes = $this->packageModel->getServiceTypeDetails();
      // $sDetails = $this->packageModel->getServiceDetailsWithFilters($sID, $sType, $sStatus);

      $GetServicesArray = [
         // 'services' => $sDetails,
         // 'selectedSID' => $sID,
         // 'selectedType' => $sType,
         // 'selectedStatus' => $sStatus,
         // 'sNameList' => $serviceNames,
         // 'sTypeList' => $serviceTypes,
      ];

      $this->view('admin/view-packages',  $GetServicesArray);
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
            $data['price_error'] = validatePrice($data['price']);

            if(emptyCheck($data['bands']) && emptyCheck($data['decorations']) && emptyCheck($data['photography'])){
               $data['bands_error'] = "At least one Service should be Added!";
            }

            if (
               empty($data['pcode_error']) && empty($data['name_error']) && empty($data['price_error']) && empty($data['bands_error'])
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

         $data = [
            'pcode' => '',
            'name' => '',
            'price' => '',
            'bands' => '',
            'decorations' => '',
            'photography' => '',

            'pcode_error' => '',
            'name_error' => '',
            'price_error' => '',
            'bands_error' => '',
            'decorations_error' => '',
            'photography_error' => ''
         ];

         $this->view('admin/admin-add-packages', $data);
      }
   }

   public function viewEachPackage($id){

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
