<?php include('includes/meta.php') ?>

<?php

$TableName ="CompanyNews";
$Article="";
// initializing variables for database login
$servername = "localhost";
$serverLogin = "root";
$password = "";
$dbname = "RedBeadEmployeeData";


// connect to the database
$db = mysqli_connect("$servername", "$serverLogin", "$password", "$dbname")
  or die("Cannot connect, please check your server connection.");

// REGISTER USER
if (isset($_POST['SubmitNews'])) {
  // receive all input values from the form
  $Article = mysqli_real_escape_string($db, $_POST['Article']);


  // Register user if there are no errors in the form
  if (count($errors) == 0) {
  	$password = md5($password_1);//encrypt the password before saving in the database

    $query = "INSERT INTO $TableName (Article) 
  			      VALUES('$Article')";
  	header('location: news.php');
  }
}
?>

<body>
<header><!-- Image Top --></header>
<Main>
    <!-- Content -->
    <form name="NewsForm" method="post" action="news.php">
        <div class="registration-container">
          <div><h1>Submit News</h1></div>
			<div><input type="text" placeholder="Article" name="Article" title="Enter Article" value="<?php echo $Article; ?>"></div>
			<!-- Buttons -->
			<div><button type="submit" class="btn" title="Submit News Button" name="SubmitNews">Submit News</button></div>
			<div><button type ="submit" class="btn" title="Clear Form Button" value="Cancel" onclick="reset();">Clear</button></div>
		</form>
</Main>
</body>  
</html>