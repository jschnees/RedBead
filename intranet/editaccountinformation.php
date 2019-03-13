<?php include('includes/meta.php') ?>

<?php
    	// initializing variables for database login
$servername = "localhost";
$serverLogin = "root";
$password = "";
$dbname = "RedBeadEmployeeData";


// connect to the database
$conn = mysqli_connect("$servername", "$serverLogin", "$password", "$dbname")
  or die("Cannot connect, please check your server connection.") or die('Can not connect to database');
    ?>
    <body>
    <?php
    	if(isset($_POST['Submit'])){//if the submit button is clicked
    	
		$EmployeeID = 'EmployeeID';
    	$FirstName = $_POST['FirstName'];
    	$LastName = $_POST['LastName'];
		$EMAIL = $_POST['EMAIL'];
		$HomePhone = $_POST['HomePhone'];
		$EMPAddress = $_POST['EMPAddress'];
		$City = $_POST['City'];
		$StateProvince = $_POST['StateProvince'];
		$ZipCode = $_POST['ZipCode'];
    		
    	$update = "UPDATE EmployeeData SET FirstName='$FirstName', LastName='$LastName', EMAIL='$EMAIL', HomePhone='$HomePhone', EMPAddress='$EMPAddress', City='$City', StateProvince='$StateProvince', ZipCode='$ZipCode' WHERE EmployeeID = ".$EmployeeID;
    	$conn->query($update) or die("Cannot update");//update or error
    
        header('Location: accountpage.php');
        }
    ?>
    <?php
    //Create a query
    $sql = ("SELECT * FROM EmployeeData");
    //submit the query and capture the result
    $result = $conn->query($sql) or die(mysql_error());
    ?>

    <form action="" method="post">
    <?php while ($row = $result->fetch_assoc()) {?>
    <div class="EditData">
    <div><h2>Update Record For Employee <?php echo $row['EmployeeID']?></h2></div>
    <div>FirstName:</div> <div><input type="text" name="FirstName" value="<?php echo $row['FirstName']; ?>"></div>
    <div>LastName:</div> <div><input type="text" name="LastName" value="<?php echo $row['LastName']; ?>"></div>
    <div>Email:</div> <div><input type="text" name="EMAIL" value="<?php echo $row['EMAIL']; ?>"></div>
    <div>Home Phone:</div> <div><input type="text" name="HomePhone" value="<?php echo $row['HomePhone']; ?>"></div>
    <div>Address:</div> <div><input type="text" name="EMPAddress" value="<?php echo $row['EMPAddress']; ?>"></div>
    <div>City:</div> <div><input type="text" name="City" value="<?php echo $row['City']; ?>"></div>
    <div>State or Province:</div> <div><input type="text" name="StateProvince or Province" value="<?php echo $row['StateProvince']; ?>"></div>
	<div>ZipCode:</div> <div><input type="text" name="ZipCode" value="<?php echo $row['ZipCode']; ?>"></div>
    <div><INPUT TYPE="Submit" class="btn" VALUE="Update the Record" NAME="Submit"></div>
    </div>
    <?php	}
    	?>
    </form>
    </body>
    </html>