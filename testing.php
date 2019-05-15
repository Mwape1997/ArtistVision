<!DOCTYPE html>
<html>
<head>
    <title> Table with database</title>
</head>
// First Connecction to test for Testing
<body>
<table>
    <tr>
        <th>id</th>
        <th>name</th>
    </tr>
    <?php

    $user ='root';
    $pass = '';
    $db = 'test';
    $pdo = new PDO('mysql:host=localhost;dbname=test', $user, $pass) or die("Unable to connect");


    $sql = "SELECT id, name FROM `testing` WHERE 1";
    foreach ($pdo->query($sql) as $row) {
        echo "<tr><td>". $row["id"] ."</td><td>". $row["name"] ."</td></tr>";
        echo "Great Work";
    }
    echo"</table>"
    ?>





</body>




