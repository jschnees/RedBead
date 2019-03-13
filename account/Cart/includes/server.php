<?php
session_start();

// initializing variables for database information
$FirstName = "";
$LastName = "";
$EMAIL="";
$Address="";
$City="";
$StateProvince="";
$ZipCode="";
$HomePhone="";

$name="";
$customerName="";
$cardType="";
$cardNumber="";
$expMonth="";
$expYear="";
$CVVNumber="";
$card="";
$errors = array();

$CardName="";
$CardNumber="";
$CartSelection="";
$CVV="";
$InvoiceDate="";
$InvoiceDescription="";
$Price="";
$Total="";
$TableName = "Product";
$errors = array();
$row = "";

// initializing variables for database login
$servername = "localhost";
$serverLogin = "root";
$password = "";
$dbname = "RedBead";


//connect to the database

$connect = mysqli_connect("$servername", "$serverLogin", "$password", "$dbname")
  or die("Cannot connect, please check your server connection.");

$CartSelection = mysqli_query($connect, "SELECT * FROM product");



// capture right info
if (isset($_POST['oksubmit'])) {
  // receive all input values from the form
  $customerName = mysqli_real_escape_string($connect, $_POST['customerName']);
  $cardNumber = mysqli_real_escape_string($connect, $_POST['cardNumber']);
  $expMonth = mysqli_real_escape_string($connect, $_POST['expMonth']);
  $expYear = mysqli_real_escape_string($connect, $_POST['expYear']);
  $CVVNumber=mysqli_real_escape_string($connect, $_POST['CVVNumber']);

  // form validation: ensure that the form is correctly filled ...
  if (empty($customerName)) { array_push($errors, "Name  is required"); }
  if (empty($expYear)) { array_push($errors, "Expiration Year is required"); }
  if (empty($cardNumber)) { array_push($errors, "Card Number  is required"); }
  if (empty($expMonth)) { array_push($errors, "Expiration Month is required"); }
  if (empty($CVVNumber)) { array_push($errors, "Secret code is required");}

  // first check the database to make sure
    // a user does not already exist with the same username and/or EMAIL
    $check_query = "SELECT * FROM CreditCardInformation WHERE CustomerFullName ='$customerName' OR CVVNumber='$CVVNumber' LIMIT 1";
    $result = mysqli_query($connect, $check_query);
    $customer = mysqli_fetch_assoc($result);

    if ($customer) { // if user exists
      if ($customer['customerName'] === $customerName) {
        array_push($errors, "Card on file");
      }

      if ($customer['cvvNumber'] === $CVVNumber) {//
        array_push($errors, "Card on file");
      }
    }
    // Register user if there are no errors in the form
      if (count($errors) == 0) {

        $query = "INSERT INTO CreditCardInformation (CustomerFullName,cardType,cardNumber,expMonth,expYear,CVVNumber)
         VALUES('$customerName', '$cardNumber', '$expMonth','$expYear','$CVVNumber')";
      	mysqli_query($connect, $query);
      	$_SESSION['customerName'] = $customerName;
      	header('location: ../accountpage.php');
      }
}

//connect to the database


?>
