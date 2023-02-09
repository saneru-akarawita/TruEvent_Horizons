<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>TruEvent Horizons - Reservation Log - Hotel</title>

    <!-- font awesome cdn link -->
    <link rel="stylesheet" href=<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- custom css file link -->
    <link rel="stylesheet" href="<?php echo URLROOT ?>/public/css/customer/customer.css">
    <link rel="stylesheet" href="<?php echo URLROOT ?>/public/css/customer/styles-hotel.css" />
    <link rel="stylesheet" href="<?php echo URLROOT ?>/public/css/customer/style.css" />

</head>

<body>
    <?php require APPROOT . "/views/hotelManager/header-hotel.php" ?>

    <?php $spID = $data[0]; ?>
    <?php $rvdata = $data[1]; ?>
    <?php $cusdata = $data[2]; ?>

      <!-- Main Start -->

        <main class="main">
            <div class="wrapper">


                <div class="hero">
                    <div class="hero-heading">
                        <h3>Reservation Log</h3>
                    </div>


                    <div class="hero-search">
                    <div class="input-group">
                            <input type="text" name="" id="" placeholder="Search" style="width:300px;">
                        </div>
                        <a href="#" class="buttond"style="border-radius:15px; margin-right:630px;">Search</a>
                        <h6 style="margin-right:20px; font-size:2rem">Filter </h6>
                        <span><input type="date" value=""></span>
                    </div>


                    <div class="hero-heading">
                        <h3>Current Reservations<i class="bx bx-chevron-down"></i> </h3>
                    </div>

                    <?php $scount = 0; $pcount=0; ?>
                    <?php foreach ($rvdata as $rvDetails) : ?>
                    
                                                <?php 
                                                    $sp_id_arr = explode (",", $rvDetails->sp_id);
                                                ?>
                                                <?php foreach ($sp_id_arr as $new_sp_id) : ?>
                                                    <?php if ($new_sp_id == $spID) { ?>

                                                <?php $scount = $scount + 1; ?>
                    <div class="project">
                       <div class="col col<?php echo $scount%4 +1 ?>">
                            <div class="project-card">
                                <div class="card-header">
                                    <type class="type">Reservation ID - <?= $rvDetails->rv_id; ?></type>
                                    <date class="date"><?= $rvDetails->rvDate; ?></date>
                                    <span><i class="bx bx-dots-vertical-rounded"></i></span>
                                </div>
                                

                                <div class="card-body">
                                    <h6><?= $rvDetails->eventName; ?></h6>
                                    <p><?= $rvDetails->spName; ?></p>
                                    <p><?= $rvDetails->rvTime; ?></p>
                                    <?php foreach ($cusdata as $cus) : ?>
                                        <?php if ($cus->customer_id == $rvDetails->customer_id) { ?>
                                                <p><?= $cus->fname; ?> <?= $cus->lname; ?></p>
                                                <?php } ?>
                                        <?php endforeach; ?>
                                    <p><?= $rvDetails->price; ?> per head</p>
                                    
                                    <div class="progress-box">
                                        <label for="progress">Status</label>
                                        <?php if($rvDetails->status == "pending") $value="0"; else $value="100";?>
                                        <progress id="progress" value="<?php $value ?>" max="100"style="margin-left:35px;"><?php echo $value ?>%</progress>
                                        <span><?php echo $value ?>%</span>
                                    </div>
                                    
                                    <div class="progress-box">
                                        <label for="progress">Payments</label>
                                        <?php if($rvDetails->payment == "not-paid") $value="0"; else $value="100";?>
                                        <progress id="progress" value="<?php $value ?>" max="100" style="margin-left:5px;"><?php echo $value ?><%</progress>
                                        <span><?php echo $value ?>%</span>
                                    </div>

                                </div>
                            
                                <div class="action-button" style="justify-content:center; margin-left:75px;">
                                <?php if($rvDetails->rvType == "service"){?>        
                                    <a href="ReservationDetails?rv_id=<?=$rvDetails->rv_id;?>&service_id=<?=$rvDetails->service_id;?>" class="buttond">view</a>
                                    <?php } else {?>
                                        <a href="#" class="buttond">view</a>
                                    <?php }?>
                                    <!-- <a href="ReservationDetails?rv_id=<?=$rvDetails->rv_id; ?>&service_id=<?=$rvDetails->service_id; ?>" class="buttond">view</a> -->
                                    <a href="editReservation?rv_id=<?=$rvDetails->rv_id; ?>" class="buttone" style="margin-right:20px; margin-left: 20px;">Confirm</a>
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
                        </div>

                        <?php } ?>
                        <?php endforeach; ?>
                        <?php endforeach; ?>
                    </div>

                </div>

            </div>
        </main>

        <!-- tilt -->

        <script src="https://cdnjs.cloudflare.com/ajax/libs/vanilla-tilt/1.4.1/vanilla-tilt.min.js"></script>


        <!-- Main End -->
                         
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
        <script src="./js/adminscript.js"></script>
</body>
</html>