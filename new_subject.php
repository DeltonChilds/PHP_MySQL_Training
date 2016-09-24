<?php
require_once ('includes/db_connection.php');
?>
<?php

require_once 'includes/functions.php';
?>
<?php include_once 'includes/layouts/header.php'; ?>

<?php find_selected_page(); ?>
<nav class="row">
	<div class="large-12 columns">
		<?php echo navigation($current_subject, $current_page); ?>
  </div>
</nav>
<div class="row">
	<section class="large-6 medium-12 small-12 columns">

		<form action="create_subject.php" method="post">
			<p>
				<label for="menu_name">Menu Name:</label> <input type="text"
					name="menu_name" id="menu_name" value="" />
			</p>

			<p>
				<label for="position">Position</label> <select name="position"
					id="position">
				<?php
				$subject_set = find_all_subjects ();
				$subject_count = mysqli_num_rows ( $subject_set );
				for($count = 1; $count <= ($subject_count + 1); $count ++) {
					echo "<option value=\"{$count}\">{$count}</option>";
				}
				?>
				</select>
			</p>

			<p>
				<label for="visible">Visible</label> <input type="radio"
					name="visible" value="0" />No <input type="radio" name="visible"
					value="1" />Yes
			</p>
			<p>
				<input class="button" type="submit" name="submit" title="Create New Subject Now"
					value="Create Subject" />
			</p>
			<p>
				<a href="manage_content.php"
					title="Return to Manage Content Interface" target="_self"
					class="button">Cancel</a>
			</p>
		</form>

	</section>

</div>
<?php
include_once 'includes/layouts/footer.php';
?>
