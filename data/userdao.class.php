<?php
require_once("entities/user.class.php");
require_once("data/dbconfig.class.php");

class UserDAO {

	public static function getByGebruikersnaam($gebruikersnaam) {
		$dbh = new PDO(DBConfig::$DB_CONNSTRING, DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);
		$sql = "select id, gebruikersnaam, wachtwoord from mvc_gebruikers where gebruikersnaam = '" . 
											$gebruikersnaam . "'";
		$resultSet = $dbh->query($sql);
		if ($resultSet) {
			$rij = $resultSet->fetch();
			if ($rij) {
				$user = User::create($rij["id"], $rij["gebruikersnaam"], $rij["wachtwoord"]);
				$dbh = null;
				return $user;
			} else {
				return null;
			}
		} else {
			return null;
		}
	}
        	
}