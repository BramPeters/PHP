<?php
require_once("entities/user.class.php");

class UserDAO {

	public static function getByGebruikersnaam($gebruikersnaam) {
		$dbh = new PDO("mysql:host=localhost;dbname=cursusphp", "cursusgebruiker", "cursuspwd");
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