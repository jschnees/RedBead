<?php
session_start();

// initializing variables for database information
$ArticleTitle="";
$Article="";
$TableName = "CompanyBlog";
$errors = array();

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
  $ArticleTitle = mysqli_real_escape_string($db, $_POST['ArticleTitle']);
  $Article = mysqli_real_escape_string($db, $_POST['Article']);

  // form validation: ensure that the form is correctly filled ...
  if (empty($ArticleTitle)) { array_push($errors, "Article Title is required"); }
  if (empty($Article)) { array_push($errors, "Article is required"); }
  }

  if (count($errors) == 0) {
    $query = "INSERT INTO $TableName (ArticleTitle, Article) 
  			      VALUES('$ArticleTitle', '$Article')";
  	mysqli_query($db, $query);
  }
  ?>
 
 <!--Crafted by Justin Schnees jschnees.com-->
 <!DOCTYPE html>
<html lang="en">
<head>
	<!-- meta tags -->
	<meta charset="UTF-8">
	<meta name="description" content="Red Bead">
	<meta name="author" content="Justin Schnees">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!-- links to assets -->
  <link rel="stylesheet" href="../assets/css/style.css" type="text/css" media="all" />
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.2/css/all.css" integrity="sha384-/rXc/GQVaYpyDdyxK+ecHPVYJSN9bmVFBvjA/9eOB+pb3F2w2N6fc5qB9Ew5yIns" crossorigin="anonymous">
  <title>Red Bead - Helping You, One Sunrise at a Time</title>
</head>
<script type="text/javascript" src="assets/js/randomgennum.js" async></script>
<body>
	
<header>
  <h1 class="CoName">Company Blog</h1>
</header>
<Main>
<?php include_once('submitblog.php'); ?>
<!-- Content -->
<div class="AccountPage">
  <div>
    <!-- User Information - Name, EMAIL, etc. -->
  
      <h2><i class="far fa-user-circle"></i> Company News</h2>
      <?php $ComapanNewsFeed = mysqli_query($db, "SELECT ArticleTitle, Article FROM CompanyBlog ORDER BY ArticleID"); ?>
      <?php while ($BlogData = mysqli_fetch_assoc($ComapanNewsFeed)):  ?>
            <ul>
              <li><h3><?php echo $BlogData['ArticleTitle'];?></h3></li>
              <li><?php echo $BlogData['Article'];?></li>
            </ul>
      <?php endwhile; ?>
  </div>

</div>
</body>
</html>