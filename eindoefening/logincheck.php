<?php

if(isset($ingelogd)&&$ingelogd==true){
    header("location: afrekenen.php");
}else{
session_start();
require_once("business/userservices.class.php");
    if(isset($_SESSION["aangemeld"]) && $_SESSION["aangemeld"] == true){
        header("location: afrekenen.php");
    }
if (isset($_GET["action"]) && $_GET["action"] == "login") {
	$toegelaten = UserService::controleerGebruiker($_POST["txtGebruikersnaam"], $_POST["txtWachtwoord"]);
	if ($toegelaten) {
		$_SESSION["aangemeld"] = true;
                $_SESSION["gebruiker"] = $_POST["txtGebruikersnaam"];
                $_SESSION["nexttry"] = false;
		header("location: afrekenen.php");
		exit(0);
	} else {
		header("location: logincheck.php");
                $_SESSION["nexttry"]=true;
		exit(0);
	}
} else {
	include("presentation/loginform.php");
}
}
