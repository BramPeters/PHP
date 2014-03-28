<?php
  
require_once("data/dbconfig.class.php");
require_once("entities/product.class.php");
require_once("entities/user.class.php");

class ProductDAO{
    public static function getAll(){
        $lijst = array();
        $sql = "select ProductId, producttype.ProductSoort, ProductType, ProductNaam, ProductOmschrijving, ProductPrijs from producten, producttype where ProductType = producttype.ProductTypeId order by ProductPrijs asc";
        $dbh = new PDO(DBConfig::$DB_CONNSTRING, DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);
        $resultSet = $dbh->query($sql);
        foreach ($resultSet as $rij) {
            $pizza = new Pizza($rij["ProductId"],$rij["ProductSoort"], $rij["ProductNaam"],$rij["ProductOmschrijving"], $rij["ProductPrijs"]);
            array_push($lijst, $pizza);
        }
        
        $dbh = null;
        return $lijst;
    }
    
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
    
    public static function getContent(){
        $lijst = array();
        $sql = "select BestellingsNr, bestelregel.BestelRegel, bestelregel.ProductId, bestelregel.ProductAantal,producten.ProductId, producten.ProductType, producttype.ProductTypeId, producttype.ProductSoort, ProductNaam, ProductOmschrijving, ProductPrijs  from bestelregel, producten, producttype where BestellingsNr = 1 and bestelregel.ProductId=producten.ProductId and producten.ProductType=producttype.ProductTypeId order by bestelregel.BestelRegel";
        $dbh = new PDO(DBConfig::$DB_CONNSTRING, DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);
        $resultSet = $dbh->query($sql);
        foreach ($resultSet as $rij) {
            $pizza = new MandProduct($rij["BestellingsNr"],$rij["BestelRegel"], $rij["ProductId"],$rij["ProductAantal"],$rij["ProductId"],$rij["ProductType"],$rij["ProductTypeId"],$rij["ProductSoort"], $rij["ProductNaam"], $rij["ProductOmschrijving"], $rij["ProductPrijs"]);
            array_push($lijst, $pizza);
        }        
        $dbh = null;
        return $lijst;
    }
    
    public static function getMandje(){
        
        $lijst = array();
        if(isset($_SESSION["winkelmandje"]) && $_SESSION["winkelmandje"] !=0){
        foreach($_SESSION["winkelmandje"] as $item=>$aantal){
        $sql = "select ProductNaam, ProductType, ProductPrijs, producttype.ProductTypeId, producttype.ProductSoort, ProductId from producten,producttype where ProductId = '".$item."' and producten.ProductType=producttype.ProductTypeId";
        $dbh = new PDO(DBConfig::$DB_CONNSTRING, DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);
        $resultSet = $dbh->query($sql);
        $rij = $resultSet->fetch(PDO::FETCH_ASSOC);
            $pizza = new ProductInMandje($rij["ProductNaam"],$rij["ProductType"], $rij["ProductPrijs"],$rij["ProductSoort"], $item, $aantal, $rij["ProductId"]);
            array_push($lijst, $pizza);          
        $dbh = null;
        }
        return $lijst;
        }         
    }
    
    
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
        if(isset($_SESSION["winkelmandje"]) && $_SESSION["winkelmandje"] !=0){
        foreach($mandjeLijst as $item){
        $sql = "insert into `bestelregel`(`BestellingsNr`,`BestelRegel`, `ProductId`, `ProductAantal`) VALUES (".$max." ,".$teller." ,".$item->getProductId().", ".$item->getProductAantal().")";
        //print("<br>".$sql."<br>");
        $dbh = new PDO(DBConfig::$DB_CONNSTRING, DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);
        $dbh->exec($sql);
        $teller++;
        }
        }
        $dbh = null;
        return true;
        
      
    }
    
    
    public static function getProductById($productId){
        $sql = "select ProductId from producten where ProductId = ".$productId;
        $dbh = new PDO(DBConfig::$DB_CONNSTRING, DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);
        $resultSet = $dbh->query($sql);
        foreach ($resultSet as $rij) {
            $product = $rij["ProductId"];
        }
        $dbh = null;
        
//        if(isset($_SESSION["winkelmandje"]["$product"])){
//           $_SESSION["winkelmandje"]["$product"]++;
//           //print("extra hoeveelheid voor het mandje");
//        }else{
//            $_SESSION["winkelmandje"]["$product"] = 1;
//            //print("Nieuw product voor het mandje");
//           }             
    }
    

    
}