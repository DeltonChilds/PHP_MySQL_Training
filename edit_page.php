<?php
require_once ('includes/session.php');
require_once ('includes/db_connection.php');
require_once ('includes/functions.php');
include_once ('includes/layouts/header.php');
?>
<?php require_once ('includes/validation_functions.php');?>
<?php find_selected_page(); ?>
<?php

if (! $current_page) {
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
			"visible", 
			"subject_id"
				);
	
	validate_presences ( $required_fields );
	
	$fields_with_max_lengths = array (
			"menu_name" => 30 
	);
	
	validate_max_lengths ( $fields_with_max_lengths );
	
	if (empty ( $errors )) {
		
		// Perform update
		$id = $current_page["id"];
		$menu_name = mysql_prep ( $_POST ["menu_name"] );
		$position = ( int ) $_POST ['position'];
		$visible = ( int ) $_POST ['visible'];
		$subject_id = (int) $_POST['subject_id'];
		$content = mysql_prep($_POST["content"]);
		
		$query = "UPDATE pages SET ";
		$query .= "subject_id = {$subject_id}, ";
		$query .= "menu_name = '{$menu_name}', ";
		$query .= "position = {$position}, ";
		$query .= "visible = {$visible}, ";
		$query .= "content = '{$content}' ";
		$query .= "WHERE id = {$id} ";
		$query .= "LIMIT 1";		
		$result = mysqli_query ( $connection, $query );
		// Test if there was a querry error.
		
		if ($result && mysqli_affected_rows($connection) >= 0) {
			// success
			$url = "edit_page.php?page=" . $current_page['id'];
			$_SESSION["message"] = "Page updated.";
			redirect_to($url);
		} else {
			// catastrophic failure
			$message = "Page update failed miserably. Here is the data you attempted to pass in";
			
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
		<h2>Edit Page</h2>
		<form
			action="edit_page.php?page=<?php echo urlencode($current_page["id"]);?>"
			method="post">
			<p>
				<label for="menu_name">Menu Name:</label> <input type="text"
					name="menu_name" id="menu_name"
					value="<?php echo htmlentities($current_page["menu_name"]);?>" />
			</p>

			<p>
				<label for="subject_id">Subject</label> <select name="subject_id"
					id="subject_id">
				<?php
				$subject_set = find_all_subjects();
				$subject_count = mysqli_num_rows ($subject_set);
				for($count = 1; $count <= $subject_count; $count ++) {
					echo "<option value=\"{$count}\"";
					if ($current_page ["subject_id"] == $count) {
						echo " selected ";
					}
					echo ">{$count}</option>";
				}
				?>
				</select>
			</p>

			<p>
				<label for="position">Position</label> <select name="position"
					id="position">
				<?php
				$page_set = find_pages_for_subject($current_page["subject_id"]);
				$page_count = mysqli_num_rows ( $page_set );
				for($count = 1; $count <= $page_count; $count ++) {
					echo "<option value=\"{$count}\"";
					if ($current_page ["position"] == $count) {
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
					<?php if($current_page["visible"] == 0){echo "checked";}?> />No
				<input type="radio" name="visible" value="1"
					<?php if($current_page["visible"] == 1){echo "checked";}?> />Yes
			</p>
			
			<p>
				<label for="content">Page Content:</label> <textarea name="content" class="page_content_textarea" rows="5"><?php echo $current_page['content']; ?></textarea>
					
			</p>
			
			<p>
				<input class="button success" type="submit" name="submit"
					title="Edit Subject Now" value="Save Changes" />
			</p>
			
				<a href="manage_content.php"
					title="Return to Manage Content Interface" target="_self"
					class="button">Cancel</a>
			
			
				<a href="delete_page.php?subject=<?php echo urlencode($current_page["id"]); ?>"
					title="Delete this page from the database" target="_self"
					class="button alert" onclick="return confirm('Are You Sure?');">Delete Page</a>
			
		</form>

	</section>

</div>
<?php
include_once 'includes/layouts/footer.php';
?>
