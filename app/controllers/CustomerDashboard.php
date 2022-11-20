<?php

// Session validation is only applied to the constructor
// bcz a dashboard controller 
class CustomerDashboard extends Controller
{
   public function __construct()
   {
      
   }

   public function home()
   {
      $this->view('customer/customer-home');
   }
   public function addreservation()
   {
      redirect('CustomerReservation/addReservation');
   }

    public function viewreservationlog()
   {
      redirect('CustomerReservation/viewReservationLog');
   }

   public function viewpackages()
   {
      redirect('Packages/viewAllPackages');
   }

   public function viewservices()
   {
      $result = $this->decoModel->getDecoServiceDetails();
      $this->view('decoCompany/serviceslist',  $result);
   }


   public function logout()
   {
      redirect('User/signout');
   }

}
