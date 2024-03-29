<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo URLROOT ?>/public/css/hotel manager/style1.css">
    <title>TruEvent Horizons - Home Page - Hotel</title>

        <!-- font awesome cdn link -->
        
        <link rel="stylesheet" href=<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        

</head>
<body>
    <!-- header section starts -->
<?php require APPROOT . "/views/hotelManager/header-hotel.php" ?>
    <!-- header section ends -->


        <button id="menu-btn" class="fas fa-bars"></button>

        <!-- home section starts -->
<section class="home">
    <a class="prev" onclick="plusSlides(-1)">❮</a>
    <a class="next" onclick="plusSlides(1)">❯</a>
    <div class="swiper home-slider">
        <div class="swiper-wrapper">
            <div class="swiper-slide slide" style="background:url(<?php echo URLROOT ?>/public/images/hotel\ manager/figma\ images/hotel3-homepage.jpeg) no-repeat">
                <div class="content">
                    <span>Exclusive Events,Priceless Memories</span>
                    <h3>Celebrate</h3>
                </div>     
            </div>

            <div class="swiper-slide slide hidden" style="background:url(<?php echo URLROOT ?>/public/images/hotel\ manager/figma\ images/hotel1-homepage.jpeg) no-repeat; display:none;">
                <div class="content">
                <span>Exclusive Events,Priceless Memories</span>
                <h3>Discover</h3>
                </div>
            </div>
    
            <div class="swiper-slide slide hidden" style="background:url(<?php echo URLROOT ?>/public/images/hotel\ manager/figma\ images/hotel2-homepage.jpeg) no-repeat; display:none;">
                    <div class="content">
                    <span>Exclusive Events,Priceless Memories</span>
                    <h3>Make your event Memorable</h3>
            </div>
        </div>
    </div>
</div>
 
<div class="swiper-button-next"></div>
<div class="swiper-button-prev"></div>


</div>
</section>



<!-- <-------------------------------------------------------Service Provider Calender End-------------------------------------------------------> 

<!-- <-------------------------------------------------------Home Page Services Start------------------------------------------------------->   
<section class="home-packages">
    <h1 class="heading-title">My Services</h1>

    <div class="box-container">

        <div class="box">
            <div class="image">
                <img src="<?php echo URLROOT ?>/public/images/hotel manager/figma images/anniversary - hotel.jpg" alt="Anniversary Celebration pic">
            </div>
            <div class="content">
                <h3>Special For Anniversary Parties</h3>
                <a href="viewservices" class="btn" style="margin-top:30px;">View All Services</a>
            </div>
        </div>

            <div class="box">
                <div class="image">
                    <img src="<?php echo URLROOT ?>/public/images/hotel manager/figma images/bdy - hotel.jpg" alt="Birthday Party pic">
                </div>
                <div class="content">
                    <h3>Special For Birthday Parties</h3>
                    <a href="viewservices" class="btn" style="margin-top:30px;">View All Services</a>
                </div>
            </div>

            <div class="box">
                <div class="image">
                    <img src="<?php echo URLROOT ?>/public/images/hotel manager/figma images/get-togathers-hotel.jpg" alt="Get-Together pic">
                </div>
                <div class="content">
                    <h3>For Special Get-Together Parties</h3>
                    <a href="viewservices" class="btn" style="margin-top:30px;">View All Services</a>
                </div>
            </div>

            <div class="box">
                <div class="image">
                    <img src="<?php echo URLROOT ?>/public/images/hotel manager/figma images/night - hotel.jpg" alt="Get-Together pic">
                </div>
                <div class="content">
                    <h3>For Special Corporate Parties</h3>
                    <a href="viewservices" class="btn" style="margin-top:30px;">View All Services</a>
                </div>
            </div>
        
    </div>
    <div class="load-more"> <a href="viewservices" class="btn">load more</a></div>
</section>

<!-- <-------------------------------------------------------Home Page Services End-------------------------------------------------------> 

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
    <script src="<?php echo URLROOT ?>/public/js/hotel manager/hotelscript.js"></script>
</body>
</html>