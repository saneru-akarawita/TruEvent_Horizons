<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TruEvent Horizons - View Reservation - Customer</title>

    <!-- font awesome cdn link -->
    <link rel="stylesheet" href=<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- custom css file link -->
    <link rel="stylesheet" href="<?php echo URLROOT ?>/public/css/customer/customer.css">
    <link rel="stylesheet" href="<?php echo URLROOT ?>/public/css/customer/styles-hotel.css" />
    <link rel="stylesheet" href="<?php echo URLROOT ?>/public/css/customer/style.css" />

</head>

<body>
<?php require APPROOT . "/views/customer/header-customer.php" ?>

      <!-- Main Start -->

        <main class="main">
            <div class="wrapper">


                <div class="hero" style="width:2000px">
                    <div class="hero-heading">
                        <h3>Reservation Log</h3>
                    </div>


                    <div class="hero-search">
                        <div class="input-group">
                            <input type="text" name="search_bar_s" id="search_bar_s" placeholder="Search" style="width:300px;">
                        </div>
                    </div>


                    <div class="hero-heading">
                        <h3>Current Reservations - Services <i class="bx bx-chevron-down"></i> </h3>
                    </div>

                    <?php $scount = 0; $pcount=0; ?>

                    <?php foreach ($data as $rvdetails) : ?>
                                    <?php if($rvdetails->rvType =='service' && $rvdetails->status !='decline') { ?>
                                        <?php $scount = $scount + 1; ?>

                            <div class="project">
                                <div class="col col<?php echo $scount%4 +1 ?>">


                                    <div class="project-card project-card-searchs">

                                        <div class="card-header">

                                            <type class="type">Service - <?= $rvdetails->spType; ?></type>
                                            <date class="date"><?= $rvdetails->rvDate; ?></date>
                                            <span><i class="bx bx-dots-vertical-rounded"></i></span>
                                        </div>
                                        

                                        <div class="card-body">

                                            <h6><?= $rvdetails->eventName; ?></h6>
                                            <p><?= $rvdetails->spName; ?></p>
                                            <p><?= $rvdetails->rvTime; ?></p>
                                            <?php $formatted_price = number_format($rvdetails->price, 2, '.', '');?>
                                            <p>LKR. <?=$formatted_price?> <?php if($rvdetails->spType == "Hotel") echo "(for $rvdetails->no_of_people people)" ?></p>

                                            <?php if($rvdetails->status !="canceled"){?>
                                                <div class="progress-box">
                                                    <label for="progress">Status</label>
                                                    <?php if($rvdetails->status == "pending") $value="0"; else $value="100";?>
                                                    <progress id="progress" value="<?= $value ?>" max="100"style="margin-left:35px;"><?php echo $value ?>%</progress>
                                                    <span><?php echo $value ?>%</span>
                                                </div>

                                                
                                                <div class="progress-box">
                                                    <label for="progress">Payments</label>
                                                    <?php if($rvdetails->payment == "not-paid") $value="0"; else if($rvdetails->payment == "ad-paid") $value="25"; else $value = "100"?>
                                                    <progress id="progress" value="<?= $value ?>" max="100" style="margin-left:5px;"><?php echo $value ?><%</progress>
                                                    <span><?php echo $value ?>%</span>
                                                </div>
                                            <?php }else{ ?>
                                                <!-- add the code here to show the remarks message -->
                                                <div style="border: 2px solid #c00; padding: 6px; margin-top:5px;border-radius:5px;">
                                                <p style= "font-size:16px; color:red; text-align:center; margin-top: 10px">Your Reservation Has Been Canceled Due To <?=$rvdetails->remarks?></p>
                                                </div>
                                            <?php } ?>

                                        </div>

                                        <?php if($rvdetails->status =="pending" && $rvdetails->payment =="not-paid"){?>

                                        <div class="action-button" style="justify-content:center; margin-left:100px;">

                                            <?php if($rvdetails->spType == "Hotel") {?>
                                                    <a href="viewServiceReservationDetailsHotel?rv_id=<?=$rvdetails->rv_id; ?>&spType=<?=$rvdetails->spType;?>&sp_id=<?=$rvdetails->sp_id;?>&service_id=<?=$rvdetails->service_id; ?>" class="buttond">view</a>
                                                    <a href="editReservation?rv_id=<?=$rvdetails->rv_id; ?>" class="buttone" style="margin-right:20px; margin-left: 20px;">edit</a>
                                                    <a href="deleteReservation?rv_id=<?=$rvdetails->rv_id; ?>" class="buttond">cancel</a>
                                            <?php } ?>

                                            <?php if($rvdetails->spType == "Decoration") {?>
                                                    <a href="viewServiceReservationDetailsDeco?rv_id=<?=$rvdetails->rv_id; ?>&spType=<?=$rvdetails->spType;?>&sp_id=<?=$rvdetails->sp_id;?>&service_id=<?=$rvdetails->service_id; ?>" class="buttond">view</a>
                                                    <a href="editReservation?rv_id=<?=$rvdetails->rv_id; ?>" class="buttone" style="margin-right:20px; margin-left: 20px;">edit</a>
                                                    <a href="deleteReservation?rv_id=<?=$rvdetails->rv_id; ?>" class="buttond">cancel</a>
                                            <?php } ?>

                                            <?php if($rvdetails->spType == "Band") {?>
                                                    <a href="viewServiceReservationDetailsBand?rv_id=<?=$rvdetails->rv_id; ?>&spType=<?=$rvdetails->spType;?>&sp_id=<?=$rvdetails->sp_id;?>&service_id=<?=$rvdetails->service_id; ?>" class="buttond">view</a>
                                                    <a href="editReservation?rv_id=<?=$rvdetails->rv_id; ?>" class="buttone" style="margin-right:20px; margin-left: 20px;">edit</a>
                                                    <a href="deleteReservation?rv_id=<?=$rvdetails->rv_id; ?>" class="buttond">cancel</a>
                                            <?php } ?>

                                            <?php if($rvdetails->spType == "Photography") {?>
                                                    <a href="viewServiceReservationDetailsPhotography?rv_id=<?=$rvdetails->rv_id; ?>&spType=<?=$rvdetails->spType;?>&sp_id=<?=$rvdetails->sp_id;?>&service_id=<?=$rvdetails->service_id; ?>" class="buttond">view</a>
                                                    <a href="editReservation?rv_id=<?=$rvdetails->rv_id; ?>" class="buttone" style="margin-right:20px; margin-left: 20px;">edit</a>
                                                    <a href="deleteReservation?rv_id=<?=$rvdetails->rv_id; ?>" class="buttond">cancel</a>
                                            <?php } ?>

                                        <?php } else if($rvdetails->status =="confirm" && $rvdetails->payment =="not-paid"){?> <!-- payment != "paid" dannda hithanna -->
                                            <?php require APPROOT . "/views/common/cus_log_confirm.php" ?>
                                        <?php } else if($rvdetails->status =="confirm" && $rvdetails->payment =="ad-paid"){?> <!-- payment != "paid" dannda hithanna -->
                                            <?php require APPROOT . "/views/common/cus_log_adpay.php" ?>
                                        <?php } else {?>
                                            <?php require APPROOT . "/views/common/cus_log_pay.php" ?>
                                        <?php }?>

                                            <!-- <a href="viewServiceReservationDetails?rv_id=<?=$rvdetails->rv_id; ?>&spType=<?=$rvdetails->spType;?>&sp_id=<?=$rvdetails->sp_id;?>&service_id=<?=$rvdetails->service_id; ?>" class="buttond">view</a>
                                            <a href="editReservation?rv_id=<?=$rvdetails->rv_id; ?>" class="buttone" style="margin-right:20px; margin-left: 20px;">edit</a>
                                            <a href="#" class="buttond">cancel</a> -->

                                        </div>
                                        
                                        <!--three dots below the card ends  -->
                                        <?php if($rvdetails->status !="canceled"){ ?>
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
                                        <?php } ?>
                                        <!--three dots below the card ends  -->

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


                <div class="hero" style="width:2000px">
                    <div class="hero-heading">
                        <h3>Reservation Log</h3>
                    </div>


                    <div class="hero-search">
                        <div class="input-group">
                            <input type="text" name="search_bar_p" id="search_bar_p" placeholder="Search" style="width:300px;">
                        </div>
                    </div>


                    <div class="hero-heading">
                        <h3>Current Reservations - Reserved via Packages <i class="bx bx-chevron-down"></i> </h3>
                    </div>

                     
                    <?php foreach ($data as $rvdetails) : ?>
                                    <?php if($rvdetails->rvType !='service' && $rvdetails->status != 'decline') { ?>
                                        <?php $pcount = $pcount + 1; ?>
                                     <!-- <?= $rvdetails->rv_id; ?> -->

                    <div class="project">
                       <div class="col col<?php echo $pcount%4 +1?>">
                            <div class="project-card project-card-searchp">
                                <div class="card-header">
                                    <type class="type"><?= $rvdetails->packageName; ?></type>
                                    <date class="date"><?= $rvdetails->rvDate; ?></date>
                                    <span><i class="bx bx-dots-vertical-rounded"></i></span>
                                </div>

                                <div class="card-body">
                                    <h6><?= $rvdetails->eventName; ?></h6>
                                    <!-- <p>Services Provided- Band, Photography, Decoration</p> -->
                                    <p>Package Type - <?= $rvdetails->packageType; ?></p>
                                    <p><?= $rvdetails->rvTime; ?></p>
                                    <?php $formatted_price = number_format($rvdetails->price, 2, '.', '');?>
                                    <p>LKR. <?=$formatted_price?> </p>

                                    <?php if($rvdetails->status !="canceled"){?>
                                        <div class="progress-box">
                                            <label for="progress">Status</label>
                                            <?php if($rvdetails->status == "pending") $value="0"; else $value="100";?>
                                            <progress id="progress" value="<?= $value ?>" max="100"style="margin-left:35px;"><?php echo $value ?>%</progress>
                                            <span><?php echo $value ?>%</span>
                                        </div>

                                        
                                        <div class="progress-box">
                                            <label for="progress">Payments</label>
                                            <?php if($rvdetails->payment == "not-paid") $value="0"; else if($rvdetails->payment == "ad-paid") $value="25"; else $value = "100"?>
                                            <progress id="progress" value="<?= $value ?>" max="100" style="margin-left:5px;"><?php echo $value ?><%</progress>
                                            <span><?php echo $value ?>%</span>
                                        </div>
                                    <?php }else{ ?>
                                        <!-- add the code here to show the remark message -->
                                        <div style="border: 2px solid #c00; padding: 6px; margin-top:5px;border-radius:5px;">
                                        <p style= "font-size:16px; color:red; text-align:center; margin-top: 10px">Your Reservation Has Been Canceled Due To <?=$rvdetails->remarks?></p>
                                        </div>
                                    <?php } ?>

                                </div>
                                        
                                <?php if($rvdetails->status =="pending" && $rvdetails->payment =="not-paid"){?>

                                    <div class="action-button" style="justify-content:center; margin-left:100px;">

                                        <a href="viewPackageReservationDetails?rv_id=<?=$rvdetails->rv_id; ?>&service_id=<?=$rvdetails->service_id;?>" class="buttond">view</a>
                                        <a href="editReservation?rv_id=<?=$rvdetails->rv_id; ?>&service_id=<?=$rvdetails->service_id; ?>" class="buttone" style="margin-right:20px; margin-left: 20px;">edit</a>
                                        <a href="deleteReservationPackage?rv_id=<?=$rvdetails->rv_id; ?>&service_id=<?=$rvdetails->service_id; ?>" class="buttond">cancel</a>

                                <?php } else if($rvdetails->status =="confirm" && $rvdetails->payment =="not-paid"){?> 
                                    <?php require APPROOT . "/views/common/cus_log_confirm.php" ?>
                                <?php } else if($rvdetails->status =="confirm" && $rvdetails->payment =="ad-paid"){?> 
                                    <?php require APPROOT . "/views/common/cus_log_adpay.php" ?>
                                <?php } else {?>
                                    <?php require APPROOT . "/views/common/cus_log_pay.php" ?>
                                <?php }?>
                                    
                                    </div>
                                
                                <!-- three dots below the card -->
                                <?php if($rvdetails->status !="canceled"){ ?>
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
                                <?php } ?>
                                <!-- three dots below the card ends -->

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
        <script>
            // Get the search input element
            const searchInputs = document.getElementById('search_bar_s');

            // Attach an event listener to the search input
            searchInputs.addEventListener('keyup', () => {
            // Get all the reservation cards
                const reservationCards = document.querySelectorAll('.project-card-searchs');

                // Loop through each reservation card
                reservationCards.forEach(card => {
                    const eventName = card.querySelector('h6').textContent;

                    // Check if the event name matches the search input value
                    if (eventName.toLowerCase().includes(searchInputs.value.toLowerCase())) {
                    // Show the reservation card
                    card.style.display = 'block';
                    } else {
                    // Hide the reservation card
                    card.style.display = 'none';
                    }
                });
            });

        </script>
        <script>
            // Get the search input element
            const searchInputp = document.getElementById('search_bar_p');

            // Attach an event listener to the search input
            searchInputp.addEventListener('keyup', () => {
            // Get all the reservation cards
                const reservationCards = document.querySelectorAll('.project-card-searchp');

                // Loop through each reservation card
                reservationCards.forEach(card => {
                    const eventName = card.querySelector('h6').textContent;

                    // Check if the event name matches the search input value
                    if (eventName.toLowerCase().includes(searchInputp.value.toLowerCase())) {
                    // Show the reservation card
                    card.style.display = 'block';
                    } else {
                    // Hide the reservation card
                    card.style.display = 'none';
                    }
                });
            });

        </script>
</body>
</html>