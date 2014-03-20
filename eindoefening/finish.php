<?php

session_start();
if (isset($_SESSION["gebruiker"])) {
    $gebruikersnaam = $_SESSION["gebruiker"];
    //print('eerste if <br>');
} else {
    header("location: logincheck.php");
}
require_once("business/userservices.class.php");
require_once("business/productservice.class.php");

$mandjeLijst = ProductService::toonMandje();
$gebruikerInfo = UserService::toonGebruikersInfo($gebruikersnaam);
if (ProductService::winkelmandjeUploaden($gebruikerInfo, $mandjeLijst) == true) {
    include("presentation/afwerking.php");
    if (isset($_SESSION["gebruiker"])) {
        
        $gebruikersnaam = $_SESSION["gebruiker"];
        unset($_SESSION["aangemeld"]);
        unset($_SESSION["gebruiker"]);
        unset($_SESSION["winkelmandje"]);
        //print('afgemeld');
    } else {
        header("location: logincheck.php");
    }
    
} else {
    print('er is iets misgelopen...');
}

