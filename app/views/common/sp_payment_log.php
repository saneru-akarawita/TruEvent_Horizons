<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>TruEvent Horizons - Payment Details</title>

        <!-- font awesome cdn link -->
        <link rel="stylesheet" href=<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <!-- Montserrat Font -->
        <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

        <!-- Material Icons -->
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Outlined" rel="stylesheet">

        <!-- Custom CSS -->
        <link rel="stylesheet" href="<?php echo URLROOT ?>/public/css/admin/dashboardpanel.css">
        <!-- custom css file link -->
        <link rel="stylesheet" href="<?php echo URLROOT ?>/public/css/admin/admin-add-reservation-style.css"/>

        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
        <link href="https://fonts.googleapis.com/css2?family=Lato:wght@300;400;700;900&family=Mukta:wght@300;400;600;700;800&family=Noto+Sans:wght@400;700&display=swap" rel="stylesheet">

        <style>

            .table-container,
            .table-container::before,
            .table-container::after {
            box-sizing: border-box;
            margin: 0;
            padding: 0; 
            }

            .table-container {
            font-family: 'Poppins';
            height: auto;
            min-height: 50vh;
            display: grid;
            justify-content: center;
            align-items: center;
            color: #4f546c;
            background-color: #f9fbff;
            }

            .table-container table {
            border-collapse: collapse;
            box-shadow: 0 5px 10px #e1e5ee;
            background-color: white;
            text-align: left;
            overflow: hidden;
            border-style:none !important;
            }

            .table-container thead {
                box-shadow: 0 5px 10px #e1e5ee;
            }

            .table-container th {
                padding: 1rem 2rem;
                text-transform: uppercase;
                letter-spacing: 0.1rem;
                font-size: 15px;
                font-weight: 900;
                border-style:none !important;
            } 

            .table-container td {
                padding: 0.8rem 2rem;
                border-style:none !important;
                font-size: 14px;
            }

            .table-container a {
                text-decoration: none;
                color: #2962ff;
            }

            .table-container .status {
                border-radius: 0.2rem;
                /* background-color: red; */
                padding: 0.2rem 1rem;
                text-align: center;
            }
            .table-container .status-pending {
                background-color: #fff0c2;
                color: #a68b00;
                }

            .table-container .status-paid {
                background-color: #c8e6c9;
                color: #388e3c;
                }

            .table-container .status-unpaid {
                background-color: #ffcdd2;
                color: #c62828;
                }
            

            .table-container .amount {
                text-align: right;
            }

            .table-container tr:nth-child(even) {
                background-color: #f4f6fb;
            }
            

        </style>

    </head>
    <body>

    <?php switch(Session::getUser("type")){
        case 4:
            require APPROOT . "/views/hotelManager/header-hotel.php";
            break;
        case 5:
            require APPROOT . "/views/decoCompany/header-deco.php";
            break;
        case 6:
            require APPROOT . "/views/band/header-band.php";
            break;
        case 7:
            require APPROOT . "/views/photography/header-photography.php";
            break;
        default:
            echo "Invalid Parameter";
            break;
    }?>

    <main class ="main-container" style="background-color:#FFFFFF;">
    <div class="table-container" style="border-radius:10px">
        <h1 style="font-size:50px; margin-top:75px;"><center>CUSTOMER PAYMENTS - LOG</center></h1>
        <table style="margin-top:25px; margin-bottom:50px">
            <thead>
            <tr>
                <th>Log ID</th>
                <th>Reservation ID</th>
                <th>Event Name</th>
                <th>Reservation Date</th>
                <th>Customer Name</th>
                <th>Mode</th>
                <th>Payment Amount</th>
                <th>Status</th>
            </tr>
            </thead>
            <tbody>
                <?php if(empty($data[0])){?>
                    <tr>
                        <td colspan="8"><center>No Payment Logs Found</center></td>
                    </tr>
                <?php }else{?>
                    <?php foreach($data[0] as $paymentLogs):?>
                        <?php foreach($data[1] as $reservationDetails):
                            if($reservationDetails->rv_id == $paymentLogs->Booking_ID){
                                $event_name = $reservationDetails->eventName;
                                $rv_date = $reservationDetails->rvDate;
                                $customer_id = $reservationDetails->customer_id;

                                foreach($data[2] as $customerDetails):
                                    if($customerDetails->customer_id == $customer_id){
                                        $customer_name = $customerDetails->fname." ".$customerDetails->lname;
                                    }
                                endforeach;
                            }
                        endforeach;?>
                        
                        <tr>
                            <td><?=$paymentLogs->log_id?></td>
                            <td><?=$paymentLogs->Booking_ID?></td>
                            <td><?=$event_name?></td>
                            <td><?=$rv_date?></td>
                            <td><?=$customer_name?></td>
                            <td>
                                <?php if($paymentLogs->Mode =="VISA"){?>
                                    <center><i class="fa-brands fa-cc-visa fa-2x" style='color: blue'></i></center>
                                <?php }else{?>
                                    <center><i class="fa-brands fa-cc-mastercard fa-2x" style='color: red'></i></center>
                                <?php }?>
                                <!-- <?=$paymentLogs->Mode?> -->
                            </td>
                            <td class="amount">LKR. <?=number_format($paymentLogs->Amount, 2, '.', '')?></td>
                            <td>
                                <?php if($paymentLogs->Success_Flag == 2){?>
                                    <p class="status status-paid">Successful</p>
                                <?php }else{?>
                                    <p class="status status-unpaid">Failed</p>
                                <?php }?>
                            </td>
                        </tr>
                    <?php endforeach;?>
                <?php }?>
            </tbody>
        </table>
    </div>
    </main>




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
    </body>
</html>