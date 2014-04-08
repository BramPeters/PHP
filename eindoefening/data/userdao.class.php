<?php

require_once("entities/user.class.php");
require_once("data/dbconfig.class.php");

class UserDAO {

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

    public static function getUserInfo($gebruikersnaam) {
        $dbh = new PDO(DBConfig::$DB_CONNSTRING, DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);
        $sql = "select KlantId, Emailadres, Wachtwoord, KlantFamilienaam, KlantVoornaam, KlantAdres, KlantPostcode, Telefoonnummer from klanten where Emailadres = '" .
                $gebruikersnaam . "'";
        $resultSet = $dbh->query($sql);
        if ($resultSet) {
            $rij = $resultSet->fetch();
            if ($rij) {
                $user = new User($rij["KlantId"], $rij["Emailadres"], $rij["Wachtwoord"], $rij["KlantFamilienaam"], $rij["KlantVoornaam"], $rij["KlantAdres"], $rij["KlantPostcode"], $rij["Telefoonnummer"]);
                $dbh = null;
                return $user;
            } else {
                return null;
            }
        } else {
            return null;
        }
    }

    public static function setUserInfo($gebruikersnaam, $post) {
        $dbh = new PDO(DBConfig::$DB_CONNSTRING, DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);
        $sql = "UPDATE `klanten` SET `KlantFamilienaam`='" . $post['txtFamilienaam'] . "',`KlantVoornaam`='" . $post['txtVoornaam'] . "',`KlantAdres`='" . $post['txtAdres'] . "',`KlantPostcode`='" . $post['txtPostcode'] . "',`Telefoonnummer`='" . $post['txtTelefoonnummer'] . "' where Emailadres = '" . $gebruikersnaam . "'";
        $dbh->exec($sql);
        $dbh = null;
    }

    public function setUserNew($post) {
        $dbh = new PDO(DBConfig::$DB_CONNSTRING, DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);
        $sql = "insert into klanten (`KlantFamilienaam`, `KlantVoornaam`, `KlantAdres`, `KlantPostcode`, `Telefoonnummer`, `Emailadres`, `Wachtwoord`, `KlantStatus`) 
                                values ('" . $post['txtFamilienaam'] . "' , '" . $post['txtVoornaam'] . "' , '" . $post['txtAdres'] . "' , '" . $post['txtPostcode'] . "' , '" . $post['txtTelefoonnummer'] . "' , '" . $post['txtGebruikersnaam'] . "' , '" . md5($_POST["txtWachtwoord"]) . "',1)";
        $dbh->exec($sql);
        $_SESSION["gebruiker"]=$post['txtGebruikersnaam']; 
        $dbh = null;
        
    }

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

}
