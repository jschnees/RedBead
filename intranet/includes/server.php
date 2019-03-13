<?php
session_start();

// initializing variables for database information
$EmployeeID="";
$FirstName = "";
$LastName = "";
$HomePhone="";
$EMPAddress="";
$City="";
$StateProvince="";
$ZipCode="";
$EMAIL="";
$username="";
$password="";
$ComapanNewsFeed="";
$Article="";
$TableName = "EmployeeData";
$errors = array();
$row = ""; 

// initializing variables for database login
$servername = "localhost";
$serverLogin = "root";
$password = "";
$dbname = "RedBeadEmployeeData";


// connect to the database
$db = mysqli_connect("$servername", "$serverLogin", "$password", "$dbname")
  or die("Cannot connect, please check your server connection.");

// REGISTER USER
if (isset($_POST['reg_user'])) {
  // receive all input values from the form
  $username = mysqli_real_escape_string($db, $_POST['username']);
  $password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
  $password_2 = mysqli_real_escape_string($db, $_POST['password_2']);
  $FirstName = mysqli_real_escape_string($db, $_POST['FirstName']);
  $LastName = mysqli_real_escape_string($db, $_POST['LastName']);
  $EMAIL = mysqli_real_escape_string($db, $_POST['EMAIL']);
  $HomePhone = mysqli_real_escape_string($db, $_POST['HomePhone']);
  $EMPAddress = mysqli_real_escape_string($db, $_POST['Address']);
  $City = mysqli_real_escape_string($db, $_POST['City']);
  $StateProvince = mysqli_real_escape_string($db, $_POST['StateProvince']);
  $ZipCode = mysqli_real_escape_string($db, $_POST['ZipCode']);

  
  // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array
  if (empty($username)) { array_push($errors, "Username is required"); }
  if (empty($EMAIL)) { array_push($errors, "EMAIL is required"); }
  if (empty($password_1)) { array_push($errors, "Password is required"); }
  if (empty($FirstName) || empty($LastName)) { array_push($errors, "Full Name is required"); }
  if (empty($HomePhone)) { array_push($errors, "Home Phone is required"); }
  if (empty($EMPAddress)) { array_push($errors, "Address is required"); }
  if (empty($City)) { array_push($errors, "City is required"); }
  if (empty($StateProvince)) { array_push($errors, "State or Province is required"); }
  if (empty($ZipCode)) { array_push($errors, "ZipCode is required"); }
  if ($password_1 != $password_2) {
	array_push($errors, "The two passwords do not match");
  }

  // first check the database to make sure 
  // a user does not already exist with the same username and/or EMAIL
  $user_check_query = "SELECT * FROM $TableName WHERE username='$username' OR EMAIL='$EMAIL' LIMIT 1";
  $result = mysqli_query($db, $user_check_query);
  $user = mysqli_fetch_assoc($result);
  
  if ($user) { // if user exists
    if ($user['username'] === $username) {
      array_push($errors, "Username already exists");
    }

    if ($user['EMAIL'] === $EMAIL) {// if EMAIL exists
      array_push($errors, "EMAIL already exists");
    }
  }

  // Register user if there are no errors in the form
  if (count($errors) == 0) {
  	$password = md5($password_1);//encrypt the password before saving in the database

    $query = "INSERT INTO $TableName (username, EMAIL, password, FirstName, LastName, HomePhone, EMPAddress, City, StateProvince, ZipCode) 
  			      VALUES('$username', '$EMAIL', '$password', '$FirstName', '$LastName', '$HomePhone', '$EMPAddress', '$City','$StateProvince', '$ZipCode')";
  	mysqli_query($db, $query);
  	$_SESSION['username'] = $username;
  	$_SESSION['success'] = "You are now logged in";
  	header('location: accountpage.php');
  }
}

// ... 

// LOGIN USER
if (isset($_POST['login_user'])) {
    $username = mysqli_real_escape_string($db, $_POST['username']);
    $password = mysqli_real_escape_string($db, $_POST['password']);
    
    // Check if Username Field is Empty
    if (empty($username)) {
        array_push($errors, "Username is required");
    }

    // Check if Password Field is Empty
    if (empty($password)) {
        array_push($errors, "Password is required");
    }
  
    if (count($errors) == 0) {
        $password = md5($password);
        $query = "SELECT * FROM $TableName WHERE username='$username' AND password='$password'";
        $results = mysqli_query($db, $query);
        if (mysqli_num_rows($results) == 1) {
          $_SESSION['username'] = $username;
          $_SESSION['success'] = "You are now logged in";
          header('location: accountpage.php');
        }else {
            array_push($errors, "Wrong username/password combination");
        }
    }
  }
  ?>