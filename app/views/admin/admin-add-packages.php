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
        <link rel="stylesheet" href="<?php echo URLROOT ?>/public/css/admin/admin-add-reservation-style.css">


    </head>
    <body>

<!-- header section starts -->
<section class="header">
<img src="<?php echo URLROOT ?>/public/images/admin/logo/logo.jpg" alt="logo" class="logo">
<a href="home" class="dashboard">Dashboard</a>

<nav class="navbar">
    <a href="home">Home</a>
    <a href="viewpackages">Packages</a>
    <a href="addpackages">Add Packages</a>
    <a href="logout">Logout</a>
</nav>

<!-- Gives a Menu Button -->
<button id="menu-btn" class="fas fa-bars"></button>


</section>

<!-- header section ends -->

<div class="heading" style="background:url() no-repeat">
<!-- <h1>Add Packages</h1> -->
</div>

<!-- Add package starts -->
<section class="add-packages">
    <h1 class="heading-title">
        Add Packages
    </h1>
    <form action="<?php echo URLROOT; ?>/packages/addNewPackage" method="POST" class="add-package-form">

        <div class="flex">
            <div class = "form-section">
                <div class="inputBox">
                    <span>Package Code:</span>
                    <input type="int" placeholder="Enter Package Code" name="pcode" value="<?php echo $data['pcode']; ?>">
                    <span class="error" style="display: block; font-size: 13px; color: red;"><?php echo $data['pcode_error']; ?></span>
                </div>

                <div class="inputBox">
                    <span>Package Name:</span>
                    <input type="text" placeholder="Enter Package Name" name="name" value="<?php echo $data['name']; ?>">
                    <span class="error" style="display: block; font-size: 13px; color: red;"><?php echo $data['name_error']; ?></span>
                </div>


                <div class="inputBox">
                    <span>Price:</span>
                    <input type="int" placeholder="Enter Package Price" name="price" value="<?php echo $data['price']; ?>">
                    <span class="error" style="display: block; font-size: 13px; color: red;"><?php echo $data['price_error']; ?></span>
                </div>
            </div>
       
            <div class="form-section">

                <div class="title">
                        <span>Services Included</span>
                </div>   
                
                <div class="inputBox">
                    <span>Bands:</span>
                <input type="Text" placeholder="Bands" name="bands" value="<?php echo $data['bands']; ?>">
                <span class="error" style="display: block; font-size: 13px; color: red;"><?php echo $data['bands_error']; ?></span>
                </div>

                <div class="inputBox">
                    <span>Decorations:</span>
                    <input type="Text" placeholder="Decorations" name="decorations" value="<?php echo $data['decorations']; ?>">
                    <span class="error" style="display: block; font-size: 13px; color: red;"><?php echo $data['decorations_error']; ?></span>
                </div>

                <div class="inputBox">
                    <span>Photography:</span>
                    <input type="Text" placeholder="Photography" name="photography" value="<?php echo $data['photography']; ?>">
                    <span class="error" style="display: block; font-size: 13px; color: red;"><?php echo $data['photography_error']; ?></span>
                </div>

            </div>

        </div>

        </div>
        <button type="submit" name="action" value="addpackage" class="btn" style="margin-left:45%">Add Package</button>

    </form>
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


    <!-- custom js file link -->
    <script src="<?php echo URLROOT ?>/public/js/admin/adminscript.js"></script>
    </body>
</html>