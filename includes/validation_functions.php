<?php 

$errors = array();


function fieldname_as_text($fieldname){
	$fieldname = str_replace("_", " ", $fieldname);
	$fieldname = ucfirst($fieldname);
	return $fieldname;	
}

// presense
function has_presense($value){
	return isset($value) && $value !=="";
	}					
	
// validates presense of muliptle fields. 
function validate_presences($required_fields){
	global $errors;
	foreach ($required_fields as $field){
		$value = trim($_POST[$field]);
		if (!has_presense($value)){
			$errors[$field] = fieldname_as_text($field) . " can't be blank.";
		}
		
	}
}
	
// maximum lengths loop 
	function validate_max_lengths($fields_with_max_lengths){
		global $errors;
		//using an assoc. array
		foreach($fields_with_max_lengths as $field => $max){
			$value = trim($_POST[$field]);
			if(!has_max_length($value, $max)){
				$errors[$field] = fieldname_as_text($field) . " is too long.";
			}
		}
	}
	
function has_max_length($value, $max){
	return strlen($value) <= $max;	
}
	
// inclusion in a set
	function has_inclusion_in($value, $set){
		return in_array($value, $set);
		}	
			
?>