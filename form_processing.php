<?php 
require_once("includes/functions.php"); 
include("includes/header.php");
?>
	<div class="row">
		
        <div class="large-12">
        <h2>Assoc Array from $_POST Super Global</h2>
        <pre>
        <?php 
			print_r($_POST);

		?>
        </pre>
        <?php
			
			if(isset($_POST["submit"])){
				echo "<p>Form was submitted.</p>";
				}
		
		 ?>
        
              
        </div>
        
        
       
        
        <?php 
			// Sets Default Values
			// set default values using a ternary operator 
			// boolean_test ? value_if_true : value_if_false
			
			$username = isset($_POST["username"]) ? $_POST["username"] : null;
			$password = isset($_POST["password"]) ? $_POST["password"] : null;
			
			if(isset($username) && isset($password)){
			?>
            <div class="large-12">
        	<h2>Using Values As Variables:</h2>
        		<p>
            Your Username is <?php echo $username; ?>
			<br />
			Your Password is <?php echo $password; ?>
			</div></p>
			<?php } ?> 
     </div>

<?php require_once ('includes/footer.php');