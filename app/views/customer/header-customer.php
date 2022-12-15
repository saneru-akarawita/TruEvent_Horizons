<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo URLROOT ?>/public/css/hotel manager/header-hotel.css">
    <script src="https://kit.fontawesome.com/c02eb7591c.js" crossorigin="anonymous"></script>
    <title>TruEvent Horizons - Customer Header</title>

        <!-- font awesome cdn link -->
        <link rel="stylesheet" href=<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>
<body>
 <!-- -------------------------------------header for Customer-------------------------------------------------- -->

 <div class="headerdetails">
        <img src="<?php echo URLROOT ?>/public/images/hotel manager/figma images/logo designs/logo2.jpg" alt="logo" class="logo">
        <div class="searchbar">
                <input type="text">
                <i class="fa-solid fa-magnifying-glass" style="margin-left: 10px;"></i>
        </div>
                <div class="menu-bar">
                        <ul>
                        
                                <li><a href="home">Home</a>
                                <li><a href="">Services</a>
                                        <div class="sub-menu1">
                                                <ul>
                                                        <li><a href="viewservices">View Services</a></li>
                                                        <li><a href="addReservation">Add Reservation</a></li>
                                                        <li><a href="">Offers/Promotions</a></li>
                                                        <li><a href="viewReservationLog">Reservation Log</a></li>
                                                        <li><a href="viewReservationLog">Provide Feedbacks</a></li>

                                                </ul>
                                        </div>
                                </li>
                                <li><a href="">Packages</a>
                                        <div class="sub-menu1">
                                                <ul>
                                                        <li><a href="">View Packages</a></li>
                                                        <li><a href="addReservation">Add Reservation</a></li>
                                                        <li><a href="">Offers/Promotions</a></li>
                                                        <li><a href="viewReservationLog">Reservation Log</a></li>
                                                        <li><a href="viewReservationLog">Provide Feedbacks</a></li>

                                                </ul>
                                        </div>
                                </li>
                                <li><a href="">Payment</a>
                                <div class="sub-menu1">
                                                <ul>
                                                        <li><a href="">Advance Payment</a></li>
                                                        <li><a href="">Total Payment</a></li>
                                                        <li><a href="">Payment Log</a></li>
                                                </ul>
                                        </div></li> 
                                <li><a href="logout">Logout</a></li>
                                <!-- <div class="icons"> -->
                                <li><a href=""> <i class="fa-sharp fa-solid fa-bell"></i></a></li>
                                <li><a href=""> <i class="fa-solid fa-comment"></i></a></li>
                                <!-- </div> -->    
                        </ul>
                
                </div>
       
        </div>  


</body>
</html>