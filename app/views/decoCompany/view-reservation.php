<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>TruEvent Horizons - View Each Service - Decoration Company</title>
        <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" />
        <link rel="stylesheet" href="<?php echo URLROOT ?>/public/css/hotel manager/styles-hotel.css">
        <link rel="stylesheet" href="<?php echo URLROOT ?>/public/css/hotel manager/style.css">
        <link rel="stylesheet" href="<?php echo URLROOT ?>/public/css/hotel manager/hotel.css">
        <link href="https://fonts.googleapis.com/css?family=Bentham|Playfair+Display|Raleway:400,500|Suranna|Trocchi" rel="stylesheet">
</head>
<body>
<?php require APPROOT . "/views/decoCompany/header-deco.php" ?>
<?php $spID = $data[0]; ?>
<?php $serviceID = $data[1]; ?>
<?php $rvID = $data[2]; ?>
<?php $rvdata = $data[3]; ?>
<?php $cusdata = $data[4]; ?>
<?php $decorationservicedata = $data[5]; ?>
<?php $decoPrice = $data[6]; ?>
<?php $packageConfirmationData = $data[7]; ?>

<div class="wrapper">

        <div class="product-img" style="height:500px;">
                <img src="<?php echo URLROOT ?>/public/images/hotel manager/figma images/bdy - photo.jpg" height="100%" max-width="100%">
        </div>

        <div class="product-info">
                <div class="product-text" >
                        <?php foreach ($rvdata as $rvDetails) : ?>
                                <?php $sp_id_arr = explode (",", $rvDetails->sp_id);?>
                                <?php if($rvDetails->rvType == "service") { ?>
                                <?php foreach ($sp_id_arr as $new_sp_id) : ?>
                                        <?php if ($new_sp_id == $spID) { ?>
                                                <?php foreach ($decorationservicedata as $decodata) : ?>
                                                <?php if ($decodata->service_id == $serviceID && $rvID == $rvDetails->rv_id) { ?>
                                                <h1 style="margin-top:-45px; font-size:2.5rem;"><?= $decodata->service_name;?></h1>
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
                                                                                <td>Decoration Items</td>
                                                                                <td>: <?= $decodata->decoration_item;?></td>
                                                                        </tr>
                                                                        <tr>
                                                                                <td>Theme </td>
                                                                                <td>: <?= $decodata->theme;?></td>
                                                                        </tr>
                                                
                                                                        <tr>
                                                                                <td>Other Decoration Items/Serivces </td>
                                                                                <td>:<?php if(empty($decodata->other_decoration)) echo " None"; else  echo $decodata->other_decoration; ?> </td>
                                                                                
                                                                        </tr>
                                                                        <tr>
                                                                                <td>Price </td>
                                                                                <td>: <?= $decodata->price;?></td>
                                                                        </tr>
                                                                        <tr>
                                                                                <td>Payments </td>
                                                                                <td>: <?= $rvDetails->payment;?></td>
                                                                        </tr>
                                                                        
                                
                                                                        <?php foreach ($cusdata as $cus) : ?>
                                                                                <?php if ($cus->customer_id == $rvDetails->customer_id) { ?> 
                                                                                        <?php $customer_id = $rvDetails->customer_id; ?> 
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
                <?php } ?>
                <?php endforeach; ?>
                
                <?php if (!empty($status_rv)){ ?>
                <?php if($status_rv == 'pending'){ ?>
                        <div class="product-price-btn" style="display:flex; margin:0px;">
                                <button type="button" style = "width:100px; border-radius:5px; padding:10px; margin-left:50px;" onclick="history.back()">Back</button>
                                <button type="button" style = "width:100px; border-radius:5px; padding:10px;"><a href="<?= URLROOT?>/serviceProviderReservation/confirmReservation?rv_id=<?=$rv_id; ?>&cus_id=<?=$customer_id?>?>" class="buttone" style="color:white; font-family: 'Raleway',sans-serif; text-transform:UPPERCASE">Confirm</a></button>
                                <button type="button" style = "width:100px; border-radius:5px; padding:10px;"><a href="<?= URLROOT?>//serviceProviderReservation/cancelReservation?rv_id=<?=$rv_id; ?>&cus_id=<?=$customer_id?>" class="buttond" style="color:white; font-family: 'Raleway',sans-serif; text-transform:UPPERCASE">Decline</a></button>
                        </div>
                <?php }else{ ?>
                                <div class="product-price-btn">
                                        <button type="button" onclick="history.back()">Back</button>
                                </div>
                <?php } ?> 
               <?php } ?>
               

                <?php foreach ($rvdata as $rvDetails) : ?>
                                <?php $sp_id_arr = explode (",", $rvDetails->sp_id);?>
                                <?php if($rvDetails->rvType == 'package') { ?>
                                <?php foreach ($sp_id_arr as $new_sp_id) : ?>
                                        <?php if ($new_sp_id == $spID) { ?>
                                                <?php foreach ($decorationservicedata as $decodata) : ?>
                                                <?php if ($decodata->service_id == $serviceID && $rvID == $rvDetails->rv_id) { ?>
                                                <h1 style="margin-top:-45px; font-size:2.5rem;"><?= $decodata->service_name;?></h1>
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
                                                                                <td>Decoration Items</td>
                                                                                <td>: <?= $decodata->decoration_item;?></td>
                                                                        </tr>
                                                                        <tr>
                                                                                <td>Theme </td>
                                                                                <td>: <?= $decodata->theme;?></td>
                                                                        </tr>
                                                
                                                                        <tr>
                                                                                <td>Other Decoration Items/Serivces </td>
                                                                                <td>:<?php if(empty($decodata->other_decoration)) echo " None"; else  echo $decodata->other_decoration; ?> </td>
                                                                                
                                                                        </tr>
                                                                        <tr>
                                                                                <td>Price </td>
                                                                                <td>: Rs, <?php echo(number_format($decoPrice[0]->price_deco,2));?></td>
                                                                        </tr>
                                                                        <tr>
                                                                                <td>Payments </td>
                                                                                <td>: <?= $rvDetails->payment;?></td>
                                                                        </tr>
                                                                
                                                                        <?php foreach ($cusdata as $cus) : ?>
                                                                                <?php if ($cus->customer_id == $rvDetails->customer_id) { ?>  
                                                                                        <?php $customer_id = $rvDetails->customer_id; ?>
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
                <?php } ?>
                <?php endforeach; ?>
                <?php if (!empty($status_rv)){ ?>
                <?php if($status_rv == 'pending'){ ?>
                        <?php foreach($packageConfirmationData as $pcd): ?>
                                <?php if($pcd->rv_id == $rv_id){?>
                                        <?php if($pcd->deco_confirmation == Session::getUser('id')) {?>
                                                <div class="product-price-btn">
                                                        <button type="button" onclick="history.back()">Back</button>
                                                </div>
                                        <?php } else {?>
                                                <div class="product-price-btn" style="display:flex; margin:0px;">
                                                <button type="button" style = "width:100px; border-radius:5px; padding:10px; margin-left:50px;" onclick="history.back()">Back</button>
                                                <button type="button" style = "width:100px; border-radius:5px; padding:10px;"><a href="<?= URLROOT?>/serviceProviderReservation/confirmReservationPackage?rv_id=<?=$rv_id; ?>&cus_id=<?=$customer_id?>" class="buttone" style="color:white; font-family: 'Raleway',sans-serif; text-transform:UPPERCASE">Confirm</a></button>
                                                <button type="button" style = "width:100px; border-radius:5px; padding:10px;"> <a href="<?= URLROOT?>/serviceProviderReservation/cancelReservationPackage?rv_id=<?=$rv_id; ?>&cus_id=<?=$customer_id?>" class="buttond" style="color:white; font-family: 'Raleway',sans-serif; text-transform:UPPERCASE">Decline</a></button>
                                                </div>
                                        <?php } ?>
                                <?php } ?>
                        <?php endforeach?>
       
                        <?php }else{ ?>
                               
                                <div class="product-price-btn">
                                        <button type="button" onclick="history.back()">Back</button>
                                </div>
                        <?php } ?> 
                 <?php } ?>
               
               
                </div>
        </div>  
</div>


<!-- footer start -->
<section class="footer" style="margin-top:350px">
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
Created By <span>TruEvent</span> | All Rights Reserved
</div>

</section>

<!-- footer ends -->

</body>

</html>