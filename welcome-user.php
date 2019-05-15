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
if(!isset($_SESSION['cart'])){
    $_SESSION['cart'] = array();
}

//unset qunatity
unset($_SESSION['qty_array']);

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
    <script src="cartv2.js" async></script>
</head>

<body class="landing-page sidebar-collapse">
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
                    <a class="nav-link" href="./logout.php">Logout</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="./view_cart.php">Shopping cart</a>
                </li>

                <!-- <li class="nav-item">
                   <a class="nav-link" href="./cart.html">Shopping Cart</a>
                 </li> -->



                <!--<li class="nav-item">
                  <a class="nav-link" href="https://github.com/creativetimofficial/now-ui-kit/issues">Have an issue?</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" rel="tooltip" title="Follow us on Twitter" data-placement="bottom" href="https://twitter.com/CreativeTim" target="_blank">
                    <i class="fab fa-twitter"></i>
                    <p class="d-lg-none d-xl-none">Twitter</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" rel="tooltip" title="Like us on Facebook" data-placement="bottom" href="https://www.facebook.com/CreativeTim" target="_blank">
                    <i class="fab fa-facebook-square"></i>
                    <p class="d-lg-none d-xl-none">Facebook</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" rel="tooltip" title="Follow us on Instagram" data-placement="bottom" href="https://www.instagram.com/CreativeTimOfficial" target="_blank">
                    <i class="fab fa-instagram"></i>
                    <p class="d-lg-none d-xl-none">Instagram</p>
                  </a>
                </li>-->
            </ul>
        </div>
    </div>
</nav>
<!-- End Navbar -->
<div class="wrapper">
    <div class="page-header clear-filter">
        <div class="page-header-image" data-parallax="true" style="background-image: url('./assets/img/concert-lights-music-1370545.jpg');">
        </div>
        <div class="content-center">
            <div class="container">
                <h4 class="title text-warning">Welcome, <?php echo htmlentities($user['prename']); ?>!</h4>
                <h1 class="title text-warning">Create Your Band!</h1>
                <br>
                <!--<h3 class="text-white">Your Band. Your Vision.</h3>-->

            </div>
        </div>
    </div>
    <div class="separator separator-primary"></div>

</div>
<a id="mission"></a>
<div class="section section-about-us">
    <div class="container">
        <div class="row">
            <div class="col-md-8 ml-auto mr-auto text-center">

                    <a id="ourartists"></a>
                    <h2 class="title">Currently Available Artists!</h2>
                    <br><br><br><br>

                    <div class="row">

                        <?php
                        //info message

                        //end info message
                        //fetch our products
                        //connection
                        $conn = new mysqli('localhost', 'root', '', 'artists_vision');

                        $sql = "SELECT * FROM products";
                        $query = $conn->query($sql);
                        $inc = 4;
                        while($row = $query->fetch_assoc()){
                            $inc = ($inc == 4) ? 1 : $inc + 1;
                            if($inc == 1) echo "<div class='row text-center'>";
                            ?>
                            <div class="row-12" id="buy">
                                <div class="container">
                                    <div class="container-fluid">
                                        <div class="row product_image">
                                            <img src="<?php echo $row['photo'] ?>" class="img-fluid rounded-circle ratyikep" ">
                                        </div>
                                        <div class="row product_name">
                                            <h4><?php echo $row['name']; ?></h4>
                                        </div>
                                        <div class="row product_footer">
                                            <span class="pull-right"><a href="add_cart.php?id=<?php echo $row['id']; ?>" class="btn btn-warning btn-block btn-round btn-lg"><span class="glyphicon glyphicon-plus"></span> Add to Cart</a></span>
                                        </div>
                                        <br> <span class="pull-left"><b> Price Per Hour: <?php echo $row['price']; ?> Eur</b></span>
                                    </div>
                                </div>
                            </div>
                            <?php
                        }
                        if($inc == 1) echo "<div></div><div></div><div></div></div>";
                        if($inc == 2) echo "<div></div><div></div></div>";
                        if($inc == 3) echo "<div></div></div>";

                        //end product row
                        ?>
                        </div>
                    </div>

            <div class="separator separator-primary"></div>


                <br><br><br>
                <h2 class="title text-capitalize text-center"> Our Secret upcoming artist!</h2>

                <div class="row">
                    <div class="offset-md-1 col-md-4">
                        <img class="rounded-circle ratyikep" src="assets/img/taufner.jpg" alt=""><br/>
                        <div class="send-button">
                            <a href="view_cart.php#" class="btn btn-warning btn-round btn-block btn-lg add-to-cart disabled">Add to cart</a>
                        </div>

                    </div>
                    <div class="offset-md-2 col-md-4">
                        <br/><p>Name: MC Taufner<br/>Alias: Round Robin</br>Age: 23 <br/>Location: Austria<br/>Skills:<br/> Multiple Choice<br/>
                            <strong>Cost per playing hour:<br/>1 000 000 000€</strong></p> <br/>

                    </div>
                </div>






                </div>

            </div>
        </div>
    </div>

</div>
<div class="section section-basic text-center">
    <div class="col-md-5">
        <!-- First image on the right side, above the article -->
        <div class="image-container image-right" style="background-image: url('./assets/img/concert-lights-music-1370545.jpg')"></div>
    </div>
    <div class="container">

        <div class="col-sm-12">
            <h2 id="faq">FAQ</h2>
            <h3>We answer the most frequently asked questions!</h3>
            <button class="accordion">1. How can I order an artist for my party?</button>
            <div class="panel">
                <p>After you have registered to our website, log in and find yourself an artist and if available, click on "order</p>
            </div>

            <button class="accordion">2. Can I become an artist on this page?</button>
            <div class="panel">
                <p>Of course you can. Register yourself as an artist by choosing "I am an artist" on the registration page!.</p>
            </div>

            <button class="accordion">3. Do I have to pay for offering my services as an artist on this page?</button>
            <div class="panel">
                <p>No, absolutely not..</p>
            </div>
            <button class="accordion">4. Is Artists Vision the best website on the WWW of this format?</button>
            <div class="panel">
                <p>Regarding the other websites of this kind, we are the one with the most artists and activity.</p>
            </div>
            <script>
                var acc = document.getElementsByClassName("accordion");


                for (i = 0; i < acc.length; i++) {
                    acc[i].addEventListener("click", function() {
                        this.classList.toggle("active");
                        var panel = this.nextElementSibling;
                        if (panel.style.maxHeight){
                            panel.style.maxHeight = null;
                        } else {
                            panel.style.maxHeight = panel.scrollHeight + "px";
                        }
                    });
                }
            </script>
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
    <form class="form" method="post" action="contactus.php">
        <div class="container">

            <a id="contactus"></a>
            <h2 class="title">Have you got any further questions?</h2>
            <p class="description" style="text-align: center">Our active workers will try their best to fulfil your wishes!</p>
            <div class="row">
                <div class="col-lg-6 text-center col-md-8 ml-auto mr-auto">
                    <div class="input-group input-lg">
                        <div class="input-group-prepend">
                <span class="input-group-text">
                  <!--<i class="now-ui-icons users_circle-08"></i>-->
                  <i class="fa fa-user"></i>
                </span>
                        </div>
                        <input type="text" class="form-control" placeholder="First Name..." required id="fname">
                    </div>
                    <div class="input-group input-lg">
                        <div class="input-group-prepend">
                <span class="input-group-text">
                 <!-- <i class="now-ui-icons ui-1_email-85"></i>-->
                    <i class="fa fa-envelope"></i>
                </span>
                        </div>
                        <input type="text" class="form-control" placeholder="Email..." required id="Email">
                    </div>
                    <div class="input-group input-lg">
                        <div class="input-group-prepend">
                <span class="input-group-text">
                 <!-- <i class="now-ui-icons ui-1_email-85"></i>-->
                  <i class="fa fa-phone"></i>

                </span>
                        </div>
                        <input type="text" class="form-control" placeholder="phone number..."required id="phone">
                    </div>
                    <div class="textarea-container">
                        <textarea class="form-control" name="name" rows="4" cols="100" placeholder="Type a message..." id="message"></textarea>
                    </div>
                    <div class="send-button" id="sendbutton">

                        <a href="#" class="btn btn-primary btn-round btn-block btn-lg">Send Message</a>

                    </div>

                    <h3 style="margin-top: 40px">If you want a quicker answer, please contact us via:</h3>
                    <address>
                        <p style="margin: 0px;text-align: center">Telephone: 06 1 6999999999 </p>
                        <P style="margin: 0px;text-align: center">Mobile: 0 676 89985948598</P>
                        <p style="margin: 0px;text-align: center">E-Mail: vision@av.com</p>
                    </address>
                </div>
            </div>

        </div>
    </form>
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
<script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
<!-- Control Center for Now Ui Kit: parallax effects, scripts for the example pages etc -->
<script src="./assets/js/now-ui-kit.js?v=1.2.0" type="text/javascript"></script>
</body>

</html>
