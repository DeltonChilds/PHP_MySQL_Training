<footer class="row">
	<section class="12-large columns">
		<p>
			&copy; Delton Childs
		</p>
	</section>
</footer>
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