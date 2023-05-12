<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo URLROOT ?>/public/css/deco company/serviceslist.css">
    <title>TruEvent Horizons - Services List - Band</title>


        <!-- font awesome cdn link -->
        <link rel="stylesheet" href=<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>
<body>
<?php require APPROOT . "/views/band/header-band.php" ?>

<button id="menu-btn" class="fas fa-bars"></button>
 
<section class="packages">
    <h1 class="heading-title">My Music Services</h1>

    <div class="box-container">

    <?php foreach ($data as $bsDetails) : ?>
        <?php if($bsDetails->active == 1) {?>
        <div class="box">
            <div class="image">
                <img src="<?= URLROOT ?>/public/images/uploadimages/band/<?= $bsDetails->band_img ?>">
            </div>
            <div class="content">
                <h3 style="font-size:medium">Ideal for <?= $bsDetails->service_name; ?> </h3>
                <p style="font-size:small" >Plan your <?= $bsDetails->service_name; ?> </p><br>
                <button class="viewButton" style="margin-left:-4px;"><a href="viewEachService?service_id=<?=$bsDetails->service_id; ?>"  name="viewaction" value="view" style="color:white; font-weight:550;">View</a></button>
                <button class="editButton"><a href="editService?service_id=<?=$bsDetails->service_id; ?>"  name="editaction" value="edit" style="color:white; font-weight:550;">Edit</a></button>
                <button class="deleteButton"><a href="deactivate?service_id=<?=$bsDetails->service_id; ?>"  name="deleteaction" value="delete" style="color:white; font-weight:550;">Disable</a></button>
            </div>
        </div>
        <?php } else { ?>
                <div class="box" style="height: 400px;">
                <div class="image">
                    <?php echo "<img src = '".URLROOT."/public/images/disable". ".jpg'>";?>
                </div>
                <div class="content">
                    <h3 style="font-size:medium">Ideal for <?= $bsDetails->service_name; ?> </h3>
                    <p style="font-size:small" >Starting from   <?= $bsDetails->service_name; ?></p><br>
                    
                    <button class="viewButton" style="height:40px"><a href="activate?service_id=<?=$bsDetails->service_id; ?>" name="enableaction" value="enable" style="color:white; font-weight:550;">Enable</a></button>
                    <!-- <button class="deleteButton" style="height:40px;"><a href="deleteService?service_id=<?=$bsDetails->service_id; ?>" name="deleteaction" value="delete" style="color:white; font-weight:550;">Delete</a></button> -->
                </div>
            </div>
            <?php }?>
    <?php endforeach; ?>
 
    </div>

</section>


        <!-- footer start -->
        <section class="footer">
            <div class="overlay"></div>
            <div class="box-container">
                <div class="box">
                    <h3>Quick Access</h3>
                <a href="home"><i class="fas fa-angle-right"></i>  Home</a>
                <a href="viewservices"><i class="fas fa-angle-right"></i> Services</a>
                <a href="addservices"><i class="fas fa-angle-right"></i>Packages</a>
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
    <script src="<?php echo URLROOT ?>/public/js/band/bandscript.js"></script>
<!-- Code segment required for toast notifications -->
<?php require APPROOT . "/views/inc/toast.php" ?>

</body>
</html>