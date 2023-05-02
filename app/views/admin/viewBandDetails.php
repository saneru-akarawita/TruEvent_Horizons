<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>TruEvent Horizons - View Band Details - Admin</title>
        <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" />
        <link rel="stylesheet" href="<?php echo URLROOT ?>/public/css/hotel manager/styles-hotel.css">
        <link rel="stylesheet" href="<?php echo URLROOT ?>/public/css/hotel manager/style.css">
        <link rel="stylesheet" href="<?php echo URLROOT ?>/public/css/hotel manager/hotel.css">
        <link href="https://fonts.googleapis.com/css?family=Bentham|Playfair+Display|Raleway:400,500|Suranna|Trocchi" rel="stylesheet">
</head>
<body>
<?php require APPROOT . "/views/admin/header-admin.php" ?>
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
<!-- header section ends -->

<?php $serviceID = $data[0]; ?>
<?php $data1 = $data[1]; ?>
<?php $data2 = $data[2]; ?>

        <div class="wrapper" style="margin-bottom: 150px;">
            <div class="product-img">
              <img src="<?php echo URLROOT ?>/public/images/band.jpg" height="100%" max-width="100%">
            </div>
            <div class="product-info">
              <div class="product-text">
              <?php foreach ($data2 as $bsDetails) : ?>
                <?php $serviceProviderID = $bsDetails->service_provider_id; ?>

                <?php foreach ($data1 as $spdetails) : ?>
                    <?php if ($spdetails->service_provider_id == $serviceProviderID) { ?>
                    <?php $spName = $spdetails->company_name;
                    } ?>
                    <?php endforeach; ?>
                    <?php if($bsDetails->service_id == $serviceID) { ?> 
                <h1><?= $bsDetails->service_name;?></h1><br>
                <h2><?php echo $spName ?></h2>
                <p>No of players : <?= $bsDetails->no_of_players;?></p>
                <p>Music Types:<br><?= $bsDetails->band_type;?></p>
                <p>other types of band : <?= $bsDetails->other_band_type;?></p><br>
                <span style="margin-left:45px"><?= $bsDetails->price;?> LKR</span>
              
            <?php } ?>
            <?php endforeach; ?>
              </div>
            </div>
        </div>



 <!-- footer start -->
<?php foreach ($data1 as $spdetails) : ?>
        <?php if ($spdetails->service_provider_id == $serviceProviderID) { ?>
                <?php require APPROOT . "/views/customer/bandServiceFooter.php" ?>
                <?php } ?>
 <?php endforeach; ?>

<!-- footer ends -->
    

<script src="<?php echo URLROOT ?>/public/js/band/bandscript.js"></script> 

</body>

</html>