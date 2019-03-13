<?php include_once('includes/session.php'); ?>
<?php include_once('includes/server.php'); ?>
<?php include_once('includes/meta.php'); ?>
<body>
<header>
  <div><a class="LogOutButton" href="logout.php"><i class="fas fa-sign-out-alt"></i> logout</a></div>
</header>
<div class="questions">
<h1>Questions or Concerns?</h1>
<h3>Call +1-242.394.7470</h3>
</div>
<Main>
<!-- Content -->
<div class="AccountPage">
  <div>
    <!-- User Information - Name, EMAIL, etc. -->
      <h2><i class="far fa-user-circle"></i> Account Information</h2>
        <?php while($row = mysqli_fetch_assoc($result)): ?>
          <ul>
            <li><h3>Account ID: <?php echo $row['CustomerID'];?></h3></li>
            <li><i class="far fa-user"></i> <?php echo $row['FirstName'];?> <?php echo $row['LastName'];?></li>
            <li><i class="fas fa-at"></i> <?php echo $row['EMAIL'];?></li>
            <li><i class="fas fa-mobile-alt"></i> <?php echo $row['HomePhone'];?></li>
          </ul>
          <?php endwhile; ?>
    <span class="editIcon"><a href="editaccountinformation.php" title="Edit Account Information"><i class="fas fa-edit"></i></a><span>
  </div>
  <div>
    <h2><i class="fas fa-ship"></i> Schedule Your Cruise</h2>
   <ul class="scheduleTrip">
    <?php while($TripData = mysqli_fetch_assoc($TripResult)): ?>
      <li><a href="Cart/cart.php" title=""> <i class="far fa-calendar-alt"></i> Trip <?php echo $TripData['TripStartDate'];?> - <?php echo $TripData['TripEndDate'];?></a></li>
    <?php endwhile; ?>
    </ul>
  </div>
  <div>
    <!-- Account Purchase History -->
    <h2><i class="fas fa-shopping-cart"></i> Purchase History
    <p style="font-size: .75rem;">*To cancel orders please call</p>
    </h2>
    <ul>
    <?php while($InvoiceData = mysqli_fetch_assoc($InvoiceResult)): ?>
      <li><i class="fas fa-box"></i> Selected Package: <?php echo $InvoiceData['InvoiceDescription'];?></li>
      <li><i class="far fa-money-bill-alt"></i> Price: $<?php echo $InvoiceData['Price'];?></li>
      <li><i class="fas fa-dollar-sign"></i> Total: $<?php echo $InvoiceData['Total'];?></li>
    <?php endwhile; ?>
  </div>
  <div>
    <!-- Special Promotion -->
    <h2><i class="far fa-sun"></i> Current Promotions</h2>
    <ul>
    <?php while($Promotion = mysqli_fetch_assoc($PromotionResult)): ?>
      <li><?php echo $Promotion['CurrentPromotion'];?></li>
    <?php endwhile; ?>
  </div>
</div>
</body>
</html>