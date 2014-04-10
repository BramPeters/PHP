<?php
session_start();
if(isset($_SESSION["gebruiker"])){
$gebruikersnaam = $_SESSION["gebruiker"];
}else{
    header("location: stap2_logincheck.php");
}

if($_POST['txtFamilienaam']==null || $_POST['txtVoornaam']==null || $_POST['txtTelefoonnummer']==null || $_POST['txtAdres']==null || $_POST['txtPostcode']==null){
    header("location: stap3b_alteruser.php");
}else{
    require_once("business/userservices.class.php");
    UserService::updateGebruiker($gebruikersnaam, $_POST);
    header("location: stap3_kassabon.php");
}




