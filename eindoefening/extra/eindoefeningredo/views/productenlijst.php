<?php
require_once 'entities/AbstractEntity.php';
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
    "http://www.w3.org/TR/html4/loose.dtd">
<html>
    <head><title>test: pizza</title>
        <style>
            table{border-collapse:collapse;}
            td, th{padding:0.5em;}
            th{background-color:#ddd}
        </style>
    </head>
    <body>

        <table style='float:left;margin: 2em;'>
            <tr>
                <td style='font-size: 2em; font-weight: bold;'>Pizza's</td>
            </tr>
            <td style="background-color:#ddd">Naam & Omschrijving</td><td style="background-color:#ddd">Prijs</td><td style="background-color:#ddd"></td>
            <?php
            foreach ($productLijst as $product) {
                if ($product instanceof Product) {
                if ($product->getProductType() == "Pizza") {
                    ?>
                    <tr>
                        <td>
                            <?php print("Pizza ".$product->getProductNaam() . " :  " . $product->getProductOmschrijving()); ?>

                        </td>
                        <td>
                            <?php
                            print($product->getProductPrijs());
                            ?>

                        </td>
                        <td style="background-color:#FFF">
                            <?php
                            $productId = $product->getId();
                            echo"<a href=toonallepizzas.php?action=process?product=$productId style='text-decoration:none; font-weight: bold'>Voeg toe aan winkelmandje </a>"
                            ?>
                        </td>

                    </tr>
                    <?php
                }
            }
            }
            ?>
                    
                    <tr>
                <td style='font-size: 2em; font-weight: bold;'>Voorgerechten</td>
            </tr>
            <td style="background-color:#ddd">Naam & Omschrijving</td><td style="background-color:#ddd">Prijs</td><td style="background-color:#ddd"></td>
            <?php


            foreach ($productLijst as $product) {
                //if ($product instanceof Product) {
                if ($product->getProductType() == "Voorgerecht") {
                    ?>
                    <tr>
                        <td>
                            <?php print($product->getProductOmschrijving()); ?>

                        </td>
                        <td>
                            <?php
                            print($product->getProductPrijs());
                            ?>

                        </td>
                        <td style="background-color:#FFF">
                            <?php
                            //$productID = $product->getId();
                            //echo"<a class='remove-product' href='index.php?page=cart&action=addproduct&id=$productID'><span class='replace'>Add Pizza</span> </a>";
                            echo"<a class='remove-product' href='index.php?page=cart&action=addproduct&id=9'><span class='replace'>Add Pizza</span> </a>";

                            //$productId = $product->getProductId();
                            //echo"<a href=toonallepizzas.php?action=process?product=$productId style='text-decoration:none; font-weight: bold'>Voeg toe aan winkelmandje </a>"
                            ?>
                        </td>

                    </tr>
                    <?php
               // }
            }
            }
            ?>    
                    
                    
                    
                     <tr>
                <td style='font-size: 2em; font-weight: bold;'>Frisdranken</td>
            </tr>
            <td style="background-color:#ddd">Naam & Omschrijving</td><td style="background-color:#ddd">Prijs</td><td style="background-color:#ddd"></td>
            <?php


            foreach ($productLijst as $product) {
                if ($product->getProductType() == "Frisdrank") {
                    ?>
                    <tr>
                        <td>
                            <?php print($product->getProductOmschrijving()); ?>

                        </td>
                        <td>
                            <?php
                            print($product->getProductPrijs());
                            ?>

                        </td>
                        <td style="background-color:#FFF">
                            <?php
                            $productId = $product->getProductId();
                            echo"<a href=toonallepizzas.php?action=process?product=$productId style='text-decoration:none; font-weight: bold'>Voeg toe aan winkelmandje </a>"
                            ?>
                        </td>

                    </tr>
                    <?php
                }
            }
            ?>    
        </table>
        <!--Einde van de pizza db lijst weergave-->

        <br>
        <h1>Winkelmandje: </h1>
<?php
if (isset($_session["product"])) {
    print($_session["product"]);
    ?>

            <br>
            <a href="#" style="
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
    ?>
            <br>
            <a href="logincheck.php" style="
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
}
?>
    </body>
</html>