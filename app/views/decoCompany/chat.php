<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- font awesome cdn link -->
    <link rel="stylesheet" href=<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="<?php echo URLROOT ?>/public/css/chat-style.css" />
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" />
    <script src="https://kit.fontawesome.com/c02eb7591c.js" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="<?php echo URLROOT ?>/public/css/footer.css" />
    <link rel="shortcut icon" type="image/x-icon" href="./logo/logo.png">
    <title>Deco - Chat</title>
    <!-- custom css file link -->
    <link rel="stylesheet" href="<?php echo URLROOT ?>/public/css/chat/style.css">
    <link rel="stylesheet" href="<?php echo URLROOT ?>/public/css/admin/admin-add-reservation-style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"/>

</head>
<body>
<?php require APPROOT . "/views/decoCompany/header-deco.php" ?>

<div class="chat_div">
        <div class="chat_wrapper"style="margin-top:75px;margin-bottom:50px;">
            <section class="chat-area">
            <header>
                <a href="chat" class="back-icon"><i class="fas fa-arrow-left"></i></a>
                
                <?php echo "<img src = '".URLROOT."/public/images/profilepic.png'>";?>
                <div class="chat_details">
                <span><?php echo $data->fname. " " . $data->lname ?></span>
                <p><?php echo $data->status; ?></p>
                </div>
            </header>
            <div class="chat-box">

            </div>
            <!-- <form action="#" class="typing-area">
                <input type="text" class="incoming_id" name="incoming_id" value="<?php echo $_GET['user_id']; ?>" hidden>
                <input type="text" name="message" class="input-field" placeholder="Type a message here..." autocomplete="off">
                <button><i class="fab fa-telegram-plane"></i></button>
            </form> -->
            <form action="#" class="typing-area">
                <input type="text" class="chat_user_id" name="chat_user_id" value="<?= $_SESSION['unique_id'] ?>" hidden>
                <input type="text" class="incoming_id" name="incoming_id" value="<?= $_GET['user_id'] ?>" hidden>
                <input type="text" name="message" class="input-field" placeholder="Type a message here..."
                    autocomplete="off">
                <button class="btn-send"><i class="fab fa-telegram-plane"></i></button>
            </form>
            </section>
        </div>
        
    </div>

      <!-- footer start -->
      <section class="footer">
        <div class="overlay"></div>
        <div class="box-container">
            <div class="box">
                <h3>Quick Access</h3>
            <a href="admin-home.php"><i class="fas fa-angle-right"></i>  Home</a>
            <a href="packages.php"><i class="fas fa-angle-right"></i> Packages</a>
            <a href="admin-add-packages.php"><i class="fas fa-angle-right"></i> Add Packages</a>
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
            Created By <span>TruEvent Horizon</span> | All Rights Reserved
        </div>
    
    </section>
    
    
    <!-- footer ends -->

</body>
<script src="<?php echo URLROOT ?>/public/js/admin/adminscript.js"></script>
<script src="<?php echo URLROOT ?>/public/js/chat/chat.js"></script>

</html>