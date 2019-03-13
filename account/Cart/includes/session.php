<?php 
	require('includes/server.php');
	
		if (!isset($_SESSION['username'])) {
			$_SESSION['msg'] = "You must log in first";
			header('location: index.php');
	}
		if (isset($_GET['logout'])) {
			session_destroy();
			unset($_SESSION['username']);
			header("location: index.php");
	}
	
	$result = mysqli_query($connect, "SELECT * FROM Customer");
	$invoiceresult = mysqli_query($connect, "SELECT InvoiceDate, InvoiceDescription, Price, Total FROM Invoice");
	$TripResult = mysqli_query($connect, "SELECT TripStartDate,TripEndDate FROM TripInformation");
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