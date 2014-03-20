<?php
  
require_once("data/dbconfig.class.php");
require_once("entities/product.class.php");

class ProductDAO{
    public static function getAll(){
        $lijst = array();
        //$sql ="select mvc_boeken.id as boekid, titel, genreid, omschrijving from mvc_boeken, mvc_genres where genreid = mvc_genres.id";
        //$sql ="select * from producten";
        //$sql = "select
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
    
    public static function create($titel, $genreId){
        //$bestaandBoek = self::getByTitel($titel);
        //if(isset($bestaandBoek))throw new TitelBestaatException();
        //$sql = "insert into mvc_boeken (titel, genreId) values ('" . $titel ."', " . $genreId . ")";
        //$dbh = new PDO(DBConfig::$DB_CONNSTRING,DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);
        //$dbh->exec($sql);
        //$genre = GenreDAO::getById($genreId);
        //$boek = Boek::create($boekId, $titel, $genre);
        //return $boek; 
    }
}