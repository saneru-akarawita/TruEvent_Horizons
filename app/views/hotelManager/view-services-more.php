<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo URLROOT ?>/public/css/hotel manager/style1.css">
    <title>View Services</title>

        <!-- font awesome cdn link -->
        <link rel="stylesheet" href=<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>
<body>
<?php require APPROOT . "/views/hotelManager/header-hotel.php" ?>
    <!-- header section starts -->
    <!-- <section class="header">
        <img src="<?php echo URLROOT ?>/public/images/hotel manager/figma images/logo designs/logo2.jpg" alt="logo" class="logo">
        <a href="home" class="dashboard">Decoration</a>
    
        <nav class="navbar">
            <a href="home">Home</a>
            <a href="viewservices">Venues</a>
            <a href="addservices">Add Venues</a>
            <a href="logout">Logout</a>
        </nav> -->
    
        <!-- Gives a Menu Button -->
        <button id="menu-btn" class="fas fa-bars"></button>
    
    
        <!-- </section> -->


        <!-- home section starts -->
<section class="home">
    <a class="prev" onclick="plusSlides(-1)">❮</a>
    <a class="next" onclick="plusSlides(1)">❯</a>
    <div class="swiper home-slider">
        <div class="swiper-wrapper">
            <div class="swiper-slide slide" style="background:url(<?php echo URLROOT ?>/public/images/hotel\ manager/figma\ images/hotel2-viewservices.jpg) no-repeat">
                <div class="content">
                    <span>Exclusive Events,Priceless Memories</span>
                    <h3>Celebrate</h3>
                </div>     
            </div>

            <div class="swiper-slide slide hidden" style="background:url(<?php echo URLROOT ?>/public/images/hotel\ manager/figma\ images/hotel1-viewservices.jpg) no-repeat; display:none;">
                <div class="content">
                <span>Exclusive Events,Priceless Memories</span>
                <h3>Discover</h3>
                </div>
            </div>
    
            <div class="swiper-slide slide hidden" style="background:url(<?php echo URLROOT ?>/public/images/hotel\ manager/figma\ images/hotel3-viewservices.jpg) no-repeat; display:none;">
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

<!-- <-------------------------------------------------------View Services More Start------------------------------------------------------->   
<section class="home-packages">
    <h1 class="heading-title">Your Available Venues</h1>

    <div class="box-container">
        <?php foreach ($data as $hsDetails) : ?>
            <?php if($hsDetails->active == 1) {?>
            <div class="box" style="height: 400px;">
                <div class="image">

                <?php $directory = getcwd()."/images/hotel manager/services/$hsDetails->service_type/";
                    $files1 = scandir($directory);
                    $num_files = count($files1) - 2;
                ?>
                    <?php echo "<img src = '".URLROOT."/public/images/hotel manager/services/$hsDetails->service_type/" . rand(1,4)%$num_files +1 . ".jpg'>";?>
                </div>
                <div class="content">
                    <h3 style="font-size:medium">Ideal for <?= $hsDetails->service_type; ?> </h3>
                    <p style="font-size:small" >Starting from   <?= $hsDetails->price; ?> LKR </p><br>
                    <button class="viewButton" style="margin-left:-4px; height:40px"><a href="viewEachService?service_id=<?=$hsDetails->service_id; ?>" name="viewaction" value="view" style="color:white; font-weight:550;">View</a></button>
                    <button class="editButton" style="height:40px"><a href="editService?service_id=<?=$hsDetails->service_id; ?>" name="editaction" value="edit" style="color:white; font-weight:550;">Edit</a></button>
                    <button class="deleteButton" style="height:40px;"><a href="deactivate?service_id=<?=$hsDetails->service_id; ?>" name="deleteaction" value="delete" style="color:white; font-weight:550;">Disable</a></button>
                </div>
            </div>
            <?php } else { ?>
                <div class="box" style="height: 400px;">
                <div class="image">
                    <?php echo "<img src = '".URLROOT."/public/images/disable". ".jpg'>";?>
                </div>
                <div class="content">
                    <h3 style="font-size:medium">Ideal for <?= $hsDetails->service_type; ?> </h3>
                    <p style="font-size:small" >Starting from   <?= $hsDetails->price; ?> LKR </p><br>
                    
                    <button class="viewButton" style="height:40px"><a href="activate?service_id=<?=$hsDetails->service_id; ?>" name="enableaction" value="enable" style="color:white; font-weight:550;">Enable</a></button>
                    <button class="deleteButton" style="height:40px;"><a href="deleteService?service_id=<?=$hsDetails->service_id; ?>" name="deleteaction" value="delete" style="color:white; font-weight:550;">Delete</a></button>
                </div>
            </div>
            <?php }?>
        <?php endforeach; ?>

                
    </div>
</section>

<!-- <-------------------------------------------------------View Services More End------------------------------------------------------->   


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