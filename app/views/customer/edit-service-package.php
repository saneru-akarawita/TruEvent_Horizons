<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer Edit Reservation</title>

    <!-- font awesome cdn link -->
    <link rel="stylesheet" href=<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- custom css file link -->
    <link rel="stylesheet" href="<?php echo URLROOT ?>/public/css/customer/customer.css">
    <link rel="stylesheet" href="<?php echo URLROOT ?>/public/css/customer/styles-hotel.css" />
    <link rel="stylesheet" href="<?php echo URLROOT ?>/public/css/customer/style.css" />
</head>

<body>
<?php require APPROOT . "/views/customer/header-customer.php" ?>


        <!-- Gives a Menu Button -->
        <button id="menu-btn" class="fas fa-bars"></button>

    <!-- </section> -->

    <div class="main-container">

        <a href="home" class="top-right-closeBtn white-red-hover"><i class="fal fa-times fa-2x "></i></a>

        <div class="ser-container form-container contentBox">

            <form action="<?php echo URLROOT; ?>/customerReservation/editReservation" method="post" class="form">
                <h1 class="title">Edit Reservation</h1>


                <div class="text-group">
                    <label for="event name">Event Name</label>
                    <input class="eventname" type="text" name="event_name" value="<?php echo $data['event_name']; ?>" >
                    <span class="error"><?php echo $data['event_name_error']; ?></span>
                </div>

                <div class="text-group">
                    <label for="rvdate">Reservation Date</label>
                    <input class="rvdate" type="date" name="rvdate" id="date_picker" value="<?php echo $data['rvdate']; ?>" style="text-transform: none;" >
                    <span class="error"><?php echo $data['rvdate_error']; ?></span>
                </div>

                <div class="text-group">
                    <label for="rvtime">Reservation Time</label><br>
                    <input class="rvtime" type="time" name="rvtime" capture value="<?php echo $data['rvtime']; ?>">
                    <span class="error"><?php echo $data['rvtime_error']; ?></span>
                </div>

                <input type="hidden" id="rv_id" name="rv_id" value="<?php echo $data['rv_id']; ?>">

                <div class="footer-container">
                    <button type="submit" name="action" value = "editrv" class="btn btn-filled btn-theme-purple">Edit Reservation</button>
                </div>

            </form>

        </div>
    </div>


    <!-- footer start -->
    <section class="footer">
        <div class="overlay"></div>
        <div class="box-container">
            <div class="box">
                <h3>Quick Access</h3>
                <a href="home"><i class="fas fa-angle-right"></i> Home</a>
                <a href="#"><i class="fas fa-angle-right"></i> Packages</a>
                <a href="#"><i class="fas fa-angle-right"></i> Add Packages</a>
            </div>

            <div class="box">
                <h3>Extra</h3>
                <a href="#"><i class="fas fa-angle-right"></i> About US</a>
                <a href="#"><i class="fas fa-angle-right"></i> Privacy Policy</a>
                <a href="#"><i class="fas fa-angle-right"></i> Ask Questions</a>
            </div>

            <div class="box">
                <h3>Contact Us</h3>
                <a href="#"><i class="fas fa-phone"></i> +94 123-456-789</a>
                <a href="#"><i class="fas fa-envelop"></i> TruEvent@gmail.com</a>
                <a href="#"><i class="fas fa-map"></i> Colombo</a>

            </div>

            <div class="box">
                <h3>Follow US</h3>
                <a href="#"><i class="fab fa-facebook"></i> facebook</a>
                <a href="#"><i class="fab fa-instagram"></i> instagram</a>
                <a href="#"><i class="fab fa-linkedin"></i> linkedin</a>

            </div>
        </div>


        <div class="credit">
            Created By <span>TruEvent</span> | All Rights Reserved
        </div>

    </section>

    <!-- footer ends -->

    <!-- custom js file link -->
    <script src="<?php echo URLROOT ?>/public/js/customer/customerscript.js"></script>
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
    <script type="text/javascript" src="https://code.jquery.com/jquery-1.7.2.min.js"></script>

    <script language="javascript">
        var today = new Date();
        var dd = String(today.getDate()).padStart(2, '0');
        var mm = String(today.getMonth() + 1).padStart(2, '0');
        var yyyy = today.getFullYear();

        today = yyyy + '-' + mm + '-' + dd;
        $('#date_picker').attr('min',today);
    </script>
</body>

</html>