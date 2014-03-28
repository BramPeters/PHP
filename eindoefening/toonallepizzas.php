<?php
ob_start();
session_start();
require_once("business/productservice.class.php");
//$pizzaLijst=\PizzaShop\Service\ProductService::toonAllePizzas();
$productLijst = ProductService::toonAllePizzas();
//$winkelLijst = ProductService::toonInhoudMandje();
$mandjeLijst = ProductService::toonMandje();

include("presentation/productenlijst.php");
if(!isset($_SESSION["winkelmandje"])){
    $_SESSION["winkelmandje"]="";
    $mandjeLijst = ProductService::toonMandje();
}else{
    $mandjeLijst = ProductService::toonMandje();
}





//winkelmandje invullen
if (isset($_GET["action"]) && $_GET["action"] == "process") {
    try {
        ProductService::voegNieuwProductWinkelmandje($_GET["product"]);
        header("location: toonallepizzas.php");
        exit(0);
        
    } catch (TitelBestaatException $tbe) {
        // header("location: 10.0_voegboektoe.php?error=titleexists");
        exit(0);
    }
} else {
    if (isset($_GET["action"]) && $_GET["action"] == "delete") {
        ProductService::verwijderProductWinkelmandje($_GET["id"]);
        header("location: toonallepizzas.php");
        exit(0);
    } else {
        if(isset($_GET["action"]) && $_GET["action"] == "change"){
            print ($_GET["id"]." - ". $_GET["txtAantal"]);
//ProductService::updateProductWinkelmandje($_GET["id"], $_POST["aantal"]);
         
        //header("location: toonallepizzas.php");
        exit(0);   
        }
    }
}