<?php

include("connect.php");

if(isset($_POST['id'])){

    $id=$_POST['id'];

     $sqlProduct="SELECT * FROM products WHERE product_id='$id'";
                $queryProduct=mysqli_query($conn,$sqlProduct);
                if($queryProduct==true){
                $row=mysqli_fetch_assoc($queryProduct);
                echo json_encode($row,JSON_PRETTY_PRINT);
                }else{
                    echo "error";
                }
}else if(isset($_POST['cart'])){

      $client=md5(
    $_SERVER['REMOTE_ADDR'] .
    $_SERVER['HTTP_USER_AGENT']);

    if(isset($_COOKIE["eguriro"])) {
       $client=$_COOKIE["eguriro"];
    }

    $id="000";

    if(isset($_POST['id'])){
      $id=$_POST['product'];
    }else{
      $id=$_POST['name'];
    }
    
     $quantity=$_POST['quantity'];
      $price=$_POST['price'];
       $name=$_POST['name'];

     $sqlCart="INSERT INTO cart(client_id,product_id,product_name,quantity,total_price) VALUES('$client','$id','$name','$quantity','$price')";
                $queryCart=mysqli_query($conn,$sqlCart);
                if($queryCart==true){
               
                      $result=array("state"=>"success","msg"=>"Product added to cart.");
echo json_encode($result,JSON_PRETTY_PRINT);
                }else{
                     $result=array("state"=>"danger","msg"=>"Error adding to cart, try again later.");
echo json_encode($result,JSON_PRETTY_PRINT);
                }
}
?>