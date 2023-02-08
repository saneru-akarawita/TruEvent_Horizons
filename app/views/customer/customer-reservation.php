<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer Add Reservation</title>

    <!-- font awesome cdn link -->
    <link rel="stylesheet" href=<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- custom css file link -->
    <link rel="stylesheet" href="<?php echo URLROOT ?>/public/css/customer/customer.css">
    <link rel="stylesheet" href="<?php echo URLROOT ?>/public/css/customer/styles-hotel.css" />
    <link rel="stylesheet" href="<?php echo URLROOT ?>/public/css/customer/style.css" />
    <link rel="stylesheet" href="<?php echo URLROOT ?>/public/css/customer/calender.css" />

</head>

<body>
<?php require APPROOT . "/views/customer/header-customer.php" ?>

    <!-- header section starts -->
    <!-- <section class="header">
        <img src="<?php echo URLROOT ?>/public/images/customer/logo/logo.jpg" alt="logo" class="logo">
        <a href="home" class="dashboard">Dashboard</a>

        <nav class="navbar">
            <a href="home">Home</a>
            <a href="viewservices">Services</a>
            <a href="#">Packages</a>
            <a href="viewreservationlog">Reservation Log</a>
            <a href="logout">Logout</a>
        </nav> -->

        <!-- Gives a Menu Button -->
        <button id="menu-btn" class="fas fa-bars"></button>

    <!-- </section> -->

    <div class="main-container">

        <a href="home" class="top-right-closeBtn white-red-hover"><i class="fal fa-times fa-2x "></i></a>

        <div class="ser-container form-container contentBox">

        <?php if($data[0]=='Hotel'||$data[0]=='Band'||$data[0]=='Decoration'||$data[0]=='Photography'){?>

            <form action="<?php echo URLROOT; ?>/customerReservation/addReservation" method="post" class="form">
                <h1 class="title">Add Reservation</h1>

                <div class="column display-flex-jcsb">
                    <div class="column">
                        Service
                        <input type="radio" class="rv_type" name="rv_type" id="service" value="service" checked>
                    </div>
                    <div class="column">
                        <input type="radio" class="rv_type" name="rv_type" id="package" value="package" disabled>
                        Package
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="column" id="service-details-col">
                        <label class="label" for="service_type">Service Details</label>
                        <select name="service_type" class="dropdownmenu" id="service-details" required>
                            <option value="">Service Provider Type</option>
                            <option value="Hotel" <?php if($data[0]=='Hotel') echo 'selected'?>>Hotel Service</option>
                            <option value="Decoration" <?php if($data[0]=='Decoration') echo 'selected'?>>Decoration Service</option>
                            <option value="Band" <?php if($data[0]=='Band') echo 'selected'?>>Band Service</option>
                            <option value="Photography" <?php if($data[0]=='Photography') echo 'selected'?>>Photography Service</option>
                        </select>
                    </div>
                </div>

                <div class="row">
                    <div class="column" id="service-name-col">
                        <label for="name" >Service Name</label>
                        <input class="service_name" type="text" id="service-name" name="service_name" placeholder="Enter Service Name" value="<?php echo $data[1]?>" required>
                    </div>
                </div>
                <br><br><hr style="height:2px;border-width:0;color:silver;background-color:silver">
                <div class="text-group">
                    <label for="event name">Event Name</label>
                    <input class="eventname" type="text" name="event_name" placeholder="Name of your Event" required>
                    <span class="error"><?php echo $data[2]['event_name_error']; ?></span>
                </div>

                <div class="text-group">
                    <label for="rvdate">Reservation Date</label>
                    <input class="rvdate" type="date" name="rvdate" id="date_picker" placeholder="Select the Date" style="text-transform: none;" required>
                    <span class="error"><?php echo $data[2]['rvdate_error']; ?></span>
                </div>

                <div class="text-group">
                    <label for="rvtime">Reservation Time</label><br>
                    <input class="rvtime" type="time" name="rvtime" capture required>
                    <span class="error"><?php echo $data[2]['rvtime_error']; ?></span>
                </div>

                <input class="rvdate" type="hidden" name="sp_id" id="sp_id" value="<?php echo $data[2]['svp_id']?>" style="text-transform: none;">
                <input class="rvdate" type="hidden" name="price" id="price" value="<?php echo $data[2]['price']?>" style="text-transform: none;">
                <input class="rvdate" type="hidden" name="service_id" id="service_id" value="<?php echo $data[2]['service_id']?>" style="text-transform: none;">

                <div class="footer-container">
                    <button type="submit" name="action" value = "addrv" class="btn btn-filled btn-theme-purple">Add Reservation</button>
                </div>

            </form>

        <?php }else{?>

            <form action="<?php echo URLROOT; ?>/customerReservation/addReservation" method="post" class="form">
                <h1 class="title">Add Reservation</h1>

                <div class="column display-flex-jcsb">
                    <div class="column">
                        Service
                        <input type="radio" class="rv_type" name="rv_type" id="service" value="service" disabled>
                    </div>
                    <div class="column">
                        <input type="radio" class="rv_type" name="rv_type" id="package" value="package" checked>
                        Package
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="column" id="package-details-col">
                        <label class="label" for="hall_type">Package Details</label>
                        <select name="package_type" class="dropdownmenu" id="package-details"  required >
                            <option value="">Package Type</option>
                            <option value = "Birthday" <?php if($data[0]=='Birthday') echo 'selected'?>>Birthday Package</option>
                            <option value = "Anniversary" <?php if($data[0]=='Anniversary') echo 'selected'?>>Anniversary Package</option>
                            <option value = "Coparate Event" <?php if($data[0]=='Coparate Event') echo 'selected'?>>Coparate Package</option>
                            <option value = "Graduation Party" <?php if($data[0]=='Graduation Party') echo 'selected'?>>Graduation Party Package</option>
                            <option value = "Get-Together" <?php if($data[0]=='Get-Together') echo 'selected'?>>Get-Together Package</option>
                            <option value = "General Event" <?php if($data[0]=='General Event') echo 'selected'?>>General Package</option>
                        </select>
                    </div>
                </div>

                <div class="row">
                    <div class="column" id="package-name-col">
                        <label for="event name">Pacakage Name</label>
                        <input class="package_name" type="text" id="package-name" name="package_name" placeholder="Enter Package Name" value="<?php echo $data[1]?>" required>
                    </div>
                </div>
                <br><br><hr style="height:2px;border-width:0;color:silver;background-color:silver">
                <div class="text-group">
                    <label for="event name">Event Name</label>
                    <input class="eventname" type="text" name="event_name" placeholder="Name of your Event" required>
                    <span class="error"><?php echo $data[2]['event_name_error']; ?></span>
                </div>

                <div class="text-group">
                    <label for="rvdate">Reservation Date</label>
                    <input class="rvdate" type="date" name="rvdate" id="date_picker" placeholder="Select the Date" style="text-transform: none;" required>
                    <span class="error"><?php echo $data[2]['rvdate_error']; ?></span>
                </div>

                <div class="text-group">
                    <label for="rvtime">Reservation Time</label><br>
                    <input class="rvtime" type="time" name="rvtime" capture required>
                    <span class="error"><?php echo $data[2]['rvtime_error']; ?></span>
                </div>

                <input class="rvdate" type="hidden" name="spv_id_string" id="sp_id" value="<?php echo $data[2]['svp_id_string']?>" style="text-transform: none;">
                <input class="rvdate" type="hidden" name="price" id="price" value="<?php echo $data[2]['price']?>" style="text-transform: none;">
                <input class="rvdate" type="hidden" name="package_id" id="package_id" value="<?php echo $data[2]['package_id']?>" style="text-transform: none;">

                <div class="footer-container">
                    <button type="submit" name="action" value = "addrv" class="btn btn-filled btn-theme-purple">Add Reservation</button>
                </div>

            </form>

        <?php }?>

        </div>
        <div class="calender_body">
        <div id="calendar"></div>
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
                <a href="#"><i class="fa-solid fa-envelope"></i> TruEvent@gmail.com</a>
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
    <script src="//cdnjs.cloudflare.com/ajax/libs/moment.js/2.5.1/moment.min.js"></script>
    <script src="<?php echo URLROOT ?>/public/js/customer/customerscript.js"></script>
    <script src="<?php echo URLROOT ?>/public/js/customer/calender.js"></script>


    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
    <script type="text/javascript" src="https://code.jquery.com/jquery-1.7.2.min.js"></script>
    <script type="text/javascript">
        $(function () {
            $(".rv_type").change(function () {
                if ($(this).val() == 'service') {
                    $("#package-name-col").hide();
                    $("#package-details-col").hide();
                    $("#service-details-col").show();
                    $("#service-name-col").show();
                } else if ($(this).val() == 'package') {
                    $("#service-name-col").hide();
                    $("#service-details-col").hide();
                    $("#package-name-col").show();
                    $("#package-details-col").show();
                }
            });
        });
    </script>
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