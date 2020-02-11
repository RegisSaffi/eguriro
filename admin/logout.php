<?php
if(setcookie("eguriro", "", time() - 3600,"/")){
header("location:../index.php");
}
?>