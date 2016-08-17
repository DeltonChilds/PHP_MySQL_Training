<?php include('includes/header.php')?>
			<div class="row">
			<?php 
	$menu_name = "Today's Widget Trivia";
	$position = (int) 4;
	$visible = (int) 1; 
	
	// escape all STRING  
	$menu_name = mysqli_real_escape_string($connection, $menu_name);
	
	// perform databse query
				$query = "INSERT INTO subjects ("; 
				$query .= " menu_name, position, visible";
				$query .= ") VALUES (";
				$query .= " '{$menu_name}', {$position}, {$visible}"; 
				$query .= " )";
	
				$result = mysqli_query($connection, $query);
				// Test if there was a querry error.

				if($result){
					// success
					echo "success!";
				}else{
					die("Database Connection Failed. " . mysqli_error($connection));
				}
			?>
	
				
			</div>
<?php include('includes/footer.php')?>
