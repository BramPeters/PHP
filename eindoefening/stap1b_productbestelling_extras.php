<?php
session_start();

require_once("business/productservice.class.php");
if(!isset($_SESSION["winkelmandje"])){ $_SESSION["winkelmandje"]=""; }

//view
$extraLijst=ProductService::toonAlleExtras();
$mandjeLijst = ProductService::toonMandje();
include("presentation/stap1b_extralijst.php");
