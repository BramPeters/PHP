<?php
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

    //weergave winkelmandje
    public static function toonMandje(){
        $lijst = array();
        if(isset($_SESSION["winkelmandje"]) && $_SESSION["winkelmandje"] !=0){
          $winkelmandje =  $_SESSION["winkelmandje"];
        $lijst = ProductDAO::getMandje2($winkelmandje);
        //er is een mandje;
        return $lijst;
        }else{
            //er is geen mandje;
        return false;
        }
        
    }
    //nieuw item toevoegen zonder mogelijke extra's
    public static function voegNieuwProductWinkelmandje($productId){
        if(isset($_SESSION["winkelmandje"]["$productId"][0])){
           $_SESSION["winkelmandje"]["$productId"][0]++;
           //print("extra hoeveelheid voor het mandje");
        }else{
            $_SESSION["winkelmandje"]["$productId"][0] = 1;
            //print("Nieuw product voor het mandje");
           } 
        
    }
    
    //nieuwe pizza (= item met extra's) toevoegen
    public static function voegProductMetExtras($prodId, $aantal, $extras){
        //$_SESSION["check"]=2;
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
    
    
    //aantal aanpassen in mandje
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
    //product verwijderen uit mandje
    public static function verwijderProductWinkelmandje($productId, $extras){        
        if ($_SESSION["winkelmandje"][$productId][$extras]) {
                unset($_SESSION["winkelmandje"][$productId][$extras]);
            }
        else{
            echo "error";
        }
    }
     
    
    //mandje uploaden naar DB
    public static function winkelmandjeUploaden($gebruikerInfo, $mandjeLijst){
        if(isset($_SESSION["winkelmandje"]) && $_SESSION["winkelmandje"] !=0){
        ProductDAO::uploadenWinkelmandje($gebruikerInfo, $mandjeLijst);
        }
        return true;
    }
    
    
    
    
    //admin
    
    public static function getAll(){
        $lijst = ProductDAO::getAll();
        return $lijst;
    }
    
}