
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>View Packages</title>

        <!-- font awesome cdn link -->
        <link rel="stylesheet" href=<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />

        <!-- custom css file link -->
        <link rel="stylesheet" href="<?php echo URLROOT ?>/public/css/admin/admin-add-reservation-style.css">
    </head>
    <body>
    <?php require APPROOT . "/views/admin/header-admin.php" ?>

        <!-- header section starts -->
        <!-- <section class="header">
        <img src="<?php echo URLROOT ?>/public/images/admin/logo/logo.jpg" alt="logo" class="logo">
        <a href="home" class="dashboard">Dashboard</a>

        <nav class="navbar">
            <a href="home">Home</a>
            <a href="viewpackages">Packages</a>
            <a href="addpackages">Add Packages</a>
            <a href="logout">Logout</a>
        </nav> -->

        <!-- Gives a Menu Button -->
        <button id="menu-btn" class="fas fa-bars"></button>


        <!-- </section> -->

        <!-- header section ends -->

        <!-- Packages Section starts -->
        <section class="packages">
            <h1 class="heading-title">
                Best Selling Packages
            </h1>
            <div class="box-container">

                <?php foreach ($data as $pDetails) : ?>
                    <?php if($pDetails->active == 1) {?>
                    <div class="box">
                        <div class="image">
                            <?php echo "<img src = '".URLROOT."/public/images/admin/packages/$pDetails->package_type/".rand(1,1).".jpg'>";?>
                        </div>
                        <div class="content">
                            <h3 style="font-size:medium"><?= $pDetails->package_name; ?> </h3>
                            <p style="font-size:small" >Plan your <?= $pDetails->package_type; ?> </p><br>
                                <button class="viewButton" style="margin-left:-4px;"><a href="viewEachPackage?package_id=<?=$pDetails->package_id; ?>"  name="viewaction" value="view" style="color:white; font-weight:550;">View</a></button>
                                <button class="editButton"><a href="editPackage?package_id=<?=$pDetails->package_id; ?>"  name="editaction" value="edit" style="color:white; font-weight:550;">Edit</a></button>
                                <button class="deleteButton"><a href="deletePackage?package_id=<?=$pDetails->package_id; ?>"  name="deleteaction" value="delete" style="color:white; font-weight:550;">Delete</a></button>
                        </div>
                    </div>
                    <?php } else { ?>
                <div class="box" style="height: 400px;">
                <div class="image">
                    <?php echo "<img src = '".URLROOT."/public/images/disable". ".jpg'>";?>
                </div>
                <div class="content">
                <h3 style="font-size:medium"><?= $pDetails->package_name; ?> </h3>
                            <p style="font-size:small" >Plan your <?= $pDetails->package_type; ?> </p><br>
                    
                    <button class="viewButton" style="height:40px"><a href="activate?service_id=<?=$pDetails->package_id; ?>" name="enableaction" value="enable" style="color:white; font-weight:550;">Enable</a></button>
                    <button class="deleteButton" style="height:40px;"><a href="deleteService?service_id=<?=$pDetails->package_id; ?>" name="deleteaction" value="delete" style="color:white; font-weight:550;">Delete</a></button>
                </div>
            </div>
            <?php }?>
                <?php endforeach; ?>

            </div>

            
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

            <!-- custom js file link -->
            <script src="<?php echo URLROOT ?>/public/js/admin/adminscript.js"></script>
    </body>
</html>