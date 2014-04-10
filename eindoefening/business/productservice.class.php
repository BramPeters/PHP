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
        if(isset($_SESSION["winkelmandje"]) && $_SESSION["winkelmandje"] !=0){
          $winkelmandje =  $_SESSION["winkelmandje"];
        //$lijst = ProductDAO::getMandje($winkelmandje);
        $lijst = ProductDAO::getMandje2($winkelmandje);
        //print("er is een mandje");
        return $lijst;
        }else{
            //print("er is geen mandje");
        return false;
        }
        
    }
    
    public static function voegNieuwProductWinkelmandje($productId){
        //ProductDAO::getProductById($productId);
        
        if(isset($_SESSION["winkelmandje"]["$productId"][0])){
           $_SESSION["winkelmandje"]["$productId"][0]++;
           //print("extra hoeveelheid voor het mandje");
        }else{
            $_SESSION["winkelmandje"]["$productId"][0] = 1;
            //print("Nieuw product voor het mandje");
           } 
        
    }
    
    public static function voegProductMetExtras($prodId, $aantal, $extras){
        $_SESSION["check"]=2;
        $pizzaextras = "";
        //$_SESSION['mandteller'] = 0;
        
        foreach ($extras as $extra){
            $pizzaextras = $pizzaextras.$extra;
        }
        if($pizzaextras == ""){$pizzaextras = 0;}
        if(ProductService::toonMandje() !==false){
            $lijst = ProductService::toonMandje();
        }else{
            $lijst = array();
        }    
        unset ($_SESSION["winkelmandje"]);
        $_SESSION["winkelmandje"]="";
        $lijst = ProductDAO::newItem($prodId, $aantal, $pizzaextras, $lijst);
        foreach($lijst as $item){
            $productId = $item->getProductId();
            $extraz = $item->getProductExtra();
            $aantalz = $item->getProductAantal();
            if(isset ($_SESSION["winkelmandje"]["$productId"][$extraz])){
              $_SESSION["winkelmandje"]["$productId"][$extraz] += $aantalz;  
            }else{
              $_SESSION["winkelmandje"]["$productId"][$extraz] = $aantalz;    
            }
            
            //$_SESSION['mandteller']++;
        }
        return $lijst;
        
        
//        foreach ($extras as $extra){
//            $lijst = $lijst.$extra;
//        }
//        //$lijst = array_shift( $lijst );
//        $_SESSION["winkelmandje"]["$prodId"]["$lijst"] += $aantal;
//
//       // for($i=0; $i < count($extras); $i++){
//       //             echo "Selected " . $extras[$i] . "<br/>";
//       // }
        
    }
    
    
    
    public static function updateProductWinkelmandje($productId, $productAantal, $extras){
        
        if(isset($_SESSION["winkelmandje"]["$productId"][$extras])){
           if($productAantal == 0){
               unset($_SESSION["winkelmandje"][$productId][$extras]); 
           }else{
            $_SESSION["winkelmandje"]["$productId"][$extras]= $productAantal;
           }
           echo $productAantal;
           
           //print("extra hoeveelheid voor het mandje");
        }else{
            $_SESSION["winkelmandje"]["$productId"][$extras]= $productAantal;
           } 
        
    }
    
    public static function verwijderProductWinkelmandje($productId, $extras){        
        if ($_SESSION["winkelmandje"][$productId][$extras]) {
                unset($_SESSION["winkelmandje"][$productId][$extras]);
            }
        else{
            echo "error";
        }
    }
       
    public static function winkelmandjeUploaden($gebruikerInfo, $mandjeLijst){
        if(isset($_SESSION["winkelmandje"]) && $_SESSION["winkelmandje"] !=0){
        ProductDAO::uploadenWinkelmandje($gebruikerInfo, $mandjeLijst);
        }
        return true;
    }
    
}