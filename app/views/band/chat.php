<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chat</title>
    <link rel="stylesheet" href="<?php echo URLROOT ?>/public/css/chat-style.css" />
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" />
   <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" />
   <script src="https://kit.fontawesome.com/c02eb7591c.js" crossorigin="anonymous"></script>

   <link rel="stylesheet" href="<?php echo URLROOT ?>/public/css/footer.css" />
   <link rel="shortcut icon" type="image/x-icon" href="./logo/logo.png">
   <title>TruEvent Horizons - ChatBox - Band</title>
</head>
</head>
<body>
<?php require APPROOT . "/views/band/header-band.php" ?>

    <div class="main-container">
        <div class="container">
            <div class="leftSide">
                <!-- Header -->
                <div class="header">
                    <div class="userimg">
                        <img src="<?php echo URLROOT ?>/public/images/images-UI/user.jpg" alt="" class="cover">
                    </div>
                    <ul class="nav_icons">
                        <li><ion-icon name="scan-circle-outline"></ion-icon></li>
                        <li><ion-icon name="chatbox"></ion-icon></li>
                        <li><ion-icon name="ellipsis-vertical"></ion-icon></li>
                    </ul>
                </div>
                <!-- Search Chat -->
                <div class="search_chat">
                    <div>
                        <input type="text" placeholder="Search or start new chat">
                        <ion-icon name="search-outline"></ion-icon> 
                    </div>                
                </div>
                <!-- CHAT LIST -->
                <div class="chatlist">
                    <div class="block active">
                        <div class="imgBox">
                            <img src="<?php echo URLROOT ?>/public/images/images-UI/img1.jpg" class="cover" alt="">
                        </div>
                        <div class="details">
                            <div class="listHead">
                                <h4>Saneru Akaravita</h4>
                                <p class="time">10:56</p>
                            </div>
                            <div class="message_p">
                                <p>How is it going?</p>
                            </div>
                        </div>
                    </div>
    
                    <div class="block unread">
                        <div class="imgBox">
                            <img src="<?php echo URLROOT ?>/public/images/images-UI/img2.jpg" class="cover" alt="">
                        </div>
                        <div class="details">
                            <div class="listHead">
                                <h4>Sadun Perera</h4>
                                <p class="time">12:34</p>
                            </div>
                            <div class="message_p">
                                <p>I love your youtube videos!</p>
                                <b>1</b>
                            </div>
                        </div>
                    </div>
    
                    <div class="block unread">
                        <div class="imgBox">
                            <img src="<?php echo URLROOT ?>/public/images/images-UI/img3.jpg" class="cover" alt="">
                        </div>
                        <div class="details">
                            <div class="listHead">
                                <h4>Harini De Silva</h4>
                                <p class="time">Yesterday</p>
                            </div>
                            <div class="message_p">
                                <p>I just subscribed to your channel</p>
                                <b>2</b>
                            </div>
                        </div>
                    </div>
                    <div class="block">
                        <div class="imgBox">
                            <img src="<?php echo URLROOT ?>/public/images/images-UI/img4.jpg" class="cover" alt="">
                        </div>
                        <div class="details">
                            <div class="listHead">
                                <h4>Amaya Dias</h4>
                                <p class="time">Yesterday</p>
                            </div>
                            <div class="message_p">
                                <p>Hey!</p>                            
                            </div>
                        </div>
                    </div>
                    <div class="block">
                        <div class="imgBox">
                            <img src="<?php echo URLROOT ?>/public/images/images-UI/img7.jpg" class="cover" alt="">
                        </div>
                        <div class="details">
                            <div class="listHead">
                                <h4>Kaveena Perera</h4>
                                <p class="time">18/01/2022</p>
                            </div>
                            <div class="message_p">
                                <p>I'll get back to you</p>
                            </div>
                        </div>
                    </div>
                    <div class="block">
                        <div class="imgBox">
                            <img src="<?php echo URLROOT ?>/public/images/images-UI/img8.jpg" class="cover" alt="">
                        </div>
                        <div class="details">
                            <div class="listHead">
                                <h4>Gimhan Silva</h4>
                                <p class="time">17/01/2022</p>
                            </div>
                            <div class="message_p">
                                <p>Congratulations</p> 
                            </div>
                        </div>
                    </div>
                    <div class="block">
                        <div class="imgBox">
                            <img src="<?php echo URLROOT ?>/public/images/images-UI/img9.jpg" class="cover" alt="">
                        </div>
                        <div class="details">
                            <div class="listHead">
                                <h4>Saduni Hansika</h4>
                                <p class="time">15/01/2022</p>
                            </div>
                            <div class="message_p">
                                <p>Thanks alot</p>
                            </div>
                        </div>
                    </div>
                    <div class="block">
                        <div class="imgBox">
                            <img src="<?php echo URLROOT ?>/public/images/images-UI/img5.jpg" class="cover" alt="">
                        </div>
                        <div class="details">
                            <div class="listHead">
                                <h4>Devin Jayasooriya</h4>
                                <p class="time">Yesterday</p>
                            </div>
                            <div class="message_p">
                                <p>Did you finish the project?</p>
                            </div>
                        </div>
                    </div>
                    <div class="block">
                        <div class="imgBox">
                            <img src="<?php echo URLROOT ?>/public/images/images-UI/img6.jpg" class="cover" alt="">
                        </div>
                        <div class="details">
                            <div class="listHead">
                                <h4>Pasan Bandara</h4>
                                <p class="time">18/01/2022</p>
                            </div>
                            <div class="message_p">
                                <p>Nice course</p>
                            </div>
                        </div>
                    </div>
                    <div class="block">
                        <div class="imgBox">
                            <img src="<?php echo URLROOT ?>/public/images/images-UI/img7.jpg" class="cover" alt="">
                        </div>
                        <div class="details">
                            <div class="listHead">
                                <h4>Michel Jay</h4>
                                <p class="time">18/01/2022</p>
                            </div>
                            <div class="message_p">
                                <p>I'll get back to you</p>
                            </div>
                        </div>
                    </div>
                    <div class="block">
                        <div class="imgBox">
                            <img src="<?php echo URLROOT ?>/public/images/images-UI/img8.jpg" class="cover" alt="">
                        </div>
                        <div class="details">
                            <div class="listHead">
                                <h4>Kaveen Pathirana</h4>
                                <p class="time">17/01/2022</p>
                            </div>
                            <div class="message_p">
                                <p>Congratulations</p> 
                            </div>
                        </div>
                    </div>
                    <div class="block">
                        <div class="imgBox">
                            <img src="<?php echo URLROOT ?>/public/images/images-UI/img9.jpg" class="cover" alt="">
                        </div>
                        <div class="details">
                            <div class="listHead">
                                <h4>Kalani Dias</h4>
                                <p class="time">15/01/2022</p>
                            </div>
                            <div class="message_p">
                                <p>Thanks alot</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="rightSide">
                <div class="header">
                    <div class="imgText">
                        <div class="userimg">
                            <img src="<?php echo URLROOT ?>/public/images/images-UI/img1.jpg" alt="" class="cover">
                        </div>
                        <h4>Saneru Akaravita <br><span>online</span></h4>
                    </div>
                    <ul class="nav_icons">
                        <li><ion-icon name="search-outline"></ion-icon></li>
                        <li><ion-icon name="ellipsis-vertical"></ion-icon></li>
                    </ul>
                </div>
    
                <!-- CHAT-BOX -->
                <div class="chatbox">
                    <div class="message my_msg">
                        <p>Hi <br><span>12:18</span></p>
                    </div>
                    <div class="message friend_msg">
                        <p>Hey <br><span>12:18</span></p>
                    </div>
                    <div class="message my_msg">
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. <br><span>12:15</span></p>
                    </div>
                    <div class="message friend_msg">
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. <br><span>12:15</span></p>
                    </div>
                    <div class="message my_msg">
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Lorem ipsum dolor sit amet consectetur adipisicing elit. Eaque aliquid fugiat accusamus dolore qui vitae ratione optio sunt <br><span>12:15</span></p>
                    </div>
                    <div class="message friend_msg">
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. <br><span>12:15</span></p>
                    </div>
                    <div class="message my_msg">
                        <p>Lorem ipsum dolor sit amet consectetur <br><span>12:15</span></p>
                    </div>
                    <div class="message friend_msg">
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.<br><span>12:15</span></p>
                    </div>
                    <div class="message my_msg">
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.<br><span>12:15</span></p>
                    </div>
                    <div class="message friend_msg">
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.<br><span>12:15</span></p>
                    </div>
                    <div class="message my_msg">
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.<br><span>12:15</span></p>
                    </div>
                    <div class="message friend_msg">
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.<br><span>12:15</span></p>
                    </div>
                    <div class="message my_msg">
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.<br><span>12:15</span></p>
                    </div>
                    <div class="message friend_msg">
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.<br><span>12:15</span></p>
                    </div>
                    <div class="message my_msg">
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.<br><span>12:15</span></p>
                    </div>
                    <div class="message friend_msg">
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.<br><span>12:15</span></p>
                    </div>
                </div>
                
                <!-- CHAT INPUT -->
                <div class="chat_input">
                    <ion-icon name="happy-outline"></ion-icon>
                    <!-- <ion-icon name="happy-outline"></ion-icon> -->
                    <input type="text" placeholder="Type a message">
                    <ion-icon name="mic"></ion-icon>
                    <ion-icon name="send-outline"></ion-icon>
    
                </div>
            </div>
        </div>
    
    
        <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    </div>


      <!-- footer start -->
      <section class="footer">
        <div class="overlay"></div>
        <div class="box-container">
            <div class="box">
                <h3>Quick Access</h3>
            <a href="admin-home.php"><i class="fas fa-angle-right"></i>  Home</a>
            <a href="packages.php"><i class="fas fa-angle-right"></i> Packages</a>
            <a href="admin-add-packages.php"><i class="fas fa-angle-right"></i> Services</a>
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
            Created By <span>TruEvent Horizon</span> | All Rights Reserved
        </div>
    
    </section>
    
    
    <!-- footer ends -->

</body>
<script src="<?php echo URLROOT ?>/public/js/band/bandscript.js"></script>

</html>