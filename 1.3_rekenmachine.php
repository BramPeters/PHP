<?php

class Rekenmachine {

    //Bereken kwadraat
    public function getKwadraat($getal) {
        $kwad = $getal * $getal;
        return "Het kwadraat van ".$getal." is: ".$kwad;
    }

    //Bereken som
    public function getSom($getal1, $getal2) {
        $som = $getal1 + $getal2;
        return "De som van ".$getal1." en ".$getal2." is: ".$som;
    }
        //Bereken vermenigvuldiging
    public function getVermenigvuldig($getal1, $getal2) {
        $resultaat = $getal1 * $getal2;
        return "De vermenigvuldiging van ".$getal1." en ".$getal2." is: ".$resultaat;
    }

}
?>

<!DOCTYPE HTML>
<html>
    <head>
        <meta charset='utf-8'>
        <title>Mijn rekenmachine</title>
    </head>
    <style type="text/css">
        h1{color:red;}
    </style>
    <body>
        <h1>
            <?php
            $reken = new Rekenmachine();
            print($reken->getKwadraat(5));
            ?>
        </h1>
        <h1>
<?php
print($reken->getSom(65, 8));
?>
        </h1>
        <h1>
<?php
print($reken->getSom(34, 55));
?>
        </h1>
                <h1>
<?php
print($reken->getVermenigvuldig(4, 6));
?>
        </h1>
    </body>
</html>