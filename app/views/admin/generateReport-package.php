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
        <link rel="stylesheet" href="<?php echo URLROOT ?>/public/css/table.css" />

        <link rel="shortcut icon" type="image/x-icon" href="./logo/logo.png">
        

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
            padding: 2rem 3rem;
            text-transform: uppercase;
            letter-spacing: 0.1rem;
            font-size: 12px;
            font-weight: 900;
            border-style:none !important;
        } 

        .table-container td {
            padding: 2rem 3.8rem;
            border-style:none !important;
            font-size: 12px;
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

        .logo {
            width: 7.7rem !important; 
            position: absolute;
        }

        .menu-bar {
            margin-top: -25px !important;
        }

        .filter-card .container {
            padding: 2px 16px;
            font-size:14px;
        }
        .filter-card .container label {
            margin-left:8px;
        }
        .filter-card.month .container input {
            margin-left:25px;
        }

        @media print {
            .footer{
                display: none;
            }

            @page:first {
                margin-left: 0.1in;
                margin-right: 0.1in;
                margin-top: -0.9in;
                margin-bottom: 0.2in;
            }
            @page {
                margin-left: 0.1in;
                margin-right: 0.1in;
                margin-top: 0.2in;
                margin-bottom: 0.2in;
            }
        }
</style>


<title>TruEvent Horizons - Package Analysis - Admin</title>

</head>

<body>
<?php require APPROOT . "/views/admin/header-admin.php" ?>
   
<?php $sDate = $data[0]; ?>
<?php $eDate = $data[1]; ?>
<?php $dataRows = $data[2]; ?>
<?php $custDetails = $data[3]; ?>
<?php $income = $data[4]; ?>
<?php $monthVsReservations = $data[5]; ?>
<?php $monthVsIncome = $data[6]; ?>


        <div class="main-content">
        <br><br><br>
       <form id="reportDatesForm" action="<?php echo URLROOT; ?>/AdminDashboard/generatereportsforPackage" method="post">
                <div class="row">
                        <div class="text-group">
                                <label for="servicetype" style="font-size:18px; font-weight:500;">Type</label>
                                <input type="text" value="Package" name="serviceType" style="margin-top:-5px;" disabled>
                        </div>
                </div>


                <div class="row">
                        <div class="text-group2" style="margin-left:150px;">
                                <label for="fromdate" style="font-size:18px; font-weight:500;">From:</label>
                                <input type="date" name="startDate" id="startDate" style="margin-top:-30px;" value="<?php echo($sDate) ?>" required>      
                        </div>  
                        <div class="text-group2-1" style="font-size:18px; font-weight:500;">
                                <label for="todate" class="todate">To:</label>
                                <input type="date" name="endDate" id="endDate" style="margin-top:-30px;" value="<?php echo($eDate) ?>" required>
                        </div>

                        <button class="btn-btn-search" id="search" style="font-size:18px; font-weight:500; margin-top:25px;" type="submit">Search</button>
                </div>
        </form>
                <div class="totaldetails">
                        <div class="totalres" style="border-radius:10px">
                                <label for="totReservation">Total Reservation</label>
                                <p id="preview" style="font-size:5rem; font-weight:500; margin-top:70px; margin-left:-120px;">
                        </div>
        
                        <div class="totalincome" style="border-radius:10px">
                                <label for="totalincome" style="margin-left:50px;">Total Income(LKR)</label>
                                <?php emptyCheck($income[0]->totalincome)? $income[0]->totalincome = '000.00' : $income[0]->totalincome = $income[0]->totalincome; ?>
                                <p id="preview1" style="font-size:5rem; font-weight:500; margin-top:70px; margin-left:-170px;"><?php print_r($income[0]->totalincome)?> </p>
                        </div>
                       
                </div>
                <div class="charts">
                        <div class="chart res" style="border-radius:10px; border-style: solid; border-color:black">
                                <label for="reservation">Reservations</label>
                                <canvas id="col-chart"></canvas>
                        </div>
                        <div class="chart income" style="border-radius:10px; border-style: solid; border-color:black">
                                <label for="income">Income</label>
                                <canvas id="area-chart"></canvas>
                        </div>  
                </div>

                <section class="table-container">
   
   <table style="margin-top:25px; margin-bottom:50px;" id="myTable">
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
            
                <?php foreach($dataRows as $rvdetails):
                    $customer_id = $rvdetails->customer_id;
                

                    foreach($custDetails as $customerDetails):
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
                            <?php }elseif($rvdetails->payment == "ad-paid"){?>
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
    <!-- <script src="<?php echo URLROOT ?>/public/js/admin/function.js"></script> -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>

        const table = document.getElementById('myTable')
        let numberOfRows = table.rows.length - 1

        const preview = document.getElementById('preview')

        let value = 0
        if(numberOfRows > 0){
            const counter = setInterval(function (){  
                value = value + 1
                preview.textContent = value
                if(value >= numberOfRows){
                    clearInterval(counter)
                }
            }, 100)
        }
        else{
            preview.textContent = 0
        }
    </script>

    <script>
        const startDate = document.getElementById('startDate')
        const endDate = document.getElementById('endDate')
        endDate.disabled = true
        startDate.addEventListener('change', () => {
            const startDateValue = new Date(startDate.value)
            const endDateValue = (12 * 30 * 24 * 60 * 60 * 1000) + startDateValue.getTime()
            const date = new Date(endDateValue)
            endDate.max = date.toISOString().split('T')[0]
            endDate.disabled = false
            console.log(endDate.max);
        })

    </script>


<script>
        monthVsResevations = <?php echo json_encode($monthVsReservations)?>

        const chart = new Chart(document.getElementById('col-chart'), {
            type: 'bar',
            data: {
                labels: monthVsResevations.labels,
                datasets:[{
                    label: 'Monthly Reservations',
                    data: monthVsResevations.data,
                    backgroundColor: [
                        'aqua', 'blue', 'fuchsia', 'green', 'orange', 'maroon', 'navy', 'olive', 'purple', 'red', 'teal','yellow'
                    ],
                }]
            },
            options: {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero: true,
                    stepSize: 1,
                },
            }],
        },
    },
        })

</script>

<script>
        monthVsIncome = <?php echo json_encode($monthVsIncome)?>

        const chart2 = new Chart(document.getElementById('area-chart'), {
            type: 'pie',
            data: {
                labels: monthVsIncome.label,
                datasets:[{
                    label: 'Monthly Income',
                    data: monthVsIncome.dataVal,
                    backgroundColor: [
                        'aqua', 'blue', 'fuchsia', 'green', 'orange', 'maroon', 'navy', 'olive', 'purple', 'red', 'teal','yellow'
                    ],
                }]
            },
            options: {
                responsive: false,
                maintainAspectRatio: false,
                width: 100,
                height: 100
    }
        })
</script>

</body>


</html>