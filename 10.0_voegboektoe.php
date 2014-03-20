<?php
require_once("business/boekservice.class.php");
//use BookApplication\Service\BoekService;
require_once("business/genreservice.class.php");
require_once("exceptions/titelbestaatexception.class.php");

if(isset($_GET["action"]) && $_GET["action"]== "process") {
    try{
    BoekService::voegNieuwBoekToe ($_POST["txtTitel"], $_POST["selGenre"]);
    header("location: 10.0_toonalleboeken.php");
    //include("presentation/nieuwboekform.php");
    exit(0);
    }catch (TitelBestaatException $tbe){
        header("location: 10.0_voegboektoe.php?error=titleexists");
    exit(0);
    }
    
}else{
    $genreLijst = GenreService::toonAlleGenres();
    if(isset($_GET["error"]))$error = $_GET["error"];
    include("presentation/nieuwboekform.php");
}