<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo URLROOT ?>/public/css/hotel manager/styles-hotel.css">
    <link rel="stylesheet" href="<?php echo URLROOT ?>/public/css/hotel manager/style.css">
    <link rel="stylesheet" href="<?php echo URLROOT ?>/public/css/hotel manager/hotel.css">
    <link href="https://fonts.googleapis.com/css?family=Bentham|Playfair+Display|Raleway:400,500|Suranna|Trocchi" rel="stylesheet">
    <title>TruEvent Horizon View Decoration Details - Admin</title>
    <!-- font awesome cdn link -->
    <link rel="stylesheet" href=<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
<?php require APPROOT . "/views/admin/header-admin.php" ?>

<?php $serviceID = $data[0]; ?>
<?php $data1 = $data[1]; ?>
<?php $data2 = $data[2]; ?>

        <div class="wrapper">
            <div class="product-img">
              <img src="<?php echo URLROOT ?>/public/images/footerimage4.jpg" height="100%" max-width="100%">
            </div>
            <div class="product-info">
              <div class="product-text">
              <?php foreach ($data2 as $dsDetails) : ?>
                <?php $serviceProviderID = $dsDetails->service_provider_id; ?>

                <?php foreach ($data1 as $spdetails) : ?>
                    <?php if ($spdetails->service_provider_id == $serviceProviderID) { ?>
                    <?php $spName = $spdetails->company_name;
                    } ?>
                    <?php endforeach; ?>
                    <?php if($dsDetails->service_id == $serviceID) { ?> 
                <h1><?= $dsDetails->service_name;?></h1><br>
                <h2><?php echo $spName ?></h2>
                <div class="description">
                  <table id="details12">
                    <tr>
                      <td>Theme </td>
                      <td>:<?= $dsDetails->theme;?></td>
                    </tr>
                    <tr>
                      <td>Decoration items </td>
                      <td>:<?= $dsDetails->decoration_item;?></td>
                    </tr>
                    <tr>
                      <td>Other Decorations </td>
                      <td>:<?php if(empty($dsDetails->other_decorations)) echo " None"; else  echo $dsDetails->other_decorations; ?> </td>
                    </tr>
                  </table>
                  <br><br>
                <span style="margin-left:45px"><?= $dsDetails->price;?> LKR</span>
                    </div>
              
              <?php } ?>
            <?php endforeach; ?>
              </div>
            </div>
        </div>


<?php foreach ($data1 as $spdetails) : ?>
    <?php if ($spdetails->service_provider_id == $serviceProviderID) { ?>
                <?php require APPROOT . "/views/customer/decoServiceFooter.php" ?>
                <?php } ?>
<?php endforeach; ?>
<!-- footer ends -->
    

    <script src="<?php echo URLROOT ?>/public/js/hotel manager/hotelscript.js"></script>    
</body>
</html>