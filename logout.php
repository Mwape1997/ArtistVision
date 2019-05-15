<?php
/*
Authors: Alex
*/
session_start();
session_destroy();
unset($_SESSION['userid']);

//Remove Cookies
setcookie("identifier","",time()-(3600*24*365));
setcookie("securitytoken","",time()-(3600*24*365));

require_once("inc/config.inc.php");
require_once("inc/functions.inc.php");  // Doomed here due to the two different login areas

?>

    <div class="container main-container">
        Logout was successful <a href="login-user.php">Back to Login</a>.
    </div>
<?php
?>