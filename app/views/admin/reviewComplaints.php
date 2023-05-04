<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>TruEvent Horizons - Review Complaints - Admin</title>

        <!-- font awesome cdn link -->
        <link rel="stylesheet" href=<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />

        <!-- custom css file link -->
        <link rel="stylesheet" href="<?php echo URLROOT ?>/public/css/style.css">
        <link rel="stylesheet" href="<?php echo URLROOT ?>/public/css/admin/admin-add-reservation-style.css">
        <link rel="stylesheet" href="<?php echo URLROOT ?>/public/css/admin/add-package-service-style.css">

        <style>
            table {
                border-collapse:separate;
                border:solid black 1px;
                border-radius:6px;
                width:80%;
                }

                td, th {
                text-align: left;
                padding: 8px;
                }

                tr:nth-child(even) {
                background-color: #dddddd;
                }
        </style>


    </head>
    
<body>
<?php require APPROOT . "/views/admin/header-admin.php" ?>

<!-- header section starts -->
<!-- <section class="header">
    <img src="<?php echo URLROOT ?>/public/images/customer/logo/logo.jpg" alt="logo" class="logo">
    <a href="home" class="dashboard">Dashboard</a>

    <nav class="navbar">
        <a href="home">Home</a>
        <a href="#">Services</a>
        <a href="#">Packages</a>
        <a href="viewreservationlog">Reservation Log</a>
        <a href="logout">Logout</a>
    </nav> -->

    <!-- Gives a Menu Button -->
    <button id="menu-btn" class="fas fa-bars"></button>

<!-- </section> -->

<div class="main-container">

    <a href="home" class="top-right-closeBtn white-red-hover"><i class="fal fa-times fa-2x "></i></a>

    <br><br>
    <h1 class="title" style="text-align:center">Review Complaints and Feedback</h1>
    
    <?php foreach($data as $feedbackdetails) :?>
        <div class="ser-container form-container contentBox" style="width: 60%; margin-top:20px; margin-bottom:50px;">
            <form action="<?php echo URLROOT; ?>/customerReservation/addReservation" method="post" class="form">
                <div class="row"> 
                    <div class="column">
                        <label for="eventname">Event Name</label>
                        <input class="eventname" type="text" id="eventname" name="eventname" placeholder="<?php echo $feedbackdetails->event_name ?>" disabled>
                    </div>
                </div>
                <br>
                <div class="row"> 
                    <div class="column">
                        <label for="customername">Customer Name</label>
                        <input class="customername" type="text" id="customername" name="customername" placeholder="<?php echo $feedbackdetails->customer_name ?>" disabled>
                    </div>
                    <div class="column">
                        <label class="spname" for="spname">Service Provider Name</label>
                        <input class="spname" type="text" id="spname" name="spname" placeholder="<?php echo $feedbackdetails->sp_name ?>" disabled>
                    </div> 
                </div>
                <br>
                <div class="row"> 
                    <div class="column">
                        <label for="customername">Customer Contact Number</label>
                        <input class="customername" type="text" id="contactno" name="contactno" placeholder="<?php echo $feedbackdetails->contact_no ?>" disabled>
                    </div>
                    <div class="column">

                    </div> 
                </div>
                <br>
                <div class="row">
                    <div class="column"> 
                        <label for="complaint">Feedback</label>
                        <table>
                            <tr>
                                <th style="text-align: center;">Feedback Area</th>
                                <th style="text-align: center;">Rating</th>
                            </tr>
                            <tr>
                                <td>Ease Of Boooking</td>
                                <td><?php echo $feedbackdetails->eob ?></td>
                            </tr>
                            <tr>
                                <td>Accuracy Of Service</td>
                                <td><?php echo $feedbackdetails->aos ?></td>
                            </tr>
                            <tr>
                                <td>Value Of Money</td>
                                <td><?php echo $feedbackdetails->vom ?></td>
                            </tr>
                            <tr>
                                <td>Quality Of Service</td>
                                <td><?php echo $feedbackdetails->qos ?></td>
                            </tr>
                            <tr>
                                <td>Customer Satisfication</td>
                                <td><?php echo $feedbackdetails->cs ?></td>
                            </tr>
                        </table>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="column"> 
                        <label for="complaint">Complaint (if any)</label>
                        <input class="complaint" type="text" id="complaint" name="complaint" placeholder="<?php echo $feedbackdetails->complaint ?>" disabled>
                    </div>
                </div>
            </form>
        </div>
    <?php endforeach; ?>
</div>


<!-- footer start -->
<section class="footer">
    <div class="overlay"></div>
    <div class="box-container">
        <div class="box">
            <h3>Quick Access</h3>
            <a href="home"><i class="fas fa-angle-right"></i> Home</a>
            <a href="#"><i class="fas fa-angle-right"></i> Packages</a>
            <a href="#"><i class="fas fa-angle-right"></i> Add Packages</a>
        </div>

        <div class="box">
            <h3>Extra</h3>
            <a href="#"><i class="fas fa-angle-right"></i> About US</a>
            <a href="#"><i class="fas fa-angle-right"></i> Privacy Policy</a>
            <a href="#"><i class="fas fa-angle-right"></i> Ask Questions</a>
        </div>

        <div class="box">
            <h3>Contact Us</h3>
            <a href="#"><i class="fas fa-phone"></i> +94 123-456-789</a>
            <a href="#"><i class="fa-solid fa-envelope"></i> TruEvent@gmail.com</a>
            <a href="#"><i class="fas fa-map"></i> Colombo</a>

        </div>

        <div class="box">
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

<!-- custom js file link -->
<script src="<?php echo URLROOT ?>/public/js/customer/customerscript.js"></script>
</body>
