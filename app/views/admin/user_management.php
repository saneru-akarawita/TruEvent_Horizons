<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Admin User Management</title>

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

            .accbtn{
                background-color:#007bff;
                margin: 0 0.5rem;
                padding: 0.5rem 1rem;
            }
            .accbtn:hover {
                cursor: pointer;
            }

            .rejbtn{
                background-color:#dc3545;
                margin: 0 0.5rem;
                padding: 0.5rem 1rem;
            }
            .rejbtn:hover {
                cursor: pointer;
            }

            .enbtn{
                background-color:#28a745;
                margin: 0 0.5rem;
                padding: 0.5rem 1rem;
                
            }
            .enbtn:hover {
                cursor: pointer;
            }

            .dibtn{
                background-color:#dc3545;
                margin: 0 0.5rem;
                padding: 0.5rem 1rem;
                
            }
            .dibtn:hover {
                cursor: pointer;
            }
            

        </style>

    </head>
    <body>
    <?php require APPROOT . "/views/admin/header-admin.php" ?>
    
    <?php
        $users = $data[0];
        $serviceProviders = $data[1];
        $customers = $data[2];
    ?>
    <!-- <?php print_r($users)?> -->
    <!-- <?php print_r($serviceProviders[0]->service_provider_id)?> -->
    <main class ="main-container" style="background-color:#FFFFFF;">
    <div class="table-container" style="border-radius:10px">
        <h1 style="font-size:50px; margin-top:75px;"><center>Dashboard of System Users</center></h1>
        
        <table style="margin-top:25px; margin-bottom:50px">
            <h4 style= "font-size:16px; margin-top:75px; text-decoration: underline black;">Service Providers to be Approved</h4>
            <thead>
            <tr>
                <th>Business ID</th>
                <th>Company Name</th>
                <th>Email</th>
                <th>Current Status</th>
                <th>Actions</th>
            </tr>
            </thead>
            <form method="post" action="approveReject">
            <tbody>
                <?php foreach($users as $user):?>
                    <?php if($user->user_type != 3 && $user->vstatus == "pending"){
                            $mail = $user->email;
                        ?>
                        
                        <?php foreach($serviceProviders as $sp): ?>
                            <?php if($sp->email == $mail){
                                $BID = $sp->business_id;
                                $Cname = $sp->company_name;
                            }?>
                        <?php endforeach;?>
                        <tr>
                            <td><?=$BID?></td>
                            <td><?=$Cname?></td>
                            <td style="text-transform:none;"><?=$mail?></td>
                            
                            <input type="hidden" name="email" value="<?=$mail?>">
            
                            <td>  
                                <p class="status status-pending">Pending</p>
                            </td>
                            <td>
                                <button type ="submit" class="accbtn" name = "submit" value="Approve||<?=$mail?>" style="border-radius:12px"><a style="color:white;">Approve</a></button>
                                <button type ="submit" class="rejbtn" name = "submit" value ="Reject||<?=$mail?>" style="border-radius:12px"><a style="color:white;">Reject</a></button>
                            </td> 
                        </tr>
                    <?php }?>
                <?php endforeach; ?>
            </tbody>
            </form>
        </table>


        <table style="margin-top:25px; margin-bottom:50px">
            <h4 style= "font-size:16px; margin-top:50px; text-decoration: underline black;">User Management</h4>
            <thead>
            <tr>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Email</th>
                <th>Current Status</th>
                <th>Actions</th>
            </tr>
            </thead>
            <form method="post" action="enableDisable">
            <tbody>
                <?php foreach($users as $user):?>
                    <?php if($user->vstatus != "pending" && $user->user_type == 3){
                            $mail = $user->email;
                            $vstatus = $user->vstatus;
                        ?>
                        <?php foreach($customers as $cus): ?>
                            <?php if($cus->email == $mail){
                                $Fname = $cus->fname;
                                $Lname = $cus->lname;
                        }?>
                        <?php endforeach;?>
                        <tr>
                            <td><?=$Fname?></td>
                            <td><?=$Lname?></td>
                            <td style="text-transform:none;"><?=$mail?></td>
                        
                            <td>
                                <?php if($vstatus == "verified"){?>  
                                    <p class="status status-paid">Active</p>
                                <?php }else{?>
                                    <p class="status status-unpaid">Inactive</p>
                                <?php }?>
                            </td>
                            <td>
                                <?php if($vstatus == "disable"){?>
                                    <button class="enbtn" style="border-radius:12px" name="submit" value="Enable||<?=$mail?>"><a style="color:white;">Enable Account</a></button>
                                <?php }else{?>
                                    <button class="dibtn" style="border-radius:12px" name="submit" value="Disable||<?=$mail?>"><a style="color:white;">Disable Account</a></button>
                                <?php }?>
                            </td>
                        </tr>
                    <?php }?>
                <?php endforeach; ?>
            </tbody>
            </form>
        </table>
        <table style="margin-bottom:50px">
            <thead>
            <tr>
                <th>Business ID</th>
                <th>Company Name</th>
                <th>Email</th>
                <th>Current Status</th>
                <th>Actions</th>
            </tr>
            </thead>
            <form method="post" action="enableDisable">
            <tbody>
                <?php foreach($users as $user):?>
                    <?php if($user->vstatus != "pending" && $user->user_type != 3){
                            $smail = $user->email;
                            $vstatus = $user->vstatus;
                        ?>
                        <?php foreach($serviceProviders as $sp): ?>
                            <?php if($sp->email == $smail){
                                $BID = $sp->business_id;
                                $Cname = $sp->company_name;
                                break;
                        }?>
                        <?php endforeach;?>
                        <tr>
                            <td><?=$BID?></td>
                            <td><?=$Cname?></td>
                            <td style="text-transform:none;"><?=$smail?></td>
                            
                            <td>
                                <?php if($vstatus == "verified"){?>  
                                    <p class="status status-paid">Active</p>
                                <?php }else{?>
                                    <p class="status status-unpaid">Inactive</p>
                                <?php }?>
                            </td>
                            <td>
                                <?php if($vstatus == "disable"){?>
                                    <button class="enbtn" style="border-radius:12px" name="submit" value="Enable||<?=$smail?>"><a style="color:white;">Enable Account</a></button>
                                <?php }else{?>
                                    <button class="dibtn" style="border-radius:12px" name="submit" value="Disable||<?=$smail?>"><a style="color:white;">Disable Account</a></button>
                                <?php }?>
                            </td>
                        </tr>
                    <?php }?>
                <?php endforeach; ?>
            </tbody>
            </form>
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
            <script>
                
            </script>

<!-- footer ends -->
    </body>
</html>