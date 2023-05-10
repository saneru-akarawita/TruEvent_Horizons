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


                <div class="hero" style="width:2000px">
                    <div class="hero-heading">
                        <h3>Reservation Log</h3>
                    </div>


                    <div class="hero-search">
                        <div class="input-group">
                            <input type="text" name="search_bar" id="search_bar" placeholder="Search" style="width:300px;">
                        </div>
                    </div>


                    <div class="hero-heading">
                        <h3>Current Reservations<i class="bx bx-chevron-down"></i> </h3>
                    </div>

                    <?php $scount = 0; $pcount=0; ?>
                    <?php foreach ($rvdata as $rvDetails) : ?>
                    <?php if($rvDetails->status !="decline" && $rvDetails->status !="canceled") {?>
                    
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
                                    <?php $formatted_price = number_format($rvDetails->price, 2, '.', '');?>
                                    <p>LKR. <?= $formatted_price; ?> (for <?=$rvDetails->no_of_people?> people) </p>
                                    
                                    <div class="progress-box">
                                        <label for="progress">Status</label>
                                        <?php if($rvDetails->status == "pending") $value="0"; else $value="100";?>
                                        <progress id="progress" value="<?= $value ?>" max="100"style="margin-left:35px;"><?php echo $value ?>%</progress>
                                        <span><?php echo $value ?>%</span>
                                    </div>
                                    
                                    <div class="progress-box">
                                        <label for="progress">Payments</label>
                                        <?php if($rvDetails->payment == "not-paid") $value="0"; else if($rvDetails->payment == "ad-paid") $value="25"; else $value = "100"?>
                                        <progress id="progress" value="<?= $value ?>" max="100" style="margin-left:5px;"><?php echo $value ?><%</progress>
                                        <span><?php echo $value ?>%</span>
                                    </div>

                                </div>
                                
                                <?php if($rvDetails->status =="pending") {?>
                                <div class="action-button" style="justify-content:center; margin-left:75px;">
                                    <?php if($rvDetails->rvType == "service"){?>        
                                    <a href="ReservationDetails?rv_id=<?=$rvDetails->rv_id;?>&service_id=<?=$rvDetails->service_id;?>" class="buttond">view</a>
                                    <?php } else {?>
                                        <a href="#" class="buttond">view</a>
                                    <?php }?>
                                    <!-- <a href="ReservationDetails?rv_id=<?=$rvDetails->rv_id; ?>&service_id=<?=$rvDetails->service_id; ?>" class="buttond">view</a> -->
                                    <a href="<?= URLROOT?>/serviceProviderReservation/confirmReservation?rv_id=<?=$rvDetails->rv_id; ?>&cus_id=<?=$rvDetails->customer_id?>" class="buttone" style="margin-right:20px; margin-left: 20px;">Confirm</a>
                                    <a href="<?= URLROOT?>/serviceProviderReservation/cancelReservation?rv_id=<?=$rvDetails->rv_id; ?>&cus_id=<?=$rvDetails->customer_id?>" class="buttond">Decline</a>
                                <?php } else { ?>
                                    <?php require APPROOT . "/views/common/sp_log_confirm.php" ?>
                                <?php }?>
                                </div>

                            <div class="card-footer">
                                <ul class="team">
                                    <li class="team-member">
                                    <i class="fa-sharp fa-solid fa-guitar fa-beat-fade" style ="font-size:23px; color:#8e44ad"></i>
                                    <i class="fa-duotone fa-ornament fa-2xs" style="--fa-primary-color: #450d59; --fa-secondary-color: #0061fe;"></i>
                                        <!-- <img src="<?php echo URLROOT ?>/public/images/admin/admin-add-packages/image21.jpg" alt="member"> -->
                                    </li>


                                    <li class="team-member">
                                    <i class="fa-sharp fa-solid fa-holly-berry fa-beat-fade" style ="font-size:23px; margin-left:10px; margin-right:10px; color:#8e44ad" ></i>
                                        <!-- <img src="<?php echo URLROOT ?>/public/images/admin/admin-add-packages/cece.jpg" alt="member"> -->
                                    </li>


                                    <li class="team-member">
                                    <i class="fa-solid fa-camera fa-beat-fade" style ="font-size:23px; margin-left:10px; color:#8e44ad"></i>
                                        <!-- <img src="<?php echo URLROOT ?>/public/images/admin/admin-add-packages/image12.jpg" alt="member"> -->
                                    </li>

                                </ul>
                            </div>
                                        </div>
                            </div>
                        </div>

                        <?php } ?>
                        <?php endforeach; ?>
                        <?php } ?>
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
        <script>
            // Get the search input element
            const searchInput = document.getElementById('search_bar');

            // Attach an event listener to the search input
            searchInput.addEventListener('keyup', () => {
            // Get all the reservation cards
                const reservationCards = document.querySelectorAll('.project-card');

                // Loop through each reservation card
                reservationCards.forEach(card => {
                    const eventName = card.querySelector('h6').textContent;

                    // Check if the event name matches the search input value
                    if (eventName.toLowerCase().includes(searchInput.value.toLowerCase())) {
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