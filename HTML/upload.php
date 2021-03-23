<?php
  $msg = "";  
//if upload button is pressed
if (isset($_POST['upload'])) {
	//the path to store the uploaded image
	$target = "images/".basename($_FILES['image']['name']);

	//connect to the database
	$db = mysqli_connect("localhost", "root", "", "test");

	//Get all the submitted data from the form
	$image = $_FILES['image']['name'];
	$title = $_POST['title'];

	$sql = "INSERT INTO images (image, title) VALUES ('$image', '$title')";
	mysqli_query($db, $sql); //store the submitted data into the database table: images

	//Now let's move the uploaded image into the folder: images
	if (move_uploaded_file($_FILES['image']['tmp_name'],$target)) {
		$msg = "image uploaded successfully";
	} else {
		$msg = "There was a problem uploading image";
	}
}
?>