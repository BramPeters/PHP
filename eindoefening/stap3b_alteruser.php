<?php
session_start();
if(isset($_SESSION["gebruiker"])){
$gebruikersnaam = $_SESSION["gebruiker"];
}else{
    header("location: stap2_logincheck.php");
}
require_once("business/userservices.class.php");

//view
$gebruikerInfo=UserService::toonGebruikersInfo($gebruikersnaam);
include("presentation/stap3b_alteruserform.php");

