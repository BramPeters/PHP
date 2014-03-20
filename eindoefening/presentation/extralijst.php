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
    <body style=' margin: 5%;'>
        <div style='float:left;'>
        <table >
            <h1>Kies uw extra ingredi&#235;nten voor de pizza: </h1>
            <tr>
                <td style='font-size: 2em; font-weight: bold;'></td>
            </tr>
            <td style="background-color:#ddd">Extra ingredi&#235;nten</td><td style="background-color:#ddd">Prijs</td><td style="background-color:#ddd"></td>
            <?php
            foreach ($extraLijst as $extra) {
                    ?>
                    <tr>
                        <td>                           
                            <?php print("Extra " . $extra->getIngredientNaam() . " :  " ); ?>
                        </td>
                        <td>                           
                            <?php print($extra->getIngredientPrijs(). " &euro;"); ?>
                        </td>
                        <td style="background-color:#FFF">
                            <?php
                            $ingrId = $extra->getIngredientId();
                            echo"<a href=pizzaextras.php?action=process?product=$ingrId style='text-decoration:none; font-weight: bold'>Voeg toe aan uw pizza </a>"
                            ?>
                        </td>
                    </tr>
                    <?php
                }
            
            ?>
        </table>
    </div>
        <!--Einde van de pizza db lijst weergave-->
        <div style='float:right;margin-right: 7em; margin-top: 8em;background-color: lightsteelblue; padding:0.7em;'>
        <br>
        <h1>Winkelmandje: </h1>
        <table style='border:solid grey 1px'>
            
<?php
if (isset($winkelLijst) && $winkelLijst != null) { $prijs=0;?>
    <td style="background-color:#ddd">Aantal</td><td style="background-color:#ddd">Item</td><td style="background-color:#ddd"></td><td style="background-color:#ddd; width:3.2em;">Prijs</td><?php
    foreach ($winkelLijst as $product) {
        ?>
                    <tr>
                        <td>
        <?php print($product->getProductAantal()); ?>
                        </td>
                        <td>
        <?php print($product->getProductSoort()); ?>
                        </td>
                        <td>
        <?php print($product->getProductNaam()); ?>
                        </td>
                        <td style='text-align: right;'>
        <?php print($product->getProductAantal() * $product->getProductPrijs() . " &euro;"); ?>
                        </td>
                    </tr>
                            <?php $prijs = $prijs+($product->getProductAantal() * $product->getProductPrijs());}
                        ?>
                    <tr style='background-color:darkslateblue; color:white;'>
                        <td>Totaal: </td>
                        <td></td>
                        <td></td>
                        <td style='text-align: right;'><?php print($prijs). " &euro;" ?></td>
                    </tr>
            </table>
            <br>
    <?php
} else {
    print("Uw winkelmandje is leeg.");
}
?>

</div>

                    <a href="toonallepizzas.php" style="
               border-top: 1px solid #96d1f8;
               background: #204080;
               padding: 5px 10px;
               margin-left: 12em;
               clear:both;
               float:left;
               margin-top:2em;

               -webkit-border-radius: 8px;
               -moz-border-radius: 8px;
               border-radius: 8px;

               color: white;
               font-size: 18px;
               text-decoration: none; 
               vertical-align: middle;
               ">Klaar met toevoegen </a>



    </body>
</html>