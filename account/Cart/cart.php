<?php include('includes/server.php') ?>
<?php include('includes/errors.php'); ?>
<?php include('includes/meta.php') ?>

<?php

// initializing variables
$totalCheckout="";
$nameCheckout="";
$itemCheckout="";
if(isset($_POST["add_to_cart"]))
{
	if(isset($_SESSION["shopping_cart"]))
	{
		$item_array_id = array_column($_SESSION["shopping_cart"], "item_id");
		if(!in_array($_GET["id"], $item_array_id))
		{
		$item_array = array(
		'item_id'			=>	$_GET["id"],
		'item_name'			=>	$_POST["hidden_name"],
		'item_price'		=>	$_POST["hidden_price"],
		'item_quantity'		=>	$_POST["quantity"]
		);
		array_push($_SESSION["shopping_cart"],$item_array);
		}
	}
	else
	{
	$item_array = array(
	'item_id'			=>	$_GET["id"],
	'item_name'			=>	$_POST["hidden_name"],
	'item_price'		=>	$_POST["hidden_price"],
	'item_quantity'		=>	$_POST["quantity"]);
	$_SESSION["shopping_cart"][0] = $item_array;
	}
}

if(isset($_GET["action"]))
{
if($_GET["action"] == "delete")
{
foreach($_SESSION["shopping_cart"] as $keys => $values)
{
if($values["item_id"] == $_GET["id"])
{
unset($_SESSION["shopping_cart"][$keys]);
echo '<script>window.location="cart.php"</script>';
}
}
}
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Cart</title>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"/>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"/>
<link rel="stylesheet" href="assets/css/style.css" type="text/css" media="all" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script type="text/javascript" src="assets/js/randomgennum.js" async></script>
</head>
<body>
<div class="container">
<div><a class="BackButton" href="../accountpage.php"><i class="far fa-caret-square-left"></i> Account</a></div>

<h1>Questions or Concerns?</h1>
<h3>Call +1-242.394.7470</h3>
<?php
	$query = "SELECT * FROM Product ORDER BY id ASC";
	$result = mysqli_query($connect, $query);
if(mysqli_num_rows($result) > 0)
	{
while($row = mysqli_fetch_array($result))
{
?>
<div class="col-sm-3">
<form method="post" action="cart.php?action=add&id=<?php echo $row["id"]; ?>">
<div class="packagecolumns" align="center">
	<img src="<?php echo $row["image"]; ?>" class="img-responsive"/><br/>

	<h4 class="text-info"><?php echo $row["ProductName"]; ?></h4>

	<h4 class="text-danger">$ <?php echo $row["ProductPrice"]; ?></h4>

	<input type="number" name="quantity" value="1" class="form-control" min="1" />

	<input type="hidden" name="hidden_name" value="<?php echo $row["ProductName"]; ?>" />

	<input type="hidden" name="hidden_price" value="<?php echo $row["ProductPrice"]; ?>" />

	<input type="submit" name="add_to_cart" class="btn" value="Add to Cart" />
</div>
<h2>Package Details</h2>
<div>
	<?php echo $row["ProductDescription"]; ?>
</div>
</form>
</div>
<?php
}
}
?>
<div style="clear:both"></div>
<br />
<h3>Order Details</h3>
<div class="table-responsive">
	<table>
		<tr>
			<th width="40%">Item Name</th>
			<th width="10%">Quantity</th>
			<th width="20%">Price</th>
			<th width="15%">Total</th>
			<th width="5%">Action</th>
		</tr>
		<?php
			if(!empty($_SESSION["shopping_cart"]))
			{
			$total = 0;
			foreach($_SESSION["shopping_cart"] as $keys => $values)
		{
		?>
		<tr>
			<td><?php echo $values["item_name"]; ?></td>
			<td><?php echo $values["item_quantity"]; ?></td>
			<td>$ <?php echo $values["item_price"]; ?></td>
			<td>$ <?php echo number_format($values["item_quantity"] * $values["item_price"]+15, 2);?></td>
			<td><a href="cart.php?action=delete&id=<?php echo $values["item_id"]; ?>"><span class="text-danger">Remove</span></a></td>
		</tr>
		<?php
			$total = $total + ($values["item_quantity"] * $values["item_price"] + 15);
			$totalCheckout=$total;
			$priceCheckout=$values["item_price"];
			$nameCheckout=$values["item_name"];
			$name =$values["item_name"];
			// $qantity= $values["item_quantity"];

			///name,quantity is for table itemname and namecheckout is for invoice table
			$newquery = "INSERT INTO Invoice(InvoiceDescription, Price, Total)
			values	('$nameCheckout', '$priceCheckout','$totalCheckout')";
			$newresult = mysqli_query($connect, $newquery);
			$lastquery = "INSERT INTO ItemName(ItemName)
			values	('$nameCheckout')";
			$lastresult = mysqli_query($connect, $lastquery);
		}
		?>
		<tr>
			<td colspan="3" align="right">Total(Tax included)</td>
			<td align="right">$ <?php echo number_format($total, 2); ?></td>
			<td></td>
		</tr>
		<?php
			}
		?>
	</table>
</div>
<a href="checkout.php"><button class="chkbtn" onclick="return confirm('You cannot go back after this point!')" >Checkout</button></a>
</div>
</div>
</body>
</html>