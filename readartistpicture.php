<!DOCTYPE html>
<html>
<head>
    <title> Artists with pictures</title>
</head>
// First Connection to Artists for Testing
<body>

    <?php
    /*
Authors: Alex
*/

    $user ='root';
    $pass = '';
    $db = 'artistlist';
    $pdo = new PDO('mysql:host=localhost;dbname=artists_vision', $user, $pass) or die("Unable to connect");


    $sql = "SELECT id, picture FROM `artistlist` WHERE 1";
    foreach ($pdo->query($sql) as $row) {
       // echo '<img height="300" with= "300" src="data:image;base64, '.row["picture"].'">';

        echo '<img height= "300" width="300" src="data:image;base64,'.$row[1].'">';
       // echo "<tr><td><img src=\"data:artistlist/jpeg;base64,'base64_encode(.$row["picture"]).''\"/>;</tr></td>;"

       // <tr><td>". $row["firstname"] ."</td>
        

      //  header('Content-Type: image/jpeg');
       // echo '.$firstname.'; echo '<br />';
       // echo $row[picture];
       //echo '<img src="'.$row["picture"].'" width="300" height="300" />';


       //echo '<img height="300" with= "300" src="data:image,base64,'.row["picture"]."";

        echo "Great Work";
    }

    ?>





</body>




 