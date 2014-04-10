<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
    "http://www.w3.org/TR/html4/loose.dtd">
<html>
    <head><title>test: pizza</title>
        <link rel="stylesheet" href="presentation/design.css" />
    </head>
    <body>
        <p style='margin: 1em;'>Pizzabestelling in 4 simpele stappen: </p>
        <ul class="breadcrumbs" style='margin: 1em;'>
            <li><a>Menu</a></li>
            <li><a>Login</a></li>
            <li class="actief"><a>Bestelling</a></li>
            <li><a>Finish</a></li>
        </ul>
        <div style='clear:both;background-color: lightsteelblue;width:400px; padding:0.7em; margin: 1em;'>
            <h1>Klant info: </h1>
            <table style='background-color: lightsteelblue;'>
                <?php
                if (!empty($gebruikerInfo)) {
                    $korting = $gebruikerInfo->getKlantStatus();
                    ?>  
                    <tr>
                        <td>Naam:</td>
                        <td>
                            <?php print($gebruikerInfo->getKlantFamilienaam()); ?>
                        </td>
                        <td>
                            <?php print($gebruikerInfo->getKlantVoornaam()); ?>
                        </td>
                    </tr>

                    <tr>
                        <td>Adres:</td>
                        <td>
                            <?php print($gebruikerInfo->getKlantAdres()); ?>
                        </td>
                        <td>
                            <?php print($gebruikerInfo->getKlantPostcode());
                            ?>
                        </td>

                    </tr>

                    <tr>
                        <td>Email:</td>
                        <td>
                            <?php print($gebruikerInfo->getEmailadres()); ?>
                        </td>
                    </tr>
                    <tr>
                        <td>Telefoonnummer:</td>
                        <td>
                            <?php print($gebruikerInfo->getTelefoonnummer()); ?>
                        </td>
                    </tr>
                <?php } ?>
            </table>
            <br>
            <a href=stap3b_alteruser.php>Klik hier om deze gegevens aan te passen.</a>
        </div>

        <div class="winkelmandje">
            <br>
            <h1>Winkelmandje: </h1>
            <table>
                <?php if (isset($mandjeLijst) && $mandjeLijst != null) {
                    $totaalPrijs = 0;
                    ?>
                    <td style="background-color:#ddd; width:0.1em;">Aantal</td><td style="background-color:#ddd">Item</td><td style="background-color:#ddd"></td><td style="background-color:#ddd; width:3.2em;text-align: center;">Prijs</td><td style="background-color:#ddd; width:3.2em;"></td><?php
                    foreach ($mandjeLijst as $item) {
                        $subTotaal = 0;
                        $productId = $item->getProductId();
                        $extras = $item->getProductExtra();
                        $aantalProduct = $item->getProductAantal();
                        $pizzaPrijs = $item->getProductAantal() * $item->getProductPrijs();
                        $subTotaal += $pizzaPrijs;
                        ?>

                        <tr>
                            <td style="width:0.1em; text-align: center;">

        <?php print($aantalProduct); ?>
                            </td>
                            <td style="width:0.1em;">
        <?php print($item->getProductSoort()); ?>
                            </td>
                            <td style="width:0.1em;">
        <?php print($item->getProductNaam()); ?>
                            </td>
                            <td style='text-align: center;'>
        <?php print($pizzaPrijs . " &euro;"); ?>
                            </td>
                        </tr>
        <?php
        if ($extras !== 0) {
            $arrExtras = str_split($extras);
            foreach ($arrExtras as $extraNr) {
                $extrasPrijs = 0;
                $extrasInfo = productDAO::getExtrasInfo($extraNr);
                $extrasPrijs = $extrasInfo->IngredientPrijs;
                $extrasPrijs = $extrasPrijs * $aantalProduct;
                ?>
                                <tr style="height:0.6em;padding:0;margin-top:-5px;">
                                    <td></td>
                                    <td style='text-align: center;font-size:small;padding:0.1em;'>Extra</td>
                                    <td style='text-align: center;font-size:small;padding:0.1em;'><?php print($extrasInfo->IngredientNaam); ?></td>
                                    <td style='text-align: center; font-size:small; padding:0.1em;'><?php print($extrasPrijs . " &euro;"); ?></td>
                                    <td></td>
                                </tr>

                                <?php
                                $subTotaal += $extrasPrijs;
                            }
                            ?>
                            <tr style="height:0.6em; padding:0; margin-top:-5px;">
                                <td></td>
                                <td style='text-align: center;padding:0.1em;'>Subtotaal</td>
                                <td style='text-align: center;padding:0.1em;'></td>
                                <td style='text-align: center;padding:0.1em;'><?php print($subTotaal . " &euro;"); ?></td>
                                <td></td>
                            </tr> 
                        <?php } 
                        $totaalPrijs = $totaalPrijs + $subTotaal;
                    }
                    $kortingsGetal = ($korting / 100) * $totaalPrijs;
                    $kortingsGetal = round($kortingsGetal, 2);
                    $eindTotaal = ($totaalPrijs - $kortingsGetal);
                    $_SESSION["eindTotaal"] = $eindTotaal;
                    ?>
                    <tr style='background-color:#65A7F7; color:white;'>
                        <td>Totaal: </td>
                        <td></td>
                        <td></td>
                        <td style='text-align: center;'><?php print($totaalPrijs) . " &euro;" ?></td>
                        <td></td>
                    </tr>
                    <tr style='background-color:#65A7F7; color:white;'>
                        <td>Korting: </td>
                        <td></td>
                        <td></td>
                        <td style='text-align: center;'><?php print($korting) . "%" ?></td>
                        <td></td>
                    </tr>
                    <tr style='background-color:darkslateblue; color:white;'>
                        <td>Eindtotaal: </td>
                        <td></td>
                        <td></td>
                        <td style='text-align: center;'><?php print($eindTotaal) . " &euro;" ?></td>
                        <td></td>
                    </tr>
                </table>
                <br>
                <?php
            } else {
                print("Uw winkelmandje is leeg.");
            }
            ?>


            <br>
            <a href=stap1_productbestelling.php>Klik hier om het winkelmandje aan te passen.</a>
        </div>

        <?php
        if (!in_array($gebruikerInfo->getKlantPostcode(), $postcodes)) {
            ?>
            <p style="float:right;text-decoration:none; font-weight: bold; font-size: 2.5em;margin-right: 20%;margin-top:-11.5em;color:lightgrey; background-color:#b24747 ;border:10px ridge red; padding:5px;width:361px;text-align:center;height:150px;">Helaas, Uw adres ligt niet binnen onze leveringszone.</p> 
            <?php
        } else if (!isset($mandjeLijst) || $mandjeLijst == null) {
            
        } else {
           ?>  
            <a href="stap4_finish.php" style="float:right; margin-right: 10em; margin-top:-20em; "><input type="button" value="Klik hier om de bestelling door te sturen"></a>
                <?php
            }
            ?>

    </body>
</html>