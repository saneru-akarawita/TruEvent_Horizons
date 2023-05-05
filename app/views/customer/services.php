<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TruEvent Horizons - Services - Customer</title>

    <!-- font awesome cdn link -->
    <link rel="stylesheet" href=<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- custom css file link -->
    <link rel="stylesheet" href="<?php echo URLROOT ?>/public/css/customer/services.css" />


</head>

<body>
<?php require APPROOT . "/views/customer/header-customer.php" ?>

    <!-- header section starts -->
    <!-- <section class="header">
        <img src="<?php echo URLROOT ?>/public/images/customer/logo/logo.jpg" alt="logo" class="logo">
        <a href="home" class="dashboard">Dashboard</a>

        <nav class="navbar">
            <a href="home">Home</a>
            <a href="viewservices">Services</a>
            <a href="#">Packages</a>
            <a href="viewreservationlog">Reservation Log</a>
            <a href="addreservation">Add Reservation</a>
            <a href="logout">Logout</a>

        </nav> -->


        <!-- Gives a Menu Button -->
        <button id="menu-btn" class="fas fa-bars"></button>


    <!-- </section> -->

    <!-- header section ends -->

    <?php $data0 = $data[0]; ?>
    <?php $data1 = $data[1]; ?>
    <?php $data2 = $data[2]; ?>
    <?php $data3 = $data[3]; ?>
    <?php $data4 = $data[4]; ?>
    <!-- Hotel Section  starts -->

    <section class="home-packages" id="hotels">

        <h1 class="heading-title"> Hotels</h1>

        <div class="box-container">
            <?php $hcount=0?>
            <?php foreach ($data2 as $hsDetails) : ?>
            <?php if($hsDetails->active == 1) {?>
                <?php $hcount= $hcount+1;?>
                <?php $serviceProviderID = $hsDetails->service_provider_id; ?>

                <?php foreach ($data0 as $spdetails) : ?>
                    <?php if ($spdetails->service_provider_id == $serviceProviderID) { ?>
                    <?php $spName = $spdetails->company_name;
                    } ?>
                <?php endforeach; ?>
                <div class="box" style="border:none; border-radius:10px">
                    <div class="image" style="border-radius:10px 10px 0px 0px">

                        <?php echo "<img src = '" . URLROOT . "/public/images/customer/services/hotel/" . ($hcount%7 + 1) . ".jpg'>"; ?>

                    </div>
                    <div class="content">
                        <h3><?=$spName;?></h3>
                        <p><?= $hsDetails->service_type; ?> - <?=$hsDetails->hall_name?></p>
                        
                        <!-- <a href="<?php echo URLROOT; ?>/customerReservation/addReservationByServices?service_name=<?=$spName;?> - <?=$hsDetails->hall_name?>&service_type=<?php echo 'Hotel'?>&sp_id=<?=$serviceProviderID;?>" class="btn">Make Reservation</a> -->
                        <a href="viewEachServiceHotel?service_id=<?=$hsDetails->service_id; ?>" class="btn" name="viewaction" value="view" style="text-decoration:none; border-radius:5px;">View Service</a>
                        <!-- <a href="<?php echo URLROOT; ?>/customerReservation/addReservationByServices?service_name=<?=$spName;?> - <?=$hsDetails->hall_name?>&service_type=<?php echo 'Hotel'?>&sp_id=<?=$serviceProviderID;?>&service_id=<?=$hsDetails->service_id; ?>" class="btn">Make Reservation</a> -->
                   
                    </div>
                </div>
            <?php }else {?>
                <?php $serviceProviderID = $hsDetails->service_provider_id; ?>

                <?php foreach ($data0 as $spdetails) : ?>
                    <?php if ($spdetails->service_provider_id == $serviceProviderID) { ?>
                    <?php $spName = $spdetails->company_name;
                    } ?>
                <?php endforeach; ?>
                <div class="box" style="border:none; border-radius:10px">
                    <div class="image" style="border-radius:10px 10px 0px 0px">
                        <?php echo "<img src = '".URLROOT."/public/images/disable". ".jpg'>";?>
                    </div>
                    <div class="content">
                        <h3><?=$spName;?></h3>
                        <p><?= $hsDetails->service_type; ?> - <?=$hsDetails->hall_name?></p>
                        <br>
                        <button class="viewButton" style="height:40px; width:200px; background-color:grey; border-radius:5px;" >Service Unavailable</a></button>

                    </div>
                </div>
            <?php }?>
            <?php endforeach; ?>

        </div>

    </section>

    <!-- Hotel Section Ends -->


    <!-- Decoration Starts -->

    <section class="home-packages" id="decorations">

        <h1 class="heading-title"> Decorations</h1>

        <div class="box-container">
            <?php $dcount=0?>
            <?php foreach ($data1 as $dcDetails) : ?>
            <?php if($dcDetails->active == 1) {?>
                <?php $dcount= $dcount+1;?>
                <?php $serviceProviderID = $dcDetails->service_provider_id; ?>

                <?php foreach ($data0 as $spdetails) : ?>
                    <?php if ($spdetails->service_provider_id == $serviceProviderID) { ?>
                    <?php $spName = $spdetails->company_name;
                    } ?>
                <?php endforeach; ?>
                <div class="box" style="border:none; border-radius:10px">
                    <div class="image" style="border-radius:10px 10px 0px 0px">
                        <?php echo "<img src = '" . URLROOT . "/public/images/customer/services/deco/" . ($dcount%5 + 1) . ".jpg'>"; ?>
                    </div>
                    <div class="content">
                        <h3><?= $dcDetails->service_name; ?></h3>
                        <p>Provided by <?= $spName ?></p>
                        <!-- <a href="<?php echo URLROOT; ?>/customerReservation/addReservationByServices?service_name=<?= $spName; ?> - <?= $dcDetails->service_name ?>&service_type=<?php echo 'Decoration' ?>" class="btn">Make Reservation</a>  -->
                        <a href="viewEachServiceDeco?service_id=<?=$dcDetails->service_id; ?>" class="btn" name="viewaction" value="view" style="text-decoration:none; border-radius:5px;">View Service</a>
                        <!-- <a href="<?php echo URLROOT; ?>/customerReservation/addReservationByServices?service_name=<?= $spName; ?> - <?= $dcDetails->service_name ?>&service_type=<?php echo 'Decoration' ?>&sp_id=<?=$serviceProviderID;?>&service_id=<?=$dcDetails->service_id; ?>" class="btn">Make Reservation</a>  -->
                   
                    </div>
                </div>
            <?php }else {?>
                <?php $serviceProviderID = $dcDetails->service_provider_id; ?>

                <?php foreach ($data0 as $spdetails) : ?>
                    <?php if ($spdetails->service_provider_id == $serviceProviderID) { ?>
                    <?php $spName = $spdetails->company_name;
                    } ?>
                <?php endforeach; ?>
                <div class="box" style="border:none; border-radius:10px">
                    <div class="image" style="border-radius:10px 10px 0px 0px">
                        <?php echo "<img src = '".URLROOT."/public/images/disable". ".jpg'>";?>
                    </div>
                    <div class="content">
                        <h3><?= $dcDetails->service_name; ?></h3>
                        <p>Provided by <?= $spName ?></p>
                        <br>
                        <button class="viewButton" style="height:40px; width:200px; background-color:grey; border-radius:5px;" >Service Unavailable</a></button>
                    </div>
                </div>
            <?php }?>
            <?php endforeach; ?>

        </div>

        </div>

    </section>

    <!-- Decoration Section Ends -->



    <!-- Music Band Starts -->

    <section class="home-packages" id="bands">
    <h1 class="heading-title"> Bands</h1>

    <div class="box-container">
    <?php $dcount=0?>
            <?php foreach ($data3 as $bsDetails) : ?>
            <?php if($bsDetails->active == 1) {?>
                <?php $dcount= $dcount+1;?>
                <?php $serviceProviderID = $bsDetails->service_provider_id; ?>

                <?php foreach ($data0 as $spdetails) : ?>
                    <?php if ($spdetails->service_provider_id == $serviceProviderID) { ?>
                    <?php $spName = $spdetails->company_name;
                    } ?>
                <?php endforeach; ?>
                <div class="box" style="border:none; border-radius:10px">
                    <div class="image" style="border-radius:10px 10px 0px 0px">
                        <?php echo "<img src = '" . URLROOT . "/public/images/customer/services/band/" .($dcount%6 + 1) . ".jpg'>"; ?>
                    </div>
                    <div class="content">
                        <h3><?= $bsDetails->service_name; ?></h3>
                        <p>Provided by <?= $spName ?></p>
                        <!-- <a href="<?php echo URLROOT; ?>/customerReservation/addReservationByServices?service_name=<?= $spName; ?> - <?= $bsDetails->service_name ?>&service_type=<?php echo 'Band' ?>" class="btn">Make Reservation</a>  -->
                        <a href="viewEachServiceBand?service_id=<?=$bsDetails->service_id; ?>" class="btn" name="viewaction" value="view" style="text-decoration:none; border-radius:5px;">View Service</a>
                    </div>
                </div>
            <?php }else {?>
                <?php $serviceProviderID = $bsDetails->service_provider_id; ?>

                <?php foreach ($data0 as $spdetails) : ?>
                    <?php if ($spdetails->service_provider_id == $serviceProviderID) { ?>
                    <?php $spName = $spdetails->company_name;
                    } ?>
                <?php endforeach; ?>
                <div class="box" style="border:none; border-radius:10px">
                    <div class="image" style="border-radius:10px 10px 0px 0px">
                        <?php echo "<img src = '".URLROOT."/public/images/disable". ".jpg'>";?>
                    </div>
                    <div class="content">
                        <h3><?= $bsDetails->service_name; ?></h3>
                        <p>Provided by <?= $spName ?></p>
                        <br>
                        <button class="viewButton" style="height:40px; width:200px; background-color:grey; border-radius:5px;" >Service Unavailable</a></button>
                    </div>
                </div>
            <?php }?>
            <?php endforeach; ?>
        </div>
    </div>
</section> 


    <!-- Music Band Section Ends -->


    <!-- Photography Section  Starts -->

    <section class="home-packages" id="photography">
    <h1 class="heading-title"> Photography</h1>

    <div class="box-container">
            <?php $dcount=0?>
            <?php foreach ($data4 as $psDetails) : ?>
            <?php if($psDetails->active == 1) {?>
                <?php $dcount= $dcount+1;?>
                <?php $serviceProviderID = $psDetails->service_provider_id; ?>

                <?php foreach ($data0 as $spdetails) : ?>
                    <?php if ($spdetails->service_provider_id == $serviceProviderID) { ?>
                    <?php $spName = $spdetails->company_name;
                    } ?>
                <?php endforeach; ?>
                <div class="box" style="border:none; border-radius:10px">
                    <div class="image" style="border-radius:10px 10px 0px 0px">
                        <?php echo "<img src = '" . URLROOT . "/public/images/customer/services/photo/" . ($dcount%6 + 1) . ".jpg'>"; ?>
                    </div>
                    <div class="content">
                        <h3><?= $psDetails->service_name; ?></h3>
                        <p>Provided by <?= $spName ?></p>
                        <!-- <a href="<?php echo URLROOT; ?>/customerReservation/addReservationByServices?service_name=<?= $spName; ?> - <?= $psDetails->service_name ?>&service_type=<?php echo 'Photography'?>" class="btn">Make Reservation</a>  -->
                        <a href="viewEachServicePhotography?service_id=<?=$psDetails->service_id; ?>" class="btn" name="viewaction" value="view" style="text-decoration:none; border-radius:5px;">View Service</a>
                    
                    </div>
                </div>
            <?php }else {?>
                <?php $serviceProviderID = $psDetails->service_provider_id; ?>

                <?php foreach ($data0 as $spdetails) : ?>
                    <?php if ($spdetails->service_provider_id == $serviceProviderID) { ?>
                    <?php $spName = $spdetails->company_name;
                    } ?>
                <?php endforeach; ?>
                <div class="box" style="border:none; border-radius:10px">
                    <div class="image" style="border-radius:10px 10px 0px 0px">
                        <?php echo "<img src = '".URLROOT."/public/images/disable". ".jpg'>";?>
                    </div>
                    <div class="content">
                        <h3><?= $psDetails->service_name; ?></h3>
                        <p>Provided by <?= $spName ?></p>
                        <br>
                        <button class="viewButton" style="height:40px; width:200px; background-color:grey; border-radius:5px;" >Service Unavailable</a></button>
                    </div>
                </div>
            <?php }?>
            <?php endforeach; ?>
        </div>
    </div>
</section>


    <!-- Photography Section Ends -->

    <!-- footer start -->
    <section class="footer">
        <div class="overlay"></div>
        <div class="box-container">
            <div class="box">
                <h3>Quick Access</h3>
                <a href="home"><i class="fas fa-angle-right"></i> Home</a>
                <a href="services"><i class="fas fa-angle-right"></i> Services</a>
                <a href="#"><i class="fas fa-angle-right"></i>Packages</a>
            </div>

            <div class="box">
                <h3>Extra</h3>
                <a href="#"><i class="fas fa-angle-right"></i> About US</a>
                <a href="#"><i class="fas fa-angle-right"></i> Privacy Policy</a>
                <a href="#"><i class="fas fa-angle-right"></i> Ask Questions</a>
            </div>

            <div class="box">
                <h3>Contact Us</h3>
                <a href="#"><i class="fas fa-phone"></i> +94 123-456-789</a>
                <a href="#"><i class="fa-solid fa-envelope"></i> TruEvent@gmail.com</a>
                <a href="#"><i class="fas fa-map"></i> Colombo</a>


            </div>

            <div class="box">
                <h3>Follow US</h3>
                <a href="#"><i class="fab fa-facebook"></i> facebook</a>
                <a href="#"><i class="fab fa-instagram"></i> instagram</a>
                <a href="#"><i class="fab fa-linkedin"></i> linkedin</a>

            </div>
        </div>



        <div class="credit">
            Created By <span>TruEvent</span> | All Rights Reserved
        </div>

    </section>


    <!-- footer ends -->


    <!-- custom js file link -->
    <script src="./js/adminscript.js"></script>
</body>

</html>