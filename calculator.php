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

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-notify/0.2.0/css/bootstrap-notify.css">
    <link>

    <script>
    $(document).ready(function() {


        var outside="";
        var selected="";
        var ship_cost="";
        var weight=0;

        var quantity=0;
        var total_price=0;

        $("#cost").hide()
        $("#location").hide()

        $("#convert").hide()
        $("#contact").hide()

        $("#yes").click(function() {
            $("#location").hide()
            $("#cost").slideDown("slow")
            outside = "yes"
            selected = "rwanda";
            $("#convert").hide()
            $("#contact").hide()
        })

        $("#no").click(function() {
            $("#cost").hide()
            $("#location").slideDown("slow")
            outside = "no"
        })

        $("#select").change(function() {
            selected = $(this).children("option:selected").val();

            if (selected === "United states") {

                $("#contact").hide()
                $("#convert").slideDown("slow")
            } else if (selected === "UK") {
                $("#convert").hide()
                $("#contact").slideDown("slow")
            } else {
                $("#convert").hide()
                $("#contact").hide()
            }
        });

        $('#calculate').click(function() {


            $("#info").css("display", "block");
            if (outside === "yes") {
                ship_cost = $("#ship_cost").val();
            }

            if (selected === "United states") {
                weight = $("#weight").val();
            }

            var price = $("#price").val();
            $("#message").html("<img src='icons/loading.gif' width='50px' height='50px'/>")
            $.ajax({
                url: 'php/calculate.php',
                data: {
                    "country": selected,
                    "price": price,
                    "ship_cost": ship_cost,
                    "weight": weight
                },
                type: 'post',
                success: function(result) {
                    total_price = result;
                    $("#message").text("Total price is " + result)
                }
            });
        });



        $('#order').click(function() {
            var product = $("#product").val();
            $("#message").html("<img src='icons/loading.gif' width='50px' height='50px'/>");

            $('#successModal').modal('show');

            // var quantity=$("#weight").val();
            // $.ajax
            // ({ 
            // url: 'php/add_order.php',
            // data: {"weight":quantity,"total_price":total_price,"product":product},
            // type: 'post',
            // success: function(result)
            // {
            //     $("#message").html(result)  
            // }
            // });

        });


        $('#od').click(function() {
            var product = $("#product").val();
            $("#message").html("<img src='icons/loading.gif' width='50px' height='50px'/>");

            $('.modal-body').html("Are you sure do you want to buy this product?");

            if (outside === "yes") {
                quantity = $("#quantity").val();
            } else if (outside === "no") {
                quantity = $("#weight").val();
            }

            var payment = $("input[name='payment']:checked").val();

            $.ajax({
                url: 'php/add_order.php',
                data: {
                    "weight": quantity,
                    "total_price": total_price,
                    "product": product,
                    "payment": payment
                },
                type: 'post',
                success: function(result) {

$('.modal-body').html("Are you sure do you want to buy this product?");

if(outside==="yes"){
    quantity=$("#quantity").val();
}else if(outside==="no"){
    quantity=$("#weight").val();
}

var payment= $("input[name='payment']:checked").val();

$.ajax
({ 
url: 'php/add_order.php',
data: {"weight":quantity,"total_price":total_price,"product":product,"payment":payment},
type: 'post',
success: function(result)
{

    // $('.modal-body').html(message);
    $('#successModal').modal('hide');
    // $("#message").html(result) 

                       $('#loginModal').modal('show');

                        if(payment==="momo"){
                            var message="Thank you , your order has been Received, you have selected paying via mobile money, here is our momo account 0781816180 TUYIZERE Eyse";
                            $('.modal-body').html(message);
                        } else if(payment==="bank"){
                            
                            var message="Thank you , your order has been Received, you have selected paying via mobile money, here is  our Equity bank A/C : 4002100384793 TUYIZERE Eyse";
                            $('.modal-body').html(message);
                        }else if(payment==="cash"){
                            var message="Thank you , your order has been Received, you have selected paying via mobile money, here is address <br/> OFFICE LOCATION KN 87st <br/>Beatitude house <br/>Second floor <br/>Door 13<br/>phone : 0781816180";
                            $('.modal-body').html(message);
                        }

     
}
});


                        var message =
                            "Thank you , your order has been Received, you have selected paying via mobile money, here is  our Equity bank A/C : 4002100384793 TUYIZERE Eyse";
                        $('.modal-body').html(message);
                    } else if (payment === "cash") {
                        var message =
                            "Thank you , your order has been Received, you have selected paying via mobile money, here is address <br/> OFFICE LOCATION KN 87st <br/>Beatitude house <br/>Second floor <br/>Door 13<br/>phone : 0781816180";
                        $('.modal-body').html(message);
                    }


                }
            });

        });

        $("#loader").hide();
        $("#addToCart").click(function() {

            var product = $("#product").val();

            var payment = $("input[name='payment']:checked").val();

            if (outside === "yes") {
                quantity = $("#quantity").val();
            } else if (outside === "no") {
                quantity = $("#weight").val();
            }


            if (quantity === '' || quantity == 0) {
                notify("Warning", "Please specify product quantity", 'warning')
            } else {

                $("#loader").show();
                $("#addToCart").hide("slow");

                $.ajax({
                    type: "POST",
                    url: "php/add_cart.php",
                    data: {
                        "quantity": quantity,
                        "price": total_price,
                        "name": product,
                        "cart": payment
                    },
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

                        // console.log("state"+state.state);
                    },
                    error: function(er) {
                        $("#loader").hide("slow");
                        $("#addToCart").show("slow");
                        notify("Danger", er, "danger");
                    }
                });

            }

        });

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

    <div class="hero-wrap hero-bread" style="background-image: url('images/bg_6.jpg');">
        <div class="container">
            <div class="row no-gutters slider-text align-items-center justify-content-center">
                <div class="col-md-9 ftco-animate text-center">
                    <p class="breadcrumbs"><span class="mr-2"><a href="index.php">Home</a></span> <span>Price
                            calculator</span></p>
                    <h1 class="mb-0 bread">Price calculator</h1>
                </div>
            </div>
        </div>
    </div>
    <section class="ftco-section ftco-no-pt ftco-no-pb">
        <div class="container">
            <div class="row no-gutters ftco-services">
                <div class="col-lg-3 text-center d-flex align-self-stretch ftco-animate">
                    <div class="media block-6 services p-4 py-md-5">

                        <div class="media-body">
                            <img src="images/poster.jpg" width="200" />
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 text-center d-flex align-self-stretch ftco-animate">
                    <div class="media block-6 services p-2">
                        <div class="icon d-flex justify-content-center align-items-center mb-4">
                            <span class="flaticon-customer-service"></span>
                        </div>
                        <div class="media-body">
                            <h3 class="heading">Online product</h3>
                            <p>Check a <a href="stores.php">List of Online Stores</a> we support, search a product from
                                your favorite, and paste the product details below, to complete your order. <br />
                                <font color='red'>[ Exchange rate 947Rwf /USD ]</font>
                            </p>
                        </div>
                        <div class="pt-2">
                            <form action="#" method="post" class="bg-white p-5 contact-form">
                                <div class="form-group">
                                    <input type="text" class="form-control" id="product" placeholder="Product link">
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" id="price" placeholder="Product price">
                                </div>
                                <label>Ship to Rwanda?</label><br />
                                <div class="btn-group" role="group" aria-label="Basic example">

                                    <button type="button" class="btn btn-secondary" id="yes">Yes</button>
                                    <button type="button" class="btn btn-secondary" id="no">No</button>

                                </div>

                                <div class="form-group pt-2" id="cost">
                                    <input type="text" id="ship_cost" class="form-control" placeholder="Shipping cost">
                                </div>

                                <div id="location" class="pt-2">
                                    <label>Product location</label><br />

                                    <select class="form-control" id="select">
                                        <option>Please select</option>
                                        <option value="UK">UK</option>
                                        <option value="United states">United states</option>
                                        <option>Others</option>
                                    </select>
                                </div>

                                <div class="form-group pt-2" id="convert">
                                    <input type="text" class="form-control" id="weight" placeholder="Item weight">
                                    <span><b>Convert to KG</b></span><br />
                                    <label>If the Weight units are not in Kg, Please convert them in Kg before inserting
                                        them here, using this <a
                                            href="https://www.omnicalculator.com/conversion/weight-converter">Conversion
                                            Tool.</a> </label>
                                </div>

                                <div class="form-group pt-2" id="contact">
                                    <span><b>Information</b></span><br />
                                    <label>Package should not be above 0.8kg and size of 30cmx30cm x30cm</label>
                                </div>

                                <div class="form-group mt-2">
                                    <input type="button" id="calculate" value="Calculate" name="calculate"
                                        class="btn btn-primary py-3 px-5">
                                </div>
                                <div class="form-group mt-2" style="color:red;font-size:25px;" id="message"></div>

                            </form>

                        </div>
                        <div class="row"></div>

                        <div id="info"   class="row" style="display: none;">
                        <div class="col-md-12"><input type="number"  class="form-control" name="quantity" id="quantity" placeholder="Quantity"/></div>
                        <!-- <div class="col-md-12"><input type="email" class="form-control"  name="email" id="email" placeholder="Email"/></div>
                        <div style="margin-top: 10px;" class="col-md-12"><input type="phone" class="form-control"  name="phone" id="phone" placeholder="Phone"/></div> -->
                        <br>
                        <div class="col-md-12">
                        <div class="cart-total">
                    <h3>Payment method</h3>
                    <p class="d-flex total-price">
                        <span>MOMO</span></td><td><span><input class="form-control" id="payment" type="radio" value="momo" name="payment"/></span>     
                    </p>
                     <p class="d-flex total-price">
                            <span>Bank</span>
                            <span><input class="form-control" type="radio" value="bank" id="payment" name="payment"/></span>
                    </p>
                     <p class="d-flex total-price">
                            <span>Cash</span>
                            <span><input class="form-control" type="radio" value="cash" id="payment" name="payment"/></span>
                    </p>

</div></div>
                        <div class="col-md-12" style="margin-bottom: 50px; margin-top:10px;" ><input type="button" id="order" value="Buy it Now" name="order" class="btn btn-primary py-3 px-5"></div>
                    </div>


                                </div>
                            </div>
                            <div class="col-md-12" style="margin-bottom: 50px; margin-top:10px;">
                                <input type="button" id="order" value="Buy it Now" name="order"
                                    class="btn btn-primary py-3 px-5 mt-1">

                                <div class="spinner-border" role="status" id="loader">
                                    <span class="sr-only">Logging in...</span>
                                </div>
                                <input type="btn btn-text" id="addToCart" value="Add to cart" name="cart"
                                    class="btn btn-secondary py-3 px-5 mt-1">
                            </div>
                        </div>

                        <div class="row">

                        </div>

                    </div>

                </div>
                <div class="col-lg-3 text-center d-flex align-self-stretch ftco-animate">
                    <div class="media block-6 services p-4 py-md-5">





                    </div>
                </div>
            </div>
        </div>
    </section>


    <div class=" modal fade" id="successModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Message
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" style="color: #000;">
                    Are you sure do you want to buy this product?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

                    <button type="button" id="od" class="btn btn-primary">Yes</button>
                </div>
            </div>
        </div>
    </div>




    <div class=" modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
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
                <div class="modal-body">
                    You must first login to make this order!
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

                    <a href="signin.php"><button type="button" id="buyProduct" class="btn btn-primary">Buy</button></a>

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


    <script src="js/jquery-migrate-3.0.1.min.js" type="0655eb557a52ebd004c94297-text/javascript"></script>
    <script src="js/popper.min.js" type="0655eb557a52ebd004c94297-text/javascript"></script>
    <script src="js/bootstrap.min.js" type="0655eb557a52ebd004c94297-text/javascript"></script>
    <script src="js/jquery.easing.1.3.js" type="0655eb557a52ebd004c94297-text/javascript"></script>
    <script src="js/jquery.waypoints.min.js" type="0655eb557a52ebd004c94297-text/javascript"></script>
    <script src="js/jquery.stellar.min.js" type="0655eb557a52ebd004c94297-text/javascript"></script>
    <script src="js/owl.carousel.min.js" type="0655eb557a52ebd004c94297-text/javascript"></script>
    <script src="js/jquery.magnific-popup.min.js" type="0655eb557a52ebd004c94297-text/javascript"></script>
    <script src="js/aos.js" type="0655eb557a52ebd004c94297-text/javascript"></script>
    <script src="js/jquery.animateNumber.min.js" type="0655eb557a52ebd004c94297-text/javascript"></script>
    <script src="js/bootstrap-datepicker.js" type="0655eb557a52ebd004c94297-text/javascript"></script>
    <script src="js/scrollax.min.js" type="0655eb557a52ebd004c94297-text/javascript"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&amp;sensor=false"
        type="0655eb557a52ebd004c94297-text/javascript"></script>
    <script src="js/google-map.js" type="0655eb557a52ebd004c94297-text/javascript"></script>
    <script src="js/main.js" type="0655eb557a52ebd004c94297-text/javascript"></script>

    <script src="js/bootstrap-notify/bootstrap-notify.min.js"></script>

    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-23581568-13"
        type="0655eb557a52ebd004c94297-text/javascript"></script>
    <script type="0655eb557a52ebd004c94297-text/javascript">
    window.dataLayer = window.dataLayer || [];

    function gtag() {
        dataLayer.push(arguments);
    }
    gtag('js', new Date());

    gtag('config', 'UA-23581568-13');
    </script>
    <script src="./js/rocket-loader.min.js" data-cf-settings="0655eb557a52ebd004c94297-|49" defer=""></script>
</body>

<!-- Mirrored from colorlib.com/preview/theme/minishop/about.php by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 12 Dec 2019 10:38:13 GMT -->

</html>