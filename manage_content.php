<?php
require_once ('includes/session.php');
?>
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
<?php echo message();?>

<div class="row">
	
	<section class="large-12 medium-12 small-12 columns">
		<h2>Manage Content</h2>
		<p>
	Menu Name: 
		<?php if($current_subject) { ?>
		 			
			<?php echo htmlentities($current_subject['menu_name'])?><br>
			Position: <?php echo htmlentities($current_subject['position'])?><br>
			Visible: <?php echo htmlentities($current_subject['visible']) == 1 ? 'yes' : 'no'; ?>
			</p>
			<p>
			 <a href="edit_subject.php?subject=<?php echo urlencode($current_subject['id']); ?>" title="edit details of <?php echo $current_subject['menu_name']; ?> subject" class="button small">Edit Subject</a>
			</p>
			
			<?php
			$subject_pages = find_all_pages_for_subject($current_subject["id"]);
			if(mysqli_num_rows($subject_pages) > 0){
				
				echo "<hr><h3>Pages for this Subject</h3>";
				
				echo "<p>";
					
					
				foreach ($subject_pages as $page){
						
					echo "<a href=\"manage_content.php?page={$page['id']}\" title=\"edit page for this subject\">" . $page['menu_name'] . "</a><br>";
				
				}
				echo "</p>";
								
			}
						
				
			?>			
						
		<?php  }elseif($current_page){ ?>			
				
			<?php  echo htmlentities($current_page["menu_name"]); ?><br>
			Position: <?php echo htmlentities($current_page['position']);?><br>
			Visible: <?php echo htmlentities($current_page['visible']) == 1 ? 'yes' : 'no'; ?><br>
			Content:<br> <div class="panel callout radius"><?php echo htmlentities($current_page['content']); ?></div>
			
			 <a href="edit_page.php?page=<?php echo urlencode($current_page['id']); ?>" title="edit details of <?php echo $current_page['menu_name']; ?> page" class="button small" >Edit Page</a>
					
		<?php }else {?>
		
				<?php echo "Please select a subject or page. "?>
		
		<?php }?>
	</section>
</div>
<?php
include_once 'includes/layouts/footer.php';
?>
