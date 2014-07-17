<?php include_once("header.php"); ?>

<div id="wrapper"> 

        <?php 

        	include_once("file/topside.php");

        	include_once("file/".segment(0)."/".segment(0).".php");

        ?>
        
        <?php 

			include_once('modal/department.php');

		?>        

</div>

<?php include_once("footer.php"); ?>