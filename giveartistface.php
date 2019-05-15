<?php
/*
Authors: Alex
*/
require_once ("inc/db.php");
//TODO get this into the internal Area of Artists - with it artist can set his picture.
// Figure out how id will be passed to the next query - maybe just move it to login area of artists.
$sql = "SELECT imageid, imageType, imageData FROM artistlist_test WHERE imageID = 17"; // Changes matching IDs Picture
$result = mysqli_query($conn, $sql);

if(count($_FILES) > 0) {
    if(is_uploaded_file($_FILES['userImage']['tmp_name'])) {
        require_once ("inc/db.php");
        $imgData =addslashes(file_get_contents($_FILES['userImage']['tmp_name']));
        $imageProperties = getimageSize($_FILES['userImage']['tmp_name']);
        $sql = "UPDATE artistlist_test SET imageType='{$imageProperties['mime']}', imageData='{$imgData}' WHERE imageID=17";
    }

    if ($conn->query($sql) === TRUE) {
        echo "Record updated successfully";
    } else {
        echo "Error updating record: " . $conn->error;
    }

    $conn->close();

}