<?php
require_once("business/boekservice.class.php");
//use BookApplication\Service\BoekService;
require_once("business/genreservice.class.php");
require_once("exceptions/titelbestaatexception.class.php");

if(isset($_GET["action"]) && $_GET["action"]== "process") {
    try{    
    BoekService::updateBoek($_GET["id"], $_POST["txtTitel"], $_POST["selGenre"]);
    
    header("location: 10.0_toonalleboeken.php");
    //include("presentation/nieuwboekform.php");
    exit(0);
    }catch(TitelBestaatException $tbe){
        header("location: 10.0_updateboek.php?id=".$_GET["id"]."&error=titleexists");
    exit(0);
    }    
    
    
}else{
    $genreLijst = GenreService::toonAlleGenres();
    $boek = BoekService::haalBoekOp($_GET["id"]);
    $error = $_GET["error"];
    include("presentation/updateboekform.php");
}