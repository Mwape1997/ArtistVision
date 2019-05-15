<?php
// Currently not in USE!
/*
 * Deprecated
Authors: Alex
*/
?>

<div class="container main-container">

    <h1>Herzlich Willkommen!</h1>

    Herzlich Willkommen im internen Bereich!<br><br>

    <div class="panel panel-default">

        <table class="table">
            <tr>
                <th>#</th>
                <th>Vorname</th>
                <th>Nachname</th>
            </tr>
            <?php


            $db_host = 'localhost';
            $db_name = 'artists_vision';
            $user ='root';
            $pass = '';
            $db = 'artistlist_test';
            $pdo = new PDO("mysql:host=$db_host;dbname=$db_name", $user, $pass) or die("Unable to connect");

            $statement = $pdo->prepare("SELECT * FROM artistlist_test ORDER BY id");
            $result = $statement->execute();
            $count = 1;
            while($row = $statement->fetch()) {
                echo "<tr>";
                echo "<td>".$count++."</td>";
                echo "<td>".$row['prename']."</td>";
                echo "<td>".$row['lastname']."</td>";
                echo "</tr>";
            }
            ?>
        </table>
    </div>


</div>
<?php

?>
