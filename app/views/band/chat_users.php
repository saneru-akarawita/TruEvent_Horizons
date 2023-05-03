<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo URLROOT ?>/public/css/deco company/serviceslist.css">
    <link rel="stylesheet" href="<?php echo URLROOT ?>/public/css/chat-style.css" />
    
    <!-- font awesome cdn link -->
    <link rel="stylesheet" href=<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- font awesome cdn link -->
    <link rel="stylesheet" href=<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" />
    <link rel="stylesheet" href="<?php echo URLROOT ?>/public/css/chat/style.css">
    <script src="https://kit.fontawesome.com/c02eb7591c.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="<?php echo URLROOT ?>/public/css/footer.css" />
    <link rel="shortcut icon" type="image/x-icon" href="./logo/logo.png">
    <title>TruEvent Horizons - Chat - Band</title>

</head>
<body>
<?php require APPROOT . "/views/band/header-band.php" ?>

<?php if(!empty($data->img)){
        $userAvatar = $data->img;
    }else{
        $userAvatar = 'profilepic.png';
    }?>

        <!-- Gives a Menu Button -->
        <button id="menu-btn" class="fas fa-bars"></button>

        <!-- chat Section starts -->
        <div class ="chat_div">
        <div class="chat_wrapper">
            <section class="chat_users">
                <header>
                    <div class="chat_content">

                    <!-- <img src="php/images/<?php echo $data->img; ?>" alt=""> -->
                    <?php echo "<img src = '".URLROOT."/public/images/uploadimages/profilepic/".$userAvatar."'>";?>
                    <div class="chat_details">
                        <span><?php echo $data->fname. " " . $data->lname ?></span>
                        <p style="font-size:13px"><?php echo $data->status; ?></p>
                    </div>
                    </div>
                    <!-- <a href="php/logout.php?logout_id=<?php echo $data->unique_id; ?>" class="logout">Logout</a> -->
                </header>
                <div class="chat_search">
                    <span class="chat_text">Select an user to start chat</span>
                    <input type="text" name="keyword" id="keyword" placeholder="Enter name to search...">
                    <button class="chat_button"><i class="fas fa-search"></i></button>
                </div>
                <div class="chat_users-list">
            
                </div>
            </section>
        </div>
        </div>


        <!-- Packages Section Ends -->

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
            <!-- <script src="<?php echo URLROOT ?>/public/js/admin/adminscript.js"></script> -->
            <script src="<?php echo URLROOT ?>/public/js/chat/users.js"></script>

</body>
</html>
