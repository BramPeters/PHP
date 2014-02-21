<?php
session_start();
if (!isset($_SESSION["aangemeld"])) {
	header("location: aanmelden.php");
	exit(0);
}
include("presentation/geheimeinformatie.php");