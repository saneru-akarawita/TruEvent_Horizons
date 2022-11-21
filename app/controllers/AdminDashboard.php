<?php

// Session validation is only applied to the constructor
// bcz a dashboard controller 
class AdminDashboard extends Controller
{
   public function __construct()
   {
      Session::validateSession([2]);
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
