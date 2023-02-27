<?php

    $merchant_id="1222593";
    $order_id=$_POST['order_id'];
    $amount=$_POST['amount'];
    $currency="LKR";
    $merchant_secret="MjQ4MzYzOTgzMzM1NDA1NTE0NzMzMzcxNDIzMjAzMjY0MTk2ODQ0Ng==";
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