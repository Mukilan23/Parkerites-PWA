<?php

// initializing variables
$username = "";
$email    = "";
$errors = array();

// connect to the database
$db = mysqli_connect('parkerites.c1gpnmhb7ka6.ap-south-1.rds.amazonaws.com', 'root', 'parkerites123', 'parkerites');

if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }

// REGISTER USER
if (isset($_POST['reg_user'])) {
  // receive all input values from the form
  $username = mysqli_real_escape_string($db, $_POST['username']);
  $email = mysqli_real_escape_string($db, $_POST['email']);
  $mobile = mysqli_real_escape_string($db, $_POST['mobile']);
  $password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
  $password_2 = mysqli_real_escape_string($db, $_POST['password_2']);


  if (empty($username)) { array_push($errors, "Username is required"); }
  if (empty($email)) { array_push($errors, "Email is required"); }
  if (empty($password_1)) { array_push($errors, "Password is required"); }
  if ($password_1 != $password_2) {
	array_push($errors, "The two passwords do not match");
  }

  // first check the database to make sure
  // a user does not already exist with the same username and/or email
  $user_check_query = "SELECT * FROM accounts WHERE username='$username' OR email='$email' LIMIT 1";
  $result = mysqli_query($db, $user_check_query);
  $user = mysqli_fetch_assoc($result);

  if ($user) { // if user exists
    if ($user['username'] === $username) {
      array_push($errors, "Username already exists");
    }

    if ($user['email'] === $email) {
      array_push($errors, "email already exists");
    }
  }
  if (count($errors) == 0) {
  	$password = md5($password_1);

  	$query = "INSERT INTO accounts (username, email,mobile, password)
  			  VALUES('$username', '$email','$mobile', '$password')";
  //	mysqli_query($db, $query);

 
	if ($db->query($query) === TRUE){
  	$_SESSION['username'] = $username;
  	$_SESSION['success'] = "You are now logged in";
  	?>
  	 <script>
    window.location = "login.php";
   </script>
   <?php
  }
  }
}



if (isset($_POST['login_user'])) {
  $username = mysqli_real_escape_string($db, $_POST['username']);
  $password = mysqli_real_escape_string($db, $_POST['password']);
  echo $username;
  echo $password;
  if (empty($username)) {
  	array_push($errors, "Username is required");
  }
  if (empty($password)) {
  	array_push($errors, "Password is required");
  }

  if (count($errors) == 0) {
    echo "witout";
    $password = md5($password);
  	$query = "SELECT * FROM accounts WHERE username='$username' AND password='$password'";
    echo $password;
  	$results = $db->query($query);
  	//if (mysqli_num_rows($results) == 1) {
    if($results->num_rows==1){
  	  ?>
  			 <script>
    window.location = "booking.php";
   </script>
   <?php
  	}else {
  		array_push($errors, "Wrong username/password combination");
  	}
  }
}



?>
