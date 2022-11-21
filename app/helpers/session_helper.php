<?php

/*
 * Contains session management funtion
 * Restricts unauthorized user access by checking logged in user type
 */

class Session
{
   public static function setSingle($name, $value)
   {
      $_SESSION[$name] = $value;
   }

   public static function setBundle($bundleName, $values)
   {
      $_SESSION[$bundleName] = $values;
   }

   public static function get($dataName)
   {
      return $_SESSION[$dataName];
   }

   public static function clear($dataName)
   {
      unset($_SESSION[$dataName]);
   }

   public static function validateSession($accessibleUsers)
   {
      if (Session::hasLoggedIn())
      {
         $status = in_array(self::getUser("type"), $accessibleUsers);
         if (!$status)
         {
            redirect('pages/accessDenied');
         }
      }

      else{
         redirect('pages/accessDenied');
      }
   }

   public static function hasLoggedIn()
   {
      if (isset($_SESSION['user']))
         return true;
      else
         return false;
   }

   public static function getUser($dataName)
   {
      switch ($dataName)
      {
         case "type":
            return Self::get("user")["type"];

         case "typeText":
            $typeNo = Self::get("user")["type"];
            $typeTextList = [
               "Super Admin",
               "Admin",
               "Customer",
               "Hotel Manager",
               "Deco Company",
               "Band Manager",
               "Photography Company"
            ];
            return $typeTextList[$typeNo - 1];

         case "email":
            return Self::get("user")["email"];

         case "password":
            return Self::get("user")["password"];
         
         // case "name":
         //    return Self::get("user")["name"];

         // case "id":
         //    return Self::get("user")["id"];


         default:
            echo "Invalid Parameter";
            break;
      }
   }
}

// Session::getUser("mobileNo"); // Ex: 0717679714
// Session::getUser("id");       // Ex: 00000023
// Session::getUser("name");     // Ex: Sirimal Perera
// Session::getUser("type");     // Ex: 1, 2, 3, 4, 5, 6
// Session::getUser("typeText"); // Ex: Receptionist, Manager, ....