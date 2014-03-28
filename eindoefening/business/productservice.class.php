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
    
//    public static function toonInhoudMandje(){
//        $lijst = ProductDAO::getContent();
//        return $lijst;
//    }
    
    public static function toonMandje(){
        $lijst = ProductDAO::getMandje();
        return $lijst;
    }
    
    public static function voegNieuwProductWinkelmandje($productId){
        ProductDAO::getProductById($productId);
        
        if(isset($_SESSION["winkelmandje"]["$productId"])){
           $_SESSION["winkelmandje"]["$productId"]++;
           //print("extra hoeveelheid voor het mandje");
        }else{
            $_SESSION["winkelmandje"]["$productId"] = 1;
            //print("Nieuw product voor het mandje");
           } 
        
    }
    public static function updateProductWinkelmandje($productId, $productAantal){
        
        if(isset($_SESSION["winkelmandje"]["$productId"])){
           $_SESSION["winkelmandje"]["$productId"]= $productAantal;
           echo $productAantal;
           
           //print("extra hoeveelheid voor het mandje");
        }else{
            echo "error";
           } 
        
    }
    
    public static function verwijderProductWinkelmandje($productId){        
        if ($_SESSION["winkelmandje"][$productId]) {
                unset($_SESSION["winkelmandje"][$productId]);
            }
        else{
            echo "error";
        }
    }
       
    public static function winkelmandjeUploaden($gebruikerInfo, $mandjeLijst){
        ProductDAO::uploadenWinkelmandje($gebruikerInfo, $mandjeLijst);
        return true;
    }
    
}