<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TruEvent Horizons - Add Services - Deco Company</title>
    <link rel="stylesheet" href="<?php echo URLROOT ?>/public/css/deco company/addservice.css">

    <!-- font awesome cdn link -->
    <link rel="stylesheet" href=<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>

            <!-- header section starts -->
            <section class="header">
                <img src="<?php echo URLROOT ?>/public/images/deco company/logo/logo.jpg" alt="logo" class="logo">
                <a href="home" class="dashboard">Dashboard</a>
            
                <nav class="navbar">
                    <a href="home">Home</a>
                    <a href="viewservices">Services</a>
                    <a href="addservices">Add Services</a>
                    <a href="logout">Logout</a>
                </nav>
            
                <!-- Gives a Menu Button -->
                <button id="menu-btn" class="fas fa-bars"></button>
            
            
                </section>

        <div class="container">
        
            <div class="title1">
                ADD SERVICE
            </div>
            <form action="<?php echo URLROOT; ?>/decoService/addNewService" method="post">
                <div class="userDetails">
                    <input type="text" placeholder="Name" name="service_name" id="service_name" required>
                    <span class="error"><?php echo $data['name_error']; ?></span>
                </div>
                <div class="userDetails">
                    <textarea name="description" id="description" placeholder="Description" cols="30" rows="10"></textarea>
                    <span class="error"><?php echo $data['description_error']; ?></span>
                </div>
                <div class="userDetails">
                    <input type="text" placeholder="Occasion" name="occasion" id="occasion" required>
                    <span class="error"><?php echo $data['occasion_error']; ?></span>
                </div>
                <div class="userDetails">
                    <input type="text" placeholder="Theme" name="theme" id="theme" required>
                    <span class="error"><?php echo $data['theme_error']; ?></span>
                </div>
                <div class="userDetails">
                    <input type="text" placeholder="Price" name="price" id="price" required>
                    <span class="error"><?php echo $data['price_error']; ?></span>
                </div>
                <div class="button">
                    <button type="submit" name="action" value="addservice" class="btn btn-filled btn-theme-purple" style="display:block; margin: 0 auto; border-radius:15px">Add Service</button>
                </div>
            </form>
        </div>


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
        <a href="#"><i class="fas fa-angle-right"></i>  About Us</a>
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
    

    <script src="<?php echo URLROOT ?>/public/js/deco company/decoscript.js"></script>
</body>
</html>