<?php
class UserModel extends Model
{
   public function registerUser($email, $password, $user_type)
   {
      $this->insert('users', [
         'email' => $email,
         'password' => password_hash($password, PASSWORD_DEFAULT),
         'user_type' => $user_type,
         'fail_attempts' => 0,
         'vstatus' => "verified"
      ]);
   }

   public function registerChatUser($unique_id,$fname,$lname,$email,$status){
      $this->insert('chat_users', [
         'unique_id' => $unique_id,
         'fname' => $fname,
         'lname' => $lname,
         'email' => $email,
         'status' => $status
      ]);
   }

   public function setChatUserOffline($unique_id, $msg){

      $this->update('chat_users', [
         'status' => $msg
      ], [
         'unique_id' => intval(trim($unique_id))
      ]);
   
   }

   public function getUser($email)
   {
      $results = $this->getSingle("users", "*", ["email" => $email]);
      return $results;
   }

   public function getUserByUniqueID($email)
   {
      $results = $this->getSingle("chat_users", "*", ["email" => $email]);
      return $results;
   }

   public function checkLoginExists($email)
   {
      $results = $this->getRowCount("users", ["email" => $email]);
      if ($results == 0)
      {
         return false;
      }
      return true;
   }

   public function checkAlreadyRegistered($email)  // Check already registered AND not removed
   {
      $custExists = $this->checkCustExists($email);
      // var_dump($custExists);
      $staffExists = $this->checkStaffExists($email);
      // var_dump($staffExists);
      return ($custExists || $staffExists);
   }

   public function checkCustExists($mobileNo)
   {
      $SQLstatement = "SELECT * FROM customers WHERE mobileNo = :mobileNo AND status = 1;";
      $results = $this->customQuery($SQLstatement, [":mobileNo" => $mobileNo]);
      // var_dump($results);
      if (empty($results))
         return false;
      else
         return true;
   }

   public function checkStaffExists($mobileNo)
   {
      $SQLstatement = "SELECT * FROM staff WHERE mobileNo = :mobileNo AND status IN (1,2);";
      $results = $this->customQuery($SQLstatement, [":mobileNo" => $mobileNo]);

      if (empty($results))
         return false;
      else
         return true;
   }

   public function updatePassword($email, $password)
   {
      $results = $this->update("users", ["password" => password_hash($password, PASSWORD_DEFAULT)], ["email" => $email]);
      return $results;
   }

   public function incrementFailedAttempts($email)
   {
      $SQLstatement = "UPDATE users SET fail_attempts = fail_attempts + 1 WHERE email = :email;";
      $results = $this->customQuery($SQLstatement, ["email" => $email]);

      return $results;
   }

   public function resetFailedAttempts($email)
   {
      $results = $this->update("users", ["fail_attempts" => 0], ["email" => $email]);
      return $results;
   }

   public function getFailedAttempts($email)
   {
      $results = $this->getSingle("users", ["fail_attempts"], ["email" => $email]);
      return $results->fail_attempts;
   }

   //to remove staf user account when disable staff member
   public function removeUserAccount($email)
   {
      $this->delete("users", ['email' => $email ]); 
   }
}
