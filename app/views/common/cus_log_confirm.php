<?php if($rvdetails->rvType =='service') {?>
    <div class="action-button" style="justify-content:center; margin-left:50px;">

    <?php if($rvdetails->spType == "Hotel") {?>
        <a href="viewServiceReservationDetailsHotel?rv_id=<?=$rvdetails->rv_id; ?>&spType=<?=$rvdetails->spType;?>&sp_id=<?=$rvdetails->sp_id;?>&service_id=<?=$rvdetails->service_id; ?>" class="buttond">view</a>
        <a href="<?php echo URLROOT ?>/CustomerDashboard/paymentLog" class="buttond" style="margin-left:20px; margin-right:20px">Proceed to Pay</a>
        <a href="deleteReservation?rv_id=<?=$rvdetails->rv_id; ?>" class="buttond">cancel</a>
    <?php } ?>

    <?php if($rvdetails->spType == "Decoration") {?>
        <a href="viewServiceReservationDetailsDeco?rv_id=<?=$rvdetails->rv_id; ?>&spType=<?=$rvdetails->spType;?>&sp_id=<?=$rvdetails->sp_id;?>&service_id=<?=$rvdetails->service_id; ?>" class="buttond">view</a>
        <a href="<?php echo URLROOT ?>/CustomerDashboard/paymentLog" class="buttond" style="margin-left:20px; margin-right:20px">Proceed to Pay</a>
        <a href="deleteReservation?rv_id=<?=$rvdetails->rv_id; ?>" class="buttond">cancel</a>
    <?php } ?>

    <?php if($rvdetails->spType == "Band") {?>
        <a href="viewServiceReservationDetailsBand?rv_id=<?=$rvdetails->rv_id; ?>&spType=<?=$rvdetails->spType;?>&sp_id=<?=$rvdetails->sp_id;?>&service_id=<?=$rvdetails->service_id; ?>" class="buttond">view</a>
        <a href="<?php echo URLROOT ?>/CustomerDashboard/paymentLog" class="buttond" style="margin-left:20px; margin-right:20px">Proceed to Pay</a>
        <a href="deleteReservation?rv_id=<?=$rvdetails->rv_id; ?>" class="buttond">cancel</a>
    <?php } ?>

    <?php if($rvdetails->spType == "Photography") {?>
        <a href="viewServiceReservationDetailsPhotography?rv_id=<?=$rvdetails->rv_id; ?>&spType=<?=$rvdetails->spType;?>&sp_id=<?=$rvdetails->sp_id;?>&service_id=<?=$rvdetails->service_id; ?>" class="buttond">view</a>
        <a href="<?php echo URLROOT ?>/CustomerDashboard/paymentLog" class="buttond" style="margin-left:20px; margin-right:20px">Proceed to Pay</a>
        <a href="deleteReservation?rv_id=<?=$rvdetails->rv_id; ?>" class="buttond">cancel</a>
    <?php } ?>

<?php } else { ?>
    <div class="action-button" style="justify-content:center; margin-left:50px;">
    <a href="viewPackageReservationDetails?rv_id=<?=$rvdetails->rv_id; ?>&service_id=<?=$rvdetails->service_id; ?>" class="buttond">view</a>
    <a href="<?php echo URLROOT ?>/CustomerDashboard/paymentLog" class="buttond" style="margin-left:20px; margin-right:20px">Proceed to Pay</a>
    <a href="deleteReservationPackage?rv_id=<?=$rvdetails->rv_id; ?>" class="buttond">cancel</a>
<?php }?>