<?php
require_once("business/productservice.class.php");
//$pizzaLijst=\PizzaShop\Service\ProductService::toonAllePizzas();
$productLijst=ProductService::toonAllePizzas();
include("views/productenlijst.php");