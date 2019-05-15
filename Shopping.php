<?php
/*
Deprecated
Authors: Mwape
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







                        <div class="container">
                            <div class="row">
                                <div class="col-lg-12 col-sm-12">
                                    <?php
                                    if(isset($_SESSION['message'])){
                                        ?>
                                        <div class="alert alert-info text-center">
                                            <?php echo $_SESSION['message']; ?>
                                        </div>
                                        <?php
                                        unset($_SESSION['message']);
                                    }

                                    ?>
                                    <form method="POST" action="save_cart.php">
                                        <table class="table table-bordered table-striped">
                                            <thead>
                                            <th></th>
                                            <th>Name</th>
                                            <th>Price</th>
                                            <th>hours</th>
                                            </thead>
                                            <tbody>
                                            <?php
                                            //initialize total
                                            $total = 0;
                                            if(!empty($_SESSION['cart'])){
                                                //connection
                                                $conn = new mysqli('localhost', 'root', '', 'artists_vision');
                                                //create array of initail qty which is 1
                                                $index = 0;
                                                if(!isset($_SESSION['qty_array'])){
                                                    $_SESSION['qty_array'] = array_fill(0, count($_SESSION['cart']), 1);
                                                }
                                                $sql = "SELECT * FROM products WHERE id IN (".implode(',',$_SESSION['cart']).")";
                                                $query = $conn->query($sql);
                                                while($row = $query->fetch_assoc()){
                                                    ?>
                                                    <tr>
                                                        <td>
                                                            <a href="delete_item.php?id=<?php echo $row['id']; ?>&index=<?php echo $index; ?>" class="btn btn-danger btn-round"><span class="fas fa-trash"></span></a>
                                                        </td>
                                                        <td><?php echo $row['name']; ?></td>
                                                        <td><?php echo number_format($row['price'], 2); ?></td>
                                                        <input type="hidden" name="indexes[]" value="<?php echo $index; ?>">
                                                        <td><input type="text" class="form-control" value="<?php echo $_SESSION['qty_array'][$index]; ?>" name="qty_<?php echo $index; ?>"></td>
                                                        <td><?php echo number_format($_SESSION['qty_array'][$index]*$row['price'], 2); ?></td>
                                                        <?php $total += $_SESSION['qty_array'][$index]*$row['price']; ?>
                                                    </tr>
                                                    <?php
                                                    $index ++;
                                                }
                                            }
                                            else{
                                                ?>
                                                <tr>
                                                    <td colspan="4" class="text-center">No Item in Cart</td>
                                                </tr>
                                                <?php
                                            }

                                            ?>
                                            <tr>
                                                <td colspan="4" align="right"><b>Total</b></td>
                                                <td><b><?php echo number_format($total, 2); ?></b></td>
                                            </tr>
                                            </tbody>
                                        </table>
                                        <a href="welcome-user.php" class="btn btn-dark btn-round"><span class="fas fa-arrow-left"></span> Back</a>
                                        <button type="submit" class="btn btn-success btn-round" name="save">Save Changes</button>
                                        <a href="clear_cart.php" class="btn btn-danger btn-round"><span class="fas fa-trash"></span> Clear Cart</a>
                                        <a href="checkout.php" class="btn btn-success btn-round"><span class="fas fa-check"></span> Checkout</a>
                                    </form>
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
