<?php
session_start();
require_once("business/userservices.class.php");

if(UserService::nieuweGebruikerCheck($_POST['txtGebruikersnaam']) == false){
    header("location: nieuwegebruiker.php?bestaandegebruiker");
}else{
    require_once("business/userservices.class.php");
    UserService::nieuweGebruiker($_POST);
    header("location: afrekenen.php");
}