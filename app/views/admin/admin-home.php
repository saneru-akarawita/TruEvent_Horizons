<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Admin Home</title>

        <!-- font awesome cdn link -->
        <link rel="stylesheet" href=<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <!-- Montserrat Font -->
        <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

        <!-- Material Icons -->
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Outlined" rel="stylesheet">

        <!-- Custom CSS -->
        <link rel="stylesheet" href="<?php echo URLROOT ?>/public/css/admin/dashboardpanel.css">
        <!-- custom css file link -->
        <link rel="stylesheet" href="<?php echo URLROOT ?>/public/css/admin/admin-add-reservation-style.css"/>


    </head>
    <body>
    <?php require APPROOT . "/views/admin/header-admin.php" ?>

<!-- header section starts -->
<!-- <section class="header" style="height:fit-content;">
<img src="<?php echo URLROOT ?>/public/images/admin/logo/logo.jpg" alt="logo" class="logo">
<a href="home" class="dashboard">Dashboard</a>

<nav class="navbar">
    <a href="home">Home</a>
    <a href="viewpackages">Packages</a>
    <a href="addpackages">Add Packages</a>
    <a href="logout">Logout</a>
</nav> -->

<!-- Gives a Menu Button -->
<button id="menu-btn" class="fas fa-bars"></button>


<!-- </section> -->

<!-- header section ends -->


<!-- home section starts -->
<section class="home">
    <a class="prev" onclick="plusSlides(-1)">❮</a>
    <a class="next" onclick="plusSlides(1)">❯</a>
    <div class="swiper home-slider">
        <div class="swiper-wrapper">
            <div class="swiper-slide slide" style="background:url(<?php echo URLROOT ?>/public/images/admin/admin-add-packages/image10.jpg) no-repeat">
                <div class="content">
                <span>Exclusive Events,Priceless Memories</span>
                <h3>Celebrate</h3>
                <!-- <a href="viewpackages" class="btn">View Packages</a> -->
                </div>     
            </div>

            <div class="swiper-slide slide hidden" style="background:url(<?php echo URLROOT ?>/public/images/admin/admin-add-packages/image11.jpg) no-repeat; display:none;">
                <div class="content">
                <span>Exclusive Events,Priceless Memories</span>
                <h3>Discover</h3>
                <!-- <a href="viewpackages" class="btn">View Packages</a> -->
                </div>
            </div>
    
            <div class="swiper-slide slide hidden" style="background:url(<?php echo URLROOT ?>/public/images/admin/admin-add-packages/image12.jpg) no-repeat; display:none;">
                    <div class="content">
                    <span>Exclusive Events,Priceless Memories</span>
                    <h3>'Make your event Memorable</h3>
                    <!-- <a href="viewpackages" class="btn">View Packages</a> -->
            </div>
        </div>
    </div>
</div>
 
<div class="swiper-button-next"></div>
<div class="swiper-button-prev"></div>


</div>
</section>
<br>
<!-- home sesction ends -->
<main class="main-container">
        <div class="main-title">
          <!-- <p class="font-weight-bold">DASHBOARD</p> -->
        </div>

        <div class="main-cards">

          <div class="card">
            <div class="card-inner">
              <p class="text-primary">Total Number of Services</p>
              <span class="material-icons-outlined text-blue">inventory_2</span>
            </div>
            <span class="text-primary font-weight-bold">21</span>
          </div>

          <div class="card">
            <div class="card-inner">
              <p class="text-primary">Total Number of Customers</p>
              <span class="material-icons-outlined text-orange">add_shopping_cart</span>
            </div>
            <span class="text-primary font-weight-bold">5</span>
          </div>

          <div class="card">
            <div class="card-inner">
              <p class="text-primary">Total Number of Service Providers</p>
              <span class="material-icons-outlined text-green">shopping_cart</span>
            </div>
            <span class="text-primary font-weight-bold">6</span>
          </div>

          <div class="card">
            <div class="card-inner">
              <p class="text-primary">Ongoing Reservations</p>
              <span class="material-icons-outlined text-red">notification_important</span>
            </div>
            <span class="text-primary font-weight-bold">3</span>
          </div>

        </div>

        <div class="charts">

          <div class="charts-card">
            <p class="chart-title">Number of Service Providers</p>
            <div id="bar-chart"></div>
          </div>

          <div class="charts-card">
            <p class="chart-title">Purchasing of Services and Packages</p>
            <div id="area-chart"></div>
          </div>

        </div>
</main>




<!-- Home Package Section  starts -->
<section class="home-packages">
    <h1 class="heading-title">Our Packages</h1>

    <div class="box-container">
        <div class="box">
            <div class="image">
                <img src="<?php echo URLROOT ?>/public/images/admin/admin-add-packages/image4.jpg" alt="">
            </div>
            <div class="content">
                <h3>Anniversary Package</h3>
                <p>Plan your anniversary</p>
                <a href="viewpackages" class="btn">View Package</a>
            </div>
        </div>


        <div class="box">
            <div class="image">
                <img src="<?php echo URLROOT ?>/public/images/admin/admin-add-packages/image5.jpg" alt="">
            </div>
            <div class="content">
                <h3>Birthdy Package</h3>
                <p>Enjoy your birthdays</p>
                <a href="viewpackages" class="btn">View Package</a>
            </div>
        </div>


        <div class="box">
            <div class="image">
                <img src="<?php echo URLROOT ?>/public/images/admin/admin-add-packages/image6.jpg" alt="">
            </div>
            <div class="content">
                <h3>Fair Wells Package</h3>
                <p>Have Fun</p>
                <a href="viewpackages" class="btn">View Package</a>
            </div>
        </div>


    </div>

    </div>

    

    <div class="load-more"> <a href="viewpackages" class="btn">load more</a></div>
</section>

<!-- Home Package Section Ends -->


<!-- Home offer Section starts -->
<section class="home-offer">
    <div class="content">
        <h3>Upto 25% Off</h3>
        <p>This Weekend</p>
        <a href="addpackages" class="btn">Use Coupon Code</a>
    </div>
</section>


<!-- Home offer Section ends -->


<!-- footer start -->
<section class="footer">
    <div class="overlay"></div>
    <div class="box-container">
        <div class="box">
            <h3>Quick Access</h3>
        <a href="home"><i class="fas fa-angle-right"></i>  Home</a>
        <a href="viewpackages"><i class="fas fa-angle-right"></i> Packages</a>
        <a href="addpackages"><i class="fas fa-angle-right"></i> Add Packages</a>
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


    <!-- custom js file link -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/apexcharts/3.35.3/apexcharts.min.js"></script>
    <script src="<?php echo URLROOT ?>/public/js/admin/adminscript.js"></script>
    </body>
</html>