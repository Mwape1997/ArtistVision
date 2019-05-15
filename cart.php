<?php
/*
Authors: Mwape, Alex
*/
session_start();
require_once("inc/config.inc.php");
require_once("inc/functions.inc.php");

//Überprüfe, dass der User eingeloggt ist
//Der Aufruf von check_user() muss in alle internen Seiten eingebaut sein
$user = check_user();

?>





<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="./assets/img/Sound Perception.png">
    <link rel="icon" type="image/png" href="./assets/img/Sound Perception.png">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>
        Artists Vision
    </title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
    <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
    <!-- CSS Files -->
    <link href="./assets/css/bootstrap.min.css" rel="stylesheet" />
    <link href="./assets/css/now-ui-kit.css?v=1.2.0" rel="stylesheet" />
    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link href="./assets/demo/demo.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" type="text/css" href="faq.css">
    <script type="text/javascript" src="http://ecn.dev.virtualearth.net/mapcontrol/mapcontrol.ashx?v=7.0" async></script>
    <script src="BingControllerAPI.js" async></script>
    <script src="cart.js" async></script>
</head>

<body class="landing-page sidebar-collapse" onload="GetMap()">
<!-- Navbar -->
<nav class="navbar navbar-expand-lg bg-dark fixed-top navbar-transparent " color-on-scroll="400">
    <div class="container">
        <div class="dropdown button-dropdown">
            <a href="#" class="dropdown-toggle" id="navbarDropdown" data-toggle="dropdown">
                <span class="button-bar"></span>
                <span class="button-bar"></span>
                <span class="button-bar"></span>
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-header">Explore our site!</a>
                <a class="dropdown-item" href="#mission">Mission Statement</a>
                <a class="dropdown-item" href="#ourartists">Our most successful artists</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#faq">FAQ</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#contactus">Contact us</a>
            </div>
        </div>
        <div class="navbar-translate">
            <a class="navbar-brand" href="#" rel="tooltip" title="Designed by Steineder. Made possible by X Team" data-placement="bottom" target="_blank">
                Artists Vision.
            </a>
            <button class="navbar-toggler navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-bar top-bar"></span>
                <span class="navbar-toggler-bar middle-bar"></span>
                <span class="navbar-toggler-bar bottom-bar"></span>
            </button>
            </button>
        </div>
        <div class="collapse navbar-collapse justify-content-end" id="navigation" data-nav-image="./assets/img/blurred-image-1.jpg">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="./welcome-user.php">Browser Artists</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="./index.html">Logout</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="./cart.php">Shopping Cart</a>
                </li>


            </ul>
        </div>
    </div>
</nav>
<!-- End Navbar -->
<div class="wrapper">
    <div class="page-header clear-filter">
        <div class="page-header-image" data-parallax="true" style="background-image: url('./assets/img/dj-man-music-1649691.jpg');">
        </div>
        <div class="content-center">
            <div class="container">
                Hallo <?php echo htmlentities($user['prename']); ?>,<br>
                <h1 class="title text-danger">Artists Cart </h1>
                <br>
                <h3 class="text-danger">One step closer to achieving your fame.</h3>

            </div>
        </div>
    </div>
    <a id="mission"></a>
    <div class="section section-about-us">
        <div class="container">
            <div class="row">


            </div>
            <div class="separator separator-primary"></div>
            <div class="section-story-overview">
                <div class="row">

                    <div class="site-section">
                        <div class="container container-shopping">
                            <div class="card shopping-cart">
                                <div class="card-header bg-g text-light">
                                    <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                                    Shopping cart
                                    <div class="clearfix"></div>
                                </div>
                                <div class="card-body">
                                    <!-- PRODUCT -->
                                    <div class="row">



                                    </div>
                                    <hr>
                                    <!-- END PRODUCT -->

                                </div>
                                <div class="card-footer">

                                    <div class="col-md-5 mb-3">
                                        <label class="text-black h4" for="coupon">Coupon</label>
                                        <p>Enter your coupon code if you have one. For your first purpchase, use copoun coude "STEINEDER19" for 90% OFF! </p>
                                    </div>
                                    <div class="col-md-5 mb-3 mb-md-0">
                                        <input type="text" class="form-control py-3" id="coupon" placeholder="Coupon Code">
                                    </div>
                                    <div class="col-md-5">
                                        <button class="btn btn-danger btn-sm">Apply Coupon</button>
                                    </div>

                                    <div class="send-button">
                                        <a href="welcome-user.html" class="btn btn-outline-primary btn-sm btn-block">Continue shopping</a>
                                    </div>

                                    <div class="pull-right" style="margin: 10px">
                                        <a href="" class="btn btn-success pull-right btn-checkout">Checkout</a>
                                        <div class="pull-right" style="margin: 5px">
                                            Total price: <b>50.00€</b>
                                        </div>
                                    </div>
                                    <div id='myMap' style="position:relative; width:400px; height:400px;"></div>
                                </div>
                            </div>
                        </div>
                        <div class="container">
                            <div class="row mb-4">
                                <form class="col-md-12" method="post">
                                    <div class="site-blocks-table">
                                        <div class="">

                                        </div>

                                    </div>
                                </form>
                            </div>

                            <div class="row">
                                <div class="col-md-6">

                                    <div class="row">

                                    </div>
                                </div>
                                <div class="col-md-6 pl-5">
                                    <div class="row justify-content-end">
                                        <div class="col-md-7">



                                            <div class="row">
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
    </div>







    <!--<div class="section section-team text-center">
      <div class="container">
        <h2 class="title">Here is our team</h2>
        <div class="team">
          <div class="row">
            <div class="col-md-4">
              <div class="team-player">
                <img src="./assets/img/avatar.jpg" alt="Thumbnail Image" class="rounded-circle img-fluid img-raised">
                <h4 class="title">Romina Hadid</h4>
                <p class="category text-primary">Model</p>
                <p class="description">You can write here details about one of your team members. You can give more details about what they do. Feel free to add some
                  <a href="#">links</a> for people to be able to follow them outside the site.</p>
                <a href="#" class="btn btn-primary btn-icon btn-round"><i class="fab fa-twitter"></i></a>
                <a href="#" class="btn btn-primary btn-icon btn-round"><i class="fab fa-instagram"></i></a>
                <a href="#" class="btn btn-primary btn-icon btn-round"><i class="fab fa-facebook-square"></i></a>
              </div>
            </div>
            <div class="col-md-4">
              <div class="team-player">
                <img src="./assets/img/ryan.jpg" alt="Thumbnail Image" class="rounded-circle img-fluid img-raised">
                <h4 class="title">Ryan Tompson</h4>
                <p class="category text-primary">Designer</p>
                <p class="description">You can write here details about one of your team members. You can give more details about what they do. Feel free to add some
                  <a href="#">links</a> for people to be able to follow them outside the site.</p>
                <a href="#" class="btn btn-primary btn-icon btn-round"><i class="fab fa-twitter"></i></a>
                <a href="#" class="btn btn-primary btn-icon btn-round"><i class="fab fa-linkedin"></i></a>
              </div>
            </div>
            <div class="col-md-4">
              <div class="team-player">
                <img src="./assets/img/eva.jpg" alt="Thumbnail Image" class="rounded-circle img-fluid img-raised">
                <h4 class="title">Eva Jenner</h4>
                <p class="category text-primary">Fashion</p>
                <p class="description">You can write here details about one of your team members. You can give more details about what they do. Feel free to add some
                  <a href="#">links</a> for people to be able to follow them outside the site.</p>
                <a href="#" class="btn btn-primary btn-icon btn-round"><i class="fab fa-google-plus"></i></a>
                <a href="#" class="btn btn-primary btn-icon btn-round"><i class="fab fa-youtube"></i></a>
                <a href="#" class="btn btn-primary btn-icon btn-round"><i class="fab fa-twitter"></i></a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div> -->

    <div class="section section-contact-us text-center">
        <div class="container">
            <a id="contactus"></a>
            <h2 class="title">Have you got any further questions?</h2>
            <p class="description">Our active workers will try their best to fulfil your wishes!</p>
            <div class="row">
                <div class="col-lg-6 text-center col-md-8 ml-auto mr-auto">
                    <div class="input-group input-lg">
                        <div class="input-group-prepend">
                <span class="input-group-text">
                  <i class="now-ui-icons users_circle-08"></i>
                </span>
                        </div>
                        <input type="text" class="form-control" placeholder="First Name...">
                    </div>
                    <div class="input-group input-lg">
                        <div class="input-group-prepend">
                <span class="input-group-text">
                  <i class="now-ui-icons ui-1_email-85"></i>
                </span>
                        </div>
                        <input type="text" class="form-control" placeholder="Email...">
                    </div>
                    <div class="textarea-container">
                        <textarea class="form-control" name="name" rows="4" cols="80" placeholder="Type a message..."></textarea>
                    </div>
                    <div class="send-button">
                        <a href="#" class="btn btn-primary btn-round btn-block btn-lg">Send Message</a>
                    </div>
                    <h3 style="margin-top: 40px">If you want a quicker answer, please contact us via:</h3>
                    <p style="margin: 0px">Telephone: 06 1 6999999999 </p>
                    <P style="margin: 0px">Mobile: 0 676 89985948598</P>
                    <p style="margin: 0px">E-Mail: vision@av.com</p>
                </div>
            </div>
        </div>
    </div>
    <footer class="footer footer-default">
        <div class="container">
            <nav>
                <ul>
                    <li>
                        <a href="#">
                            Get Congruent!
                        </a>
                    </li>

                </ul>
            </nav>
            <div class="copyright" id="copyright">
                &copy;
                <script>
                    document.getElementById('copyright').appendChild(document.createTextNode(new Date().getFullYear()))
                </script>, Designed by
                <a href="#" target="_blank">Steineder</a>. Made possible by
                <a href="#" target="_blank">X Team</a>.
            </div>
        </div>
    </footer>
</div>
<!--   Core JS Files   -->
<script src="./assets/js/core/jquery.min.js" type="text/javascript"></script>
<script src="./assets/js/core/popper.min.js" type="text/javascript"></script>
<script src="./assets/js/core/bootstrap.min.js" type="text/javascript"></script>
<!--  Plugin for Switches, full documentation here: http://www.jque.re/plugins/version3/bootstrap.switch/ -->
<script src="./assets/js/plugins/bootstrap-switch.js"></script>
<!--  Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
<script src="./assets/js/plugins/nouislider.min.js" type="text/javascript"></script>
<!--  Plugin for the DatePicker, full documentation here: https://github.com/uxsolutions/bootstrap-datepicker -->
<script src="./assets/js/plugins/bootstrap-datepicker.js" type="text/javascript"></script>
<!--  Google Maps Plugin    -->
<!--<script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>-->
<!-- Control Center for Now Ui Kit: parallax effects, scripts for the example pages etc -->
<script src="./assets/js/now-ui-kit.js?v=1.2.0" type="text/javascript"></script>
</body>

</html>
