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
<?php require APPROOT . "/views/customer/header-customer.php" ?>

<?php $serviceID = $data[0]; ?>
<?php $serviceTYPE = $data[1]; ?>
<?php $spID = $data[2]; ?>
<?php $rvID = $data[3]; ?>
<?php $rvdata = $data[4]; ?>
<?php $serviceproviderdetails = $data[5]; ?>
<?php $servicedetails = $data[6]; ?>


<div class="wrapper" style="margin-bottom:330px;">

        <div class="product-img" style="height:500px;">
                <img src="<?php echo URLROOT ?>/public/images/hotel manager/figma images/bdy - photo.jpg" height="100%" max-width="100%">
        </div>

        <div class="product-info">
                <div class="product-text" style="height:1000px; width:500px;">
                        <?php foreach ($rvdata as $rvDetails) : ?>
                                <?php foreach ($serviceproviderdetails as $spdetails) : ?>
                                        <?php if ($spdetails->service_provider_id == $spID) { ?>
                                                        <?php foreach ($servicedetails as $servicedata) : ?>
                                                                <?php if ($servicedata->service_id == $serviceID && $rvID == $rvDetails->rv_id) { ?>
                                                                <h1 style="margin-top:-45px; font-size:2.5rem;"><?= $servicedata->service_type;?></h1>
                                                                <h2><?= $spdetails->company_name;?>  ||  Reservation ID - <?= $rvDetails->rv_id;?></h2>
                        
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
                                                                                                <td>Hall Name </td>
                                                                                                <td>: <?= $servicedata->hall_name;?></td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                                <td>Location </td>
                                                                                                <td>: <?= $servicedata->location;?></td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                                <td>Hall Type </td>
                                                                                                <td>: <?= $servicedata->hall_type;?></td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                                <td>Air Condition Status </td>
                                                                                                <td>: <?php if($servicedata->ac_status) echo "Available"; else echo "Non-Available";?></td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                                <td>Max Crowd </td>
                                                                                                <td>: <?= $servicedata->max_crowd;?></td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                                <td>Other Facilities </td>
                                                                                                <td>:<?php if(empty($servicedata->other_facilities)) echo " None"; else  echo $servicedata->other_facilities; ?> </td>
                                                                                                
                                                                                        </tr>
                                                                                        <tr>
                                                                                                <td>Price </td>
                                                                                                <td>: <?= $servicedata->price;?> per head</td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                                <td>Payments </td>
                                                                                                <td>: <?= $rvDetails->payment;?></td>
                                                                                        </tr>
                                                                                
                                                                        </table>
                                
                                                                </div>
                                                        <?php } ?>
                                                <?php endforeach; ?>
                                                <?php } ?>
                                        <?php endforeach; ?>
                                        <?php endforeach; ?>
                             
               

                <div class="product-price-btn">
                        <button type="button" onclick="history.back()">Back</button>
                </div>
                </div>
        </div>  
</div>


<?php foreach ($serviceproviderdetails as $spdetails) : ?>
        <?php if ($spdetails->service_provider_id == $spID) { ?>
                <?php require APPROOT . "/views/customer/hotelServiceFooter.php" ?>
                <?php } ?>
 <?php endforeach; ?>

<!-- footer ends -->

</body>

</html>