<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
    "http://www.w3.org/TR/html4/loose.dtd">
<html>
    <head><title>test: pizza</title>
        <link rel="stylesheet" href="presentation/design.css" />
    </head>
    <body>
        <div class="afwerking">
            <h2><?php print($gebruikerInfo->getKlantVoornaam()." ".$gebruikerInfo->getKlantFamilienaam().", "); ?></h2>
            <br><br>
            <p><?php print("Uw bestelling wordt binnen het uur geleverd aan het adres: ".$gebruikerInfo->getKlantAdres()."."); ?></p>
            <?php $prijs=0;?>
            <?php foreach ($mandjeLijst as $product) { $prijs = $prijs+($product->getProductAantal() * $product->getProductPrijs()); }?>
            <br>
            <p><?php print("De prijs bedraagt: ".$prijs." &euro; ."); ?></p>
            <br>
            <h3>Smakelijk!</h3>
            
            
            <br><br>
            <a href='index.html'>Klik hier om terug te gaan naar de startpagina.</a>
            
        </div>
        
    </body>
</html>