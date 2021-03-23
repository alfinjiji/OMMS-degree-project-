  <?php 
  // image 1 uploading 
   $image1 = $_FILES["image1"]["name"];
   $image2 =$_FILES["image2"]["name"];
   $image3 = $_FILES["image3"]["name"]; 
   $image4 =$_FILES["image4"]["name"];

  $target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["image1"]["name"]);
$uploadOk = 1;
$imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);

// Check if image file is a actual image or fake image
if (isset($_POST["upload"])) {

    if ($target_file == "uploads/") {
        $msg = "cannot be empty";
        $uploadOk = 0;
    } // Check if file already exists
    else if (file_exists($target_file)) {
        $msg = "Sorry, file already exists.";
        $uploadOk = 0;
    } // Check file size
    else if ($_FILES["image1"]["size"] > 5000000) {
        $msg = "Sorry, your file is too large.";
        $uploadOk = 0;
    } // Check if $uploadOk is set to 0 by an error
    else if ($uploadOk == 0) {
        $msg = "Sorry, your file was not uploaded.";

        // if everything is ok, try to upload file
    } else {
        if (move_uploaded_file($_FILES["image1"]["tmp_name"], $target_file)) {
            $msg = "The file " . basename($_FILES["image1"]["name"]) . " has been uploaded.";
        }
    }
}



// image2 upload
 $target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["image2"]["name"]);
$uploadOk = 1;
$imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);

// Check if image file is a actual image or fake image
if (isset($_POST["upload"])) {

    if ($target_file == "uploads/") {
        $msg = "cannot be empty";
        $uploadOk = 0;
    } // Check if file already exists
    else if (file_exists($target_file)) {
        $msg = "Sorry, file already exists.";
        $uploadOk = 0;
    } // Check file size
    else if ($_FILES["image2"]["size"] > 5000000) {
        $msg = "Sorry, your file is too large.";
        $uploadOk = 0;
    } // Check if $uploadOk is set to 0 by an error
    else if ($uploadOk == 0) {
        $msg = "Sorry, your file was not uploaded.";

        // if everything is ok, try to upload file
    } else {
        if (move_uploaded_file($_FILES["image2"]["tmp_name"], $target_file)) {
            $msg = "The file " . basename($_FILES["image2"]["name"]) . " has been uploaded.";
        }
    }
}
//image 3 uoload
 $target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["image3"]["name"]);
$uploadOk = 1;
$imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);

// Check if image file is a actual image or fake image
if (isset($_POST["upload"])) {

    if ($target_file == "uploads/") {
        $msg = "cannot be empty";
        $uploadOk = 0;
    } // Check if file already exists
    else if (file_exists($target_file)) {
        $msg = "Sorry, file already exists.";
        $uploadOk = 0;
    } // Check file size
    else if ($_FILES["image3"]["size"] > 5000000) {
        $msg = "Sorry, your file is too large.";
        $uploadOk = 0;
    } // Check if $uploadOk is set to 0 by an error
    else if ($uploadOk == 0) {
        $msg = "Sorry, your file was not uploaded.";

        // if everything is ok, try to upload file
    } else {
        if (move_uploaded_file($_FILES["image3"]["tmp_name"], $target_file)) {
            $msg = "The file " . basename($_FILES["image3"]["name"]) . " has been uploaded.";
        }
    }
}
//image 4 upload
 $target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["image4"]["name"]);
$uploadOk = 1;
$imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);

// Check if image file is a actual image or fake image
if (isset($_POST["upload"])) {

    if ($target_file == "uploads/") {
        $msg = "cannot be empty";
        $uploadOk = 0;
    } // Check if file already exists
    else if (file_exists($target_file)) {
        $msg = "Sorry, file already exists.";
        $uploadOk = 0;
    } // Check file size
    else if ($_FILES["image4"]["size"] > 5000000) {
        $msg = "Sorry, your file is too large.";
        $uploadOk = 0;
    } // Check if $uploadOk is set to 0 by an error
    else if ($uploadOk == 0) {
        $msg = "Sorry, your file was not uploaded.";

        // if everything is ok, try to upload file
    } else {
        if (move_uploaded_file($_FILES["image4"]["tmp_name"], $target_file)) {
            $msg = "The file " . basename($_FILES["image4"]["name"]) . " has been uploaded.";
        }
    }
}




	session_start();
	  
    $db = mysqli_connect('localhost', 'root', '', 'omms');
     
   $title=mysqli_real_escape_string($db,$_POST['title']);
   $category = mysqli_real_escape_string($db, $_POST['category']);
   $description = mysqli_real_escape_string($db, $_POST['description']);
   $vid = mysqli_real_escape_string($db, $_POST['vid']);
   $price = mysqli_real_escape_string($db, $_POST['price']);
   $name = mysqli_real_escape_string($db, $_POST['name']);
   $shpname = mysqli_real_escape_string($db, $_POST['shpname']);
   $mobile = mysqli_real_escape_string($db, $_POST['mobile']);
   $city = mysqli_real_escape_string($db, $_POST['city']);
  	
  	$query = "INSERT INTO products (title, category, description, vid, price, image1, image2, image3, image4, name, shpname, mobile, city) VALUES ('$title','$category','$description','$vid','$price','$image1','$image2','$image3','$image4', '$name','$shpname','$mobile','$city')";
  			  //$query;
  	mysqli_query($db, $query);
	echo "<script>alert('upload Sucessful');</script>";
	header('location: http://localhost/OMMS/sell.php#Upload_Sucessful');
  ?>	
 