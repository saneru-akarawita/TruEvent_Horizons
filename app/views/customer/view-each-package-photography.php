<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TruEvent Horizons - View Each Package - Photography</title>

    <link rel="stylesheet" href="<?php echo URLROOT ?>/public/css/hotel manager/styles-hotel.css">
    <link rel="stylesheet" href="<?php echo URLROOT ?>/public/css/hotel manager/style.css">
    <link rel="stylesheet" href="<?php echo URLROOT ?>/public/css/hotel manager/hotel.css">
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
              <img src="<?php echo URLROOT ?>/public/images/pimg1.jpg" height="100%" max-width="100%">
            </div>
            <div class="product-info">
              <div class="product-text">
              <?php foreach ($data2 as $psDetails) : ?>
                <?php $serviceProviderID = $psDetails->service_provider_id; ?>

                <?php foreach ($data1 as $spdetails) : ?>
                    <?php if ($spdetails->service_provider_id == $serviceProviderID) { ?>
                    <?php $spName = $spdetails->company_name;
                    } ?>
                    <?php endforeach; ?>
                    <?php if($psDetails->service_id == $serviceID) {?> 
                <h1><?= $psDetails->service_name;?></h1><br>
                <h2><?php echo $spName ?></h2>
                <div class="description">
                    <table id="details12">
                    <tr>
                        <td>Feautures</td>
                        <td>: <?= $psDetails->photo_features;?></td>
                    </tr><br>
                    <tr>
                        <td>Other Features</td>
                        <td>: <?php if(empty($psDetails->other_features)) echo " None"; else  echo $psDetails->other_features; ?> </td>
                    </tr>
                    </table>
                    <br>
                
                <!-- <span style="margin-left:45px"><?= $psDetails->price;?> LKR</span> -->
              
              <?php } ?>
            <?php endforeach; ?>
              </div>
            </div>
        </div>

<!-- Photo Gallary Start-->
<div class="image-tab" style="width:100%;">
<?php require APPROOT . "/views/customer/photoGalleryPhotography.php" ?>
<!-- Photo Gallary End-->
</div>


<!-- footer start -->

<?php foreach ($data1 as $spdetails) : ?>
    <?php if ($spdetails->service_provider_id == $serviceProviderID) { ?>
                <?php require APPROOT . "/views/customer/photographyServiceFooter.php" ?>
                <?php } ?>
<?php endforeach; ?>

<!-- footer ends -->
    

<script src="<?php echo URLROOT ?>/public/js/photography/photographyscript.js"></script>
  
</body>
</html>