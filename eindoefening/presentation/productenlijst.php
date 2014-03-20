

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
    "http://www.w3.org/TR/html4/loose.dtd">
<html>
    <head><title>test: pizza</title>
        <style>
            table{border-collapse:collapse;}
            td, th{padding:0.5em;}
            th{background-color:#ddd}
                        .breadcrumbs{
            list-style:none;
            overflow:hidden;
            margin:0;
            padding:0;
            }
            .breadcrumbs li{
                display:inline;
            }
            .breadcrumbs li a{
                position:relative;
                display:block;
                float:left;
                background:#E0ECF4;
                text-decoration:none;
                line-height:40px;
                padding-left:30px;
            }
            .breadcrumbs li:first-child a{
             padding-left:10px;   
            }
            .breadcrumbs li a:after{
                content: "";
                display:block;
                width:0;
                height:0;
                border-top:20px solid transparent;
                border-bottom:20px solid transparent;
                border-left:20px solid #E0ECF4;
                position:absolute;
                top:50%;
                margin-top:-20px;
                left:100%;
                z-index:2;
            }
            .breadcrumbs li a:before{
                content: "";
                display:block;
                width:0;
                height:0;
                border-top:23px solid transparent;
                border-bottom:23px solid transparent;
                border-left:23px solid white;
                position:absolute;
                top:50%;
                margin-top:-23px;
                margin-left: 0px;
                left:100%;
                z-index:1;
            }
            .breadcrumbs .actief a{
                background:#005689;
                color:#FFF;
            }
            .breadcrumbs .actief a:after{
                border-left-color:#005689;
            }
        </style>
    </head>
    <body>
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
            print_r($mandjeLijst);
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
        <!--Einde van de pizza db lijst weergave-->
        <div style='float:right;margin-top: 8em;background-color: lightsteelblue; padding:0.7em; margin-right: 1em; display:none;'>
            <br>
            <h1>Winkelmandje: </h1>
            <table>
                <?php if (isset($winkelLijst) && $winkelLijst != null) {
                    $prijs = 0; ?>
                    <td style="background-color:#ddd; width:0.1em;">Aantal</td><td style="background-color:#ddd">Item</td><td style="background-color:#ddd"></td><td style="background-color:#ddd; width:3.2em;text-align: center;">Prijs</td><td style="background-color:#ddd; width:3.2em;"></td><?php
                    foreach ($winkelLijst as $product) {
                        ?>
                        <tr>
                            <td style="width:0.1em; text-align: center;">
                                <?php print($product->getProductAantal()); ?>
                            </td>
                            <td style="width:0.1em;">
                                <?php print($product->getProductSoort()); ?>
                            </td>
                            <td style="width:0.1em;">
                                <?php print($product->getProductNaam()); ?>
                            </td>
                            <td style='text-align: center;'>
                                <?php print($product->getProductAantal() * $product->getProductPrijs() . " &euro;"); ?>
                            </td>
                            <td style='text-align:center;'>
                                <?php
                                $productId = $product->getProductId();
                                echo"<a href=toonallepizzas.php?action=delete&id=$productId style='text-decoration:none; font-weight: bold'>Verwijder uit mandje </a>"
                                ?>
                            </td>
                        </tr>
                        <?php $prijs = $prijs + ($product->getProductAantal() * $product->getProductPrijs());
                    }
                    ?>
                    <tr style='background-color:darkslateblue; color:white;'>
                        <td>Totaal: </td>
                        <td></td>
                        <td></td>
                        <td style='text-align: center;'><?php print($prijs) . " &euro;" ?></td>
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
        
        
        
        
        
        
        
        
        <!--versie 2-->
        <div style='float:right;margin-top: 8em;background-color: lightsteelblue; padding:0.7em; margin-right: 1em;'>
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
                            <td style='text-align:center;'>
                                <?php
                                $productId = $item->getProductNaam();
                                //print $productId;
                                print("<a href=toonallepizzas.php?action=delete&id=".urlencode($productId)." style='text-decoration:none; font-weight: bold'>Verwijder uit mandje </a>");
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