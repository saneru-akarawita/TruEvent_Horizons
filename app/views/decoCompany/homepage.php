<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo URLROOT ?>/public/css/deco company/homepage.css">
    <title>Home</title>

        <!-- font awesome cdn link -->
        <link rel="stylesheet" href=<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>
<body>
<?php require APPROOT . "/views/decoCompany/header-deco.php" ?>

    <!-- header section starts -->
    <!-- <section class="header">
        <img src="<?php echo URLROOT ?>/public/images/deco company/logo/logo.jpg" alt="logo" class="logo">
        <a href="home" class="dashboard">Decoration</a>
    
        <nav class="navbar">
            <a href="home">Home</a>
            <a href="viewservices">Services</a>
            <a href="addservices">Add Services</a>
            <a href="logout">Logout</a>
        </nav>
     -->
        <!-- Gives a Menu Button -->
        <button id="menu-btn" class="fas fa-bars"></button>
    
    
        <!-- </section> -->


        <!-- home section starts -->
<section class="home">
    <a class="prev" onclick="plusSlides(-1)">❮</a>
    <a class="next" onclick="plusSlides(1)">❯</a>
    <div class="swiper home-slider">
        <div class="swiper-wrapper">
            <div class="swiper-slide slide" style="background:url(<?php echo URLROOT ?>/public/images/deco\ company/deco-add-services/deco1.jpg) no-repeat">
                <div class="content">
                <span>Exclusive Events,Priceless Memories</span>
                <h3>Make Your Event More Beautiful</h3>
                </div>     
            </div>

            <div class="swiper-slide slide hidden" style="background:url(<?php echo URLROOT ?>/public/images/deco\ company/deco-add-services/image2.jpg) no-repeat; display:none;">
                <div class="content">
                <span>Exclusive Events,Priceless Memories</span>
                <h3>Discover</h3>
                <!-- <a href="viewservices" class="btn">View Services</a> -->
                </div>
            </div>
    
            <div class="swiper-slide slide hidden" style="background:url(<?php echo URLROOT ?>/public/images/deco\ company/deco-add-services/image3.jpg) no-repeat; display:none;">
                    <div class="content">
                    <span>Exclusive Events,Priceless Memories</span>
                    <h3>Make your event Memorable</h3>
                    <!-- <a href="viewservices" class="btn">View Services</a> -->
            </div>
        </div>
    </div>
</div>
 
<div class="swiper-button-next"></div>
<div class="swiper-button-prev"></div>


</div>
</section>

<!-- Home Package Section  starts -->
<!-- <section class="home-packages">
    <h1 class="heading-title">Our Packages</h1>

    <div class="box-container">
        <div class="box">
            <div class="image">
                <img src="images/admin-add-packages/image4.jpg" alt="">
            </div>
            <div class="content">
                <h3>Anniversary Package</h3>
                <p>Plan your anniversary</p>
                <p style="font: size 5rem;color: var(--black);">$750</p>
                <a href="packages.php" class="btn">View Package</a>
            </div>
        </div>


        <div class="box">
            <div class="image">
                <img src="images/admin-add-packages/image5.jpg" alt="">
            </div>
            <div class="content">
                <h3>Birthdy Package</h3>
                <p>Enjoy your birthdays</p>
                <p style="font: size 5rem;color: var(--black);">$850</p>
                <a href="packages.php" class="btn">View Package</a>
            </div>
        </div>


        <div class="box">
            <div class="image">
                <img src="images/admin-add-packages/image6.jpg" alt="">
            </div>
            <div class="content">
                <h3>Fair Wells Package</h3>
                <p>Have Fun</p>
                <p style="font: size 5rem;color: var(--black);">$550</p>
                <a href="packages.php" class="btn">View Package</a>
            </div>
        </div>


    </div>

    </div>

    

    <div class="load-more"> <a href="packages.php" class="btn">load more</a></div>
</section> -->

<!-- Home Package Section Ends -->


<section class="home-packages">

    <h1 class="heading-title">Your Decorations</h1>


    <div class="box-container">
        <div class="box">
            <div class="image">
                <img src="<?php echo URLROOT ?>/public/images/deco company/deco-add-services/deco2.jpg" alt="">
            </div>
            <div class="content">
                <h3>Special For Birthday Parties</h3>
                <p>Colourful</p>
                <!-- <p style="font: size 5rem;color: var(--black);">Rs. 7500</p> -->

                <a href="viewservices" class="btn">View All Services</a>

            </div>
        </div>


        <div class="box">
            <div class="image">
                <img src="<?php echo URLROOT ?>/public/images/deco company/deco-add-services/deco3.jpg" alt="">
            </div>
            <div class="content">
                <h3>For Special Night Functions</h3>
                <p>Christmas</p>
                <!-- <p style="font: size 5rem;color: var(--black);">Rs. 8500</p> -->

                <a href="viewservices" class="btn">View All Services</a>


            </div>
        </div>


        <div class="box">
            <div class="image">
                <img src="<?php echo URLROOT ?>/public/images/deco company/deco-add-services/deco4.jpg" alt="">
            </div>
            <div class="content">
                <h3>For Special Anniversary Parties</h3>
                <p>Have Fun</p>
                <!-- <p style="font: size 5rem;color: var(--black);">Rs. 5500</p> -->

                <a href="viewservices" class="btn">View All Services</a>

            </div>
        </div>


    </div>

    </div>

    

    <div class="load-more"> <a href="viewservices" class="btn">load more</a></div>
</section>


        <!-- footer start -->
        <section class="footer">
            <div class="overlay"></div>
            <div class="box-container">
                <div class="box">
                    <h3>Quick Access</h3>
                <a href="home"><i class="fas fa-angle-right"></i>  Home</a>
                <a href="viewservices"><i class="fas fa-angle-right"></i> Services</a>
                <a href="addservices"><i class="fas fa-angle-right"></i> Add Services</a>
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
    <script src="<?php echo URLROOT ?>/public/js/deco company/decoscript.js"></script>
</body>
</html>