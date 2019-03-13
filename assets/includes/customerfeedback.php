<?php
// initializing variables for database information
$FirstName="";
$LastName="";
$EMAIL="";
$FeedbackText="";
$TableName = "CustomerFeedBackTable";
// initializing variables for database login
$servername = "localhost";
$serverLogin = "root";
$password="";
$dbname = "CustomerFeedBack";


// connect to the database
$db = mysqli_connect("$servername", "$serverLogin", "$password", "$dbname")
  or die("Cannot connect, please check your server connection.");

// Insert Customer Data
if (isset($_POST['submit_feedback'])) {
  // receive all input values from the form
  $FirstName = mysqli_real_escape_string($db, $_POST['FirstName']);
  $LastName = mysqli_real_escape_string($db, $_POST['LastName']);
  $EMAIL = mysqli_real_escape_string($db, $_POST['EMAIL']);
  $FeedbackText = mysqli_real_escape_string($db, $_POST['FeedbackText']);

  // Register user if there are no errors in the form
  if (count($errors) == 0) {
    $query = "INSERT INTO $TableName (FirstName, LastName, EMAIL, FeedbackText) 
  			      VALUES('$FirstName', '$LastName', '$EMAIL','$FeedbackText')";
  	mysqli_query($db, $query);
  }
}
?>