<?php include('includes/header.php')?>
			<div class="row">
			<?php 
	$id = 24; 
	// perform databse query
				$query = "DELETE FROM subjects "; 
				$query .= "WHERE id = {$id} "; 
				$query .= "LIMIT 1";

				

				$result = mysqli_query($connection, $query);
				// Test if there was a querry error.

				if($result && mysqli_affected_rows($connection) == 1){
					// success
					echo "success!";
				}else{
					die("SUBJECT DELETE Failed. " . mysqli_error($connection));
				}
			?>
	
				
			</div>
<?php include('includes/footer.php')?>
