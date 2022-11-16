<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>TruEvent Horizons - Hotel Manager View Each Service</title>
        <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" />
        <link rel="stylesheet" href="<?php echo URLROOT ?>/public/css/hotel manager/styles-hotel.css">
        <link rel="stylesheet" href="<?php echo URLROOT ?>/public/css/hotel manager/style.css">
</head>
<body>
        <div class="imagedisplay">
                <img src="<?php echo URLROOT ?>/public/images/hotel manager/figma images/services/hotel<?php echo rand(1,5)?>.jpg" alt="service_image" width="320px" height="300px" style='border:2px solid white; margin-bottom:8px;'>      
       </div>
        <div class="viewservicecontaniner">
                <h1>View Service</h1> 	 		 	 	 	 	 	 	
                        <ol>
                                <li>Event Name :-  <p class="form-control"><?= $data->service_type;?></p> </li>
                                <li>Hall Name :-  <p class="form-control"><?= $data->hall_name;?></p> </li>
                                <li>Location :-  <p class="form-control"><?= $data->location;?></p> </li>
                                <li>Hall Type :-  <p class="form-control"><?= $data->hall_type;?></p> </li>
                                <li>Air Condition Status:-  <p class="form-control"><?php if($data->ac_status) echo "Yes"; else echo "No";?></p> </li>
                                <li>Max Crowd :-  <p class="form-control"><?= $data->max_crowd;?></p> </li>
                                <li>Price Head :-  <p class="form-control"><?= $data->price;?> LKR</p> </li>
                                <li>Other Facilities :-  <p class="form-control"><?= $data->other_facilities;?></p> </li>
                                
                        </ol>   
        </div>         
         
</body>
</html>