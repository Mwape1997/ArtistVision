<?php
if(count($_FILES) > 0) {
if(is_uploaded_file($_FILES['userImage']['tmp_name'])) {
    require_once "db.php";
    $imgData =addslashes(file_get_contents($_FILES['userImage']['tmp_name']));
	$imageProperties = getimageSize($_FILES['userImage']['tmp_name']);
    $alias = trim($_POST['alias']);
    $age = trim($_POST['age']);
    $email = trim($_POST['email']);
    $password = $_POST['password'];

	
	$sql = "INSERT INTO artistlist_test (imageType ,imageData, alias, age, email, password)
	VALUES('{$imageProperties['mime']}', '{$imgData}','$alias','$age','$email','$password')";

/*
    $sql_data = "INSERT INTO artistlist(alias)
    VALUES ('$alias')";
    // use exec() because no results are returned

    mysqli_query($conn, $sql_data) or die("<b>Error:</b> Problem on Image Insert<br/>" . mysqli_error($conn));
    echo "New record created successfully";
*/
	$current_id = mysqli_query($conn, $sql) or die("<b>Error:</b> Problem on Image Insert<br/>" . mysqli_error($conn));


	if(isset($current_id)) {
		header("Location: listImages.php");
	}
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
    <label for="email"><b>Email</b></label>
    <input type="text" placeholder="Enter Email" name="email" required>
    <br/><label for="psw"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="password" required>
    <br/><label for="alias"><b>Alias</b></label>
    <input type="text" placeholder="Enter Alias" name="alias" required>
    <br/><label for="age"><b>Age</b></label>
    <input type="text" placeholder="Enter Age" name="age" required>
<input name="userImage" type="file" class="inputFile" />
<input type="submit" value="register" class="btnSubmit" />
</form>
</div>
</BODY>
</HTML>