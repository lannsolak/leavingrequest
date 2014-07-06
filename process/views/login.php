<?php include('header.php'); ?>
	
	<form action="login/validation" method="post">
		<input type="text" name="lgemail" value="" placeholder="email..." />
		<input type="password" name="lgpwd" value="" placeholder="password..." />
		<input type="submit" name="lgsubmit" value="Login" />
	</form>

<?php
	include('footer.php'); 
?>