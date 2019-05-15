<?php
/**
 * A complete login script with registration and members area.
 *
 * @author: Nils Reimers / http://www.php-einfach.de/experte/php-codebeispiele/loginscript/
 * @license: GNU GPLv3
 */
 
//Tragt hier eure Verbindungsdaten zur Datenbank ein
$db_host = 'localhost';
$db_name = 'artists_vision';
$user ='root';
$pass = '';
$db = 'userlist';
$pdo = new PDO("mysql:host=$db_host;dbname=$db_name", $user, $pass) or die("Unable to connect");
