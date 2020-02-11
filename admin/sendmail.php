<?php
require "connection.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>E guriro|Send email</title>


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
<body>

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
<h5>Send E-mail</h5>
</div>
<div class="card-block">
  <?php
  if(isset($_POST['send'])){
    require "connection.php";

    $message=$_POST['message'];
    foreach ($_POST['clients'] as $client) {
        sendMail($client,$message);
    }
echo "<font color'green'>Message sent successfully</font>";
  }


  function sendMail($to,$m){
      
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
               Eguriro Message
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
                <p>".$m."</p>
    
               
    
               
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
<form id="main" method="post" action="#"  enctype="multipart/form-data" >
<div class="form-group row">
<label class="col-sm-2 col-form-label">Clients</label>
<div class="col-sm-10">
<select class="form-control" name="clients[]" multiple="multiple">
    <option value="">Select client</option>
<?php
$select=mysqli_query($conn,"select * from clients");
while($dis=mysqli_fetch_array($select)){
echo "<option value='".$dis['client_email']."'>".$dis['client_fname']." ".$dis['client_lname']."</option>";
}
?>
    </select>
<span class="messages"></span>
</div>
</div>
<div class="form-group row">
<label class="col-sm-2 col-form-label">Message</label>
<div class="col-sm-10">
  <textarea cols="10" rows="5" class="form-control" placeholder="Message" name="message" required></textarea>
 <span class="messages"></span>
</div>
</div>


<div class="form-group row">
<label class="col-sm-2"></label>
<div class="col-sm-10">
<button type="submit" name="send message" class="btn btn-primary m-b-0">send</button>
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

</html>
