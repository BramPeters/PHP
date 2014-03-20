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

	public static function nieuweGebruikerCheck($gebruikersnaam) {
		$user = UserDAO::getByGebruikersnaam($gebruikersnaam);
		if (isset($user)) {
			return false;
		} else {
			return true;
		}
	}
        
        public static function controleerGebruiker($gebruikersnaam, $wachtwoord) {
		$user = UserDAO::getByGebruikersnaam($gebruikersnaam);
		if (isset($user) && $user->getWachtwoord() == $wachtwoord) {
			return true;
		} else {
			return false;
		}
	}
        
        public static function toonGebruikersInfo($gebruikersnaam){
        $lijst = UserDAO::getUserInfo($gebruikersnaam);
        return $lijst;
    }
    
    public static function updateGebruiker($gebruikersnaam, $post){
        UserDAO::setUserInfo($gebruikersnaam, $post);
    }
    public static function checkPostcodes(){
        $lijst = UserDAO::GetPostcodes();
        return $lijst;
    }
    public static function nieuweGebruiker($post){
        UserDAO::setUserNew($post);
    }
    
    
}