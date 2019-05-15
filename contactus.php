<?php
// Doesnt work yet, I'm not sure if it will work correctly within our localhost environment
// I'll leave it for now and attend to more pressing matters
/*
Authors: Alex
*/


$to      = 'alexander.hofmueller@stud.fh-campuswien.ac.at';
$subject = 'the subject';
$message = 'hello';
$headers = 'From: webmaster@example.com' . "\r\n" .
    'Reply-To: webmaster@example.com' . "\r\n" .
    'X-Mailer: PHP/' . phpversion();

mail($to, $subject, $message, $headers);







/*
$fname = trim($_POST['First Name']);
$Email = trim($_POST['email']);
$phone = trim($_POST['phone']);
$message = trim($_POST['Message']);

$empfaenger = 'alexander.hofmueller@stud.fh-campuswien.ac.at';

$headers = "'From ' => $Email,
    'Reply-To' => 'alexander.hofmueller@stud.fh-campuswien.ac.at',
    'PHONE '   => $phone
);
mail($empfaenger, $fname, $message, $header);
    echo 'We will work on your congruency.';
    header("Location: #faq");// Page needed!

*/

/*
<?php
$to      = 'nobody@example.com';
$subject = 'the subject';
$message = 'hello';
$headers = 'From: webmaster@example.com' . "\r\n" .
    'Reply-To: webmaster@example.com' . "\r\n" .
    'X-Mailer: PHP/' . phpversion();

mail($to, $subject, $message, $headers);
?>
 */

?>