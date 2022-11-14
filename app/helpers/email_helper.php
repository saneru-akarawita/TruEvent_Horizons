<?php


class EMAIL
{
   public static function sendEmailVerifySMS($email, $OTP)
   {

        $subject = "Email Verify Code";
        $message = "Your E-mail Verification code is $OTP";
        $sender = "From: eventplanning41@outlook.com";

        if(mail($email, $subject, $message, $sender))
          return true;
        else
          return false;
   }

   

   public static function sendPasswordResetSMS($email, $OTP)
   {
        $subject = "Password Reset Code";
        $message = "Your password reset code is $OTP";
        $sender = "From: eventplanning41@outlook.com";

        if(mail($email, $subject, $message, $sender))
          return true;
        else
          return false;
    }

    public static function sendAdminRgisterFormEmail($email)
   {
        $subject = "Admin Registration Link";
        $message = "Please use the following link to register as an admin in the system. \n\n
                     http://localhost/TruEvent_Horizons/admin/register";
        $sender = "From: eventplanning41@outlook.com";

        if(mail($email, $subject, $message, $sender))
          return true;
        else
          return false;
    }

}
