<?php
    require_once "db.php";
    $sql = "SELECT imageId, alias, age, city, nationality, password, email FROM artistlist_test ORDER BY imageId DESC";
    $result = mysqli_query($conn, $sql);
?>
<HTML>
<HEAD>
<TITLE>List Artist Images</TITLE>
<link href="imageStyles.css" rel="stylesheet" type="text/css" />
</HEAD>
<BODY>
<?php
	while($row = mysqli_fetch_array($result)) {
	?>
		<img src="imageView.php?image_id=<?php echo $row["imageId"]; ?>" /><br/>
        <p><?php echo $row["alias"]; ?> </p>
        <p><?php echo $row["age"]; ?> </p>
        <p><?php echo $row["city"]; ?> </p>
        <p><?php echo $row["nationality"]; ?> </p>
        <p><?php echo $row["password"]; ?> </p>
        <p><?php echo $row["email"]; ?> </p>

<?php
	}
    mysqli_close($conn);
?>
</BODY>
</HTML>