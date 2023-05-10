<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>TruEvent Horizons - View Packages Reservation Log</title>

        <!-- font awesome cdn link -->
        <link rel="stylesheet" href=<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />

        <!-- custom css file link -->
        <link rel="stylesheet" href="<?php echo URLROOT ?>/public/css/admin/admin-add-reservation-style.css">
        <link rel="stylesheet" href="<?php echo URLROOT ?>/public/css/admin/each-package-style.css">

        <style>
            .backbutton{
                margin:0px 1.5px;
            }
        </style>

    </head>
    <body>

    <?php require APPROOT . "/views/customer/header-customer.php" ?>

<button id="menu-btn" class="fas fa-bars"></button>

<!-- Packages Section starts -->
<?php $rv_ID = $data[0]; ?>
<?php $package_ID = $data[1]; ?>
<?php $data1 = $data[2]; ?>
<?php $data2 = $data[3]; ?>



<section class="packages">
    <h1 class="heading-title">
        Package Details
    </h1>
    <ul class="grid">
            <li class="grid__item">
                <a href="#" class="card" style="width:400px;">
                    <div class="card__image">
                    <img src="<?php echo URLROOT ?>/public/images/admin/admin-add-packages/image5.jpg" alt="" />
                    </div>
                    <article class="card__content">
                    <?php foreach($data1 as $rvDetails): ?>
                        <?php if($rvDetails->rv_id == $rv_ID) { ?>
                            <?php if($rvDetails->service_id == $package_ID){ ?>
                    <h3 class="card__title"><?= $rvDetails->packageType;?></h3><br><br>
                    <label style="font-weight: bold; color:purple; margin-left:16px;"><?=$rvDetails->packageName ?></label>
                    <div class="card__body">
                        <table class="data-table">
                            <tr>
                                <td><b>Reservation Date</b></td>
                                <td>: <?= $rvDetails->rvDate;?></td>
                            </tr>
                            <tr>
                                <td><b>Reservation Time</b></td>
                                <td>: <?= $rvDetails->rvTime;?></td>
                            </tr>
                            <tr>
                                <td><b>Price</b></td>
                                <td>: <?= $rvDetails->price;?> LKR</td>
                            </tr>
                        </table>
                    </div>
                    
                    <?php } ?>
                    <?php } ?>
                    <?php endforeach ?>
                        
                    </article>
                </a>
            </li>

            <li class="grid__item">
                <a href="#" class="card"  style="height: 100px; width:850px;">
                    <br><br>
                    <label style="margin-left: 25px; font-weight: bold;">Services Included:</label>
                    <table class="styled-table">
                    <?php foreach($data2 as $pcDetails): ?>
                        <?php if($pcDetails->package_id == $package_ID) { ?>
                    <tr>
                                <th style=" border-radius: 10px 0 0 0;">Band Option</th>
                                <td><?php if($pcDetails->band_choice) echo $pcDetails->band_choice; else echo "not-included";?></td>
                                <?php if($pcDetails->band_choice) { ?>
                                    <td><a href="<?php echo URLROOT ?>/CustomerDashboard/viewEachPackageBand?service_id=<?=$pcDetails->band_sv_id;?>"><input type="button" class="viewbutton" style="float:right; margin-right:40%; font-weight:500; letter-spacing:0.2px;" value="View Details"></a></td>
                                <?php }  ?>
                            </tr>
                            <tr>
                                <th>Decoration Option</th>
                                <td><?php if($pcDetails->deco_choice) echo $pcDetails->deco_choice; else echo "not-included";?></td>
                                <?php if($pcDetails->deco_choice) { ?>
                                    <td><a href="<?php echo URLROOT ?>/CustomerDashboard/viewEachPackageDeco?service_id=<?=$pcDetails->deco_sv_id;?>"><input type="button" class="viewbutton" style="float:right; margin-right:40%; font-weight:500; letter-spacing:0.2px;" value="View Details"></a></td>
                                <?php }  ?>
                            </tr>
                            <tr>
                                <th style=" border-radius: 0 0 0 10px;">Photography Option</th>
                                <td><?php if($pcDetails->photo_choice) echo $pcDetails->photo_choice; else echo "not-included";?></td>
                                <?php if($pcDetails->photo_choice) { ?>
                                    <td><a href="<?php echo URLROOT ?>/CustomerDashboard/viewEachPackagPhotography?service_id=<?=$pcDetails->photo_sv_id;?>"><input type="button" class="viewbutton" style="float:right; margin-right:40%; font-weight:500; letter-spacing:0.2px;" value="View Details"></a></td>
                                <?php }  ?>
                            </tr>
                        <!-- </tbody> -->
                        <?php } ?>
                        <?php endforeach ?>
                    </table>   
                </a>
                <br><br>    
                <input type="button" class="backbutton" style="float:left; margin-left:30%" value="Go back!" onclick="history.back()">     
            </li>
        </ul>
</section>

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

    <script src="<?php echo URLROOT ?>/public/js/admin/adminscript.js"></script>
    </body>
</html>