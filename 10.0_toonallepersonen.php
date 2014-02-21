<?php
require_once("business/persoonservice.class.php");
$personen=PersoonService::getAllePersonen();
include("presentation/personenlijst.php");