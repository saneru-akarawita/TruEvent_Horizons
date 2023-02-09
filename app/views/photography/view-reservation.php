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
<?php $serviceID = $data[1]; ?>
<?php $rvID = $data[2]; ?>
<?php $rvdata = $data[3]; ?>
<?php $cusdata = $data[4]; ?>
<?php $photoservicedata = $data[5]; ?>

<div class="wrapper">

        <div class="product-img" style="height:500px;">
                <img src="<?php echo URLROOT ?>/public/images/hotel manager/figma images/bdy - photo.jpg" height="100%" max-width="100%">
        </div>

        <div class="product-info">
                <div class="product-text" style="height:1000px; width:500px;">
                        <?php foreach ($rvdata as $rvDetails) : ?>
                                <?php $sp_id_arr = explode (",", $rvDetails->sp_id);?>
                                <?php foreach ($sp_id_arr as $new_sp_id) : ?>
                                        <?php if ($new_sp_id == $spID) { ?>
                                                <?php foreach ($photoservicedata as $photodata) : ?>
                                                <?php if ($photodata->service_id == $serviceID && $rvID == $rvDetails->rv_id) { ?>
                                                <h1 style="margin-top:-46px; font-size:2.5rem;"><?= $photodata->service_name;?></h1>
                                                <h2>Reservation ID - <?= $rvDetails->rv_id;?></h2>
                                        
                                                <div class="description">
                                                        <table id="details12">
                                                                        <tr>
                                                                                <td>Reservation Date</td>
                                                                                <td>: <?= $rvDetails->rvDate;?></td>
                                                                        </tr>
                                                                        <tr>
                                                                                <td>Reservation Time</td>
                                                                                <td>: <?= $rvDetails->rvTime;?></td>
                                                                        </tr>
                                                                        <tr>
                                                                                <td>Features</td>
                                                                                <td>: <?= $photodata->photo_features;?></td>
                                                                        </tr>
        
                                                                        <tr>
                                                                                <td>Other Features</td>
                                                                                <td>:<?php if(empty($photodata->other_features)) echo " None"; else  echo $photodata->other_features; ?> </td>
                                                                                
                                                                        </tr>
                                                                        <tr>
                                                                                <td>Price </td>
                                                                                <td>: <?= $photodata->price;?></td>
                                                                        </tr>
                                                                        <tr>
                                                                                <td>Payments </td>
                                                                                <td>: <?= $rvDetails->payment;?></td>
                                                                        </tr>
                                                                
                                                                        <?php foreach ($cusdata as $cus) : ?>
                                                                                <?php if ($cus->customer_id == $rvDetails->customer_id) { ?>  
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
                                                                                        <td style="text-transform:none">: <?= $cus->email;?></td>
                                                                                </tr>
                                                                        
                
                                                                                <?php } ?>
                                                                        <?php endforeach; ?>                                
                                                        </table>
                
                                                </div>
                                                <?php } ?>
                                                <?php endforeach; ?>
                                                <?php } ?>
                <?php endforeach; ?>
                <?php endforeach; ?>
                
                <div class="product-price-btn">
                        <button type="button" style="margin-top:40px;" onclick="history.back()">Back</button>
                </div>
                </div>
        </div>  
</div>


<!-- footer start -->
<section class="footer" style="margin-top:200px">
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