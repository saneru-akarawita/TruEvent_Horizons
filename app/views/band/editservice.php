<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TruEvent Horizons - Edit Services - Band</title>
    <link rel="stylesheet" href="<?php echo URLROOT ?>/public/css/deco company/addservice.css">

   <link rel="stylesheet" href="<?php echo URLROOT ?>/public/css/hotel manager/styles-hotel.css" />
   <link rel="stylesheet" href="<?php echo URLROOT ?>/public/css/hotel manager/style.css" />
   <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" />
   <link rel="shortcut icon" type="image/x-icon" href="<?php echo URLROOT ?>/public/images/hotel manager/logo/logo.png">

</head>

<body>
<?php require APPROOT . "/views/band/header-band.php" ?>

   <div class="main-container">
      
      <div class="ser-container form-container contentBox" style="margin-top: 100px; margin-bottom:100px">
         <form action="<?php echo URLROOT; ?>/BandService/editService" method="post" class="form">
            <h1 class="title" style="font-size:3rem;">Edit Band</h1>

            
                  <div class="text-group">
                     <label for="event name">Service Name/Type</label>        
                     <select name = "service_name" class="dropdownmenu" id="service_name" required> 
                        <option value="">Select event name or type...</option>
                        <option value = "Birthday Parties" <?php if($data['name']=='Birthday Parties') echo "selected"; ?>>Birthday Parties</option>
                        <option value = "Anniversary Parties" <?php if($data['name']=='Anniversary Parties') echo "selected"; ?>>Anniversary Parties </option>
                        <option value = "Welcome Parties" <?php if($data['name']=='Welcome Parties') echo "selected"; ?>>Welcome Parties </option>
                        <option value = "Night Functions" <?php if($data['name']=='Night Functions') echo "selected"; ?>>Night Functions </option>
                        <option value = "Get-Togethers" <?php if($data['name']=='Get-Togethers') echo "selected"; ?>>Get-Togethers </option>
                        <option value = "Business Gatherings" <?php if($data['name']=='Business Gatherings') echo "selected"; ?>>Business Gatherings </option>
                        <option value = "General Events" <?php if($data['name']=='General Events') echo "selected"; ?>>General Events </option>
                     </select>
                     <span class="error"><?php echo $data['name_error']; ?></span>
                  </div>


                  <?php
                    $banddata=(explode(", ",$data['band']));

                    $check=array("Pop","Classic","Hip-Hop","Rap","EDM - (Electronic Dance Music)","Ballads");
                    if (in_array($check[0], $banddata))
                    {
                    $checked1 ="checked";
                    }
                    else
                    {
                    $checked1 ="";
                    }

                    if (in_array($check[1], $banddata))
                    {
                    $checked2 ="checked";
                    }
                    else
                    {
                    $checked2 ="";
                    }
                    if (in_array($check[2], $banddata))
                    {
                    $checked3 ="checked";
                    }
                    else
                    {
                    $checked3 ="";
                    }
                    if (in_array($check[3], $banddata))
                    {
                    $checked4 ="checked";
                    }
                    else
                    {
                    $checked4 ="";
                    }
                    if (in_array($check[4], $banddata))
                    {
                    $checked5 ="checked";
                    }
                    else
                    {
                    $checked5 ="";
                    }
                    if (in_array($check[5], $banddata))
                    {
                    $checked6 ="checked";
                    }
                    else
                    {
                    $checked6 ="";
                    }
                    
                ?>

                  <label for="event name">Music Types :</label><br>
               <div class="row">
                  <div class="column">
                     <input type="checkbox" id="band1" name="band[]" value="Pop" <?php echo $checked1?> >
                     <label for="band1">Pop</label><br>
                     <input type="checkbox" id="band2" name="band[]" value="Classic" <?php echo $checked2?> >
                     <label for="band2">Classic</label><br>
                     <input type="checkbox" id="band3" name="band[]" value="Hip-Hop" <?php echo $checked3?> >
                     <label for="band3">Hip-Hop</label><br>
                     <input type="checkbox" id="band4" name="band[]" value="Rap" <?php echo $checked4?> >
                     <label for="band4">Rap</label><br>
                     <input type="checkbox" id="band5" name="band[]" value="EDM" <?php echo $checked5?> >
                     <label for="band5">EDM - (Electronic Dance Music)</label><br>
                     <input type="checkbox" id="band6" name="band[]" value="Ballads" <?php echo $checked6?> >
                     <label for="band6">Ballads</label><br>
                   
               </div>
            </div>

            <div class="text-group">
               <label class="label" for="band">Other Music Types</label>
               <input type="text" name="other_band" id="other_band" placeholder="If any, other than above" value="<?php echo $data['other_band']; ?>" maxlength="25">
            </div>
               
                  <div class="text-group">
                     <label for="num_players">No Of Players</label>        
                     <input class="num_players" type="number" name="num_players" id="num_players" placeholder="No of Players included in band" value="<?php echo $data['num_players']; ?>" required >
                     <span class="error"><?php echo $data['num_players_error']; ?></span>
                  </div><br>
                  


            <div class="row">
                <div class="column">
                   <div class="text-group">
                      <label class="label" for="price">Price</label>
                      <input type="text" name="price" id="price" placeholder="Enter price of service" value="<?php echo $data['price']; ?>" maxlength="25" required>
                      <span class="error"><?php echo $data['price_error']; ?></span>
                   </div>
                </div>
             
             </div>
           
             <input type="hidden" id="sv_id" name="sv_id" value="<?php echo $data['sv_id']; ?>">

             <div class="footer-container">
               <button type="submit" name="action" value="editservice" class="btn btn-filled btn-theme-purple">Update Service</button>
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
    

    <script src="<?php echo URLROOT ?>/public/js/band/bandscript.js"></script>

</body>

</html>