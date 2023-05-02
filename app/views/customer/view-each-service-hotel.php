<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>TruEvent Horizons - View Each Service - Hotel</title>
        <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" />
        <link rel="stylesheet" href="<?php echo URLROOT ?>/public/css/hotel manager/styles-hotel.css">
        <link rel="stylesheet" href="<?php echo URLROOT ?>/public/css/hotel manager/style.css">
        <link rel="stylesheet" href="<?php echo URLROOT ?>/public/css/hotel manager/hotel.css">
        <link rel="stylesheet" href="<?php echo URLROOT ?>/public/css/footer-sp.css">
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

<div class="wrapper" style="margin-bottom:200px;">
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
        
                                <a href="<?php echo URLROOT; ?>/customerReservation/addReservationByServices?service_name=<?=$spName;?> - <?=$hsDetails->hall_name?>&service_type=<?php echo 'Hotel'?>&sp_id=<?=$serviceProviderID;?>&service_id=<?=$hsDetails->service_id;?>&maxcrowd=<?= $hsDetails->max_crowd;?>" class="btn" style="width:250px; margin-top:-20px; margin-left:-50px;">Make Reservation</a>

                        </div>

                        <?php } ?>
            <?php endforeach; ?>
                        
                </div>
        </div>
</div>

<!-- Photo Gallary Start-->
<div class="image-tab" style="width:100%;">
<?php require APPROOT . "/views/customer/photoGalleryHotel.php" ?>
<!-- Photo Gallary End-->
</div>

<?php foreach ($data1 as $spdetails) : ?>
        <?php if ($spdetails->service_provider_id == $serviceProviderID) { ?>
                <?php require APPROOT . "/views/customer/hotelServiceFooter.php" ?>
                <?php } ?>
 <?php endforeach; ?>
<!-- footer ends -->

</body>
</html>