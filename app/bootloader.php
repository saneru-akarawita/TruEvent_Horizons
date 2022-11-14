<?php
    //load configurations
    require_once 'config/config.php';

    require_once 'helpers/URL_helper.php';
    require_once 'helpers/Session_helper.php';
    require_once 'helpers/DataValidation_helper.php';
    require_once 'helpers/SMS_helper.php';
    require_once 'helpers/DateTimeExtended_helper.php';
    require_once 'helpers/Toast_helper.php';
    require_once 'helpers/email_helper.php';

    spl_autoload_register(function ($className)
    {
    require_once 'libraries/' . $className . '.php';
    });

    // load libraries
    // require_once 'libraries/Core.php';
    // require_once 'libraries/Controller.php';
    // require_once 'libraries/Database.php';
    // require_once 'libraries/Model.php';
?>