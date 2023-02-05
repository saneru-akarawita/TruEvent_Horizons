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
<?php require APPROOT . "/views/hotelManager/header-hotel.php" ?>
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
<?php $spID = $data[0]; ?>
<?php $rvID = $data[1]; ?>
<?php $rvdata = $data[2]; ?>
<?php $cusdata = $data[3]; ?>
<?php $hotelservicedata = $data[4]; ?>


<div class="wrapper">
        <div class="product-img">
                <img src="<?php echo URLROOT ?>/public/images/hotel manager/images/image.jpg" height="100%" max-width="100%">
        </div>
        <div class="product-info">
                <div class="product-text">
                <?php foreach ($rvdata as $rvDetails) : ?>
                                                    <?php 
                                                        $sp_id_arr = explode (",", $rvDetails->sp_id);
                                                    ?>
                                                <?php foreach ($sp_id_arr as $new_sp_id) : ?>
                                                    <?php if ($new_sp_id == $spID) { ?>
                <h1>Service Details</h1>    
                <?php foreach ($hotelservicedata as $hoteldata) : ?>
                        <?php if ($hoteldata->service_provider_id == $rvDetails->sp_id) { ?>
                        <h1><?= $hoteldata->service_type;?></h1>
                        <h2>Reservation ID<?= $rvDetails->rv_id;?></h2>
                        <div class="description">
                                <table id="details12">
                                <tr>
                                        <td>Hall Name </td>
                                        <td>: <?= $hoteldata->hall_name;?></td>
                                </tr>
                                <tr>
                                        <td>Location </td>
                                        <td>: <?= $hoteldata->location;?></td>
                                </tr>
                                <tr>
                                        <td>Hall Type </td>
                                        <td>: <?= $hoteldata->hall_type;?></td>
                                </tr>
                                <tr>
                                        <td>Air Condition Status </td>
                                        <td>: <?php if($hoteldata->ac_status) echo "Available"; else echo "Non-Available";?></td>
                                </tr>
                                <tr>
                                        <td>Max Crowd </td>
                                        <td>: <?= $hoteldata->max_crowd;?></td>
                                </tr>
                                <tr>
                                        <td>Other Facilities </td>
                                        <td>:<?php if(empty($hoteldata->other_facilities)) echo " None"; else  echo $hoteldata->other_facilities; ?> </td>
                                         
                                </tr>
                                <tr>
                                        <td>Reservation Date</td>
                                        <td>: <?= $rvDetails->rvDate;?></td>
                                </tr>
                                <tr>
                                        <td>Reservation Time</td>
                                        <td>: <?= $rvDetails->rvTime;?></td>
                                </tr>
                                </table>

                                <span style="margin-left:45px">LKR <?= $hoteldata->price;?> per head</span>
                                <p style="margin-top:15px; margin-left:-0.5px">**Food Menu will be discussed and decided manually</p>
                                
                                <h1>Customer Details</h1>
                                <?php foreach ($cusdata as $cus) : ?>
                                        <?php if ($cus->customer_id == $rvDetails->customer_id) { ?>
                                              
                                <div class="description">
                                        <table id="details12">
                                        <tr>
                                                <td>Customer Name </td>
                                                <td>: <?= $cus->fname; ?> <?= $cus->lname; ?></td>
                                        </tr>
                                        <tr>
                                                <td>Address </td>
                                                <td>: <?= $cus->district;?></td>
                                        </tr>
                                        <tr>
                                                <td>Contact No </td>
                                                <td>: <?= $cus->contact_no;?></td>
                                        </tr>
                                        <tr>
                                                <td>E-mail </td>
                                                <td>: <?= $cus->email;?></td>
                                        </tr>
                                
                                        </table>
                                        <?php } ?>
                                        <?php endforeach; ?>
                                        <?php } ?>
                                        <?php endforeach; ?>
                                </div>
                                <br>
                                <div class="product-price-btn">
                                        <button type="button" style="margin-top:-25px;" onclick="history.back()">Back</button>
                                </div>

                        </div>
                        <?php } ?>
                        <?php endforeach; ?>
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

</body>

</html>