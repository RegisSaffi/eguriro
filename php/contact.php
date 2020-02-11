<?php

$name=$_POST['name'];
$email=$_POST['email'];
$subject=$_POST['subject'];
$message=$_POST['message'];

if(empty($name) or empty($message))
{
  $result=array("state"=>"success","msg"=>'Name or message can not be empty');
echo json_encode($result,JSON_PRETTY_PRINT);
return false;
}

include("connect.php");

$sql="INSERT INTO messages(names,email,subject,message) VALUES('$name','$email','$subject','$message')";

$query=mysqli_query($conn,$sql);

if($query==true )
{

   $result=array("state"=>"success","msg"=>"thank you we have received you message we will reply as soon as possible");
echo json_encode($result,JSON_PRETTY_PRINT);

}
else
{ 
$result=array("state"=>"danger","msg"=>"Error sending feedback,try again later");
echo json_encode($result,JSON_PRETTY_PRINT);
return false;
}
?>