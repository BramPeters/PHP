<?php
session_start();
if(isset($_SESSION["gebruiker"])){
$gebruikersnaam = $_SESSION["gebruiker"];
}else{
    header("location: logincheck.php");
}
require_once("business/userservices.class.php");
require_once("business/productservice.class.php");
$winkelLijst=ProductService::toonInhoudMandje();
$mandjeLijst = ProductService::toonMandje();
$gebruikerInfo=UserService::toonGebruikersInfo($gebruikersnaam);
$postcodes=UserService::checkPostcodes();
include("presentation/bestelling.php");
