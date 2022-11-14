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

?>