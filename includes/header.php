<?php

include("php/connect.php");

    $client=md5(
    $_SERVER['REMOTE_ADDR'] .
    $_SERVER['HTTP_USER_AGENT']);

    $name="Account";

      if(isset($_COOKIE["eguriro"])) {
       $client=$_COOKIE["eguriro"];

        $accountQuery=mysqli_query($conn,"SELECT * FROM clients WHERE client_unique='$client'");
        $name=mysqli_fetch_assoc($accountQuery)['client_fname'];
    }

      $sqlProducts="SELECT * FROM cart WHERE client_id='$client'";
                $queryProducts=mysqli_query($conn,$sqlProducts);
                $count=mysqli_num_rows($queryProducts);

               
?>

<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" style="color:#fff;"
    id="ftco-navbar">
    <div class="container">
        <a class="navbar-brand" href="index.php">
            <img src='icons/logo.png' style="height:40px; margin-top:10px;" />
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav"
            aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="oi oi-menu"></span> Menu
        </button>
        <div class="collapse navbar-collapse" id="ftco-nav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item"><a href="index.php" class="nav-link">Home</a></li>
                <li class="nav-item"><a href="calculator.php" class="nav-link">Price calculator</a></li>
                <li class="nav-item"><a href="howitworks.php" class="nav-link">How it works</a></li>
                <li class="nav-item"><a href="stores.php" class="nav-link">Online stores</a></li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="dropdown04" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">Support</a>
                    <div class="dropdown-menu" aria-labelledby="dropdown04">
                        <a class="dropdown-item" href="faqs.php">FAQs</a>
                        <a class="dropdown-item" href="contact.php">Contact us</a>
                        <a class="dropdown-item" href="terms.php">Terms of services</a>

                    </div>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="dropdown04" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false"><?php echo $name ?></a>
                    <div class="dropdown-menu" aria-labelledby="dropdown04">

                        <?php if(!isset($_COOKIE["eguriro"])) {
                                           ?>
                        <a class="dropdown-item" href="signin.php">Login</a>
                        <a class="dropdown-item" href="signup.php">Register</a>
                        <?php  
                                         }else{
                                         ?>

                        <a class="dropdown-item" href="orders.php">Orders</a>
                        <a class="dropdown-item" href="#" data-toggle="modal" data-target="#exampleModal">Logout</a>

                        <?php  
                         }
                        ?>

                    </div>
                </li>

                <li class="nav-item cta cta-colored"><a style="color: #fff;" href="cart.php" class="nav-link"><span
                            class="icon-shopping_cart"></span>[<b id="cart_counter"><?php echo $count ?></b>]</a></li>

            </ul>


        </div>
    </div>
</nav>

<!-- Modal -->
<div class=" modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
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
                Are you sure you need to logout your account?
                You will require to sign in again to access your account.
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <a href="./php/logout.php"><button type="button" class="btn btn-primary">Logout</button></a>
            </div>
        </div>
    </div>
</div>