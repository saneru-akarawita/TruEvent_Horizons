<?php require_once "controllerAdminFunction.php"; ?>
<?php 
$email = $_SESSION['email'];
$password = $_SESSION['password'];
if($email == false || $password == false){
    header('Location: login.php');
}

?>

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
        <link rel="stylesheet" href="./css/admin-add-reservation-style.css">

    </head>
    <body>


<!-- header section starts -->
<section class="header">
<img src="images/logo/logo.jpg" alt="logo" class="logo">
<a href="admin-home.php" class="dashboard">Dashboard</a>

<nav class="navbar">
    <a href="admin-home.php">Home</a>
    <a href="packages.php">Packages</a>
    <a href="admin-add-packages.php">Add Packages</a>
    <a href="logout-user.php">Logout</a>
</nav>

<!-- Gives a Menu Button -->
<button id="menu-btn" class="fas fa-bars"></button>

</section>

<!-- Packages Section starts -->
<section class="packages">
    <h1 class="heading-title">
        Package Details
    </h1>
    <div class="box-container">
    <div class="box1">
        <?php

            if(isset($_GET['package_id'])) {
                $package_id = mysqli_real_escape_string($con, $_GET['package_id']);
                $query = "SELECT * FROM packagedetails WHERE package_id='{$package_id}' ";
                $result = mysqli_query($con, $query);

                if(mysqli_num_rows($result) > 0) {
                    $packagedata = mysqli_fetch_array($result);
        ?>
            <ol style="margin-top:25px;">
                <li style="margin-top:15px;">Package Name :-  <p class="form-control"><?=$packagedata['package_name'];?> </p> </li><br>
                <li style="margin-top:15px;">Package Code :-  <p class="form-control"><?=$packagedata['package_code'];?> </p> </li><br>
                <li style="margin-top:15px;">Price :-  <p class="form-control"><?=$packagedata['price'];?> </p> </li><br>
                
                <br><br>
                <p style="text-decoration:underline; margin-left: 50px; font-weight: bold; font-size: 1.5rem;">Services Included</p><br><br>
                <table>
                    <tr>
                        <th>Band Option</th>
                        <th>Decoration Option</th>
                        <th>Photography Option</th>
                    </tr>
                    <tr>
                        <td><?php if($packagedata['band_choice']) echo $packagedata['band_choice']; else echo "not-included";?></td>
                        <td><?php if($packagedata['deco_choice']) echo $packagedata['deco_choice']; else echo "not-included";?></td>
                        <td><?php if($packagedata['photo_choice']) echo $packagedata['photo_choice']; else echo "not-included";?></td>
                    </tr>
                </table>
            </ol>
        <?php 
            }
            else {
                echo "<h4>No Such Id Found</h4>";
            }
        }
        ?>
    </div>
    </div>

</section>

<!-- Packages Section Ends -->


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

    <script src="./js/adminscript.js"></script>
    </body>
</html>