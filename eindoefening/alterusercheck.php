<?php
session_start();
if(isset($_SESSION["gebruiker"])){
$gebruikersnaam = $_SESSION["gebruiker"];
}else{
    header("location: logincheck.php");
}

if($_POST['txtFamilienaam']==null || $_POST['txtVoornaam']==null || $_POST['txtTelefoonnummer']==null || $_POST['txtAdres']==null || $_POST['txtPostcode']==null){
    header("location: alteruser.php");
}else{
    require_once("business/userservices.class.php");
    UserService::updateGebruiker($gebruikersnaam, $_POST);
    header("location: afrekenen.php");
}




