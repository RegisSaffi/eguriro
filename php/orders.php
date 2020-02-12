<?php

include("connect.php");

if(isset($_POST['id'])){

   
      $client=md5(
    $_SERVER['REMOTE_ADDR'] .
    $_SERVER['HTTP_USER_AGENT']);
    
    $payment=$_POST['payment'];

    if(isset($_COOKIE["eguriro"])) {
       $client=$_COOKIE["eguriro"];
    }else{
                              $result=array("state"=>"warning","msg"=>"You must sign in first to access your orders, please login to view all your orders.");
echo json_encode($result,JSON_PRETTY_PRINT);
return false;
    }

     $sqlOrders="SELECT * FROM orders WHERE client_id='$client'";
                $queryOrders=mysqli_query($conn,$sqlOrders);
                if($queryOrders==true){
                $row=mysqli_fetch_assoc($queryOrders);
                echo json_encode($row,JSON_PRETTY_PRINT);
                }else{
                    echo "error";
                }
}else if(isset($_POST['order'])){

      $client=md5(
    $_SERVER['REMOTE_ADDR'] .
    $_SERVER['HTTP_USER_AGENT']);

    if(isset($_COOKIE["eguriro"])) {
       $client=$_COOKIE["eguriro"];
    }else{
$result=array("state"=>"danger","msg"=>"You must login first to buy this item,you can still add it to your cart.");
echo json_encode($result,JSON_PRETTY_PRINT);
return false;
    }

    $number=uuid();

    $id=$_POST['product'];
     $quantity=$_POST['quantity'];
      $price=$_POST['price'];
      $name=$_POST['name'];
      $payment=$_POST['payment'];

     


     $sqlOrder="INSERT INTO orders(order_number,product_id,product_name,client_id,quantity,total_price,order_status,order_payment) VALUES('$number','$id','$name','$client','$quantity','$price','Pending','$payment')";
                $queryOrder=mysqli_query($conn,$sqlOrder);
                if($queryOrder==true){

                  $table_products=" <tr>
                  <td style='font-size:14px;'>
                      <p>Online Product</p>
                      <p><b>Product Link :</b> ".$product. "</p>
                      <p><b>Product Price :</b> ".$total_price."</p>
                      <p><b>Ships to Rwanda?:</b> Yes</p>
                  </td>
                  <td style='font-size:14px;'>".$quantity."</td>
                  <td style='font-size:14px;'>".$price."</td></tr>
                  <tr><td style='font-size:14px;' colspan='2'><b>Subtotal : </b></td><td style='font-size:14px;'>".$total_price."</td></tr>
                  <tr><td style='font-size:14px;' colspan='2'><b>Payment method : </b></td><td style='font-size:14px;''>".$payment."</td></tr>
                  <tr><td style='font-size:14px;' colspan='2'><b>Total : </b></td><td style='font-size:14px;'>".$total_price."</td></tr>";
            
            
                  sendMail($to,$table_products);

                    $delQuery=mysqli_query($conn,"DELETE FROM cart WHERE client_id='$client' and product_id='$id'");
               
                      $result=array("state"=>"success","msg"=>"Your order is placed successfully, we will get back to you once we see it.");
echo json_encode($result,JSON_PRETTY_PRINT);
                }else{
                     $result=array("state"=>"danger","msg"=>"Error placing order, try again later.");
echo json_encode($result,JSON_PRETTY_PRINT);
                }
}else if(isset($_POST['checkout'])){
   
       $client=md5(
    $_SERVER['REMOTE_ADDR'] .
    $_SERVER['HTTP_USER_AGENT']);

    if(isset($_COOKIE["eguriro"])) {
       $client=$_COOKIE["eguriro"];
    }else{

       $result=array("state"=>"danger","msg"=>"You must login first to checkout, go to account Login and fill the form.");
echo json_encode($result,JSON_PRETTY_PRINT);
return false;
    }


    $cartQuery=mysqli_query($conn,"SELECT * FROM cart WHERE client_id='$client'");
    if($cartQuery==true){
      $table_products="";
     


      sendMail($to,$table_products);
    while($cartRow=mysqli_fetch_assoc($cartQuery)){

    $number=mt_rand();

     $id=$cartRow['product_id'];
     $quantity=$cartRow['quantity'];
      $price=$cartRow['total_price'];
      $name=$cartRow['product_name'];
      $payment=$_POST['payment'];

      $table_products.=" <tr>
      <td style='font-size:14px;'>
          <p>Online Product</p>
          <p><b>Product Link :</b> ".$name. "</p>
          <p><b>Product Price :</b> ".$price."</p>
          <p><b>Ships to Rwanda?:</b> Yes</p>
      </td>
      <td style='font-size:14px;'>".$quantity."</td>
      <td style='font-size:14px;'>".$price."</td></tr>";

      
         $sqlOrder="INSERT INTO orders(order_number,product_id,product_name,client_id,quantity,total_price,order_status,order_payment) VALUES('$number','$id','$name','$client','$quantity','$price','Pending','$payment')";
                $queryOrder=mysqli_query($conn,$sqlOrder);
                if($queryOrder==true){

                    $delQuery=mysqli_query($conn,"DELETE FROM cart WHERE client_id='$client' and product_id='$id'");
               
                      $result=array("state"=>"success","msg"=>"Your orders are placed successfully, we will get back to you once we see it.");

                }else{
                     $result=array("state"=>"danger","msg"=>"Error placing order, try again later.");
echo json_encode($result,JSON_PRETTY_PRINT);
                }

    }

         $result=array("state"=>"success","msg"=>"Your orders are placed successfully, we will get back to you once we see it.");
echo json_encode($result,JSON_PRETTY_PRINT);
}else{

         $result=array("state"=>"danger","msg"=>"Error placing order, try again later.");
echo json_encode($result,JSON_PRETTY_PRINT);
}

}


function uuid()
{
    if (function_exists('com_create_guid') === true)
        return trim(com_create_guid(), '{}');

    $data = openssl_random_pseudo_bytes(16);
    $data[6] = chr(ord($data[6]) & 0x0f | 0x40); // set version to 0100
    $data[8] = chr(ord($data[8]) & 0x3f | 0x80); // set bits 6-7 to 10
    return vsprintf('%s%s-%s-%s-%s-%s%s%s', str_split(bin2hex($data), 4));
}






function sendMail($to,$table_products){
      
  // $to = 'tuyigilbert97@gmail.com,wideshop2017@gmail.com,regissaffi@gmail.com
  // ';

  require "connect.php";

  $client_unique=$_COOKIE['eguriro'];
  $select=mysqli_query($conn,"select * from clients where client_unique='$client_unique'");
  $dis=mysqli_fetch_array($select);

  $client_name=$dis['client_fname']." ".$dis['client_lname'];
  $client_phone=$dis['client_phone'];
  $client_email=$dis['client_email'];
  



  $to = 'tuyigilbert97@gmail.com';

  $subject = 'Eguriro';
  
  $headers = "From: Eguriro <".strip_tags("sales@eguriro.com").">\r\n";
  $headers .= "MIME-Version: 1.0\r\n";
  $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
  $message ="
  <div class='container' style='background:#fff;
        background-size: cover;
        background-position: center;
        min-height: 600px;
        width: 100%;
        padding: 30px 0px;
        text-align: center;'>
          <!-- <a href='www.itike.rw'><img src='https://www.itike.rw/images/logo-name.png' height='50'></a> -->
          <div class='email-container' style='
          padding: 20px 0px;
          margin-top: 10px;
          width: 95%;
          max-width: 500px;
          margin: auto;'>
            <div class='email-header' style='
            padding: 20px 0px;
            background:#FDAE2B;
            background: #FDAE2B !important;
            color: #000;
            font-size: 20px;
            font-family: ubuntu;
            position: relative;'>
             New Order : #11332
            </div>
            <div style='background: rgba(255,255,255,0.9);
            min-height: 250px;
            padding: 20px;
            text-align: left;
            font-family: arial;
            font-size: 14px;
            line-height: 20px;'>
            <div class='email-body' style='
              width:98%;
              margin:auto; position:relative;'>
              <p>Hello</p>
              <!-- &#x22; &#x22; -->
              <p>You have received the following order from user</p>
              <p style='color:#FBB961;'> [Order #11332 ](Date)</p>
  
              <div style='position:relative'>
              <table border='1'style='border-collapse: collapse;'  width='100%'>
                  <tr><td width='60%'><b>Product</b></td><td width='20%'><b>Quantity</b></td><td width='20%'><b>Price</b></td></tr>
                  ".$table_products."
                  
      <tr><td style='font-size:14px;' colspan='2'><b>Subtotal : </b></td><td style='font-size:14px;'>0</td></tr>
      <tr><td style='font-size:14px;' colspan='2'><b>Payment method : </b></td><td style='font-size:14px;''>0</td></tr>
      <tr><td style='font-size:14px;' colspan='2'><b>Total : </b></td><td style='font-size:14px;'>0</td></tr>
                  </table>
  
              <p style='color:#FBB961;texe-align:center;'><b>Billing Address</b></p>
              <div width='100%' style='border: 1px solid black;'>
              <center>".$client_name."<br>
              ".$client_phone."<br>
              ".$client_email."<br>
              </center>
              </div>
              </div>
              </div>
              <br>
              <p>Congratilations on the sale</p>
            </div>
            </div>
            <!-- <div class='email-footer' style='
            padding: 20px 0px;
            background:rgb(19,30,56);
            background: #000 !important;
            color: #fff;
            font-size: 13px;
            font-family: ubuntu;
            position: relative;'>
              Arthur Nation Team  - Proudly powered by <a style='color: #fff;' target='_blank' href='https://www.itdevs.rw'>IT Devs</a>
            </div> -->
          </div>
      </div>
   ";
    
   mail($to, $subject, $message, $headers); 
    
  }



?>