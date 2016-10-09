<?php
require_once ('includes/session.php');
require_once ('includes/db_connection.php');
require_once ('includes/functions.php');
?>
<?php

$current_subject = find_subject_by_id ( $_GET ['subject'] );

if (! $current_subject) {
	// subject ID was missing or invalid or
	// subject conldn't be found in database
	redirect_to ( "manage_content.php" );
}

$id = $current_subject ['id'];

$pages_set = find_pages_for_subject($current_subject["id"]);

if (mysqli_num_rows($pages_set) > 0){
	$_SESSION["message"] = "You can't delete a subject with pages. Please reassign or delete pages first. ";
	redirect_to("edit_subject.php?subject={$id}");
	
}

$query = "DELETE FROM subjects WHERE id= {$id} LIMIT 1";

$result = mysqli_query ( $connection, $query );
// Test if there was a querry error.

if ($result && mysqli_affected_rows ( $connection ) == 1) {
	// success
	$_SESSION ["message"] = "Subject deleted.";
	redirect_to ("manage_content.php");
} else {
	// catastrophic failure
	$_SESSION["message"] = "Subject deletion failed myserably.";
	redirect_to("manage_content.php?subject={$id}");
}

?>