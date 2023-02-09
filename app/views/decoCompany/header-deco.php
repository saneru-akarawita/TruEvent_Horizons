<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo URLROOT ?>/public/css/hotel manager/header-hotel.css">
    <script src="https://kit.fontawesome.com/c02eb7591c.js" crossorigin="anonymous"></script>
    <title>TruEvent Horizons - Decoration Company Header</title>

        <!-- font awesome cdn link -->
        <link rel="stylesheet" href=<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>
<body>
 <!-- -------------------------------------header for Decoration-------------------------------------------------- -->

 <div class="headerdetails">
        <img src="<?php echo URLROOT ?>/public/images/hotel manager/figma images/logo designs/logo2.jpg" alt="logo" class="logo">
        <div class="searchbar">
                <input type="text">
                <i class="fa-solid fa-magnifying-glass" style="margin-left: 10px;"></i>
        </div>
                <div class="menu-bar">
                        <ul>
                        
                                <li style="margin-left:-30px;"><a href="home">Home</a>
                                <li><a href="">Services</a>
                                        <div class="sub-menu1">
                                                <ul>
                                                        <li><a href="viewservices">View Decorations</a></li>
                                                        <li><a href="addservices">Add Decorations</a></li>
                                                        <li><a href="<?php echo URLROOT ?>/DecoDashboard/viewOffers">Offers/Promotions</a></li>
                                                        <li><a href="<?php echo URLROOT ?>/DecoDashboard/reservationLog">Reservation Log</a></li>
                                                </ul>
                                        </div>
                                </li>
                                <li><a href="<?php echo URLROOT ?>/DecoDashboard/calendar">Calendar</a></li>
                                <li><a href="<?php echo URLROOT ?>/DecoDashboard/payment">Payment</a></li>
                                <li><a href="<?php echo URLROOT ?>/DecoDashboard/reports">Reports</a></li> 

                                <!-- <div class="icons"> -->
                                <li><a href=""> <i class="fa-sharp fa-solid fa-bell"></i></a></li>
                                <li><a href="<?php echo URLROOT ?>/DecoDashboard/chat"> <i class="fa-solid fa-comment" style="margin-left:-70px;"></i></a></li>
                                <!-- </div> -->  
                                <li class="nr_li dd_main">
                                        <img src="<?php echo URLROOT ?>/public/images/profile_pic.png" alt="profile_img" style="width: 50px;vertical-align: middle;margin-top:-13px ; margin-left:-90px;">
                                        <div class="sub-menu1">
                                                <ul>
                                                        <li><i class="fa-solid fa-gear"></i><a href="<?php echo URLROOT ?>/DecoDashboard/profileSettings">Profile Settings</a></li>
                                                        <li><i class="fa-solid fa-right-from-bracket"></i><a href="logout">Logout</a></li>
                                                </ul>
                                        </div>                
                                </li>
                                <li style="margin-top:12px; margin-left:-35px;width:max-content"><?= Session::getUser('name') ?></li> 
                                <hr size="1px">
                                <p style="margin-top:40px; margin-left:-140px;width:max-content"><?= Session::getUser('typeText') ?></p> 
                        </ul>
                
                </div>
       
        </div>  


</body>
</html>