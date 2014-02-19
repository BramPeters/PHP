<?php

class Thermometer {

    private $temperatuur;

    public function __construct($temperatuur) {
        $this->temperatuur = $temperatuur;
    }

    public function verhoog($aantalGraden) {
        if ($this->temperatuur + $aantalGraden > 100) {
            print("De temperatuur kan niet boven de 100 graden gaan. Er is dus niet verhoogd met ".$aantalGraden." graden<br>");
        } else {
            $this->temperatuur += $aantalGraden;
            print($this->temperatuur . " graden na verwarming<br>");
        }
    }

    public function verlaag($aantalGraden) {
        if ($this->temperatuur - $aantalGraden < -50) {
            print("De temperatuur kan niet onder de -50 graden gaan. Er is dus niet verlaagd met ".$aantalGraden." graden <br>");
        } else {
            $this->temperatuur -= $aantalGraden;
            print($this->temperatuur . " graden na afkoeling<br>");
        }
    }

    public function getTemperatuur() {
        return $this->temperatuur;
    }

}
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
    "http://www.w3.org/TR/html4/loose.dtd">
<html>
    <head><title>Thermometer</title></head>
    <body>
        <h1>
            <?php
            $therm = new Thermometer(25);
            print($therm->getTemperatuur() . " begingraden<br>");
            $therm->verhoog(80);
            $therm->verlaag(20);
            ?>
        </h1>
    </body>
</html>