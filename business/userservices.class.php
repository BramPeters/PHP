<?php 
//oude versie; hardcoded check:
//class UserService {

	//public static function controleerGebruiker($gebruikersnaam, $wachtwoord) {
	//	if ($gebruikersnaam == "admin" && $wachtwoord == "geheim")
	//		return true;
	//	else
	//		return false;
	//}
//}


require_once("data/userdao.class.php");

class UserService {

	public static function controleerGebruiker($gebruikersnaam, $wachtwoord) {
		$user = UserDAO::getByGebruikersnaam($gebruikersnaam);
		if (isset($user) && $user->getWachtwoord() == $wachtwoord) {
			return true;
		} else {
			return false;
		}
	}
}