<?php
if (isset($_POST['ship']) && $_POST['ship'] !="") {
	$ship=$_POST['ship'];
 	// read the cookie
	$cookie = $_COOKIE['cart_cookie'];
	$cookie = stripslashes($cookie);
	$saved_cart = json_decode($cookie, true);
	//position 0 of saved_cart array will hold shipping info
	// 1 is standard shipping, 2 is 2 day ship and 3 is overnight shipping
	$saved_cart[0]=$ship;
	// put item to cookie
	$json = json_encode($saved_cart, true);
	// have cookie stay for 1 month
	setcookie('cart_cookie', $json, time() + (86400 * 30) );
} 
// redirect
header("location: index.php");
?>
