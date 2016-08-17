<?php 
require_once("includes/functions.php"); 
include("includes/header.php");
require_once('validation_functions.php');

$errors = array();
$message = "";


if(isset($_POST["submit"])){
		
		//form was submitted
		$username = trim($_POST["username"]);
		$password = trim($_POST["password"]);
		
		$fields_required = array('username','password');
		foreach($fields_required as $field){
				$value = trim($_POST[$field]);
				if(!has_presense($value)){
				echo "<!-- presense errors were detected -->"; 
				$errors[$field] = ucfirst($field) . " can't be blank.";
				
				}
				
		}
		
		
		//echo "Validing fields with max length";
		$fields_with_max_lengths = array("username"=> 30, "password" => 8);
		validate_max_length($fields_with_max_lengths);
	
		if(empty($errors)){
			// try to log-in
			if($username == "Delton" && $password == "secret"){
				//successful login
				redirect_to('index.php');
			}else{
				$message = "Username/Password do not match.";
			}
		}
		
	}else{
		$username = "";
		$password = "";
		$message = "Please log in."; 
	
		}			
?>

<div class="row">
	<div class="large-12">
	<?php echo $message; ?><br />
	<?php echo form_errors($errors) . "<br />"; ?>
		<form action="form_with_validation.php" method="post">
			Username:
			<input type="text" name="username" value="<?php echo htmlspecialchars($username); ?>" tabindex="1" />
			<br />
			Password:
			<input type="password" name="password" value="<?php echo htmlspecialchars($password); ?>" tabindex="2" />
			<br />
			<input type="submit" name="submit" value="Submit" tabindex="3" />
		</form>
	</div>
</div>
<?php require_once ('includes/footer.php');
