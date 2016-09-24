<?php
require_once ('includes/db_connection.php');
?>
<?php require_once 'includes/functions.php';
?>
<?php include_once 'includes/layouts/header.php'; ?>

<?php find_selected_page(); ?>
<nav class="row">
	<div class="large-12 columns">
		<?php echo navigation($current_subject, $current_page); ?>
  </div>
</nav>
<div class="row">
	<section class="large-4 medium-6 small-12 columns">
		<h2>Complete Fail</h2>
		<p>Some kind of catastrophic failure has occured.</p>
	</section>
	

</div>
<?php
include_once 'includes/layouts/footer.php';
?>
