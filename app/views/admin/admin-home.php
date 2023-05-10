<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>TruEvent Horizons - Home - Admin</title>

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

        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>

    </head>
    <body>
<!-- header section start  -->
    <?php require APPROOT . "/views/admin/header-admin.php" ?>

<button id="menu-btn" class="fas fa-bars"></button>

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
                </div>     
            </div>

            <div class="swiper-slide slide hidden" style="background:url(<?php echo URLROOT ?>/public/images/admin/admin-add-packages/image11.jpg) no-repeat; display:none;">
                <div class="content">
                <span>Exclusive Events,Priceless Memories</span>
                <h3>Discover</h3>
                </div>
            </div>
    
            <div class="swiper-slide slide hidden" style="background:url(<?php echo URLROOT ?>/public/images/admin/admin-add-packages/image12.jpg) no-repeat; display:none;">
                    <div class="content">
                    <span>Exclusive Events,Priceless Memories</span>
                    <h3>'Make your event Memorable</h3>
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
                <p class="text-primary">Total Number of Customers</p>
                <span class="material-icons-outlined text-purple">group</span>
                </div>
                <span class="text-primary font-weight-bold"><?php echo $data['no_of_customers']?></span>
            </div>

          <div class="card">
            <div class="card-inner">
              <p class="text-primary">Total Number of Service Providers</p>
              <span class="material-icons-outlined text-black">support_agent</span>
            </div>
            <span class="text-primary font-weight-bold"><?php echo $data['no_of_service_providers']?></span>
          </div>

          <div class="card">
            <div class="card-inner">
              <p class="text-primary">Total Number of Services</p>
              <span class="material-icons-outlined text-darkBlue">inventory_2</span>
            </div>
            <span class="text-primary font-weight-bold"><?php echo $data['no_of_services']?></span>
          </div>

          <div class="card">
            <div class="card-inner">
              <p class="text-primary">Ongoing Reservations</p>
              <span class="material-icons-outlined text-brown">notification_important</span>
            </div>
            <span class="text-primary font-weight-bold"><?php echo $data['no_of_reservations']?></span>
          </div>

          <div class="card">
            <div class="card-inner">
              <p class="text-primary">Total Number of Hotels</p>
              <span class="material-icons-outlined text-blue">hotel</span>
            </div>
            <span class="text-primary font-weight-bold"><?php echo $data['no_of_hotels']?></span>
          </div>

          <div class="card">
            <div class="card-inner">
              <p class="text-primary">Total Number of Decoration Companies</p>
              <span class="material-icons-outlined text-red">celebration</span>
            </div>
            <span class="text-primary font-weight-bold"><?php echo $data['no_of_decos']?></span>
          </div>

          <div class="card">
            <div class="card-inner">
              <p class="text-primary">Total Number of Bands</p>
              <span class="material-icons-outlined text-green">library_music</span>
            </div>
            <span class="text-primary font-weight-bold"><?php echo $data['no_of_bands']?></span>
          </div>

          <div class="card">
            <div class="card-inner">
              <p class="text-primary">Total Number of Photography Companies</p>
              <span class="material-icons-outlined text-orange">photo_camera</span>
            </div>
            <span class="text-primary font-weight-bold"><?php echo $data['no_of_photographies']?></span>
          </div>

        </div>

        <div class="card" style="width:40%; margin: 0 auto;">
            <p class="chart-title">Distribution of Users in the System</p>
            <div class="card-inner">
            <canvas id="myChart" style="width:100%;max-width:600px"></canvas>
            </div>
        </div>

        <br><br>
        

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

<div id="dataContainer1" type="hidden" data-value="{<?php echo $data['no_of_customers'] ?>}"></div>
<div id="dataContainer2" type="hidden" data-value="{<?php echo $data['no_of_service_providers'] ?>}"></div>
<div id="dataContainer3" type="hidden" data-value="{<?php echo $data['no_of_hotels'] ?>}"></div>
<div id="dataContainer4" type="hidden" data-value="{<?php echo $data['no_of_decos'] ?>}"></div>
<div id="dataContainer5" type="hidden" data-value="{<?php echo $data['no_of_bands'] ?>}"></div>
<div id="dataContainer6" type="hidden" data-value="{<?php echo $data['no_of_photographies'] ?>}"></div>


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
        <a href="#"><i class="fa-solid fa-envelope"></i> TruEvent@gmail.com</a>
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