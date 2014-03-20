<?php require_once("../view.php"); ?>
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

        <h2>Soorten producten: </h2>

<?php
$pizzas = $pl->getAllePizzas();
?>
        <table>
            <td>Soort</td><td>Naam & Omschrijving</td><td>Prijs</td>
            <?php
            foreach ($pizzas as $pizza) {
                ?>
                <tr>
                    <td>
    <?php print($pizza->getProductType()); ?>

                    </td>
                    <td>
    <?php print($pizza->getProductNaam() . " :  " . $pizza->getProductOmschrijving()); ?>

                    </td>
                    <td>
    <?php print($pizza->getProductPrijs()); ?>

                    </td>
                    <td>
                        <a href="#">Voeg toe aan winkelmandje </a>

                    </td>

                </tr>
                <?php
            }
            ?>    
        </table>
        <!--Einde van de pizza db lijst weergave-->

        <h2>Winkelmandje: </h2>

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
    </body>
</html>