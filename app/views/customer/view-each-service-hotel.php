<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>TruEvent Horizons - Hotel Manager View Each Service</title>
        <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" />
        <link rel="stylesheet" href="<?php echo URLROOT ?>/public/css/hotel manager/styles-hotel.css">
        <link rel="stylesheet" href="<?php echo URLROOT ?>/public/css/hotel manager/style.css">
        <link rel="stylesheet" href="<?php echo URLROOT ?>/public/css/hotel manager/hotel.css">
        <link href="https://fonts.googleapis.com/css?family=Bentham|Playfair+Display|Raleway:400,500|Suranna|Trocchi" rel="stylesheet">
</head>
<body>
<body>
<?php require APPROOT . "/views/customer/header-customer.php" ?>
<!-- header section starts -->
<!-- <section class="header">
<img src="<?php echo URLROOT ?>/public/images/hotel manager/logo/logo.jpg" alt="logo" class="logo">
<a href="home" class="dashboard">Hotel</a>

<nav class="navbar">
<a href="home">Home</a>
<a href="viewservices">Services</a>
<a href="addservices">Add Services</a>
<a href="logout">Logout</a>
</nav> -->

<!-- Gives a Menu Button -->
<!-- <button id="menu-btn" class="fas fa-bars"></button>


</section>
 -->

 <?php $serviceID = $data[0]; ?>
 <?php $data1 = $data[1]; ?>
 <?php $data2 = $data[2]; ?>

<div class="wrapper">
        <div class="product-img">
                <img src="<?php echo URLROOT ?>/public/images/hotel manager/images/image.jpg" height="100%" max-width="100%">
        </div>

        <div class="product-info">
                <div class="product-text">
                <?php foreach ($data2 as $hsDetails) : ?>
                <?php $serviceProviderID = $hsDetails->service_provider_id; ?>

                <?php foreach ($data1 as $spdetails) : ?>
                    <?php if ($spdetails->service_provider_id == $serviceProviderID) { ?>
                    <?php $spName = $spdetails->company_name;
                    } ?>
                    <?php endforeach; ?>
                    <?php if($hsDetails->service_id == $serviceID) {?> 
                        <h1><?= $hsDetails->service_type;?></h1>
                        <h2><?php echo $spName ?></h2>
                        <div class="description">
                                <table id="details12">
                                <tr>
                                        <td>Hall Name </td>
                                        <td>: <?= $hsDetails->hall_name;?></td>
                                </tr>
                                <tr>
                                        <td>Location </td>
                                        <td>: <?= $hsDetails->location;?></td>
                                </tr>
                                <tr>
                                        <td>Hall Type </td>
                                        <td>: <?= $hsDetails->hall_type;?></td>
                                </tr>
                                <tr>
                                        <td>Air Condition Status </td>
                                        <td>: <?php if($hsDetails->ac_status) echo "Available"; else echo "Non-Available";?></td>
                                </tr>
                                <tr>
                                        <td>Max Crowd </td>
                                        <td>: <?= $hsDetails->max_crowd;?></td>
                                </tr>
                                <tr>
                                        <td>Other Facilities </td>
                                        <td>:<?php if(empty($hsDetails->other_facilities)) echo " None"; else  echo $hsDetails->other_facilities; ?> </td>
                                         
                                        
                                </tr>
                                </table>
                                <span style="margin-left:45px">LKR <?= $hsDetails->price;?> per head</span>
                                <p style="margin-top:15px; margin-left:-0.5px">**Food Menu will be discussed and decided manually</p>
                        </div>

                        <br>

                        <div class="product-price-btn">
        
                                <a href="<?php echo URLROOT; ?>/customerReservation/addReservationByServices?service_name=<?=$spName;?> - <?=$hsDetails->hall_name?>&service_type=<?php echo 'Hotel'?>&sp_id=<?=$serviceProviderID;?>" class="btn" style="width:250px; margin-top:-20px; margin-left:-50px;">Make Reservation</a>

                        </div>

                        <?php } ?>
            <?php endforeach; ?>
                        
                </div>
        </div>
</div>




<!-- footer start -->
<section class="footer" style="margin-top:150px">
<div class="overlay"></div>
<div class="box-container">
<div class="box">
<h3>Quick Access</h3>
<a href="home"><i class="fas fa-angle-right"></i>  Home</a>
<a href="viewservice"><i class="fas fa-angle-right"></i> Services</a>
<a href="addservice"><i class="fas fa-angle-right"></i> Add Services</a>
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

</body>
</html>