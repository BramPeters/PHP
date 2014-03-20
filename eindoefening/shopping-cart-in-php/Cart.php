<?php
session_start();
?>
<html>
    <head>
        <link type="text/css" rel="stylesheet" href="css/style.css" />
    </head>
<body>

<div class='sectionContainer'>
	<div class='sectionHeader'>Shopping Cart</div>
	<?php 
		// this will make 'home', 'view products' and 'view cart' appear
		include 'Navigation.php' 
	?>
	
	<div class='sectionContents'>
	<?php
	if(isset($_GET['action']) && $_GET['action']=='removed'){
		echo "<div>" . $_GET['name'] . " was removed from cart.</div>";
	}
	
	if(isset($_SESSION['cart'])){
		$ids = "";
		foreach($_SESSION['cart'] as $id){
			$ids = $ids . $id . ",";
		}
		
		// remove the last comma
		$ids = rtrim($ids, ',');
		
		require "libs/DbConnect.php";

		$query = "SELECT ProductId, ProductNaam, ProductPrijs FROM producten WHERE id IN ({$ids})";
		$stmt = $con->prepare( $query );
		$stmt->execute();

		$num = $stmt->rowCount();

		if($num>0){
			echo "<table border='0'>";//start table
			
				// our table heading
				echo "<tr>";
					echo "<th class='textAlignLeft'>Product Name</th>";
					echo "<th>Price (USD)</th>";
					echo "<th>Action</th>";
				echo "</tr>";
				
				//also compute for total price
				$totalPrice = 0;
				
				while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
					extract($row);
					
					$totalPrice += $price;
					
					//creating new table row per record
					echo "<tr>";
						echo "<td>{$name}</td>";
						echo "<td class='textAlignRight'>{$price}</td>";
						echo "<td class='textAlignCenter'>";
							echo "<a href='removeFromCart.php?id={$id}&name={$name}' class='customButton'>";
								echo "<img src='images/remove-from-cart.png' title='Remove from cart' />";
							echo "</a>";
						echo "</td>";
					echo "</tr>";
				}
				
				echo "<tr>";
					echo "<th class='textAlignCenter'>Total Price</th>";
					echo "<th class='textAlignRight'>{$totalPrice}</th>";
					echo "<th></th>";
				echo "</tr>";
				
			echo "</table>";
			echo "<br /><div><a href='#' class='customButton'>Checkout</a></div>";
		}else{
			echo "<div>No products found in your cart. :(</div>";
		}

	}else{
		echo "<div>No products in cart yet.</div>";
	}
	?>
	</div>
</div>

</body>
</html>