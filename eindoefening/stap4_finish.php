<?php

session_start();

require_once("business/userservices.class.php");
require_once("business/productservice.class.php");


//if gn winkelmandje of geen ingelogde gebruiker, redirect
if (!isset($_SESSION["winkelmandje"]) || $_SESSION["winkelmandje"] == 0) {
    header("location: stap1_productbestelling.php");
}
if (isset($_SESSION["gebruiker"])) {
    $gebruikersnaam = $_SESSION["gebruiker"];
} else {
    header("location: stap2_logincheck.php");
}

//view
$mandjeLijst = ProductService::toonMandje();
$gebruikerInfo = UserService::toonGebruikersInfo($gebruikersnaam);
if (ProductService::winkelmandjeUploaden($gebruikerInfo, $mandjeLijst) == true) {
    include("presentation/stap4_finish.php");
    $gebruikersnaam = $_SESSION["gebruiker"];
    unset($_SESSION["aangemeld"]);
    unset($_SESSION["gebruiker"]);
    unset($_SESSION["winkelmandje"]);
    unset($_SESSION["eindTotaal"]);
    //afgemeld;
} else {
    print('er is iets misgelopen...');
}

