<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
    "http://www.w3.org/TR/html4/loose.dtd">
<html>
    <head><title>test: pizza</title>
        <link rel="stylesheet" href="presentation/design.css" />
    </head>
    <body style=' margin: 5%;'>
        <div style='float:left;'>
        <table >
            <h1>Personaliseer uw pizza: </h1>
            <?php $id = $_GET["product"] ?>
            <?php print("<form action='toonallepizzas.php?action=extras&id=$id'  method='POST'>"); ?>
            
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
                            $ingrName = $extra->getIngredientNaam();
                           // echo"<a href=pizzaextras.php?action=process?product=$ingrId style='text-decoration:none; font-weight: bold'>Voeg toe aan uw pizza </a>"
                            print("<input type='checkbox' id='$ingrId' name='extra[]' value='$ingrId' unchecked><label for='$ingrId'>Voeg toe aan de pizza.</label>");
                            
                            ?>
                        </td>
                    </tr>
                    <?php
                }
            
            ?>                                   
        </table>
                
                <?php print ("<input type='number' name='txtAantal' min='1' max='99' placeholder='Aantal' maxlength='2' style='width: 80px;' required>"); ?>                                
                <?php print("<br><br>"."<input type='submit' value='Voeg toe!'>") ?>
                <?php print("<a href='toonallepizzas.php'><input type='button' value='Annuleren'></a>") ?>
                <?php print("</form>") ?>
                    
        
    </div>
        <!--Einde van de pizza db lijst weergave--> 
        
        <!--versie 2-->
        <div style='float:right;' class="winkelmandje">
            
            <br>
            <h1>Winkelmandje: </h1>
            <table>
                <?php if (isset($mandjeLijst) && $mandjeLijst != null) {
                    $totaalPrijs = 0; ?>
                    <td style="background-color:#ddd; width:0.1em;">Aantal</td><td style="background-color:#ddd">Item</td><td style="background-color:#ddd"></td><td style="background-color:#ddd; width:3.2em;text-align: center;">Prijs</td><td style="background-color:#ddd; width:3.2em;"></td><?php
                    
                    foreach($mandjeLijst as $item){
                        $productId = $item->getProductId();
                        
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

        </div>
        <!-- versie 2 end -->
        
        
        
        
        
        
        
        
        
        

 <?php 
 //Print_r ($_SESSION); 
 //var_dump($_SESSION);
 ?>



    </body>
</html>