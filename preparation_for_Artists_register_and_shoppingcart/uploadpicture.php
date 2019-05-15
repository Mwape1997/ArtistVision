<?php
    require_once "db.php";

    // Figure out how id will be passed to the next query
    $sql = "SELECT id, imageType, imageData, age, city, nationality, password, email FROM artistlist_test WHERE ID = 5";
    $result = mysqli_query($conn, $sql);



if(count($_FILES) > 0) {
if(is_uploaded_file($_FILES['userImage']['tmp_name'])) {
    require_once "db.php";
    $imgData =addslashes(file_get_contents($_FILES['userImage']['tmp_name']));
	$imageProperties = getimageSize($_FILES['userImage']['tmp_name']);

	
	$sql = "UPDATE artistlist_test SET imageType='{$imageProperties['mime']}', imageData='{$imgData}' WHERE id=5";

/*
    $sql_data = "INSERT INTO artistlist(alias)
    VALUES ('$alias')";
    // use exec() because no results are returned

    mysqli_query($conn, $sql_data) or die("<b>Error:</b> Problem on Image Insert<br/>" . mysqli_error($conn));
    echo "New record created successfully";

*/
}

if ($conn->query($sql) === TRUE) {
    echo "Record updated successfully";
} else {
    echo "Error updating record: " . $conn->error;
}

$conn->close();



	if(isset($current_id)) {
		header("Location: listImages.php");
	}
}
?>
<HTML>
<HEAD>
<TITLE>Upload Image to MySQL BLOB</TITLE>
<link href="imageStyles.css" rel="stylesheet" type="text/css" />
</HEAD>
<BODY>
<form name="frmImage" enctype="multipart/form-data" action="" method="post" class="frmImageUpload">
<label>Upload Image File:</label><br/><br/>
<input name="userImage" type="file" class="inputFile" />
<input type="submit" value="register" class="btnSubmit" />
</form>
</div>
</BODY>
</HTML>