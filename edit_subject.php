<?php
require_once ('includes/session.php');
require_once ('includes/db_connection.php');
require_once ('includes/functions.php');
include_once ('includes/layouts/header.php');
?>
<?php require_once ('includes/validation_functions.php');?>
<?php find_selected_page(); ?>
<?php

if (! $current_subject) {
	// subject ID was missing or invalid or
	// subject conldn't be found in database
	redirect_to ( "manage_content.php" );
}
?>
<?php

if (isset ( $_POST ["submit"] )) {
	
	// validations
	
	$required_fields = array (
			"menu_name",
			"position",
			"visible" 
	);
	
	validate_presences ( $required_fields );
	
	$fields_with_max_lengths = array (
			"menu_name" => 30 
	);
	
	validate_max_lengths ( $fields_with_max_lengths );
	
	if (empty ( $errors )) {
		
		// Perform update
		$id = $current_subject["id"];
		$menu_name = mysql_prep ( $_POST ["menu_name"] );
		$position = ( int ) $_POST ['position'];
		$visible = ( int ) $_POST ['visible'];
		
		$query = "UPDATE subjects SET ";
		$query .= "menu_name = '{$menu_name}', ";
		$query .= "position = {$position}, ";
		$query .= "visible = {$visible} ";
		$query .= "WHERE id = {$id} ";
		$query .= "LIMIT 1";		
		$result = mysqli_query ( $connection, $query );
		// Test if there was a querry error.
		
		if ($result && mysqli_affected_rows($connection) >= 0) {
			// success
			$url = "edit_subject.php?subject=" . $id;
			$_SESSION["message"] = "Subject updated.";
			redirect_to($url);
		} else {
			// catastrophic failure
			$message = "Subject update failed miserably. Here is the data we attempted to pass in: (id: ". $id . "<br> menu_name: " .  $menu_name ."<br> Position: " . $position . "<br> Visible: " . $visible . ")";
		}
	}
} else {
		// This is probably a GET request.
} // end: if (isset ( $_POST ["submit"] )) 

?>
<nav class="row">
	<div class="large-12 columns">
		<?php echo navigation($current_subject, $current_page); ?>
  </div>
</nav>
<?php 
	if (!empty($message)){
	 echo htmlentities($message);
	}
	
	echo message();

?>
	<?php echo form_errors($errors); ?>
<div class="row">
	<section class="large-12 medium-12 small-12 columns">
		<h2>Edit Subject</h2>
		<form
			action="edit_subject.php?subject=<?php echo urlencode($current_subject["id"]);?>"
			method="post">
			<p>
				<label for="menu_name">Menu Name:</label> <input type="text"
					name="menu_name" id="menu_name"
					value="<?php echo htmlentities($current_subject["menu_name"]);?>" />
			</p>

			<p>
				<label for="position">Position</label> <select name="position"
					id="position">
				<?php
				$subject_set = find_all_subjects ();
				$subject_count = mysqli_num_rows ( $subject_set );
				for($count = 1; $count <= $subject_count; $count ++) {
					echo "<option value=\"{$count}\"";
					if ($current_subject ["position"] == $count) {
						echo " selected ";
					}
					echo ">{$count}</option>";
				}
				?>
				</select>
			</p>

			<p>
				<label for="visible">Visible</label> <input type="radio"
					name="visible" value="0"
					<?php if($current_subject["visible"] == 0){echo "checked";}?> />No
				<input type="radio" name="visible" value="1"
					<?php if($current_subject["visible"] == 1){echo "checked";}?> />Yes
			</p>
			<p>
				<input class="button success" type="submit" name="submit"
					title="Edit Subject Now" value="Save Changes" />
			</p>
			
				<a href="manage_content.php"
					title="Return to Manage Content Interface" target="_self"
					class="button">Cancel</a>
			
			
				<a href="delete_subject.php?subject=<?php echo urlencode($current_subject["id"]); ?>"
					title="Delete this subject from the database" target="_self"
					class="button alert" onclick="return confirm('Are You Sure?');">Delete Subject</a>
			
		</form>

	</section>

</div>
<?php
include_once 'includes/layouts/footer.php';
?>
