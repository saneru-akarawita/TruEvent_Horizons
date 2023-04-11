<html>

<head>
    <!-- font awesome cdn link -->
    <link rel="stylesheet" href=<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" href="<?php echo URLROOT ?>/public/css/payment/styles-hotel.css" />
    <link rel="stylesheet" href="<?php echo URLROOT ?>/public/css/payment/style.css" />
    <link rel="stylesheet" href="<?php echo URLROOT ?>/public/css/payment/customer.css" />
    <link rel="stylesheet" href="<?php echo URLROOT ?>/public/css/payment/stylepayments.css" />
    <link rel="stylesheet" href="<?php echo URLROOT ?>/public/css/footer.css" />


    <script>
        function change_tab(id) {
            document.getElementById("page_content").innerHTML = document.getElementById(id + "_desc").innerHTML;
            document.getElementById("page1").className = "notselected";
            document.getElementById("page2").className = "notselected";

            document.getElementById(id).className = "selected";
        }
    </script>

</head>

<body>
    <?php require APPROOT . "/views/customer/header-customer.php" ?>

    <?php $pending = $data[0];
    $complete = $data[1];
    $rvdetails = $data[2]; ?>

    <div id="main_content">

        <div id="li-list" style="margin-left:35px;">
            <li class="selected" id="page1" onclick="change_tab(this.id);">Pending Payments</li>
            <li class="notselected" id="page2" onclick="change_tab(this.id);">Complete Payments</li>
        </div>

        <div class='hidden_desc' id="page1_desc">

            <!-- Main Start -->

            <main class="main">
                <div class="wrapper">

                    <div class="hero" style="width:2000px">

                        <div class="hero-heading">
                            <h3>Pending Payments <i class="bx bx-chevron-down"></i> </h3>
                        </div>


                        <div class="project" style="justify-content:normal; width:100%">

                            <?php foreach ($pending as $pendings) : ?>
                                <div class="col" style="margin-left:20px">
                                    <div class="project-card">
                                        <main class="order__summary">
                                            <!-- div for hero image -->
                                            <div class="order__summary-image">
                                                <img src="<?php echo URLROOT ?>/public/images/payment.gif " aria-hidden="true" alt="hero" />
                                            </div>
                                            <!-- Main content start -->
                                            <br>
                                            <h1>Reservation ID : <?= $pendings->rv_id ?></h1>
                                            <p class="description">
                                                <?php foreach ($rvdetails as $rvdetail) : ?>
                                                    <?php if ($rvdetail->rv_id == $pendings->rv_id) { ?>
                                                        <?php $name = $rvdetail->eventName; ?>
                                                        <?php $content = $rvdetail->eventName . "-" . $rvdetail->rvType; ?>
                                                    <?php } ?>
                                                <?php endforeach; ?>
                                                <?= $content ?>
                                            </p>

                                            <!-- div for order plan -->
                                            <div class="order__summary-plan" style="justify-content:normal; width:95%">
                                                <img src="<?php echo URLROOT ?>/public/images/money-icon.png" aria-hidden="true" alt="music" />
                                                <div class="plan" style="margin-left: 25px">
                                                    <h3 style="font-size:18px">LKR. <?= number_format($pendings->rem_price, 2, '.', '') ?></h3>
                                                    <?php if ($pendings->ad_flag == 0) { ?>
                                                        <p style="font-size:14px">Ad. <?= number_format($pendings->ad_price, 2, '.', '') ?></p>
                                                    <?php } ?>
                                                </div>

                                            </div>
                                            <?php if ($pendings->ad_flag == 0) { ?>
                                                <button onclick='payNow(<?= $pendings->payment_id ?>,<?= $pendings->rv_id ?>,<?= $pendings->ad_price ?>,"Admin","advance")'>Proceed to Advance Payment</button>
                                            <?php } else { ?>
                                                <br>
                                            <?php } ?>
                                            <button onclick='payNow(<?= $pendings->payment_id ?>,<?= $pendings->rv_id ?>,<?= $pendings->rem_price ?>,"Admin","full")'>Proceed to Full Payment</button>
                                        </main>

                                    </div>
                                </div>
                            <?php endforeach; ?>

                        </div>
                    </div>
                </div>
            </main>

        </div>

        <div class='hidden_desc' id="page2_desc">
            <!-- Main Start -->

            <main class="main">
                <div class="wrapper">

                    <div class="hero" style="width:2000px">


                        <div class="hero-heading">
                            <h3>Complete Payments <i class="bx bx-chevron-down"></i> </h3>
                        </div>


                        <div class="project" style="justify-content:normal; width:100%">
                            <?php foreach ($complete as $completes) : ?>
                                <div class="col" style="margin-left:20px">
                                    <div class="project-card">
                                        <main class="order__summary">
                                            <!-- div for hero image -->
                                            <div class="order__summary-image">
                                                <img src="<?php echo URLROOT ?>/public/images/payment.gif " aria-hidden="true" alt="hero" />

                                            </div>
                                            <!-- Main content start -->
                                            <br>
                                            <h1>Order Summary</h1>
                                            <br>
                                            <p class="description">
                                                <?php foreach ($rvdetails as $rvdetail) : ?>
                                                    <?php if ($rvdetail->rv_id == $completes->rv_id) { ?>
                                                        <?php $content = $rvdetail->eventName . "-" . $rvdetail->rvType; ?>
                                                    <?php } ?>
                                                <?php endforeach; ?>

                                                Payment Completed under the Reservation Name <br>
                                                "<?= $content ?>"
                                            </p>
                                            <br>
                                            <!-- div for order plan -->
                                            <div class="order__summary-plan" style="justify-content:normal; width:95%">
                                                <img src="<?php echo URLROOT ?>/public/images/money-icon.png" aria-hidden="true" alt="music" />
                                                <div class="plan" style="margin-left:25px">
                                                    <h3 style="font-size:18px">LKR. <?= number_format($completes->full_price, 2, '.', '') ?></h3>
                                                </div>

                                            </div>
                                        </main>

                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            </main>
        </div>


        <div id="page_content">
            <!-- Main Start -->

            <main class="main">
                <div class="wrapper">


                    <div class="hero" style="width:2000px">


                        <div class="hero-heading">
                            <h3>Pending Payments <i class="bx bx-chevron-down"></i> </h3>
                        </div>


                        <div class="project" style="justify-content:normal;width:100%">

                            <?php foreach ($pending as $pendings) : ?>
                                <div class="col" style="margin-left:20px">
                                    <div class="project-card">
                                        <main class="order__summary">
                                            <!-- div for hero image -->
                                            <div class="order__summary-image">
                                                <img src="<?php echo URLROOT ?>/public/images/payment.gif " aria-hidden="true" alt="hero" />
                                            </div>
                                            <!-- Main content start -->
                                            <br>
                                            <h1>Reservation ID : <?= $pendings->rv_id ?></h1>
                                            <p class="description">
                                                <?php foreach ($rvdetails as $rvdetail) : ?>
                                                    <?php if ($rvdetail->rv_id == $pendings->rv_id) { ?>
                                                        <?php $name = $rvdetail->eventName; ?>
                                                        <?php $content = $rvdetail->eventName . "-" . $rvdetail->rvType; ?>
                                                    <?php } ?>
                                                <?php endforeach; ?>
                                                <?= $content ?>
                                            </p>

                                            <!-- div for order plan -->
                                            <div class="order__summary-plan" style="justify-content:normal; width:95%">
                                                <img src="<?php echo URLROOT ?>/public/images/money-icon.png" aria-hidden="true" alt="music" />
                                                <div class="plan" style="margin-left: 25px">
                                                    <h3 style="font-size:18px">LKR. <?= number_format($pendings->rem_price, 2, '.', '') ?></h3>
                                                    <?php if ($pendings->ad_flag == 0) { ?>
                                                        <p style="font-size:14px">Ad. <?= number_format($pendings->ad_price, 2, '.', '') ?></p>
                                                    <?php } ?>
                                                </div>

                                            </div>
                                            <?php if ($pendings->ad_flag == 0) { ?>
                                                <button onclick='payNow(<?= $pendings->payment_id ?>,<?= $pendings->rv_id ?>,<?= $pendings->ad_price ?>,"Admin","advance")'>Proceed to Advance Payment</button>
                                            <?php } else { ?>
                                                <br>
                                            <?php } ?>
                                            <button onclick='payNow(<?= $pendings->payment_id ?>,<?= $pendings->rv_id ?>,<?= $pendings->rem_price ?>,"Admin","full")'>Proceed to Full Payment</button>
                                        </main>

                                    </div>
                                </div>
                            <?php endforeach; ?>

                        </div>

                    </div>

                </div>

            </main>
        </div>

    </div>


    <!-- footer start -->
    <section class="footer" style="width:100%;">
        <div class="overlay"></div>
        <div class="box-container" style="display:inline-flex; width:100%;">
            <div class="box" style="margin-right:185px;">
                <h3>Quick Access</h3>
                <a href="home"><i class="fas fa-angle-right"></i> Home</a>
                <a href="#"><i class="fas fa-angle-right"></i> Packages</a>
                <a href="#"><i class="fas fa-angle-right"></i> Add Packages</a>
            </div>

            <div class="box" style="margin-right:185px;">
                <h3>Extra</h3>
                <a href="#"><i class="fas fa-angle-right"></i> About US</a>
                <a href="#"><i class="fas fa-angle-right"></i> Privacy Policy</a>
                <a href="#"><i class="fas fa-angle-right"></i> Ask Questions</a>
            </div>

            <div class="box" style="margin-right:185px;">
                <h3>Contact Us</h3>
                <a href="#"><i class="fas fa-phone"></i> +94 123-456-789</a>
                <a href="#"><i class="fa-solid fa-envelope"></i> TruEvent@gmail.com</a>
                <a href="#"><i class="fas fa-map"></i> Colombo</a>

            </div>

            <div class="box" style="margin-right:185px;">
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
    <script type="text/javascript" src="https://www.payhere.lk/lib/payhere.js"></script>
    <script>
        function payNow(payment_due_id, booking_id, amount, worker_name, payment_type) {
            //Call AJAX function to get the hash value
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    var hash_val = this.responseText;
                    // Put the payment variables here
                    var payment = {
                        "sandbox": true,
                        "merchant_id": merchant_id, // Replace your Merchant ID
                        "return_url": undefined, // Important
                        "cancel_url": undefined, // Important
                        "notify_url": "https://ravinduwegiriya.com/authorize_payment_trueventhorizons.php",
                        "order_id": booking_id,
                        "items": "Payment to " + worker_name,
                        "amount": amount,
                        "currency": "LKR",
                        "hash": hash_val, // *Replace with generated hash retrieved from backend
                        "first_name": "Saman",
                        "last_name": "Perera",
                        "email": "samanp@gmail.com",
                        "phone": "0771234567",
                        "address": "No.1, Galle Road",
                        "city": "Colombo",
                        "country": "Sri Lanka",
                        "custom_1": payment_due_id,
                        "custom_2": payment_type
                    };
                    payhere.startPayment(payment);

                }

            }
            xmlhttp.open("POST", "http://localhost/temp/gethash.php", true);
            xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            //send order_id and amount
            xmlhttp.send("order_id=" + booking_id + "&amount=" + amount);




        }
        // Payment completed. It can be a successful failure.
        payhere.onCompleted = function onCompleted(orderId) {
            console.log("Payment completed. OrderID:" + orderId);
            //Reload Window
            window.location.reload();

        };

        // Payment window closed
        payhere.onDismissed = function onDismissed() {
            // Note: Prompt user to pay again or show an error page
            console.log("Payment dismissed");
        };

        // Error occurred
        payhere.onError = function onError(error) {
            // Note: show an error page
            console.log("Error:" + error);
        };
        var merchant_id = "1222593";
    </script>
</body>

</html>