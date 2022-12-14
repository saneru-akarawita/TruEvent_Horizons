<?php

require __DIR__ . '/../../vendor/autoload.php';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

class EMAIL
{
   public static function sendEmailVerifySMS($email, $OTP)
   {

        $mail = new PHPMailer(TRUE);
        $mail->isSMTP();
        $mail->Malier="smtp";
        $mail->SMTPDebug = 0;                      //Enable verbose debug output                                          //Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = 'horizonstruevent@gmail.com';                     //SMTP username
        $mail->Password   = 'avecpbwgsrvmbwrb';                               //SMTP password
        $mail->SMTPSecure = 'tls';            //Enable implicit TLS encryption
        $mail->Port       = 587;                        

        //rbdncimifduyqubp

        try {

          $mail->setFrom("horizonstruevent@gmail.com");

          $mail->addAddress($email);

          $mail->Subject = "Email Verify Code";

          $mail->Body = "Your E-mail Verification code is $OTP";

          if(!$mail->send()){
            return false;
          }
          else{
            return true;
          }
        }

        catch (Exception $e)
        {
          // echo $e->errorMessage();
          return false;
        }

        catch (\Exception $e)
        {
          // echo $e->getMessage();
          return false;
        }

   }

   

   public static function sendPasswordResetSMS($email, $OTP)
   {

        $mail = new PHPMailer(TRUE);
        $mail->isSMTP();
        $mail->Malier="smtp";

        $mail->SMTPDebug = 0;                      //Enable verbose debug output                                          //Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = 'horizonstruevent@gmail.com';                     //SMTP username
        $mail->Password   = 'avecpbwgsrvmbwrb';                               //SMTP password
        $mail->SMTPSecure = 'tls';            //Enable implicit TLS encryption
        $mail->Port       = 587;                        

        try {

          $mail->setFrom("horizonstruevent@gmail.com");

          $mail->addAddress($email);

          $mail->Subject = "Password Reset Code";

          $mail->Body = "Your password reset code is $OTP";

          if(!$mail->send()){
            return false;
          }
          else{
            return true;
          }
        }

        catch (Exception $e)
        {
          // echo $e->errorMessage();
          return false;
        }

        catch (\Exception $e)
        {
          // echo $e->getMessage();
          return false;
        }

    }

   public static function sendAdminRgisterFormEmail($email)
   {

        $mail = new PHPMailer(TRUE);
        $mail->isSMTP();
        $mail->Malier="smtp";

        $mail->SMTPDebug = 0;                      //Enable verbose debug output                                          //Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = 'horizonstruevent@gmail.com';                     //SMTP username
        $mail->Password   = 'avecpbwgsrvmbwrb';                               //SMTP password
        $mail->SMTPSecure = 'tls';            //Enable implicit TLS encryption
        $mail->Port       = 587;                        

        try {

          $mail->setFrom("horizonstruevent@gmail.com");

          $mail->addAddress($email);

          $mail->Subject = "Admin Registration Link";

          $mail->Body = "Please use the following link to register as an admin in the system. \n\n
          http://localhost/TruEvent_Horizons/admin/register";

          if(!$mail->send()){
            return false;
          }
          else{
            return true;
          }
        }

        catch (Exception $e)
        {
          // echo $e->errorMessage();
          return false;
        }

        catch (\Exception $e)
        {
          // echo $e->getMessage();
          return false;
        }

    }

}
