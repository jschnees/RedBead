<?php include_once('includes/session.php'); ?>
<?php include_once('includes/server.php'); ?>
<?php include_once('includes/meta.php'); ?>
<body>
	
<header>
  <div><a class="LogOutButton" href="index.php"><i class="fas fa-sign-out-alt"></i> logout</a></div>
</header>
<Main>
<!-- Content -->
<div class="AccountPage">
  <div>
    <!-- User Information - Name, EMAIL, etc. -->
  
      <h2><i class="far fa-user-circle"></i> Employee Information</h2>
      <?php while ($row = mysqli_fetch_assoc($employeedata)):  ?>
            <ul>
              <li><h3>EmployeeID ID: <?php echo $row['EmployeeID'];?></h3></li>
              <li><i class="far fa-user"></i> <?php echo $row['FirstName'];?> <?php echo $row['LastName'];?></li>
              <li><i class="fas fa-at"></i> <?php echo $row['EMAIL'];?></li>
              <li><i class="fas fa-mobile-alt"></i> <?php echo $row['HomePhone'];?></li>
              <li><i class="fas fa-home"></i> <?php echo $row['EMPAddress'];?> <?php echo $row['City'];?> <?php echo $row['StateProvince'];?> <?php echo $row['ZipCode'];?></li>
            </ul>
      <?php endwhile; ?>
      <span class="editIcon"><a href="editaccountinformation.php" title="Edit Account Information"><i class="fas fa-edit"></i></a><span>
  </div>
  <div>
    <!-- Account Purchase History -->
    <h2><i class="fas fa-notes-medical"></i> Benefits</h2>
    <?php while ($benefitsresults = mysqli_fetch_assoc($employeebenefits)): ?>
          <ul>
            <li><i class="fas fa-user-md"></i> <strong>Insurance Plan:</strong> <a href="<?php echo $benefitsresults['InsurancePlanPolicy']; ?>" target="_new" title="Insurance Plan PPO Plan 1"><?php echo $benefitsresults['InsurancePlan'];?>  <i class="fas fa-external-link-alt"></i></a></li>
            <li><i class="far fa-compass"></i> <strong>Vacation Days:</strong> <?php echo $benefitsresults['VacationDays'];?></li>
            <li><i class="fas fa-medkit"></i> <strong>Sick Days:</strong> <?php echo $benefitsresults['SickDays'];?></li>
            <li><i class="far fa-smile"></i> <strong>Just Because Days:</strong> <?php echo $benefitsresults['JustBecauseDays'];?></li>
            <li><a href="<?php echo $benefitsresults['RetirementPlanLink'];?>" target="_new" title="Merrill Lynch"><i class="fas fa-hand-holding-usd"></i> 401k <?php echo $benefitsresults['RetirementPlanCo'];?> <i class="fas fa-external-link-alt"></i></a>
          </ul>
    <?php endwhile; ?>
  </div>
    <!-- Payroll Information -->
  <div>
    <h2><i class="far fa-money-bill-alt"></i> Payroll Information</h2>
    <?php while ($payresults = mysqli_fetch_assoc($employeepayroll)): ?>
          <ul>
            <li><i class="far fa-money-bill-alt"></i> <strong>Check:</strong> <?php echo $payresults['CheckID'];?></li>
            <li><strong>Amount:</strong> <?php echo $payresults['Amount'];?></li>
            <li><strong>Tax:</strong> <?php echo $payresults['Tax'];?></li>
            <li><strong>Insurance Fee:</strong> <?php echo $payresults['Insurance'];?></li>
          </ul>
    <?php endwhile; ?>
  </div>
      <!-- Company News Letter -->
      <div>
    <h2><i class="far fa-newspaper"></i> Company News</h2>
    <?php while ($companyNewsArticle = mysqli_fetch_assoc($ComapanNewsFeed)): ?>
          <ul>
            <li><h3><?php echo $companyNewsArticle['ArticleTitle'];?></h3></li>
            <li><?php echo $companyNewsArticle['Article'];?></li>
          </ul>
    <?php endwhile; ?>
  </div>
</div>
</body>
</html>