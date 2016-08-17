<?php include('includes/header.php')?>
			<div class="row">
			<?php 
				$query = "SELECT * ";
				$query .= "FROM subjects ";
				$query .= "WHERE visible = 1 ";
				$query .= "ORDER BY position ASC";
	
				$result = mysqli_query($connection, $query);
				// Test if there was a querry error.
			?>
			
			<ul>
			<?php 	
				while($row = mysqli_fetch_assoc($result)){
					// output data from each row 
					echo "<li>";
					echo $row['menu_name'] . " (" . $row['id'] . ")" . "<br />";
					echo "</li>";
   				}?>
				</ul>
				
				<?php mysqli_free_result($result); ?>	
				
			</div>
<?php include('includes/footer.php')?>
