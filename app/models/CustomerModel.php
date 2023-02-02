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

   public function getCustomerDetails()
   {
      $results = $this->getResultSet("customeruser", "*", []);
      return $results;
   }

   public function getCustomerDetailsByID($id)
   {
      $results = $this->getSingle("customeruser", "*", ['customer_id' => $id]);
      return $results;
   }

   public function getChatUsers($unique_id){
      $result = $this->getSingle("chat_users", "*", ['unique_id' => $unique_id]);
      return $result;
   }

   public function getUserByUserId($user_id){
      $result = $this->getSingle("chat_users", "*", ['unique_id' => $user_id]);
      return $result;
   }


}
