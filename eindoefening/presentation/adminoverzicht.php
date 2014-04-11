<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
    "http://www.w3.org/TR/html4/loose.dtd">
<html>
    <head><title>PizzaShop: Admin</title>
        <link rel="stylesheet" href="presentation/design.css" />
    </head>
    <body>
        <h1>Admin CRUD</h1>

        <p><a href="">Bestellingen</a></p>
        <div class='bestelling'>
        </div>


        

        <div class='producten_all' style='background-color: lightgray; margin:1em;padding:1em; float:left'>
            <h2 style='margin: 1.2em;'><a href="">Producten</a></h2>
            <div class='producten_list' style='float:left'>
                <table style='margin: 1.2em; background-color: lightblue;'>
                    <td style="background-color:#ddd">Id</td><td style="background-color:#ddd">Info</td><td style="background-color:#ddd">Prijs</td>
                    
                    <?php print($productenWeergave); ?>
                    
                    </table>
            </div>
        <div class='producten_form' style='float:left; margin:1.2em;'>
            <form name="producten" class="" action="admin.php?action=insert&type=product" method="post">
                
                    <div class="">
                        <label for="producttype" class="">producttype: </label>
                        <input type="text" class="" name="producttype" id="producttype" placeholder="Vul hier de producttype in." required style='margin-left: 6em;'>
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
        
        <div class='klanten_all' style='background-color: lightgray; margin:1em;padding:1em; float:left'>
            <h2 style='margin: 1.2em;'><a href="">Klanten</a></h2>
            <div class='klanten_list' style='float:left'>
                <table style='margin: 1.2em; background-color: lightblue;'>
                    <td style="background-color:#ddd">Id</td><td style="background-color:#ddd">Info</td><td style="background-color:#ddd">Prijs</td>
                    
                    <?php print($klantenWeergave); ?>
                    
                    </table>
            </div>
        <div class='klanten_form' style='float:left; margin:1.2em;'>
            <form name="klanten" class="" action="admin.php?action=insert&type=klant" method="post">
                
                    <div class="">
                        <label for="klantfamilienaam" class="">klantfamilienaam: </label>
                        <input type="text" class="" name="klantfamilienaam" id="klantfamilienaam" placeholder="Vul hier de klantfamilienaam in." required style='margin-left: 6em;'>
                    </div>

                    <div class="">
                        <label for="klantvoornaam" class="">klantvoornaam: </label>
                        <input type="text" class="" name="klantvoornaam" id="klantvoornaam" placeholder="Vul hier de klantvoornaam in." required style='margin-left: 5.55em;'>
                    </div>

                    <div class="">
                        <label for="klantadres" class="">klantadres: </label>
                        <input type="text" class="" name="klantadres" id="klantadres" placeholder="Vul hier het klantadres in." required style='margin-left: 2.3em;'>
                    </div>

                    <div class="">
                        <label for="klantpostcode" class="">klantpostcode: </label>
                        <input type="text" class="form-control" name="klantpostcode" id="klantpostcode" placeholder="Vul hier het klantpostcode in." required style='margin-left: 6em;'>
                    </div>
                
                    <div class="">
                        <label for="klantstatus" class="">klantstatus: </label>
                        <input type="text" class="form-control" name="klantstatus" id="klantstatus" placeholder="Vul hier het klantstatus in." required style='margin-left: 6em;'>
                    </div>
                
                <div class="">
                        <label for="klanttelefoonnummer" class="">klanttelefoonnummer: </label>
                        <input type="text" class="form-control" name="klanttelefoonnummer" id="klanttelefoonnummer" placeholder="Vul hier het klanttelefoonnummer in." required style='margin-left: 6em;'>
                    </div>
                
                <div class="">
                        <label for="klantemailadres" class="">klantemailadres: </label>
                        <input type="text" class="form-control" name="klantemailadres" id="klantemailadres" placeholder="Vul hier het klantemailadres in." required style='margin-left: 6em;'>
                    </div>
                
                <div class="">
                        <label for="klantwachtwoord" class="">klantwachtwoord: </label>
                        <input type="text" class="form-control" name="klantwachtwoord" id="klantwachtwoord" placeholder="Vul hier het klantwachtwoord in." required style='margin-left: 6em;'>
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