<!DOCTYPE html>
<head>
<title>Music List</title>

<style>
	#wrapper{
		margin: 0 auto;
		width: 1400px;
		}
    #main {
		float:left;
		width:750px;
		background:#d8d8d8;
	}
	img {
		display: block;
		margin-top: 10px;
		margin-left: auto;
		margin-right: auto }
    
    #cart {
		float:right;
		width:600px;
		background:#d8d8d8;
	}
	h1{
	   color: #4479BA;
	   font-family:arial;
	}
	
	.price, .qty, .format, .descript, .album  { margin-left: 109px;
	}
	.store{ text-align: center; 
	}
	
	.button {
		margin-right: 10px;
		margin-left:10px;
		text-decoration: none;
	    padding: 3px 5px;
		background: #4479BA;
		color: #FFF;
		-webkit-border-radius: 4px;
		-moz-border-radius: 4px;
		border-radius: 4px;
		border: solid 1px #20538D;
		text-shadow: 0 -1px 0 rgba(0, 0, 0, 0.4);
		-webkit-box-shadow: inset 0 1px 0 rgba(255, 255, 255, 0.4), 0 1px 1px rgba(0, 0, 0, 0.2);
		-moz-box-shadow: inset 0 1px 0 rgba(255, 255, 255, 0.4), 0 1px 1px rgba(0, 0, 0, 0.2);
		box-shadow: inset 0 1px 0 rgba(255, 255, 255, 0.4), 0 1px 1px rgba(0, 0, 0, 0.2);
	}
	
	
</style>
</head>

<body>

<div id="wrapper">
<div id="main">
	<img src="store.png" alt="store" style="width:10%;height:10%">
	<div class="store"><h1> Music Store</h1></div> 
	<?php
	// Create connection to MySQL server for ****XAMPP*****
	$con=mysqli_connect("localhost","root","","inventory");
	// Create connection to MySQL server for ****debbiebrahm.com*****
	//$con=mysqli_connect("localhost","debbiebr_user","toilets","debbiebr_collections");
	// Check connection
	if (mysqli_connect_errno()) {
		echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}

	$sql_select = "SELECT * From music";
	// $result will actually be two dimentional array of the entire table
	$result = mysqli_query($con, $sql_select);
	 
	while($row = mysqli_fetch_array($result)) {
		echo '<a href="cart.php?selId='.$row['id'].'"class="button" >Add to Cart</a>';
		
		echo '<b>'.$row['band'].' </b>';
		echo "</br>";
		echo '<div class="album"><b>Album Name:</b> '.$row['album'].' </div>';
		echo '<div class="descript"><b>Description:</b> '.$row['description'].'</div>';
		echo '<div class="format"><b>Format:</b> '.$row['format'].'</div>';
		echo '<div class="price"><b>Price:</b> '.$row['price'].'</div>';
		echo '<div class="qty"><b>Quantity available:</b> '.$row['quantity_aval'].'</div>';
		echo "</br>";
		echo "</br>";
	}

	?>
</div>


<div id="cart">
	
	<img src="cart.png" alt="shopping cart" style="width:15%;height:15%">
	<div class="store"><h1> Shopping Cart</h1></div> 
	</br>
	</br>
	</br>
	</br>
	</br>
	<a href="addinvent.php" class="button" >Add Inventory</a>
	</br>
	</br>
</div>	
</div>
</body>	