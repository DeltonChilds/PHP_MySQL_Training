<?php
require_once ('includes/db_connection.php');
?>
<?php
	require_once 'includes/functions.php';
?>
<?php
	include_once 'includes/layouts/header.php';
?>
<nav class="row">
  <div class="large-12 columns" >
    <ul class="dropdown menu subjects" data-dropdown-menu >
      <?php $query = "SELECT * ";
	$query .= "FROM subjects ";
	$query .= "WHERE visible = 1 ";
	$query .= "ORDER BY position ASC";

	$subject_set = mysqli_query($connection, $query);
	// Test if there was a querry error.
	
	confirm_query($subject_set);
	
?>
      <?php
				while ($subject = mysqli_fetch_assoc($subject_set)) {
					// output data from each row
					?>
      <li><a href=""> <?php echo $subject['menu_name'] ?> </a>
        <?php $query = "SELECT * ";
				$query .= "FROM pages ";
				$query .= "WHERE visible = 1 ";
				$query .= "AND subject_id = {$subject['id']} ";
				$query .= "ORDER BY position ASC"; 
				$page_set = mysqli_query($connection, $query);
				confirm_query($page_set);
					
					$num_rows = mysqli_num_rows($page_set);
					
					if($num_rows != 0){ ?>
        <ul class="menu pages">
          <?php 
						while ($page = mysqli_fetch_assoc($page_set)) {
					// output data from each row
					?>
          <li><a href="#"> <?php echo $page['menu_name'] ?> </a></li>
          <?php } ?>
        </ul>
        <?php mysqli_free_result($page_set); ?>
        <?php	}
				?>
      </li>
      <?php } ?>
    </ul>
    <?php mysqli_free_result($subject_set); ?>
  </div>
</nav>
<div class="row">
  <section class="large-4 medium-2 small-12 columns">
    <h2>Manage Content</h2>
    <p> Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero sit amet quam egestas semper. Aenean ultricies mi vitae est. </p>
  </section>
  <section class="large-8 medium-10 small-12 columns">
    <h2>HTML Ipsum</h2>
    <p> Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero sit amet quam egestas semper. Aenean ultricies mi vitae est. Mauris placerat eleifend leo. Quisque sit amet est et sapien ullamcorper pharetra. Vestibulum erat wisi, condimentum sed, commodo vitae, ornare sit amet, wisi. Aenean fermentum, elit eget tincidunt condimentum, eros ipsum rutrum orci, sagittis tempus lacus enim ac dui. Donec non enim in turpis pulvinar facilisis. Ut felis. Praesent dapibus, neque id cursus faucibus, tortor neque egestas augue, eu vulputate magna eros eu erat. Aliquam erat volutpat. Nam dui mi, tincidunt quis, accumsan porttitor, facilisis luctus, metus </p>
  </section>
</div>
<?php
	include_once 'includes/layouts/footer.php';
?>