<?php include('header.php'); ?>

<div id="wrapper"> 

	<?php 

		if(isset($error)){

			echo $error;

		}

	?>

	<form action="<?php echo BASE_URL; ?>login/index" method="post">

		<input type="text" name="lgemail" value="" placeholder="email..." />

		<input type="password" name="lgpwd" value="" placeholder="password..." />

		<input type="submit" name="lgsubmit" value="Login" />
		
	</form>

</div>

<?php

	include('footer.php'); 
	
?>