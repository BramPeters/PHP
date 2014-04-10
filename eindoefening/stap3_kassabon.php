<?php
session_start();

if(!isset($_SESSION["winkelmandje"])){
    header("location: stap1_productbestelling.php");
}

if(isset($_SESSION["gebruiker"])){
$gebruikersnaam = $_SESSION["gebruiker"];
}else{
    header("location: stap2_logincheck.php");
}
require_once("business/userservices.class.php");
require_once("business/productservice.class.php");

//view
$mandjeLijst = ProductService::toonMandje();
$gebruikerInfo=UserService::toonGebruikersInfo($gebruikersnaam);
$postcodes=UserService::checkPostcodes();
include("presentation/stap3_kassabon.php");
