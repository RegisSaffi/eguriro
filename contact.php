<!DOCTYPE html>
<html lang="en">

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

    <style>
    .responsive-map-container {
        position: relative;
        width: 100%;
        height: 100%;
        overflow: hidden;
    }

    .responsive-map-container iframe,
    .responsive-map-container object,
    .responsive-map-container embed {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
    }
    </style>

    <script>
    $(function() {

        $("#loader").hide()

        $("#send").click(function() {

            var name = $('#name').val();
            var email = $('#email').val();
            var subject = $('#subject').val();
            var message = $('#message').val();

            if (name === "") {
                notify("Error", "Enter your names", "danger")

            } else if (subject === "") {
                notify("Error", "Enter message subject", "danger")

            } else if (email != "" && !validateEmail(email)) {
                notify("Error", "Enter your valid email address", "danger")

            } else if (message === "") {
                notify("Error", "Describe your message, issue or idea", "danger")

            } else {


                $("#loader").hide("slow");
                $("#send").show(100);

                var data = {
                    "name": name,
                    "email": email,
                    "subject": subject,
                    "message": message
                }

                $.ajax({
                    type: "POST",
                    url: "php/contact.php",
                    data: data,
                    cache: false,
                    success: function(result) {

                        $("#loader").hide("slow");
                        $("#send").show(100);
                        console.log(result)
                        var state = JSON.parse(result)

                        notify(state.state, state.msg, state.state);

                        $('#name').val("")
                        $('#email').val("")
                        $('#subject').val("")
                        $('#message').val("")

                    },
                    error: function(er) {
                        $("#loader").hide("slow");
                        $("#send").show();
                        notify("Danger", er, "danger");
                    }
                });


            }

        })


    });

    function validateEmail(email) {
        var re =
            /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
        return re.test(String(email).toLowerCase());
    }

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
                    <p class="breadcrumbs"><span class="mr-2"><a href="index.php">Home</a></span> <span>Contact</span>
                    </p>
                    <h1 class="mb-0 bread">Contact Us</h1>
                </div>
            </div>
        </div>
    </div>
    <section class="ftco-section contact-section bg-light">
        <div class="container">
            <div class="row d-flex mb-5 contact-info">
                <div class="w-100"></div>
                <div class="col-md-3 d-flex">
                    <div class="info bg-white p-4">
                        <p><span>Address:</span> KN 87 st
                            Beatitude House

                            2nd floor

                            door 13

                            Kigali-Rwanda</p>
                    </div>
                </div>
                <div class="col-md-3 d-flex">
                    <div class="info bg-white p-4">
                        <p><span>Phone:</span> <a href="tel://1234567920">+250 781 816 180</a></p>
                    </div>
                </div>
                <div class="col-md-3 d-flex">
                    <div class="info bg-white p-4">
                        <p><span>Email:</span> <a href="info@eguriro.com"><span>sales@eguriro.com</span></a>
                        </p>
                    </div>
                </div>
                <div class="col-md-3 d-flex">
                    <div class="info bg-white p-4">
                        <p><span>Website</span> <a href="#">eguriro.com</a></p>
                    </div>
                </div>
            </div>
            <div class="row block-9">
                <div class="col-md-6 order-md-last d-flex">
                    <form class="bg-white p-5 contact-form">
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Your Name" id="name">
                        </div>
                        <div class="form-group">
                            <input type="email" class="form-control" placeholder="Your Email(optional)" id="email">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Subject" id="subject">
                        </div>
                        <div class="form-group">
                            <textarea name="" id="message" cols="30" rows="7" class="form-control"
                                placeholder="Message"></textarea>
                        </div>
                        <div class="form-group">

                            <div class="spinner-border" role="status" id="loader">
                                <span class="sr-only">Logging in...</span>
                            </div>

                            <input type="button" value="Send Message" id="send" class="btn btn-primary py-3 px-5">
                        </div>
                    </form>
                </div>
                <div class="col-md-6 d-flex">
                    <div class="bg-white responsive-map-container">
                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3987.528769906564!2d30.05842041430676!3d-1.941140398584795!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x19dca57abcc1d0cb%3A0x7922bb22e9ac9c5c!2sEGuriro%20Devices%20Ltd!5e0!3m2!1sen!2srw!4v1581408908392!5m2!1sen!2srw"
                            width="540" height="600" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
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

    <script src="js/jquery-migrate-3.0.1.min.js" type="570bac82537cb16eb5e15e7f-text/javascript"></script>
    <script src="js/popper.min.js" type="570bac82537cb16eb5e15e7f-text/javascript"></script>
    <script src="js/bootstrap.min.js" type="570bac82537cb16eb5e15e7f-text/javascript"></script>
    <script src="js/jquery.easing.1.3.js" type="570bac82537cb16eb5e15e7f-text/javascript"></script>
    <script src="js/jquery.waypoints.min.js" type="570bac82537cb16eb5e15e7f-text/javascript"></script>
    <script src="js/jquery.stellar.min.js" type="570bac82537cb16eb5e15e7f-text/javascript"></script>
    <script src="js/owl.carousel.min.js" type="570bac82537cb16eb5e15e7f-text/javascript"></script>
    <script src="js/jquery.magnific-popup.min.js" type="570bac82537cb16eb5e15e7f-text/javascript"></script>
    <script src="js/aos.js" type="570bac82537cb16eb5e15e7f-text/javascript"></script>
    <script src="js/jquery.animateNumber.min.js" type="570bac82537cb16eb5e15e7f-text/javascript"></script>
    <script src="js/bootstrap-datepicker.js" type="570bac82537cb16eb5e15e7f-text/javascript"></script>
    <script src="js/scrollax.min.js" type="570bac82537cb16eb5e15e7f-text/javascript"></script>

    <script src="js/bootstrap-notify/bootstrap-notify.min.js"></script>

    <script src="js/google-map.js" type="570bac82537cb16eb5e15e7f-text/javascript"></script>
    <script src="js/main.js" type="570bac82537cb16eb5e15e7f-text/javascript"></script>
    <script src="./js/rocket-loader.min.js" data-cf-settings="570bac82537cb16eb5e15e7f-|49" defer=""></script>
</body>

</html>