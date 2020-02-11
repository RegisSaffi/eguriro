<!DOCTYPE html>
<html lang="en">

<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<head>
<title>Admin login</title>

<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
<meta http-equiv="X-UA-Compatible" content="IE=edge" />
<meta name="description" content="Admindek Bootstrap admin template made using Bootstrap 4 and it has huge amount of ready made feature, UI components, pages which completely fulfills any dashboard needs." />
<meta name="keywords" content="bootstrap, bootstrap admin template, admin theme, admin dashboard, dashboard template, admin template, responsive" />
<meta name="author" content="colorlib" />

<link rel="icon" href="https://colorlib.com//polygon/admindek/files/assets/images/favicon.ico" type="image/x-icon">

<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800" rel="stylesheet"><link href="https://fonts.googleapis.com/css?family=Quicksand:500,700" rel="stylesheet">

<link rel="stylesheet" type="text/css" href="files/bower_components/bootstrap/css/bootstrap.min.css">

<link rel="stylesheet" href="files/assets/pages/waves/css/waves.min.css" type="text/css" media="all"> <link rel="stylesheet" type="text/css" href="files/assets/icon/feather/css/feather.css">

<link rel="stylesheet" type="text/css" href="files/assets/icon/themify-icons/themify-icons.css">

<link rel="stylesheet" type="text/css" href="files/assets/icon/icofont/css/icofont.css">

<link rel="stylesheet" type="text/css" href="files/assets/icon/font-awesome/css/font-awesome.min.css">

<link rel="stylesheet" type="text/css" href="files/assets/css/style.css"><link rel="stylesheet" type="text/css" href="files/assets/css/pages.css">
</head>
<body themebg-pattern="theme1">

<div class="theme-loader">
<div class="loader-track">
<div class="preloader-wrapper">
<div class="spinner-layer spinner-blue">
<div class="circle-clipper left">
<div class="circle"></div>
</div>
<div class="gap-patch">
<div class="circle"></div>
</div>
<div class="circle-clipper right">
<div class="circle"></div>
</div>
</div>
<div class="spinner-layer spinner-red">
<div class="circle-clipper left">
<div class="circle"></div>
</div>
<div class="gap-patch">
<div class="circle"></div>
</div>
<div class="circle-clipper right">
<div class="circle"></div>
</div>
</div>
<div class="spinner-layer spinner-yellow">
<div class="circle-clipper left">
<div class="circle"></div>
</div>
<div class="gap-patch">
<div class="circle"></div>
</div>
<div class="circle-clipper right">
<div class="circle"></div>
</div>
</div>
<div class="spinner-layer spinner-green">
<div class="circle-clipper left">
<div class="circle"></div>
</div>
<div class="gap-patch">
<div class="circle"></div>
</div>
<div class="circle-clipper right">
<div class="circle"></div>
</div>
</div>
</div>
</div>
</div>

<section class="login-block">

<div class="container-fluid">
<div class="row">
<div class="col-sm-12">



<form class="md-float-material form-material" method="post">

<div class="auth-box card">
<div class="card-block">
<div class="row m-b-20">
<div class="col-md-12">
<h3 class="text-center txt-primary">E-Guriro Admin</h3>
<div class="text-center ">
<?php
require "connection.php";
if(isset($_POST['login'])){
    if(!empty($_POST['username']) && !empty($_POST['password'])){
        $username=$_POST['username'];
        $password=$_POST['password'];
        $select=mysqli_query($conn,"select * from admins where user_username='$username' and password='$password'") or die(mysqli_error($conn));
        if($select){
            $num=mysqli_num_rows($select);
            if($num==1){
                $dis=mysqli_fetch_assoc($select);
                $user_fname=$dis['user_fname'];
                $user_lname=$dis['user_lname'];
                setcookie("user_fname",$user_fname, time() + (86400 * 30), "/"); 
                setcookie("user_lname",$user_lname, time() + (86400 * 30), "/");
                header("location: home.php");
            }
        }else{
            echo "<font color='red'>Something went wrong!</font>";
        }
    }else{
        echo "<font color='red'>Empty field detected!</font>";
    }

}
?>
</div>
</div>
</div>
<p class="text-muted text-center p-b-5">Sign in with your regular account</p>
<div class="form-group form-primary">
<input type="text" name="username" class="form-control" required="">
<span class="form-bar"></span>
<label class="float-label">Username</label>
</div>
<div class="form-group form-primary">
<input type="password" name="password" class="form-control" required="">
<span class="form-bar"></span>
<label class="float-label">Password</label>
</div>
<div class="row m-t-25 text-left">

</div>
<div class="row m-t-30">
<div class="col-md-12">
<button type="submit" name="login"  class="btn btn-primary btn-md btn-block waves-effect text-center m-b-20">LOGIN</button>
</div>
</div>


</div>
</div>
</form>

</div>

</div>

</div>

</div>

</section>


<!--[if lt IE 10]>
<div class="ie-warning">
    <h1>Warning!!</h1>
    <p>You are using an outdated version of Internet Explorer, please upgrade <br/>to any of the following web browsers to access this website.</p>
    <div class="iew-container">
        <ul class="iew-download">
            <li>
                <a href="http://www.google.com/chrome/">
                    <img src="files/assets/images/browser/chrome.png" alt="Chrome">
                    <div>Chrome</div>
                </a>
            </li>
            <li>
                <a href="https://www.mozilla.org/en-US/firefox/new/">
                    <img src="files/assets/images/browser/firefox.png" alt="Firefox">
                    <div>Firefox</div>
                </a>
            </li>
            <li>
                <a href="http://www.opera.com">
                    <img src="files/assets/images/browser/opera.png" alt="Opera">
                    <div>Opera</div>
                </a>
            </li>
            <li>
                <a href="https://www.apple.com/safari/">
                    <img src="files/assets/images/browser/safari.png" alt="Safari">
                    <div>Safari</div>
                </a>
            </li>
            <li>
                <a href="http://windows.microsoft.com/en-us/internet-explorer/download-ie">
                    <img src="files/assets/images/browser/ie.png" alt="">
                    <div>IE (9 & above)</div>
                </a>
            </li>
        </ul>
    </div>
    <p>Sorry for the inconvenience!</p>
</div>
<![endif]-->


<script type="6703b0b49493ea410ff6d760-text/javascript" src="files/bower_components/jquery/js/jquery.min.js"></script>
<script type="6703b0b49493ea410ff6d760-text/javascript" src="files/bower_components/jquery-ui/js/jquery-ui.min.js"></script>
<script type="6703b0b49493ea410ff6d760-text/javascript" src="files/bower_components/popper.js/js/popper.min.js"></script>
<script type="6703b0b49493ea410ff6d760-text/javascript" src="files/bower_components/bootstrap/js/bootstrap.min.js"></script>

<script src="files/assets/pages/waves/js/waves.min.js" type="6703b0b49493ea410ff6d760-text/javascript"></script>

<script type="6703b0b49493ea410ff6d760-text/javascript" src="files/bower_components/jquery-slimscroll/js/jquery.slimscroll.js"></script>

<script type="6703b0b49493ea410ff6d760-text/javascript" src="files/bower_components/modernizr/js/modernizr.js"></script>
<script type="6703b0b49493ea410ff6d760-text/javascript" src="files/bower_components/modernizr/js/css-scrollbars.js"></script>
<script type="6703b0b49493ea410ff6d760-text/javascript" src="files/assets/js/common-pages.js"></script>

<script async src="https://www.googletagmanager.com/gtag/js?id=UA-23581568-13" type="6703b0b49493ea410ff6d760-text/javascript"></script>
<script type="6703b0b49493ea410ff6d760-text/javascript">
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-23581568-13');
</script>
<script src="ajax.cloudflare.com/cdn-cgi/scripts/7089c43e/cloudflare-static/rocket-loader.min.js" data-cf-settings="6703b0b49493ea410ff6d760-|49" defer=""></script></body>

<!-- Mirrored from colorlib.com//polygon/admindek/default/auth-sign-in-social.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 24 Dec 2019 13:20:23 GMT -->
</html>
