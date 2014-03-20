<?php    require_once("../test.php");?>
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


        <h2>klantendatabase</h2>
        <?php
        $klanten = $kl->getAlleKlanten();
        ?>
        <ul>
            <?php
            foreach ($klanten as $klant) {
                ?>
                <?php print($klant->getFamilienaam() . " " . $klant->getVoornaam() . " " . $klant->getAdres() . " " . $klant->getPostcode() . " " . $klant->getGemeente() . " " . $klant->getTelefoonnummer() . " " . $klant->getEmailadres() . " " . $klant->getWachtwoord()); ?>
                <hr>
                <?php
            }
            ?>
        </ul>
<!--Einde van de klanten db lijst weergave-->
        <h2>soorten pizza</h2>
        <?php
        $pizzas = $pl->getAllePizzas();
        ?>
        <table>
            <?php
            foreach ($pizzas as $pizza){ 
                
                ?>
            <tr>
                <td>
                    <?php print($pizza->getPizzaId() . " " . $pizza->getNaam() . " " . $pizza->getBeschrijving() . " "); ?>
                
                </td>
                <td>
                    <?php print($pizza->getPrijs()); ?>
                
                </td>
                <td>
                    <a href="10.0_verwijderboek.php?id=<?php print($pizza->getPizzaId()); ?>">Voeg toe aan winkelmandje </a>
                    
                </td>

            </tr>
             <?php
            }
            ?>    
        </table>
        <!--Einde van de pizza db lijst weergave-->
        
        <h2>Winkelmandje: </h2>
                        <td>
                    <a href="10.0_verwijderboek.php?id=<?php print($pizza->getPizzaId()); ?>">Verwijder uit winkelmandje </a>
                </td>
                <br>
                    <a href="afrekenen.php?id=<?php print($pizza->getPizzaId()); ?>"style="
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