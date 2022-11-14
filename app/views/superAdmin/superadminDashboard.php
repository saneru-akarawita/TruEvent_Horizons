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
    <link rel="stylesheet" href="<?php echo URLROOT ?>/public/css/layoutTemplate1.css" />
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" />
    <link rel="shortcut icon" type="image/x-icon" href="<?php echo URLROOT ?>/logo/miniIcon.ico">
    <title>TruEvent Horizons - Super Admin Dashboard</title>
</head>

<body>
    
    
    <div class="main-container">
        <a href="<?php echo URLROOT ?>">
            <img src="<?php echo URLROOT ?>/public/logo/logo.png" alt="logo" class="top-left-logo">
        </a>
    
        <div class="login-container form-container contentBox" style="height:fit-content;">
            <form action="<?php echo URLROOT; ?>/superadmin/dashboard" method="post" class="form">
                <h4 class="title">Enter Admin Authorization E-mail Address:</h4>

                <div class="text-group">
                    <input type="text" name="email" placeholder="Admin email address here">
                    <span class=" error"><?php echo $data['email_error']; ?></span>
                </div>

                <div class="footer-container">
                    <button type="submit" name="sendmail" value ="sendmail" class="btn btn-filled btn-theme-purple">Send Mail</button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>