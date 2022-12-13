<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8" />
   <meta http-equiv="X-UA-Compatible" content="IE=edge" />
   <meta name="viewport" content="width=device-width, initial-scale=1.0" />

   <link rel="stylesheet" href="<?php echo URLROOT ?>/public/css/hotel manager/styles-hotel.css" />
   <link rel="stylesheet" href="<?php echo URLROOT ?>/public/css/hotel manager/style.css" />
   <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" />
   <link rel="shortcut icon" type="image/x-icon" href="<?php echo URLROOT ?>/public/images/hotel manager/logo/logo.png">
   <title>TruEvent Horizons - Hotel Manager Add Service</title>
</head>

<body>
   <div class="main-container">
      <a href="#">
         <img src="<?php echo URLROOT ?>/public/images/hotel manager/logo/logo.png" alt="logo" class="top-left-logo">
      </a>
      <a href="home" class="top-right-closeBtn white-red-hover"><i class="fal fa-times fa-2x "></i></a>
      
      <div class="ser-container form-container contentBox" style="margin-top: 100px; margin-bottom:100px">
         <form action="<?php echo URLROOT; ?>/hotelService/addNewService" method="post" class="form">
            <h1 class="title">Add Venue/Location</h1>

            
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
                        <label class="label" for="hall_type">Hall Type</label>
                        <select name = "hall_type" class="dropdownmenu" id="hall_type"> 
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

</body>

</html>