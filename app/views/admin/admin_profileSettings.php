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


    </head>
    
<body>
<?php require APPROOT . "/views/admin/header-admin.php" ?>

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
    <button id="menu-btn" class="fas fa-bars"></button>

<!-- </section> -->

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
                    <br><br>
                    <label class="label" for="fullname">Full Name</label>
                    <input class="fullname" type="text" id="fullname" name="fullname" placeholder="<?=$data->fname?> <?=$data->lname?>" disabled>
                </div>
            </div>
            <br><br>
            <label for="email">Email</label>
            <div class="row"> 
                <input class="email" type="text" id="email" name="email" placeholder="<?=$data->email?>" style="width:48%; text-transform:none" disabled>
            </div>
            <br><br>
            <div class="row"> 
                <div class="column">
                    <label for="accno">Account Number</label>
                    <input class="accno" type="text" id="accno" name="accno" placeholder="<?=$data->acc_no?>" disabled>
                </div>
                <div class="column">
                    <label class="accname" for="district">Account Name</label>
                    <input class="accname" type="text" id="accname" name="accname" placeholder="<?=$data->acc_name?>" disabled>
                </div> 
            </div>
            <br><br>
            <div class="row"> 
                <div class="column">
                    <label for="bank">Bank</label>
                    <input class="bank" type="text" id="bank" name="bank" placeholder="<?=$data->bank?>" disabled>
                </div>
                <div class="column">
                    <label class="branch" for="branch">Branch</label>
                    <input class="branch" type="text" id="branch" name="branch" placeholder="<?=$data->branch?>" disabled>
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
