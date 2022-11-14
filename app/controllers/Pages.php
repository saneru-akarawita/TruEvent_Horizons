<?php
class Pages extends Controller
{
   public function __construct()
   {
      $this->userModel = $this->model('UserModel');
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