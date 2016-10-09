<?php
session_start();

function message(){
	
	if(isset($_SESSION['message'])){
	
	$output = "";
	$output .= "<div class=\"row\"><div class=\"callout\" style=\"margin:2%;\" data-closable>";
	$output .= "<button class=\"close-button\" data-close aria-label=\"Close alert\" type=\"button\">";
	$output .= "<span aria-hidden=\"true\">&times;</span>";
	$output .= "</button><p>";
	$output .= htmlentities($_SESSION['message']);
	$output .= "</p></div></div>";
	
	// Clears Message After Use
	$_SESSION['message'] = null;
	return $output;
	}
}

function errors(){
	
	if(isset($_SESSION['errors'])){
		$errors = $_SESSION["errors"];
		
		// Clears Errors
		$_SESSION['errors'] = null;
	
		return $errors;
	}
}



?>