<?php

function emptyCheck($value)
{
   if ($value == "") return "Please fill out this field.";
   else return "";
}

function validateEmail($value)
{
   $emptyCheckResponse = emptyCheck($value);
   if (!filter_var($value, FILTER_VALIDATE_EMAIL)) {
      return "Invalid email format";
   }
   
   return $emptyCheckResponse;
}

function validateContactno($phone){

   $emptyCheckResponse = emptyCheck($phone);

   if(!preg_match('/^[0-9]{10}+$/', $phone)) {
     return "Invalid Phone Number";
   }

   return $emptyCheckResponse;
}

function validatePrice($price){

   $emptyCheckResponse = emptyCheck($price);

   if (!preg_match('/^(0|[1-9]\d*)(\.\d{2})?$/', $price)) {
      return "Invalid Price Format";
   }
   return $emptyCheckResponse;
}

function validateDate($date){

   $emptyCheckResponse = emptyCheck($date);

   $now = date("Y-m-d");
   echo $date;
   echo $now;

    if($date < $now) {
        return "date is in the past";
    }
   else
      return $emptyCheckResponse;
}

?>