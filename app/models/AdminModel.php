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

   public function getAdminUserData($email)
   {
      $results = $this->getSingle("adminuser", "*", ['email' => $email]);

      return [$results->admin_id, $results->fname . " " . $results->lname];
   }

   public function getAdminDetails()
   {
      $results = $this->getResultSet("adminuser", "*", []);
      return $results;
   }

   public function getAdminDetailsByID($id)
   {
      $results = $this->getSingle("adminuser", "*", ['admin_id' => $id]);
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

   public function getFeedback()
   {
      $results = $this->getResultSet("feedbacks", "*", []);
      return $results;
   }

   

}
