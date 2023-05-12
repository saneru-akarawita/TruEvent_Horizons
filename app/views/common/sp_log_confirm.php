<?php if($rvDetails->status =="pending" && $rvDetails->rvType == "package") {?>
    <div class="action-button" style="justify-content:center; margin-left:135px;">
        <?php if($rvDetails->rvType == "service"){?>        
            <a href="ReservationDetails?rv_id=<?=$rvDetails->rv_id;?>&service_id=<?=$rvDetails->service_id;?>" class="buttond">View Reservation</a>
        <?php } else {?>
            <a href="ReservationDetails?rv_id=<?=$rvDetails->rv_id;?>&service_id=<?=$package_id;?>" class="buttond">View Reservation</a>
        <?php }?>
<?php } else {?>
    <div class="action-button" style="justify-content:center; margin-left:135px;">
        <?php if($rvDetails->rvType == "service"){?>        
            <a href="ReservationDetails?rv_id=<?=$rvDetails->rv_id;?>&service_id=<?=$rvDetails->service_id;?>" class="buttond">View Reservation</a>
        <?php } else {?>
            <a href="ReservationDetails?rv_id=<?=$rvDetails->rv_id;?>&service_id=<?=$package_id;?>" class="buttond">View Reservation</a>
        <?php }?>
<?php }?>
