<?php

require_once("entities/user.class.php");
require_once("data/dbconfig.class.php");

class UserDAO {
    
        public static function getAll(){
        $lijst = array();
        $sql = "select KlantId, KlantFamilienaam, KlantVoornaam, KlantAdres, KlantPostCode, KlantStatus, Telefoonnummer, Emailadres from klanten";
        $dbh = new PDO(DBConfig::$DB_CONNSTRING, DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);
        $resultSet = $dbh->query($sql);
        foreach ($resultSet as $rij) {
            $klant = new Klant($rij["KlantId"],$rij["KlantFamilienaam"], $rij["KlantVoornaam"],$rij["KlantAdres"], $rij["KlantPostCode"], $rij["KlantStatus"], $rij["Telefoonnummer"], $rij["Emailadres"]);
            array_push($lijst, $klant);
        }
        
        $dbh = null;
        return $lijst;
    }
    
    

    //checken of gebruiker bestaat in DB
    public static function getByGebruikersnaam($gebruikersnaam) {
        $dbh = new PDO(DBConfig::$DB_CONNSTRING, DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);
        $sql = "select KlantId, emailadres, wachtwoord from klanten where emailadres = '" .
                $gebruikersnaam . "'";
        $resultSet = $dbh->query($sql);
        if ($resultSet) {
            $rij = $resultSet->fetch();
            if ($rij) {
                $user = User::create($rij["KlantId"], $rij["emailadres"], $rij["wachtwoord"]);
                $dbh = null;
                return $user;
            } else {
                return null;
            }
        } else {
            return null;
        }
    }

    //ophalen info klant uit db
    public static function getUserInfo($gebruikersnaam) {
        $dbh = new PDO(DBConfig::$DB_CONNSTRING, DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);
        $sql = "select KlantId, Emailadres, Wachtwoord, KlantFamilienaam, KlantVoornaam, KlantAdres, KlantPostcode, Telefoonnummer,klanten.KlantStatus, klantstatus.KlantStatusId, klantstatus.KortingsPercentage as korting from klanten, klantstatus where Emailadres = '" .
                $gebruikersnaam . "' and klanten.KlantStatus = klantstatus.KlantStatusId";
        $resultSet = $dbh->query($sql);
        if ($resultSet) {
            $rij = $resultSet->fetch();
            if ($rij) {
                $user = new User($rij["KlantId"], $rij["Emailadres"], $rij["Wachtwoord"], $rij["KlantFamilienaam"], $rij["KlantVoornaam"], $rij["KlantAdres"], $rij["KlantPostcode"], $rij["Telefoonnummer"], $rij["korting"]);
                $dbh = null;
                return $user;
            } else {
                return null;
            }
        } else {
            return null;
        }
    }
    //update info van klant
    public static function setUserInfo($gebruikersnaam, $post) {
        $dbh = new PDO(DBConfig::$DB_CONNSTRING, DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);
        $sql = "UPDATE `klanten` SET `KlantFamilienaam`='" . $post['txtFamilienaam'] . "',`KlantVoornaam`='" . $post['txtVoornaam'] . "',`KlantAdres`='" . $post['txtAdres'] . "',`KlantPostcode`='" . $post['txtPostcode'] . "',`Telefoonnummer`='" . $post['txtTelefoonnummer'] . "' where Emailadres = '" . $gebruikersnaam . "'";
        $dbh->exec($sql);
        $dbh = null;
    }
    //insert van nieuwe klant
    public function setUserNew($post) {
        $dbh = new PDO(DBConfig::$DB_CONNSTRING, DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);
        $sql = "insert into klanten (`KlantFamilienaam`, `KlantVoornaam`, `KlantAdres`, `KlantPostcode`, `Telefoonnummer`, `Emailadres`, `Wachtwoord`, `KlantStatus`) 
                                values ('" . $post['txtFamilienaam'] . "' , '" . $post['txtVoornaam'] . "' , '" . $post['txtAdres'] . "' , '" . $post['txtPostcode'] . "' , '" . $post['txtTelefoonnummer'] . "' , '" . $post['txtGebruikersnaam'] . "' , '" . md5($_POST["txtWachtwoord"]) . "',1)";
        $dbh->exec($sql);
        $_SESSION["gebruiker"]=$post['txtGebruikersnaam']; 
        $dbh = null;
        
    }

    //lijst van toegelaten postcode halen uit DB    
    public static function GetPostcodes() {
        $dbh = new PDO(DBConfig::$DB_CONNSTRING, DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);
        $sql = "SELECT * FROM  `postcodes` WHERE 1 ";
        $postcodes = array();
        foreach ($dbh->query($sql) as $row) {
            $postcodes[]=$row['Postcode'];
            
        }
        $dbh = null;
        return $postcodes;
    }

    
    
    
    
    //ADMIN
    public static function getAdmin($gebruikersnaam) {
        $dbh = new PDO(DBConfig::$DB_CONNSTRING, DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);
        $sql = "select * from admins where Login = '" .
                $gebruikersnaam . "'";
        $resultSet = $dbh->query($sql);
        if ($resultSet) {
            $rij = $resultSet->fetch();
            if ($rij) {
                $user = $rij["Wachtwoord"];
                $dbh = null;
                return $user;
            } else {
                return null;
            }
        } else {
            return null;
        }
    }
    
    public static function getUserTypes(){
            $lijst=array();
        $sql = "select * from klantstatus";
        $dbh = new PDO(DBConfig::$DB_CONNSTRING, DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);
        $resultSet = $dbh->query($sql);
        foreach ($resultSet as $rij) {
            $klantType = new KlantType($rij["KlantStatusId"],$rij["Omschrijving"],$rij["KortingsPercentage"]);
            array_push($lijst, $klantType);
        }
        $dbh = null;        
        return $lijst;      
    }
    
    
    
}
