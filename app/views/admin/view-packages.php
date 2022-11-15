
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

        <!-- header section starts -->
        <section class="header">
        <img src="<?php echo URLROOT ?>/public/images/admin/logo/logo.jpg" alt="logo" class="logo">
        <a href="home" class="dashboard">Dashboard</a>

        <nav class="navbar">
            <a href="home">Home</a>
            <a href="viewpackages">Packages</a>
            <a href="addpackages">Add Packages</a>
            <a href="logout">Logout</a>
        </nav>

        <!-- Gives a Menu Button -->
        <button id="menu-btn" class="fas fa-bars"></button>


        </section>

        <!-- header section ends -->

        <!-- Packages Section starts -->
        <section class="packages">
            <h1 class="heading-title">
                Best Selling Packages
            </h1>
            <div class="box-container">

                <?php foreach ($data as $pDetails) : ?>
                    <div class="box">
                        <div class="image">
                            <?php echo "<img src = '".URLROOT."/public/images/admin/admin-add-packages/image".rand(4,9).".jpg'>";?>
                        </div>
                        <div class="content">
                            <h3 style="font-size:medium"><?= $pDetails->package_name; ?> </h3>
                            <p style="font-size:small" >Plan your <?= $pDetails->package_type; ?> </p><br>
                                <a href="viewEachPackage?package_id=<?=$pDetails->package_id; ?>" class="viewButton" name="viewaction" value="view" style="text-decoration:none">View</a>
                                <a href="editPackage?package_id=<?=$pDetails->package_id; ?>" class="editButton" name="editaction" value="edit" style="text-decoration:none">Edit</a>
                                <a href="deletePackage?package_id=<?=$pDetails->package_id; ?>" class="deleteButton" name="deleteaction" value="delete" style="text-decoration:none">Delete</a>
                        </div>
                    </div>
                <?php endforeach; ?>

            </div>

            <div class="load-more"> <span class="btn">Load More</span></a></div>
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