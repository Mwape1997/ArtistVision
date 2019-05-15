<?php
/*
Authors: Alex
*/
//session_start();
require_once("inc/config.inc.php"); // Connect to database
require_once("inc/functions.inc.php");
$error =false;
$error_msg = "";

$email = trim($_POST['email']);
$password = $_POST['password'];

if(empty($email) || empty($password)) {
    echo 'Please fill out all values to get congruent<br>';
    $error = true;
}

if(!$error) {
    $statement = $pdo->prepare("SELECT * FROM userlist WHERE email = :email");
    $result = $statement->execute(array('email' => $email));
    $user = $statement->fetch();

if ($user !== false && password_verify($password, $user['password'])) {
        echo 'Now you can expect a lot of congruency.';
         header("Location: welcome-user.html");// Page needed!
        exit;

// todo Sessions - remember me Possible Addon for later Versions
//Möchte der Nutzer angemeldet beleiben?
   /* if(isset($_POST['remember-me'])) {
        $identifier = random_string();
        $securitytoken = random_string();

        $insert = $pdo->prepare("INSERT INTO securitytokens (user_id, identifier, securitytoken) VALUES (:user_id, :identifier, :securitytoken)");
        $insert->execute(array('user_id' => $user['id'], 'identifier' => $identifier, 'securitytoken' => sha1($securitytoken)));
        setcookie("identifier",$identifier,time()+(3600*24*365)); //Valid for 1 year
        setcookie("securitytoken",$securitytoken,time()+(3600*24*365)); //Valid for 1 year
    }
*/
    } else {
        $error_msg =  "check for email or password<br><br>";
    }
}
if(isset($error_msg) && !empty($error_msg)) {
    echo $error_msg;
}

?>