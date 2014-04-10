<?php

session_start();

require_once("business/userservices.class.php");

if (isset($_SESSION["aangemeld"]) && $_SESSION["aangemeld"] == true) {
    header("location: stap3_kassabon.php");
}
if (isset($_GET["action"]) && $_GET["action"] == "login") {
    $user = $_POST["txtGebruikersnaam"];
    $password = md5($_POST["txtWachtwoord"]);
    $toegelaten = UserService::controleerGebruiker($user, $password);
    if ($toegelaten) {
        $_SESSION["aangemeld"] = true;
        $_SESSION["gebruiker"] = $_POST["txtGebruikersnaam"];
        $_SESSION["nexttry"] = false;
        header("location: stap3_kassabon.php");
        exit(0);
    } else {
        header("location: stap2_logincheck.php");
        $_SESSION["nexttry"] = true;
        exit(0);
    }
} else {
    include("presentation/stap2_loginform.php");
}

