<?php include('includes/meta.php') ?>

<?php
    	// initializing variables for database login
$servername = "localhost";
$serverLogin = "root";
$password = "";
$dbname = "RedBead";
$TableName="Customer";

// connect to the database
$conn = mysqli_connect("$servername", "$serverLogin", "$password", "$dbname")
  or die("Cannot connect, please check your server connection.") or die('Can not connect to database');
    ?>
    <body>
    <?php
    	if(isset($_POST['Submit'])){//if the submit button is clicked
    	
		$CustomerID = 'CustomerID';
    	$FirstName = $_POST['FirstName'];
    	$LastName = $_POST['LastName'];
		$EMAIL = $_POST['EMAIL'];
		$HomePhone = $_POST['HomePhone'];
    		
    	$update = "UPDATE Customer SET FirstName='$FirstName', LastName='$LastName', EMAIL='$EMAIL', HomePhone='$HomePhone' WHERE CustomerID = ".$CustomerID;
    	$conn->query($update) or die("Cannot update");//update or error
    
        header('Location: accountpage.php');
        }
    ?>
    <?php
    //Create a query
    $sql = ("SELECT * FROM $TableName");
    //submit the query and capture the result
    $result = $conn->query($sql) or die(mysql_error());
    ?>
    <form action="" method="post">
    <?php while ($row = $result->fetch_assoc()) {?>
	<div class="EditData">
	<h2>Update Record For Customer <?php echo $row['CustomerID']?></h2>    
    <div>FirstName:</div> <div><input type="text" name="FirstName" value="<?php echo $row['FirstName']; ?>"></div>
    <div>LastName:</div> <div><input type="text" name="LastName" value="<?php echo $row['LastName']; ?>"></div>
    <div>Email:</div> <div><input type="text" name="EMAIL" value="<?php echo $row['EMAIL']; ?>"></div>
    <div>Home Phone:</div> <div><input type="text" name="HomePhone" value="<?php echo $row['HomePhone']; ?>"></div>
    <INPUT TYPE="Submit" class="btn" VALUE="Update the Record" NAME="Submit">
	</div>
	<?php	}
    	?>
    </form>
    </body>
    </html>