<?php require_once ('includes/db_connection.php');?>
<?php require_once 'includes/functions.php';?>

<?php 
	
if(isset($_POST["submit"])){
	
	
	$menu_name = mysql_prep($_POST['menu_name']);
	$position = (int) $_POST[''];
	$visible = (int) 1;
		
	$query = "INSERT INTO subjects (";
	$query .= " menu_name, position, visible";
	$query .= ") VALUES (";
	$query .= " '{$menu_name}', {$position}, {$visible}";
	$query .= " )";
	
	$result = mysqli_query($connection, $query);
	// Test if there was a querry error.
	
	if($result){
		// success
		$message = "Subject Created.";
		redirect_to('manage_content.php');
	}else{
		//catastrophic failure
		$message = "Subject creation fail myserably.";
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