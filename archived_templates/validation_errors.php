<?php 
require_once("includes/functions.php"); 
include("includes/header.php");
?>
	<div class="row">
			<div class="large-12">
			
			<?php 
			require_once('validation_functions.php');
			$errors = array();
			$username = trim("Delton");
			
			if(!has_presense($username)){
				$errors['username'] = "Username can't be blank bitch!";
				}
			?>
	    <p>
    	    <?php echo form_errors($errors); ?>
        </p>
		</div>
	
	</div>

<?php require_once ('includes/footer.php');