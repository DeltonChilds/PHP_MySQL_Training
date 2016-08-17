<?php 



define("DB_SERVER", "localhost");
define("DB_USER", "widget_cms");
define("DB_PASSWORD", "secretpassword");
define("DB_NAME", "widget_corp");

$connection = mysqli_connect(DB_SERVER, DB_USER, DB_PASSWORD, DB_NAME);

if (mysqli_connect_errno()) {
	die("Database connection failed: " . mysqli_error() . " (" . mysqli_connect_errno() . ")");
}
?>