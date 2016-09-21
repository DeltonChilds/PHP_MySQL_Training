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
	//$query .= "WHERE visible = 1 ";
	$query .= "ORDER BY position ASC";
	$subject_set = mysqli_query ( $connection, $query );
	confirm_query ( $subject_set );
	return $subject_set;
}

function find_pages_for_subject($subject_id) {
	global $connection;
	
	$safe_subject_id= mysqli_real_escape_string($connection, $subject_id);
	
	$query = "SELECT * ";
	$query .= "FROM pages ";
	$query .= "WHERE visible = 1 ";
	$query .= "AND subject_id = {$safe_subject_id} ";
	$query .= "ORDER BY position ASC";
	$page_set = mysqli_query ( $connection, $query );
	confirm_query ( $page_set );
	return $page_set;
}

function navigation($subject_array, $page_array) {
	$output = "<ul class=\"dropdown menu subjects\" data-dropdown-menu>";
	$subject_set = find_all_subjects ();
	
	while ( $subject = mysqli_fetch_assoc ( $subject_set ) ) {
		// output data from each row
		
		$output .= "<li";
		if ($subject_array && $subject ["id"] == $subject_array["id"]) {
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
	          		if ($page_array && $page["id"] == $page_array["id"]){
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

function find_subject_by_id($subject_id){
	global $connection;
	
	$safe_subject_id= mysqli_real_escape_string($connection, $subject_id);
	
	$query = "SELECT * ";
	$query .= "FROM subjects ";
	$query .= "WHERE id = {$safe_subject_id} ";
	$query .= "LIMIT 1";
	$subject_set = mysqli_query ( $connection, $query );
	confirm_query ( $subject_set );
	if($subject = mysqli_fetch_assoc($subject_set)){
		return $subject;	
	}else {
		return null;
	}	
	
}

function find_page_by_id($page_id){
	global $connection;

	$safe_page_id= mysqli_real_escape_string($connection, $page_id);

	$query = "SELECT * ";
	$query .= "FROM pages ";
	$query .= "WHERE id = {$safe_page_id} ";
	$query .= "LIMIT 1";
	$page_set = mysqli_query ( $connection, $query );
	confirm_query ( $page_set );
	if($page = mysqli_fetch_assoc($page_set)){
		return $page;
	}else {
		return null;
	}

}

function find_selected_page(){
	
	global $current_subject;
	global $current_page;
	
	if (isset ( $_GET ["subject"] )) {
		$current_subject = find_subject_by_id($_GET ["subject"]);
		$selected_page_id = null;
		$current_page = null;
	} elseif (isset ( $_GET ["page"] )) {
		$current_page = find_page_by_id( $_GET ["page"]);
		$selected_subject_id = null;
		$current_subject = null;
	} else {
		$current_page = null;
		$current_subject = null;
	}
	
	
}


?>