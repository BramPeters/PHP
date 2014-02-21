<?php
require_once("data/dbconfig.class.php");
require_once("entities/genre.class.php");
require_once("entities/boek.class.php");

class BoekDAO{
    public static function getAll(){
        $lijst=array();
        
        $dbh = new PDO(DBConfig::$DB_CONNSTRING,DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);
        
        $sql ="select mvc_boeken.id as boekid, titel, genreid, omschrijving from mvc_boeken, mvc_genres where genreid = mvc_genres.id";
        $resultSet = $dbh->query($sql);
        foreach($resultSet as $rij){
            $genre = Genre::create($rij["genreid"], $rij["omschrijving"]);
            $boek = Boek::create($rij["boekid"], $rij["titel"], $genre);
            array_push($lijst, $boek);
        }
        
        $dbh = null;
        return $lijst;
        
    }
    public static function getById($id){
        $dbh = new PDO(DBConfig::$DB_CONNSTRING,DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);
        $sql = "select mvc_boeken.id as boekid, titel, genreid, omschrijving from mvc_boeken, mvc_genres where genreid = mvc_genres.id and mvc_boeken.id = ".$id;
        $resultSet = $dbh->query($sql);
        $rij = $resultSet->fetch();
        $genre = Genre::create($rij["genreid"], $rij["omschrijving"]);
        $boek = Boek::create($rij["boekid"], $rij["titel"], $genre);
        $dbh =null;
        return $boek;
    }
    
    public static function create($titel, $genreId){
        $bestaandBoek = self::getByTitel($titel);
        if(isset($bestaandBoek))throw new TitelBestaatException();
        $sql = "insert into mvc_boeken (titel, genreId) values ('" . $titel ."', " . $genreId . ")";
        $dbh = new PDO(DBConfig::$DB_CONNSTRING,DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);
        $dbh->exec($sql);
        $genre = GenreDAO::getById($genreId);
        $boek = Boek::create($boekId, $titel, $genre);
        return $boek; 
    }
    public static function delete($id){
        $sql = "delete from mvc_boeken where id= ".$id;
        $dbh = new PDO(DBConfig::$DB_CONNSTRING,DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);
        $dbh->exec($sql);
        $dbh = null;
    }
    
    public static function update($boek){
        $bestaandBoek = self::getByTitel($boek->getTitel());
        if(isset($bestaandBoek) && $bestaandBoek->getId() != $boek->getId()) throw new TitelBestaatException();
        $sql = "update mvc_boeken set titel='".$boek->getTitel()."', genreid=".$boek->getGenre()->getId()." where id= ".$boek->getId();
        $dbh = new PDO(DBConfig::$DB_CONNSTRING,DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);
        $dbh->exec($sql);
        $dbh = null;
    }
    
    public static function getByTitel($titel){
        $dbh = new PDO(DBConfig::$DB_CONNSTRING,DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);
        $sql = "select mvc_boeken.id as boekid, titel, genreid, omschrijving from mvC_boeken, mvc_genres where genreid= mvc_genres.id and titel='".$titel."'";
        $resultSet = $dbh->query($sql);
        $rij = $resultSet->fetch();
        if(!$rij){
            return null;
        } else{
            $genre = Genre::create($rij["genreid"], $rij["omschrijving"]);
        $boek = Boek::create($rij["boekid"], $rij["titel"], $genre);
        $dbh =null;
        return $boek;
        }
    }
    
}