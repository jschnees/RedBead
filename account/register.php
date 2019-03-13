<?php include('includes/server.php') ?>
<?php include('includes/errors.php'); ?>
<?php include('includes/meta.php') ?>
<script type="text/javascript" src="assets/js/randomgennum.js" async></script>
<body class="loginBody">
<header>
	<div><a href="../index.php"><img src="../assets/img/Logo.svg" alt="Red Beac Inc."></a></div>
	<!-- Sign in -->
	<div><a class="LogOutButton" href="index.php" class="btn"><i class="fas fa-door-open"></i> Sign in</a></div>
</header>
<Main>
	<!-- Content -->
	<form name="RegistrationForm" method="post" action="register.php">
		<div class="registration-container">
			<div><h2>Create Account</h2></div>
			<!-- Enter User Name -->
			<div><input type="text" name="username" placeholder="username" title="Enter Username" value="<?php echo $username; ?>" autofocus></div>
			<div><input type="text" placeholder="password" title="Enter Password" name="password_1"></div>
			<!-- Password Confirmation -->
			<div>
				<input type="password" placeholder="confirm password" title="Confirm Password" name="password_2">
				<input type="hidden" name="length">
			</div>
			<!-- Enter Customer Personal Information -->
			<div><input type="text" pattern="[a-z]{1-15}" min="10" max="100" placeholder="First Name" name="FirstName" title="Enter First Name" value="<?php echo $FirstName; ?>"></div>
			<div><input type="text" pattern="[a-z]{1-15}" min="10" max="100" placeholder="Last Name" name="LastName" title="Last Name" value="<?php echo $LastName; ?>"></div>
			<!-- Enter Contact Information -->
			<div><input type="email"pattern="[a-z]{1-15}" min="10" max="100" placeholder="Email" name="EMAIL" title="Enter Email Address" value="<?php echo $EMAIL; ?>"></div>
			<div><input type="tel"  pattern="[0-9]{10}" min="10" max="10" placeholder="Phone Number" name="HomePhone" title="Enter Phone Number" value="<?php echo $HomePhone; ?>" maxlength="10"></div>
			<!-- Buttons -->
			<div><button type="submit" class="btn" title="Register Button" name="reg_user">Register</button></div>
			<div><button type ="reset" class="btn" title="Clear Form Button" value="Reset" onclick="reset();"><i class="fas fa-eraser"></i> Clear</button></div>
		</div>
	</form>
</Main>
</body>
</html>