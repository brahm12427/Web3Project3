<?php
// Create connection to MySQL server for ****XAMPP*****
	$con=mysqli_connect("localhost","root","","inventory");
	// Create connection to MySQL server for ****debbiebrahm.com*****
	//$con=mysqli_connect("localhost","debbiebr_user","toilets","debbiebr_collections");
	// Check connection
	if (mysqli_connect_errno()) {
		echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}
?>