<?php

require_once("data/productdao.class.php");

class ProductService {

    //weergave winkelmandje
    public static function showAllProducten($mandjefetch) {
        $mandjeWeergave = "";
        $mandjeWeergave = $mandjeWeergave . "<table>";
        if (!isset($mandjefetch) || $mandjefetch == null) {
            
                   print("Uw winkelmandje is leeg.");
               } else {
        
        $totaalPrijs = 0;

        foreach ($mandjefetch as $product) {
            $subTotaal = 0;
            $productId = $product->getProductId();
            $extras = $product->getProductExtra();
            $aantalProduct = $product->getProductAantal();
            $pizzaPrijs = $product->getProductAantal() * $product->getProductPrijs();
            $subTotaal += $pizzaPrijs;

            //view
            $mandjeWeergave = $mandjeWeergave . "<tr><td style='width:0.1em; text-align: center;'>";
            $mandjeWeergave = $mandjeWeergave . "<form action='stap1_productbestelling.php?action=change&id=$productId&extras=$extras' method='POST'>" . "<input type='text' name='txtAantal' value=$aantalProduct maxlength='2' style='width: 20px;' required>" . "<input type='submit' value='+ -'>" . "</form>";
            $mandjeWeergave = $mandjeWeergave . "</td><td>";
            $mandjeWeergave = $mandjeWeergave . $product->getProductSoort();
            $mandjeWeergave = $mandjeWeergave . "</td><td>";
            $mandjeWeergave = $mandjeWeergave . $product->getProductNaam();
            $mandjeWeergave = $mandjeWeergave . "</td><td style='text-align: center;'>";
            $mandjeWeergave = $mandjeWeergave . "$pizzaPrijs" . " &euro;";
            $mandjeWeergave = $mandjeWeergave . "</td><td style='text-align:center;'>";
            $mandjeWeergave = $mandjeWeergave . "<a href=stap1_productbestelling.php?action=delete&id=" . $productId . "&extras=" . $extras . " style='text-decoration:none; font-weight: bold'>Verwijder uit mandje </a>";
            $mandjeWeergave = $mandjeWeergave . "</td></tr>";

            if ($extras !== 0) {
                $arrExtras = str_split($extras);
                foreach ($arrExtras as $extraNr) {
                    $extrasPrijs = 0;
                    $extrasInfo = productDAO::getExtrasInfo($extraNr);
                    $extrasPrijs = $extrasInfo->IngredientPrijs;
                    $extrasPrijs = $extrasPrijs * $aantalProduct;

                    $mandjeWeergave = $mandjeWeergave . "<tr><td></td><td>Extra</td><td>";
                    $mandjeWeergave = $mandjeWeergave . $extrasInfo->IngredientNaam;
                    $mandjeWeergave = $mandjeWeergave . "</td><td>";
                    $mandjeWeergave = $mandjeWeergave . $extrasPrijs . " &euro;";
                    $mandjeWeergave = $mandjeWeergave . "</td><td></td></tr>";
                    $subTotaal += $extrasPrijs;
                }
                $mandjeWeergave = $mandjeWeergave . "<tr><td></td><td>Subtotaal</td><td></td>";
                $mandjeWeergave = $mandjeWeergave . "<td>" . $subTotaal . " &euro;" . "</td>";
                $mandjeWeergave = $mandjeWeergave . "<td></td></tr>";
            }
            $totaalPrijs = $totaalPrijs + $subTotaal;
        }
        $mandjeWeergave = $mandjeWeergave . "<tr><td>Totaal: </td><td></td><td></td>";
        $mandjeWeergave = $mandjeWeergave . "<td>:" . $totaalPrijs . " &euro;" . "<td></td></tr>";
        $mandjeWeergave = $mandjeWeergave . "<a href='stap2_logincheck.php' style='
                   border-top: 1px solid #96d1f8;
                   background: #204080;
                   padding: 5px 10px;
                   margin-left: 11em;

                   -webkit-border-radius: 8px;
                   -moz-border-radius: 8px;
                   border-radius: 8px;

                   color: white;
                   font-size: 18px;
                   text-decoration: none; 
                   vertical-align: middle;
                   '>Afrekenen </a>";
               }
        $mandjeWeergave = $mandjeWeergave . "</table>";
        return $mandjeWeergave;
    }

    public static function toonAllePizzas() {
        $lijst = ProductDAO::getAll();
        return $lijst;
    }

    public static function toonAlleExtras() {
        $lijst = ProductDAO::getExtra();
        return $lijst;
    }

    //weergave winkelmandje
    public static function toonMandje() {
        $lijst = array();
        if (isset($_SESSION["winkelmandje"]) && $_SESSION["winkelmandje"] != 0) {
            $winkelmandje = $_SESSION["winkelmandje"];
            $lijst = ProductDAO::getMandje2($winkelmandje);
            //er is een mandje;
            return $lijst;
        } else {
            //er is geen mandje;
            return false;
        }
    }

    //nieuw item toevoegen zonder mogelijke extra's
    public static function voegNieuwProductWinkelmandje($productId) {
        if (isset($_SESSION["winkelmandje"]["$productId"][0])) {
            $_SESSION["winkelmandje"]["$productId"][0]++;
            //print("extra hoeveelheid voor het mandje");
        } else {
            $_SESSION["winkelmandje"]["$productId"][0] = 1;
            //print("Nieuw product voor het mandje");
        }
    }

    //nieuwe pizza (= item met extra's) toevoegen
    public static function voegProductMetExtras($prodId, $aantal, $extras) {
        //$_SESSION["check"]=2;
        $pizzaextras = "";
        //$_SESSION['mandteller'] = 0;

        foreach ($extras as $extra) {
            $pizzaextras = $pizzaextras . $extra;
        }
        if ($pizzaextras == "") {
            $pizzaextras = 0;
        }
        if (ProductService::toonMandje() !== false) {
            $lijst = ProductService::toonMandje();
        } else {
            $lijst = array();
        }
        unset($_SESSION["winkelmandje"]);
        $_SESSION["winkelmandje"] = "";
        $lijst = ProductDAO::newItem($prodId, $aantal, $pizzaextras, $lijst);
        foreach ($lijst as $item) {
            $productId = $item->getProductId();
            $extraz = $item->getProductExtra();
            $aantalz = $item->getProductAantal();
            if (isset($_SESSION["winkelmandje"]["$productId"][$extraz])) {
                $_SESSION["winkelmandje"]["$productId"][$extraz] += $aantalz;
            } else {
                $_SESSION["winkelmandje"]["$productId"][$extraz] = $aantalz;
            }

            //$_SESSION['mandteller']++;
        }
        return $lijst;


//        foreach ($extras as $extra){
//            $lijst = $lijst.$extra;
//        }
//        //$lijst = array_shift( $lijst );
//        $_SESSION["winkelmandje"]["$prodId"]["$lijst"] += $aantal;
//
//       // for($i=0; $i < count($extras); $i++){
//       //             echo "Selected " . $extras[$i] . "<br/>";
//       // }
    }

    //aantal aanpassen in mandje
    public static function updateProductWinkelmandje($productId, $productAantal, $extras) {

        if (isset($_SESSION["winkelmandje"]["$productId"][$extras])) {
            if ($productAantal == 0) {
                unset($_SESSION["winkelmandje"][$productId][$extras]);
            } else {
                $_SESSION["winkelmandje"]["$productId"][$extras] = $productAantal;
            }
            echo $productAantal;

            //print("extra hoeveelheid voor het mandje");
        } else {
            $_SESSION["winkelmandje"]["$productId"][$extras] = $productAantal;
        }
    }

    //product verwijderen uit mandje
    public static function verwijderProductWinkelmandje($productId, $extras) {
        if ($_SESSION["winkelmandje"][$productId][$extras]) {
            unset($_SESSION["winkelmandje"][$productId][$extras]);
        } else {
            echo "error";
        }
    }

    //mandje uploaden naar DB
    public static function winkelmandjeUploaden($gebruikerInfo, $mandjeLijst) {
        if (isset($_SESSION["winkelmandje"]) && $_SESSION["winkelmandje"] != 0) {
            ProductDAO::uploadenWinkelmandje($gebruikerInfo, $mandjeLijst);
        }
        return true;
    }

    //admin

    public static function getAll() {
        $lijst = ProductDAO::getAll();
        return $lijst;
    }

    public static function getAllBestellingen() {
        $lijst = ProductDAO::getAllBestellingen();
        return $lijst;
    }

    public static function getAantalBestellingen() {
        $lijst = ProductDAO::getAantalBestellingen();
        return $lijst;
    }

    public static function getAantalBestellingenVandaag() {
        $lijst = ProductDAO::getAantalBestellingenVandaag();
        return $lijst;
    }

    public static function getProductTypes() {
        $lijst = ProductDAO::getProductTypes();
        return $lijst;
    }

}