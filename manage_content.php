<?php
require_once ('includes/db_connection.php');
?>
<?php
	require_once 'includes/functions.php';
?>
<?php $query = "SELECT * ";
	$query .= "FROM subjects ";
	$query .= "WHERE visible = 1 ";
	$query .= "ORDER BY position ASC";

	$result = mysqli_query($connection, $query);
	// Test if there was a querry error.
	
	confirm_query($result);
	
?>
<?php
	include_once 'includes/layouts/header.php';
?>
<nav class="row">
	<div class="large-12 columns">
		<ul class="menu subjects">
			<?php
				while ($row = mysqli_fetch_assoc($result)) {
					// output data from each row
					echo "<li><a href=\"#\">";
					echo $row['menu_name'] . " (" . $row['id'] . ")" . "<br />";
					echo "</a></li>";
				}
			?>
		</ul>

	</div>
</nav>

<div class="row">

	<section class="large-4 medium-2 small-12 columns">
		<h2>Manage Content</h2>
		<p>
			Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero sit amet quam egestas semper. Aenean ultricies mi vitae est.
		</p>

	</section>

	<section class="large-8 medium-10 small-12 columns">
		<h2>HTML Ipsum</h2>
		<p>
			Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero sit amet quam egestas semper. Aenean ultricies mi vitae est. Mauris placerat eleifend leo. Quisque sit amet est et sapien ullamcorper pharetra. Vestibulum erat wisi, condimentum sed, commodo vitae, ornare sit amet, wisi. Aenean fermentum, elit eget tincidunt condimentum, eros ipsum rutrum orci, sagittis tempus lacus enim ac dui. Donec non enim in turpis pulvinar facilisis. Ut felis. Praesent dapibus, neque id cursus faucibus, tortor neque egestas augue, eu vulputate magna eros eu erat. Aliquam erat volutpat. Nam dui mi, tincidunt quis, accumsan porttitor, facilisis luctus, metus
		</p>
	</section>
</div>
<?php mysqli_free_result($result); ?>
<?php
	include_once 'includes/layouts/footer.php';
?>
