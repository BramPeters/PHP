

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
    "http://www.w3.org/TR/html4/loose.dtd">
<html>
    <head><title>test: pizza</title>
        <link rel="stylesheet" href="presentation/design.css" />
    </head>
    <body>
       <p style='margin: 1em;'>Pizzabestelling in 4 simpele stappen: </p>
        <ul class="breadcrumbs" style='margin: 1em;'>
          <li class="actief"><a>Menu</a></li>
          <li><a>Login</a></li>
          <li><a>Bestelling</a></li>
          <li><a>Finish</a></li>
        </ul>
        <table style='float:left;margin: 1.2em;'>
            <tr>
                <td style='font-size: 2em; font-weight: bold;'>Pizza's</td>
            </tr>
            <td style="background-color:#ddd">Naam & Omschrijving</td><td style="background-color:#ddd">Prijs</td><td style="background-color:#ddd"></td>
            <?php
            foreach ($productLijst as $product) {
                if ($product->getProductType() == "Pizza") {
                    ?>
                    <tr>
                        <td>

                            <?php $productNaam = $product->getProductNaam();
                            print("Pizza " . $product->getProductNaam() . " :  " . $product->getProductOmschrijving()); ?>

                        </td>
                        <td>
                            <?php
                            print($product->getProductPrijs() . " &euro;");
                            ?>

                        </td>
                        <td style="background-color:#FFF">
                            <?php
                            $productId = $product->getProductId();
                            echo"<a href=stap1b_productbestelling_extras.php?action=process&product=$productId style='text-decoration:none; font-weight: bold'>Voeg toe aan mandje </a>"
                            ?>
                        </td>

                    </tr>
                    <?php
                }
            }
            ?>

            <tr>
                <td style='font-size: 2em; font-weight: bold;'>Voorgerechten</td>
            </tr>
            <td style="background-color:#ddd">Naam & Omschrijving</td><td style="background-color:#ddd">Prijs</td><td style="background-color:#ddd"></td>
            <?php
            foreach ($productLijst as $product) {
                if ($product->getProductType() == "Gerecht") {
                    ?>
                    <tr>
                        <td>
                            <?php print($product->getProductOmschrijving()); ?>

                        </td>
                        <td>
                            <?php
                            print($product->getProductPrijs() . " &euro;");
                            ?>

                        </td>
                        <td style="background-color:#FFF">
                            <?php
                            $productId = $product->getProductId();
                            echo"<a href=stap1_productbestelling.php?action=process&product=$productId style='text-decoration:none; font-weight: bold'>Voeg toe aan mandje </a>"
                            ?>
                        </td>

                    </tr>
                    <?php
                }
            }
            ?>    



            <tr>
                <td style='font-size: 2em; font-weight: bold;'>Frisdranken</td>
            </tr>
            <td style="background-color:#ddd">Naam & Omschrijving</td><td style="background-color:#ddd">Prijs</td><td style="background-color:#ddd"></td>
            <?php
            foreach ($productLijst as $product) {
                if ($product->getProductType() == "Drank") {
                    ?>
                    <tr>
                        <td>
                            <?php print($product->getProductOmschrijving()); ?>

                        </td>
                        <td>
                            <?php
                            print($product->getProductPrijs() . " &euro;");
                            ?>

                        </td>
                        <td style="background-color:#FFF">
                            <?php
                            $productId = $product->getProductId();
                            echo"<a href=stap1_productbestelling.php?action=process&product=$productId style='text-decoration:none; font-weight: bold'>Voeg toe aan mandje </a>"
                            ?>
                        </td>

                    </tr>
                    <?php
                }
            }
            ?>    
        </table>
        
        <!--versie 2-->
        <div style='float:right;min-height: 5em;' class="winkelmandje">
            
            <br>
            <h1>Winkelmandje: </h1>
            <table>
                <?php if (isset($mandjeLijst) && $mandjeLijst != null) {
                    $totaalPrijs = 0; ?>
                    <td style="background-color:#ddd; width:0.1em;">Aantal</td><td style="background-color:#ddd">Item</td><td style="background-color:#ddd"></td><td style="background-color:#ddd; width:3.2em;text-align: center;">Prijs</td><td style="background-color:#ddd; width:3.2em;"></td><?php
                   // $regel=0;
                     //print($mandjeLijst); 
                    foreach($mandje as $item){
                        $subTotaal = 0;
                        $productId = $item->getProductId();
                        $extras = $item->getProductExtra();
                        $aantalProduct = $item->getProductAantal();
                        $pizzaPrijs = $item->getProductAantal() * $item->getProductPrijs();
                        $subTotaal += $pizzaPrijs;
                        ?>
                   
                       <tr>
                            <td style="width:0.1em; text-align: center;">
                               
                                <?php print("<form action='stap1_productbestelling.php?action=change&id=$productId&extras=$extras' method='POST'>"); ?>
                                <?php print ("<input type='text' name='txtAantal' value=$aantalProduct maxlength='2' style='width: 20px;' required>"); ?>                                
                                <?php print("<input type='submit' value='+ -'>") ?>
                                <?php print("</form>") ?>
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
                            <td style='text-align:center;'>
                                <?php
                                
                                //print $productId;
                                print("<a href=stap1_productbestelling.php?action=delete&id=".$productId."&extras=".$extras." style='text-decoration:none; font-weight: bold'>Verwijder uit mandje </a>");
                                ?>
                               
                            </td>
                        </tr>
                        <?php 
                        if($extras !== 0){
                            $arrExtras = str_split($extras);
                            foreach($arrExtras as $extraNr){
                                $extrasPrijs = 0;
                                $extrasInfo=productDAO::getExtrasInfo($extraNr);
                                $extrasPrijs = $extrasInfo->IngredientPrijs;
                                $extrasPrijs = $extrasPrijs*$aantalProduct;
                                 //$extras(1) ProductService::getExtra;
                             ?>
                            <tr style="height:0.6em;padding:0;margin-top:-5px;">
                                <td></td>
                                <td style='text-align: center;font-size:small;padding:0.1em;'>Extra</td>
                                <td style='text-align: center;font-size:small;padding:0.1em;'><?php print($extrasInfo->IngredientNaam); ?></td>
                                 <td style='text-align: center; font-size:small; padding:0.1em;'><?php print($extrasPrijs. " &euro;"); ?></td>
                                <td></td>
                            </tr>
                            
                        <?php 
                            $subTotaal += $extrasPrijs;
                            }?>
                            <tr style="height:0.6em; padding:0; margin-top:-5px;">
                                <td></td>
                                <td style='text-align: center;padding:0.1em;'>Subtotaal</td>
                                <td style='text-align: center;padding:0.1em;'></td>
                                 <td style='text-align: center;padding:0.1em;'><?php print($subTotaal. " &euro;"); ?></td>
                                <td></td>
                            </tr> 
                        
                        
                          <?php   } ?>   
   
                    <?php
                    $totaalPrijs = $totaalPrijs + $subTotaal;
                        }
                 
                    ?>
                    <tr style='background-color:darkslateblue; color:white;'>
                        <td>Totaal: </td>
                        <td></td>
                        <td></td>
                        <td style='text-align: center;'><?php print($totaalPrijs) . " &euro;" ?></td>
                        <td></td>
                    </tr>
                </table>
                <br>

                <a href="stap2_logincheck.php" style="
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
                   ">Afrekenen </a>
                   <?php
               } else {
                   print("Uw winkelmandje is leeg.");
               }
               ?>

        </div>
    </body>
</html>