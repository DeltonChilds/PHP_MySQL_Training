<?php 
require_once("includes/functions.php"); 
include("includes/header.php");
?>
	<div class="row">
    <div class="large-12">
    <form action="form_processing.php" method="post">
    	Username: <input type="text" name="username" value="" tabindex="2" /><br />
        Password: <input type="password" name="password" value="" tabindex="1" /><br />
    	<input type="submit" name="submit" value="Submit" tabindex="3" />
    </form>
	</div>	
		

	</div>

<?php require_once ('includes/footer.php');