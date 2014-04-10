<?php

ob_start();
session_start();

require_once("business/productservice.class.php");

if (!isset($_SESSION["winkelmandje"])) {
    $_SESSION["winkelmandje"] = "";
}

//view
$productLijst = ProductService::toonAllePizzas();
$mandjeLijst = ProductService::toonMandje();
include("presentation/productenlijst.php");


//Toevoegen aan mandje
if (isset($_GET["action"]) && $_GET["action"] == "process") {
    ProductService::voegNieuwProductWinkelmandje($_GET["product"]);
    header("location: toonallepizzas.php");
    exit(0);
} else {
    //verwijderen uit mandje
    if (isset($_GET["action"]) && $_GET["action"] == "delete") {
        ProductService::verwijderProductWinkelmandje($_GET["id"], $_GET["extras"]);
        header("location: toonallepizzas.php");
        exit(0);
    } else {
        //aantal aanpassen in mandje
        if (isset($_GET["action"]) && $_GET["action"] == "change") {
            $aantal = $_POST["txtAantal"];
            $prodId = $_GET["id"];
            $extras = $_GET["extras"];
            ProductService::updateProductWinkelmandje($prodId, $aantal, $extras);
            header("location: toonallepizzas.php");
            exit(0);
        } else {
            //pizza met extras toevoegen aan mandje
            if (isset($_GET["action"]) && $_GET["action"] == "extras") {
                $aantal = $_POST["txtAantal"];
                $prodId = $_GET["id"];
                $extras = $_POST['extra'];
                $_SESSION["check"] = 1;
                ProductService::voegProductMetExtras($prodId, $aantal, $extras);
                header("location: toonallepizzas.php");
                exit(0);
            }
        }
    }
}