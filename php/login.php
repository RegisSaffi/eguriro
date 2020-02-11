<?php
session_start();

$user=$_POST['user'];
$pass=$_POST['pass'];

if(empty($user) or empty($pass))
{
echo 'Enter email or phone and password to continue';
return false;
}

include("connect.php");

$pass2=sha1($pass);
$select=mysqli_query($conn,"SELECT * FROM clients WHERE (client_email='$user' OR client_phone='$user') AND client_password='$pass2'");
$count=mysqli_num_rows($select);

if($select==true and $count==1)
{

$a=mysqli_fetch_assoc($select);

    $_SESSION['user']=$a['client_fname'];
    $_SESSION['email']=$a['client_email'];
    $_SESSION['id']=$a['client_unique'];

    setcookie("eguriro", $a['client_unique'], time() + (86400 * 30), "/"); // 86400 = 1 day

   $result=array("state"=>"success","msg"=>"Sign in successfully");
echo json_encode($result,JSON_PRETTY_PRINT);

}
else
{ 
$result=array("state"=>"danger","msg"=>"Invalid credentials, try again later");
echo json_encode($result,JSON_PRETTY_PRINT);
return false;
}
?>