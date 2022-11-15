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
   <title>TruEvent Horizons - Service Provider Register</title>
</head>

<body>
   <div class="main-container">
      <a href="<?php echo URLROOT ?>/user/signin">
         <img src="<?php echo URLROOT ?>/public/logo/logo.png" alt="logo" class="top-left-logo">
      </a>
      <a href="<?php echo URLROOT ?>" class="top-right-closeBtn white-red-hover"><i class="fal fa-times fa-2x "></i></a>
      
      <div class="reg-container form-container contentBox">
         <form action="<?php echo URLROOT; ?>/serviceprovider/register" method="post" class="form">
            <h1 class="title">Sign Up</h1>

            <div class="row">
               <div class="column">
                  <div class="text-group">
                     <label class="label" for="companyname">Company Name</label>
                     <input type="text" name="company_name" placeholder="Your company name" value="<?php echo $data['company_name'] ?>" maxlength="100" />
                     <span class="error"><?php echo $data['companyname_error']; ?></span>
                  </div>
               </div>
               <div class="column">
                  <div class="text-group">
                     <label class="label" for="business_id">Business Reg. Number</label>
                     <input type="text" name="business_id" placeholder="Your business registration no" value="<?php echo $data['business_id'] ?>"  maxlength="25">
                     <span class="error"><?php echo $data['business_id_error']; ?></span>
                  </div>
               </div>
            </div>

            <div class="row">
                <div class="column">
                   <div class="text-group">
                      <label class="label" for="district">District</label>
                      <input type="text" name="district" placeholder="Enter district here" value="<?php echo $data['district'] ?>" maxlength="25">
                      <span class="error"><?php echo $data['district_error']; ?></span>
                   </div>
                </div>
                <div class="column">
                   <div class="text-group">
                      <label class="label" for="contactno">Contact No</label>
                      <input type="text" name="contactno" placeholder="Enter contact number" value="<?php echo $data['contactno'] ?>" maxlength="10">
                      <span class="error"><?php echo $data['contactno_error']; ?></span>
                   </div>
                </div>
             </div>


             <div class="row">
                <div class="column">
                        <label class="label" for="service_type">Service Type</label>
                        <select name = "service_type" class="dropdownmenu" id="service_type"> 
                                <option value="">Select a service type</option>
                              <option value = 4>Hotel</option>
                              <option value = 5>Decoration</option>
                              <option value = 6>Band</option>
                              <option value = 7>Photography</option>
                        </select>
                        <span class="error"><?php echo $data['service_type_error']; ?></span>
                </div>
                <div class="column">
                   <div class="text-group" id="travel_flag" >
                      <label class="label" for="contactno">Do you wish to travel?</label> <br>
                         Yes
                         <input type="radio"  name="travel_flag" value = 1>
                         No
                         <input type="radio"  name="travel_flag" value = 0 checked=true>     
                         <span class="error"><?php echo $data['travel_flag_error']; ?></span>
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

            <hr>

            Account Details:<br><br><br>
            <div class="row">
               <div class="column">
                  <div class="text-group">
                     <label class="label" for="accnumber">Account Number</label>
                     <input type="text" name="accnumber" placeholder="Enter account number here" maxlength="25">
                     <span class="error"><?php echo $data['accNumber_error']; ?></span>
                  </div>
               </div>
               <div class="column">
                  <div class="text-group">
                     <label class="label" for="accname">Account Holder Name</label>
                     <input type="text" name="accname" placeholder="Enter account holder name" >
                     <span class="error"><?php echo $data['accName_error']; ?></span>
                  </div>
               </div>
            </div>
            <div class="row">
               <div class="column">
                  <div class="text-group">
                     <label class="label" for="bank">Bank</label>
                     <input type="text" name="bank" placeholder="Bank" >
                     <span class="error"><?php echo $data['bank_error']; ?></span>
                  </div>
               </div>
               <div class="column">
                  <div class="text-group">
                     <label class="label" for="branch">Branch</label>
                     <input type="text" name="branch" placeholder="Branch" >
                     <span class="error"><?php echo $data['branch_error']; ?></span>
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
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
<script type="text/javascript">
    $(function () {
        $("#service_type").change(function () {
            if ($(this).val() == 4) {
                $("#travel_flag").hide();
            } else {
                $("#travel_flag").show();
            }
        });
    });
</script>

</html>