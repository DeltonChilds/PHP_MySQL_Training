<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">

		<!-- Always force latest IE rendering engine (even in intranet) & Chrome Frame
		Remove this if you use the .htaccess -->
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

		<title>Basic</title>
		<meta name="description" content="">
		<meta name="author" content="Delton Childs">

		<meta name="viewport" content="width=device-width; initial-scale=1.0">

		<!-- Replace favicon.ico & apple-touch-icon.png in the root of your domain and delete these references -->
		<link rel="shortcut icon" href="/favicon.ico">
		<link rel="apple-touch-icon" href="/apple-touch-icon.png">
	    <link rel="stylesheet" href="css/foundation.min.css">
	    <link rel="stylesheet" href="css/app.css">
    	<script src="js/modernizr-custom.js"></script>
	</head>

	<body>
		
		<?php $link_name = "Second Page" ?>
		<?php $id = 2; ?>
		
		<div class="row">
			<header class="row 12-col-large">
				<h1>Basic HTML Template</h1>
			</header>
			<nav class="row 12-col-large">
				<p>
					<a href="second_page.php?id=<?php echo $id; ?>"><?php echo $link_name; ?></a>
				</p>
			</nav>

			<div>

			</div>

			<footer class="row 12-col-large">
				<p>
					&copy; Copyright  by Delton Childs
				</p>
			</footer>
		</div>
		
	</body>
</html>
