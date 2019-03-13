
      <!-- Footer -->
      <Footer>
      <?php include('customerfeedback.php') ?>
        <div>
          <form name="FeedbackFrom" method="post" action="index.php">
            <h1>Contact Us</h1>
              <input type="text" name="FirstName" placeholder="First Name" title="Enter First Name" value="<?php echo $FirstName; ?>">
			        <input type="text" placeholder="Last Name" name="LastName" title="Last Name" value="<?php echo $LastName; ?>">
			        <!-- Enter Contact Information -->
		        	<input type="email" placeholder="Email" name="EMAIL" title="Enter Email Address" value="<?php echo $EMAIL; ?>">
              <textarea id="subject" name="subject" placeholder="Write something.." value="<?php echo $FeedbackText; ?> style="height:200px"></textarea>
              <button type="submit" class="BtnMain" onclick="alert('Thank You for Your Feedback!')" title="Submit Feedback" name="submit_feedback">Submit</button>
          </form>
        </div>
        <div>
          <h1>Follow Us</h1>
          <ul class="social">
            <li><a href="https://www.instagram.com/RedBead11/" title="Instagram"><i class="fab fa-instagram"></i><span class="SocialLink"> Instagram</span></a></li>
            <li><a href="https://www.facebook.com/groups/redmed/" title="Facebook"><i class="fab fa-facebook-square"></i><span class="SocialLink"> Facebook</span></a></li>
          </ul>
        </div>
      </div>
    </Footer>
  </Main>
</body>  
</html>