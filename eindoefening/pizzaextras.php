<?php
require_once("business/productservice.class.php");
//$pizzaLijst=\PizzaShop\Service\ProductService::toonAllePizzas();
$extraLijst=ProductService::toonAlleExtras();
$winkelLijst=ProductService::toonInhoudMandje();
include("presentation/extralijst.php");




//winkelmandje invullen
if(isset($_GET["action"]) && $_GET["action"]== "process") {
    echo 'alert("Dit bestand heeft niet de juiste extensie!");';
    try{
    ProductService::voegNieuwProductWinkelmandje ($_POST["ProductNaam"], $_POST["selGenre"]);
    //header("location: 10.0_toonalleboeken.php");
    //include("presentation/nieuwboekform.php");
    //exit(0);
    }catch (TitelBestaatException $tbe){
       // header("location: 10.0_voegboektoe.php?error=titleexists");
    exit(0);
    }
    
}else{
    //$genreLijst = GenreService::toonAlleGenres();
    //$error = $_GET["error"];
    //include("presentation/nieuwboekform.php");
}