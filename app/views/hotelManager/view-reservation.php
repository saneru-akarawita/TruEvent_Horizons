<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>TruEvent Horizons - View Reservation - Hotel</title>
        <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" />
        <link rel="stylesheet" href="<?php echo URLROOT ?>/public/css/hotel manager/styles-hotel.css">
        <link rel="stylesheet" href="<?php echo URLROOT ?>/public/css/hotel manager/style.css">
        <link rel="stylesheet" href="<?php echo URLROOT ?>/public/css/hotel manager/hotel.css">
        <link href="https://fonts.googleapis.com/css?family=Bentham|Playfair+Display|Raleway:400,500|Suranna|Trocchi" rel="stylesheet">
</head>
<body>
<!-- header section starts -->
<?php require APPROOT . "/views/hotelManager/header-hotel.php" ?>
<!-- header section ends -->

<?php $spID = $data[0]; ?>
<?php $serviceID = $data[1]; ?>
<?php $rvID = $data[2]; ?>
<?php $rvdata = $data[3]; ?>
<?php $cusdata = $data[4]; ?>
<?php $hotelservicedata = $data[5]; ?>

<div class="wrapper">

        <div class="product-img" style="height:500px;">
                <img src="<?php echo URLROOT ?>/public/images/hotel manager/figma images/bdy - photo.jpg" height="100%" max-width="100%">
        </div>

        <div class="product-info">
                <div class="product-text" style="height:1000px; width:500px;">
                        <?php foreach ($rvdata as $rvDetails) : ?>
                                <?php $sp_id_arr = explode (",", $rvDetails->sp_id);?>
                                <?php foreach ($sp_id_arr as $new_sp_id) : ?>
                                        <?php if ($new_sp_id == $spID) { ?>
                                                <?php foreach ($hotelservicedata as $hoteldata) : ?>
                                                <?php if ($hoteldata->service_id == $serviceID && $rvID == $rvDetails->rv_id) { ?>
                                                <h1 style="margin-top:-45px; font-size:2.5rem;"><?= $hoteldata->service_type;?></h1>
                                                <h2>Reservation ID - <?= $rvDetails->rv_id;?></h2>
                                                <?php $rv_id = $rvDetails->rv_id; ?>
                                                <div class="description">
                                                        <table id="details12">
                                                                        <tr>
                                                                                <td>Reservation Date</td>
                                                                                <td>: <?= $rvDetails->rvDate;?></td>
                                                                        </tr>
                                                                        <tr>
                                                                                <td>Reservation Time</td>
                                                                                <td>: <?= $rvDetails->rvTime;?></td>
                                                                        </tr>
                                                                        <tr>
                                                                                <td>Reservation Status</td>
                                                                                <td>: <?= $rvDetails->status;?></td>
                                                                                <?php $status_rv = $rvDetails->status; ?>
                                                                        </tr>
                                                                        <tr>
                                                                                <td>Hall Name </td>
                                                                                <td>: <?= $hoteldata->hall_name;?></td>
                                                                        </tr>
                                                                        <tr>
                                                                                <td>Location </td>
                                                                                <td>: <?= $hoteldata->location;?></td>
                                                                        </tr>
                                                                        <tr>
                                                                                <td>Hall Type </td>
                                                                                <td>: <?= $hoteldata->hall_type;?></td>
                                                                        </tr>
                                                                        <tr>
                                                                                <td>Air Condition Status </td>
                                                                                <td>: <?php if($hoteldata->ac_status) echo "Available"; else echo "Non-Available";?></td>
                                                                        </tr>
                                                                        <tr>
                                                                                <td>Max Crowd </td>
                                                                                <td>: <?= $hoteldata->max_crowd;?></td>
                                                                        </tr>
                                                                        <tr>
                                                                                <td>Other Facilities </td>
                                                                                <td>:<?php if(empty($hoteldata->other_facilities)) echo " None"; else  echo $hoteldata->other_facilities; ?> </td>
                                                                                
                                                                        </tr>
                                                                        <tr>
                                                                                <td>Price </td>
                                                                                <td>: <?= $hoteldata->price;?> per head</td>
                                                                        </tr>
                                                                        <tr>
                                                                                <td>Payments </td>
                                                                                <td>: <?= $rvDetails->payment;?></td>
                                                                        </tr>
                                                                
                                                                        <?php foreach ($cusdata as $cus) : ?>
                                                                                <?php if ($cus->customer_id == $rvDetails->customer_id) { ?> 
                                                                                        <?php $customer_id  = $rvDetails->customer_id; ?>
                                                                        <tr>
                                                                                        <td>Customer Name </td>
                                                                                        <td>: <?= $cus->fname; ?> <?= $cus->lname; ?></td>
                                                                                </tr>
                                                                                <tr>
                                                                                        <td>Address </td>
                                                                                        <td>: <?= $cus->district;?></td>
                                                                                </tr>
                                                                                <tr>
                                                                                        <td>Contact No </td>
                                                                                        <td>: <?= $cus->contact_no;?></td>
                                                                                </tr>
                                                                                <tr>
                                                                                        <td>E-mail </td>
                                                                                        <td style="text-transform:none">: <?= $cus->email;?></td>
                                                                                </tr>
                                                                        
                
                                                                                <?php } ?>
                                                                        <?php endforeach; ?>                                
                                                        </table>
                
                                                </div>
                                                <?php } ?>
                                                <?php endforeach; ?>
                                                <?php } ?>

                                                     
                <?php endforeach; ?>
                <?php endforeach; ?>
                
<?php if($status_rv == 'pending'){ ?>
        <div class="product-price-btn" style="display:flex; margin:0px;">
        <button type="button" style = "width:100px; border-radius:5px; padding:10px; margin-left:50px;" onclick="history.back()">Back</button>
        <button type="button" style = "width:100px; border-radius:5px; padding:10px;"><a href="<?= URLROOT?>/serviceProviderReservation/confirmReservation?rv_id=<?=$rv_id; ?>&cus_id=<?=$customer_id?>" class="buttone" style="color:white; font-family: 'Raleway',sans-serif; text-transform:UPPERCASE">Confirm</a></button>
        <button type="button" style = "width:100px; border-radius:5px; padding:10px;"> <a href="<?= URLROOT?>/serviceProviderReservation/cancelReservation?rv_id=<?=$rv_id; ?>&cus_id=<?=$customer_id?>" class="buttond" style="color:white; font-family: 'Raleway',sans-serif; text-transform:UPPERCASE">Decline</a></button>
                                                </div>
                                        <?php }else{ ?>
                                                <div class="product-price-btn">
                                                        <button type="button" onclick="history.back()">Back</button>
                                                </div>
                                        <?php } ?> 
               
               
                </div>
        </div>  
</div>


<!-- footer start -->
<section class="footer" style="margin-top:200px">
<div class="overlay"></div>
<div class="box-container">
<div class="box">
<h3>Quick Access</h3>
<a href="home"><i class="fas fa-angle-right"></i>  Home</a>
<a href="viewservice"><i class="fas fa-angle-right"></i> Services</a>
<a href="addservice"><i class="fas fa-angle-right"></i> Add Services</a>
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

<!-- footer ends -->

</body>

</html>