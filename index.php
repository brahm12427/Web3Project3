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
	
	.price, .qty, .format, .descript, .album { margin-left: 118px;
	}
	.band  {	font-size: 19px;
	}
	.store{ text-align: center; 
	}
	
	.button {
		margin-right: 10px;
		margin-left:10px;
		text-decoration: none;
	    padding: 1px 2px;
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
	.button2 {
		margin-right: 5px;
		margin-left:-18px;
		text-decoration: none;
	    padding: 1px 2px;
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
	td, th {
		text-align: left;
		height: 10px;
		vertical-align: middle;
		padding: 5px;
	}
	td.border_top {
		padding-top: 10px;
		border-top:1pt solid black;
	}
	
</style>
</head>

<body>

<div id="wrapper">
<div id="main">
	<img src="store.png" alt="store" style="width:10%;height:10%">
	<div class="store"><h1> Music Store</h1></div> 
	</br>
	<form name="form1" action="search.php" method='post'>
		<input type="submit" name="Submit" class="button" value="Search for Band"/>  	
		<input name="search" type="text" size="15" maxlength="25"/>
	</form>
	</br>
	</br>
	</br>
	<?php
	// Create connection to MySQL  
	include("dbconnect.php");
   	$sql_select = "SELECT * From music ORDER BY band";
	// $result will actually be two dimentional array of the entire table
	$result = mysqli_query($con, $sql_select);
	 
	while($row = mysqli_fetch_array($result)) {
		echo '<div class="band"><a href="cart.php?selId='.$row['id'].'" class="button" >Add to Cart</a>';
		echo '<b>'.$row['band'].' </b></div>';
		
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
	<?php
		$saved_cart = array();
		
		if (isset($_COOKIE["cart_cookie"])) {
			$cookie = $_COOKIE['cart_cookie'];
			$cookie = stripslashes($cookie);
			$saved_cart = json_decode($cookie, true);
		}

if(count($saved_cart)>0){
    // get the music ids
    $ids = "";
    foreach($saved_cart as $id=>$name){
        $ids = $ids . $id . ",";
    }
     // remove the last comma
    $ids = rtrim($ids, ',');
     //start table
    echo "<table>";
 
        // our table heading
        echo "<tr>";
			echo "<th></th>";
			echo "<th>Qty</th>";
            echo "<th>Band</th>";
			echo "<th>Album</th>";
            echo "<th>Price</th>";
			echo "<th>Item Total</th>";
        echo "</tr>";
				
		// get all the information for each id
        $sql_select = "SELECT id, band, album, price FROM music WHERE id IN ({$ids}) ORDER BY band";
		$result = mysqli_query($con, $sql_select);
        
        $total_price=0;
        while ($row = mysqli_fetch_array($result)){
            $currentID = $row['id']; 
            echo "<tr>";
				 echo "<td>";
                    echo "<form action='removeCart.php' method='post' >
					 <input type='submit' style='font-size: 13px' class='button'  value='Remove'/>
				<input name='adjustID' type='hidden' value='".$currentID."'/>
				</form>";
				echo "</td>";
				
				echo "<td><form action='updateQty.php' method='post'>
				<input name='quantity' type='text' value='".$saved_cart[$currentID]."'size='1' maxlength='2'/></br>
				<input type='submit' style='font-size: 10px' value='change'/>
				<input name='adjustID' type='hidden' value='".$currentID."'/>
				</form></td>";
				echo "<td>".$row['band']."</td>";
				echo "<td>".$row['album']."</td>";
                echo "<td>$".$row['price']."</td>";
				echo "<td>$".($row['price'] * $saved_cart[$currentID])."</td>";
            echo "</tr>";
 
            $total_price =($row['price'] * $saved_cart[$currentID]) +$total_price;
        }
		
        echo "<tr>";
				echo "<td></td>";
				echo "<td></td>";
				echo "<td class='border_top' > </td>";
				echo "<td class='border_top' ><b>Total</b></td>";
				echo "<td class='border_top' > </td>";
                echo "<td class='border_top'>$".$total_price."</td>";
        echo "</tr>";
 
    echo "</table>";
}
 
else{
    echo "<div>";
        echo "<strong>No products found</strong> in your cart!";
    echo "</div>";
}
 ?>
	</br>
	<a href="#" class="button" >Check Out</a>
	</br>
	</br>
</div>	
</div>
</body>	