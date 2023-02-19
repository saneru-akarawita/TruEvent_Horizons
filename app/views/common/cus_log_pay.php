<div class="action-button" style="justify-content:center; margin-left:135px;">

<?php if($rvdetails->spType == "Hotel") {?>
    <a href="viewServiceReservationDetailsHotel?rv_id=<?=$rvdetails->rv_id; ?>&spType=<?=$rvdetails->spType;?>&sp_id=<?=$rvdetails->sp_id;?>&service_id=<?=$rvdetails->service_id; ?>" class="buttond">View Reservation</a>
<?php } ?>

<?php if($rvdetails->spType == "Decoration") {?>
    <a href="viewServiceReservationDetailsDeco?rv_id=<?=$rvdetails->rv_id; ?>&spType=<?=$rvdetails->spType;?>&sp_id=<?=$rvdetails->sp_id;?>&service_id=<?=$rvdetails->service_id; ?>" class="buttond">View Reservation</a>
<?php } ?>

<?php if($rvdetails->spType == "Band") {?>
    <a href="viewServiceReservationDetailsBand?rv_id=<?=$rvdetails->rv_id; ?>&spType=<?=$rvdetails->spType;?>&sp_id=<?=$rvdetails->sp_id;?>&service_id=<?=$rvdetails->service_id; ?>" class="buttond">View Reservation</a>
<?php } ?>

<?php if($rvdetails->spType == "Photography") {?>
    <a href="viewServiceReservationDetailsPhotography?rv_id=<?=$rvdetails->rv_id; ?>&spType=<?=$rvdetails->spType;?>&sp_id=<?=$rvdetails->sp_id;?>&service_id=<?=$rvdetails->service_id; ?>" class="buttond">View Reservation</a>
<?php } ?>