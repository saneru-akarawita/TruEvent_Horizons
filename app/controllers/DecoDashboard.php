<?php

// Session validation is only applied to the constructor
// bcz a dashboard controller 
class DecoDashboard extends Controller
{
   public function __construct()
   {
      
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
