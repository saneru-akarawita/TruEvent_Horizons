<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TruEvent Horizons -  View Each Service - Decoration Company</title>
    <link rel="stylesheet" href="<?php echo URLROOT ?>/public/css/hotel manager/styles-hotel.css">
    <link rel="stylesheet" href="<?php echo URLROOT ?>/public/css/hotel manager/style.css">
    <link rel="stylesheet" href="<?php echo URLROOT ?>/public/css/hotel manager/hotel.css">
    <link href="https://fonts.googleapis.com/css?family=Bentham|Playfair+Display|Raleway:400,500|Suranna|Trocchi" rel="stylesheet">

    <!-- font awesome cdn link -->
    <link rel="stylesheet" href=<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
<?php require APPROOT . "/views/decoCompany/header-deco.php" ?>


        <div class="wrapper">
            <div class="product-img">
              <img src="<?php echo URLROOT ?>/public/images/deco company/deco-add-services/deco1.jpg" height="100%" max-width="100%">
            </div>
            <div class="product-info">
              <div class="product-text">
                <h1><?= $data->service_name;?></h1><br>
                <h2><?= Session::getUser('name')?></h2>
                <div class="description">
                    <table id="details12">
                    <tr>
                        <td>Theme</td>
                        <td>: <?= $data->theme;?></td>
                    </tr>
                    <tr>
                        <td>Decoration Items</td>
                        <td>: <?= $data->decoration_item;?></td>
                    </tr>
                    <tr>
                        <td>Other Decorations</td>
                        <td>: <?php if(empty($data->other_decorations)) echo " None"; else  echo $data->other_decorations; ?> </td>
                    </tr>
                    </table>
                    <br>
                    <span style="margin-left:45px"><?= $data->price;?> LKR</span>
                </div>
                <br><br>
                <div class="product-price-btn">
                    <button type="button" onclick="history.back()">Back</button>
                </div>
              </div>
            </div>
        </div>


        <!-- footer start -->
<section class="footer">
    <div class="overlay"></div>
    <div class="box-container">
        <div class="box">
            <h3>Quick Access</h3>
        <a href="home"><i class="fas fa-angle-right"></i>  Home</a>
        <a href="viewservices"><i class="fas fa-angle-right"></i> Services</a>
        <a href="addservices"><i class="fas fa-angle-right"></i> Add Services</a>
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
    

    <script src="<?php echo URLROOT ?>/public/js/hotel manager/hotelscript.js"></script>    
</body>
</html>