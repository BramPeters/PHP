<?php
//namespace PizzaShop\Service;
require_once("data/productdao.class.php");

class ProductService{
    public static function toonAllePizzas(){
        $lijst = ProductDAO::getAll();
        return $lijst;
    }
    
    public static function toonAlleExtras(){
        $lijst = ProductDAO::getExtra();
        return $lijst;
    }
    
    public static function toonInhoudMandje(){
        $lijst = ProductDAO::getContent();
        return $lijst;
    }
    
    public static function toonMandje(){
        $lijst = ProductDAO::getMandje();
        return $lijst;
    }
    
    public static function voegNieuwProductWinkelmandje($productId){
        ProductDAO::create($productId);
    }
    public static function verwijderProductWinkelmandje($productId){
        ProductDAO::verwijderProduct($productId);
    }
       
    public static function winkelmandjeUploaden($gebruikerInfo, $mandjeLijst){
        ProductDAO::uploadenWinkelmandje($gebruikerInfo, $mandjeLijst);
        return true;
    }
    
}