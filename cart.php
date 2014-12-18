
<?php
// initialize empty cart items array
$cart_items=array();
 
// get the music id and quantity
$id = $_GET['selId'];
$qty = 1; 
// add new item on array
$cart_items[$id]=$qty;
 
// read the cookie
$cookie = $_COOKIE['cart_cookie'];
$cookie = stripslashes($cookie);
$saved_cart = json_decode($cookie, true);
 
// if $saved_cart_items is null, prevent null error
if(!$saved_cart){
    $saved_cart=array();
	//position 0 of saved_cart array will hold shipping info
	// 1 is standard shipping, 2 is 2 day ship and 3 is overnight shipping
	$saved_cart[0] = 1;
}
 
// check if the item is in the array, if it is, do not add
if(array_key_exists($id, $saved_cart)){
    // redirect to music list
    header("location: index.php");
}
 
else{
    // if cart has contents
    if(count($saved_cart)>0){
        foreach($saved_cart as $key=>$value){
            // add old item to array, it will prevent duplicate keys
            $cart_items[$key]=$value;
        }
			
    }
	// put item to cookie
    $json = json_encode($cart_items, true);
	// have cookie stay for 1 month
    setcookie('cart_cookie', $json, time() + (86400 * 30) );
 
    // redirect
    header("location: index.php");
}
 
?>
