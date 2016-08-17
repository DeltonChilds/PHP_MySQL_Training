<?php include('includes/header.php')?>
<div class="row">
	<div class="large-12">
		<p><?php 
				$link_name="Second Page";
				$id=2;
			?></p>
			
			<p>
			<pre>
				<?php 
					print_r($_COOKIE['test']);
				?>
			</pre>
			</p>
		<a href="second_page.php?&id=<?php echo $id?>"><?php echo $link_name?></a> 
	</div>
</div>
<?php include('includes/footer.php')?>
