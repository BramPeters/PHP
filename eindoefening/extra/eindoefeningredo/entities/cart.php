<?php
require_once 'entities/productList.php';


class Cart extends ProductList {

    private function __construct() {

    }

    public static function retrieveCart($cart_id, $user_id = null) {
        $cart = new Cart();

        return $cart;
    }

    public static function createCart() {
        $cart = new Cart();


        return $cart;
    }
} 