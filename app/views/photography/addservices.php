<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TruEvent Horizons - Add Services - Photography</title>
    <link rel="stylesheet" href="<?php echo URLROOT ?>/public/css/deco company/addservice.css">

   <link rel="stylesheet" href="<?php echo URLROOT ?>/public/css/hotel manager/styles-hotel.css" />
   <link rel="stylesheet" href="<?php echo URLROOT ?>/public/css/hotel manager/style.css" />
   <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" />
   <link rel="shortcut icon" type="image/x-icon" href="<?php echo URLROOT ?>/public/images/hotel manager/logo/logo.png">

</head>

<body>
<?php require APPROOT . "/views/photography/header-photography.php" ?>

   <div class="main-container">
      <!-- <a href="home">
         <img src="<?php echo URLROOT ?>/public/images/hotel manager/logo/logo.png" alt="logo" class="top-left-logo">
      </a> -->
      <!-- <a href="home" class="top-right-closeBtn white-red-hover"><i class="fal fa-times fa-2x "></i></a> -->
      
      <div class="ser-container form-container contentBox" style="margin-top: 100px; margin-bottom:100px">
         <form action="<?php echo URLROOT; ?>/photographyService/addNewService" method="post" class="form">
            <h1 class="title" style="font-size:3rem;">Add New Service</h1>

            
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

                  <label for="event name">Features :</label><br>
               <div class="row">
                  <div class="column">
                     <input type="checkbox" id="photography1" name="photography[]" value="Full-day photo shoots">
                     <label for="photography1">Full-day photo shoots</label><br>
                     <input type="checkbox" id="photography2" name="photography[]" value="Half-day photo shoots">
                     <label for="photography2">Half-day photo shoots</label><br>
                     <input type="checkbox" id="photography3" name="photography[]" value="Professional lighting setup">
                     <label for="photography3">Professional lighting setup</label><br>
                     <input type="checkbox" id="photography4" name="photography[]" value="Professional camera and lens kits">
                     <label for="photography4">Professional camera and lens kits</label><br>
                     <input type="checkbox" id="photography5" name="photography[]" value="Photo editing - color correction and retouching">
                     <label for="photography5">Photo editing - color correction and retouching</label><br>
                     <input type="checkbox" id="photography6" name="photography[]" value="Single-shooter">
                     <label for="photography6">Single-shooter</label><br>
                     <input type="checkbox" id="photography7" name="photography[]" value="Multi-shooter">
                     <label for="photography7">Multi-shooter</label><br>
                     <span class="error"><?php echo $data['photography_error']; ?></span>
                   
               </div>
               
            </div>

            <div class="text-group">
               <label class="label" for="photography">Other Features</label>
               <input type="text" name="other_photography" id="other_photography" placeholder="If any, other than above" value="<?php echo $data['other_photography']; ?>" maxlength="100">
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