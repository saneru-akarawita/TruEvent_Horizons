<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo URLROOT ?>/public/css/hotel manager/header-hotel.css">
    <link rel="stylesheet" href="<?php echo URLROOT ?>/public/css/toast.css">
    <script src="https://kit.fontawesome.com/c02eb7591c.js" crossorigin="anonymous"></script>
    <title>TruEvent Horizons - Deco Company - Header</title>

        <!-- font awesome cdn link -->
        <link rel="stylesheet" href=<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>
<body>
<!-- Code segment required for toast notifications -->
<?php require APPROOT . "/views/inc/toast.php" ?>
 <!-- -------------------------------------header for Decoration-------------------------------------------------- -->

 <div class="headerdetails">
        
        <img src="<?php echo URLROOT ?>/public/images/hotel manager/figma images/logo designs/logo2.jpg" alt="logo" class="logo">
      
                <div class="menu-bar">
                        <ul>
                        
                                <li style="margin-left:100px;"><a href="home">Home</a>
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
                                <?php if(!empty(Session::getUser('img'))){
                                                $userAvatar = Session::getUser('img');}
                                        else{
                                                $userAvatar = "profilepic.png";
                                } ?>
                                        <img src="<?php echo URLROOT ?>/public/images/uploadimages/profilepic/<?=$userAvatar?>" alt="profile_img" style="width: 50px;vertical-align: middle;margin-top:-13px ; margin-left:-90px; border-radius:50%">
                                        <div class="sub-menu1">
                                                <ul>
                                                        <li><i class="fa-solid fa-gear"></i><a href="<?php echo URLROOT ?>/DecoDashboard/profileSettings">Profile Settings</a></li>
                                                        <li><i class="fa-solid fa-right-from-bracket"></i><a href="logout">Logout</a></li>
                                                </ul>
                                        </div>                
                                </li>
                </div>        
                                <div class="company_name">
                                        <li style="margin-top:12px; margin-left:-35px;width:max-content"><?= Session::getUser('name') ?></li> 
                                </div>
                                <div class="company_type">
                                        <p style="margin-top:40px; margin-left:-184px;width:max-content"><?= Session::getUser('typeText') ?></p> 
                                </div>
                        </ul>
                
                </div>
       
        </div>  


</body>
</html>