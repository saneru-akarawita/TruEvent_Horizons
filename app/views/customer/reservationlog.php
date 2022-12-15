<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer View Reservation</title>

    <!-- font awesome cdn link -->
    <link rel="stylesheet" href=<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- custom css file link -->
    <link rel="stylesheet" href="<?php echo URLROOT ?>/public/css/customer/customer.css">
    <link rel="stylesheet" href="<?php echo URLROOT ?>/public/css/customer/styles-hotel.css" />
    <link rel="stylesheet" href="<?php echo URLROOT ?>/public/css/customer/style.css" />


</head>

<body>
<?php require APPROOT . "/views/customer/header-customer.php" ?>

    <!-- header section starts -->
    <!-- <section class="header">
        <img src="<?php echo URLROOT ?>/public/images/customer/logo/logo.jpg" alt="logo" class="logo">
        <a href="home" class="dashboard">Customer Dashboard</a>

        <nav class="navbar">
            <a href="home">Home</a>
            <a href="viewservices">Services</a>
            <a href="#">Packages</a>
            <a href="addreservation">Add Reservation</a>
            <a href="logout">Logout</a>

        </nav> -->


        <!-- Gives a Menu Button -->
        <button id="menu-btn" class="fas fa-bars"></button>


    <!-- </section> -->

    <!-- header section ends -->

    <div class="heading" style="background:url() no-repeat">

    </div>


    <div class="recent-grid">
        <div class="projects">
            <div class="card">
                <div class="card-header">
                    <h3>Services</h3>
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table width="98%" style="margin-left:20px;">
                            <thead>
                                <tr>
                                    <td>Reservation ID</td>
                                    <td>Event Name</td>
                                    <td>Date</td>
                                    <td>Time</td>
                                    <td>Type of Service</td>
                                    <td>Service Provider Name</td>
                                    <td>Status</td>
                                    <td>Paid/Not Paid</td>
                                    <td style="justify-content:center">
                                        Action
                                    </td>
                                </tr>
                            </thead> 	 
                            <tbody>
                            <?php foreach ($data as $rvdetails) : ?>
                                <?php if($rvdetails->rvType =='service') { ?>
                                    <tr>
                                        <td><center><?= $rvdetails->rv_id; ?></center></td>
                                        <td><?= $rvdetails->eventName; ?></td>
                                        <td><?= $rvdetails->rvDate; ?></td>
                                        <td><?= $rvdetails->rvTime; ?></td>
                                        <td><?= $rvdetails->spType; ?></td>
                                        <td><?= $rvdetails->spName; ?></td>
                                        <td>
                                            <?php if($rvdetails->status == "pending") $color="orange"; else $color="green";?>
                                            <span class="status <?php echo $color?>"></span>
                                            <?= $rvdetails->status; ?>
                                        </td>
                                        <td>
                                            <?php if($rvdetails->payment == "not-paid") $color="red"; else $color="green";?>
                                            <span class="status <?php echo $color?>"></span>
                                            <?= $rvdetails->payment; ?>
                                        </td>
                                        <td>
                                            <div class="action-button">
                                                <a href="#" class="buttone">edit</a>
                                                /
                                                <a href="#" class="buttond">delete</a>
                                            </div>
                                        </td>
                                    </tr>
                                <?php }?>
                            <?php endforeach; ?>
                            </tbody>

                        </table>
                    </div>
                </div>


            </div>
        </div>

    </div>



    <div class="recent-grid">
        <div class="projects">
            <div class="card">
                <div class="card-header">
                    <h3>Packages</h3>

                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table width="98%" style="margin-left:20px;">
                            <thead>
                                <tr>
                                    <td>Reservation ID</td>
                                    <td>Event Name</td>
                                    <td>Date</td>
                                    <td>Time</td>
                                    <td>Package Type</td>
                                    <td>Package Name</td>
                                    <td>Status</td>
                                    <td>Paid/Not Paid</td>
                                    <td style="justify-content:center">
                                        Action
                                    </td>
                                </tr>
                            </thead>

	
                            <tbody>
                            <?php foreach ($data as $rvdetails) : ?>
                                <?php if($rvdetails->rvType =='package') { ?>
                                    <tr>
                                        <td><center><?= $rvdetails->rv_id; ?></center></td>
                                        <td><?= $rvdetails->eventName; ?></td>
                                        <td><?= $rvdetails->rvDate; ?></td>
                                        <td><?= $rvdetails->rvTime; ?></td>
                                        <td><?= $rvdetails->packageType; ?></td>
                                        <td><?= $rvdetails->packageName; ?></td>
                                        <td>
                                            <?php if($rvdetails->status == "pending") $color="orange"; else $color="green";?>
                                            <span class="status <?php echo $color?>"></span>
                                            <?= $rvdetails->status; ?>
                                        </td>
                                        <td>
                                            <?php if($rvdetails->payment == "not-paid") $color="red"; else $color="green";?>
                                            <span class="status <?php echo $color?>"></span>
                                            <?= $rvdetails->payment; ?>
                                        </td>
                                        <td>
                                            <div class="action-button">
                                                <a href="#" class="buttone">edit</a>
                                                /
                                                <a href="#" class="buttond">delete</a>
                                            </div>
                                        </td>
                                    </tr>
                                <?php }?>
                            <?php endforeach; ?>
                            </tbody>

                        </table>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <div class="footer-container">
        <a href="home" class="btn">Home</a>
    </div>

    <!-- footer start -->
    <section class="footer">
        <div class="overlay"></div>
        <div class="box-container">
            <div class="box">
                <h3>Quick Access</h3>
                <a href="home"><i class="fas fa-angle-right"></i> Home</a>
                <a href="#"><i class="fas fa-angle-right"></i> Services</a>
                <a href="#"><i class="fas fa-angle-right"></i> Packages</a>
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
                <a href="#"><i class="fas fa-envelop"></i> TruEvent@gmail.com</a>
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

</body>

</html>