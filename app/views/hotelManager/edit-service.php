<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8" />
   <meta http-equiv="X-UA-Compatible" content="IE=edge" />
   <meta name="viewport" content="width=device-width, initial-scale=1.0" />
   <link rel="stylesheet" href="<?php echo URLROOT ?>/public/css/hotel manager/styles-hotel.css" />
   <link rel="stylesheet" href="<?php echo URLROOT ?>/public/css/hotel manager/style.css" />
   
   <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" />
   <script src="https://kit.fontawesome.com/c02eb7591c.js" crossorigin="anonymous"></script>

   <link rel="stylesheet" href="<?php echo URLROOT ?>/public/css/footer.css" />

   <title>TruEvent Horizons - Hotel Manager Edit Service</title>
</head>

<body>
<?php require APPROOT . "/views/hotelManager/header-hotel.php" ?>

   <div class="main-container">
      
      <a href="#" class="top-right-closeBtn white-red-hover"><i class="fal fa-times fa-2x "></i></a>
      
      <div class="ser-container form-container contentBox">
         <form action="#" method="post" class="form">
            <h1 class="title">Edit Service</h1>

            
                  <div class="text-group">
                     <label for="event name">Event Name</label>        
                     <input class="eventname" type="text" name="event_name"  placeholder="Enter event name here" required>
                   
                  </div>
               
                  <div class="text-group">
                     <label for="hotelimage">Hotel Image (Note:- Allowed only JPG, JPEG, PNG, & GIF)</label>        
                     <input class="hotelimageinput" type="file" name="hotel_image"  required="" capture>
       
                  </div>
                  

            <div class="row">
                <div class="column">
                   <div class="text-group">
                      <label class="label" for="hall name">Hall Name</label>
                      <input type="text" name="hall name" placeholder="Enter hall name here" maxlength="25">
                      
                   </div>
                </div>
                <div class="column">
                   <div class="text-group">
                     <label class="label" for="location">Location</label>
                     <input type="text" name="location" placeholder="Enter location here" maxlength="25">
                   
                   </div>
                </div>
             </div>

            <div class="row">
                <div class="column">
                   <div class="text-group">
                     <label class="label" for="max_crowd">Max Crowd</label>
                     <input type="number" name="max_crowd" placeholder="Enter maximum crowd" maxlength="25">
                     
                   </div>
                </div>
                <div class="column">
                   <div class="text-group">
                      <label class="label" for="price">Price</label>
                      <input type="text" name="price" placeholder="Enter price of service" maxlength="25">
                      
                   </div>
                </div>
             </div>


             <div class="row">
                <div class="column">
                        <label class="label" for="hall_type">Hall Type</label>
                        <select name = "hall_type" class="dropdownmenu" id="hall_type"> 
                                <option value="">Select a hall type</option>
                                <option value = "indoor">Indoor</option>
                                <option value = "outdoor">Outdoor</option>
                        </select>
                </div>
                <div class="column">
                   <div class="text-group">
                      <label class="label" for="air condition status">Air Condition Status</label> <br>
                          Yes
                         <input type="radio"  name="ac_status">
                          No
                         <input type="radio"  name="ac_status" checked=true>     
                    
                   </div>
                </div>
             </div>
           
             <div class="text-group">
               <label for="otherfacilities">Other Facilities</label>        
               <input class="otherfac" type="text" name="other_facilities"  placeholder="Enter other facilities here">
              
            </div>
            
            <div class="footer-container">
               <button type="submit" name="action" class="btn btn-filled btn-theme-purple">Update</button>
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

</html>