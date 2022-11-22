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

   public function getCustomerUserData($email)
   {
      $results = $this->getSingle("customeruser", "*", ['email' => $email]);

      return [$results->customer_id, $results->fname . " " . $results->lname];
   }


}
