<?php
session_start();

// variable declaration
$email    = "";
$errors = array(); 
$_SESSION['success'] = "";

// connect to database
$db = mysqli_connect('localhost', 'root', '', 'omms');

if (isset($_POST['login'])) {
  $email = mysqli_real_escape_string($db, $_POST['email']);
  $password = mysqli_real_escape_string($db, $_POST['password']);

  if (empty($email)) {
      array_push($errors, "email is required");
  }
  if (empty($password)) {
    array_push($errors, "Password is required");
  }

  if (count($errors) == 0) {
   
    $query = "SELECT * FROM admin WHERE email='$email' AND password='$password'";
    $results=mysqli_query($db, $query);
    $count=mysqli_num_rows($results);
    if (mysqli_num_rows($results) == 1) {
	  $row = mysqli_fetch_array($results);
      print_r($row);
      header('location: http://localhost/OMMS/admin.php');
       $_SESSION['user']=$row['type'];
	   $_SESSION['type']=$row['type'];
	   $_SESSION['email']=$row['email'];
       } else {
	    $_SESSION['errors'] = array("Wrong Email/Password combination try again.");
	    header('location: http://localhost/OMMS/adminlogin.php');
	   }
  } 
}

?>