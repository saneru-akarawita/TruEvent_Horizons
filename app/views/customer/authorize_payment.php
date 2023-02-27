<?php

$merchant_id           = $_POST['merchant_id'];
$order_id              = $_POST['order_id'];
$payhere_amount        = $_POST['payhere_amount'];
$payhere_currency      = $_POST['payhere_currency'];
$status_code           = $_POST['status_code'];
$md5sig                = $_POST['md5sig'];
$status_message        = $_POST['status_message'];
$payment_id            = $_POST['payment_id'];
$mode                  = $_POST['method'];
$payment_id_db         = $_POST['custom_1'];
$payment_type          = $_POST['custom_2'];

$merchant_secret = "MjQ4MzYzOTgzMzM1NDA1NTE0NzMzMzcxNDIzMjAzMjY0MTk2ODQ0Ng=="; // Replace with your Merchant Secret

$local_md5sig = strtoupper(
    md5(
        $merchant_id . 
        $order_id . 
        $payhere_amount . 
        $payhere_currency . 
        $status_code . 
        strtoupper(md5($merchant_secret)) 
    ) 
);
 // require_once '../db.php';
 $servername = "second-year-project-database.cua1qjpx4s4g.ap-southeast-1.rds.amazonaws.com";
 $username = "root";
 $password = "password123";
 $dbname = "trueventhorizons_db";
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
       
if ($local_md5sig === $md5sig){
    if($status_code == 2){
        if($payment_type == "advance"){
            $sql = "UPDATE payments SET ad_flag=1, rem_price = full_price - ad_price WHERE payment_id=$payment_id_db";
            $result = $conn -> query($sql);
        }
        else if($payment_type == "full"){
            $sql = "UPDATE payments SET fp_flag=1, ad_flag=1, rem_price = 0 WHERE payment_id=$payment_id_db";
            $result = $conn -> query($sql);
        }
    }

    // $sql_to_log = "INSERT INTO Payments_Log (PayHere_Payment_ID, Booking_ID, Mode, Amount, Success_Flag, Status_Message) VALUES ($payment_id, $order_id, '$mode', $payhere_amount, $status_code, '$status_message')";
    // $result = $conn -> query($sql_to_log);
}


?>