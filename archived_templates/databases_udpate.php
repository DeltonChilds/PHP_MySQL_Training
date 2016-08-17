<?php include('includes/header.php')?>
			<div class="row">
			<?php 
	$menu_name = "Edit Me";
	$id = 2000; 
	$position = 4;
	$visible = 1; 
	// perform databse query
				$query = "UPDATE subjects SET "; 
				$query .= "menu_name = '{menu_name}', "; 
				$query .= "position = {$position}, "; 
				$query .= "visible = {$visible} ";
				$query .= "WHERE id = {$id}";
				

				$result = mysqli_query($connection, $query);
				// Test if there was a querry error.

				if($result && mysqli_affected_rows($connection)==1){
					// success
					echo "success!";
				}else{
					die("Database Connection Failed. " . mysqli_error($connection));
				}
			?>
	
				
			</div>
<?php include('includes/footer.php')?>
