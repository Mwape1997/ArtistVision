<?php
/*
Authors: Alex
*/
session_start();
require_once("inc/config.inc.php");
require_once("inc/functions.inc.php");
$error =false;
$error_msg = "";



if(isset($_POST['email']) && isset($_POST['password'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $statement = $pdo->prepare("SELECT * FROM userlist WHERE email = :email");
    $result = $statement->execute(array('email' => $email));
    $user = $statement->fetch();

    //Überprüfung des Passworts
    if ($user !== false && password_verify($password, $user['password'])) {
        $_SESSION['userid'] = $user['id'];

        //Möchte der Nutzer angemeldet beleiben?
        if(isset($_POST['remember-me'])) {
            $identifier = random_string();
            $securitytoken = random_string();

            $insert = $pdo->prepare("INSERT INTO securitytokens (user_id, identifier, securitytoken) VALUES (:user_id, :identifier, :securitytoken)");
            $insert->execute(array('user_id' => $user['id'], 'identifier' => $identifier, 'securitytoken' => sha1($securitytoken)));
            setcookie("identifier",$identifier,time()+(3600*24*365)); //Valid for 1 year
            setcookie("securitytoken",$securitytoken,time()+(3600*24*365)); //Valid for 1 year
        }

        header("location: welcome-user.php");
        exit;
    } else {
        $error_msg =  "E-Mail oder Passwort war ungültig<br><br>";
    }

}

$email_value = "";
if(isset($_POST['email']))
    $email_value = htmlentities($_POST['email']);

?>
<form action="login-user.php" method="post"><?php
    if(isset($error_msg) && !empty($error_msg)) {
        echo $error_msg;
    }
    ?>




    <!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="./assets/img/Sound Perception.png">
  <link rel="icon" type="image/png" href="./assets/img/Sound Perception.png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
    Clients Logins
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
  <script src="formData.js" async></script>
</head>

<body class="login-page sidebar-collapse">
<!-- Navbar -->
<nav class="navbar navbar-expand-lg bg-primary fixed-top navbar-transparent " color-on-scroll="400">
  <div class="container">
    <!-- <div class="dropdown button-dropdown">
       <a href="#" class="dropdown-toggle" id="navbarDropdown" data-toggle="dropdown">
         <span class="button-bar"></span>
         <span class="button-bar"></span>
         <span class="button-bar"></span>
       </a>
       <div class="dropdown-menu" aria-labelledby="navbarDropdown">
         <a class="dropdown-header">Dropdown header</a>
         <a class="dropdown-item" href="#">Action</a>
         <a class="dropdown-item" href="#">Another action</a>
         <a class="dropdown-item" href="#">Something else here</a>
         <div class="dropdown-divider"></div>
         <a class="dropdown-item" href="#">Separated link</a>
         <div class="dropdown-divider"></div>
         <a class="dropdown-item" href="#">One more separated link</a>
       </div>
     </div>-->
    <!-- <div class="navbar-translate">
       <a class="navbar-brand" href="https://demos.creative-tim.com/now-ui-kit/index.html" rel="tooltip" title="Designed by Invision. Coded by Creative Tim" data-placement="bottom" target="_blank">
         Now Ui Kit
       </a>
       <button class="navbar-toggler navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
         <span class="navbar-toggler-bar top-bar"></span>
         <span class="navbar-toggler-bar middle-bar"></span>
         <span class="navbar-toggler-bar bottom-bar"></span>
       </button>
     </div> -->
    <div class="collapse navbar-collapse justify-content-end" id="navigation" data-nav-image="./assets/img/blurred-image-1.jpg">
      <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" href="./index.html">Home</a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="./register.html">Register</a>
        </li>
<!--
        <li class="nav-item">
          <a class="nav-link" href="./registerartist.html">Become an artist!</a>
        </li> -->
<!--
        <li class="nav-item">
          <a class="nav-link" href="#">Shopping Cart</a>
        </li>
-->

      </ul>
    </div>
  </div>
</nav>
<!-- End Navbar -->
<div class="page-header clear-filter" filter-color="orange">
  <div class="page-header-image" style="background-image:url(./assets/img/band-bokeh-close-up-144428.jpg)"></div>
  <div class="content">
    <div class="container">
      <div class="col-md-4 ml-auto mr-auto">
        <div class="card card-login card-plain">


          <form class="form" method="post" action="login.php">
            <div class="card-header text-center">
              <div class="logo-container">
              <!--  <img src="./assets/img/58482acecef1014c0b5e4a1e.png" alt=""> -->
              </div>
            </div>
            <div class="card-body">
              <div class="input-group no-border input-lg">
                <div class="input-group-prepend">
                    <span class="input-group-text">
                      <i class="now-ui-icons users_circle-08"></i>
                    </span>
                </div>
                <input type="text" class="form-control" placeholder="Username" name="email" value="<?php echo $email_value; ?>">
              </div>
              <div class="input-group no-border input-lg">
                <div class="input-group-prepend">
                    <span class="input-group-text">
                      <i class="now-ui-icons text_caps-small"></i>
                    </span>
                </div>
                <input type="password" placeholder="Password" class="form-control" name="password" />
              </div>
              <div class="checkbox">
                <label>
                  <input type="checkbox" value="remember-me" name="remember-me" value="1" checked> Stay logged in
                </label>
              </div>
            </div>

            <div class="card-footer text-center">

              <button class="btn btn-lg btn-primary btn-block" type="submit">Login</button>
              <div class="pull-left">
                <h6>
                  <a href="register.html" class="link">Don't have an account?</a>
                </h6>
              </div>
              <div class="pull-right">
                <h6>
                  <a href="index.html#faq" class="link">Need Help?</a>
                </h6>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
<footer class="footer">
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
      <a href="https://www.invisionapp.com" target="_blank">Steineder</a>. Made possible by
      <a href="https://www.creative-tim.com" target="_blank">X Team</a>.
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
