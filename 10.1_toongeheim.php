<?php
session_start();
if (!isset($_SESSION["aangemeld"])) {
	header("location: 10.1_aanmelden.php");
	exit(0);
}
include("presentation/geheimeinformatie.php");