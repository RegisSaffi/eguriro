<!DOCTYPE html>
<html lang="en">
<head>
<title>E guriro|note product</title>


<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
<meta http-equiv="X-UA-Compatible" content="IE=edge" />
<meta name="description" content="Admindek Bootstrap admin template made using Bootstrap 4 and it has huge amount of ready made feature, UI components, pages which completely fulfills any dashboard needs." />
<meta name="keywords" content="flat ui, admin Admin , Responsive, Landing, Bootstrap, App, Template, Mobile, iOS, Android, apple, creative app">
<meta name="author" content="colorlib" />

<link rel="icon" href="https://colorlib.com//polygon/admindek/files/assets/images/favicon.ico" type="image/x-icon">

<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800" rel="stylesheet"><link href="https://fonts.googleapis.com/css?family=Quicksand:500,700" rel="stylesheet">

<link rel="stylesheet" type="text/css" href="files/bower_components/bootstrap/css/bootstrap.min.css">

<link rel="stylesheet" href="files/assets/pages/waves/css/waves.min.css" type="text/css" media="all">

<link rel="stylesheet" type="text/css" href="files/assets/icon/feather/css/feather.css">

<link rel="stylesheet" type="text/css" href="files/assets/css/style.css">
</head>
<body>"

<div class="loader-bg">
<div class="loader-bar"></div>
</div>

<div id="pcoded" class="pcoded">
<div class="pcoded-overlay-box"></div>
<div class="pcoded-container navbar-wrapper">

<?php include "./includes/nav.php";  ?>

<div class="pcoded-main-container">
<div class="pcoded-wrapper">


<?php include "./includes/nav_side.php"; ?>

<div class="pcoded-content">


<div class="pcoded-inner-content">
<div class="main-body">
<div class="page-wrapper">
<div class="page-body">

<div class="row">
<div class="col-sm-12">


<div class="card">
<div class="card-header">
<h5>Edit notes</h5>
</div>
<div class="card-block">
  <?php
  if(isset($_POST['save'])){
$note=$_POST['order_note'];
if(!empty($note)){
  require "connection.php";
  $id=$_GET['id'];
  $update=mysqli_query($conn,"update orders set order_note='$note' where order_id='$id'") or die(mysqli_error
  ($conn));
  if($update==true){
  echo "<font color='green'>Note updated successful</font> ";
}else{
  echo "<font color='red'>Something went wrong!</font>";
}
}
}
?>
<form id="main" method="post" action="#"  enctype="multipart/form-data" >
<div class="form-group row">
<label class="col-sm-2 col-form-label">Order note</label>
<div class="col-sm-10">
<textarea rows='10' class="form-control"  name="order_note" required><?php if( isset($_POST['save'])){ echo $_POST['order_note']; } else{  echo $_GET['note']; } ?></textarea> 
<span class="messages"></span>
</div>



<div class="form-group row">
<label class="col-sm-2"></label>
<div class="col-sm-10">
<button type="submit" name="save" class="btn btn-primary m-b-0">save</button>
</div>
</div>


</form>
</div>
</div>


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


<script type="b8bb98f66259e62c0d3f52d3-text/javascript" src="files/bower_components/jquery/js/jquery.min.js"></script>
<script type="b8bb98f66259e62c0d3f52d3-text/javascript" src="files/bower_components/jquery-ui/js/jquery-ui.min.js"></script>
<script type="b8bb98f66259e62c0d3f52d3-text/javascript" src="files/bower_components/popper.js/js/popper.min.js"></script>
<script type="b8bb98f66259e62c0d3f52d3-text/javascript" src="files/bower_components/bootstrap/js/bootstrap.min.js"></script>

<script src="files/assets/pages/waves/js/waves.min.js" type="b8bb98f66259e62c0d3f52d3-text/javascript"></script>

<script type="b8bb98f66259e62c0d3f52d3-text/javascript" src="files/bower_components/jquery-slimscroll/js/jquery.slimscroll.js"></script>
<script src="files/assets/js/pcoded.min.js" type="b8bb98f66259e62c0d3f52d3-text/javascript"></script>
<script src="files/assets/js/vertical/vertical-layout.min.js" type="b8bb98f66259e62c0d3f52d3-text/javascript"></script>

<script type="b8bb98f66259e62c0d3f52d3-text/javascript" src="files/assets/js/script.min.js"></script>

<script async src="https://www.googletagmanager.com/gtag/js?id=UA-23581568-13" type="b8bb98f66259e62c0d3f52d3-text/javascript"></script>
<script type="b8bb98f66259e62c0d3f52d3-text/javascript">
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-23581568-13');
</script>
<script src="ajax.cloudflare.com/cdn-cgi/scripts/7089c43e/cloudflare-static/rocket-loader.min.js" data-cf-settings="b8bb98f66259e62c0d3f52d3-|49" defer=""></script></body>

<!-- Mirrored from colorlib.com//polygon/admindek/default/sample-page.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 24 Dec 2019 13:26:35 GMT -->
</html>
