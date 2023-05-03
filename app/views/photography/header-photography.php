<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo URLROOT ?>/public/css/hotel manager/header-hotel.css">
    <script src="https://kit.fontawesome.com/c02eb7591c.js" crossorigin="anonymous"></script>
    <title>TruEvent Horizons - Photography Header</title>

        <!-- font awesome cdn link -->
        <link rel="stylesheet" href=<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>
<body>
 <!-- -------------------------------------header for Photography-------------------------------------------------- -->

 <div class="headerdetails">
        <img src="<?php echo URLROOT ?>/public/images/hotel manager/figma images/logo designs/logo2.jpg" alt="logo" class="logo">
     
                <div class="menu-bar">
                        <ul>
                        
                                <li style="margin-left:300px;"><a href="home">Home</a>
                                <li><a href="">Services</a>
                                        <div class="sub-menu1">
                                                <ul>
                                                        <li><a href="viewservices">View Photographies</a></li>
                                                        <li><a href="addservices">Add Photographies</a></li>
                                                        <li><a href="<?php echo URLROOT ?>/PhotographyDashboard/viewOffers">Offers/Promotions</a></li>
                                                        <li><a href="<?php echo URLROOT ?>/PhotographyDashboard/reservationLog">Reservation Log</a></li>
                                                </ul>
                                        </div>
                                </li>
                                <li><a href="<?php echo URLROOT ?>/PhotographyDashboard/calendar">Calendar</a></li>
                                <li><a href="<?php echo URLROOT ?>/PhotographyDashboard/payment">Payment</a></li>
                                <li><a href="<?php echo URLROOT ?>/PhotographyDashboard/reports">Reports</a></li> 

                                <!-- <div class="icons"> -->
                                <li><a href=""> <i class="fa-sharp fa-solid fa-bell"></i></a></li>
                                <li><a href="<?php echo URLROOT ?>/PhotographyDashboard/chat"> <i class="fa-solid fa-comment" style="margin-left:-70px;"></i></a></li>
                                <!-- </div> -->  
                                <li class="nr_li dd_main" style="width:50px;">
                                        <img src="<?php echo URLROOT ?>/public/images/profile_pic.png" alt="profile_img" style="width: 50px;vertical-align: middle;margin-top:-13px ; margin-left:-90px;">
                                        <div class="sub-menu1">
                                                <ul>
                                                        <li><i class="fa-solid fa-gear"></i><a href="<?php echo URLROOT ?>/PhotographyDashboard/profileSettings">Profile Settings</a></li>
                                                        <li><i class="fa-solid fa-right-from-bracket"></i><a href="logout">Logout</a></li>
                                                </ul>
                                        </div>                
                                </li>
                                <div style="display: flex;align-items: center;justify-content: center;text-align: center; flex-direction: column;">
                                        <li style="margin-top:12px;width:max-content"><?= Session::getUser('name') ?></li> 
                                        <hr size="1px">
                                        <p style="margin-top:0px"><?= Session::getUser('typeText') ?></p>
                                </div> 
                        </ul>
                
                </div>
       
        </div>  


</body>
</html>