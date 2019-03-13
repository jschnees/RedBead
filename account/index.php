<?php include('includes/server.php') ?>
<?php include('includes/errors.php'); ?>
<?php include('includes/meta.php') ?>
<body class="loginBody">
<header><a href="index.php"><img src="assets/img/Logo.svg" alt="Red Beac Inc."></a></header>
<Main>
    <!-- Content -->
    <form name="Login" method="post" action="index.php">
        <div class="login-container">
            <div>
            <br /><br /><h1>Customer Login</h1></div>
            <div><input type="text" name="username" placeholder="username" title="Enter Username" autofocus></div>
            <div><input type="password" name="password" placeholder="password" title="Enter Password"></div>
            <div><button type="submit" class="btn" name="login_user">Login</button></div>
            <div><button type="submit" class="btn" value="Cancel" onclick="reset();">Clear</button></div>
            <div><a href="register.php" class="btn" alt="Create a new account entry">Create a New Account</a></div>
        </div>
    </form>
</Main>
</body>  
</html>