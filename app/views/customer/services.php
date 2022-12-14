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
    <link rel="stylesheet" href="<?php echo URLROOT ?>/public/css/customer/services.css" />


</head>

<body>


    <!-- header section starts -->
    <section class="header">
        <img src="<?php echo URLROOT ?>/public/images/customer/logo/logo.jpg" alt="logo" class="logo">
        <a href="home" class="dashboard">Dashboard</a>

        <nav class="navbar">
            <a href="home">Home</a>
            <a href="viewservices">Services</a>
            <a href="#">Packages</a>
            <a href="viewreservationlog">Reservation Log</a>
            <a href="addreservation">Add Reservation</a>
            <a href="logout">Logout</a>

        </nav>


        <!-- Gives a Menu Button -->
        <button id="menu-btn" class="fas fa-bars"></button>


    </section>

    <!-- header section ends -->


    <!-- <div class="heading" style="background:url() no-repeat">
<h1>Packages</h1>
</div> -->

    <?php $data0=$data[0];?>
    <?php $data1=$data[1];?>
    <?php $data2=$data[2];?>
    <!-- Hotel Section  starts -->

    <section class="home-packages" id="hotels">

        <h1 class="heading-title"> Hotels</h1>

        <div class="box-container">

            
            <?php foreach ($data2 as $hsDetails) : ?>

                <?php $serviceProviderID = $hsDetails->service_provider_id; ?>

                <?php foreach ($data0 as $spdetails) :?>
                    <?php if($spdetails->service_provider_id == $serviceProviderID){ ?>
                        <?php $spName = $spdetails->company_name; }?>
                <?php endforeach; ?>

                <div class="box">
                    <div class="image">
                        <?php echo "<img src = '".URLROOT."/public/images/customer/admin-add-packages/image".rand(10,14).".jpg'>";?>
                    </div>
                    <div class="content">
                        <h3><?= $hsDetails->service_type; ?></h3>
                        <p><?=$spName;?> - <?=$hsDetails->hall_name?></p>
                        <a href="services" class="btn">View Service</a>
                        <!-- <a href="viewEachService?service_id=<?=$hsDetails->service_id; ?>" class="viewButton" name="viewaction" value="view" style="text-decoration:none">View</a> -->
                    </div>
                </div>

            <?php endforeach; ?>

            
            <div class="box">
                <div class="image">
                    <img src="<?php echo URLROOT ?>/public/images/customer/admin-add-packages/image10.jpg" alt="">
                </div>
                <div class="content">
                    <h3>Kingsbury</h3>
                    <p>Last Minute Deals Find Your Next Getaway</p>
                    <a href="services" class="btn">View Service</a>
                </div>
            </div>


            <div class="box">
                <div class="image">
                    <img src="<?php echo URLROOT ?>/public/images/customer/admin-add-packages/image11.jpg" alt="">
                </div>
                <div class="content">
                    <h3>Cinnamon Hotels</h3>
                    <p>To Make Your Event More Beautiful And Unforgettable</p>
                    <!-- <p style="font: size 5rem;color: var(--black);">$850</p> -->
                    <a href="services" class="btn">View Service</a>
                </div>
            </div>


            <div class="box">
                <div class="image">
                    <img src="<?php echo URLROOT ?>/public/images/customer/admin-add-packages/image12.jpg" alt="">
                </div>
                <div class="content">
                    <h3>Ramada Hotels</h3>
                    <p>Make Your Event Enjoyable And Get Mesmerized</p>
                    <!-- <p style="font: size 5rem;color: var(--black);">$550</p> -->
                    <a href="services" class="btn">View Service</a>
                </div>
            </div>


            <div class="box">
                <div class="image">
                    <img src="<?php echo URLROOT ?>/public/images/customer/admin-add-packages/image14.jpg" alt="">
                </div>
                <div class="content">
                    <h3>Shangri La Hotels</h3>
                    <p>Make Your Event More Memorable with special chinese cuisine</p>
                    <!-- <p style="font: size 5rem;color: var(--black);">$850</p> -->
                    <a href="services" class="btn">View Service</a>
                </div>
            </div>


        </div>
    
        <!-- <div class="load-more"> <a href="packages.php" class="btn">load more</a></div> -->
    </section>

    <!-- Hotel Section Ends -->


    <!-- Decoration Starts -->

    <section class="home-packages" id="decorations">

        <h1 class="heading-title"> Decorations</h1>

        <div class="box-container">
            <?php foreach ($data1 as $hsDetails) : ?>

                <?php $serviceProviderID = $hsDetails->service_provider_id; ?>

                <?php foreach ($data0 as $spdetails) :?>
                    <?php if($spdetails->service_provider_id == $serviceProviderID){ ?>
                        <?php $spName = $spdetails->company_name; }?>
                <?php endforeach; ?>

                <div class="box">
                    <div class="image">
                        <?php echo "<img src = '".URLROOT."/public/images/customer/admin-add-packages/image".rand(10,14).".jpg'>";?>
                    </div>
                    <div class="content">
                        <h3><?= $hsDetails->service_name; ?></h3>
                        <p>Provided by <?=$spName?></p>
                        <!-- <p style="font: size 5rem;color: var(--black);">$750</p> -->
                        <a href="services.php" class="btn">View Service</a>
                    </div>
                </div>
            <?php endforeach; ?>


            <div class="box">
                <div class="image">
                    <img src="<?php echo URLROOT ?>/public/images/customer/admin-add-packages/image11.jpg" alt="">
                </div>
                <div class="content">
                    <h3>Decoration Company</h3>
                    <p>To Make Your Event More Beautiful And Unforgettable</p>
                    <!-- <p style="font: size 5rem;color: var(--black);">$850</p> -->
                    <a href="packages.php" class="btn">View Service</a>
                </div>
            </div>


            <div class="box">
                <div class="image">
                    <img src="<?php echo URLROOT ?>/public/images/customer/admin-add-packages/image12.jpg" alt="">
                </div>
                <div class="content">
                    <h3>Band Company</h3>
                    <p>Make Your Event Enjoyable And Get Mesmerized</p>
                    <!-- <p style="font: size 5rem;color: var(--black);">$550</p> -->
                    <a href="packages.php" class="btn">View Service</a>
                </div>
            </div>


            <div class="box">
                <div class="image">
                    <img src="<?php echo URLROOT ?>/public/images/customer/admin-add-packages/image13.jpg" alt="">
                </div>
                <div class="content">
                    <h3>Photography Company</h3>
                    <p>Make Your Event More Memorable</p>
                    <!-- <p style="font: size 5rem;color: var(--black);">$850</p> -->
                    <a href="packages.php" class="btn">View Service</a>
                </div>
            </div>

        </div>

        </div>

        <!-- <div class="load-more"> <a href="packages.php" class="btn">load more</a></div> -->
    </section>

    <!-- Decoration Section Ends -->



    <!-- Music Band Starts -->


    <section class="home-packages" id ="bands">

        <h1 class="heading-title"> Music Band</h1>

        <div class="box-container">
            <div class="box">
                <div class="image">
                    <img src="<?php echo URLROOT ?>/public/images/customer/admin-add-packages/image10.jpg" alt="">
                </div>
                <div class="content">
                    <h3>Hotel Service</h3>
                    <p>Last Minute Deals Find Your Next Getaway</p>
                    <!-- <p style="font: size 5rem;color: var(--black);">$750</p> -->
                    <a href="services.php" class="btn">View Service</a>
                </div>
            </div>


            <div class="box">
                <div class="image">
                    <img src="<?php echo URLROOT ?>/public/images/customer/admin-add-packages/image11.jpg" alt="">
                </div>
                <div class="content">
                    <h3>Photographyt</h3>
                    <p>To Make Your Event More Beautiful And Unforgettable</p>
                    <!-- <p style="font: size 5rem;color: var(--black);">$850</p> -->
                    <a href="packages.php" class="btn">View Service</a>
                </div>
            </div>


            <div class="box">
                <div class="image">
                    <img src="<?php echo URLROOT ?>/public/images/customer/admin-add-packages/image12.jpg" alt="">
                </div>
                <div class="content">
                    <h3>Band Company</h3>
                    <p>Make Your Event Enjoyable And Get Mesmerized</p>
                    <!-- <p style="font: size 5rem;color: var(--black);">$550</p> -->
                    <a href="packages.php" class="btn">View Service</a>
                </div>
            </div>


            <div class="box">
                <div class="image">
                    <img src="<?php echo URLROOT ?>/public/images/customer/admin-add-packages/image13.jpg" alt="">
                </div>
                <div class="content">
                    <h3>Photography Company</h3>
                    <p>Make Your Event More Memorable</p>
                    <!-- <p style="font: size 5rem;color: var(--black);">$850</p> -->
                    <a href="packages.php" class="btn">View Service</a>
                </div>
            </div>


        </div>

        </div>

        <!-- <div class="load-more"> <a href="packages.php" class="btn">load more</a></div> -->
    </section>

    <!-- Music Band Section Ends -->


    <!-- Photography Section  Starts -->


    <section class="home-packages" id="photography">

        <h1 class="heading-title"> Photography</h1>

        <div class="box-container">
            <div class="box">
                <div class="image">
                    <img src="<?php echo URLROOT ?>/public/images/customer/admin-add-packages/image10.jpg" alt="">
                </div>
                <div class="content">
                    <h3>Hotel Service</h3>
                    <p>Last Minute Deals Find Your Next Getaway</p>
                    <!-- <p style="font: size 5rem;color: var(--black);">$750</p> -->
                    <a href="services.php" class="btn">View Service</a>
                </div>
            </div>


            <div class="box">
                <div class="image">
                    <img src="<?php echo URLROOT ?>/public/images/customer/admin-add-packages/image11.jpg" alt="">
                </div>
                <div class="content">
                    <h3>Decoration Company</h3>
                    <p>To Make Your Event More Beautiful And Unforgettable</p>
                    <!-- <p style="font: size 5rem;color: var(--black);">$850</p> -->
                    <a href="packages.php" class="btn">View Service</a>
                </div>
            </div>


            <div class="box">
                <div class="image">
                    <img src="<?php echo URLROOT ?>/public/images/customer/admin-add-packages/image12.jpg" alt="">
                </div>
                <div class="content">
                    <h3>Band Company</h3>
                    <p>Make Your Event Enjoyable And Get Mesmerized</p>
                    <!-- <p style="font: size 5rem;color: var(--black);">$550</p> -->
                    <a href="packages.php" class="btn">View Service</a>
                </div>
            </div>


            <div class="box">
                <div class="image">
                    <img src="<?php echo URLROOT ?>/public/images/customer/admin-add-packages/image13.jpg" alt="">
                </div>
                <div class="content">
                    <h3>Photography Company</h3>
                    <p>Make Your Event More Memorable</p>
                    <!-- <p style="font: size 5rem;color: var(--black);">$850</p> -->
                    <a href="packages.php" class="btn">View Service</a>
                </div>
            </div>

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
                <a href="#"><i class="fas fa-envelop"></i> TruEvent@gmail.com</a>
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