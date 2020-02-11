<?php
if(isset($_GET['id'] ) && isset($_GET['status'])){
require "connection.php";
$status=$_GET['status'];
$id=$_GET['id'];
$update=mysqli_query($conn,"update out_orders set order_status='$status' where out_order_id='$id'") or die(mysqli_error($conn));
}

?>
<!DOCTYPE html>
<html lang="en">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<head>
<title>E-Guriro| Out order report</title>


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
<i class="feather icon-inbox bg-c-blue"></i>
<div class="d-inline">
<h5>Out orders report</h5>
</div>
</div>
</div>
<div class="col-lg-4">
<div class="page-header-breadcrumb">
<ul class=" breadcrumb breadcrumb-title">
<li class="breadcrumb-item">
<a href="index.html"><i class="feather icon-home"></i></a>
</li>
<li class="breadcrumb-item"><a href="#!">Report</a>
</li>
<li class="breadcrumb-item"><a href="#!">Out orders</a>
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
<h5>Out orders report</h5></div>
<div class="card-block">
<div class="dt-responsive table-responsive">
<table id="dom-table" class="table table-striped table-bordered nowrap">
<thead>
<tr>
<th>Client name</th>
<th>Product link</th>
<th>Quantity</th>
<th>Created date</th>
<th>Order number</th>
<th>Total price</th>
<th>Order status</th>
<th>Action</th>
</tr>
 </thead>
<tbody>
<?php
    require "connection.php";
    $select=mysqli_query($conn,"select * from `out_orders` o inner join `clients` c on o.client_id=c.client_unique  order by out_order_id desc") or die(mysqli_error($conn));
    while($dis=mysqli_fetch_assoc($select)){
        ?>
        <tr>
            <td><?php echo $dis['client_fname']." ".$dis['client_lname']; ?></td>
            <td style="color:blue;"><a target="_blank" href="<?php echo $dis['product_link']; ?>">Click here to view product</a></td>
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
<a class="dropdown-item waves-effect waves-light" href="order_report.php?status=reviewing&id=<?php echo $dis['out_order_id']; ?>">
<button class="btn btn-success btn-mini">
  Reviewing
</button>
</a>

<div class="dropdown-divider"></div>
<a class="dropdown-item waves-effect waves-light" href="order_report.php?status=pay now&id=<?php echo $dis['out_order_id']; ?>">
<button class="btn btn-danger btn-mini">
Pay now
</button>
</a>

<div class="dropdown-divider"></div>
<a class="dropdown-item waves-effect waves-light" href="order_report.php?status=paid&id=<?php echo $dis['out_order_id']; ?>">
<button class="btn btn-info btn-mini">
Paid
</button>
</a>

<div class="dropdown-divider"></div>
<a class="dropdown-item waves-effect waves-light" href="order_report.php?status=order placed&id=<?php echo $dis['out_order_id']; ?>">
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
    ?>




</tbody>
<tfoot>
<tr>
<th>Client name</th>
<th>Product link</th>
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


<script type="bb9c7ee21adf01e1562b155c-text/javascript" src="files/bower_components/jquery/js/jquery.min.js"></script>
<script type="bb9c7ee21adf01e1562b155c-text/javascript" src="files/bower_components/jquery-ui/js/jquery-ui.min.js"></script>
<script type="bb9c7ee21adf01e1562b155c-text/javascript" src="files/bower_components/popper.js/js/popper.min.js"></script>
<script type="bb9c7ee21adf01e1562b155c-text/javascript" src="files/bower_components/bootstrap/js/bootstrap.min.js"></script>

<script src="files/assets/pages/waves/js/waves.min.js" type="bb9c7ee21adf01e1562b155c-text/javascript"></script>

<script type="bb9c7ee21adf01e1562b155c-text/javascript" src="files/bower_components/jquery-slimscroll/js/jquery.slimscroll.js"></script>

<script type="bb9c7ee21adf01e1562b155c-text/javascript" src="files/bower_components/modernizr/js/modernizr.js"></script>
<script type="bb9c7ee21adf01e1562b155c-text/javascript" src="files/bower_components/modernizr/js/css-scrollbars.js"></script>

<script src="files/bower_components/datatables.net/js/jquery.dataTables.min.js" type="bb9c7ee21adf01e1562b155c-text/javascript"></script>
<script src="files/bower_components/datatables.net-buttons/js/dataTables.buttons.min.js" type="bb9c7ee21adf01e1562b155c-text/javascript"></script>
<script src="files/assets/pages/data-table/js/jszip.min.js" type="bb9c7ee21adf01e1562b155c-text/javascript"></script>
<script src="files/assets/pages/data-table/js/pdfmake.min.js" type="bb9c7ee21adf01e1562b155c-text/javascript"></script>
<script src="files/assets/pages/data-table/js/vfs_fonts.js" type="bb9c7ee21adf01e1562b155c-text/javascript"></script>
<script src="files/bower_components/datatables.net-buttons/js/buttons.print.min.js" type="bb9c7ee21adf01e1562b155c-text/javascript"></script>
<script src="files/bower_components/datatables.net-buttons/js/buttons.html5.min.js" type="bb9c7ee21adf01e1562b155c-text/javascript"></script>
<script src="files/bower_components/datatables.net-bs4/js/dataTables.bootstrap4.min.js" type="bb9c7ee21adf01e1562b155c-text/javascript"></script>
<script src="files/bower_components/datatables.net-responsive/js/dataTables.responsive.min.js" type="bb9c7ee21adf01e1562b155c-text/javascript"></script>
<script src="files/bower_components/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js" type="bb9c7ee21adf01e1562b155c-text/javascript"></script>

<script src="files/assets/pages/data-table/js/data-table-custom.js" type="bb9c7ee21adf01e1562b155c-text/javascript"></script>
<script src="files/assets/js/pcoded.min.js" type="bb9c7ee21adf01e1562b155c-text/javascript"></script>
<script src="files/assets/js/vertical/vertical-layout.min.js" type="bb9c7ee21adf01e1562b155c-text/javascript"></script>
<script src="files/assets/js/jquery.mCustomScrollbar.concat.min.js" type="bb9c7ee21adf01e1562b155c-text/javascript"></script>
<script type="bb9c7ee21adf01e1562b155c-text/javascript" src="files/assets/js/script.js"></script>

<script async src="https://www.googletagmanager.com/gtag/js?id=UA-23581568-13" type="bb9c7ee21adf01e1562b155c-text/javascript"></script>
<script type="bb9c7ee21adf01e1562b155c-text/javascript">
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-23581568-13');
</script>
<script src="ajax.cloudflare.com/cdn-cgi/scripts/7089c43e/cloudflare-static/rocket-loader.min.js" data-cf-settings="bb9c7ee21adf01e1562b155c-|49" defer=""></script></body>
</html>
