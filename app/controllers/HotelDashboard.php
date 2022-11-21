<?php

// Session validation is only applied to the constructor
// bcz a dashboard controller 
class HotelDashboard extends Controller
{
   public function __construct()
   {
      Session::validateSession([4]);
   }

   public function home()
   {
      $this->view('hotelManager/home-hotel');
   }
   public function addservices()
   {
      redirect('HotelService/addNewService');
   }
   public function viewservices()
   {
      redirect('HotelService/viewAllServices');
   }
   public function logout()
   {
      redirect('User/signout');
   }

}
