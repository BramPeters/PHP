<?php

require_once("data/dbconfig.class.php");
require_once("entities/product.class.php");
require_once("entities/user.class.php");

class AdminDAO {

    //item verwijderen uit DB
    public static function deleteFromDB($type, $id) {
        if ($type == "klant") {
            $database = "klanten";
            $idNaam = "KlantId";
        } else {
            if ($type == "extra") {
                $database = "ingredienten";
                $idNaam = "IngredientId";
            } else {
                //$type=="product"
                $database = "producten";
                $idNaam = "ProductId";
            }
        }        
        $sql = "DELETE FROM `" . $database . "` WHERE `" . $idNaam . "` = " . $id;
        $dbh = new PDO(DBConfig::$DB_CONNSTRING, DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);
        $stmt = $dbh->prepare($sql);
        if ($stmt->execute()) {
            return $sql;
        } else {
            return $sql;
        }
    }
    
    
    //item updaten in DB
    public static function updateInDB($type,$id, $itemNaam, $itemPrijs,$itemOmschrijving ) {
        if ($type == "klant") {
            //$database = "klanten";
            //$idNaam = "KlantId";
            $sql= "UPDATE `klanten` SET `Omschrijving`=[value-2],`KortingsPercentage`=[value-3] WHERE 1";
        } else {
            if ($type == "extra") {
                //$database = "ingredienten";
                $idNaam = "IngredientId";                
                $sql= "UPDATE `ingredienten` SET `IngredientNaam`='".$itemNaam."',`IngredientPrijs`='".$itemPrijs."' WHERE IngredientId = ".$id;
            } else {
                //$type=="product"
                //$database = "producten";
                $idNaam = "ProductId";
                $sql="UPDATE `producten` SET `ProductNaam`='".$itemNaam."',`ProductOmschrijving`='".$itemOmschrijving."',`ProductPrijs`='".$itemPrijs."' WHERE ProductId= ".$id;
            }
        }    
        

       // $sql = "DELETE FROM `" . $database . "` WHERE `" . $idNaam . "` = " . $id;
        $dbh = new PDO(DBConfig::$DB_CONNSTRING, DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);
        $stmt = $dbh->prepare($sql);
        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }
    
    
            
            //item updaten in DB
    public static function insertIntoDB($type, $insertInfo) {
        if ($type == "klant") {
            $database = "klanten";
            $idNaam = "KlantId";
            $insertInfo["klantwachtwoord"]= md5($insertInfo["klantwachtwoord"]);
            
            $sql = "INSERT INTO `klanten` (`KlantFamilienaam`,`KlantVoornaam`,`KlantAdres`,`KlantPostcode`,`KlantStatus`,`Telefoonnummer`,`Emailadres`,`Wachtwoord`) VALUES( '" . $insertInfo["klantfamilienaam"] . "' , '" . $insertInfo["klantvoornaam"]. "' , '" .$insertInfo["klantadres"]."' , '" .$insertInfo["klantpostcode"]."' , '" .$insertInfo["klantstatus"]."' , '" .$insertInfo["klanttelefoonnummer"]."' , '" .$insertInfo["klantemailadres"]."' , '" .$insertInfo["klantwachtwoord"]."')";
        } else {
            if ($type == "extra") {
                $database = "ingredienten";
                $idNaam = "IngredientId";
                
                $sql = "INSERT INTO `ingredienten` (`IngredientNaam`, `IngredientPrijs`) VALUES( '" . $insertInfo["extranaam"] . "' , '" . $insertInfo["extraprijs"]."')";
            } else {
                //$type=="product"
                $database = "product";
                $idNaam = "ProductId";
                
                $sql = "INSERT INTO `producten` (`ProductType`,`ProductNaam`,`ProductOmschrijving`,`ProductPrijs`) VALUES( '" . $insertInfo["producttype"] . "' ,'" . $insertInfo["productnaam"] . "' ,'" . $insertInfo["productomschrijving"] . "' ,'" . $insertInfo["productprijs"] . "' )";
            }
        }        
        
        // `producten`(`ProductId`, `ProductType`, `ProductNaam`, `ProductOmschrijving`, `ProductPrijs`) VALUES ([value-1],[value-2],[value-3],[value-4],[value-5])
        
        //$sql = "INSERT INTO `" . $database . "` () VALUES( `" . $idNaam . "` = " . $id.")";
        $dbh = new PDO(DBConfig::$DB_CONNSTRING, DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);
        $stmt = $dbh->prepare($sql);
        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    
    }

}

