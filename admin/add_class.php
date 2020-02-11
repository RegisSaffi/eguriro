<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from colorlib.com//polygon/admindek/default/form-select.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 24 Dec 2019 13:23:30 GMT -->
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->
<head>
<title>Admindek | Admin Template</title>


<!--[if lt IE 10]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
<meta http-equiv="X-UA-Compatible" content="IE=edge" />
<meta name="description" content="Admindek Bootstrap admin template made using Bootstrap 4 and it has huge amount of ready made feature, UI components, pages which completely fulfills any dashboard needs." />
<meta name="keywords" content="bootstrap, bootstrap admin template, admin theme, admin dashboard, dashboard template, admin template, responsive" />
<meta name="author" content="colorlib" />

<link rel="icon" href="https://colorlib.com//polygon/admindek/files/assets/images/favicon.ico" type="image/x-icon">
 <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800" rel="stylesheet"><link href="https://fonts.googleapis.com/css?family=Quicksand:500,700" rel="stylesheet">

<link rel="stylesheet" type="text/css" href="files/bower_components/bootstrap/css/bootstrap.min.css">

<link rel="stylesheet" href="files/assets/pages/waves/css/waves.min.css" type="text/css" media="all">

<link rel="stylesheet" type="text/css" href="files/assets/icon/feather/css/feather.css">

<link rel="stylesheet" type="text/css" href="files/assets/icon/themify-icons/themify-icons.css">

<link rel="stylesheet" type="text/css" href="files/assets/icon/icofont/css/icofont.css">

<link rel="stylesheet" type="text/css" href="files/assets/icon/font-awesome/css/font-awesome.min.css">

<link rel="stylesheet" href="files/bower_components/select2/css/select2.min.css" />

<link rel="stylesheet" type="text/css" href="files/bower_components/bootstrap-multiselect/css/bootstrap-multiselect.css" />
<link rel="stylesheet" type="text/css" href="files/bower_components/multiselect/css/multi-select.css" />

<link rel="stylesheet" type="text/css" href="files/assets/css/style.css">
<link rel="stylesheet" type="text/css" href="files/assets/css/pages.css">
</head>
<body>
<div class="loader-bg">
<div class="loader-bar"></div>
</div>

<div id="pcoded" class="pcoded">
<div class="pcoded-overlay-box"></div>
<div class="pcoded-container navbar-wrapper">
    
<!--topbar starts-->
<?php require 'inc/topbar.php';?>
<!--topbar ends-->

<!--right side slide messagesends-->
<?php require 'inc/sidemessages.php';?>
<!--right side slide messagesends-->

</div>


<div class="pcoded-main-container">
<div class="pcoded-wrapper">

<!--beginning of sidebar-->
<?php require 'inc/sidebar.php';?>
<!--end of sidebar-->

<div class="pcoded-content">

<!--header bar starts-->
<?php require 'inc/header.php';?>
<!--header bar ends-->

<!-- main body starts-->

<div class="pcoded-inner-content">
<div class="main-body">
<div class="page-wrapper">

<div class="page-body">
<div class="row">
<div class="col-sm-12">

<!--add school_user start--> 
<div class="card">
<div class="card-header">
<h5>Add new user</h5>
</div>

<?php

require 'connection.php';
require 'test.data.php';

if(isset($_POST['reg']))
{
$fname=test_data($_POST['fname']);
$lname=test_data($_POST['lname']);
$nationality=test_data($_POST['nationality']);
$qualify=test_data($_POST['qualify']);
$nid=test_data($_POST['nid']);
$role=test_data($_POST['role']);
$phone=test_data($_POST['phone']);
$mail=test_data($_POST['mail']);

$pass=$lname.substr(uniqid(),1,4);

$status='status';

$ins_school=mysqli_query($connection, "INSERT INTO `school_user`(`school_user_fname`, `school_user_lname`, `school_user_phone`, `school_user_nationality`, `school_user_national_id`, `school_user_qualification`, `school_user_email`, `school_user_role`, `school_user_status`, `school_user_username`, `school_user_password`, `school_id`) VALUES ('$fname','$lname','$phone','$nationality','$nid','$qualify','$mail','$role','$status','$lname','$pass','".$_COOKIE['darasa_school_id']."')") or die(mysqli_error($connection));

if($ins_school)
{
  echo "<script> alert('Well! The school user has been registered successfully')</script>";
}
}
?>

<div class="card-block">
<form action="#"  method="post">
<div class="form-group row">
<div class="col-sm-10">
<input type="text" class="form-control" name="fname" placeholder="Enter first name" required>
</div>
</div>

<div class="form-group row">
<div class="col-sm-10">
<input type="text" class="form-control" name="lname" placeholder="Enter second name" required>
</div>
</div>

<div class="form-group row">
<div class="col-sm-10">
<input type="number" maxlength="10" class="form-control" name="phone" placeholder="Enter phone number" required>
</div>
</div>

<div class="form-group row">
<div class="col-sm-10">
<input type="number" maxlength="16" class="form-control" name="nid" placeholder="National ID number" required>
</div>
</div>

<div class="form-group row">
<div class="col-sm-10">
<input type="text" class="form-control" name="nationality" placeholder="Enter nationality" required>
</div>
</div>

<div class="form-group row">
<div class="col-sm-10">
<input type="text" class="form-control" name="qualify" placeholder="Enter qualification" required>
</div>
</div>

<div class="form-group row">
<div class="col-sm-10">
<input type="email" class="form-control" name="mail" placeholder="Enter school e-mail address" required>
</div>
</div>

<div class="form-group row">
<div class="col-sm-10">
<select name="role" class="form-control">
	<option>director</option>
	<option>head_of_study</option>
	<option>head_of_discipline</option>
	<option>teacher</option>
	<option>librarian</option>
	<option>sick_bay</option>
</select>

<select class="js-example-placeholder-multiple col-sm-12" multiple="multiple">
<option value="AL">Alabama</option>
<option value="WY">Wyoming</option>
<option value="WY">Coming</option>
<option value="WY">Hanry Die</option>
<option value="WY">John Doe</option>
</select>
</div>
</div>

<div class="form-group row">
<div class="col-sm-10">
<button type="submit" name="reg" class="btn btn-primary btn-xs">Register</button>
</div>
</div>

</form>
</div>
</div>

</div>
<!--add school_user end-->  

</div>
</div>
</div>

</div>
</div>
</div>
</div>

<div id="styleSelector">
</div>
</div>
</div>
</div>
</div>


<script type="0d3b73969f6cd8a79e867943-text/javascript" src="files/bower_components/jquery/js/jquery.min.js"></script>
<script type="0d3b73969f6cd8a79e867943-text/javascript" src="files/bower_components/jquery-ui/js/jquery-ui.min.js"></script>
<script type="0d3b73969f6cd8a79e867943-text/javascript" src="files/bower_components/popper.js/js/popper.min.js"></script>
<script type="0d3b73969f6cd8a79e867943-text/javascript" src="files/bower_components/bootstrap/js/bootstrap.min.js"></script>

<script src="files/assets/pages/waves/js/waves.min.js" type="0d3b73969f6cd8a79e867943-text/javascript"></script>

<script type="0d3b73969f6cd8a79e867943-text/javascript" src="files/bower_components/jquery-slimscroll/js/jquery.slimscroll.js"></script>

<script type="0d3b73969f6cd8a79e867943-text/javascript" src="files/bower_components/modernizr/js/modernizr.js"></script>
<script type="0d3b73969f6cd8a79e867943-text/javascript" src="files/bower_components/modernizr/js/css-scrollbars.js"></script>

<script type="0d3b73969f6cd8a79e867943-text/javascript" src="files/bower_components/select2/js/select2.full.min.js"></script>

<script type="0d3b73969f6cd8a79e867943-text/javascript" src="files/bower_components/bootstrap-multiselect/js/bootstrap-multiselect.js">
</script>
<script type="0d3b73969f6cd8a79e867943-text/javascript" src="files/bower_components/multiselect/js/jquery.multi-select.js"></script>
<script type="0d3b73969f6cd8a79e867943-text/javascript" src="files/assets/js/jquery.quicksearch.js"></script>

<script type="0d3b73969f6cd8a79e867943-text/javascript" src="files/assets/pages/advance-elements/select2-custom.js"></script>
<script src="files/assets/js/pcoded.min.js" type="0d3b73969f6cd8a79e867943-text/javascript"></script>
<script src="files/assets/js/vertical/vertical-layout.min.js" type="0d3b73969f6cd8a79e867943-text/javascript"></script>
<script src="files/assets/js/jquery.mCustomScrollbar.concat.min.js" type="0d3b73969f6cd8a79e867943-text/javascript"></script>
<script type="0d3b73969f6cd8a79e867943-text/javascript" src="files/assets/js/script.js"></script>

<script async src="https://www.googletagmanager.com/gtag/js?id=UA-23581568-13" type="0d3b73969f6cd8a79e867943-text/javascript"></script>
<script type="0d3b73969f6cd8a79e867943-text/javascript">
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-23581568-13');
</script>
<script src="ajax.cloudflare.com/cdn-cgi/scripts/7089c43e/cloudflare-static/rocket-loader.min.js" data-cf-settings="0d3b73969f6cd8a79e867943-|49" defer=""></script></body>

<!-- Mirrored from colorlib.com//polygon/admindek/default/form-select.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 24 Dec 2019 13:23:36 GMT -->
</html>
