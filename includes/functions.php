<?php
function confirm_query($result_set) {
	if (! $result_set) {
		die ( "Database query failed." );
	}
}
function find_all_subjects() {
	global $connection;
	$query = "SELECT * ";
	$query .= "FROM subjects ";
	$query .= "WHERE visible = 1 ";
	$query .= "ORDER BY position ASC";
	$subject_set = mysqli_query ( $connection, $query );
	confirm_query ( $subject_set );
	return $subject_set;
}
function find_pages_for_subject($subject_id) {
	global $connection;
	
	$query = "SELECT * ";
	$query .= "FROM pages ";
	$query .= "WHERE visible = 1 ";
	$query .= "AND subject_id = {$subject_id} ";
	$query .= "ORDER BY position ASC";
	$page_set = mysqli_query ( $connection, $query );
	confirm_query ( $page_set );
	return $page_set;
}
function navigation($selected_subject_id, $selected_page_id) {
	$output = "<ul class=\"dropdown menu subjects\" data-dropdown-menu>";
	$subject_set = find_all_subjects ();
	
	while ( $subject = mysqli_fetch_assoc ( $subject_set ) ) {
		// output data from each row
		
		$output .= "<li";
		if ($subject ["id"] == $selected_subject_id) {
			$output .= " class=\"selected\"";
		}
		
		$output .= ">";
		
		$output .= "<a href=\"manage_content.php?subject=";
		$output .= urlencode ( $subject ['id'] ) . "\">";
		$output .= $subject ['menu_name'] . "</a>";
		
		$page_set = find_pages_for_subject ( $subject ['id'] );
		$num_rows = mysqli_num_rows ( $page_set );
		if ($num_rows != 0) {
			
			$output .= "<ul class=\"menu pages\">";
			
			while ( $page = mysqli_fetch_assoc ( $page_set ) ) {
										// output data from each row
										
	          $output .= "<li";
	          		if ($page["id"] == $selected_page_id){
	          		$output .= " class=\"selected\"";}
					$output .= ">"; 
	          
	          $output .= "<a href=\"manage_content.php?page="; 
	          $output .= urlencode($page['id']) . "\">";
	          $output .= $page['menu_name'] . "</a></li>";
	          } 
	          $output .= "</ul>";
	        mysqli_free_result($page_set); 
	        
								
	}
			
	      $output .= "</li>";
	      }
	    $output .= "</ul>";
	    mysqli_free_result($subject_set); 
	 return $output;
}
?>