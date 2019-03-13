	<!-- Content -->
	<form name="BlogForm" method="post" action="blog.php">
		<div class="BlogContainer">
		<div><h2> Submit Article</h2></div>
		<!-- Article -->
		<div><input type="text" name="ArticleTitle" placeholder="Enter Article Title" title="Enter Article Title" value="<?php echo $ArticleTitle; ?>"></div>
		<div><input type="text" placeholder="Enter Article" name="Article" title="Enter Article" value="<?php echo $Article; ?>"></div>
		<!-- Buttons -->
		<div><button type="submit" class="btn" title="Register Button" name="submitBlog">Submit</button></div>
		<div><button type ="reset" class="btn" title="Clear Form Button" value="Reset" onclick="reset();"><i class="fas fa-eraser"></i> Clear</button></div>
	</form>