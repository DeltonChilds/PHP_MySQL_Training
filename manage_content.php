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
		<h2>Manage Content</h2>
	Menu Name: 
		<?php if($current_subject) { ?>
		 			
			<?php echo $current_subject['menu_name']?>
						
		<?php  }elseif($current_page){ ?>			
				
			<?php  echo $current_page["menu_name"] ?>
					
		<?php }else {?>
		
				<?php echo "Please select a subject or page. "?>
		
		<?php }?>
	</section>
	
	<section class="large-8 medium-6 small-12 columns">
		<h2>HTML Ipsum</h2>
		<p>Pellentesque habitant morbi tristique senectus et netus et
			malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat
			vitae, ultricies eget, tempor sit amet, ante. Donec eu libero sit
			amet quam egestas semper. Aenean ultricies mi vitae est. Mauris
			placerat eleifend leo. Quisque sit amet est et sapien ullamcorper
			pharetra. Vestibulum erat wisi, condimentum sed, commodo vitae,
			ornare sit amet, wisi. Aenean fermentum, elit eget tincidunt
			condimentum, eros ipsum rutrum orci, sagittis tempus lacus enim ac
			dui. Donec non enim in turpis pulvinar facilisis. Ut felis. Praesent
			dapibus, neque id cursus faucibus, tortor neque egestas augue, eu
			vulputate magna eros eu erat. Aliquam erat volutpat. Nam dui mi,
			tincidunt quis, accumsan porttitor, facilisis luctus, metus</p>
	</section>
</div>
<?php
include_once 'includes/layouts/footer.php';
?>
