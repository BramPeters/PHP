<?php 

require_once("data/userdao.class.php");

class UserService {
        
        //checken of de nieuwe gebruiker al bestaat
	public static function nieuweGebruikerCheck($gebruikersnaam) {
		$user = UserDAO::getByGebruikersnaam($gebruikersnaam);
		if (isset($user)) {
			return false;
		} else {
			return true;
		}
	}
        
    //check of de account wordt teruggevonden in de DB
        public static function controleerGebruiker($gebruikersnaam, $wachtwoord) {
		$user = UserDAO::getByGebruikersnaam($gebruikersnaam);
		if (isset($user) && $user->getWachtwoord() == $wachtwoord) {
			return true;
		} else {
			return false;
		}
	}
        //weergave van gebruikers info voor de kassabon
        public static function toonGebruikersInfo($gebruikersnaam){
        $lijst = UserDAO::getUserInfo($gebruikersnaam);
        return $lijst;
    }
    //gebruikersinfo aanpassen
    public static function updateGebruiker($gebruikersnaam, $post){
        UserDAO::setUserInfo($gebruikersnaam, $post);
    }
    //ophalen van toegelaten postcodes
    public static function checkPostcodes(){
        $lijst = UserDAO::GetPostcodes();
        return $lijst;
    }
    //nieuwe gebruiker aanmaken & inloggen
    public static function nieuweGebruiker($post){
        if(UserDAO::setUserNew($post)){
        $_SESSION["aangemeld"] = true;
        $_SESSION["gebruiker"] = $post["txtGebruikersnaam"];
        }
    }
    
    
}