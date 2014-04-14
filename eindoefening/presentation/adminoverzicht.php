<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
    "http://www.w3.org/TR/html4/loose.dtd">
<html>
    <head><title>PizzaShop: Admin</title>
        <link rel="stylesheet" href="presentation/design.css" />
    </head>
    <body>
        <h1>Admin CRUD</h1>

        <div class='bestellingen_all' style='background-color: lightgray; margin:1em;padding:1em; float:left'>
            <h2 style='margin: 1.2em;'><a href="">Bestellingen</a></h2>
            <div class='bestellingen_list' style='float:left'>
                <h3 style='margin: 1.2em;'>Bestellingen van vandaag:</h3>
                <table style='margin: 1.2em; background-color: lightblue;'>
                    <td style="background-color:#ddd">Nr</td><td style="background-color:#ddd">Klant</td><td style="background-color:#ddd">Bestellingstijdstip</td><td style="background-color:#ddd">Status</td><td style="background-color:#ddd"></td><td style="background-color:#ddd"></td>
                    
                    <?php print($bestellingenWeergave); ?>
                    
                    </table>
            </div>
                        <div class='bestellingen_info' style='float:left'>
                <p>Totaal aantal bestellingen: <?php print($totBestellingen)?> </p>
                <p>Aantal bestellingen vandaag: <?php print($vandaagBestellingen)?></p>
            </div>
        </div>
        
        <div style='clear:both;'></div>


        

        <div class='producten_all' style='background-color: lightgray; margin:1em;padding:1em; float:left'>
            <h2 style='margin: 1.2em;'><a href="">Producten</a></h2>
            <div class='producten_list' style='float:left'>
                <table style='margin: 1.2em; background-color: lightblue;'>
                    <td style="background-color:#ddd">Id</td><td style="background-color:#ddd">Info</td><td style="background-color:#ddd">Prijs</td><td style="background-color:#ddd"></td><td style="background-color:#ddd"></td>
                    
                    <?php print($productenWeergave); ?>
                    
                    </table>
            </div>
        <div class='producten_form' style='float:left; margin:1.2em;'>
            <form name="producten" class="" action="admin.php?action=insert&type=product" method="post">
                <h3>Nieuw product toevoegen:</h3>
                    <div class="">
                        <label for="producttype" class="">producttype: </label>
                        <select name="producttype" style='margin-left: 6em;'>
                            <?php print($productTypesWeergave); ?>
                        </select>
                        
                    </div>

                    <div class="">
                        <label for="productnaam" class="">productnaam: </label>
                        <input type="text" class="" name="productnaam" id="productnaam" placeholder="Vul hier de productnaam in." required style='margin-left: 5.55em;'>
                    </div>

                    <div class="">
                        <label for="productomschrijving" class="">productomschrijving: </label>
                        <input type="text" class="" name="productomschrijving" id="productomschrijving" placeholder="Vul hier het productomschrijving in." required style='margin-left: 2.3em;'>
                    </div>

                    <div class="">
                        <label for="productprijs" class="">productprijs: </label>
                        <input type="text" class="form-control" name="productprijs" id="productprijs" placeholder="Vul hier het productprijs in." required style='margin-left: 6em;'>
                    </div>
                
                    <div class="">
                        <input type="submit" name="productenknop" class="">
                    </div>
            </form>
        </div>
        </div>
        
        <div style='clear:both;'></div>
        
        <div class='extras_all' style='background-color: lightgray; margin:1em;padding:1em; float:left'>
            <h2 style='margin: 1.2em;'><a href="">Extra's</a></h2>
            <div class='extras_all' style='float:left'>
                <table style='margin: 1.2em; background-color: lightblue;'>
                    <td style="background-color:#ddd">Id</td><td style="background-color:#ddd">Naam</td><td style="background-color:#ddd">Prijs</td><td style="background-color:#ddd"></td><td style="background-color:#ddd"></td>
                    
                    <?php print($extrasWeergave); ?>
                    
                    </table>
            </div>
        <div class='extras_form' style='float:left; margin:1.2em;'>
            <form name="extras" class="" action="admin.php?action=insert&type=extras" method="post">
                <h3>Nieuw ingredi&euml;nt toevoegen:</h3>
                

                    <div class="">
                        <label for="extranaam" class="">Ingredi&euml;ntnaam: </label>
                        <input type="text" class="" name="extranaam" id="extranaam" placeholder="Vul hier de extranaam in." required style='margin-left: 5.55em;'>
                    </div>

                    <div class="">
                        <label for="extraprijs" class="">Ingredi&euml;ntprijs: </label>
                        <input type="text" class="form-control" name="extraprijs" id="extraprijs" placeholder="Vul hier het extraprijs in." required style='margin-left: 6em;'>
                    </div>
                
                    <div class="">
                        <input type="submit" name="extrasknop" class="">
                    </div>
            </form>
        </div>
        </div>

        <div style='clear:both;'></div>
        
        <div class='klanten_all' style='background-color: lightgray; margin:1em;padding:1em; float:left'>
            <h2 style='margin: 1.2em;'><a href="">Klanten</a></h2>
            <div class='klanten_list' style='float:left'>
                <table style='margin: 1.2em; background-color: lightblue;'>
                    <td style="background-color:#ddd">Id</td><td style="background-color:#ddd">Naam</td><td style="background-color:#ddd">Adres</td><td style="background-color:#ddd">Tel</td><td style="background-color:#ddd">Email</td><td style="background-color:#ddd">Status</td><td style="background-color:#ddd"></td><td style="background-color:#ddd"></td>
                    
                    <?php print($klantenWeergave); ?>
                    
                    </table>
            </div>
        <div class='klanten_form' style='float:left; margin:1.2em;'>
            <form name="klanten" class="" action="admin.php?action=insert&type=klant" method="post">
                    <h3>Nieuwe klant toevoegen:</h3>
                    <div class="">
                        <label for="klantfamilienaam" class="">klantfamilienaam: </label>
                        <input type="text" class="" name="klantfamilienaam" id="klantfamilienaam" placeholder="Vul hier de klantfamilienaam in." required style='margin-left: 2.2em;'>
                    </div>

                    <div class="">
                        <label for="klantvoornaam" class="">klantvoornaam: </label>
                        <input type="text" class="" name="klantvoornaam" id="klantvoornaam" placeholder="Vul hier de klantvoornaam in." required style='margin-left: 2.9em;'>
                    </div>

                    <div class="">
                        <label for="klantadres" class="">klantadres: </label>
                        <input type="text" class="" name="klantadres" id="klantadres" placeholder="Vul hier het klantadres in." required style='margin-left: 4.9em;'>
                    </div>

                    <div class="">
                        <label for="klantpostcode" class="">klantpostcode: </label>
                        <input type="text" class="form-control" name="klantpostcode" id="klantpostcode" placeholder="Vul hier het klantpostcode in." required style='margin-left: 3.1em;'>
                    </div>
                
                    <div class="">
                        <label for="klantstatus" class="">klantstatus: </label>
                        <select name="producttype" style='margin-left: 6em;'>
                            <?php print($klantTypesWeergave); ?>
                        </select>
                    </div>
                
                <div class="">
                        <label for="klanttelefoonnummer" class="">klanttelefoonnummer: </label>
                        <input type="text" class="form-control" name="klanttelefoonnummer" id="klanttelefoonnummer" placeholder="Vul hier het klanttelefoonnummer in." required style='margin-left: 0.2em;'>
                    </div>
                
                <div class="">
                        <label for="klantemailadres" class="">klantemailadres: </label>
                        <input type="text" class="form-control" name="klantemailadres" id="klantemailadres" placeholder="Vul hier het klantemailadres in." required style='margin-left: 2.6em;'>
                    </div>
                
                <div class="">
                        <label for="klantwachtwoord" class="">klantwachtwoord: </label>
                        <input type="text" class="form-control" name="klantwachtwoord" id="klantwachtwoord" placeholder="Vul hier het klantwachtwoord in." required style='margin-left: 1.7em;'>
                    </div>
                
                    <div class="">
                        <input type="submit" name="klantenknop" class="">
                    </div>
            </form>
        </div>
        </div>

<div style='clear:both;'></div>
        <p><a href="admin.php?action=logout">Klik hier om uit te loggen</a></p>
    </body>
</html>