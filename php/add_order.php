<?php
if(isset($_POST['weight']) && isset($_POST['total_price'])){
    require "connect.php";
    $weight=$_POST['weight'];
    $total_price=$_POST['total_price'];
    $product=$_POST['product'];
    $payment=$_POST['payment'];
    if(isset($_COOKIE['eguriro'])){
        $oder_number=$number=mt_rand();
        $client=$_COOKIE["eguriro"];
        $insert=mysqli_query($conn,"INSERT INTO `out_orders`(`out_order_id`, `product_link`, `created_date`, `client_id`, `quantity`, `total_price`, `order_status`, `order_number`,`payment`) 
        VALUES (null,'$product',NOW(),'$client','$weight','$total_price','pending','$oder_number','$payment')");
        if($insert==true){
            echo "<font color='green'>Ordered successfully</font>";
        }else{
            echo "<font color='red'>Something went wrong</font>";
        }
    }else{
        echo "<script type='text/javascript'>window.location.replace('signin.php');</script>";
        $client=md5($_SERVER['REMOTE_ADDR'] .$_SERVER['HTTP_USER_AGENT']);

    }
    
}
?>