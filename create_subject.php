<?php require_once ('includes/validation_functions.php');?>
<?php require_once ('includes/session.php');?>
<?php require_once ('includes/db_connection.php');?>
<?php require_once 'includes/functions.php';?>

<?php 
	
if(isset($_POST["submit"])){
	
	$id = $current_subject["id"];
	$menu_name = mysql_prep($_POST['menu_name']);
	$position = (int) $_POST['position'];
	$visible = (int) $_POST['visible'];
	
	// validations
	
	$required_fields = array("menu_name", "position", "visible");
	validate_presences($required_fields);
	
	$fields_with_max_lengths = array("menu_name" => 30);
	validate_max_lengths($fields_with_max_lengths);
	if(!empty($errors)){
		$_SESSION["errors"] = $errors;		
		redirect_to("new_subject.php");
	}
	
	$query = "INSERT INTO subjects (";
	$query .= " menu_name, position, visible";
	$query .= ") VALUES (";
	$query .= " '{$menu_name}', {$position}, {$visible}";
	$query .= ")";
	
	$result = mysqli_query($connection, $query);
	// Test if there was a querry error.
	
	if($result){
		// success
	$_SESSION["message"] = "Subject Created.";
		redirect_to('manage_content.php');
	}else{
		//catastrophic failure
	$_SESSION["message"] = "Subject creation fail myserably.";
		redirect_to("failure.php");
	}
	
	
}else {
	//This is probably a GET request.
	redirect_to("new_subject.php");
}

?>


<?php 	// close database connection
	if (isset($connection)) {
	mysqli_close($connection);
	}
?>