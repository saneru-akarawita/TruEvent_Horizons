<!DOCTYPE html>

<html>

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <style>
            .calmaindiv {
            border: 3.5px solid black;
            border-radius: 10px;
            width: 600px;
            margin: 20px;
            background-color: #bfbfbf;
            }
        </style>

        <title>Calendar</title>

        <link rel="stylesheet" href="<?php echo URLROOT ?>/public/css/style.css" />
        <link rel="stylesheet" href="<?php echo URLROOT ?>/public/css/login-reg.css" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.css" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha.6/css/bootstrap.css" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.min.js"></script>


        <link rel="stylesheet" href=<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />

        <link rel="stylesheet" href="<?php echo URLROOT ?>/public/css/admin/admin-add-reservation-style.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"/>
        
        <script>

            $(document).ready(function() {

                var calendar = $('#calendar').fullCalendar({
//------------------------- fetch event start----------------------------------------------//
                    editable:true, /* */
                    header:{      /* */
                        left:'prev,next today',
                        center:'title'
                    },
                    events: [
                        <?php foreach($data as $eventdata) :?>
                             <?= '{'?>
                                id: <?= $eventdata->id?>,
                                title: <?= '"'.$eventdata->title.'"'?>,
                                start: <?= '"'.$eventdata->start.'"'?>,
                                end: <?= '"'.$eventdata->end.'"'?>,
                                color: "red",
                                textColor: "white"
                            <?='},'?> 
                        <?php endforeach; ?>
                            ],
//------------------------- fetch event end----------------------------------------------//
                });
            });

        </script>
    
    </head>

    <body>
    
    <?php require APPROOT . "/views/customer/header-customer.php";?>
       
        <br><br><br>
        <div class ="calmaindiv" style="margin:auto">
            <div class="container" style="margin:10px 10px 0px 0px">
                <div id="calendar"></div>
            </div>
        </div>
        <br><br><br>


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

    </body>
    <script src="<?php echo URLROOT ?>/public/js/customer/customerscript.js"></script>
</html>