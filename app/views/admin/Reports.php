<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" />
        <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" />
        <script src="https://kit.fontawesome.com/c02eb7591c.js" crossorigin="anonymous"></script>

        <link rel="stylesheet" href="<?php echo URLROOT ?>/public/css/style.css">
        <link rel="stylesheet" href="<?php echo URLROOT ?>/public/css/footer.css" />
        <link rel="stylesheet" href="<?php echo URLROOT ?>/public/css/table.css" />
        <link rel="stylesheet" href="<?php echo URLROOT ?>/public/css/deco company/styles-hotel.css">
        


        <link rel="shortcut icon" type="image/x-icon" href="./logo/logo.png">
        <title>TruEvent Horizons - Report - Admin</title>

        <style>
            .container_filter_1 {
                display: inline-flex;
                flex-direction: column;
                align-items: flex-start;
            }
            
            .category {
                margin-bottom: 10px;
            }
            
            .category label {
                font-weight: bold;
                margin-right: 10px;
                font-size:15px;
            }
            
            .category input[type="checkbox"] {
                margin-right: 5px;
                transform: scale(0.1);
            }
        </style>
</head>

<body>
    <?php require APPROOT . "/views/admin/header-admin.php" ?>
     

    <div class="main-content">

        <section class = "container_filter">

            <form method="post" action="reports">

                <table class="table-info-table">

                    <tr>
                        <td>
                            <label>Year:</label>
                        </td>
                        <td>
                            <input type="checkbox" name="year[]" value="2022" id="year_2022">
                            <label for="year_2022">2022</label>
                        </td>
                        <td>
                            <input type="checkbox" name="year[]" value="2023" id="year_2023">
                            <label for="year_2023">2023</label>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label>Month:</label>
                        </td>
                        <td>
                            <tr>
                                <td>
                                    <input type="checkbox" name="month[]" value="Jan" id="month_jan">
                                    <label for="month_jan">Jan</label>
                                </td>
                                <td>
                                    <input type="checkbox" name="month[]" value="Feb" id="month_feb">
                                    <label for="month_feb">Feb</label>
                                </td>
                                <td>
                                    <input type="checkbox" name="month[]" value="Mar" id="month_mar">
                                    <label for="month_mar">Mar</label>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <input type="checkbox" name="month[]" value="Apr" id="month_apr">
                                    <label for="month_apr">Apr</label>
                                </td>
                                <td>
                                    <input type="checkbox" name="month[]" value="May" id="month_may">
                                    <label for="month_may">May</label>
                                </td>
                                <td>
                                    <input type="checkbox" name="month[]" value="Jun" id="month_jun">
                                    <label for="month_jun">Jun</label>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <input type="checkbox" name="month[]" value="Jul" id="month_jul">
                                    <label for="month_jul">Jul</label>
                                </td>
                                <td>
                                    <input type="checkbox" name="month[]" value="Aug" id="month_aug">
                                    <label for="month_aug">Aug</label>
                                </td>
                                <td>
                                    <input type="checkbox" name="month[]" value="Sep" id="month_sep">
                                    <label for="month_sep">Sep</label>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <input type="checkbox" name="month[]" value="Oct" id="month_oct">
                                    <label for="month_oct">Oct</label>
                                </td>
                                <td>
                                    <input type="checkbox" name="month[]" value="Nov" id="month_nov">
                                    <label for="month_nov">Nov</label>
                                </td>
                                <td>
                                    <input type="checkbox" name="month[]" value="Dec" id="month_dec">
                                    <label for="month_dec">Dec</label>
                                </td>
                            </tr>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label>Status:</label>
                        </td>
                        <td>
                            <input type="checkbox" name="status[]" value="pending" id="status_pending">
                            <label for="status_pending">Pending</label>
                        </td>
                        <td>
                            <input type="checkbox" name="status[]" value="confirm" id="status_confirm">
                            <label for="status_confirm">Confirm</label>
                        </td>
                        <td>
                            <input type="checkbox" name="status[]" value="expired" id="status_expired">
                            <label for="status_expired">Expired</label>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label>Payment:</label>
                        </td>
                        <td>
                            <input type="checkbox" name="payment[]" value="not-paid" id="payment_not-paid">
                            <label for="payment_not-paid">Not-Paid</label>
                        </td>
                        <td>
                            <input type="checkbox" name="payment[]" value="ad-paid" id="payment_ad-paid">
                            <label for="payment_ad-paid">Ad-Paid</label>
                        </td>
                        <td>
                            <input type="checkbox" name="payment[]" value="paid" id="payment_paid">
                            <label for="payment_paid">Paid</label>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label>Reservation Type:</label>
                        </td>
                        <td>
                            <input type="checkbox" name="type[]" value="service" id="type_service">
                            <label for="type_service">Service</label>
                        </td>
                        <td>
                            <input type="checkbox" name="type[]" value="package" id="type_package">
                            <label for="type_package">Package</label>
                        </td>
                    </tr>
                </table>

                <div class="footer-container">
                    <button type="submit" name="action" value="addpackage" class="btn btn-filled btn-theme-purple">Filter</button>
                </div>

            </form>

            <br><br>
                <p>
                    <?php if($data){
                        echo $data['query'];
                    }?>
                </p>
            <br><br>
        </section>



        <section class="container">
            <table class="table-info-table">
                <thead>
                    <tr>
                    <th>Roll No</th>
                    <th>Candidate Name</th>
                    <th>Email</th>
                    <th>Fees Dues</th>
                    <th>Remaing Days</th>
                    </tr>
                </thead>
                <tbody>
                <tr>
                    <td>1901</td>
                    <td>John</td>
                    <td>john04@gmail.com</td>
                    <td>45000</td>
                    <td>21</td>
                </tr>
                <tr>
                    <td>1902</td>
                    <td>Kayamat</td>
                    <td>kam06@gmail.com</td>
                    <td>46700</td>
                    <td>18</td>
                </tr>
                <tr>
                    <td>1903</td>
                    <td>Yash Kumar</td>
                    <td>yashkum@gmail.com</td>
                    <td>34000</td>
                    <td>14</td>
                </tr>
                <tr>
                    <td>1904</td>
                    <td>Charlies</td>
                    <td>Charlies@gmail.com</td>
                    <td>22000</td>
                    <td>10</td>
                </tr>
                <tr>
                    <td>1905</td>
                    <td>Aman Dhawan</td>
                    <td>amandhawan@gmail.com</td>
                    <td>66000</td>
                    <td>22</td>
                </tr>
                <tr>
                    <td>1906</td>
                    <td>Kuldeep senger</td>
                    <td>senger09@gmail.com</td>
                    <td>87000</td>
                    <td>33</td>
                </tr>
                <tr>
                    <td>1907</td>
                    <td>Shyam singh</td>
                    <td>shyma06singh@gmail.com</td>
                    <td>11000</td>
                    <td>41</td>
                </tr>
                <tr>
                    <td>1908</td>
                    <td>Hema Shankar</td>
                    <td>shankarhema@gmail.com</td>
                    <td>57000</td>
                    <td>32</td>
                </tr>
                </tbody>
            </table>
        </section>
                
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
    <script src="<?php echo URLROOT ?>/public/js/admin/function.js"></script>

</body>


</html>