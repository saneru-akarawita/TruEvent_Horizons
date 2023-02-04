<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Add Packages</title>

        <!-- font awesome cdn link -->
        <link rel="stylesheet" href=<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />

        <!-- custom css file link -->
        <link rel="stylesheet" href="<?php echo URLROOT ?>/public/css/style.css">
        <link rel="stylesheet" href="<?php echo URLROOT ?>/public/css/admin/admin-add-reservation-style.css">
        <link rel="stylesheet" href="<?php echo URLROOT ?>/public/css/admin/add-package-service-style.css">
<style>
   a{
      font-size:16px;
      @font-face{
         src: url("https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css");
      }  
   }

</style>
    </head>
    <body>
    <?php require APPROOT . "/views/admin/header-admin.php" ?>

<!-- header section starts -->
<!-- <section class="header">
<img src="<?php echo URLROOT ?>/public/images/admin/logo/logo.jpg" alt="logo" class="logo">
<a href="home" class="dashboard">Dashboard</a>

<nav class="navbar">
    <a href="home">Home</a>
    <a href="viewpackages">Packages</a>
    <a href="addpackages">Add Packages</a>
    <a href="logout">Logout</a>
</nav> -->

<!-- Gives a Menu Button -->
<button id="menu-btn" class="fas fa-bars"></button>


<!-- </section> -->

<!-- header section ends -->

<div class="heading" style="background:url() no-repeat">
<!-- <h1>Add Packages</h1> -->
</div>

<!-- Add package starts -->
<section class="add-packages">
   <h1 class="heading-title" >
      Add Packages
   </h1>
<div class="reg-container form-container contentBox">
         <form action="<?php echo URLROOT; ?>/packages/addNewPackage" method="post" class="form">
            <div class="row">
               <div class="column">
                  <div class="text-group">
                     <label class="label" for="pcode">Package Code</label>
                     <input type="text" name="pcode" placeholder="Enter Package Code" value="<?php echo $data[0]['pcode'] ?>" maxlength="20" />
                     <span class="error"><?php echo $data[0]['pcode_error']; ?></span>
                  </div>
               </div>
               <div class="column">
                        <label class="label" for="package_type">Package Type</label>
                        <select name = "package_type" class="dropdownmenu" id="package_type"> 
                              <option value="">Select a package type</option>
                              <option value = "Birthday">Birthday Package</option>
                              <option value = "Anniversary">Anniversary Package</option>
                              <option value = "Coparate Event">Coparate Package</option>
                              <option value = "Graduation Party">Graduation Party Package</option>
                              <option value = "Get-Together">Get-Together Package</option>
                              <option value = "General Event">General Package</option>
                        </select>
                        <span class="error"><?php echo $data[0]['package_type_error']; ?></span>
                </div>
            </div>

            <div class="row">
                <div class="column">
                   <div class="text-group">
                      <label class="label" for="name">Package Name</label>
                      <input type="text" name="name" placeholder="Enter Package Name" value="<?php echo $data[0]['name'] ?>" maxlength="100">
                      <span class="error"><?php echo $data[0]['name_error']; ?></span>
                   </div>
                </div>
                <div class="column">
                   <div class="text-group">
                      <label class="label" for="price">Price</label>
                      <input type="text" name="price" placeholder="Enter Package Price" value="<?php echo $data[0]['price'] ?>" maxlength="15">
                      <span class="error"><?php echo $data[0]['price_error']; ?></span>
                   </div>
                </div>
             </div>
            
             <hr>

            Services Included:<br><br><br>
            <div class="row">
               <div class="column">
                  <div class="text-group">
                     <label class="label" for="bands">Bands:</label>
                     <input type="text" name="bands" placeholder="band option" maxlength="25">
                     <span class="error"><?php echo $data[0]['bands_error']; ?></span>
                  </div>
               </div>
               <div class="column">
                  <div class="text-group">
                     <label class="label" for="decorations">Decorations:</label>
                     <select name = "decorations" class="dropdownmenu" id="decorations"> 
                              <option value="">Select a package type</option>
                              <?php foreach ($data[1] as $decodetails) :?>

                                 <?php $spname = "";
                                       $spid = $decodetails->service_provider_id; ?>

                                 <?php foreach ($data[2] as $spdetails) :
                                    if($spdetails->service_provider_id ==$spid ){
                                       $spname = $spdetails->company_name;
                                     }?>
                                 <?php endforeach; ?>

                                 <option value = "<?php echo $spname?> - <?php echo $decodetails->service_name ?>"><?php echo $spname?> - <?php echo $decodetails->service_name ?></option>

                              <?php endforeach; ?>
                     </select>
                     <span class="error"><?php echo $data[0]['decorations_error']; ?></span>
                  </div>
               </div>
               <div class="column">
                  <div class="text-group">
                     <label class="label" for="photography">Photography:</label>
                     <input type="text" name="photography" placeholder="Photography option" >
                     <span class="error"><?php echo $data[0]['photography_error']; ?></span>
                  </div>
               </div>
            </div>
    
            <div class="footer-container">
               <button type="submit" name="action" value="addpackage" class="btn btn-filled btn-theme-purple">Add Package</button>
            </div>

         </form>
      </div>
</section>
<!-- Add package ends -->


<!-- footer start -->
<section class="footer">
    <div class="overlay"></div>
    <div class="box-container">
        <div class="box">
            <h3>Quick Access</h3>
        <a href="home"><i class="fas fa-angle-right"></i>  Home</a>
        <a href="viewpackages"><i class="fas fa-angle-right"></i> Packages</a>
        <a href="addpackages"><i class="fas fa-angle-right"></i> Add Packages</a>
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


    <!-- custom js file link -->
    <script src="<?php echo URLROOT ?>/public/js/admin/adminscript.js"></script>
    </body>
</html>