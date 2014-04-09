<?php
ob_start();
session_start();
require_once("business/productservice.class.php");
//$pizzaLijst=\PizzaShop\Service\ProductService::toonAllePizzas();
$productLijst = ProductService::toonAllePizzas();
//$winkelLijst = ProductService::toonInhoudMandje();
//$mandjeLijst = ProductService::toonMandje();
//if(!isset($_SESSION["itemteller"])){$_SESSION["itemteller"] = 0;}
if(!isset($_SESSION["winkelmandje"])){
    $_SESSION["winkelmandje"]="";
    $mandjeLijst = ProductService::toonMandje();
}else{
    $mandjeLijst = ProductService::toonMandje();
}

include("presentation/productenlijst.php");

        echo '<br>'; echo '<br>'; echo '<br>'; echo '<br>'; echo '<br>'; echo '<br>'; echo '<br>'; echo '<br>';  echo '<br>';     echo '<br>'; echo '<br>'; echo '<br>'; echo '<br>'; echo '<br>'; echo '<br>'; echo '<br>'; echo '<br>'; echo '<br>';echo '<br>'; echo '<br>'; echo '<br>'; echo '<br>';echo '<br>';  echo '<br>';echo '<br>'; echo '<br>'; echo '<br>'; echo '<br>'; echo '<br>'; echo '<br>'; echo '<br>'; echo '<br>'; echo '<br>'; echo '<br>'; echo '<br>';
        echo '<pre>';
        print_r ($mandjeLijst);
        echo  '</pre>';






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
        ProductService::verwijderProductWinkelmandje($_GET["regel"], $_GET["extras"]);
        header("location: toonallepizzas.php");
        exit(0);
    } else {
        if (isset($_GET["action"]) && $_GET["action"] == "change") {
            try {
                print_r($_POST);
                //print("<br> get: ");
                print_r($_GET);
                $aantal = $_POST["txtAantal"];
                $prodId = $_GET["id"];
                ProductService::updateProductWinkelmandje($prodId, $aantal);
                header("location: toonallepizzas.php");
                exit(0);
        
    } catch (TitelBestaatException $tbe) {
        // header("location: 10.0_voegboektoe.php?error=titleexists");
        exit(0);    
    }
    
    }else{
        if(isset($_GET["action"]) && $_GET["action"] == "extras"){
            //print("hey");
            try {
                $aantal = $_POST["txtAantal"];
                $prodId = $_GET["id"];
                //$prodId = $_POST["id"];
                //print_r($_SESSION);
                print $prodId."**".$aantal;
                $extras = $_POST['extra'];
                    // print_r($extras);
                    // for($i=0; $i < count($extras); $i++){
                    //echo "Selected " . $extras[$i] . "<br/>";
                    //}
                ProductService::voegProductMetExtras($prodId, $aantal, $extras);
                //ProductService::updateProductWinkelmandje($prodId, $aantal);
                header("location: toonallepizzas.php");
                exit(0);
                
                //ProductService::updateProductWinkelmandje($prodId, $aantal);
                //header("location: toonallepizzas.php");
                //exit(0);
        
    } catch (TitelBestaatException $tbe) {
        // header("location: 10.0_voegboektoe.php?error=titleexists");
        exit(0);    
    }
            
        }
    }
    
    }
}