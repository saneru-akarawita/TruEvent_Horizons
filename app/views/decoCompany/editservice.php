<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TruEvent Horizons - Edit Services - Deco Company</title>
    <link rel="stylesheet" href="<?php echo URLROOT ?>/public/css/deco company/addservice.css">

   <link rel="stylesheet" href="<?php echo URLROOT ?>/public/css/hotel manager/styles-hotel.css" />
   <link rel="stylesheet" href="<?php echo URLROOT ?>/public/css/hotel manager/style.css" />
   <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" />
   <link rel="shortcut icon" type="image/x-icon" href="<?php echo URLROOT ?>/public/images/hotel manager/logo/logo.png">

</head>

<body>
<?php require APPROOT . "/views/decoCompany/header-deco.php" ?>
   <div class="main-container">
      
      <div class="ser-container form-container contentBox" style="margin-top: 100px; margin-bottom:100px">
         <form action="<?php echo URLROOT; ?>/decoService/editService" method="post" class="form">
            <h1 class="title" style="font-size:3rem;">Edit Decoration</h1>
            <?php if($data['name']=='') echo "selected" ?>
            
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
                    $decodata=(explode(", ",$data['decoration']));

                    $check=array("Fresh flowers","Artificial flowers","Balloons","Candles","Lights","Banners","Table cloths","Chair covers");
                    if (in_array($check[0], $decodata))
                    {
                    $checked1 ="checked";
                    }
                    else
                    {
                    $checked1 ="";
                    }

                    if (in_array($check[1], $decodata))
                    {
                    $checked2 ="checked";
                    }
                    else
                    {
                    $checked2 ="";
                    }
                    if (in_array($check[2], $decodata))
                    {
                    $checked3 ="checked";
                    }
                    else
                    {
                    $checked3 ="";
                    }
                    if (in_array($check[3], $decodata))
                    {
                    $checked4 ="checked";
                    }
                    else
                    {
                    $checked4 ="";
                    }
                    if (in_array($check[4], $decodata))
                    {
                    $checked5 ="checked";
                    }
                    else
                    {
                    $checked5 ="";
                    }
                    if (in_array($check[5], $decodata))
                    {
                    $checked6 ="checked";
                    }
                    else
                    {
                    $checked6 ="";
                    }
                    if (in_array($check[6], $decodata))
                    {
                    $checked7 ="checked";
                    }
                    else
                    {
                    $checked7 ="";
                    }
                    if (in_array($check[7], $decodata))
                    {
                    $checked8 ="checked";
                    }
                    else
                    {
                    $checked8 ="";
                    }
                ?>

                  <label for="event name">Decorations :</label><br>
               <div class="row">
                  <div class="column">
                     <input type="checkbox" id="deco1" name="decoration[]" value="Fresh flowers" <?php echo $checked1?>>
                     <label for="deco1">Fresh flowers(Natural)</label><br>
                     <input type="checkbox" id="deco2" name="decoration[]" value="Artificial flowers" <?php echo $checked2?>>
                     <label for="deco2">Artificial flowers</label><br>
                     <input type="checkbox" id="deco3" name="decoration[]" value="Balloons" <?php echo $checked3?>>
                     <label for="deco3">Balloons</label><br>
                     <input type="checkbox" id="deco4" name="decoration[]" value="Candles" <?php echo $checked4?>>
                     <label for="deco4">Candles</label><br>
               </div>
               <div class="column">
                     <input type="checkbox" id="deco5" name="decoration[]" value="Lights" <?php echo $checked5?>>
                     <label for="deco5">Lights</label><br>
                     <input type="checkbox" id="deco6" name="decoration[]" value="Banners" <?php echo $checked6?>>
                     <label for="deco6">Banners</label><br>
                     <input type="checkbox" id="deco8" name="decoration[]" value="Table cloths" <?php echo $checked7?>>
                     <label for="deco8">Table cloths</label><br>
                     <input type="checkbox" id="deco9" name="decoration[]" value="Chair covers" <?php echo $checked8?>>
                     <label for="deco9">Chair covers</label><br><br>
               </div>
               <span class="error"><?php echo $data['deco_error']; ?></span>
            </div>

            <div class="text-group">
               <label class="label" for="decoration">Other decorations</label>
               <input type="text" name="other_deco" id="other_deco" placeholder="If any, other than above" value="<?php echo $data['other_deco']; ?>" maxlength="100">
            </div>
               
                  <div class="text-group">
                     <label for="theme">Theme</label>        
                     <input class="theme" type="text" name="theme" id="theme" placeholder="Event theme" value="<?php echo $data['theme']; ?>" required >
                     <span class="error"><?php echo $data['theme_error']; ?></span>
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
        <a href="addservices"><i class="fas fa-angle-right"></i> Add Services</a>
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
    
    <script src="<?php echo URLROOT ?>/public/js/deco company/decoscript.js"></script>

</body>

</html>