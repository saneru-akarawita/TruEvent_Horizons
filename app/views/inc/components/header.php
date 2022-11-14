<?php
$userID  = Session::getUser("id");
$userEmail  = Session::getUser("email");
$userTypeNo = Session::getUser("type");
$userTypeText = Session::getUser("typeText");
?>

<!DOCTYPE html>
<html>

<head>
   <!--Meta-->
   <meta charset="utf-8" />
   <meta name="viewport" content="width=device-width, initial-scale = 1.0" />

   <title>TruEvent Horizons</title>

   <!--Style Sheet-->
   <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" />
   <link rel="shortcut icon" type="image/x-icon" href="<?php echo URLROOT ?>/logo/miniIcon.ico">

   <!-- Common stylesheets -->
   <link rel="stylesheet" href="<?php echo URLROOT ?>/public/css/style.css" />
   <link rel="stylesheet" href="<?php echo URLROOT ?>/public/css/icons.css" />
   <link rel="stylesheet" href="<?php echo URLROOT ?>/public/css/layoutTemplate1.css" />
</head>