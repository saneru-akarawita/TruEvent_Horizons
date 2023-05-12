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

function validateNames($name){
   
   $emptyCheckResponse = emptyCheck($name);
   
   if (!preg_match("/^[a-zA-Z. ]*$/",$name)) {
      return "Only letters and white space allowed";
   }
   else
      return $emptyCheckResponse;
}

function districtValidation($district){
      
   $emptyCheckResponse = emptyCheck($district);

   //check if $district is in the following array
   $districts = array("Ampara","Anuradhapura","Badulla","Batticaloa","Colombo","Galle","Gampaha","Hambantota","Jaffna","Kalutara","Kandy","Kegalle","Kilinochchi","Kurunegala","Mannar","Matale","Matara","Monaragala","Mullaitivu","Nuwara Eliya","Polonnaruwa","Puttalam","Ratnapura","Trincomalee","Vavuniya");

   if (!in_array($district, $districts)) {
      return "Only the 25 districts in Sri Lanka are allowed!";
   }
   else
      return $emptyCheckResponse;
}

function positiveIntegerValidation($number){
      
   $emptyCheckResponse = emptyCheck($number);
   
   if (!preg_match("/^[0-9]*$/",$number)) {
      return "Only positive integers are allowed";
   }
   else
      return $emptyCheckResponse;
}

function dateFormatValidation($date){
         
   $emptyCheckResponse = emptyCheck($date);
   
   if (!preg_match("/^[0-9]{4}-[0-9]{2}-[0-9]{2}$/",$date)) {
      return "Invalid date format";
   }
   else
      return $emptyCheckResponse;
}

function timeFormatValidation($time){
            
   $emptyCheckResponse = emptyCheck($time);
   //seconds validation too
   if (!preg_match("/^([0-1][0-9]|[2][0-3]):([0-5][0-9])$/",$time)) {
      return "Invalid time format";
   }
   else
      return $emptyCheckResponse;
}

function packageTypeValidation($packageType){
      
   $emptyCheckResponse = emptyCheck($packageType);

   //check if $district is in the following array
   $packageTypes = array("Birthday", "Anniversary", "Coparate Event", "Graduation Party", "Get-Together", "General Event");

   if (!in_array($packageType, $packageTypes)) {
      return "Only Chosen Package types are allowed";
   }
   else
      return $emptyCheckResponse;
}

function serviceTypeValidation($serviceType){
      
   $emptyCheckResponse = emptyCheck($serviceType);

   //check if $district is in the following array
   $serviceTypes = array("Birthday Parties", "Anniversary Parties", "Welcome Parties", "Night Functions", "Get-Togethers", "Business Gatherings", "General Events");

   if (!in_array($serviceType, $serviceTypes)) {
      return "Only Chosen Service types are allowed";
   }
   else
      return $emptyCheckResponse;
}

function positiveDecimalValidation($number){
   $emptyCheckResponse = emptyCheck($number);

   if (!is_numeric($number) || $number <= 0) {
      return "Only positive numbers are allowed";
    } else {
      return $emptyCheckResponse;
    }
}

?>