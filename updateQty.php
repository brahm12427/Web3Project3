<?php
if (isset($_POST['adjustID']) && $_POST['adjustID'] !="") {
	$id=$_POST['adjustID'];
	$quantity=$_POST['quantity'];
	// read the cookie
	$cookie = $_COOKIE['cart_cookie'];
	$cookie = stripslashes($cookie);
	$saved_cart = json_decode($cookie, true);
	$saved_cart[$id]=$quantity;
	// put item to cookie
	$json = json_encode($saved_cart, true);
	// have cookie stay for 1 month
	setcookie('cart_cookie', $json, time() + (86400 * 30) );
} 
// redirect
header("location: index.php");
?>