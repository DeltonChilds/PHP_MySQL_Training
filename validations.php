<?php 
require_once("includes/functions.php"); 
include("includes/header.php");
?>
	<div class="row">
			<div class="large-12">
		<p>
		<?php 
			// presense
			$value = "x";
			if(!isset($value) || empty($value)){
				echo "Validation failed.<br />";
				}
							
			// minimum & maximum length 
            $value = "12345";
			$min = "5";
			if(strlen($value) < $min){
				echo "Validation failed. Value must be a minimum of 5 chars.<br />";
				}
			$max = "12";	
			if(strlen($value) > $max){
				echo "Validation failed. Value must be a maximum of 12 chars.<br />";
				}
			
			// Type 
			
			$value = "1";
            if(!is_string($value)){
				echo "Validation failed. Value must be a string.<br />";
				}
				
			// inclusion in a set
			
			$value = "6";
            $set = array("1", "2", "3", "4", "5", "6");
			if(!in_array($value, $set)){
				echo "Validation failed. Value must be in set.<br />";
				}
			
			// uniqueness 
			// uses a database to check uniqueness
			
			// format 
			// use a regex on a string
			// preg_match($regex, $subject)
			if(preg_match("/PHP/", "PHP is fun")){
					echo "A match was found <br />";
				}else{
					echo "Validation failed: A match was not found.<br />";
					}
			$value = "delton@deltonchilds.com";
			if(!preg_match("/@/", $value)){
					echo "A match was found <br />";
				}else{
					echo "Validation failed: email must contain \"@\" symbol.<br />";
					}
						
			
            ?>
            
        </p>
        
        
		</div>
	
	</div>

<?php require_once ('includes/footer.php');