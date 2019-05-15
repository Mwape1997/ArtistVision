<?php
/*
Authors: Alex
*/
session_start(); //Session for opening Database
require_once("inc/config.inc.artistlist.php");
require_once("inc/functions.inc.php");


    $error = false;
    $email = trim($_POST['email']);
    $emailconfirm = trim($_POST['emailconfirm']);
    $password = $_POST['password'];
    $firstname = trim($_POST['firstname']);
    $lastname = trim($_POST['lastname']);
    $alias = trim($_POST['alias']);
    $nationality = trim($_POST['nationality']);
    $dateofbirth = trim($_POST['dateofbirth']);
    $placeofbirth = trim($POST['placeofbirth']);
    $city = trim($POST['city']);
    $state = trim($POST['state']);
    $country = trim($POST['country']);
    $skill = trim($POST['skill']);
    $costperhour = 50; // fixed value for now
    $blah = trim($POST['blah']);
    $cv = trim($POST['cv']);




    // missing check for:
    // Picture maybe picture will create troubles
    // also keep in mind the data format

    if(empty($firstname) || empty($lastname) || empty($email) || empty($alias) || empty($nationality) || empty($city) || empty($state) || empty($country) || empty($skill) || empty($cv)){
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
    // MAYBE dont do that
/*
    if($email != $emailconfirm) {
        echo 'You need congruent mailing-addresses<br>';
        $error = true;
    }
*/
    //Überprüfe, dass die E-Mail-Adresse noch nicht registriert wurde
    if(!$error) {
        $statement = $pdo->prepare("SELECT * FROM artistlist WHERE email = :email");
        $result = $statement->execute(array('email' => $email));
        $user = $statement->fetch();

        if($user !== false) {
            echo 'Some other guy is already getting congruent with this mail-address<br>';
            $error = true;
        }
    }

    // blah is the id of Picture



    //Keine Fehler, wir können den Artist registrieren
    if(!$error) {
        $password_hash = password_hash($password, PASSWORD_DEFAULT);

        $statement = $pdo->prepare("INSERT INTO artistlist (email, password, firstname, lastname, alias, nationality, dateofbirth, placeofbirth, city, state, country, skill, costperhour, picture, cv) VALUES (:email, :password, :firstname, :lastname, :alias, :nationality, :dateofbirth, :placeofbirth, :city, :state, :country, :skill, :costperhour, :blah, :cv");
        $result = $statement->execute(array('email' => $email, 'password' => $password_hash, 'firstname' => $firstname, 'lastname' => $lastname, 'alias' => $alias, 'nationality' => $nationality, 'dateofbirth' => $dateofbirth, 'placeofbirth' => $placeofbirth, 'city' => $city, 'state' => $state, 'country' => $country, 'skill' => $skill, 'costperhour' => $costperhour, 'picture' => $blah, 'cv' => $cv));

        if($result) {
            echo 'Now you can expect a lot of congruency.';
            header("Location: index.html");// Page needed!
            exit;

        } else {
            echo 'There has been a mistake you cannot get congruent<br>';
        }
    }

?>

