<!DOCTYPE html>
<html lang="en">

<meta http-equiv="content-type" content="text/html;charset=UTF-8" />

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


    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-notify/0.2.0/css/bootstrap-notify.css">
    <link>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

    <script>
    $(function() {

        $("#loader").hide()
        $("#addToCart").click(function(event) {

            event.preventDefault()
            var quantity = $("#quantity").val()
            var price = $("#cartPrice").val()
            var id = $("#cartId").val()
            var name = $("#cartName").val()

            if (quantity === '' || quantity == 0) {
                notify("Warning", "Please specify product quantity", 'warning')
            } else {

                var total = 0
                total = eval(quantity) * eval(price)
                var data = {
                    "product": id,
                    "quantity": quantity,
                    "price": total,
                    "name": name,
                    "cart": "cart"
                };

                $("#loader").show();
                $("#addToCart").hide("slow");

                $.ajax({
                    type: "POST",
                    url: "php/add_cart.php",
                    data: data,
                    cache: false,
                    success: function(result) {

                        $("#loader").hide("slow");
                        $("#addToCart").show("slow");

                        console.log(result)
                        var state = JSON.parse(result)

                        notify(state.state, state.msg, state.state);

                        var c = $("#cart_counter").text()
                        var c2 = parseInt(c)
                        c2 += 1
                        $("#cart_counter").html(c2)

                        if (state.state === 'danger') {
                            $('#loginModal').modal('show');
                        }
                        // console.log("state"+state.state);
                    },
                    error: function(er) {
                        $("#loader").hide("slow");
                        $("#addToCart").show("slow");
                        notify("Danger", er, "danger");
                    }
                });

            }

        })


        //////////////////////////////////////////////////

        $("#buyProduct").click(function(event) {

            event.preventDefault()
            var quantity = $("#quantity").val()
            var price = $("#cartPrice").val()
            var id = $("#cartId").val()
            var name = $("#cartName").val()

            if (quantity === '' || quantity == 0) {
                notify("Warning", "Please specify product quantity", 'warning')
            } else {

                var total = 0
                total = eval(quantity) * eval(price)
                var data = {
                    "product": id,
                    "quantity": quantity,
                    "price": total,
                    "name": name,
                    "order": "order"
                };

                $("#loader").show();
                $("#buyProduct").hide("slow");

                $.ajax({
                    type: "POST",
                    url: "php/orders.php",
                    data: data,
                    cache: false,
                    success: function(result) {

                        $("#loader").hide("slow");
                        $("#buyProduct").show("slow");

                        console.log(result)
                        var state = JSON.parse(result)

                        // notify(state.state, state.msg, state.state);


                        if (state.state === 'danger') {
                            $('#loginModal').modal('show');
                        }

                        if (state.state === 'success') {

                            var message = "Thank you for ordering on our platform.";
                            $('.modal-body').html(message);
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

            }

        })


        $("#quantity").keyup(function() {
            var quantity = $("#quantity").val()
            var price = $("#cartPrice").val()

            console.log("QUANTITY:" + quantity)
            console.log("PRICE:" + price)
            if (quantity === '') {
                quantity = 1
            }
            var total = eval(initialPrice) * eval(quantity);

            $("#price").text(total)
        });
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
                    <p class="breadcrumbs"><span class="mr-2"><a href="index.php">Home</a></span> <span>Shop</span></p>
                    <h1 class="mb-0 bread">Product description</h1>
                </div>
            </div>
        </div>
    </div>
    <section class="ftco-section">

        <?php 

if(isset($_GET['p'])){

    $p=$_GET['p'];
    $name=str_replace('-',' ',$p);

     $sqlProduct="SELECT * FROM products WHERE product_name='$name'";
                $queryProduct=mysqli_query($conn,$sqlProduct);
                if($queryProduct==true or mysqli_num_rows($queryProduct)!=0){
                $row=mysqli_fetch_assoc($queryProduct);

                 $id=$row['product_id'];

                 $queryImg=mysqli_query($conn,"SELECT product_image FROM product_images WHERE product_id='$id'");
                    $rowImg=mysqli_fetch_assoc($queryImg);
    
                     $oSql=mysqli_query($conn,"SELECT COUNT(product_id) AS counter FROM orders WHERE product_id='$id'");
                     $oQuery=mysqli_fetch_array($oSql);


?>

        <div class="container">
            <div class="row">
                <input type="hidden" id="cartName" value="<?php echo $row['product_name']   ?>" />
                <input type="hidden" id="cartId" value="<?php echo $row['product_id']   ?>" />
                <input type="hidden" id="cartPrice" value="<?php echo $row['price']   ?>" />

                <div class="col-lg-6 mb-5 ftco-animate">
                    <a href="<?php echo $rowImg['product_image']   ?>" class="image-popup prod-img-bg"><img
                            src="<?php echo $rowImg['product_image']   ?>" class="img-fluid" alt="Product image"></a>


                    <div class="row">
                        <?php
                        $queryImg2=mysqli_query($conn,"SELECT product_image FROM product_images WHERE product_id='$id'");
                      while($rowImg2=mysqli_fetch_assoc($queryImg2)){

                        if(mysqli_num_rows($queryImg2)>1){

                        ?>
                        <div class="col">
                            <a href="<?php echo $rowImg2['product_image']   ?>" class="image-popup prod-img-bg"><img
                                    src="<?php echo $rowImg2['product_image']   ?>" class="img-fluid"
                                    alt="Product image" style="height:100px !important;"></a>
                        </div>

                        <?php
                      }}
                        ?>



                    </div>
                </div>



                <div class="col-lg-6 product-details pl-md-5 ftco-animate">
                    <h3><?php echo $row['product_name']  ?></h3>
                    <div class="rating d-flex">

                        <p class="text-left">
                            <a href="#" class="mr-2" style="color: #000;"><?php echo $oQuery['counter']   ?> <span
                                    style="color: #bbb;">Sold</span></a>
                        </p>
                    </div>
                    <p class="price"><span>$<span id="price"><?php echo $row['price']   ?></span></span></p>

                    <?php echo $row['product_description']   ?>
                    <div class="row mt-4">

                        <div class="w-100"></div>
                        <div class="input-group col-md-6 d-flex mb-3">
                            <span class="input-group-btn mr-2">
                                <button type="button" class="quantity-left-minus btn" data-type="minus" data-field="">
                                    <i class="ion-ios-remove"></i>
                                </button>
                            </span>
                            <input type="text" id="quantity" name="quantity" class="quantity form-control input-number"
                                value="1" min="1" max="100">
                            <span class="input-group-btn ml-2">
                                <button type="button" class="quantity-right-plus btn" data-type="plus" data-field="">
                                    <i class="ion-ios-add"></i>
                                </button>
                            </span>
                        </div>
                        <div class="w-100"></div>
                        <div class="col-md-12">
                            <p style="color: #000;"><?php echo $row['quantity']   ?> piece available</p>
                        </div>
                    </div>
                    <div class="d-flex justify-content-center">
                        <a href="#" id="addToCart" class="btn btn-black py-3 px-5 mr-2">Add to Cart</a>

                        <div class="d-flex justify-content-center mt-2 mr-2 ml-2">
                            <div class="spinner-border" role="status" id="loader">
                                <span class="sr-only">Logging in...</span>
                            </div>
                        </div>
                        <a href="#" id="buyProduct" class="btn btn-primary py-3 px-5">Buy now</a>
                    </div>
                </div>
            </div>
            <div class="row mt-5">
                <div class="col-md-12 nav-link-wrap">
                    <div class="nav nav-pills d-flex text-center" id="v-pills-tab" role="tablist"
                        aria-orientation="vertical">
                        <a class="nav-link ftco-animate active mr-lg-1" id="v-pills-1-tab" data-toggle="pill"
                            href="#v-pills-1" role="tab" aria-controls="v-pills-1" aria-selected="true">Description</a>
                    </div>
                </div>
                <div class="col-md-12 tab-wrap">
                    <div class="tab-content bg-light" id="v-pills-tabContent">
                        <div class="tab-pane fade show active" id="v-pills-1" role="tabpanel"
                            aria-labelledby="day-1-tab">
                            <div class="p-4">
                                <p><?php echo $row['product_description']; ?></p>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>

        <?php

}else{
                    echo "No product found";
                }
  
}else{
echo "The requested page is not available, back to home.";
}
        ?>
    </section>


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


    <?php 
include('includes/footer.php');


 ?>

    <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px">
            <circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee" />
            <circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10"
                stroke="#F96D00" /></svg></div>

    <script src="js/jquery-migrate-3.0.1.min.js" type="7725de83bcb666706ed2bca3-text/javascript"></script>
    <script src="js/popper.min.js" type="7725de83bcb666706ed2bca3-text/javascript"></script>
    <script src="js/bootstrap.min.js" type="7725de83bcb666706ed2bca3-text/javascript"></script>
    <script src="js/jquery.easing.1.3.js" type="7725de83bcb666706ed2bca3-text/javascript"></script>
    <script src="js/jquery.waypoints.min.js" type="7725de83bcb666706ed2bca3-text/javascript"></script>
    <script src="js/jquery.stellar.min.js" type="7725de83bcb666706ed2bca3-text/javascript"></script>
    <script src="js/owl.carousel.min.js" type="7725de83bcb666706ed2bca3-text/javascript"></script>
    <script src="js/jquery.magnific-popup.min.js" type="7725de83bcb666706ed2bca3-text/javascript"></script>
    <script src="js/aos.js" type="7725de83bcb666706ed2bca3-text/javascript"></script>
    <script src="js/jquery.animateNumber.min.js" type="7725de83bcb666706ed2bca3-text/javascript"></script>
    <script src="js/bootstrap-datepicker.js" type="7725de83bcb666706ed2bca3-text/javascript"></script>
    <script src="js/scrollax.min.js" type="7725de83bcb666706ed2bca3-text/javascript"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&amp;sensor=false"
        type="7725de83bcb666706ed2bca3-text/javascript"></script>

    <script src="js/bootstrap-notify/bootstrap-notify.min.js"></script>
    <script src="js/google-map.js" type="7725de83bcb666706ed2bca3-text/javascript"></script>
    <script src="js/main.js" type="7725de83bcb666706ed2bca3-text/javascript"></script>

    <script type="7725de83bcb666706ed2bca3-text/javascript">
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
        type="7725de83bcb666706ed2bca3-text/javascript"></script>
    <script type="7725de83bcb666706ed2bca3-text/javascript">
    window.dataLayer = window.dataLayer || [];

    function gtag() {
        dataLayer.push(arguments);
    }
    gtag('js', new Date());

    gtag('config', 'UA-23581568-13');
    </script>
    <script src="./js/rocket-loader.min.js" data-cf-settings="7725de83bcb666706ed2bca3-|49" defer=""></script>
</body>

<!-- Mirrored from colorlib.com/preview/theme/minishop/product-single.php by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 12 Dec 2019 10:38:08 GMT -->

</html>