<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Admin Report Generation</title>

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

            .filter-card {
                box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
                transition: 0.3s;
                width: 40%;
                border-radius: 5px;
                margin: 10px;
                padding: 10px 10px 10px 10px;
            }

            .filter-card .container {
                padding: 2px 16px;
                font-size:14px;
            }
            .filter-card .container label {
                margin-left:8px;
            }
            .filter-card.month .container input {
                margin-left:40px;
            }


            

        </style>

    </head>
    <body>
    <?php require APPROOT . "/views/admin/header-admin.php" ?>
    
    <main class ="main-container" style="background-color:#FFFFFF;">
        <div class="table-container" style="border-radius:10px">

            <h1 style="font-size:50px; margin-top:75px;"><center>System Report Generation</center></h1>
            <br><br>

            <div class="ser-container form-container contentBox">
                <form method="post" action="reports" style="margin:auto; width:90%">

                <div class="row" style="display: flex;flex-direction: row;flex-wrap: nowrap;">
                    <div class="filter-card">
                        <div class="container">
                            <h3><b>Year:</b></h3> <br>
                            <input type="checkbox" name="year[]" value="2022" id="year_2022" <?php if(in_array('2022', $data['checkBoxArray'][0])) echo 'checked'; ?>>
                            <label for="year_2022">2022</label>
                            <br><br>
                            <input type="checkbox" name="year[]" value="2023" id="year_2023" <?php if(in_array('2023', $data['checkBoxArray'][0])) echo 'checked'; ?>>
                            <label for="year_2023">2023</label>
                        </div>
                    </div>
                    <div class="filter-card">
                        <div class="container">
                            <h3><b>Status:</b></h3><br>
                            <input type="checkbox" name="status[]" value="pending" id="status_pending" <?php if(in_array('pending', $data['checkBoxArray'][2])) echo 'checked'; ?>>
                            <label for="status_pending">Pending</label>
                            <br><br>
                            <input type="checkbox" name="status[]" value="confirm" id="status_confirm" <?php if(in_array('confirm', $data['checkBoxArray'][2])) echo 'checked'; ?>>
                            <label for="status_confirm">Confirm</label>
                            <br><br>
                            <input type="checkbox" name="status[]" value="decline" id="status_decline" <?php if(in_array('decline', $data['checkBoxArray'][2])) echo 'checked'; ?>>
                            <label for="status_decline">Declined</label>
                        </div>
                    </div>
                    <div class="filter-card">
                        <div class="container">
                            <h3><b>Payment:</b></h3><br>
                            <input type="checkbox" name="payment[]" value="not-paid" id="payment_not-paid" <?php if(in_array('not-paid', $data['checkBoxArray'][3])) echo 'checked'; ?>>
                            <label for="payment_not-paid">Not-Paid</label>
                            <br><br>
                            <input type="checkbox" name="payment[]" value="ad-paid" id="payment_ad-paid" <?php if(in_array('ad-paid', $data['checkBoxArray'][3])) echo 'checked'; ?>>
                            <label for="payment_ad-paid">Ad-Paid</label>
                            <br><br>
                            <input type="checkbox" name="payment[]" value="paid" id="payment_paid" <?php if(in_array('paid', $data['checkBoxArray'][3])) echo 'checked'; ?>>
                            <label for="payment_paid">Paid</label>
                        </div>
                    </div>
                    <div class="filter-card">
                        <div class="container">
                            <h3><b>Reservation Type:</b></h3><br>
                            <input type="checkbox" name="type[]" value="service" id="type_service" <?php if(in_array('service', $data['checkBoxArray'][4])) echo 'checked'; ?>>
                            <label for="type_service">Service</label>
                            <br><br>
                            <input type="checkbox" name="type[]" value="package" id="type_package" <?php if(in_array('package', $data['checkBoxArray'][4])) echo 'checked'; ?>>
                            <label for="type_package">Package</label>
                        </div>
                    </div>
                </div>

                <div class="row" style="display: flex;flex-direction: row;flex-wrap: nowrap;">
                    <div class="filter-card month" style="width:100%">
                        <div class="container">
                            <h3><b>Month:</b></h3><br>
                            
                            <input type="checkbox" name="month[]" value="01" id="month_jan" <?php if(in_array('01', $data['checkBoxArray'][1])) echo 'checked'; ?>>
                            <label for="month_jan">Jan</label>

                            <input type="checkbox" name="month[]" value="02" id="month_feb" <?php if(in_array('02', $data['checkBoxArray'][1])) echo 'checked'; ?>>
                            <label for="month_feb">Feb</label>
                        
                            <input type="checkbox" name="month[]" value="03" id="month_mar" <?php if(in_array('03', $data['checkBoxArray'][1])) echo 'checked'; ?>>
                            <label for="month_mar">Mar</label>
                    
                            <input type="checkbox" name="month[]" value="04" id="month_apr" <?php if(in_array('04', $data['checkBoxArray'][1])) echo 'checked'; ?>>
                            <label for="month_apr">Apr</label>

                            <input type="checkbox" name="month[]" value="05" id="month_may" <?php if(in_array('05', $data['checkBoxArray'][1])) echo 'checked'; ?>>
                            <label for="month_may">May</label>
                        
                            <input type="checkbox" name="month[]" value="06" id="month_jun" <?php if(in_array('06', $data['checkBoxArray'][1])) echo 'checked'; ?>>
                            <label for="month_jun">Jun</label>
                    
                            <input type="checkbox" name="month[]" value="07" id="month_jul" <?php if(in_array('07', $data['checkBoxArray'][1])) echo 'checked'; ?>>
                            <label for="month_jul">Jul</label>
                        
                            <input type="checkbox" name="month[]" value="08" id="month_aug" <?php if(in_array('08', $data['checkBoxArray'][1])) echo 'checked'; ?>>
                            <label for="month_aug">Aug</label>
                        
                            <input type="checkbox" name="month[]" value="09" id="month_sep" <?php if(in_array('09', $data['checkBoxArray'][1])) echo 'checked'; ?>>
                            <label for="month_sep">Sep</label>
                        
                            <input type="checkbox" name="month[]" value="10" id="month_oct" <?php if(in_array('10', $data['checkBoxArray'][1])) echo 'checked'; ?>>
                            <label for="month_oct">Oct</label>
                        
                            <input type="checkbox" name="month[]" value="11" id="month_nov" <?php if(in_array('11', $data['checkBoxArray'][1])) echo 'checked'; ?>>
                            <label for="month_nov">Nov</label>
                        
                            <input type="checkbox" name="month[]" value="12" id="month_dec" <?php if(in_array('12', $data['checkBoxArray'][1])) echo 'checked'; ?>>
                            <label for="month_dec">Dec</label>
                               
                        </div>
                    </div>
                </div>
                        
                <div style="display: flex;flex-direction: row;flex-wrap: nowrap;justify-content: center;">
                    <div class="footer-container" style="display: flex;justify-content: center;">
                        <button type="submit" name="action" value="addpackage" class="btn btn-filled btn-theme-purple" style="border-radius:5px;background:#444BF8;padding: unset;width: 100px;height: 30px;">Filter</button>
                    </div>
                    <div class="footer-container" style="display: flex;justify-content: center; margin-top:1rem; margin-left:2rem">
                        <a href="<?=URLROOT?>/adminDashboard/downloadReport" style="color:black;"><i class="fa-solid fa-file-arrow-down fa-3x"></i></a>
                    </div>
                </div>

                </form>
            </div>


            <br><br>
                <p>
                    <?php if($data){
                        // echo $data['query'];
                    }?>
                </p>
            <br><br>

        <table style="margin-top:25px; margin-bottom:50px">
            <thead>
            <tr>
                <th>ID</th>
                <th>Event Name</th>
                <th>Reservation Date</th>
                <th>Reservation Type</th>
                <th>Customer Name</th>
                <th>Service Provider/Package</th>
                <th>Status</th>
                <th>Payment</th>
                <th>Price</th>
            </tr>
            </thead>
            <tbody>
                <?php foreach($data['dataRows'] as $rvdetails):
                    $customer_id = $rvdetails->customer_id;

                    foreach($data['customerDetails'] as $customerDetails):
                        if($customerDetails->customer_id == $customer_id){
                            $customer_name = $customerDetails->fname." ".$customerDetails->lname;
                        }
                    endforeach;
                ?>
                    
                    <tr>
                        <td><?=$rvdetails->rv_id?></td>
                        <td><?=$rvdetails->eventName?></td>
                        <td><?=$rvdetails->rvDate?></td>
                        <td><?=$rvdetails->rvType?></td>
                        <td><?=$customer_name?></td>
                        <td><?php if($rvdetails->rvType =="service") echo $rvdetails->spName; else echo $rvdetails->packageName?></td>
                        <td>
                            <?php if($rvdetails->status == "pending"){?>
                                <p class="status status-pending">Pending</p>
                            <?php }elseif($rvdetails->status == "confirm"){?>
                                <p class="status status-paid">Confirmed</p>
                            <?php }else{?>
                                <p class="status status-unpaid">Declined</p>
                            <?php }?>
                        </td>
                        <td>
                            <?php if($rvdetails->payment == "not-paid"){?>
                                <p class="status status-unpaid">Not Paid</p>
                            <?php }elseif($rvdetails->payment == "confirm"){?>
                                <p class="status status-pending">Advance Payment</p>
                            <?php }else{?>
                                <p class="status status-paid">Complete</p>
                            <?php }?>
                        </td>
                        <td class="amount">LKR. <?=number_format($rvdetails->price, 2, '.', '')?></td>
                    </tr>
                <?php endforeach;?>
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
