<?php require_once('includes/header.php')?>
			<div class="row">
				<pre>
					<?php print_r($_GET); ?>
				</pre>
				<?php
					$id=$_GET['id'];
					$company=$_GET['company'];
					echo $id."</br>";
					echo $company;
				 ?>
			</div>
<?php require_once('includes/footer.php')?>