<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TruEvent Horizons - Edit Services - Photography</title>
    <link rel="stylesheet" href="<?php echo URLROOT ?>/public/css/deco company/addservice.css">

   <link rel="stylesheet" href="<?php echo URLROOT ?>/public/css/hotel manager/styles-hotel.css" />
   <link rel="stylesheet" href="<?php echo URLROOT ?>/public/css/hotel manager/style.css" />
   <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" />
   <link rel="shortcut icon" type="image/x-icon" href="<?php echo URLROOT ?>/public/images/hotel manager/logo/logo.png">

</head>

<body>
<?php require APPROOT . "/views/photography/header-photography.php" ?>

<div class="main-container">
<div class="ser-container form-container contentBox" style="margin-top: 100px; margin-bottom:100px"> 
<form action="<?php echo URLROOT; ?>/PhotographyService/editService" method="post" class="form">
            <h1 class="title" style="font-size:3rem;">Edit Photography Service</h1>

            
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
                    $photodata=(explode(", ",$data['photography']));

                    $check=array("Full-day photo shoots","Half-day photo shoots","Professional lighting setup","Professional camera and lens kits","Photo editing, color correction and retouching","Single-shooter","Multi-shooter");
                    if (in_array($check[0], $photodata))
                    {
                    $checked1 ="checked";
                    }
                    else
                    {
                    $checked1 ="";
                    }

                    if (in_array($check[1], $photodata))
                    {
                    $checked2 ="checked";
                    }
                    else
                    {
                    $checked2 ="";
                    }
                    if (in_array($check[2], $photodata))
                    {
                    $checked3 ="checked";
                    }
                    else
                    {
                    $checked3 ="";
                    }
                    if (in_array($check[3], $photodata))
                    {
                    $checked4 ="checked";
                    }
                    else
                    {
                    $checked4 ="";
                    }
                    if (in_array($check[4], $photodata))
                    {
                    $checked5 ="checked";
                    }
                    else
                    {
                    $checked5 ="";
                    }
                    if (in_array($check[5], $photodata))
                    {
                    $checked6 ="checked";
                    }
                    else
                    {
                    $checked6 ="";
                    }
                    if (in_array($check[6], $photodata))
                    {
                    $checked7 ="checked";
                    }
                    else
                    {
                    $checked7 ="";
                    }
                    
                ?>

                  <label for="event name">Features :</label><br>
               <div class="row">
                  <div class="column">
                     <input type="checkbox" id="photography1" name="photography[]" value="Full-day photo shoots" <?php echo $checked1?> >
                     <label for="photography1">Full-day photo shoots</label><br>
                     <input type="checkbox" id="photography2" name="photography[]" value="Half-day photo shoots" <?php echo $checked2?> >
                     <label for="photography2">Half-day photo shoots</label><br>
                     <input type="checkbox" id="photography3" name="photography[]" value="Professional lighting setup" <?php echo $checked3?> >
                     <label for="photography3">Professional lighting setup</label><br>
                     <input type="checkbox" id="photography4" name="photography[]" value="Professional camera and lens kits" <?php echo $checked4?> >
                     <label for="photography4">Professional camera and lens kits</label><br>
                     <input type="checkbox" id="photography5" name="photography[]" value="Photo editing, color correction and retouching" <?php echo $checked5?> >
                     <label for="photography5">Photo editing, color correction and retouching</label><br>
                     <input type="checkbox" id="photography6" name="photography[]" value="Single-shooter" <?php echo $checked6?> >
                     <label for="photography6">Single-shooter</label><br>
                     <input type="checkbox" id="photography7" name="photography[]" value="Multi-shooter" <?php echo $checked7?> >
                     <label for="photography7">Multi-shooter</label><br>
                   
               </div>
            </div>

            <div class="text-group">
               <label class="label" for="photography">Other Features</label>
               <input type="text" name="other_photography" id="other_photography" placeholder="If any, other than above" value="<?php echo $data['other_photography']; ?>" maxlength="25">
            </div>

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
    

    <script src="<?php echo URLROOT ?>/public/js/photography/photographyscript.js"></script>

</body>

</html>