<html>
<head>
    <!-- font awesome cdn link -->
    <link rel="stylesheet" href=<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" href="<?php echo URLROOT ?>/public/css/payment/styles-hotel.css" />
    <link rel="stylesheet" href="<?php echo URLROOT ?>/public/css/payment/style.css" />
    <link rel="stylesheet" href="<?php echo URLROOT ?>/public/css/payment/customer.css" />
    <link rel="stylesheet" href="<?php echo URLROOT ?>/public/css/payment/stylepayments.css" />
    <link rel="stylesheet" href="<?php echo URLROOT ?>/public/css/footer.css" />

   

        <!-- <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" />
        <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" />
         -->
<script>
 function change_tab(id)
 {
   document.getElementById("page_content").innerHTML=document.getElementById(id+"_desc").innerHTML;
   document.getElementById("page1").className="notselected";
   document.getElementById("page2").className="notselected";

   document.getElementById(id).className="selected";
 }
</script>
</head>
<body>
<?php require APPROOT . "/views/customer/header-customer.php" ?>


<div id="main_content">

<div id="li-list" style="margin-left:35px;">
    <li class="selected" id="page1" onclick="change_tab(this.id);">Pending Payments</li>
    <li class="notselected" id="page2" onclick="change_tab(this.id);">Complete Payments</li>
</div>
 
 <div class='hidden_desc' id="page1_desc">
 
        <!-- Main Start -->

        <main class="main">
                <div class="wrapper">
    
    
                    <div class="hero">
                        <div class="hero-heading">
                            <!-- <h3>Payments</h3> -->
                            <!-- <span>Pending| 11 Dec,2022</span> -->
                        </div>
    
    
                        <div class="hero-search">
                            <div class="input-group">
                                <!-- <input type="text" name="" id=""> -->
                                <!-- <i class="i.bx.bx-search"></i> -->
                            </div>
    
                            <span>Filter <i class="bx bx-filter-alt"></i> </span>
                        </div>
    
    
                        <div class="hero-heading">
                            <h3>Pending Payments <i class="bx bx-chevron-down"></i> </h3>
                        </div>
    
    
                        <div class="project">
    
                            <div class="col">
                                <div class="project-card">
                                    <main class="order__summary">
                                        <!-- div for hero image -->
                                        <div class="order__summary-image">
                                            <img src="<?php echo URLROOT ?>/public/images/payment.gif " aria-hidden="true" alt="hero" />
                                        </div>
                                        <!-- Main content start -->
                                        <h1>Order Summary</h1>
                                        <p class="description">
                                            You can now listen to millions of songs, audiobooks, and podcasts on any
                                            device anywhere you like!
                                        </p>
    
    
    
                                        <!-- div for order plan -->
                                        <div class="order__summary-plan">
                                            <img src="<?php echo URLROOT ?>/public/images/money-icon.png" aria-hidden="true" alt="music" />
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
                                        <img src="<?php echo URLROOT ?>/public/images/payment.gif " aria-hidden="true" alt="hero" />

                                        </div>
                                        <!-- Main content start -->
                                        <h1>Order Summary</h1>
                                        <p class="description">
                                            You can now listen to millions of songs, audiobooks, and podcasts on any
                                            device anywhere you like!
                                        </p>
    
    
    
                                        <!-- div for order plan -->
                                        <div class="order__summary-plan">
                                            <img src="<?php echo URLROOT ?>/public/images/money-icon.png" aria-hidden="true" alt="music" />
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
                                        <img src="<?php echo URLROOT ?>/public/images/payment.gif " aria-hidden="true" alt="hero" />
                                            
                                        </div>
                                        <!-- Main content start -->
                                        <h1>Order Summary</h1>
                                        <p class="description">
                                            You can now listen to millions of songs, audiobooks, and podcasts on any
                                            device anywhere you like!
                                        </p>
    
    
    
                                        <!-- div for order plan -->
                                        <div class="order__summary-plan">
                                            <img src="<?php echo URLROOT ?>/public/images/money-icon.png" aria-hidden="true" alt="music" />
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
                                        <img src="<?php echo URLROOT ?>/public/images/payment.gif " aria-hidden="true" alt="hero" />
                                            
                                        </div>
                                        <!-- Main content start -->
                                        <h1>Order Summary</h1>
                                        <p class="description">
                                            You can now listen to millions of songs, audiobooks, and podcasts on any
                                            device anywhere you like!
                                        </p>
    
    
    
                                        <!-- div for order plan -->
                                        <div class="order__summary-plan">
                                            <img src="<?php echo URLROOT ?>/public/images/money-icon.png" aria-hidden="true" alt="music" />
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
                                        <img src="<?php echo URLROOT ?>/public/images/payment.gif " aria-hidden="true" alt="hero" />
                                            
                                        </div>
                                        <!-- Main content start -->
                                        <h1>Order Summary</h1>
                                        <p class="description">
                                            You can now listen to millions of songs, audiobooks, and podcasts on any
                                            device anywhere you like!
                                        </p>
    
    
                                        <!-- div for order plan -->
                                        <div class="order__summary-plan">
                                            <img src="<?php echo URLROOT ?>/public/images/money-icon.png" aria-hidden="true" alt="music" />
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
            
 </div>

 <div class='hidden_desc' id="page2_desc">
    <!-- Main Start -->

        <main class="main">
                <div class="wrapper">
    
    
                    <div class="hero">
                        <div class="hero-heading">
                            <!-- <h3>Payments</h3> -->
                            <!-- <span>Pending| 11 Dec,2022</span> -->
                        </div>
    
    
                        <div class="hero-search">
                            <div class="input-group">
                                <!-- <input type="text" name="" id=""> -->
                                <!-- <i class="i.bx.bx-search"></i> -->
                            </div>
    
                            <!-- <span>Filter <i class="bx bx-filter-alt"></i> </span> -->
                        </div>
    
    
                        <div class="hero-heading">
                            <h3>Complete Payments <i class="bx bx-chevron-down"></i> </h3>
                        </div>
    
    
                        <div class="project">
    
                            <div class="col">
                                <div class="project-card">
                                    <main class="order__summary">
                                        <!-- div for hero image -->
                                        <div class="order__summary-image">
                                        <img src="<?php echo URLROOT ?>/public/images/payment.gif " aria-hidden="true" alt="hero" />
                                            
                                        </div>
                                        <!-- Main content start -->
                                        <h1>Order Summary</h1>
                                        <p class="description">
                                            You can now listen to millions of songs, audiobooks, and podcasts on any
                                            device anywhere you like!
                                        </p>
    
    
    
                                        <!-- div for order plan -->
                                        <div class="order__summary-plan">
                                            <img src="<?php echo URLROOT ?>/public/images/money-icon.png" aria-hidden="true" alt="music" />
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
                                        <img src="<?php echo URLROOT ?>/public/images/payment.gif " aria-hidden="true" alt="hero" />
                                            
                                        </div>
                                        <!-- Main content start -->
                                        <h1>Order Summary</h1>
                                        <p class="description">
                                            You can now listen to millions of songs, audiobooks, and podcasts on any
                                            device anywhere you like!
                                        </p>
    
    
    
                                        <!-- div for order plan -->
                                        <div class="order__summary-plan">
                                            <img src="<?php echo URLROOT ?>/public/images/money-icon.png" aria-hidden="true" alt="music" />
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
                                        <img src="<?php echo URLROOT ?>/public/images/payment.gif " aria-hidden="true" alt="hero" />
                                            
                                        </div>
                                        <!-- Main content start -->
                                        <h1>Order Summary</h1>
                                        <p class="description">
                                            You can now listen to millions of songs, audiobooks, and podcasts on any
                                            device anywhere you like!
                                        </p>
    
    
    
                                        <!-- div for order plan -->
                                        <div class="order__summary-plan">
                                            <img src="<?php echo URLROOT ?>/public/images/money-icon.png" aria-hidden="true" alt="music" />
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
                                        <img src="<?php echo URLROOT ?>/public/images/payment.gif " aria-hidden="true" alt="hero" />
                                            
                                        </div>
                                        <!-- Main content start -->
                                        <h1>Order Summary</h1>
                                        <p class="description">
                                            You can now listen to millions of songs, audiobooks, and podcasts on any
                                            device anywhere you like!
                                        </p>
    
    
    
                                        <!-- div for order plan -->
                                        <div class="order__summary-plan">
                                            <img src="<?php echo URLROOT ?>/public/images/money-icon.png" aria-hidden="true" alt="music" />
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
                                        <img src="<?php echo URLROOT ?>/public/images/payment.gif" aria-hidden="true" alt="hero" />
                                            
                                        </div>
                                        <!-- Main content start -->
                                        <h1>Order Summary</h1>
                                        <p class="description">
                                            You can now listen to millions of songs, audiobooks, and podcasts on any
                                            device anywhere you like!
                                        </p>
    
    
                                        <!-- div for order plan -->
                                        <div class="order__summary-plan">
                                            <img src="<?php echo URLROOT ?>/public/images/money-icon.png" aria-hidden="true" alt="music" />
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
 </div>
 

 <div id="page_content">
     <!-- Main Start -->

     <main class="main">
        <div class="wrapper">


            <div class="hero">
                <div class="hero-heading">
                    <!-- <h3>Payments</h3> -->
                    <!-- <span>Pending| 11 Dec,2022</span> -->
                </div>


                <div class="hero-search">
                    <div class="input-group">
                        <!-- <input type="text" name="" id=""> -->
                        <!-- <i class="i.bx.bx-search"></i> -->
                    </div>

                    <!-- <span>Filter <i class="bx bx-filter-alt"></i> </span> -->
                </div>


                <div class="hero-heading">
                    <h3>Pending Payments <i class="bx bx-chevron-down"></i> </h3>
                </div>


                <div class="project">

                    <div class="col">
                        <div class="project-card">
                            <main class="order__summary">
                                <!-- div for hero image -->
                                <div class="order__summary-image">
                                    <img src="<?php echo URLROOT ?>/public/images/payment.gif" aria-hidden="true" alt="hero" />
                                </div>
                                <!-- Main content start -->
                                <h1>Order Summary</h1>
                                <p class="description">
                                    You can now listen to millions of songs, audiobooks, and podcasts on any
                                    device anywhere you like!
                                </p>



                                <!-- div for order plan -->
                                <div class="order__summary-plan">
                                    <img src="<?php echo URLROOT ?>/public/images/money-icon.png" aria-hidden="true" alt="music" />
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
                                    <img src="<?php echo URLROOT ?>/public/images/payment.gif" aria-hidden="true" alt="hero" />
                                </div>
                                <!-- Main content start -->
                                <h1>Order Summary</h1>
                                <p class="description">
                                    You can now listen to millions of songs, audiobooks, and podcasts on any
                                    device anywhere you like!
                                </p>



                                <!-- div for order plan -->
                                <div class="order__summary-plan">
                                    <img src="<?php echo URLROOT ?>/public/images/money-icon.png" aria-hidden="true" alt="music" />
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
                                    <img src="<?php echo URLROOT ?>/public/images/payment.gif" aria-hidden="true" alt="hero" />
                                </div>
                                <!-- Main content start -->
                                <h1>Order Summary</h1>
                                <p class="description">
                                    You can now listen to millions of songs, audiobooks, and podcasts on any
                                    device anywhere you like!
                                </p>



                                <!-- div for order plan -->
                                <div class="order__summary-plan">
                                    <img src="<?php echo URLROOT ?>/public/images/money-icon.png" aria-hidden="true" alt="music" />
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
                                    <img src="<?php echo URLROOT ?>/public/images/payment.gif" aria-hidden="true" alt="hero" />
                                </div>
                                <!-- Main content start -->
                                <h1>Order Summary</h1>
                                <p class="description">
                                    You can now listen to millions of songs, audiobooks, and podcasts on any
                                    device anywhere you like!
                                </p>



                                <!-- div for order plan -->
                                <div class="order__summary-plan">
                                    <img src="<?php echo URLROOT ?>/public/images/money-icon.png" aria-hidden="true" alt="music" />
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
                                    <img src="<?php echo URLROOT ?>/public/images/payment.gif" aria-hidden="true" alt="hero" />
                                </div>
                                <!-- Main content start -->
                                <h1>Order Summary</h1>
                                <p class="description">
                                    You can now listen to millions of songs, audiobooks, and podcasts on any
                                    device anywhere you like!
                                </p>


                                <!-- div for order plan -->
                                <div class="order__summary-plan">
                                    <img src="<?php echo URLROOT ?>/public/images/money-icon.png" aria-hidden="true" alt="music" />
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
 </div>
 
</div>
 

     <!-- footer start -->
     <section class="footer" style="width:100%;">
        <div class="overlay"></div>
        <div class="box-container" style="display:inline-flex; width:100%;">
            <div class="box" style="margin-right:185px;">
                <h3>Quick Access</h3>
                <a href="home"><i class="fas fa-angle-right"></i> Home</a>
                <a href="#"><i class="fas fa-angle-right"></i> Packages</a>
                <a href="#"><i class="fas fa-angle-right"></i> Add Packages</a>
            </div>

            <div class="box" style="margin-right:185px;">
                <h3>Extra</h3>
                <a href="#"><i class="fas fa-angle-right"></i> About US</a>
                <a href="#"><i class="fas fa-angle-right"></i> Privacy Policy</a>
                <a href="#"><i class="fas fa-angle-right"></i> Ask Questions</a>
            </div>

            <div class="box" style="margin-right:185px;">
                <h3>Contact Us</h3>
                <a href="#"><i class="fas fa-phone"></i> +94 123-456-789</a>
                <a href="#"><i class="fa-solid fa-envelope"></i> TruEvent@gmail.com</a>
                <a href="#"><i class="fas fa-map"></i> Colombo</a>

            </div>

            <div class="box" style="margin-right:185px;">
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
</body>
</html>