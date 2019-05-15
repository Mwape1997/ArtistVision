<!DOCTYPE html>
<html>
<head>
    <title> Table with database</title>
</head>
// First Connection to Artists for Testing
<body>
<table>
    <tr>
        <th>id</th>
        <th>email</th>
        <th>firstname</th>
        <th>lastname</th>
        <th>password</th>
        <th>priceperhour</th>

    </tr>
    <?php
    /*
Authors: Alex
*/

    $user ='root';
    $pass = '';
    $db = 'artistlist';
    $pdo = new PDO('mysql:host=localhost;dbname=artists_vision', $user, $pass) or die("Unable to connect");


    $sql = "SELECT id, email, firstname, lastname, password, costperhour FROM artistlist where 1";
    foreach ($pdo->query($sql) as $row) {
        echo "<tr><td>". $row["id"] ."</td><td>". $row["email"] ."</td><td>". $row["firstname"] ."</td><td>". $row["lastname"]."</td><td>". $row["password"]."</td><td>". $row["costperhour"]."</td></tr>";

      //  header('Content-Type: image/jpeg');
       // echo '.$firstname.'; echo '<br />';
       // echo $row[picture];
       //echo '<img src="'.$row["picture"].'" width="300" height="300" />';


       //echo '<img height="300" with= "300" src="data:image,base64,'.row["picture"]."";

        echo "Great Work";
    }
    echo"</table>"
    ?>





</body>




 