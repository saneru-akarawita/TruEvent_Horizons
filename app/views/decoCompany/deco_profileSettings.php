<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8" />
   <meta http-equiv="X-UA-Compatible" content="IE=edge" />
   <meta name="viewport" content="width=device-width, initial-scale=1.0" />
   <link rel="stylesheet" href="<?php echo URLROOT ?>/public/css/admin/admin-add-reservation-style.css">
   <link rel="stylesheet" href="<?php echo URLROOT ?>/public/css/hotel manager/styles-hotel.css" />
   <link rel="stylesheet" href="<?php echo URLROOT ?>/public/css/hotel manager/style.css" />
   <link rel="stylesheet" href="<?php echo URLROOT ?>/public/css/admin/add-package-service-style.css">
   <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" />
   <link rel="shortcut icon" type="image/x-icon" href="<?php echo URLROOT ?>/public/images/hotel manager/logo/logo.png">
   <title>my profile</title>
</head>

<body>
<?php require APPROOT . "/views/decoCompany/header-deco.php" ?>

<!-- header section starts -->
<!-- <section class="header">
    <img src="<?php echo URLROOT ?>/public/images/customer/logo/logo.jpg" alt="logo" class="logo">
    <a href="home" class="dashboard">Dashboard</a>

    <nav class="navbar">
        <a href="home">Home</a>
        <a href="#">Services</a>
        <a href="#">Packages</a>
        <a href="viewreservationlog">Reservation Log</a>
        <a href="logout">Logout</a>
    </nav> -->

    <!-- Gives a Menu Button -->
    <!-- <button id="menu-btn" class="fas fa-bars"></button>

</section> -->

<div class="main-container">

    <a href="home" class="top-right-closeBtn white-red-hover"><i class="fal fa-times fa-2x "></i></a>

    <div class="ser-container form-container contentBox" style="width: 60%;">
        <form action="<?php echo URLROOT; ?>/customerReservation/addReservation" method="post" class="form">
            <h1 class="title">Profile Settings</h1>
            <br><br>

            <div class="row">
                <div class="column">
                    <img src="<?php echo URLROOT?>/public/images/profilepic.png" class="avatar" style="margin-left:10%;">
                </div>
                <div class="column">
                    <br>
                    <label class="label" for="companyname">Company Name</label>
                    <input class="companyname" type="text" id="companyname" name="companyname" placeholder="" disabled>

                    <br>
                    <label class="label" for="businessid">Business ID</label>
                    <input class="businessid" type="text" id="businessid" name="businessid" placeholder="" disabled>
                </div>
            </div>
            <br><br>
            <label for="email">Email</label>
            <div class="row"> 
                <input class="email" type="text" id="email" name="email" placeholder="" style="width:48%" disabled>
            </div>
            <br>
            <div class="row"> 
                    <div class="column">
                        <label for="contactno">Contact Number</label>
                        <input class="contactno" type="text" id="contactno" name="contactno" placeholder="" disabled>
                    </div>
                    <div class="column">
                        <label class="district" for="district">District</label>
                        <input class="district" type="text" id="contactno" name="contactno" placeholder="" disabled>
                    </div> 
            </div>

            <br><br><hr style="height:2px;border-width:0;color:silver;background-color:silver"><br><br>

            <h1 class="title">Bank Details</h1>
            <br><br>
            <div class="row"> 
                <div class="column">
                    <label for="accno">Account Number</label>
                    <input class="accno" type="text" id="accno" name="accno" placeholder="" disabled>
                </div>
                <div class="column">
                    <label class="accname" for="district">Account Name</label>
                    <input class="accname" type="text" id="accname" name="accname" placeholder="" disabled>
                </div> 
            </div>
            <br><br>
            <div class="row"> 
                <div class="column">
                    <label for="bank">Bank</label>
                    <input class="bank" type="text" id="bank" name="bank" placeholder="" disabled>
                </div>
                <div class="column">
                    <label class="branch" for="branch">Branch</label>
                    <input class="branch" type="text" id="branch" name="branch" placeholder="" disabled>
                </div> 
            </div>

            <br><br><hr style="height:2px;border-width:0;color:silver;background-color:silver"><br><br>

            <h1 class="title">Change Password</h1>

            <br>

            <label for="currentpw">Current Password</label>
            <div class="row"> 
                <input class="currentpw" type="password" id="currentpw" name="currentpw" placeholder="enter current password" style="width:48%" required>
            </div>
            <br><br>
            <div class="row"> 
                <div class="column">
                    <label for="newpw">New Password</label>
                    <input class="newpw" type="password" id="newpw" name="newpw" placeholder="enter new password" required>
                </div>
                <div class="column">
                    <label for="confirmnewpw">Confirm New Password</label>
                    <input class="confirmnewpw" type="password" id="confirmnewpw" name="confirmnewpw" placeholder="re-enter new password" required>
                </div> 
            </div>
            <br>
            <div class="footer-container">
                <button type="submit" name="action" value = "changepw" class="btn btn-filled btn-theme-purple" style="width:max-content;">Change Password</button>
            </div>

        </form>
    </div>
</div>


<!-- footer start -->
<section class="footer">
    <div class="overlay"></div>
    <div class="box-container">
        <div class="box">
            <h3>Quick Access</h3>
            <a href="home"><i class="fas fa-angle-right"></i> Home</a>
            <a href="#"><i class="fas fa-angle-right"></i> Packages</a>
            <a href="#"><i class="fas fa-angle-right"></i> Add Packages</a>
        </div>

        <div class="box">
            <h3>Extra</h3>
            <a href="#"><i class="fas fa-angle-right"></i> About US</a>
            <a href="#"><i class="fas fa-angle-right"></i> Privacy Policy</a>
            <a href="#"><i class="fas fa-angle-right"></i> Ask Questions</a>
        </div>

        <div class="box">
            <h3>Contact Us</h3>
            <a href="#"><i class="fas fa-phone"></i> +94 123-456-789</a>
            <a href="#"><i class="fas fa-envelop"></i> TruEvent@gmail.com</a>
            <a href="#"><i class="fas fa-map"></i> Colombo</a>

        </div>

        <div class="box">
            <h3>Follow US</h3>
            <a href="#"><i class="fab fa-facebook"></i> facebook</a>
            <a href="#"><i class="fab fa-instagram"></i> instagram</a>
            <a href="#"><i class="fab fa-linkedin"></i> linkedin</a>

        </div>
    </div>


    <div class="credit">
        Created By <span>TruEvent</span> | All Rights Reserved
    </div>

</section>

<!-- footer ends -->

<!-- custom js file link -->
<script src="<?php echo URLROOT ?>/public/js/customer/customerscript.js"></script>
</body>