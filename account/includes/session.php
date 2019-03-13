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

	$result = mysqli_query($db, "SELECT * FROM Customer");
	$InvoiceResult = mysqli_query($db, "SELECT InvoiceDescription, Price, Total FROM Invoice");
	$TripResult = mysqli_query($db, "SELECT TripStartDate,TripEndDate FROM TripInformation");
	$PromotionResult = mysqli_query($db, "SELECT CurrentPromotion FROM Promotion");
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