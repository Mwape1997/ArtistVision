<?php
    require_once "db.php";
    if(isset($_GET['image_id'])) {
        $sql = "SELECT imageType,imageData,alias FROM artistlist_test WHERE imageId=" . $_GET['image_id'];
		$result = mysqli_query($conn, $sql) or die("<b>Error:</b> Problem on Retrieving Image BLOB<br/>" . mysqli_error($conn));
		$row = mysqli_fetch_array($result);
        //echo $row["alias"];
		header("Content-type: " . $row["imageType"]);
        echo $row["imageData"];

	}
	mysqli_close($conn);
?>