<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from colorlib.com/preview/theme/minishop/cart.php by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 12 Dec 2019 10:38:08 GMT -->
<!-- Added by HTTrack -->
<meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->

<head>
    <title>Buy Online – Most Secure Easy way to Shop Online</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800" rel="stylesheet">
    <link rel="stylesheet" href="css/open-iconic-bootstrap.min.css">
    <link rel="stylesheet" href="css/animate.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="css/magnific-popup.css">
    <link rel="stylesheet" href="css/aos.css">
    <link rel="stylesheet" href="css/ionicons.min.css">
    <link rel="stylesheet" href="css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="css/jquery.timepicker.css">
    <link rel="stylesheet" href="css/flaticon.css">
    <link rel="stylesheet" href="css/icomoon.css">
    <link rel="stylesheet" href="css/style.css">

    <link rel="stylesheet" href="css/bootstrap.min.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

    <script>
    $(function() {

        $('#order_table').DataTable();
        $('#order2_table').DataTable();
    })

    function notify(t, st, tp) {
        $.notify({
            icon: 'fa fa-bell',
            title: t + ", ",
            message: st,
            target: '_blank'
        }, {
            type: tp,
            placement: {
                from: "bottom",
                align: "right"
            },
            time: 1000,
        });
    }
    </script>

</head>

<body class="goto-here">
    <?php 
include('includes/header.php');
 ?>

    <div class="hero-wrap hero-bread" style="background-image: url('images/bg_6.jpg');">
        <div class="container">
            <div class="row no-gutters slider-text align-items-center justify-content-center">
                <div class="col-md-9 ftco-animate text-center">
                    <p class="breadcrumbs"><span class="mr-2"><a href="index.php">Home</a></span> <span>Orders</span>
                    </p>
                    <h1 class="mb-0 bread">My orders list</h1>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">

                    <div class="card-body">
                        <ul class="nav nav-tabs nav-justified flex-column flex-sm-row nav-primary" id="myTab"
                            role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab"
                                    aria-controls="home" aria-selected="true">Orders from links</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab"
                                    aria-controls="profile" aria-selected="false">Orders from Eguriro</a>
                            </li>

                        </ul>
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">

                                <div class="row">

                                    <!-- <h4 class="card-title">Unpublished courses</h4> -->
                                    <div class="col-sm-12">
                                        <p style="margin:10px;">Here you will find orders you placed via price
                                            calculator
                                            only</p>
                                    </div>

                                    <br /><br>
                                    <div class="col-md-12 ftco-animate">

                                        <div class="table-responsive table--no-card m-b-30">
                                            <table class="table table-borderless table-striped table-earning"
                                                id="order_table">
                                                <thead class="thead-primary">
                                                    <tr class="text-start">

                                                        <th>&nbsp;</th>
                                                        <th>Order No</th>
                                                        <th>Product</th>

                                                        <th>Quantity</th>

                                                        <th>Notes</th>

                                                        <th>Payment</th>
                                                        <th>Total</th>

                                                    </tr>
                                                </thead>
                                                <tbody>


                                                    <?php
                                 $client=md5(
    $_SERVER['REMOTE_ADDR'] .
    $_SERVER['HTTP_USER_AGENT']);

    if(isset($_COOKIE["eguriro"])) {
       $client=$_COOKIE["eguriro"];
    }
    
    ?>

                                                    <?php
               $sqlOrders="SELECT * FROM out_orders WHERE client_id='$client'";
                $queryOrders=mysqli_query($conn,$sqlOrders);
                   $total=0;
                while($row=mysqli_fetch_assoc($queryOrders)){
             $total++;
                    $id=$row['out_order_id'];
                    $queryImg=mysqli_query($conn,"SELECT product_image FROM product_images WHERE product_id='$id'");
                    $rowImg=mysqli_fetch_assoc($queryImg);
                     ?>
<<<<<<< HEAD
                                                    <tr class="text-start">
                                                        <td class="image-prod">
                                                            <div class="img"
                                                                style="background-image:url(<?php echo $rowImg["product_image"] ?>);">
                                                            </div>
                                                        </td>
                                                        <td>

                                                            <?php echo $row["order_number"] ?>


                                                        </td>
                                                        <td>
                                                            <a href="<?php echo $row['product_link']?>">
                                                                <h5>Product link</h5>
                                                            </a>

                                                        </td>
                                                        <td><?php echo $row["quantity"]; ?></td>
                                                        <td>

                                                            <?php echo $row['order_status'] ?>

                                                        </td>
                                                        <td>Payment here</td>
                                                        <td>$<?php echo $row['total_price'];?> </td>


                                                    </tr>

                                                    <?php
=======
                                <tr class="text-center">
                                    <td class="image-prod">
                                        <div class="img"
                                            style="background-image:url(<?php echo $rowImg["product_image"] ?>);"></div>
                                    </td>
                                    <td class="product-name">
                                        <a
                                            href="<?php echo str_replace(' ','-',$row['product_link'])?>">
                                            <h3><?php echo $row["product_link"] ?></h3>
                                        </a>

                                    </td>
                                    <td class="price">$<?php echo $row["total_price"]; ?></td>
                                    <td class="total">

                                        <?php echo $row['quantity'] ?>

                                    </td>
                                    <td class="total">$<?php echo $row["total_price"] ?></td>
                                    <td class="total"><?php echo $row['order_note'];?> </td>
                                    <td class="total"> </td>
                                    <td class="total" style="color: #57C038"><?php echo $row["order_status"] ?></td>
                                </tr>

                                <?php
>>>>>>> 5ca61e6dbc79ee2e9813885c510e65dbff4a1060
            }
               ?>

                                                </tbody>
                                            </table>
                                        </div>


                                    </div>


                                </div>

                            </div>
                            <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">

                                <div class="row">

                                    <!-- <h4 class="card-title">Unpublished courses</h4> -->
                                    <div class="col-sm-12">
                                        <p style="margin:10px;">Products you placed from our products list will appear
                                            here
                                            too.</p>
                                    </div>


                                    <br /><br>
                                    <div class="col-md-12 ftco-animate">

                                        <div class="table-responsive table--no-card m-b-30">
                                            <table class="table table-borderless table-striped table-earning"
                                                id="order2_table">
                                                <thead class="thead-primary">
                                                    <tr class="text-start">

                                                        <th>&nbsp;</th>
                                                        <th>Order No</th>
                                                        <th>Product</th>

                                                        <th>Quantity</th>

                                                        <th>Notes</th>

                                                        <th>Payment</th>
                                                        <th>Total</th>

                                                    </tr>
                                                </thead>
                                                <tbody>


                                                    <?php
                                 $client=md5(
    $_SERVER['REMOTE_ADDR'] .
    $_SERVER['HTTP_USER_AGENT']);

    if(isset($_COOKIE["eguriro"])) {
       $client=$_COOKIE["eguriro"];
    }
    
    ?>

                                                    <?php
               $sqlOrders2="SELECT * FROM orders WHERE client_id='$client'";
                $queryOrders2=mysqli_query($conn,$sqlOrders2);
                   $total2=0;
                while($row2=mysqli_fetch_assoc($queryOrders2)){
             $total2++;
                    $id2=$row2['order_id'];
                    $queryImg=mysqli_query($conn,"SELECT product_image FROM product_images WHERE product_id='$id2'");
                    $rowImg=mysqli_fetch_assoc($queryImg);
                     ?>
<<<<<<< HEAD
                                                    <tr class="text-start">
                                                        <td class="image-prod">
                                                            <div class="img"
                                                                style="background-image:url(<?php echo $rowImg["product_image"] ?>);">
                                                            </div>
                                                        </td>
                                                        <td>

                                                            <?php echo $row2["order_number"] ?>


                                                        </td>
                                                        <td>

                                                            <h5><?php echo $row2['product_name']?></h5>

                                                        </td>
                                                        <td><?php echo $row2["quantity"]; ?></td>
                                                        <td>

                                                            <?php echo $row2['order_note'] ?>

                                                        </td>
                                                        <td> <?php echo $row2['order_payment'] ?></td>
                                                        <td>$<?php echo $row2['total_price'];?> </td>

                                                    </tr>

                                                    <?php
                                              }
                                            ?>
=======
                                <tr class="text-center">
                                    <td class="image-prod">
                                        <div class="img"
                                            style="background-image:url(<?php echo $rowImg["product_image"] ?>);"></div>
                                    </td>
                                    <td class="product-name">
                                        <a
                                            href="product-single.php?p=<?php echo str_replace(' ','-',$row['product_name'])?>">
                                            <h3><?php echo $row["product_name"] ?></h3>
                                        </a>

                                    </td>
                                    <td class="price">$<?php echo $row["total_price"]/$row["quantity"] ?></td>
                                    <td class="total">

                                        <?php echo $row['quantity'] ?>

                                    </td>
                                    <td class="total">$<?php echo $row["total_price"] ?></td>
                                    <td class="total"><?php echo $row['order_note'];?> </td>
                                    <td class="total"> <?php if($row['order_payment']=='cash'){ echo "Office location KN 87st,Beatitude house ,Second floor ,Door 13,phone : 0781816180"; } else if($row['order_payment']=='momo'){ echo " you can pay on our momo account 0781816180 TUYIZERE Eyse"; } else if($row['order_payment']=='bank'){ echo "you can pay on our Equity bank A/C : 4002100384793 TUYIZERE Eyse"; }?> </td>
                                    <td class="total" style="color: #57C038"><?php echo $row["order_status"] ?></td>
                                </tr>

                                <?php
            }
               ?>
               
               
               
>>>>>>> 5ca61e6dbc79ee2e9813885c510e65dbff4a1060

                                                </tbody>
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





    <?php

include('includes/footer.php');
?>


    <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px">
            <circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee" />
            <circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10"
                stroke="#F96D00" /></svg></div>

    <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js">
    </script>

    <script src="js/jquery-migrate-3.0.1.min.js" type="dc226639c4a99d0325a19ed9-text/javascript"></script>
    <script src="js/popper.min.js" type="dc226639c4a99d0325a19ed9-text/javascript"></script>
    <script src="js/bootstrap.min.js" type="dc226639c4a99d0325a19ed9-text/javascript"></script>
    <script src="js/jquery.easing.1.3.js" type="dc226639c4a99d0325a19ed9-text/javascript"></script>
    <script src="js/jquery.waypoints.min.js" type="dc226639c4a99d0325a19ed9-text/javascript"></script>
    <script src="js/jquery.stellar.min.js" type="dc226639c4a99d0325a19ed9-text/javascript"></script>
    <script src="js/owl.carousel.min.js" type="dc226639c4a99d0325a19ed9-text/javascript"></script>
    <script src="js/jquery.magnific-popup.min.js" type="dc226639c4a99d0325a19ed9-text/javascript"></script>
    <script src="js/aos.js" type="dc226639c4a99d0325a19ed9-text/javascript"></script>
    <script src="js/jquery.animateNumber.min.js" type="dc226639c4a99d0325a19ed9-text/javascript"></script>
    <script src="js/bootstrap-datepicker.js" type="dc226639c4a99d0325a19ed9-text/javascript"></script>
    <script src="js/scrollax.min.js" type="dc226639c4a99d0325a19ed9-text/javascript"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&amp;sensor=false"
        type="dc226639c4a99d0325a19ed9-text/javascript"></script>
    <script src="js/google-map.js" type="dc226639c4a99d0325a19ed9-text/javascript"></script>
    <script src="js/main.js" type="dc226639c4a99d0325a19ed9-text/javascript"></script>

    <script src="js/bootstrap-notify/bootstrap-notify.min.js"></script>
    <script type="dc226639c4a99d0325a19ed9-text/javascript">
    $(document).ready(function() {

        var quantitiy = 0;
        $('.quantity-right-plus').click(function(e) {

            // Stop acting like a button
            e.preventDefault();
            // Get the field name
            var quantity = parseInt($('#quantity').val());

            // If is not undefined

            $('#quantity').val(quantity + 1);


            // Increment

        });

        $('.quantity-left-minus').click(function(e) {
            // Stop acting like a button
            e.preventDefault();
            // Get the field name
            var quantity = parseInt($('#quantity').val());

            // If is not undefined

            // Increment
            if (quantity > 0) {
                $('#quantity').val(quantity - 1);
            }
        });

    });
    </script>

    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-23581568-13"
        type="dc226639c4a99d0325a19ed9-text/javascript"></script>
    <script type="dc226639c4a99d0325a19ed9-text/javascript">
    window.dataLayer = window.dataLayer || [];

    function gtag() {
        dataLayer.push(arguments);
    }
    gtag('js', new Date());

    gtag('config', 'UA-23581568-13');
    </script>
    <script src="./js/rocket-loader.min.js" data-cf-settings="dc226639c4a99d0325a19ed9-|49" defer=""></script>
</body>

<!-- Mirrored from colorlib.com/preview/theme/minishop/cart.php by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 12 Dec 2019 10:38:12 GMT -->

</html>