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


</head>

<body>

    <!-- header section starts -->
    <section class="header">
        <img src="<?php echo URLROOT ?>/public/images/customer/logo/logo.jpg" alt="logo" class="logo">
        <a href="home" class="dashboard">Dashboard</a>

        <nav class="navbar">
            <a href="home">Home</a>
            <a href="viewservices">Services</a>
            <a href="#">Packages</a>
            <a href="viewreservationlog">Reservation Log</a>
            <a href="logout">Logout</a>
        </nav>

        <!-- Gives a Menu Button -->
        <button id="menu-btn" class="fas fa-bars"></button>

    </section>

    <div class="main-container">

        <a href="home" class="top-right-closeBtn white-red-hover"><i class="fal fa-times fa-2x "></i></a>

        <div class="ser-container form-container contentBox" style="width: 60%;">
            <form action="<?php echo URLROOT; ?>/customerReservation/addReservation" method="post" class="form">
                <h1 class="title">Event Feedback Form</h1><br>

                <div class="row">
                    <div class="column">
                        <input type="radio" name="rv_type" id="service" value="service"> Service
                    </div>
                    <div class="column">
                        <input type="radio" name="rv_type" id="package" value="package">
                        Package
                    </div>
                </div>
                <br><br>
                <div class="row">
                    <div class="column">
                        <label class="label" for="service_type">Service Details</label>
                        <select name="service_type" class="dropdownmenu" id="service-details" disabled required>
                            <option value="">Service Provider Type</option>
                            <option value="Hotel">Hotel Service</option>
                            <option value="Decoration">Decoration Service</option>
                            <option value="Band">Band Service</option>
                            <option value="Photography">Photography Service</option>
                        </select>
                    </div>
                    <div class="column">
                        <label class="label" for="hall_type">Pacakage Details</label>
                        <select name="package_type" class="dropdownmenu" id="package-details" disabled required>
                            <option value="">Package Type</option>
                            <option value = "Birthday">Birthday Package</option>
                            <option value = "Anniversary">Anniversary Package</option>
                            <option value = "Coparate Event">Coparate Package</option>
                            <option value = "Graduation Party">Graduation Party Package</option>
                            <option value = "Get-Together">Get-Together Package</option>
                            <option value = "General Event">General Package</option>
                        </select>
                    </div>
                </div>

                <div class="row">
                    <div class="column">
                        <label for="name">Service Name</label>
                        <input class="service_name" type="text" id="service-name" name="service_name" placeholder="Enter Service Name" disabled required>
                    </div>
                    <div class="column">
                        <label for="event name">Pacakage Name</label>
                        <input class="package_name" type="text" id="package-name" name="package_name" placeholder="Enter Package Name" disabled required>
                    </div>
                </div>
                <br><br><hr style="height:2px;border-width:0;color:silver;background-color:silver">
                <div class="text-group">
                    <label for="event name">Event Name</label>
                    <input class="eventname" type="text" name="event_name" placeholder="Name of your Event" >
                </div>

                <div class="text-group">
                    <label for="rvdate">Reservation Date</label>
                    <input class="rvdate" type="date" name="rvdate" placeholder="Select the Date" style="text-transform: none;" >
                </div>

                <div class="text-group">
                    <label for="rvtime">Reservation Time</label><br>
                    <input class="rvtime" type="time" name="rvtime" capture>
                </div>

                <div class="text-group">
                    <label for="customer name">Customer Name</label>
                    <input class="customername" type="text" name="customername" placeholder="Your name" >
                </div>

                <div class="text-group">
                    <label for="contactno">Customer Contact Number</label>
                    <input class="contactno" type="text" name="contactno" placeholder="Your contact number" >
                </div>

                <br><br><hr style="height:2px;border-width:0;color:silver;background-color:silver"><br><br>

                <p style="font-family:Verdana, Geneva, Tahoma, sans-serif; text-align:justify">We truly hope that your event was a success. Our TRUEVENT HORIZONS event planning team provide the best service to our customers 
                    and we hope that you enjoyed your exprience on your day. Please take a few moments to provide us with feedback so that we can 
                    continue to improve our service.</p>
                <br>
                <table style="width:90%">
                    <th>
                        <td><p style="font-family:Verdana, Geneva, Tahoma, sans-serif;">1 - Poor</p></td>
                        <td><p style="font-family:Verdana, Geneva, Tahoma, sans-serif;">2 - Fair</p></td>
                        <td><p style="font-family:Verdana, Geneva, Tahoma, sans-serif;">3 - Good</p></td>
                        <td><p style="font-family:Verdana, Geneva, Tahoma, sans-serif;">4 - Excellent</p></td>
                    </th>
                </table>
                <br><br>
                <table>
                    <tr>
                        <td style="width:65%"><p style="font-family:Verdana, Geneva, Tahoma, sans-serif;">Ease of boooking </p></td>
                        <td><p style="font-family:Verdana, Geneva, Tahoma, sans-serif;"><input type="radio" name="feedbackval1" value="1">1</p></td>
                        <td><p style="font-family:Verdana, Geneva, Tahoma, sans-serif;"><input type="radio" name="feedbackval1" value="2">2</p></td>
                        <td><p style="font-family:Verdana, Geneva, Tahoma, sans-serif;"><input type="radio" name="feedbackval1" value="3">3</p></td>
                        <td><p style="font-family:Verdana, Geneva, Tahoma, sans-serif;"><input type="radio" name="feedbackval1" value="4">4</p></td>
                    </tr>
                    <tr>
                        <td style="width:65%"><p style="font-family:Verdana, Geneva, Tahoma, sans-serif;">Accuracy of service</p></td>
                        <td><p style="font-family:Verdana, Geneva, Tahoma, sans-serif;"><input type="radio" name="feedbackval2" value="1">1</p></td>
                        <td><p style="font-family:Verdana, Geneva, Tahoma, sans-serif;"><input type="radio" name="feedbackval2" value="2">2</p></td>
                        <td><p style="font-family:Verdana, Geneva, Tahoma, sans-serif;"><input type="radio" name="feedbackval2" value="3">3</p></td>
                        <td><p style="font-family:Verdana, Geneva, Tahoma, sans-serif;"><input type="radio" name="feedbackval2" value="4">4</p></td>
                    </tr>
                    <tr>
                        <td style="width:65%"><p style="font-family:Verdana, Geneva, Tahoma, sans-serif;">Value of money</p></td>
                        <td><p style="font-family:Verdana, Geneva, Tahoma, sans-serif;"><input type="radio" name="feedbackval3" value="1">1</p></td>
                        <td><p style="font-family:Verdana, Geneva, Tahoma, sans-serif;"><input type="radio" name="feedbackval3" value="2">2</p></td>
                        <td><p style="font-family:Verdana, Geneva, Tahoma, sans-serif;"><input type="radio" name="feedbackval3" value="3">3</p></td>
                        <td><p style="font-family:Verdana, Geneva, Tahoma, sans-serif;"><input type="radio" name="feedbackval3" value="4">4</p></td>
                    </tr>
                    <tr>
                        <td style="width:65%"><p style="font-family:Verdana, Geneva, Tahoma, sans-serif;">Quality of Service</p></td>
                        <td><p style="font-family:Verdana, Geneva, Tahoma, sans-serif;"><input type="radio" name="feedbackval4" value="1">1</p></td>
                        <td><p style="font-family:Verdana, Geneva, Tahoma, sans-serif;"><input type="radio" name="feedbackval4" value="2">2</p></td>
                        <td><p style="font-family:Verdana, Geneva, Tahoma, sans-serif;"><input type="radio" name="feedbackval4" value="3">3</p></td>
                        <td><p style="font-family:Verdana, Geneva, Tahoma, sans-serif;"><input type="radio" name="feedbackval4" value="4">4</p></td>
                    </tr>
                    <tr>
                        <td style="width:65%"><p style="font-family:Verdana, Geneva, Tahoma, sans-serif;">customer satisfication</p></td>
                        <td><p style="font-family:Verdana, Geneva, Tahoma, sans-serif;"><input type="radio" name="feedbackval5" value="1">1</p></td>
                        <td><p style="font-family:Verdana, Geneva, Tahoma, sans-serif;"><input type="radio" name="feedbackval5" value="2">2</p></td>
                        <td><p style="font-family:Verdana, Geneva, Tahoma, sans-serif;"><input type="radio" name="feedbackval5" value="3">3</p></td>
                        <td><p style="font-family:Verdana, Geneva, Tahoma, sans-serif;"><input type="radio" name="feedbackval5" value="4">4</p></td>
                    </tr>
                </table>
                <br>
                <div class="text-group">
                    <label for="improvement">Suggestions for Improvement</label>
                    <input class="improvement" type="text" name="improvement" placeholder="" >
                </div>
                <br><br>
                <div class="footer-container">
                    <button type="submit" name="action" value = "addrv" class="btn btn-filled btn-theme-purple" style="width:max-content;">Submit Feedback</button>
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
</body>

</html>