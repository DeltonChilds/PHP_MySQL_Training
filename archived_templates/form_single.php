<?php 
require_once("includes/functions.php"); 
include("includes/header.php");
if(isset($_POST["submit"])){
		
		$username = $_POST["username"];
		$password = $_POST["password"];
		$message = "Logging in: {$username}"; 
	}else{
		$username = "";
		$password = "";
		$message = "Please log in."; 
	
		}			
?>
	<div class="row">
    <div class="large-12">
    <?php echo $message ?>
    <form action="form_single.php" method="post">
    	Username: <input type="text" name="username" value="<?php echo htmlspecialchars($username); ?>" tabindex="2" /><br />
        Password: <input type="password" name="password" value="<?php echo htmlspecialchars($password); ?>" tabindex="1" /><br />
    	<input type="submit" name="submit" value="Submit" tabindex="3" />
    </form>
	</div>	
		

	</div>

<?php require_once ('includes/footer.php');