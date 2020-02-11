<?php
session_start();

$fname=$_POST['fname'];
$lname=$_POST['lname'];
$pass=$_POST['password'];
$email=$_POST['email'];
$phone=$_POST['phone'];


if(empty($fname) or empty($email)or empty($pass) or empty($lname) or empty($phone))
{
   $result=array("state"=>"danger","msg"=>"Empty fields not allowed, correct and try again");
echo json_encode($result,JSON_PRETTY_PRINT);

return false;
}

include("connect.php");

     $id=md5(
    $_SERVER['REMOTE_ADDR'] .
    $_SERVER['HTTP_USER_AGENT']);


$pass2=sha1($pass);
$sql="INSERT INTO clients(client_unique,client_fname,client_lname,client_phone,client_password,client_email) VALUES('$id','$fname','$lname','$phone','$pass2','$email')";

$query=mysqli_query($conn,$sql);

if($query==true)
{

    setcookie("eguriro", $id, time() + (86400 * 30), "/"); // 86400 = 1 day

   $result=array("state"=>"success","msg"=>"Registered successfully, you can log in to your account.");
echo json_encode($result,JSON_PRETTY_PRINT);
}
else
{ 
   $result=array("state"=>"danger","msg"=>"Not registered, try again later");
echo json_encode($result,JSON_PRETTY_PRINT);

return false;
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


?>