<?php
/*
Authors: Alex
*/
session_start(); //Session for opening Database
require_once("inc/config.inc.php");
require_once("inc/functions.inc.php");
$error = false;

    $prename = trim($_POST['prename']);
    $lastname = trim($_POST['lastname']);
    $email = trim($_POST['email']);
    $emailconfirm = trim($_POST['emailconfirm']);
    $password = $_POST['password'];


    if(empty($prename) || empty($lastname) || empty($email)) {
        echo 'Please fill out all values to get congruent<br>';
        $error = true;
    }

    if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo 'Please fill out all Values to get congruent a looking for mail<br>';
        $error = true;
    }
    if(strlen($password) == 0) {
        echo 'Please fill out all Values to get congruent b looking for password<br>';
        $error = true;
    }
    if($email != $emailconfirm) {
        echo 'You need congruent mailing-addresses<br>';
        $error = true;
    }

    //Überprüfe, dass die E-Mail-Adresse noch nicht registriert wurde
    if(!$error) {
        $statement = $pdo->prepare("SELECT * FROM userlist WHERE email = :email");
        $result = $statement->execute(array('email' => $email));
        $user = $statement->fetch();

        if($user !== false) {
            echo 'Some other guy is already getting congruent with this mail-address<br>';
            $error = true;
        }
    }

    //Keine Fehler, wir können den Nutzer registrieren
    if(!$error) {
        $password_hash = password_hash($password, PASSWORD_DEFAULT);

        $statement = $pdo->prepare("INSERT INTO userlist (email, password, prename, lastname) VALUES (:email, :password, :prename, :lastname)");
        $result = $statement->execute(array('email' => $email, 'password' => $password_hash, 'prename' => $prename, 'lastname' => $lastname));

        if($result) {
            echo 'Now you can expect a lot of congruency.';
            header("Location: login-page.html");// Page needed!
            exit;

        } else {
            echo 'There has been a mistake you cannot get congruent<br>';
        }
    }

?>

