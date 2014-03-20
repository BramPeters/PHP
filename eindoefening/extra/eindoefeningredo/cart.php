<?php
require_once("entities/cart.php");
require_once("entities/AbstractEntity.php");
if (isset($_SESSION['user_id']) && is_int($_SESSION['user_id'])) {
    // Retrieve cart through user
    $user = User::getUser($_SESSION['user_id']);
    $cart = $user->getCart();

} else if (isset($_SESSION['cart_id']) && is_int($_SESSION['cart_id'])) {
    // Retrieve a anonymous cart.
    $cart = Cart::retrieveCart($_SESSION['cart_id']);

} else {
    // Create a new temporary cart
    $cart = Cart::CreateCart();

    $_SESSION['cart_id'] = $cart->retrieveCart();
}

ob_start();
include_once('views/cartview.php');
$view = ob_get_contents();
ob_end_clean();