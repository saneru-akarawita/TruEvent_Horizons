<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer Home</title>

    <!-- font awesome cdn link -->
    <link rel="stylesheet" href=<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- custom css file link -->
    <link rel="stylesheet" href="<?php echo URLROOT?>/public/css/customer/offers.css">


</head>

<body>

<?php require APPROOT . "/views/customer/header-customer.php" ?>


        <!-- Gives a Menu Button -->
        <button id="menu-btn" class="fas fa-bars"></button>


    <!-- Hotel Section  starts -->
    <section class="home-packages">
        <h1 class="heading-title"> Hotels</h1>
        <!-- <h1 class="package-title"> Special Offers for Packages</h1> -->
        <!-- <h1 class="discount"> 15% OFF</h1> -->
        <div class="box-container">
            
            <?php $count = -1; ?>

            <?php foreach ($data[1] as $hsDetails) : ?>
                <?php $count = $count + 1;?>
                <?php $serviceProviderID = $hsDetails[0]->service_provider_id; ?>

                <?php foreach ($data[0] as $spdetails) : ?>
                    <?php if ($spdetails->service_provider_id == $serviceProviderID) { ?>
                    <?php $spName = $spdetails->company_name;
                    } ?>
                <?php endforeach; ?>

                <div class="box" style="background-color: root(--light-white)">
                    <div style="display: flex;justify-content: center;align-items: center;flex-direction: column;">

                        <div class="discount" style="text-align:center; width: 100%; border-radius: 15px 15px 0px 0px">discount <?php echo rand(ceil(5/5),floor(40/5))*5?> %</div>
                        <div style="display: flex;justify-content: center;align-items: center;flex-direction: column;">
                            <div class="image discount-radius">
                                <img src="<?php echo URLROOT?>/public/images/customer/admin-add-packages/image<?php echo 17 - $count?>.jpg" alt="">
                            </div>
                            <div class="content">
                                <h3><?=$spName;?></h3>
                                <p><?= $hsDetails[0]->service_type; ?> - <?=$hsDetails[0]->hall_name?></p>
                                <!-- <p style="font: size 5rem;color: var(--black);">$850</p> -->
                                <a href="viewservices#hotels" class="btn">View Service</a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>

        </div>

        </div>



        <!-- <div class="load-more"> <a href="packages.php" class="btn">load more</a></div> -->
    </section>

    <!-- Hotel Section Ends -->


    <!-- Decoration Starts -->


    <section class="home-packages">
        <h1 class="heading-title"> Decorations</h1>

        <div class="box-container">

            <?php $count = -1; ?>

            <?php foreach ($data[2] as $dsDetails) : ?>
                <?php $count = $count + 1;?>
                <?php $serviceProviderID = $dsDetails[0]->service_provider_id; ?>

                <?php foreach ($data[0] as $spdetails) : ?>
                    <?php if ($spdetails->service_provider_id == $serviceProviderID) { ?>
                    <?php $spName = $spdetails->company_name;
                    } ?>
                <?php endforeach; ?>

                <div class="box" style="background-color: root(--light-white)">
                    <div style="display: flex;justify-content: center;align-items: center;flex-direction: column;">

                        <div class="discount" style="text-align:center; width: 100%; border-radius: 15px 15px 0px 0px">discount <?php echo rand(ceil(5/5),floor(40/5))*5?> %</div>
                        <div style="display: flex;justify-content: center;align-items: center;flex-direction: column;">
                            <div class="image discount-radius">
                                <img src="<?php echo URLROOT?>/public/images/customer/admin-add-packages/image<?php echo 18 + $count?>.jpg" alt="">
                            </div>
                            <div class="content">
                                <h3><?= $dsDetails[0]->service_name; ?></h3>
                                <p>Provided by <?= $spName ?></p>
                                <!-- <p style="font: size 5rem;color: var(--black);">$850</p> -->
                                <a href="viewservices#decorations" class="btn">View Service</a>
                            </div>
                        </div>
                    </div>
                </div>

            <?php endforeach; ?>



        </div>

        </div>

        <!-- <div class="load-more"> <a href="packages.php" class="btn">load more</a></div> -->
    </section>

    <!-- Decoration Section Ends -->



    <!-- Music Band Starts -->

                            
    <section class="home-packages">
        <h1 class="heading-title"> Music Band</h1>

        <div class="box-container">

            <?php $count = -1; ?>
                
            <?php foreach ($data[3] as $bsDetails) : ?>
                <?php $count = $count + 1;?>
                <?php $serviceProviderID = $bsDetails[0]->service_provider_id; ?>

                <?php foreach ($data[0] as $spdetails) : ?>
                    <?php if ($spdetails->service_provider_id == $serviceProviderID) { ?>
                    <?php $spName = $spdetails->company_name;
                    } ?>
                <?php endforeach; ?>

                <div class="box" style="background-color: root(--light-white)">
                    <div style="display: flex;justify-content: center;align-items: center;flex-direction: column;">

                        <div class="discount" style="text-align:center; width: 100%; border-radius: 15px 15px 0px 0px">discount <?php echo rand(ceil(5/5),floor(40/5))*5?> %</div>
                        <div style="display: flex;justify-content: center;align-items: center;flex-direction: column;">
                            <div class="image discount-radius">
                                <img src="<?php echo URLROOT?>/public/images/customer/admin-add-packages/image<?php echo 28 + $count?>.jpg" alt="">
                            </div>
                            <div class="content">
                                <h3><?= $bsDetails[0]->service_name; ?></h3>
                                <p>Provided by <?= $spName ?></p>
                                <!-- <p style="font: size 5rem;color: var(--black);">$850</p> -->
                                <a href="viewservices#bands" class="btn">View Service</a>
                            </div>
                        </div>
                    </div>
                </div>

            <?php endforeach; ?>

        </div>

        </div>

        <!-- <div class="load-more"> <a href="packages.php" class="btn">load more</a></div> -->
    </section>

    <!-- Music Band Section Ends -->


    <!-- Photography Section  Starts -->


    <section class="home-packages">
        <h1 class="heading-title"> Photography</h1>

        <div class="box-container">

        <?php $count = -1; ?>

            <?php foreach ($data[4] as $psDetails) : ?>
                <?php $count = $count + 1;?>
                <?php $serviceProviderID = $psDetails[0]->service_provider_id; ?>

                <?php foreach ($data[0] as $spdetails) : ?>
                    <?php if ($spdetails->service_provider_id == $serviceProviderID) { ?>
                    <?php $spName = $spdetails->company_name;
                    } ?>
                <?php endforeach; ?>

            <div class="box" style="background-color: root(--light-white)">
                <div style="display: flex;justify-content: center;align-items: center;flex-direction: column;">

                    <div class="discount" style="text-align:center; width: 100%; border-radius: 15px 15px 0px 0px">discount <?php echo rand(ceil(5/5),floor(40/5))*5?> %</div>
                    <div style="display: flex;justify-content: center;align-items: center;flex-direction: column;">
                        <div class="image discount-radius">
                            <img src="<?php echo URLROOT?>/public/images/customer/admin-add-packages/image<?php echo 32 + $count?>.jpg" alt="">
                        </div>
                        <div class="content">
                            <h3><?= $psDetails[0]->service_name; ?></h3>
                            <p>Provided by <?= $spName ?></p>
                            <!-- <p style="font: size 5rem;color: var(--black);">$850</p> -->
                            <a href="viewservices#photos" class="btn">View Service</a>
                        </div>
                    </div>
                </div>
            </div>

            <?php endforeach; ?>

        </div>

        </div>


        <!-- <div class="load-more"> <a href="packages.php" class="btn">load more</a></div> -->
    </section>

    <!-- Photography Section Ends -->



    <!-- footer start -->
    <section class="footer">
        <div class="overlay"></div>
        <div class="box-container">
            <div class="box">
                <h3>Quick Access</h3>
                <a href="admin-home.php"><i class="fas fa-angle-right"></i> Home</a>
                <a href="packages.php"><i class="fas fa-angle-right"></i> Packages</a>
                <a href="admin-add-packages.php"><i class="fas fa-angle-right"></i> Add Packages</a>
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
    <!-- <script src="./js/adminscript.js"></script> -->
</body>

</html>