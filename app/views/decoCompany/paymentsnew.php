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
    <link rel="stylesheet" href="<?php echo URLROOT ?>/public/css/customer.css">
    <link rel="stylesheet" href="<?php echo URLROOT ?>/public/css/footer.css" />    
    <link rel="stylesheet" href="<?php echo URLROOT ?>/public/css/styles-hotel.css">
    <link rel="stylesheet" href="<?php echo URLROOT ?>/public/css/style.css" />    
    <link rel="stylesheet" href="<?php echo URLROOT ?>/public/css/stylepayments.css">
    <!-- <link rel="stylesheet" href="./css/customer.css">
    <link rel="stylesheet" href="./css/styles-hotel.css" />
    <link rel="stylesheet" href="./css/style.css" />
    <link rel="stylesheet" href="./css/stylepayments.css" /> -->



</head>

<body>

<?php require APPROOT . "/views/decoCompany/header-deco.php" ?>    

    <!-- header section starts -->
    <!-- <section class="header">
        <img src="images/logo/logo.jpg" alt="logo" class="logo">
        <a href="admin-home.php" class="dashboard">Dashboard</a>

        <nav class="navbar">
            <a href="customer-home.php">Home</a>
            <a href="services.php">Services</a>
            <a href="packages.php">Packages</a>
            <a href="reservationlog.php">Reservation Log</a>
            <a href="customer-reservation.php">Add Reservation</a>

        </nav>


        <!-- Gives a Menu Button -->
        <button id="menu-btn" class="fas fa-bars"></button>


    </section> -->

    <!-- header section ends -->




    <!-- Side start  -->
    <aside class="aside">
        <!-- <ul class="aside-menu">

        <li class="aside-menu-item">
            <div class="icon-box">
                <i class="bx bx-home"></i>
            </div>
        </li>


        <li class="aside-menu-item">
            <div class="icon-box">
                <i class="bx bx-user-circle"></i>
            </div>
            <div class="icon-box">
                <i class="bx bx-user-calendar"></i>
            </div>
        </li>  


        <li class="aside-menu-item">
            <div class="icon-box">
                <i class="bx bx-user-time-five"></i>
            </div>
        </li>  
    </ul>
        </li>   


        <li class="aside-menu-item">
            <div class="icon-box">
                <i class="bx bx-user-chat"></i>
            </div>
        </li>  

        <li class="aside-menu-item"> -->

        <!-- Side end -->




        <!-- Main Start -->

        <main class="main">
            <div class="wrapper">


                <div class="hero">
                    <div class="hero-heading">
                        <h3>Payments</h3>
                        <span>Pending| 11 Dec,2022</span>
                    </div>


                    <div class="hero-search">
                        <div class="input-group">
                            <input type="text" name="" id="">
                            <i class="i.bx.bx-search"></i>
                        </div>

                        <span>Filter <i class="bx bx-filter-alt"></i> </span>
                    </div>


                    <div class="hero-heading">
                        <h3>Current Payments <i class="bx bx-chevron-down"></i> </h3>
                    </div>


                    <div class="project">
                        <div class="col">
                            <div class="project-card">
                                <main class="order__summary">
                                    <!-- div for hero image -->
                                    <div class="order__summary-image">
                                        <img src="images/illustration-hero.svg" aria-hidden="true" alt="hero" />
                                    </div>
                                    <!-- Main content start -->
                                    <h1>Order Summary</h1>
                                    <p class="description">
                                        You can now listen to millions of songs, audiobooks, and podcasts on any
                                        device anywhere you like!
                                    </p>



                                    <!-- div for order plan -->
                                    <div class="order__summary-plan">
                                        <img src="images/icon-music.svg" aria-hidden="true" alt="music" />
                                        <div class="plan">
                                            <h2>Annual Plan</h2>
                                            <p>$59.99/year</p>
                                        </div>
                                        <a href="#">Change</a>
                                    </div>
                                    <button>Proceed to Payment</button>
                                    <button>Cancel Order</button>
                                </main>

                            </div>
                        </div>

                        <div class="col">
                            <div class="project-card">
                                <main class="order__summary">
                                    <!-- div for hero image -->
                                    <div class="order__summary-image">
                                        <img src="images/illustration-hero.svg" aria-hidden="true" alt="hero" />
                                    </div>
                                    <!-- Main content start -->
                                    <h1>Order Summary</h1>
                                    <p class="description">
                                        You can now listen to millions of songs, audiobooks, and podcasts on any
                                        device anywhere you like!
                                    </p>



                                    <!-- div for order plan -->
                                    <div class="order__summary-plan">
                                        <img src="images/icon-music.svg" aria-hidden="true" alt="music" />
                                        <div class="plan">
                                            <h2>Annual Plan</h2>
                                            <p>$59.99/year</p>
                                        </div>
                                        <a href="#">Change</a>
                                    </div>
                                    <button>Proceed to Payment</button>
                                    <button>Cancel Order</button>
                                </main>

                            </div>
                        </div>

                        <div class="col">
                            <div class="project-card">
                                <main class="order__summary">
                                    <!-- div for hero image -->
                                    <div class="order__summary-image">
                                        <img src="images/illustration-hero.svg" aria-hidden="true" alt="hero" />
                                    </div>
                                    <!-- Main content start -->
                                    <h1>Order Summary</h1>
                                    <p class="description">
                                        You can now listen to millions of songs, audiobooks, and podcasts on any
                                        device anywhere you like!
                                    </p>



                                    <!-- div for order plan -->
                                    <div class="order__summary-plan">
                                        <img src="images/icon-music.svg" aria-hidden="true" alt="music" />
                                        <div class="plan">
                                            <h2>Annual Plan</h2>
                                            <p>$59.99/year</p>
                                        </div>
                                        <a href="#">Change</a>
                                    </div>
                                    <button>Proceed to Payment</button>
                                    <button>Cancel Order</button>
                                </main>

                            </div>
                        </div>


                        <div class="col">
                            <div class="project-card">
                                <main class="order__summary">
                                    <!-- div for hero image -->
                                    <div class="order__summary-image">
                                        <img src="images/illustration-hero.svg" aria-hidden="true" alt="hero" />
                                    </div>
                                    <!-- Main content start -->
                                    <h1>Order Summary</h1>
                                    <p class="description">
                                        You can now listen to millions of songs, audiobooks, and podcasts on any
                                        device anywhere you like!
                                    </p>



                                    <!-- div for order plan -->
                                    <div class="order__summary-plan">
                                        <img src="images/icon-music.svg" aria-hidden="true" alt="music" />
                                        <div class="plan">
                                            <h2>Annual Plan</h2>
                                            <p>$59.99/year</p>
                                        </div>
                                        <a href="#">Change</a>
                                    </div>
                                    <button>Proceed to Payment</button>
                                    <button>Cancel Order</button>
                                </main>

                            </div>
                        </div>

                    <div class="col">
                            <div class="project-card">
                                <main class="order__summary">
                                    <!-- div for hero image -->
                                    <div class="order__summary-image">
                                        <img src="images/illustration-hero.svg" aria-hidden="true" alt="hero" />
                                    </div>
                                    <!-- Main content start -->
                                    <h1>Order Summary</h1>
                                    <p class="description">
                                        You can now listen to millions of songs, audiobooks, and podcasts on any
                                        device anywhere you like!
                                    </p>



                                    <!-- div for order plan -->
                                    <div class="order__summary-plan">
                                        <img src="images/icon-music.svg" aria-hidden="true" alt="music" />
                                        <div class="plan">
                                            <h2>Annual Plan</h2>
                                            <p>$59.99/year</p>
                                        </div>
                                        <a href="#">Change</a>
                                    </div>
                                    <button>Proceed to Payment</button>
                                    <button>Cancel Order</button>
                                </main>

                            </div>
                        </div>

                    </div>

                </div>

            </div>
        </main>

        <!-- tilt -->

        <script src="https://cdnjs.cloudflare.com/ajax/libs/vanilla-tilt/1.4.1/vanilla-tilt.min.js"></script>

        <!-- Main End -->

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
    <script src="<?php echo URLROOT ?>/public/js/deco company/decoscript.js"></script>
        
</body>

</html>