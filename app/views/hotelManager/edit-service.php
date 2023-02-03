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
      <!-- <a href="#">
         <img src="<?php echo URLROOT ?>/public/images/hotel manager/logo/logo.png" alt="logo" class="top-left-logo">
      </a>
      <a href="home" class="top-right-closeBtn white-red-hover"><i class="fal fa-times fa-2x "></i></a> -->
      
      <div class="ser-container form-container contentBox" style="margin-top: 100px; margin-bottom:100px">
         <form action="<?php echo URLROOT; ?>/hotelService/editService" method="post" class="form">
            <h1 class="title">Edit Venue/Location</h1>
            <?php if($data['event_name']=='') echo "selected" ?>

                  <div class="text-group">
                     <label for="event name">Service Name/Type</label>        
                     <select name = "event_name" class="dropdownmenu" id="event_name" required> 
                        <option value="">Select event name or type...</option>
                        <option value = "Birthday Parties"  <?php if($data['event_name']=='Birthday Parties') echo "selected"; ?> >Birthday Parties</option>
                        <option value = "Anniversary Parties"  <?php if($data['event_name']=='Anniversary Parties') echo "selected"; ?> >Anniversary Parties</option>
                        <option value = "Welcome Parties"  <?php if($data['event_name']=='Welcome Parties') echo "selected"; ?> >Welcome Parties</option>
                        <option value = "Night Functions"  <?php if($data['event_name']=='Night Functions') echo "selected"; ?> >Night Functions</option>
                        <option value = "Get-Togethers"  <?php if($data['event_name']=='Get-Togethers') echo "selected"; ?> >Get-Togethers</option>
                        <option value = "Business Gatherings"  <?php if($data['event_name']=='Business Gatherings') echo "selected"; ?> >Business Gatherings</option>
                        <option value = "General Events"  <?php if($data['event_name']=='General Events') echo "selected"; ?> >General Events</option>
                     </select>
                     <span class="error"><?php echo $data['event_name_error']; ?></span>
                  </div>
<!--                
                  <div class="text-group">
                     <label for="hotelimage">Hall Image (Note:- Allowed only JPG, JPEG, PNG, & GIF)</label>        
                     <input class="hotelimageinput" type="file" name="hotel_image"  required="" capture>
                     <span class="error"><?php echo $data['hotel_image_error']; ?></span>
                  </div> -->
                  

            <div class="row">
                <div class="column">
                   <div class="text-group">
                      <label class="label" for="hall name">Hall Name</label>
                      <input type="text" name="hall_name" placeholder="Enter hall name here" value="<?php echo $data['hall_name']; ?>" maxlength="25">
                      <span class="error"><?php echo $data['hall_name_error']; ?></span>
                   </div>
                </div>
                <div class="column">
                   <div class="text-group">
                     <label class="label" for="location">Location (Floor/Wing etc.)</label>
                     <input type="text" name="location" placeholder="Enter location here" value="<?php echo $data['location']; ?>" maxlength="25">
                     <span class="error"><?php echo $data['location_error']; ?></span>
                   </div>
                </div>
             </div>

            <div class="row">
                <div class="column">
                   <div class="text-group">
                     <label class="label" for="max_crowd">Max Crowd</label>
                     <input type="number" name="max_crowd" placeholder="Enter maximum crowd" value="<?php echo $data['max_crowd']; ?>" maxlength="25">
                     <span class="error"><?php echo $data['max_crowd_error']; ?></span>
                   </div>
                </div>
                <div class="column">
                   <div class="text-group">
                      <label class="label" for="price">Price Per Head (Rs.)</label>
                      <input type="text" name="price" placeholder="Enter price of service" value="<?php echo $data['price']; ?>" maxlength="25">
                      <span class="error"><?php echo $data['price_error']; ?></span>
                   </div>
                </div>
             </div>


             <div class="row">
                <div class="column">
                <?php if($data['hall_type']=='') echo "selected" ?>

                        <label class="label" for="hall_type">Hall Type</label>
                        <select name = "hall_type" class="dropdownmenu" id="hall_type"> 
                                <option value="">Select a hall type</option>
                                <option value = "indoor" <?php if($data['hall_type']=='indoor') echo "selected"; ?> >Indoor</option>
                                <option value = "outdoor" <?php if($data['hall_type']=='outdoor') echo "selected"; ?> >Outdoor</option>
                        </select>
                        <span class="error"><?php echo $data['hall_type_error']; ?></span>
                </div>
                <div class="column">
                   <div class="text-group">
                   <?php if($data['ac_status']=='') echo "selected" ?>
                      <label class="label" for="air condition status">Air Condition Status</label> <br>
                          Yes
                         <input type="radio"  name="ac_status" value =1  <?php if($data['ac_status']==1) echo "checked" ; ?> >
                          No
                         <input type="radio"  name="ac_status" value =0 <?php if($data['ac_status']==0) echo "checked" ; ?>>     
                    
                   </div>
                </div>
             </div>
           
             <div class="text-group">
               <label for="otherfacilities">Other Facilities</label>        
               <input class="otherfac" type="text" name="other_facilities"  placeholder="Enter other facilities here" value="<?php echo $data['other_facilities']; ?>">
            </div>
            <input type="hidden" id="sv_id" name="sv_id" value="<?php echo $data['sv_id']; ?>">

            <div class="footer-container">
               <button type="submit" name="action" value="editservice" class="btn btn-filled btn-theme-purple">Update Service</button>
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