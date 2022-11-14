<?php
class CustomerModel extends Model
{
   public function registerCustomer($data)
   {

      $this->insert('customeruser', [
         'fname' => $data['fname'],
         'lname' => $data['lname'],
         'email' => $data['email'],
         'contact_no' => $data['contactno'],
         'district' => $data['district']
      ]);
      
   }

   public function checkCustomerExists($email)
   {
      $result = $this->getRowCount("customeruser", ['email' => $email]);
      return $result;
   }


}
