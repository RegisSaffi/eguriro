<!DOCTYPE html>
<html lang="en">

<meta http-equiv="content-type" content="text/html;charset=UTF-8" />

<head>
    <title>Buy Online – Most Secure Easy way to Shop Online</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800" rel="stylesheet">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <link rel='favicon' href='icons/favicon.ico'>
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


    <style>
    .zoom:hover {
        transform: scale(1.3);

    }
    </style>



    <script type="text/javascript">
    $(function() {



        var initialPrice = 0;

        $(".add-to-cart").click(function(event) {
            event.preventDefault()
            var id = $(this).attr('data-id');
            console.log(id)

            $("#tbody").empty();

            $("#loader").show("slow");

            var data = {
                "id": id,
            };

            $.ajax({
                type: "POST",
                url: "php/add_cart.php",
                data: data,
                cache: false,
                success: function(result) {

                    $("#loader").hide("slow");

                    console.log(result)
                    if (result === "error") {

                        notify("Error", "Error loading product data", 'warning')
                        return;
                    }
                    var res = JSON.parse(result)
                    initialPrice = eval(res.price)

                    var nodes =
                        "    <tr class='text-center'><td class='product-name'><input id='cartId' type='hidden' value='" +
                        res.product_id + "'/> <input id='cartName' type='hidden' value='" +
                        res.product_name + "'/><h3>" + res
                        .product_name +
                        "</h3></td><td class='price'>$<p id='cartPrice'>" + res.price +
                        "</p></td><td class='quantity'><div class='input-group mb-3'></div><input type='text' id='cartQuantity' class='quantity form-control input-number' value='1' placeholder='maximum(" +
                        res.quantity + ")'></div></td></tr>";
                    $("#tbody").append(nodes);

                    $("#cartQuantity").keyup(function() {
                        var quantity = $("#cartQuantity").val()
                        var price = $("#cartPrice").text()

                        console.log("QUANTITY:" + quantity)
                        console.log("PRICE:" + price)
                        if (quantity === '') {
                            quantity = 1
                        }
                        var total = eval(initialPrice) * eval(quantity);

                        $("#cartPrice").text(total)
                    });

                },
                error: function(er) {
                    $("#loader").hide("slow");

                }
            });

        })


        $("#addToCart").click(function(event) {

            var quantity = $("#cartQuantity").val()
            var price = $("#cartPrice").text()
            var id = $("#cartId").val()
            var name = $("#cartName").val()

            if (quantity === '') {
                notify("Warning", "Please specify product quantity", 'warning')
            } else {

                var data = {
                    "product": id,
                    "quantity": quantity,
                    "price": price,
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

                        $('#cartModal').modal('hide')

                    },
                    error: function(er) {
                        $("#loader").hide("slow");
                        $("#addToCart").show("slow");
                        $('#cartModal').modal('hide')
                        notify("Danger", er, "danger");
                    }
                });

            }

        })



    });


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



    <section id="home-section" class="hero">
        <div class="home-slider owl-carousel ">
            <div class="slider-item js-fullheight">
                <div class="container-fluid p-0">
                    <div class="row d-md-flex no-gutters slider-text align-items-center justify-content-end"
                        data-scrollax-parent="true" style="overflow:auto;">
                        <img class="one-third order-md-last img-fluid" src="images/parcel.png" alt="">
                        <div class="one-forth d-flex align-items-center">
                            <div class="text">
                                <!-- <span class="subheading">#have something in the USA?</span> -->
                                <div class="horizontal">
                                    <h1 style="color: #fff;" class="mb-4 mt-3">Have something in the USA?</h1>
                                    <p style="color: #fff;" class="mb-4">Send your items to our office in the US and
                                        it'll be brought to you in Kigali in a short matter of time.</p>
                                    <p><a href="shipfromusa.php" class="btn-custom">Ship from USA</a></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="slider-item js-fullheight">
                <div class="container-fluid p-0">
                    <div class="row d-flex no-gutters slider-text align-items-center justify-content-end"
                        data-scrollax-parent="true" style="overflow:auto;">
                        <img class="one-third order-md-last img-fluid" src="images/pro.png" alt="">
                        <div class="one-forth d-flex align-items-center">
                            <div class="text">
                                <!-- <span class="subheading">#Shop online with us</span> -->
                                <div class="horizontal">
                                    <h1 style="color: #fff;" class="mb-4 mt-3">Shop online with us</h1>
                                    <p style="color: #fff;" class="mb-4">Shop and own any item from global online
                                        markets and we'll get it shipped in Kigali for you. click the button below to
                                        see how much you will pay.</p>
                                    <p><a href="calculator.php" class="btn-custom">Price calculator</a></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="ftco-section ftco-no-pt ftco-no-pb">

        <div class="container">

            <div class="container">
                <div class="row justify-content-center mb-3 pb-3">
                    <div class="col-md-12 heading-section text-center ftco-animate">
                        <h2 class="mb-4">Our solution</h2>
                        <p>eGuriro is for everyone who want to shop online</p>
                    </div>
                </div>
            </div>

            <div class="row no-gutters ftco-services">
                <div class="col-lg-2 text-center d-flex align-self-stretch ftco-animate">
                    <div class="media block-6 services p-4 py-md-5">
                        <div class="icon d-flex justify-content-center align-items-center mb-4">
                            <span class="fas fa-comment-dots"></span>
                        </div>
                        <div class=" media-body">
                            <h3 class="heading">Top customer support</h3>

                        </div>
                    </div>
                </div>

                <div class="col-lg-2 text-center d-flex align-self-stretch ftco-animate">
                    <div class="media block-6 services p-4 py-md-5">
                        <div class="icon d-flex justify-content-center align-items-center mb-4">
                            <span class="fas fa-lock"></span>
                        </div>
                        <div class="media-body">
                            <h3 class="heading">Buyer protection</h3>

                        </div>
                    </div>
                </div>

                <div class="col-lg-2 text-center d-flex align-self-stretch ftco-animate">
                    <div class="media block-6 services p-4 py-md-5">
                        <div class="icon d-flex justify-content-center align-items-center mb-4">
                            <span class="flaticon-bag"></span>
                        </div>
                        <div class="media-body">
                            <h3 class="heading">Easy to shop</h3>

                        </div>
                    </div>
                </div>

                <div class="col-lg-2 text-center d-flex align-self-stretch ftco-animate">
                    <div class="media block-6 services p-4 py-md-5">
                        <div class="icon d-flex justify-content-center align-items-center mb-4">
                            <span class="fas fa-truck"></span>
                        </div>
                        <div class="media-body">
                            <h3 class="heading">Fast delivery</h3>

                        </div>
                    </div>
                </div>

                <div class="col-lg-2 text-center d-flex align-self-stretch ftco-animate">
                    <div class="media block-6 services p-4 py-md-5">
                        <div class="icon d-flex justify-content-center align-items-center mb-4">
                            <span class="fas fa-address-card"></span>
                        </div>
                        <div class="media-body">
                            <h3 class="heading">Best price guaranty</h3>

                        </div>
                    </div>
                </div>

                <div class="col-lg-2 text-center d-flex align-self-stretch ftco-animate">
                    <div class="media block-6 services p-4 py-md-5">
                        <div class="icon d-flex justify-content-center align-items-center mb-4">
                            <span class="fas fa-store-alt"></span>
                        </div>
                        <div class="media-body">
                            <h3 class="heading">All products types</h3>

                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>


    <section class="ftco-section bg-light">
        <div class="container">
            <div class="row justify-content-center mb-3 pb-3">
                <div class="col-md-12 heading-section text-center ftco-animate">
                    <h2 class="mb-4">Recently Delivered</h2>
                    <p>Open to enjoy live photos</p>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">


                <?php

                $sqlProducts="SELECT * FROM products order by product_id desc limit 8";
                $queryProducts=mysqli_query($conn,$sqlProducts);
                while($row=mysqli_fetch_assoc($queryProducts)){
                    $id=$row['product_id'];
                    $queryImg=mysqli_query($conn,"SELECT product_image FROM product_images WHERE product_id='$id'");
                    $rowImg=mysqli_fetch_assoc($queryImg);
            ?>
                <div class="col-sm-12 col-md-6 col-lg-3 ftco-animate d-flex">
                    <div class="product d-flex flex-column">
                        <a href="product-single.php?p=<?php echo str_replace(' ','-',$row['product_name']) ?>"
                            class="img-prod"><img class="img-fluid" src="<?php echo $rowImg['product_image'] ?>"
                                alt="Colorlib Template">
                            <div class="overlay"></div>
                        </a>
                        <div class="text py-3 pb-4 px-3">
                            <div class="d-flex">
                                <div class="cat">
                                    <span>Lifestyle</span>
                                </div>
                                <div class="rating">
                                    <p class="text-right mb-0">
                                        <a href="#"><span class="ion-ios-star-outline"></span></a>
                                        <a href="#"><span class="ion-ios-star-outline"></span></a>
                                        <a href="#"><span class="ion-ios-star-outline"></span></a>
                                        <a href="#"><span class="ion-ios-star-outline"></span></a>
                                        <a href="#"><span class="ion-ios-star-outline"></span></a>
                                    </p>
                                </div>
                            </div>
                            <h3><a
                                    href="product-single.php?p=<?php echo str_replace(' ','-',$row['product_name']) ?>"><?php echo $row['product_name'] ?></a>
                            </h3>
                            <div class="pricing">
                                <p class="price"><span>$<?php echo $row['price']  ?></span></p>
                            </div>
                            <p class="bottom-area d-flex px-3">
                                <a href="#" data-id="<?php echo $row['product_id']  ?>" data-toggle="modal"
                                    data-target="#cartModal" class="add-to-cart text-center py-2 mr-1"><span>Add
                                        to
                                        cart <i class="ion-ios-add ml-1"></i></span></a>
                                <a href="product-single.php?p=<?php echo str_replace(' ','-',$row['product_name']) ?>"
                                    class="buy-now text-center py-2">Buy now<span><i
                                            class="ion-ios-cart ml-1"></i></span></a>
                            </p>
                        </div>
                    </div>
                </div>
                <?php
            }
               ?>


                <!-- Modal -->
                <div class=" modal fade" id="cartModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Add product to cart
                                </h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">

                                <table class="table">
                                    <thead class="thead-primary">
                                        <tr class="text-center">

                                            <th>Product</th>
                                            <th>Price</th>
                                            <th>Quantity</th>

                                        </tr>
                                    </thead>
                                    <tbody id="tbody">

                                    </tbody>
                                </table>

                                <div class="d-flex justify-content-center">
                                    <div class="spinner-border" role="status" id="loader">
                                        <span class="sr-only">Logging in...</span>
                                    </div>
                                </div>

                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="button" id="addToCart" class="btn btn-primary">Add to
                                    cart</button>
                            </div>
                        </div>
                    </div>
                </div>




            </div>
        </div>
    </section>

    <section class="ftco-section ftco-no-pt ftco-no-pb">
        <div class="container">
            <div class="row no-gutters ftco-services">
                <div class="col-lg-2 text-center d-flex align-self-stretch ftco-animate">
                    <div class="media block-6 services p-4 py-md-5">

                        <div class="media-body">
                            <div>
                                <a href="http://amazon.com"><img class="zoom" src="images/icons/amazon.png"
                                        style="height:120px;width:120px; border-radius:25px;" /></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 text-center d-flex align-self-stretch ftco-animate">
                    <div class="media block-6 services p-4 py-md-5">

                        <div class="media-body">
                            <div>
                                <a href="http://ebay.com"> <img class="zoom" src="images/icons/ebay.jpg"
                                        style="height:120px;width:120px; border-radius:25px;" /></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 text-center d-flex align-self-stretch ftco-animate">
                    <div class="media block-6 services p-4 py-md-5">

                        <div class="media-body">
                            <div>
                                <a href="http://walmart.com"> <img class="zoom" src="images/icons/walmart.png"
                                        style="height:120px;width:120px; border-radius:25px;" /></a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-2 text-center d-flex align-self-stretch ftco-animate">
                    <div class="media block-6 services p-4 py-md-5">

                        <div class="media-body">
                            <div>
                                <a href="http://gearbest.com"> <img class="zoom" src="images/icons/gearbest.jpg"
                                        style="height:120px;width:120px; border-radius:25px;" /></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 text-center d-flex align-self-stretch ftco-animate">
                    <div class="media block-6 services p-4 py-md-5">

                        <div class="media-body">
                            <div>
                                <a href="http://alibaba.com"> <img class="zoom" src="images/icons/alibaba.png"
                                        style="height:120px;width:120px; border-radius:25px;" /></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 text-center d-flex align-self-stretch ftco-animate">
                    <div class="media block-6 services p-4 py-md-5">

                        <div class="media-body">
                            <div>
                                <a href="http://aliexpress.com"><img class="zoom" src="images/icons/aliexpress.jpg"
                                        style="height:120px;width:120px; border-radius:25px;" /></a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-2 text-center d-flex align-self-stretch ftco-animate">
                    <div class="media block-6 services p-4 py-md-5">

                        <div class="media-body">
                            <div>
                                <a href="http://fashionnova.com"> <img class="zoom" src="images/icons/fashionnova.png"
                                        style="height:120px;width:120px; border-radius:25px;" /></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <!--<section class="ftco-section ftco-deal bg-primary">-->
    <!--    <div class="container">-->
    <!--        <div class="row">-->
    <!--            <div class="col-md-6">-->
    <!--                <img src="images/prod-1.png" class="img-fluid" alt="">-->
    <!--            </div>-->
    <!--            <div class="col-md-6">-->
    <!--                <div class="heading-section heading-section-white">-->
    <!--                    <span class="subheading">Deal of the month</span>-->
    <!--                    <h2 class="mb-3">Deal of the month</h2>-->
    <!--                </div>-->
    <!--                <div id="timer" class="d-flex mb-4">-->
    <!--                    <div class="time" id="days"></div>-->
    <!--                    <div class="time pl-4" id="hours"></div>-->
    <!--                    <div class="time pl-4" id="minutes"></div>-->
    <!--                    <div class="time pl-4" id="seconds"></div>-->
    <!--                </div>-->
    <!--                <div class="text-deal">-->
    <!--                    <h2><a href="#">Nike Free RN 2019 iD</a></h2>-->
    <!--                    <p class="price"><span class="mr-2 price-dc">$120.00</span><span-->
    <!--                            class="price-sale">$80.00</span></p>-->
    <!--                    <ul class="thumb-deal d-flex mt-4">-->
    <!--                        <li class="img" style="background-image: url(images/product-6.png);"></li>-->
    <!--                        <li class="img" style="background-image: url(images/product-2.png);"></li>-->
    <!--                        <li class="img" style="background-image: url(images/product-4.png);"></li>-->
    <!--                    </ul>-->
    <!--                </div>-->
    <!--            </div>-->
    <!--        </div>-->
    <!--    </div>-->
    <!--</section>-->
    <section class="ftco-section testimony-section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-5">
                    <div class="services-flow">
                        <div class="services-2 p-4 d-flex ftco-animate">
                            <div class="icon">
                                <span class="flaticon-bag"></span>
                            </div>
                            <div class="text">
                                <h3>Best Quality</h3>
                                <p class="mb-0"></p>
                            </div>
                        </div>
                        <div class="services-2 p-4 d-flex ftco-animate">
                            <div class="icon">
                                <span class="flaticon-heart-box"></span>
                            </div>
                            <div class="text">
                                <h3>Fast delivery</h3>
                                <p class="mb-0"></p>
                            </div>
                        </div>
                        <div class="services-2 p-4 d-flex ftco-animate">
                            <div class="icon">
                                <span class="flaticon-payment-security"></span>
                            </div>
                            <div class="text">
                                <h3>Affordable price</h3>
                                <p class="mb-0"></p>
                            </div>
                        </div>
                        <div class="services-2 p-4 d-flex ftco-animate">
                            <div class="icon">
                                <span class="flaticon-customer-service"></span>
                            </div>
                            <div class="text">
                                <h3>All Day Support</h3>
                                <p class="mb-0"></p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-7">
                    <div class="heading-section ftco-animate mb-5">
                        <h2 class="mb-4">WHAT OUR CUSTOMERS SAY</h2>
                        <!-- <p>Safety, quality and professionalism in performance</p> -->
                    </div>
                    <div class="carousel-testimony owl-carousel ftco-animate">
                        <div class="item" style="margin-top: 20px;">
                            <div class="testimony-wrap">
                                <!-- style="background-image: url(icons/avatar.jpg)" -->
                                <!-- <div class="user-img mb-4" >
                                    <span class="quote d-flex align-items-center justify-content-center">
                                        <i class="icon-quote-left"></i>
                                    </span>
                                </div> -->
                                <div class="text" ">
                                    <p class=" mb-4 pl-4 line">Mwantumirije ibikoresho bingeraho mu gihe nyacyo kandi
                                    biza bifite quality nziza nashashakaga, Ibikoresho byaje bisa neza nibyo nari
                                    nabasabye ngo mu ngurire, Ndabakunda</p>
                                    <p class="name">Munyemana Philbert</p>
                                    <span class="position">From Musanze</span>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="testimony-wrap">
                                <!--  <div class="user-img mb-4" style="background-image: url(icons/avatar.jpg)">
                                    <span class="quote d-flex align-items-center justify-content-center">
                                        <i class="icon-quote-left"></i>
                                    </span>
                                </div> -->
                                <div class="text">
                                    <p class="mb-4 pl-4 line">eguriro ni company nziza, nabatumye ibintu byamfashaga
                                        mukazi kange byangezeho mugihe nkuko mwari mwansezeraniye … Yamaha motif mx61
                                        ntaho wayikura mu Rwanda ariko bo bayingejejeho mu buryo bwihuse nibindi
                                        bikoresho nari nabatumye!</p>
                                    <p class="name">Nduwimana Eric</p>
                                    <span class="position">SMB CEO</span>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="testimony-wrap">
                                <!--    <div class="user-img mb-4" style="background-image: url(icons/avatar.jpg)">
                                    <span class="quote d-flex align-items-center justify-content-center">
                                        <i class="icon-quote-left"></i>
                                    </span>
                                </div> -->
                                <div class="text">
                                    <p class="mb-4 pl-4 line">Hi, Thanks for your service i received my Google pixel xl
                                        in few days with out any problem and it’s of good quality thx again.</p>
                                    <p class="name">Nkuranga Moris</p>
                                    <span class="position">From Kigali</span>
                                </div>
                            </div>
                        </div>

                        <div class="item">
                            <div class="testimony-wrap">
                                <!-- <div class="user-img mb-4" style="background-image: url(icons/avatar.jpg)">
                                    <span class="quote d-flex align-items-center justify-content-center">
                                        <i class="icon-quote-left"></i>
                                    </span>
                                </div> -->
                                <div class="text">
                                    <p class="mb-4 pl-4 line">They have good services truly, E-guriro keep it up we are
                                        together.</p>
                                    <p class="name">Bolar Leve</p>
                                    <span class="position">KMB CEO</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>





    <?php

include('includes/footer.php');
?>

    <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px">
            <circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee" />
            <circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10"
                stroke="#F96D00" /></svg></div>
    <script src="js/jquery-migrate-3.0.1.min.js" type="e453b019aa69fbefbcdfbb4e-text/javascript"></script>
    <script src="js/popper.min.js" type="e453b019aa69fbefbcdfbb4e-text/javascript"></script>
    <script src="js/bootstrap.min.js" type="e453b019aa69fbefbcdfbb4e-text/javascript"></script>
    <script src="js/jquery.easing.1.3.js" type="e453b019aa69fbefbcdfbb4e-text/javascript"></script>
    <script src="js/jquery.waypoints.min.js" type="e453b019aa69fbefbcdfbb4e-text/javascript"></script>
    <script src="js/jquery.stellar.min.js" type="e453b019aa69fbefbcdfbb4e-text/javascript"></script>
    <script src="js/owl.carousel.min.js" type="e453b019aa69fbefbcdfbb4e-text/javascript"></script>
    <script src="js/jquery.magnific-popup.min.js" type="e453b019aa69fbefbcdfbb4e-text/javascript"></script>
    <script src="js/aos.js" type="e453b019aa69fbefbcdfbb4e-text/javascript"></script>
    <script src="js/jquery.animateNumber.min.js" type="e453b019aa69fbefbcdfbb4e-text/javascript"></script>
    <script src="js/bootstrap-datepicker.js" type="e453b019aa69fbefbcdfbb4e-text/javascript"></script>
    <script src="js/scrollax.min.js" type="e453b019aa69fbefbcdfbb4e-text/javascript"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&amp;sensor=false"
        type="e453b019aa69fbefbcdfbb4e-text/javascript"></script>
    <script src="js/google-map.js" type="e453b019aa69fbefbcdfbb4e-text/javascript"></script>
    <script src="js/main.js" type="e453b019aa69fbefbcdfbb4e-text/javascript"></script>

    <script src="js/bootstrap-notify/bootstrap-notify.min.js"></script>

    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-23581568-13"
        type="e453b019aa69fbefbcdfbb4e-text/javascript"></script>
    <script type="e453b019aa69fbefbcdfbb4e-text/javascript">
    window.dataLayer = window.dataLayer || [];

    function gtag() {
        dataLayer.push(arguments);
    }
    gtag('js', new Date());

    gtag('config', 'UA-23581568-13');
    </script>
    <script src="./js/rocket-loader.min.js" data-cf-settings="e453b019aa69fbefbcdfbb4e-|49" defer=""></script>
</body>


</html>