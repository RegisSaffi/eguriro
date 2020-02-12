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


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script>
    $(function() {

        $("#loader").hide()

        $('#cart_table').DataTable();

        $("#buyProduct").click(function(event) {

            event.preventDefault()

            $("#loader").show();
            $("#buyProduct").hide("slow");
            var payment = $("input[name='payment']:checked").val();

            console.log(payment);
            var data = {
                "checkout": "checkout",
                "payment": payment
            }

            $.ajax({
                type: "POST",
                url: "php/orders.php",
                data: data,
                cache: false,
                success: function(result) {

                    $("#loader").hide("slow");
                    $("#buyProduct").show("slow");
                    $('#checkoutModal').modal('hide')


                    console.log(result)
                    var state = JSON.parse(result)


                    // notify(state.state, state.msg, state.state);


                    if (state.state === 'danger') {
                        $('#loginModal').modal('show');
                    }

                    if (state.state === 'success') {


                        
                        if(payment==="momo"){
                            var message="Thank you , your order has been Received, you have selected paying via mobile money, here is our momo account 0781816180 TUYIZERE Eyse";
                            $('.modal-body').html(message);
                        } else if(payment==="bank"){
                            
                            var message="Thank you , your order has been Received, you have selected paying via mobile money, here is our Equity bank A/C : 4002100384793 TUYIZERE Eyse";
                            $('.modal-body').html(message);
                        }else if(payment==="cash"){
                            var message="Thank you , your order has been Received, you have selected paying via mobile money, here is our address<br/> OFFICE LOCATION KN 87st <br/>Beatitude house <br/>Second floor <br/>Door 13<br/>phone : 0781816180";

                            $('.modal-body').html(message);
                        }


                        $('#successModal').modal('show');

                        // setTimeout(() => {
                        //     window.location.replace("index.php");
                        // }, 2000);
                    }

                },
                error: function(er) {
                    $("#loader").hide("slow");
                    $("#buyProduct").show("slow");

                    notify("Danger", er, "danger");
                }
            });



        })

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
                    <p class="breadcrumbs"><span class="mr-2"><a href="index.php">Home</a></span> <span>Cart</span></p>
                    <h1 class="mb-0 bread">My Wishlist</h1>
                </div>
            </div>
        </div>
    </div>



    <section class="ftco-section ftco-cart">
        <div class="container">
            <div class="row">
                <div class="col-md-12 ftco-animate">

                    <div class="table-responsive table--no-card m-b-30">
                        <table class="table table-borderless table-striped table-earning" id="cart_table">
                            <thead class="thead-primary">
                                <tr class="text-center">
                                    <th>&nbsp;</th>
                                    <th>&nbsp;</th>
                                    <th>Product</th>
                                    <th>Price</th>
                                    <th>Quantity</th>
                                    <th>Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                 $client=md5(
    $_SERVER['REMOTE_ADDR'] .
    $_SERVER['HTTP_USER_AGENT']);
if(isset($_GET['id'])){
    $delid=$_GET['id'];
    $delQuery=mysqli_query($conn,"DELETE FROM cart WHERE client_id='$client' and product_id='$delid'");
    if($delQuery!=true){
       echo "<script>alert('Error removing product to cart, it may not be available it this time.')</script>";
    }
}
    if(isset($_COOKIE["eguriro"])) {
       $client=$_COOKIE["eguriro"];
    }

                $sqlProducts="SELECT * FROM cart WHERE client_id='$client'";
                $queryProducts=mysqli_query($conn,$sqlProducts);

                $total=0;
                $count=0;
                while($row=mysqli_fetch_assoc($queryProducts)){
                    $total=$total+$row["total_price"];
                    $count++;
                    $id=$row['product_id'];

                
                    $queryImg=mysqli_query($conn,"SELECT product_image FROM product_images WHERE product_id='$id'");
                    $rowImg=mysqli_fetch_assoc($queryImg);
            ?>
                                <tr class="justify-center">
                                    <td class="product-remove"><a href="?id=<?php echo $id ?>"><span
                                                class="ion-ios-close" style="color:red; font-size:25px;"></span></a>
                                    </td>
                                    <td>
                                        <div class="img"
                                            style="background-image:url(<?php echo $rowImg["product_image"] ?>);"></div>
                                    </td>
                                    <td>
                                        <a href="<?php if(substr( $row['product_name'], 0, 4 ) === "http"){
                                                echo $row['product_name'];
                                             }else{
                                             echo "product-single.php?p=".str_replace(' ','-',$row['product_name']);
                                             }?>">
                                            <h5><?php if(substr( $row['product_name'], 0, 4 ) === "http"){
                                                echo "Product link";
                                             }else{
                                              echo $row['product_name'];
                                             }?></h5>
                                        </a>

                                    </td>
                                    <td>$<?php echo $row["total_price"]/$row["quantity"] ?></td>
                                    <td>
                                        <div class="input-group mb-3">
                                            <input type="text" name="quantity" class="form-control input-number"
                                                value="<?php echo $row['quantity'] ?>" min="1" max="100">
                                        </div>
                                    </td>
                                    <td>$<?php echo $row["total_price"] ?></td>
                                </tr>
                                <?php
            }
               ?>
                            </tbody>
                        </table>
                    </div>


                </div>
            </div>
            <?php
                         if($count!=0){
            ?>

            <div class="row justify-content-start">
                <div class="col col-lg-5 col-md-6 mt-5 cart-wrap ftco-animate">
                    <div class="cart-total mb-3">
                        <h3>Cart Totals</h3>
                        <p class="d-flex">
                            <span>Subtotal</span>
                            <span>$<?php echo $total ?></span>
                        </p>
                        <p class="d-flex">
                            <span>Delivery</span>
                            <span>$0.00</span>
                        </p>
                        <p class="d-flex">
                            <span>Discount</span>
                            <span>$0.00</span>
                        </p>
                        <hr>
                        <p class="d-flex total-price">
                            <span>Total</span>
                            <span>$<?php echo $total ?></span>
                        </p>
                    </div>
                    <div class="cart-total mb-3">
                        <h3>Payment method</h3>
                        <p class="d-flex total-price">
                            <span>MOMO</span></td>
                            <td><span><input class="form-control" id="payment" type="radio" value="momo"
                                        name="payment" /></span>
                        </p>
                        <p class="d-flex total-price">
                            <span>Bank</span>
                            <span><input class="form-control" type="radio" value="bank" id="payment"
                                    name="payment" /></span>
                        </p>
                        <p class="d-flex total-price">
                            <span>Cash</span>
                            <span><input class="form-control" type="radio" value="cash" id="payment"
                                    name="payment" /></span>
                        </p>

                    </div>

                    <p class="text-center"><a href="#" data-toggle="modal" data-target="#checkoutModal"
                            class="btn btn-primary py-3 px-4">Place your
                            order</a>
                    </p>


                </div>
            </div>

            <?php
                        }
                         ?>

        </div>
    </section>


    <div class=" modal fade" id="checkoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Note
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    You are going to buy <?php echo $count?> item(s), all items in your cart will be placed as orders.
                    Continue to checkout?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <div class="d-flex justify-content-center mt-2 mr-2 ml-2">
                        <div class="spinner-border" role="status" id="loader">
                            <span class="sr-only">Logging in...</span>
                        </div>
                    </div>
                    <a href="#"><button type="button" id="buyProduct" class="btn btn-primary">Comfirm &
                            order</button></a>
                </div>
            </div>
        </div>
    </div>



    <div class=" modal fade" id="successModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Success
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" style="color: #000;">

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

                    <a href="orders.php"><button type="button" class="btn btn-primary">View orders</button></a>
                </div>
            </div>
        </div>
    </div>



    <div class=" modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Warning
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    You must first login to make this order!
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <a href="signin.php"><button type="button" id="buyProduct"
                            class="btn btn-primary">Login</button></a>
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