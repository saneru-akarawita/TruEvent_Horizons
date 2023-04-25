<?php
class Pages extends Controller
{
   public function __construct()
   {
      $this->userModel = $this->model('UserModel');
   }

   public function viewBandDetails(){
      if(isset($_GET['band_sv_id'])){
         $band_id = $_GET['band_id'];
         $band_details = $this->bandModel->getBandDetailsByBandID($band_id);
         $data = [
            'band_details' => $band_details
         ];
         $this->view('admin/viewBandDetails', $data);
      }
   }

   public function home()
   {
      $this->view('index');
   }
   public function notFound()
   {
      $this->view('404');
   }
   public function accessDenied()
   {
      $this->view('403');
   }
   
}