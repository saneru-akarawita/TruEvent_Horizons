<?php require APPROOT . "/views/inc/toast.php" ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <link rel="stylesheet" href="<?php echo URLROOT ?>/public/css/style.css" />
    <link rel="stylesheet" href="<?php echo URLROOT ?>/public/css/icons.css" />
    <link rel="stylesheet" href="<?php echo URLROOT ?>/public/css/login-reg.css" />
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" />
    <link rel="shortcut icon" type="image/x-icon" href="<?php echo URLROOT ?>/logo/miniIcon.ico">
    <title>TruEvent Horizons - Sign In</title>
</head>

<body>
    <div class="main-container">
        <a href="<?php echo URLROOT ?>/user/signin">
            <img src="<?php echo URLROOT ?>/public/logo/logo.png" alt="logo" class="top-left-logo">
        </a>
        <a href="<?php echo URLROOT ?>" class="top-right-closeBtn white-red-hover"><i class="fal fa-times fa-2x"></i></a>
        <div class="login-container form-container contentBox">
            <form action="<?php echo URLROOT; ?>/user/signin" method="post" class="form">
                <h1 class="title">Sign In</h1>

                <div class="text-group">
                    <input type="text" name="email" placeholder="Your email address here">
                    <span class=" error"><?php echo $data['email_error']; ?></span>

                </div>

                <div class="text-group">
                    <input id="pwd-field" type="password" name="password" placeholder="Your password here" maxlength="25">
                    <i id="show-pwd" class="input-icon ci ci-pwdView right-icon"></i>
                    <i id="hide-pwd" class="input-icon ci ci-pwdHide right-icon"></i>
                    <span class="error"><?php echo $data['password_error']; ?></span>

                </div>

                <a href="<?php echo URLROOT ?>/user/resetPassword">Forgot Password?</a>

                <div class="footer-container">
                    <button class="btn btn-filled btn-theme-purple">Sign In</button>
                    <p>Don't have an account? Register as a </p>
                    <p><a href="<?php echo URLROOT ?>/customer/register">Customer</a> or
                        <a href="<?php echo URLROOT ?>/serviceprovider/register">Service Provider</a></p>
                </div>
            </form>
        </div>
    </div>
</body>
<script src="<?php echo URLROOT ?>/public/js/login.js"></script>

</html>