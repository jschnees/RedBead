<?php 
	require('server.php');
	
		if (!isset($_SESSION['username'])) {
			$_SESSION['msg'] = "You must log in first";
			header('location: index.php');
	}
		if (isset($_GET['logout'])) {
			session_destroy();
			unset($_SESSION['username']);
			header("location: index.php");
	}

	$employeedata = mysqli_query($db, "SELECT * FROM EmployeeData");
	$employeebenefits = mysqli_query($db, "SELECT * FROM Benefits");
	$employeepayroll = mysqli_query($db, "SELECT * FROM Payroll");
	$ComapanNewsFeed = mysqli_query($db, "SELECT ArticleTitle, Article FROM CompanyBlog ORDER BY ArticleID DESC");
?>
<!-- notification message -->
<?php if (isset($_SESSION['success'])) : ?>
	<div class="error success" >
	<h3>
		<?php 
			echo $_SESSION['success']; 
			unset($_SESSION['success']);
		?>
	</h3>
	</div>
<?php endif ?>

<!-- logged in user information -->
<?php  if (isset($_SESSION['username'])) :  endif ?>