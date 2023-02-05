<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TruEvent Horizons - Service Details - Band</title>

    <link rel="stylesheet" href="<?php echo URLROOT ?>/public/css/deco company/viewoneservice.css">
    <link href="https://fonts.googleapis.com/css?family=Bentham|Playfair+Display|Raleway:400,500|Suranna|Trocchi" rel="stylesheet">

    <!-- font awesome cdn link -->
    <link rel="stylesheet" href=<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
<?php require APPROOT . "/views/customer/header-customer.php" ?>
            <!-- header section starts -->
    <!-- <section class="header">
        <img src="<?php echo URLROOT ?>/public/images/deco company/logo/logo.jpg" alt="logo" class="logo">
        <a href="home" class="dashboard">Decoration</a>
    
        <nav class="navbar">
            <a href="home">Home</a>
            <a href="viewservices">Services</a>
            <a href="addservices">Add Services</a>
            <a href="logout">Logout</a>
        </nav> -->
    
        <!-- Gives a Menu Button -->
        <!-- <button id="menu-btn" class="fas fa-bars"></button>
    
    
        </section> -->
<?php $serviceID = $data[0]; ?>
<?php $data1 = $data[1]; ?>
<?php $data2 = $data[2]; ?>

        <div class="wrapper">
            <div class="product-img">
              <img src="<?php echo URLROOT ?>/public/images/deco company/deco-add-services/deco1.jpg" height="100%" max-width="100%">
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
              <div class="product-price-btn">
              <a href="<?php echo URLROOT; ?>/customerReservation/addReservationByServices?service_name=<?= $spName; ?> - <?= $bsDetails->service_name?>&service_type=<?php echo 'Band'?>&sp_id=<?=$serviceProviderID;?>&service_id=<?=$bsDetails->service_id; ?>" class="btn" style="width:250px; margin-left:-50px; padding-left:55px; margin-top:30px;">Make Reservation</a> 
              </div>
            <?php } ?>
            <?php endforeach; ?>
              </div>
            </div>
        </div>


        <!-- footer start -->
<section class="footer">
    <div class="overlay"></div>
    <div class="box-container">
        <div class="box">
            <h3>Quick Access</h3>
        <a href="home"><i class="fas fa-angle-right"></i>  Home</a>
        <a href="viewservices"><i class="fas fa-angle-right"></i> Services</a>
        <a href="#"><i class="fas fa-angle-right"></i> Packages</a>
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
    

<script src="<?php echo URLROOT ?>/public/js/band/bandscript.js"></script> 
</body>
</html>