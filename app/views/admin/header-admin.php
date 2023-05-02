<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo URLROOT ?>/public/css/hotel manager/header-hotel.css">
    <script src="https://kit.fontawesome.com/c02eb7591c.js" crossorigin="anonymous"></script>
    <title>TruEvent Horizons - Admin Header</title>

        <!-- font awesome cdn link -->
        <link rel="stylesheet" href=<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>
<body>
 <!-- -------------------------------------header for Admin-------------------------------------------------- -->

 <div class="headerdetails" style="width:101.05%">
        <img src="<?php echo URLROOT ?>/public/images/hotel manager/figma images/logo designs/logo2.jpg" alt="logo" class="logo">
       
                <div class="menu-bar">
                        <ul>
                        
                                <li style="margin-left:100px;"><a href="home">Home</a>
                                <li><a href="">Services</a>
                                        <div class="sub-menu1">
                                                <ul>
                                                        <li><a href="<?php echo URLROOT ?>/adminDashboard/viewservices">View Services</a></li>
                                                        <li><a href="<?php echo URLROOT ?>/adminDashboard/viewOffers">Offers/Promotions</a></li>
                                                        <li><a href="<?php echo URLROOT ?>/adminDashboard/reviewComplaints">Review Complaints</a></li>

                                                </ul>
                                        </div>
                                </li>
                                <li><a href="">Packages</a>
                                        <div class="sub-menu1">
                                                <ul>
                                                        <li><a href="viewpackages">View Packages</a></li>
                                                        <li><a href="addpackages">Add Packages</a></li>
                                                        <li><a href="<?php echo URLROOT ?>/adminDashboard/viewOffers">Offers/Promotions</a></li>
                                                        <li><a href="<?php echo URLROOT ?>/adminDashboard/reviewComplaints">Review Complaints</a></li>

                                                </ul>
                                        </div>
                                </li>
                                <li><a href="<?php echo URLROOT ?>/adminDashboard/payment">Payment</a></li> 

                                <li><a href="<?php echo URLROOT ?>/adminDashboard/reports">Reports</a>
                                <!-- <div class="icons"> -->
                                <li><a href="<?php echo URLROOT ?>/adminDashboard/userManagement"> <i class="fa-solid fa-users-gear fa-lg"></i></a></li>
                                <li><a href="<?php echo URLROOT ?>/adminDashboard/chat"> <i class="fa-solid fa-comment" style="margin-left:-70px;"></i></a></li>
                                <!-- </div> -->  
                                <li class="nr_li dd_main">
                                        <img src="<?php echo URLROOT ?>/public/images/profile_pic.png" alt="profile_img" style="width: 50px;vertical-align: middle;margin-top:-13px ; margin-left:-90px;">
                                        <div class="sub-menu1">
                                                <ul>
                                                        <li><i class="fa-solid fa-gear"></i><a href="<?php echo URLROOT ?>/adminDashboard/profileSettings">Profile Settings</a></li>
                                                        <li><i class="fa-solid fa-right-from-bracket"></i><a href="logout">Logout</a></li>
                                                </ul>
                                        </div>                
                                </li>
                                </div>        
                                <div class="company_name">
                                        <li style="margin-top:12px; margin-left:-35px;width:max-content"><?= Session::getUser('name') ?></li> 
                                </div>
                                <!-- <hr size="1px"> -->
                                <div class="company_type">
                                        <p style="margin-top:40px; margin-left:-184px;width:max-content"><?= Session::getUser('typeText') ?></p> 
                                </div>
                
                </div>
       
        </div>  


</body>
</html>