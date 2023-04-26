<?php

    $merchant_id="1222593";
    $order_id=$_POST['order_id'];
    $amount=$_POST['amount'];
    $currency="LKR";
    $merchant_secret="MTM1MTk0NTU2Mzc3NzcxODU4NTM5MzE3OTIzOTgyNTcxNjM3NTk=";
    $hash = strtoupper(
        md5(
            $merchant_id . 
            $order_id . 
            number_format($amount, 2, '.', '') . 
            $currency .  
            strtoupper(md5($merchant_secret)) 
        ) 
    );
    echo $hash;
?>