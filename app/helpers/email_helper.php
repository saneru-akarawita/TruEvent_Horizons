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

    public static function sendReservationConfirmToCustomer($email,$data)
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

          $mail->Subject = "Confirmation of Reservation";

          $mail->Body = "Dear ". $data['customer_name'].",\n\n
                          
          Your Reservation made under the Event Name of '".$data['event_name']."' has been approved and confirmed by the
          Service Provider. Please make the necessary payments through the website for future procedures.\n\n\n\n
                                    
          Thank you.\n\n
          TruEvent Horizons Management";

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

    public static function sendReservationCancelToCustomer($email,$data)
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

          $mail->Subject = "Cancellation of Reservation";

          $mail->Body = "Dear ". $data['customer_name'].",\n\n
                          
          We are regret to inform you that the Reservation made under the Event Name of '".$data['event_name']."' has been cancelled by the
          Service Provider. The respective Service Provider could be un-available on the selected date.\n\n
          Please choose out a different date and a time for your event and try placing a reservation again.\n\n\n\n
          
          Thank you.\n\n
          TruEvent Horizons Management";

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

    public static function sendReservationCancelToServiceProvider($email,$data)
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

          $mail->Subject = "Cancellation of Reservation";

          $mail->Body = "Dear ". $data['sp_name'].",\n\n
                          
          We are regret to inform you that the Reservation made under the Event Name of '".$data['event_name']."' 
          by the customer ". $data['customer_name']." has been cancelled.
          
          Thank you.\n\n
          TruEvent Horizons Management";

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
