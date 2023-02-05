<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TruEvent Horizons - Add Services - Band</title>
    <link rel="stylesheet" href="<?php echo URLROOT ?>/public/css/deco company/addservice.css">

   <link rel="stylesheet" href="<?php echo URLROOT ?>/public/css/hotel manager/styles-hotel.css" />
   <link rel="stylesheet" href="<?php echo URLROOT ?>/public/css/hotel manager/style.css" />
   <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" />
   <link rel="shortcut icon" type="image/x-icon" href="<?php echo URLROOT ?>/public/images/hotel manager/logo/logo.png">

</head>

<body>
<?php require APPROOT . "/views/band/header-band.php" ?>

   <div class="main-container">
      <!-- <a href="home">
         <img src="<?php echo URLROOT ?>/public/images/hotel manager/logo/logo.png" alt="logo" class="top-left-logo">
      </a> -->
      <!-- <a href="home" class="top-right-closeBtn white-red-hover"><i class="fal fa-times fa-2x "></i></a> -->
      
      <div class="ser-container form-container contentBox" style="margin-top: 100px; margin-bottom:100px">
         <form action="<?php echo URLROOT; ?>/bandService/addNewService" method="post" class="form">
            <h1 class="title" style="font-size:3rem;">Add Band</h1>

            
                  <div class="text-group">
                     <label for="event name">Service Name/Type</label>        
                     <select name = "service_name" class="dropdownmenu" id="service_name" required> 
                        <option value="">Select event name or type...</option>
                        <option value = "Birthday Parties">Birthday Parties</option>
                        <option value = "Anniversary Parties">Anniversary Parties</option>
                        <option value = "Welcome Parties">Welcome Parties</option>
                        <option value = "Night Functions">Night Functions</option>
                        <option value = "Get-Togethers">Get-Togethers</option>
                        <option value = "Business Gatherings">Business Gatherings</option>
                        <option value = "General Events">General Events</option>
                     </select>
                     <span class="error"><?php echo $data['name_error']; ?></span>
                  </div>

                  <label for="event name">Music Types :</label><br>
               <div class="row">
                  <div class="column">
                     <input type="checkbox" id="band1" name="band[]" value="Pop">
                     <label for="band1">Pop</label><br>
                     <input type="checkbox" id="band2" name="band[]" value="Classic">
                     <label for="band2">Classic</label><br>
                     <input type="checkbox" id="band3" name="band[]" value="Hip-Hop">
                     <label for="band3">Hip-Hop</label><br>
                     <input type="checkbox" id="band4" name="band[]" value="Rap">
                     <label for="band4">Rap</label><br>
                     <input type="checkbox" id="band5" name="band[]" value="EDM">
                     <label for="band5">EDM - (Electronic Dance Music)</label><br>
                     <input type="checkbox" id="band6" name="band[]" value="Ballads">
                     <label for="band6">Ballads</label><br>
                   
               </div>
               <!-- <div class="column">
                     <input type="checkbox" id="deco5" name="band[]" value="Lights">
                     <label for="deco5">With Dancing Group</label><br>
                     <input type="checkbox" id="deco6" name="decoration[]" value="Banners">
                     <label for="deco6">Banners</label><br>
                     <input type="checkbox" id="deco8" name="decoration[]" value="Table cloths">
                     <label for="deco8">Table cloths</label><br>
                     <input type="checkbox" id="deco9" name="decoration[]" value="Chair covers">
                     <label for="deco9">Chair covers</label><br><br>
               </div> -->
            </div>

            <div class="text-group">
               <label class="label" for="band">Other Music Types</label>
               <input type="text" name="other_band" id="other_band" placeholder="If any, other than above" value="" maxlength="25">
            </div>
               
                  <div class="text-group">
                     <label for="num_players">No of players</label>        
                     <input class="num_players" type="number" name="num_players" id="num_players" placeholder="No of Players included in band" value="" required >
                     <span class="error"><?php echo $data['num_players_error']; ?></span>
                  </div><br>
                  


            <div class="row">
                <div class="column">
                   <div class="text-group">
                      <label class="label" for="price">Price</label>
                      <input type="text" name="price" id="price" placeholder="Enter price of service" value="" maxlength="25" required>
                      <span class="error"><?php echo $data['price_error']; ?></span>
                   </div>
                </div>
             
             </div>
           
             
            <div class="footer-container">
               <button type="submit" name="action" value="addservice" class="btn btn-filled btn-theme-purple">Add Service</button>
            </div>

         </form>
      </div>
   </div>


   <section class="footer">
    <div class="overlay"></div>
    <div class="box-container">
        <div class="box">
            <h3>Quick Access</h3>
        <a href="home"><i class="fas fa-angle-right"></i>  Home</a>
        <a href="viewservices"><i class="fas fa-angle-right"></i> Services</a>
        <a href="addservices"><i class="fas fa-angle-right"></i> Packages</a>
        </div>

        <div class="box">
            <h3>Extra</h3>
        <a href="#"><i class="fas fa-angle-right"></i>  About Us</a>
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
        Created By <span>TruEvent</span> | All Rights Reserved
    </div>

</section>


<!-- footer ends -->
    

    <script src="<?php echo URLROOT ?>/public/js/band/bandscript.js"></script>

</body>

</html>