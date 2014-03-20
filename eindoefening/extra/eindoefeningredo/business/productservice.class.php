<?php
//namespace PizzaShop\Service;
require_once("data/productdao.class.php");

class ProductService{
    public static function toonAllePizzas(){
        $lijst = ProductDAO::getAll();
        return $lijst;
    }
    
    public static function voegNieuwProductWinkelmandje($titel, $genreId){
        ProductDAO::create($titel, $genreId);
    }
       
}