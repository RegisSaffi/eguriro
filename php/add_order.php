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
        VALUES (null,'$product',NOW(),'$client','$weight','$total_price','pending','$oder_number','$payment')") or die(mysqli_error($conn));
        if($insert==true){
            $to="";
            sendMail($to,$product,$total_price,$weight,$payment);
            sendMailclient($to,$product,$total_price,$weight,$payment);
            echo "<font color='green'>Ordered successfully</font>";
        }else{
            echo "<font color='red'>Something went wrong</font>";
        }
    }else{
        echo "login";
        // echo "<script type='text/javascript'>window.location.replace('signin.php');</script>";
        // $client=md5($_SERVER['REMOTE_ADDR'] .$_SERVER['HTTP_USER_AGENT']);

    }
    
}



function sendMail($to,$product,$total_price,$weight,$payment){
      
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
                    <tr>
                            <td style='font-size:14px;'>
                                <p>Online Product</p>
                                <p><b>Product Link :</b> ".$product. "</p>
                                <p><b>Product Price :</b> ".$total_price."</p>
                                <p><b>Ships to Rwanda?:</b> Yes</p>
                            </td>
                            <td style='font-size:14px;'>1</td>
                            <td style='font-size:14px;'>$360</td></tr>
                            <tr><td style='font-size:14px;' colspan='2'><b>Subtotal : </b></td><td style='font-size:14px;'>".$total_price."</td></tr>
                            <tr><td style='font-size:14px;' colspan='2'><b>Payment method : </b></td><td style='font-size:14px;''>".$payment."</td></tr>
                            <tr><td style='font-size:14px;' colspan='2'><b>Total : </b></td><td style='font-size:14px;'>".$total_price."</td></tr>
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


    function sendMailclient($to,$product,$total_price,$weight,$payment){
      
        // $to = 'tuyigilbert97@gmail.com,wideshop2017@gmail.com,regissaffi@gmail.com
        // ';

        require "connection.php";
    
        $client_unique=$_COOKIE['eguriro'];
        $select=mysqli_query($conn,"select * from clients where client_unique='$client_unique'");
        $dis=mysqli_fetch_array($select);
    
        $client_name=$dis['client_fname']." ".$dis['client_lname'];
        $client_phone=$dis['client_phone'];
        $client_email=$dis['client_email'];
    
        $to = $client_email;
    
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
                    <p>You have made this order on EGuriro, thanks for shoping with us</p>
                    <p style='color:#FBB961;'> [Order #11332 ](Date)</p>
        
                    <div style='position:relative'>
                    <table border='1'style='border-collapse: collapse;'  width='100%'>
                        <tr><td width='60%'><b>Product</b></td><td width='20%'><b>Quantity</b></td><td width='20%'><b>Price</b></td></tr>
                        <tr>
                            <td style='font-size:14px;'>
                                <p>Online Product</p>
                                <p><b>Product Link :</b> ".$product. "</p>
                                <p><b>Product Price :</b> ".$total_price."</p>
                                <p><b>Ships to Rwanda?:</b> Yes</p>
                            </td>
                            <td style='font-size:14px;'>1</td>
                            <td style='font-size:14px;'>$360</td></tr>
                            <tr><td style='font-size:14px;' colspan='2'><b>Subtotal : </b></td><td style='font-size:14px;'>".$total_price."</td></tr>
                            <tr><td style='font-size:14px;' colspan='2'><b>Payment method : </b></td><td style='font-size:14px;''>".$payment."</td></tr>
                            <tr><td style='font-size:14px;' colspan='2'><b>Total : </b></td><td style='font-size:14px;'>".$total_price."</td></tr>
                    </table>
        
                   
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