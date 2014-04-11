<?php 

require_once("data/userdao.class.php");
require_once("data/userdao.class.php");

class AdminService {
        
    public static function showAllProducten($productenfetch){
        $productenWeergave = "";
        foreach($productenfetch as $product){
            $productenWeergave = $productenWeergave."<tr><td>";
            $productenWeergave = $productenWeergave.$product->getProductId();
            $productenWeergave = $productenWeergave."</td><td>";
            $productenWeergave = $productenWeergave.$product->getProductNaam()." :  ".$product->getProductOmschrijving();
            $productenWeergave = $productenWeergave."</td><td>";
            $productenWeergave = $productenWeergave.$product->getProductPrijs();
            $productenWeergave = $productenWeergave."</tr></td>";
        }
               
        return $productenWeergave;
    }
    
    public static function showAllKlanten($productenfetch){
        $productenWeergave = "";
        foreach($productenfetch as $product){
            $productenWeergave = $productenWeergave."<tr><td>";
            $productenWeergave = $productenWeergave.$product->getProductId();
            $productenWeergave = $productenWeergave."</td><td>";
            $productenWeergave = $productenWeergave.$product->getProductNaam()." :  ".$product->getProductOmschrijving();
            $productenWeergave = $productenWeergave."</td><td>";
            $productenWeergave = $productenWeergave.$product->getProductPrijs();
            $productenWeergave = $productenWeergave."</tr></td>";
        }
               
        return $productenWeergave;
    }
    
    
}