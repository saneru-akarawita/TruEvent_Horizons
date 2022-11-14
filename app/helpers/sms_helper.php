<?php

/*
 * Contains functions related SMS sending
 * A separate function for each SMS msg template is included
 * With a common sending function
 * 
 * Accepts sms in the format of 07912345678
 * 
 * PRIORITY LEVEL VALUE
 * 1 => PRIOROTY
 * 0 => ECONOMY
 * 
 */

class SMS
{
   public static function sendMobileVerifySMS($mobileNo, $OTP)
   {
      $SMSText = urlencode(
         "Please enter the OTP code: $OTP to verify your mobile number.\n\nBeauty Craft"
      );
      return self::sendSMS($mobileNo, $SMSText, 1);
   }

   public static function sendCustomerRegSMS($mobileNo)
   {
      $SMSText = urlencode(
         "Welcome to Beauty Craft!\nYour customer account has been created successfully."
      );
      return self::sendSMS($mobileNo, $SMSText, 0);
   }

   public static function sendPasswordResetSMS($mobileNo, $OTP)
   {
      $SMSText = urlencode(
         "Please enter the OTP code: $OTP to reset the password.\nBeauty Craft"
      );
      return self::sendSMS($mobileNo, $SMSText, 1);
   }

   public static function sendStaffRegSMS($mobileNo, $staffType)
   {
      if ($staffType == 3)
      {
         $staffTypeName = "Manager";
      }
      elseif ($staffType == 4)
      {
         $staffTypeName = "Receptionist";
      }
      elseif ($staffType == 5)
      {
         $staffTypeName = "Service provider";
      }
      $SMSText = urlencode(
         "Welcome to Beauty Craft. Your " . $staffTypeName . " Account has been created. Use your mobile number as your user name and NIC as the password to log in. Please reset your password after the first log in.\nBeauty Craft"
      );
      return self::sendSMS($mobileNo, $SMSText, 1);
   }

   public static function sendSalaryPaySMS($mobileNo)
   {
      $SMSText = urlencode(
         "Dear sir/madam your salary has been credited to your account.\nBeauty Craft"
      );
      return self::sendSMS($mobileNo, $SMSText, 0);
   }

   public static function sendEnableStaffSMS($mobileNo, $staffType)
   {
      if ($staffType == 3)
      {
         $staffTypeName = "Manager";
      }
      elseif ($staffType == 4)
      {
         $staffTypeName = "Receptionist";
      }
      elseif ($staffType == 5)
      {
         $staffTypeName = "Service provider";
      }

      $SMSText = urlencode(
         "Dear sir/madam your " . $staffTypeName . " account has been enabled. Use your new poassword as your NIC. Please reset your password after the first log in.\nBeauty Craft"
      );
      return self::sendSMS($mobileNo, $SMSText, 0);
   }
   public static function sendDisableStaffSMS($mobileNo, $staffType)
   {
      if ($staffType == 3)
      {
         $staffTypeName = "Manager";
      }
      elseif ($staffType == 4)
      {
         $staffTypeName = "Receptionist";
      }
      elseif ($staffType == 5)
      {
         $staffTypeName = "Service provider";
      }

      $SMSText = urlencode(
         "Dear sir/madam your " . $staffTypeName . " account has been temporarily disabled.\nBeauty Craft"
      );
      return self::sendSMS($mobileNo, $SMSText, 0);
   }

   // TODO:
   public static function sendNewReservationSMS($mobileNo, $service, $seProv, $time, $date)
   {
      $SMSText = urlencode(
         "Your reservation has been placed successfully.\n Service: " . $service . "\n Service Provider: " . $seProv . "\n Time:  " . $time . " on " . $date . "\n\nBeauty Craft"
      );
      return self::sendSMS($mobileNo, $SMSText, 1);
   }

   // public static function resCancellationSMS()
   // {
   // }

   // public static function resConfirmationSMS()
   // {
   // }

   public static function sendSMS($mobileNo, $SMSText, $priorityFlag)
   {
      // echo $SMSText;
      $user = SMS_USER;
      $password = SMS_PASS;

      $to = "94" . substr($mobileNo, 1, 9);
      $baseurl = "http://www.textit.biz/sendmsg";

      if ($priorityFlag == 1)
         $ecoVal = "N";
      else
         $ecoVal = "Y";


      $url = "$baseurl/?id=$user&pw=$password&to=$to&text=$SMSText&eco=$ecoVal";
      $ret = file($url);
      // print_r($ret);
      $res = explode(":", $ret[0]);

      if (trim($res[0]) == "OK")
      {
         // echo $mobileNo, $text;
         return true;
         // die("Message Sent - ID : " . $res[1]);
      }
      else
      {
         return false;
         // die("Sent Failed - Error : " . $res[1]);
      }
      return true;
   }
}
