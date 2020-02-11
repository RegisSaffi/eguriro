<?php
if(isset($_GET['id'] ) && isset($_GET['status'])){
require "connection.php";
$status=$_GET['status'];
$id=$_GET['id'];
$update=mysqli_query($conn,"update orders set order_status='$status' where order_id='$id'") or die(mysqli_error($conn));
}


?>



<!DOCTYPE html>
<html lang="en">
<head>
<title>E guriro|Discount</title>


<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
<meta http-equiv="X-UA-Compatible" content="IE=edge" />
<meta name="description" content="Admindek Bootstrap admin template made using Bootstrap 4 and it has huge amount of ready made feature, UI components, pages which completely fulfills any dashboard needs." />
<meta name="keywords" content="flat ui, admin Admin , Responsive, Landing, Bootstrap, App, Template, Mobile, iOS, Android, apple, creative app">
<meta name="author" content="colorlib" />

<link rel="icon" href="https://colorlib.com//polygon/admindek/files/assets/images/favicon.ico" type="image/x-icon">

<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Quicksand:500,700" rel="stylesheet">

<link rel="stylesheet" type="text/css" href="files/bower_components/bootstrap/css/bootstrap.min.css">

<link rel="stylesheet" href="files/assets/pages/waves/css/waves.min.css" type="text/css" media="all">

<link rel="stylesheet" type="text/css" href="files/assets/icon/feather/css/feather.css">

<link rel="stylesheet" type="text/css" href="files/assets/icon/themify-icons/themify-icons.css">

<link rel="stylesheet" type="text/css" href="files/assets/icon/icofont/css/icofont.css">

<link rel="stylesheet" type="text/css" href="files/assets/icon/font-awesome/css/font-awesome.min.css">

<link rel="stylesheet" type="text/css" href="files/bower_components/datatables.net-bs4/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" type="text/css" href="files/assets/pages/data-table/css/buttons.dataTables.min.css">
<link rel="stylesheet" type="text/css" href="files/bower_components/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css">

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

<?php include "./includes/nav.php";  ?>

<div class="pcoded-main-container">
<div class="pcoded-wrapper">


<?php include "./includes/nav_side.php"; ?>

<div class="pcoded-content">

<div class="page-header card">
<div class="row align-items-end">
<div class="col-lg-8">
<div class="page-header-title">
<div class="d-inline">
<h5>Orders Report</h5>
</div>
</div>
</div>
<div class="col-lg-4">
<div class="page-header-breadcrumb">
<ul class=" breadcrumb breadcrumb-title">
<li class="breadcrumb-item">
<a href="#"><i class="feather icon-home"></i></a>
</li>
<li class="breadcrumb-item">
<a href="#!">Orders Report </a>
</li>
</ul>
</div>
</div>
</div>
</div>

<div class="pcoded-inner-content">
<div class="main-body">
<div class="page-wrapper">
<div class="page-body">

<div class="row">
<div class="col-sm-12">


<div class="card">
<div class="card-header">
<h5>Discount</h5></div>
<div class="card-block">


<form id="main" method="post" action="#"  enctype="multipart/form-data" >
<div class="form-group row">
<div class="col-sm-6">
<input type="date" class="form-control" name="from" id="name" placeholder="Start date" required>
<span class="messages"></span>
</div>

<div class="col-sm-6">
<input type="date" class="form-control" name="to" id="name" placeholder="Emd date" required>
<span class="messages"></span>
</div>


</div>
<?php
if(isset($_POST['view'])){
  require "connection.php";
      $from=$_POST['from'];
      $to=$_POST['to'];
      $select=mysqli_query($conn,"select sum(total_price) as total from `orders` o inner join `clients` c on o.client_id=c.client_unique and  date(created_date) between '$from' and '$to'");
      $dis=mysqli_fetch_array($select);
      echo $dis['total'];
}
?>
<div class="form-group row">
<label class="col-sm-6 col-form-label">Total amount</label>
<div class="col-sm-6">
<button type="submit" name="view" class="btn btn-primary m-b-0">view report</button>
<span class="messages"></span>
</div>
</div>
</form>


<div class="dt-responsive table-responsive">
<table id="order-table" class="table table-striped table-bordered nowrap">
<thead>
<tr>
<th>Client name</th>
<th>Product name</th>
<th>Quantity</th>
<th>Created date</th>
<th>Order number</th>
<th>Total price</th>
<th>Order status</th>
<th>Action</th>
</tr>
</thead>
<tbody>


</tbody>
<tfoot>
    <?php
    require "connection.php";
    if(isset($_POST['view'])){
      $from=$_POST['from'];
      $to=$_POST['to'];
      $select=mysqli_query($conn,"select * from `orders` o inner join `clients` c on o.client_id=c.client_unique and  date(created_date) between '$from' and '$to'");
      while($dis=mysqli_fetch_array($select)){
        ?>

 <tr>
            <td><?php echo $dis['client_fname']." ".$dis['client_lname']; ?></td>
            <td><?php echo $dis['product_name']; ?></td>
            <td><?php echo $dis['quantity']; ?></td>
            <td><?php echo $dis['created_date']; ?></td>
            <td><?php echo $dis['order_number']; ?></td>
            <td><?php echo $dis['total_price']; ?></td>
            <td><?php echo $dis['order_status']; ?></td>
            <td>
            <div class="btn-group dropdown-split-inverse">
<button type="button" class="btn btn-primary btn-small dropdown-toggle dropdown-toggle-split waves-effect waves-light" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
Action
<span class="sr-only"></span>
</button>
<div class="dropdown-menu">
<a class="dropdown-item waves-effect waves-light" href="order_report.php?status=reviewing&id=<?php echo $dis['order_id']; ?>">
<button class="btn btn-success btn-mini">
  Reviewing
</button>
</a>

<div class="dropdown-divider"></div>
<a class="dropdown-item waves-effect waves-light" href="order_report.php?status=pay now&id=<?php echo $dis['order_id']; ?>">
<button class="btn btn-danger btn-mini">
Pay now
</button>
</a>

<div class="dropdown-divider"></div>
<a class="dropdown-item waves-effect waves-light" href="order_report.php?status=paid&id=<?php echo $dis['order_id']; ?>">
<button class="btn btn-info btn-mini">
Paid
</button>
</a>

<div class="dropdown-divider"></div>
<a class="dropdown-item waves-effect waves-light" href="order_report.php?status=order placed&id=<?php echo $dis['order_id']; ?>">
<button class="btn btn-primary btn-mini">
Order placed
</button>
</a>
</div>
</div>
            </td>
        </tr>
        <?php
      }
    }else {

 
    $select=mysqli_query($conn,"select * from `orders` o inner join `clients` c on o.client_id=c.client_unique order by order_id desc");
    while($dis=mysqli_fetch_assoc($select)){
        ?>
        <tr>
            <td><?php echo $dis['client_fname']." ".$dis['client_lname']; ?></td>
            <td><?php echo $dis['product_name']; ?></td>
            <td><?php echo $dis['quantity']; ?></td>
            <td><?php echo $dis['created_date']; ?></td>
            <td><?php echo $dis['order_number']; ?></td>
            <td><?php echo $dis['total_price']; ?></td>
            <td><?php echo $dis['order_status']; ?></td>
            <td>
            <div class="btn-group dropdown-split-inverse">
<button type="button" class="btn btn-primary btn-small dropdown-toggle dropdown-toggle-split waves-effect waves-light" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
Action
<span class="sr-only"></span>
</button>
<div class="dropdown-menu">
<a class="dropdown-item waves-effect waves-light" href="order_report.php?status=reviewing&id=<?php echo $dis['order_id']; ?>">
<button class="btn btn-success btn-mini">
  Reviewing
</button>
</a>

<div class="dropdown-divider"></div>
<a class="dropdown-item waves-effect waves-light" href="order_report.php?status=pay now&id=<?php echo $dis['order_id']; ?>">
<button class="btn btn-danger btn-mini">
Pay now
</button>
</a>

<div class="dropdown-divider"></div>
<a class="dropdown-item waves-effect waves-light" href="order_report.php?status=paid&id=<?php echo $dis['order_id']; ?>">
<button class="btn btn-info btn-mini">
Paid
</button>
</a>

<div class="dropdown-divider"></div>
<a class="dropdown-item waves-effect waves-light" href="order_report.php?status=order placed&id=<?php echo $dis['order_id']; ?>">
<button class="btn btn-primary btn-mini">
Order placed
</button>
</a>
</div>
</div>
            </td>
        </tr>
    <?php
    }

  }
    ?>
<tr>
<th>Client name</th>
<th>Product name</th>
<th>Quantity</th>
<th>Created date</th>
<th>Order number</th>
<th>Total price</th>
<th>Order status</th>
<th>Action</th>
</tr>
</tfoot>
</table>
</div>
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



<script type="56e862956ca2b98d4285e514-text/javascript" src="files/bower_components/jquery/js/jquery.min.js"></script>
<script type="56e862956ca2b98d4285e514-text/javascript" src="files/bower_components/jquery-ui/js/jquery-ui.min.js"></script>
<script type="56e862956ca2b98d4285e514-text/javascript" src="files/bower_components/popper.js/js/popper.min.js"></script>
<script type="56e862956ca2b98d4285e514-text/javascript" src="files/bower_components/bootstrap/js/bootstrap.min.js"></script>

<script src="files/assets/pages/waves/js/waves.min.js" type="56e862956ca2b98d4285e514-text/javascript"></script>

<script type="56e862956ca2b98d4285e514-text/javascript" src="files/bower_components/jquery-slimscroll/js/jquery.slimscroll.js"></script>

<script type="56e862956ca2b98d4285e514-text/javascript" src="files/bower_components/modernizr/js/modernizr.js"></script>
<script type="56e862956ca2b98d4285e514-text/javascript" src="files/bower_components/modernizr/js/css-scrollbars.js"></script>

<script src="files/bower_components/datatables.net/js/jquery.dataTables.min.js" type="56e862956ca2b98d4285e514-text/javascript"></script>
<script src="files/bower_components/datatables.net-buttons/js/dataTables.buttons.min.js" type="56e862956ca2b98d4285e514-text/javascript"></script>
<script src="files/assets/pages/data-table/js/jszip.min.js" type="56e862956ca2b98d4285e514-text/javascript"></script>
<script src="files/assets/pages/data-table/js/pdfmake.min.js" type="56e862956ca2b98d4285e514-text/javascript"></script>
<script src="files/assets/pages/data-table/js/vfs_fonts.js" type="56e862956ca2b98d4285e514-text/javascript"></script>
<script src="files/bower_components/datatables.net-buttons/js/buttons.print.min.js" type="56e862956ca2b98d4285e514-text/javascript"></script>
<script src="files/bower_components/datatables.net-buttons/js/buttons.html5.min.js" type="56e862956ca2b98d4285e514-text/javascript"></script>
<script src="files/bower_components/datatables.net-bs4/js/dataTables.bootstrap4.min.js" type="56e862956ca2b98d4285e514-text/javascript"></script>
<script src="files/bower_components/datatables.net-responsive/js/dataTables.responsive.min.js" type="56e862956ca2b98d4285e514-text/javascript"></script>
<script src="files/bower_components/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js" type="56e862956ca2b98d4285e514-text/javascript"></script>

<script src="files/assets/pages/data-table/js/data-table-custom.js" type="56e862956ca2b98d4285e514-text/javascript"></script>
<script src="files/assets/js/pcoded.min.js" type="56e862956ca2b98d4285e514-text/javascript"></script>
<script src="files/assets/js/vertical/vertical-layout.min.js" type="56e862956ca2b98d4285e514-text/javascript"></script>
<script src="files/assets/js/jquery.mCustomScrollbar.concat.min.js" type="56e862956ca2b98d4285e514-text/javascript"></script>
<script type="56e862956ca2b98d4285e514-text/javascript" src="files/assets/js/script.js"></script>



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
