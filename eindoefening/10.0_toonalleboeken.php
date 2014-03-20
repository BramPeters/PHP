<?php
require_once("business/boekservice.class.php");
//use BookApplication\Service\BoekService;
$boekenLijst=BoekService::toonAlleBoeken();
include("presentation/boekenlijst.php");