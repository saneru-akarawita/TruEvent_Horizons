<?php require APPROOT . "/views/inc/toast.php" ?>

<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8" />
   <meta http-equiv="X-UA-Compatible" content="IE=edge" />
   <meta name="viewport" content="width=device-width, initial-scale=1.0" />

   <link rel="stylesheet" href="<?php echo URLROOT ?>/public/css/style.css" />
   <link rel="stylesheet" href="<?php echo URLROOT ?>/public/css/icons.css" />
   <link rel="stylesheet" href="<?php echo URLROOT ?>/public/css/login-reg.css" />
   <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" />
   <link rel="shortcut icon" type="image/x-icon" href="<?php echo URLROOT ?>/logo/miniIcon.ico">
   <title>TruEvent Horizons - Customer Register</title>
</head>

<body>
   <div class="main-container">
      <a href="<?php echo URLROOT ?>/user/signin">
         <img src="<?php echo URLROOT ?>/public/logo/logo.png" alt="logo" class="top-left-logo">
      </a>
      <a href="<?php echo URLROOT ?>" class="top-right-closeBtn white-red-hover"><i class="fal fa-times fa-2x "></i></a>
      
      <div class="reg-container form-container contentBox">
         <form action="<?php echo URLROOT; ?>/customer/register" method="post" class="form">
            <h1 class="title">Sign Up</h1>

            <div class="row">
               <div class="column">
                  <div class="text-group">
                     <label class="label" for="name">Name</label>
                     <input type="text" name="fname" placeholder="Your first name here" value="<?php echo $data['fname']; ?>" maxlength="35" />
                     <span class="error"><?php echo $data['fname_error']; ?></span>
                  </div>
               </div>
               <div class="column spec">
                  <div class="text-group">
                     <input type="text" name="lname" placeholder="Your last name here" value="<?php echo $data['lname']; ?>" maxlength="35">
                     <span class="error"><?php echo $data['lname_error']; ?></span>
                  </div>
               </div>
            </div>

            <div class="row">
               <div class="column">
                  <div class="text-group">
                     <label class="label" for="contactno">Contact Number</label>
                     <input type="text" name="contactno" placeholder="Enter contact number here" value="<?php echo $data['contactno']; ?>" maxlength="10">
                     <span class="error"><?php echo $data['contactno_error']; ?></span>
                  </div>
               </div>
               <div class="column">
                  <div class="text-group">
                     <label class="label" for="district">District</label>
                     <input type="text" name="district" placeholder="Enter the district" value="<?php echo $data['district']; ?>" >
                     <span class="error"><?php echo $data['district_error']; ?></span>
                  </div>
               </div>
            </div>

            <div class="row row-last">
               <div class="text-group">
                  <label class="label" for="email">Email Address</label>
                  <input type="text" name="email" placeholder="Your email here" value="<?php echo $data['email'] ?>">
                  <span class="error"><?php echo $data['email_error']; ?></span>
               </div>
               <div class="column">
               <p id="countdown"></p>
                  <button type="submit" name="action" value="getOTP" id="getOTPBtn" class="btn btn-filled btn-black middle">Get OTP</button>
               </div>
            </div>


            <hr>


            <div class="row">
               <div class="text-group">
                  <label class="label" for="OTP">OTP</label>
                  <input type="text" class="OTP" name="OTP" maxlength="6" placeholder="OTP">
                  <span class="error"><?php echo $data['OTP_error']; ?></span>
               </div>
            </div>

            <div class="row">
               <div class="column">
                  <div class="text-group">
                     <label class="label" for="password">Password</label>
                     <input type="password" name="password" placeholder="Enter password here" maxlength="25">
                     <span class="error"><?php echo $data['password_error']; ?></span>
                  </div>
               </div>
               <div class="column">
                  <div class="text-group">
                     <label class="label" for="confirmPassword">Confirm Password</label>
                     <input type="password" name="confirmPassword" placeholder="Enter password again" maxlength="25">
                     <span class="error"><?php echo $data['confirmPassword_error']; ?></span>
                  </div>
               </div>
            </div>
        
            <div class="footer-container">
               <button type="submit" name="action" value="register" class="btn btn-filled btn-theme-purple">Register</button>
               <p>Already have an account? <a href="<?php echo URLROOT ?>/user/signin">Sign in</a></p>
            </div>

         </form>
      </div>
   </div>

</body>

<script src="<?php echo URLROOT ?>/public/js/countdown.js"></script>

</html>