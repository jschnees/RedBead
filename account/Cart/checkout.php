<?php include_once('includes/session.php'); ?>
<?php include_once('includes/server.php'); ?>
<?php include('includes/errors.php') ?>

<!DOCTYPE html>
<html>
<head>
<title>Checkout </title>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
<link rel="stylesheet" href="assets/css/style.css" type="text/css" media="all" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script type="text/javascript" src="assets/js/randomgennum.js" async></script>
</head>
<body>

<style>
* {
  box-sizing: border-box;
}

.row {
  display: -ms-flexbox; /* IE10 */
  display: flex;
  -ms-flex-wrap: wrap; /* IE10 */
  flex-wrap: wrap;
  margin: 0 -16px;
}

.paymentColumn {
  -ms-flex: 25%; /* IE10 */
  flex: 25%;
}

.col-50 {
  -ms-flex: 50%; /* IE10 */
  flex: 50%;
}

.col-75 {
  -ms-flex: 75%; /* IE10 */
  flex: 75%;
}

.paymentColumn,
.col-50,
.col-75 {
  padding: 0 16px;
}

.container {
  padding: 5px 20px 15px 20px;
}

input[type=text] {
  width: 100%;
  margin-bottom: 20px;
  padding: 12px;
}


.icon-container {
  margin-bottom: 20px;
  padding: 7px 0;
  font-size: 24px;
}

span.price {
  float: right;
}

@media (max-width: 800px) {
  .row {
    flex-direction: column-reverse;
  }
  .paymentColumn {
    margin-bottom: 20px;
  }
}
</style>
</head>
<body>

<div class="row">
  <div class="col-75">
    <div class="container">
    <form method="post" action="checkout.php">
        <div class="row">
          <div class="col-50">
            <h1>Billing Address</h1>
            <h3><i class="fa fa-user"></i>Full name:</h3>
                <input type="text" name="customerName" value="<?php echo $customerName; ?>" autofocus required>
                <h3><i class="fa fa-envelope"></i> Email:</h3>
                <input type="text" name="EMAIL" value="<?php echo $EMAIL; ?>" required>

              <h3><i class="fa fa-address-card-o"></i> Address:</h3>
              <input type="text" name="Address" value="<?php echo $Address; ?>" required>

              <h3><i class="fa fa-institution"></i> City:</h3>
              <input type="text" name="City" value="<?php echo $City; ?>" required>

            <div class="row">
              <div class="col-50">
                <h3>State or Province:</h3>
                <input type="text" name="StateProvince" value="<?php echo $StateProvince; ?>" required>
              </div>
              <div class="col-50">
                <h3>Zip:</h3>
                <input type="text" name="ZipCode" "value="<?php echo $ZipCode; ?>" required>
              </div>
            </div>
          </div>

          <div class="col-50">
            <h1>Payment</h1>
            <h3>Accepted Cards</h3>
            <div class="icon-container">
              <i class="fa fa-cc-visa" style="color:navy;"></i>
              <i class="fa fa-cc-amex" style="color:blue;"></i>
              <i class="fa fa-cc-mastercard" style="color:red;"></i>
              <i class="fa fa-cc-discover" style="color:orange;"></i>
            </div>
            <h3>Name on Card</h3>
            <input type="text" name="CardName" value="<?php echo $CardName; ?>"  required>

            <h3>Card Number</h3>
            <input type="text" name="cardNumber" maxlength ="16" pattern="[0-9]{16}" placeholder="################" value="<?php echo $cardNumber; ?>"  required>

            <h3>ExpMonth:</h3>
            <input type="number" name="expMonth" placeholder="00" maxlength="2" min="1" max="12" value="<?php echo $expMonth; ?>" required>

            <div class="row">
              <div class="col-50">
                <h3>ExpYear:</h3>
                <input type="number" name="expYear" placeholder="0000" maxlength="4" min="2018" max="2050" value="<?php echo $expYear; ?>"required>
              </div>
              <div class="col-50">
                <h3>CVV Number:</h3>
                <input type="text" name="CVVNumber" placeholder="0000" maxlength ="4" pattern="[0-9]{3,4}" title="Numbers only" value="<?php echo $CVVNumber;?>" required>
              </div>
            </div>
          </div>

        </div>
        <input type="reset" name="reset" value ="Reset" class="btn btn-success" onclick="reset();"/>
        <input type="submit" class="btn btn-success" name="oksubmit" value="Submit" onclick="oksubmit();"/>
      </form>
    </div>
  </div>
  </div>
</div>

</body>
</html>