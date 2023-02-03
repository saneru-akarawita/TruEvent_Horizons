<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TruEvent Horizons - Reservation Log- Band Manager</title>

    <!-- font awesome cdn link -->
    <link rel="stylesheet" href=<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- custom css file link -->
    <link rel="stylesheet" href="<?php echo URLROOT ?>/public/css/customer/customer.css">
    <link rel="stylesheet" href="<?php echo URLROOT ?>/public/css/customer/styles-hotel.css" />
    <link rel="stylesheet" href="<?php echo URLROOT ?>/public/css/customer/style.css" />

</head>

<body>
<?php require APPROOT . "/views/band/header-band.php" ?>


    <?php $spID = $data[0]; ?>
    <?php $rvdata = $data[1]; ?>
    <?php $cusdata = $data[2]; ?>

      <!-- Main Start -->

        <main class="main">
            <div class="wrapper">


                <div class="hero">
                    <div class="hero-heading">
                        <h3>Reservation Log</h3>
                        <span>Pending| 11 Dec,2022</span>
                    </div>


                    <div class="hero-search">
                     <div class="input-group">
                            <input type="text" name="" id="" placeholder="Search" style="width:300px;">
                        </div>
                        <a href="#" class="buttond"style="border-radius:15px; margin-right:880px;">Search</a>
                        <span>Filter <i class="bx bx-filter-alt"></i> </span>
                    </div>


                    <div class="hero-heading">
                        <h3>Current Reservations - Services <i class="bx bx-chevron-down"></i> </h3>
                    </div>

                     
                    <?php foreach ($data as $rvdetails) : ?>
                                    <?php if($rvdetails->rvType =='service') { ?>

                                     <!-- <?= $rvdetails->rv_id; ?> -->

                    <div class="project">
                       <div class="col">
                            <div class="project-card">
                                <div class="card-header">
                                    <type class="type">Service - <?= $rvdetails->spType; ?></type>
                                    <date class="date"><?= $rvdetails->rvDate; ?></date>
                                    <span><i class="bx bx-dots-vertical-rounded"></i></span>
                                </div>
                                

                                <div class="card-body">
                                    <h6><?= $rvdetails->eventName; ?></h6>
                                    <p><?= $rvdetails->spName; ?></p>
                                    <p><?= $rvdetails->rvTime; ?></p>
                                    <p>LKR.125 000.00 per head</p>


                                    <div class="progress-box">
                                        <label for="progress">Status</label>
                                        <?php if($rvdetails->status == "pending") $value="0"; else $value="100";?>
                                        <progress id="progress" value="<?php $value ?>" max="100"style="margin-left:35px;"><?php echo $value ?>%</progress>
                                        <span><?php echo $value ?>%</span>
                                    </div>

                                    
                                    <div class="progress-box">
                                        <label for="progress">Payments</label>
                                        <?php if($rvdetails->payment == "not-paid") $value="0"; else $value="100";?>
                                        <progress id="progress" value="<?php $value ?>" max="100" style="margin-left:5px;"><?php echo $value ?><%</progress>
                                        <span><?php echo $value ?>%</span>
                                    </div>

                                </div>
                            
                                <div class="action-button" style="justify-content:center; margin-left:100px;">
                                    <a href="viewReservation?rv_id=<?=$rvdetails->rv_id; ?>" class="buttond">view</a>
                                    <a href="editReservation?rv_id=<?=$rvdetails->rv_id; ?>" class="buttone" style="margin-right:20px; margin-left: 20px;">edit</a>
                                    <a href="#" class="buttond">cancel</a>

                            </div>

                            <div class="card-footer">
                                <ul class="team">
                                    <li class="team-member">
                                        <img src="<?php echo URLROOT ?>/public/images/admin/admin-add-packages/image21.jpg" alt="member">
                                    </li>


                                    <li class="team-member">
                                        <img src="<?php echo URLROOT ?>/public/images/admin/admin-add-packages/cece.jpg" alt="member">
                                    </li>


                                    <li class="team-member">
                                        <img src="<?php echo URLROOT ?>/public/images/admin/admin-add-packages/image12.jpg" alt="member">
                                    </li>

                                </ul>
                            </div>

                            </div>
                        </div>

                        <?php } ?>
                                                    <?php endforeach; ?>

                    </div>

                </div>

            </div>
        </main>

        <!-- tilt -->

        <script src="https://cdnjs.cloudflare.com/ajax/libs/vanilla-tilt/1.4.1/vanilla-tilt.min.js"></script>


        <!-- Main End -->
<!-- Main Start -->

<main class="main">
            <div class="wrapper">


                <div class="hero">
                    <div class="hero-heading">
                        <h3>Reservation Log</h3>
                        <span>Pending| 11 Dec,2022</span>
                    </div>


                    <div class="hero-search">
                        <div class="input-group">
                            <input type="text" name="" id="" placeholder="Search">
                        </div>
                        <span style="margin-right:440px; color:white; background-color:black;">Search</i> </span>

                        <span>Filter <i class="bx bx-filter-alt"></i> </span>
                    </div>


                    <div class="hero-heading">
                        <h3>Current Reservations - Packages <i class="bx bx-chevron-down"></i> </h3>
                    </div>

                     
                    <?php foreach ($data as $rvdetails) : ?>
                                    <?php if($rvdetails->rvType !='service') { ?>

                                     <!-- <?= $rvdetails->rv_id; ?> -->

                    <div class="project">
                       <div class="col">
                            <div class="project-card">
                                <div class="card-header">
                                    <type class="type"><?= $rvdetails->packageName; ?></type>
                                    <date class="date"><?= $rvdetails->rvDate; ?></date>
                                    <span><i class="bx bx-dots-vertical-rounded"></i></span>
                                </div>
                                

                                <div class="card-body">
                                    <h6><?= $rvdetails->eventName; ?></h6>
                                    <p>Services Provided- Band, Photography, Decoration</p>
                                    <p><?= $rvdetails->rvTime; ?></p>
                                    <p>LKR.125 000.00 per head</p>


                                    <div class="progress-box">
                                        <label for="progress">Status</label>
                                        <?php if($rvdetails->status == "pending") $value="0"; else $value="100";?>
                                        <progress id="progress" value="<?php $value ?>" max="100"style="margin-left:35px;"><?php echo $value ?>%</progress>
                                        <span><?php echo $value ?>%</span>
                                    </div>

                                    
                                    <div class="progress-box">
                                        <label for="progress">Payments</label>
                                        <?php if($rvdetails->payment == "not-paid") $value="0"; else $value="100";?>
                                        <progress id="progress" value="<?php $value ?>" max="100" style="margin-left:5px;"><?php echo $value ?><%</progress>
                                        <span><?php echo $value ?>%</span>
                                    </div>

                                </div>
                            
                                <div class="action-button" style="justify-content:center; margin-left:75px;">
                                    <a href="viewReservation?rv_id=<?=$rvdetails->rv_id; ?>" class="buttond">view</a>
                                    <a href="editReservation?rv_id=<?=$rvdetails->rv_id; ?>" class="buttone" style="margin-right:20px; margin-left: 20px;">edit</a>
                                    <a href="#" class="buttond">Decline</a>

                            </div>

                            <div class="card-footer">
                                <ul class="team">
                                    <li class="team-member">
                                        <img src="<?php echo URLROOT ?>/public/images/admin/admin-add-packages/image21.jpg" alt="member">
                                    </li>


                                    <li class="team-member">
                                        <img src="<?php echo URLROOT ?>/public/images/admin/admin-add-packages/cece.jpg" alt="member">
                                    </li>


                                    <li class="team-member">
                                        <img src="<?php echo URLROOT ?>/public/images/admin/admin-add-packages/image12.jpg" alt="member">
                                    </li>

                                </ul>
                            </div>

                            </div>
                        </div>

                        <?php } ?>
                                                    <?php endforeach; ?>

                     
                    </div>

</div>

</div>
</main>                               
        <!-- footer start -->
        <section class="footer">
            <div class="overlay"></div>
            <div class="box-container">
                <div class="box">
                    <h3>Quick Access</h3>
                    <a href="admin-home.php"><i class="fas fa-angle-right"></i> Home</a>
                    <a href="packages.php"><i class="fas fa-angle-right"></i> Packages</a>
                    <a href="admin-add-packages.php"><i class="fas fa-angle-right"></i> Add Packages</a>
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
        <!-- custom js file link -->
        <script src="./js/adminscript.js"></script>
</body>
</html>