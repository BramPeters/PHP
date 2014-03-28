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
            <?php print("--winkelmandje".$mandjeLijst."--")?>
            <tr>
                <td style='font-size: 2em; font-weight: bold;'><?php print($_GET["name"]) ?></td>
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
                           // echo"<a href=pizzaextras.php?action=process?product=$ingrId style='text-decoration:none; font-weight: bold'>Voeg toe aan uw pizza </a>"
                            print("<input type='checkbox' id='$ingrId' name='$ingrId' value='No' unchecked><label for='$ingrId'>Voeg toe aan de pizza.</label>");
                            
                            ?>
                        </td>
                    </tr>
                    <?php
                }
            
            ?>                                   
        </table>
            <?php print("<form action='toonallepizzas.php?action=change'  method='POST'>"); ?>
               <?php print ("<input type='text' name='txtAantal' placeholder='Aantal' maxlength='2' style='width: 80px;' required>"); ?>                                
               <?php print("<br><br>"."<input type='submit' value='Personaliseer!'>") ?>
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
                               
                                <?php print("<form action='toonallepizzas.php?action=change&id=$productId'  method='POST'>"); ?>
                                <?php print ("<input type='text' name='txtAantal' value='".$item->getProductAantal()."' maxlength='2' style='width: 20px;' required>"); ?>                                
                                <?php print("<input type='submit' value='+ -'>") ?>
                                </form>
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
                            <td style='text-align:center;'>
                                <?php
                                
                                //print $productId;
                                print("<a href=toonallepizzas.php?action=delete&id=".$productId." style='text-decoration:none; font-weight: bold'>Verwijder uit mandje </a>");
                                ?>
                               
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

                <a href="toonallepizzas.php" style="
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
        <!-- versie 2 end -->
        
        
        
        
        
        
        
        
        
        

 <?php 
 //Print_r ($_SESSION); 
 //var_dump($_SESSION);
 ?>



    </body>
</html>