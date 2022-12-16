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
   <script src="https://kit.fontawesome.com/c02eb7591c.js" crossorigin="anonymous"></script>

   <link rel="stylesheet" href="<?php echo URLROOT ?>/public/css/footer.css" />

   <link rel="shortcut icon" type="image/x-icon" href="./logo/logo.png">
   <title>TruEvent Horizons - Customer Make Full Payment</title>
</head>

<body>
<?php require APPROOT . "/views/customer/header-customer.php" ?>

   <div class="main-container">
     
      <a href="#" class="top-right-closeBtn white-red-hover"><i class="fal fa-times fa-2x "></i></a>
      
      <div class="ser-container form-container contentBox">
         <form action="#" method="post" class="form">
            <h1 class="title">Make Full Payment</h1>

            <div class="row">
                <div class="column">
                   <div class="text-group">
                        <label for="event name">Event Name</label>        
                        <input class="eventname" type="text" name="event_name"  placeholder="Enter event name here" required>
                  
                   </div>
                </div>
                <div class="column">
                   <div class="text-group">
                        <label for="resevationid">Reservation ID</label>        
                        <input class="resevationid" type="text" name="resevation_id" placeholder="Enter resevation id here" required>
                     
                   </div>
                </div>
             </div>

              <div class="text-group">
                 <label class="label" for="customername">Customer Name</label>
                 <input type="text" name="customer name" placeholder="Enter customer name here" maxlength="25">
                 
              </div>
          

         
              <div class="text-group">
                <label class="label" for="spname">Service Provider/Package Name</label>
                <input type="text" name="spname" placeholder="Enter Service Provider/Package Name" maxlength="25">
                
              </div>
          


        <div class="row">
                <div class="column">
                   <div class="text-group">
                        <label class="label" for="transfer time">Transfer Date</label>
                        <input type="date" id="date" style="color: #777;">
                      
                   </div>
                </div>
                <div class="column">
                   <div class="text-group">
                        <label class="label" for="transfer time">Transfer Time</label>
                        <input type="time" id="time">
                    
                   </div>
                </div>
             </div>


           <div class="row">
                <div class="column">
                   <div class="text-group">
                        <label class="label" for="netprice">Net Amount</label>
                        <input type="text" name="netprice"  maxlength="25">
                      
                   </div>
                </div>
                <div class="column">
                   <div class="text-group">
                        <label for="grossamount">Gross Amount</label>        
                        <input class="otherfac" type="text" name="grossamount">
                    
                   </div>
                </div>
             </div>

        <div class="row">
                <div class="column">
                   <div class="text-group">
                        <label class="label" for="advanceamount">Advance Payment Amount</label>
                        <input type="text" name="advanceamount"  maxlength="25">
                     
                   </div>
                </div>
                <div class="column">
                   <div class="text-group">
                        <label class="label" for="remainamount">Remaining Amount</label>
                        <input type="text" name="remainamount"  maxlength="25">
            
                   </div>
                </div>
             </div>


       <div class="footer-container">
          <button type="submit" name="action" class="btn btn-filled btn-theme-purple">Confirm</button>
       </div>

         </form>
      </div>
   </div>


    <!-- footer start -->
    <section class="footer" style="margin-top:50px;">
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
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
<script type="text/javascript">
    $(function () {
        $("#checkoffers").change(function () {
            if ($(this).val() == "no") {
                $("#offercodelabel").hide();
                $("#offercodeinput").hide();

            } else {
                $("#offercodelabel").show();
                $("#offercodeinput").show();

            }
        });
    });
</script>
</html>