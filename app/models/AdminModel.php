<?php
class AdminModel extends Model
{
   public function registerAdmin($data)
   {

      $this->insert('adminuser', [
         'fName' => $data['fname'],
         'lName' => $data['lname'],
         'email' => $data['email'],
         'acc_name' => $data['accname'],
         'acc_no' => $data['accnumber'],
         'bank' => $data['bank'],
         'branch' => $data['branch']
      ]);
      
   }

   public function checkAdminExists($email)
   {
      $result = $this->getRowCount("adminuser", ['email' => $email]);
      return $result;
   }


}
