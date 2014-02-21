<?php
require_once("business/boekservice.class.php");
BoekService::verwijderBoek($_GET["id"]);
    header("location: 10.0_toonalleboeken.php");
    //include("presentation/nieuwboekform.php");
    exit(0);
