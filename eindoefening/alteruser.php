<?php
session_start();
if(isset($_SESSION["gebruiker"])){
$gebruikersnaam = $_SESSION["gebruiker"];
}else{
    header("location: logincheck.php");
}
require_once("business/userservices.class.php");
$gebruikerInfo=UserService::toonGebruikersInfo($gebruikersnaam);
include("presentation/alteruserform.php");

