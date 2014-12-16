<?php
	include("dbconnect.php");
	if (!isset($_POST['search'])) {
		header("Location:index.php");
	}
	
	$var = $_POST['search'];
	$sql_select = "SELECT * From music 
		ORDER BY 
	CASE	
		WHEN band LIKE '$var%' THEN 1
		ELSE 2 
	END, band ASC";
		
	//$result will actually be two dimentional array of the entire table
	$result = mysqli_query($con, $sql_select);
	while($row = mysqli_fetch_array($result)) {
		echo '<a href="cart.php?selId='.$row['id'].'&album='.$row['album'].'" class="button" >Add to Cart</a>';
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
	