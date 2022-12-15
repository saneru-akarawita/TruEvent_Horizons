<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8" />
   <meta http-equiv="X-UA-Compatible" content="IE=edge" />
   <meta name="viewport" content="width=device-width, initial-scale=1.0" />

   <link rel="stylesheet" href="<?php echo URLROOT ?>/public/css/hotel manager/styles-hotel.css" />
   <link rel="stylesheet" href="<?php echo URLROOT ?>/public/css/hotel manager/style.css" />
   <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" />
   <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" />
   <link rel="stylesheet" href="<?php echo URLROOT ?>/public/css/footer.css" />

   <script src="https://kit.fontawesome.com/c02eb7591c.js" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="./css/footer.css">
   <link rel="shortcut icon" type="image/x-icon" href="./logo/logo.png">
   <title>TruEvent Horizons - Hotel Manager Add Service</title>
</head>

<body>
<?php require APPROOT . "/views/customer/header-customer.php" ?>

   <div class="main-container">
     
      <a href="#" class="top-right-closeBtn white-red-hover"><i class="fal fa-times fa-2x "></i></a>
      
      <div class="ser-container form-container contentBox">
         <form action="#" method="post" class="form">
            <h1 class="title">Add Account Details</h1>

            
            <div class="row">
                <div class="column">
                   <div class="text-group">
                      <label class="accountno" for="account no">Account No</label>
                      <input type="text" name="account_no" placeholder="Enter account no" maxlength="18">
      
                   </div>
                </div>
                <div class="column">
                   <div class="text-group">
                     <label class="accountname" for="account name">Account Name</label>
                     <input type="text" name="account_name" placeholder="Enter account name" maxlength="25">
                  
                   </div>
                </div>
             </div>


            <div class="row">
                <div class="column">
                   <div class="text-group">
                     <label class="bankname" for="bank name">Bank Name</label>
                     <input type="text" name="bank_name" placeholder="Enter bank name" maxlength="15">
   
                   </div>
                </div>
                <div class="column">
                   <div class="text-group">
                      <label class="branchcode" for="branch code">Branch Code</label>
                      <input type="text" name="branch_code" placeholder="Enter branch code" maxlength="25">
   
                   </div>
                </div>
             </div>

             <div class="row">
                <div class="column">
                   <div class="text-group">
                      <label class="expirydate" for="expiry date">Expiry Date</label>
                      <input type="date" id="date" name="date" style="color:#777 ;">
         
                   </div>
                </div>
                <div class="column">
                   <div class="text-group">
                     <label class="cvv" for="cvv">CVV</label>
                     <input type="text" name="cvv" placeholder="Enter cvv code" maxlength="3">
                     
                   </div>
                </div>
             </div>

            <div class="footer-container">
               <button type="submit" name="action" class="btn btn-filled btn-theme-purple">Submit</button>
            </div>

         </form>
      </div>
   </div>


    <!-- footer start -->
    <section class="footer">
      <div class="overlay"></div>
      <div class="box-container">
          <div class="box">
              <h3>Quick Access</h3>
          <a href="admin-home.php"><i class="fas fa-angle-right"></i>  Home</a>
          <a href="packages.php"><i class="fas fa-angle-right"></i> Packages</a>
          <a href="admin-add-packages.php"><i class="fas fa-angle-right"></i> Add Packages</a>
          </div>
  
          <div class="box">
              <h3>Extra</h3>
          <a href="#"><i class="fas fa-angle-right"></i>  About US</a>
          <a href="#"><i class="fas fa-angle-right"></i> Privacy Policy</a>
          <a href="#"><i class="fas fa-angle-right"></i> Ask Questions</a>
          </div>
  
          <div class="box">
              <h3>Contact Us</h3>
          <a href="#"><i class="fas fa-phone"></i>  +94 123-456-789</a>
          <a href="#"><i class="fas fa-envelop"></i> TruEvent@gmail.com</a>
          <a href="#"><i class="fas fa-map"></i> Colombo</a>
  
  
          </div>
         
          <div class="box">
              <h3>Follow US</h3>
          <a href="#"><i class="fab fa-facebook"></i>  facebook</a>
          <a href="#"><i class="fab fa-instagram"></i> instagram</a>
          <a href="#"><i class="fab fa-linkedin"></i>  linkedin</a>
  
          </div>
      </div>
  
      
  
      <div class="credit">
          Created By <span>TruEvent Horizon</span> | All Rights Reserved
      </div>
  
  </section>
  
  
  <!-- footer ends -->
  
</body>

<script src="./js/countdown.js"></script>

</html>