<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8" />
   <meta http-equiv="X-UA-Compatible" content="IE=edge" />
   <meta name="viewport" content="width=device-width, initial-scale=1.0" />

   <link rel="stylesheet" href="<?php echo URLROOT ?>/public/css/hotel manager/styles-hotel.css" />
   <link rel="stylesheet" href="<?php echo URLROOT ?>/public/css/hotel manager/style.css" />
   <link rel="stylesheet" href="<?php echo URLROOT ?>/public/css/hotel manager/style1.css" />

   <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" />
   <link rel="shortcut icon" type="image/x-icon" href="<?php echo URLROOT ?>/public/images/hotel manager/logo/logo.png">
   <link rel="stylesheet" href="<?php echo URLROOT ?>/public/css/hotel manager/header-hotel.css">
   <script src="https://kit.fontawesome.com/c02eb7591c.js" crossorigin="anonymous"></script>

   <title>TruEvent Horizons - Add Service - Hotel</title>
</head>

<body>

<!-- -------------------------------------Start header for hotel-------------------------------------------------- -->
<?php require APPROOT . "/views/hotelManager/header-hotel.php" ?>
<!-- -------------------------------------End header for hotel-------------------------------------------------- -->



   <div class="main-container">
     
      <div class="ser-container form-container contentBox" style="margin-top: 100px; margin-bottom:100px">
         <form action="<?php echo URLROOT; ?>/hotelService/addNewService" method="post" class="form" enctype="multipart/form-data">
            <h1 class="title">Add New Service</h1>

            
                  <div class="text-group">
                     <label for="event name">Service Name/Type</label>        
                     <select name = "event_name" class="dropdownmenu" id="event_name" required> 
                        <option value="">Select event name or type...</option>
                        <option value = "Birthday Parties">Birthday Parties</option>
                        <option value = "Anniversary Parties">Anniversary Parties</option>
                        <option value = "Welcome Parties">Welcome Parties</option>
                        <option value = "Night Functions">Night Functions</option>
                        <option value = "Get-Togethers">Get-Togethers</option>
                        <option value = "Business Gatherings">Business Gatherings</option>
                        <option value = "General Events">General Events</option>
                     </select>
                     <span class="error"><?php echo $data['event_name_error']; ?></span>
                  </div>
               
                  <div class="text-group">
                     <label for="hotelimage">Hall Image (Note:- Allowed only JPG, JPEG, PNG, & GIF)</label>        
                     <input class="hotelimageinput" type="file" name="hotel_image"  required="" capture>
                     <span class="error"><?php echo $data['hotel_image_error']; ?></span>
                  </div>
                  

            <div class="row">
                <div class="column">
                   <div class="text-group">
                      <label class="label" for="hall name">Hall Name</label>
                      <input type="text" name="hall_name" placeholder="Enter hall name here" value="<?php echo $data['hall_name']; ?>" maxlength="25" required>
                      <span class="error"><?php echo $data['hall_name_error']; ?></span>
                   </div>
                </div>
                <div class="column">
                   <div class="text-group">
                     <label class="label" for="location">Location (Floor/Wing etc.)</label>
                     <input type="text" name="location" placeholder="Enter location here" value="<?php echo $data['location']; ?>" maxlength="25" required>
                     <span class="error"><?php echo $data['location_error']; ?></span>
                   </div>
                </div>
             </div>

            <div class="row">
                <div class="column">
                   <div class="text-group">
                     <label class="label" for="max_crowd">Max Crowd</label>
                     <input type="number" name="max_crowd" placeholder="Enter maximum crowd" min = 1 value="<?php echo $data['max_crowd']; ?>" maxlength="25">
                     <span class="error"><?php echo $data['max_crowd_error']; ?></span>
                   </div>
                </div>
                <div class="column">
                   <div class="text-group">
                      <label class="label" for="price">Price Per Head (Rs.)</label>
                      <input type="text" name="price" placeholder="Enter price of service" value="<?php echo $data['price']; ?>" maxlength="25" required>
                      <span class="error"><?php echo $data['price_error']; ?></span>
                   </div>
                </div>
             </div>


             <div class="row">
                <div class="column">
                        <label class="label" for="hall_type">Hall Type</label>
                        <select name = "hall_type" class="dropdownmenu" id="hall_type" required> 
                                <option value="">Select a hall type</option>
                                <option value = "indoor">Indoor</option>
                                <option value = "outdoor">Outdoor</option>
                        </select>
                        <span class="error"><?php echo $data['hall_type_error']; ?></span>
                </div>
                <div class="column">
                   <div class="text-group">
                      <label class="label" for="air condition status">Air Condition Status</label> <br>
                          Yes
                         <input type="radio"  name="ac_status" value =1>
                          No
                         <input type="radio"  name="ac_status" value =0 checked=true>     
                    
                   </div>
                </div>
             </div>
           
             <div class="text-group">
               <label for="otherfacilities">Other Facilities</label>        
               <input class="otherfac" type="text" name="other_facilities"  placeholder="Enter other facilities here" value="<?php echo $data['other_facilities']; ?>">
            </div>
            <div class="footer-container">
               <button type="submit" name="action" value="addservices" class="btn btn-filled btn-theme-purple">Add Service</button>
            </div>
         </form>
      </div>
   </div>


   <!-- <-------------------------------------------------------Home Page Services End-------------------------------------------------------> 

        <!-- footer start -->
        <section class="footer">
            <div class="overlay"></div>
            <div class="box-container">
                <div class="box">
                    <h3>Quick Access</h3>
                <a href="home"><i class="fas fa-angle-right"></i>  Home</a>
                <a href="viewservices"><i class="fas fa-angle-right"></i> Services</a>
                <a href="addservices"><i class="fas fa-angle-right"></i> Add Services</a>
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
                <a href="#"><i class="fa-solid fa-envelope"></i> TruEvent@gmail.com</a>
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
                Created By <span>TruEvent</span> | All Rights Reserved
            </div>
        
        </section>
        
        
        <!-- footer ends -->
    <script src="<?php echo URLROOT ?>/public/js/hotel manager/hotelscript.js"></script>
</body>

</html>