<?php
  
require_once("data/dbconfig.class.php");
require_once("entities/product.class.php");
require_once("entities/user.class.php");

class ProductDAO{
    //lijst van alle producten ophalen uit DB
    public static function getAll(){
        $lijst = array();
        $sql = "select ProductId, producttype.ProductSoort, ProductType, ProductNaam, ProductOmschrijving, ProductPrijs from producten, producttype where ProductType = producttype.ProductTypeId order by ProductPrijs asc";
        $dbh = new PDO(DBConfig::$DB_CONNSTRING, DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);
        $resultSet = $dbh->query($sql);
        foreach ($resultSet as $rij) {
            $product = new Product($rij["ProductId"],$rij["ProductSoort"], $rij["ProductNaam"],$rij["ProductOmschrijving"], $rij["ProductPrijs"]);
            array_push($lijst, $product);
        }
        
        $dbh = null;
        return $lijst;
    }
    //lijst van alle Extra's ophalen uit DB
    public static function getExtra(){
        $lijst = array();
        $sql = "select * from ingredienten";
        $dbh = new PDO(DBConfig::$DB_CONNSTRING, DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);
        $resultSet = $dbh->query($sql);
        foreach ($resultSet as $rij) {
            $ingr = new Extra($rij["IngredientId"], $rij["IngredientNaam"], $rij["IngredientPrijs"]);
            array_push($lijst, $ingr);
        }        
        $dbh = null;
        return $lijst;
    }
    //Specifieke extra uit DB halen
    public static function getExtrasInfo($extraNr){
        //$lijst = array();
        $sql = "select * from ingredienten where IngredientId = '".$extraNr."'";
        $dbh = new PDO(DBConfig::$DB_CONNSTRING, DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);
        $resultSet = $dbh->query($sql);
        //if($resultSet !== null){
        foreach ($resultSet as $rij) {
            $ingr = new Extra($rij["IngredientId"], $rij["IngredientNaam"], $rij["IngredientPrijs"]);
            //array_push($lijst, $ingr);
        }
        return $ingr;
        //}
        $dbh = null;
        
    }
    
//    public static function getContent(){
//        $lijst = array();
//        $sql = "select BestellingsNr, bestelregel.BestelRegel, bestelregel.ProductId, bestelregel.ProductAantal,producten.ProductId, producten.ProductType, producttype.ProductTypeId, producttype.ProductSoort, ProductNaam, ProductOmschrijving, ProductPrijs  from bestelregel, producten, producttype where BestellingsNr = 1 and bestelregel.ProductId=producten.ProductId and producten.ProductType=producttype.ProductTypeId order by bestelregel.BestelRegel";
//        $dbh = new PDO(DBConfig::$DB_CONNSTRING, DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);
//        $resultSet = $dbh->query($sql);
//        foreach ($resultSet as $rij) {
//            $pizza = new MandProduct($rij["BestellingsNr"],$rij["BestelRegel"], $rij["ProductId"],$rij["ProductAantal"],$rij["ProductId"],$rij["ProductType"],$rij["ProductTypeId"],$rij["ProductSoort"], $rij["ProductNaam"], $rij["ProductOmschrijving"], $rij["ProductPrijs"]);
//            array_push($lijst, $pizza);
//        }        
//        $dbh = null;
//        return $lijst;
//    }
    
    //
//    public static function getMandje($winkelmandje){
//        
//        $lijst = array();
//        //$counter=1;
//       // if(isset($_SESSION["winkelmandje"]) && $_SESSION["winkelmandje"] !=0){
//        foreach($winkelmandje as $item=>$aantal){
//        $sql = "select ProductNaam, ProductType, ProductPrijs, producttype.ProductTypeId, producttype.ProductSoort, ProductId from producten,producttype where ProductId = '".$item."' and producten.ProductType=producttype.ProductTypeId";
//        $dbh = new PDO(DBConfig::$DB_CONNSTRING, DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);
//        $resultSet = $dbh->query($sql);
//        $rij = $resultSet->fetch(PDO::FETCH_ASSOC);
//            $pizza = new ProductInMandje($rij["ProductNaam"],$rij["ProductType"], $rij["ProductPrijs"],$rij["ProductSoort"], $item, $aantal, $rij["ProductId"]);
//            array_push($lijst, $pizza);          
//        $dbh = null;
//        //$counter++;
//        }
//        return $lijst;
//       // }         
//    }
    
    //
    public static function getMandje2($winkelmandje){
        
        $lijst = array();
       // if(isset($_SESSION["winkelmandje"]) && $_SESSION["winkelmandje"] !=0){


        //$counter=1;
        foreach($winkelmandje as $item=>$extras){
            foreach($extras as $extra =>$aantal){
               // foreach($extra as $extrap =>$aantalp){

        $sql = "select ProductNaam, ProductType, ProductPrijs, producttype.ProductTypeId, producttype.ProductSoort, ProductId from producten,producttype where ProductId = '".$item."' and producten.ProductType=producttype.ProductTypeId";
        $dbh = new PDO(DBConfig::$DB_CONNSTRING, DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);
        $resultSet = $dbh->query($sql);
        $rij = $resultSet->fetch(PDO::FETCH_ASSOC);
            $pizza = new ProductInMandje($rij["ProductNaam"],$rij["ProductType"], $rij["ProductPrijs"],$rij["ProductSoort"], $item, $aantal, $rij["ProductId"], $extra);
            array_push($lijst, $pizza);          
        $dbh = null;
        //$counter++;
       // }
        }
        }
        return $lijst;
       // }         
    }
    
    
    
    //nieuwste test
    public static function newItem($item, $aantal, $extra, $lijst){
        $_SESSION["check"]=3;
       
       // if(isset($_SESSION["winkelmandje"]) && $_SESSION["winkelmandje"] !=0){

               // foreach($extra as $extrap =>$aantalp){

        $sql = "select ProductNaam, ProductType, ProductPrijs, producttype.ProductTypeId, producttype.ProductSoort, ProductId from producten,producttype where ProductId = '".$item."' and producten.ProductType=producttype.ProductTypeId";
        $dbh = new PDO(DBConfig::$DB_CONNSTRING, DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);
        $resultSet = $dbh->query($sql);
        $rij = $resultSet->fetch(PDO::FETCH_ASSOC);
            $pizza = new ProductInMandje($rij["ProductNaam"],$rij["ProductType"], $rij["ProductPrijs"],$rij["ProductSoort"], $item, $aantal, $rij["ProductId"], $extra);
            array_push($lijst, $pizza);          
        $dbh = null;        
       // }
        //echo("testmolio");
        //sleep(10);
        return $lijst;
       // }         
    }
    
    
    
    
    
    
    //winkelmandje uploaden in DB
    public static function uploadenWinkelmandje($gebruikerInfo, $mandjeLijst){
        $sql = "select MAX(BestellingsNr) as Hoogste from bestellingen";
        $dbh = new PDO(DBConfig::$DB_CONNSTRING, DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);
        $resultSet = $dbh->query($sql);
        $rij = $resultSet->fetch();
        $max = $rij["Hoogste"];
        $max++; //eerstvolgende getal
        //print('nieuw bestellingsnr: '.$max."<br>");
        
        $klantId = $gebruikerInfo->getKlantId();
      
        //$sql = "insert into mvc_boeken (titel, genreId) values ('" . $titel ."', " . $genreId . ")";
        $sql = "insert into `bestellingen`(`BestellingsNr`, `KlantId`) VALUES ('".$max."', '".$klantId."')";
         //print($max."  -  ".$klantId."<br>".$sql);
        $dbh = new PDO(DBConfig::$DB_CONNSTRING, DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);
        $dbh->exec($sql);
        
        $teller = 1;
        //if(isset($_SESSION["winkelmandje"]) && $_SESSION["winkelmandje"] !=0){
        foreach($mandjeLijst as $item){            
            $sql = "insert into `bestelregel`(`BestellingsNr`,`BestelRegel`, `ProductId`, `ProductAantal`) VALUES (".$max." ,".$teller." ,".$item->getProductId().", ".$item->getProductAantal().")";
            $dbh = new PDO(DBConfig::$DB_CONNSTRING, DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);
            $dbh->exec($sql);
            $teller++;
        
            $extras = $item->getProductExtra();
            if($extras !== 0){
                 $arrExtras = str_split($extras);
                 foreach($arrExtras as $extraNr){
                       $extrasInfo=productDAO::getExtrasInfo($extraNr); 
                       $ingrId = $extrasInfo->IngredientId;
                       $sql = "insert into `bestregextra`(`BestellingsNr`,`BestelRegel`, `IngredientId`) VALUES (".$max." ,".$teller." ,".$ingrId.")";
                       $dbh = new PDO(DBConfig::$DB_CONNSTRING, DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);
                       $dbh->exec($sql);  
                 }
            }//endof extras
        }//endof foreach item
        $dbh = null;
        return true;
        
        
    }
    
    
//    public static function getProductById($productId){
//        $sql = "select ProductId from producten where ProductId = ".$productId;
//        $dbh = new PDO(DBConfig::$DB_CONNSTRING, DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);
//        $resultSet = $dbh->query($sql);
//        foreach ($resultSet as $rij) {
//            $product = $rij["ProductId"];
//        }
//        $dbh = null;
//        
////        if(isset($_SESSION["winkelmandje"]["$product"])){
////           $_SESSION["winkelmandje"]["$product"]++;
////           //print("extra hoeveelheid voor het mandje");
////        }else{
////            $_SESSION["winkelmandje"]["$product"] = 1;
////            //print("Nieuw product voor het mandje");
////           }             
//    }
    

    
    
    //ADMIN
    
        public static function getProductTypes(){
            $lijst=array();
        $sql = "select * from producttype";
        $dbh = new PDO(DBConfig::$DB_CONNSTRING, DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);
        $resultSet = $dbh->query($sql);
        foreach ($resultSet as $rij) {
            $productType = new ProductType($rij["ProductTypeId"],$rij["ProductSoort"]);
            array_push($lijst, $productType);
        }
        $dbh = null;        
        return $lijst;      
    }
    
    public static function getAllBestellingen(){
        $lijst = array();
        $sql = "select BestellingsNr, bestellingen.KlantId, BestellingsTijdstip, klanten.KlantId, klanten.KlantFamilienaam as FNaam, klanten.KlantVoornaam as VNaam, bestellingen.Status, bestellingstatus.Id, bestellingstatus.Betekenis AS status  from bestellingen, klanten, bestellingstatus where bestellingen.KlantId = klanten.KlantId AND bestellingen.Status = bestellingstatus.Id AND BestellingsTijdstip between '".date("Y-m-d")." 00:00:00' AND '".date("Y-m-d")." 23:59:59'";
        $dbh = new PDO(DBConfig::$DB_CONNSTRING, DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);
        $resultSet = $dbh->query($sql);
        foreach ($resultSet as $rij) {
            $bestelling = new Bestelling($rij["BestellingsNr"],$rij["KlantId"], $rij["BestellingsTijdstip"],$rij["FNaam"],$rij["VNaam"], $rij["status"]);
            array_push($lijst, $bestelling);
        }
        
        $dbh = null;
        return $lijst;
    }
    
    
    public static function getAantalBestellingen(){
        //$lijst = array();
        $sql = "select COUNT(BestellingsNr) AS aantal from bestellingen";
        $dbh = new PDO(DBConfig::$DB_CONNSTRING, DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);
        $resultSet = $dbh->query($sql);
        $rij = $resultSet->fetch(PDO::FETCH_ASSOC);
            $aantal = $rij["aantal"];
            //array_push($lijst, $aantal);          
        $dbh = null;  
        return $aantal;
    }
    
    public static function getAantalBestellingenVandaag(){
        //$lijst = array();
        $sql = "select COUNT(BestellingsNr) AS aantal from bestellingen where BestellingsTijdstip between '".date("Y-m-d")." 00:00:00' AND '".date("Y-m-d")." 23:59:59'";
        $dbh = new PDO(DBConfig::$DB_CONNSTRING, DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);
        $resultSet = $dbh->query($sql);
        $rij = $resultSet->fetch(PDO::FETCH_ASSOC);
            $aantal = $rij["aantal"];
            //array_push($lijst, $aantal);          
        $dbh = null;  
        return $aantal;
    }
}