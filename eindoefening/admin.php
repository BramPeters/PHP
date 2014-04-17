<?php

session_start();
require_once("business/productservice.class.php");
require_once("business/userservices.class.php");
require_once("business/adminservice.class.php");
//if geen session, admincred = false
if (!isset($_SESSION["admin"])) {
    $_SESSION["admin"] = false;
}


//if action meegegeven
if (isset($_GET["action"])) {
    //if action = login
    if ($_GET["action"] == "login") {
        $admin = $_POST["txtGebruikersnaam"];
        $password = md5($_POST["txtWachtwoord"]);
        $toegelaten = UserService::controleerAdmin($admin, $password);
        if ($toegelaten) {
            $_SESSION["admin"] = true;
            $_SESSION["gebruiker"] = $admin;
            header("location: admin.php?action=overzicht");
            exit(0);
        } else {
            header("location: admin.php");
            exit(0);
        }
    } else {
        //if action = uitloggen
        if ($_GET["action"] == "logout") {
            $_SESSION["admin"] = false;
            unset($_SESSION["gebruiker"]);
            header("location: admin.php");
            exit(0);
        } else {
            //if action = item toevoegen aan DB
            if ($_GET["action"] == "insert") {
                //print_r($_POST);
                //print("***");
                //print_r($_GET);
                $type=$_GET["type"];
                $insertInfo = $_POST;
                AdminService::insertIntoDB($type, $insertInfo);
                header("location: admin.php");
                exit(0);
                
            } else {
                if ($_GET["action"] == "update") {
                   $type=$_GET["type"];
                   $id=$_GET["id"];
                   $itemNaam = $_POST["txtNaam"];
                   $itemPrijs = $_POST["txtPrijs"];                   
                   if($type=="product"){$itemOmschrijving = $_POST["txtOmschrijving"]; }else{$itemOmschrijving="";}
                   AdminService::updateInDB($type,$id, $itemNaam, $itemPrijs,$itemOmschrijving );
                   header("location: admin.php");
                   exit(0);
                    
                } else {
                    if ($_GET["action"] == "delete") {
                        $type=$_GET["type"];
                        $id=$_GET["id"];
                        print($id."-_-".$type);
                        AdminService::deleteFromDB($type, $id);
                        header("location: admin.php");
                        exit(0);
                    } else {
                        //if action = overzicht weergeven
                        if ($_GET["action"] == "overzicht" && $_SESSION["admin"] == true) {
                            $bestellingenfetch = ProductService::getAllBestellingen();
                            //print_r($bestellingenfetch);
                            $bestellingenWeergave = AdminService::showAllBestellingen($bestellingenfetch);
                            $totBestellingen = ProductService::getAantalBestellingen();
                            $vandaagBestellingen = ProductService::getAantalBestellingenVandaag();

                            $productenfetch = ProductService::getAll();
                            $productenWeergave = AdminService::showAllProducten($productenfetch);

                            $productTypes = ProductService::getProductTypes();
                            $productTypesWeergave = AdminService::optionListProductTypes($productTypes);

                            $extrasfetch = ProductService::toonAlleExtras();
                            $extrasWeergave = AdminService::showAllExtras($extrasfetch);

                            $klantTypes = UserService::getUserTypes();
                            $klantTypesWeergave = AdminService::optionListUserTypes($klantTypes);

                            $klantenfetch = UserService::getAll();
                            $klantenWeergave = AdminService::showAllKlanten($klantenfetch);

                            include("presentation/adminoverzicht.php");
                        } else {
                            header("location: admin.php");
                            exit(0);
                        }
                    }
                }
            }
        }
    }//endif isset action = login
} else {//end if isset action
    if (isset($_SESSION["admin"]) && $_SESSION["admin"] == true) {
        header("location: admin.php?action=overzicht");
        exit(0);
    } else {
        include("presentation/adminlogin.php");
    }
}
