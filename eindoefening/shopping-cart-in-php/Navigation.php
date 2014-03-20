<?php
if(isset($_GET['action'])){
$cartItemCount = count($_SESSION['cart']);
}
?>
<div class='navigation'>
	<a href='index.php' class='customButton'>Home</a>
	<a href='Products.php' class='customButton'>View Products</a>
        <a href='Cart.php' class='customButton'>View Cart <?php if(isset($cartItemCount)){echo "({$cartItemCount})";} ?></a>
</div>