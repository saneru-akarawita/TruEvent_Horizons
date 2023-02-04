<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" />
        <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" />
        <script src="https://kit.fontawesome.com/c02eb7591c.js" crossorigin="anonymous"></script>

        <link rel="stylesheet" href="<?php echo URLROOT ?>/public/css/footer.css" />
        <link rel="stylesheet" href="<?php echo URLROOT ?>/public/css/deco company/styles-hotel.css">

   <link rel="shortcut icon" type="image/x-icon" href="./logo/logo.png">
   <title>TruEvent Horizons - Generate Report - Admin</title>
</head>

<body>
<?php require APPROOT . "/views/admin/header-admin.php" ?>
         
        <div class="main-content">

                        <div class="text-group4">
                                <label for="month" style="font-size:18px; font-weight:500;">Month</label>
                                <input type="date">
                
                        </div>  
                       
                <div class="tabledetails2">
                <h2>Report Details</h2>
                <table>
                        <tr>
                                <th>Service ID</th>
                                <th>Service Type</th>
                                <th>Service Provider Name</th>
                                <th>No of Reservations</th>
                                <th>Income</th>
                        </tr>
                </table>
        </div>
                
        </div> 
        
         <!-- footer start -->
    <section class="footer">
        <div class="overlay"></div>
        <div class="box-container">
            <div class="box">
                <h3>Quick Access</h3>
            <a href="admin-home.php"><i class="fas fa-angle-right"></i>  Home</a>
            <a href="packages.php"><i class="fas fa-angle-right"></i> Packages</a>
            <a href="admin-add-packages.php"><i class="fas fa-angle-right"></i> Add Packages</a>
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
            Created By <span>TruEvent Horizon</span> | All Rights Reserved
        </div>
    
    </section>
    
    
    <!-- footer ends -->
</body>


</html>