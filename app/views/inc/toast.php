<div class="statusToast">
    <div class="content">
        <div class="icon">
            <i class="success-icon toast-icon ci ci-success-white"></i>
            <i class="error-icon toast-icon ci ci-warning-white"></i>
        </div>
        <div class="details">
            <span></span>
            <p></p>
        </div>
    </div>
    <div class="close-icon">
        <i class="ci ci-x-black toast-close"></i>
    </div>
</div>

<script src="<?php echo URLROOT ?>/public/js/statusToast.js"></script>

<?php

if (Toast::hasToastNotification())
{
    $toast = Session::get('toast');
    $toastState = $toast['toastState'];
    $toastTitle = $toast['toastTitle'];
    $toastSubtitle = $toast['toastSubtitle'];

    echo "<script> displayToast('{$toastState}','{$toastTitle}','{$toastSubtitle}'); </script>";

    Toast::clearToastNotification();
}

?>
