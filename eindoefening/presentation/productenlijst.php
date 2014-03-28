

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
            print_r($_SESSION);
            //print_r($mandjeLijst);
            foreach ($productLijst as $product) {
                if ($product->getProductType() == "Pizza") {
                    ?>
                    <tr>
                        <td>

                            <?php print("Pizza " . $product->getProductNaam() . " :  " . $product->getProductOmschrijving()); ?>

                        </td>
                        <td>
                            <?php
                            print($product->getProductPrijs() . " &euro;");
                            ?>

                        </td>
                        <td style="background-color:#FFF">
                            <?php
                            $productId = $product->getProductId();
                            echo"<a href=toonallepizzas.php?action=process&product=$productId style='text-decoration:none; font-weight: bold'>Voeg toe aan mandje </a>"
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
                            echo"<a href=toonallepizzas.php?action=process&product=$productId style='text-decoration:none; font-weight: bold'>Voeg toe aan mandje </a>"
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
                            echo"<a href=toonallepizzas.php?action=process&product=$productId style='text-decoration:none; font-weight: bold'>Voeg toe aan mandje </a>"
                            ?>
                        </td>

                    </tr>
                    <?php
                }
            }
            ?>    
        </table>

        
        
        
        
        
        
        
        
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
                               
                                <form action='toonallepizzas.php?action=change' method='GET'>
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