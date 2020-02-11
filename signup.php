<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from colorlib.com/preview/theme/minishop/about.php by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 12 Dec 2019 10:38:12 GMT -->
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

    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-notify/0.2.0/css/bootstrap-notify.css">
    <link>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>


    <script>
    $(function() {

        $("#loader").hide()

        $("#register").click(function() {


            var name1 = $('#fname').val();
            var name2 = $('#lname').val();

            var email = $('#email').val()
            var phone = $('#phone').val()
            var password = $('#pass').val();
            var password2 = $('#pass2').val();

            if (name1 === "") {
                notify("Warning", "Enter your first name", "danger");
            } else if (name2 === "") {
                notify("Warning", "Enter your last name", "danger");
            } else if (phone === "") {
                notify("Warning", "Enter your phone number", "danger");
            } else if (password === "") {
                notify("Warning", "Enter your password", "danger");
            } else if (password2 === "") {
                notify("Warning", "Confirm your password", "danger");
            } else if (password != password2) {
                notify("Warning", "Your passwords not match", "danger");
            } else {

                $("#loader").show("slow");
                $("#register").hide("slow");
                var data = {
                    "fname": name1,
                    "lname": name2,
                    "phone": phone,
                    "email": email,
                    "password": password
                };

                $.ajax({
                    type: "POST",
                    url: "php/signup.php",
                    data: data,
                    cache: false,
                    success: function(result) {

                        $("#loader").hide("slow");
                        $("#register").show(100);
                        console.log(result)
                        var state = JSON.parse(result)

                        notify(state.state, state.msg, state.state);

                        if (state.state === "success") {
                            window.location.replace("signin.php");
                        }

                    },
                    error: function(er) {
                        $("#loader").hide("slow");
                        $("#register").show();
                        notify("Danger", er, "danger");
                    }
                });

            }

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
                    <p class="breadcrumbs"><span class="mr-2"><a href="index.php">Home</a></span> <span>Signup</span>
                    </p>
                    <h1 class="mb-0 bread">Create new account</h1>
                </div>
            </div>
        </div>
    </div>
    <section class="ftco-section ftco-no-pt ftco-no-pb">
        <div class="container">
            <div class="row no-gutters ftco-services">
                <div class="col-lg-3 text-center d-flex align-self-stretch ftco-animate">
                    <div class="media block-6 services p-4 py-md-5">


                    </div>
                </div>
                <div class="col-lg-6 text-center d-flex align-self-stretch ftco-animate">
                    <div class="media block-6 services p-2">

                        <div class="media-body">
                            <h3 class="heading">Sign up</h3>
                            <p>Click <a href="signin.php">HERE</a> to sign in if you already have an account. <br />

                            </p>
                        </div>
                        <div class="pt-2">
                            <div class="bg-white p-5 contact-form">
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="First name" id='fname'>
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Last name" id='lname'>
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Phone number" id="phone">
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Email address" id="email">
                                </div>
                                <div class="form-group">
                                    <input type="password" class="form-control" placeholder="Your password" id="pass">
                                </div>

                                <div class="form-group">
                                    <input type="password" class="form-control" placeholder="Re-enter password"
                                        id="pass2">
                                </div>

                                <p class="pt-3">Your personal data will be used to support your experience throughout
                                    this website, to manage access to your account, and for other purposes described in
                                    <a href="terms.php">Privacy policies</a>.</p> <br />



                                <div class="d-flex justify-content-center">
                                    <div class="spinner-border" role="status" id="loader">
                                        <span class="sr-only">Logging in...</span>
                                    </div>
                                </div>
                                <div class="form-group mt-2">
                                    <input type="submit" value="Register" id="register"
                                        class="btn btn-primary py-3 px-5">

                                </div>
                            </div>
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