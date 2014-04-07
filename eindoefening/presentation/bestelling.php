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
            //Print_r ($postcodes);
            //print_r($_SESSION);
            if (!empty($gebruikerInfo)) {
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
        <a href=alteruser.php>Klik hier om deze gegevens aan te passen.</a>
    </div>
        
        
        
        
<div class="winkelmandje">
            <br>
            <h1>Winkelmandje: </h1>
            <table>
                <?php if (isset($mandjeLijst) && $mandjeLijst != null) {
                    $totaalPrijs = 0; ?>
                    <td style="background-color:#ddd; width:0.1em;">Aantal</td><td style="background-color:#ddd">Item</td><td style="background-color:#ddd"></td><td style="background-color:#ddd; width:3.2em;text-align: center;">Prijs</td><td style="background-color:#ddd; width:3.2em;"></td><?php
                    
                    foreach($mandjeLijst as $item){
                        //print("product: ".$item." - ".$aantal."<brb>");
                        ?>
                       <tr>
                            <td style="width:0.1em; text-align: center;">
                                <?php print($item->getProductAantal()); ?>
                            </td>
                            <td style="width:0.1em;">
                                <?php print($item->getProductSoort()); ?>
                            </td>
                            <td style="width:0.1em;">
                                <?php print($item->getProductNaam()); ?>
                            </td>
                            <td style='text-align: center;'>
                                <?php print($item->getProductAantal() * $item->getProductPrijs() . " &euro;"); ?>
                            </td>
                        </tr> 
                    <?php
                    $totaalPrijs = $totaalPrijs + ($item->getProductAantal() * $item->getProductPrijs());
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
                   <?php
               } else {
                   print("Uw winkelmandje is leeg.");
               }
               ?>


        <br>
<a href=toonallepizzas.php>Klik hier om het winkelmandje aan te passen.</a>
    </div>
        
         <?php 
         if (!in_array($gebruikerInfo->getKlantPostcode(), $postcodes)){
         ?>
         <p style="float:right;text-decoration:none; font-weight: bold; font-size: 2.5em;margin-right: 20%;margin-top:-11.5em;color:lightgrey; background-color:#b24747 ;border:10px ridge red; padding:5px;width:361px;text-align:center;height:150px;">Helaas, Uw adres ligt niet binnen onze leveringszone.</p> 
         <?php
         }else if(!isset($mandjeLijst) || $mandjeLijst == null){

         }else{
             //style="float:right;text-decoration:none; font-weight: bold; font-size: 2.5em;margin-right: 20%;margin-top:-10.5em;color:lightgrey; background-color: lightseagreen;border:10px ridge green; padding:5px;"
          ?>  
                <a href="finish.php" style="float:right; margin-right: 10em; margin-top:-20em; "><input type="button" value="Klik hier om de bestelling door te sturen"></a>
         <?php
          } 
         ?>
        
        
        
        
    </body>
</html>