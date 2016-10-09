<footer class="row">
	<section class="12-large columns">
		<p>
			&copy; Delton Childs - <?php echo date("Y") ?>
		</p>
	</section>
</footer>
</div> <!--  End .container div -->
<script>
   $(document).ready(function() {
      $(document).foundation();
   })
</script>

</body>
</html>
<?php
	// close database connection
	if (isset($connection)) {
		mysqli_close($connection);
	}
?>