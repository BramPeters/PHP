<?php
//include("presentation/testhtml.php");

/*klant*/

class Klant {

    public function __construct($klantId, $familienaam, $voornaam, $adres, $postcode, $gemeente, $telefoonnummer, $emailadres, $wachtwoord) {
        $this->klantId = $klantId;
        $this->familienaam = $familienaam;
        $this->voornaam = $voornaam;
        $this->adres = $adres;
        $this->postcode = $postcode;
        $this->gemeente = $gemeente;
        $this->telefoonnummer = $telefoonnummer;
        $this->emailadres = $emailadres;
        $this->wachtwoord = $wachtwoord;
    }

    public function getKlantId() {
        return $this->klantId;
    }

    public function getFamilienaam() {
        return $this->familienaam;
    }

    public function getVoornaam() {
        return $this->voornaam;
    }

    public function getAdres() {
        return $this->adres;
    }

    public function getPostcode() {
        return $this->postcode;
    }

    public function getGemeente() {
        return $this->gemeente;
    }

    public function getTelefoonnummer() {
        return $this->telefoonnummer;
    }

    public function getEmailadres() {
        return $this->emailadres;
    }

    public function getWachtwoord() {
        return $this->wachtwoord;
    }

}

class Klantenlijst {

    private $dbConn;
    private $dbUsername;
    private $dbPassword;

    public function __construct() {
        $this->dbConn = "mysql:host=localhost;dbname=pizzashop";
        $this->dbUsername = "root";
        $this->dbPassword = "vdab";
    }

    public function getAlleKlanten() {
        $lijst = array();
        $sql = "select klantId, familienaam, voornaam, adres,postcode, gemeente, telefoonnummer, emailadres, wachtwoord from klanten order by klantId desc";
        $dbh = new PDO($this->dbConn, $this->dbUsername, $this->dbPassword);
        $resultSet = $dbh->query($sql);
        foreach ($resultSet as $rij) {
            $klant = new Klant($rij["klantId"], $rij["familienaam"], $rij["voornaam"], $rij["adres"], $rij["postcode"], $rij["gemeente"], $rij["telefoonnummer"], $rij["emailadres"], $rij["wachtwoord"]);
            array_push($lijst, $klant);
        }
        $dbh = null;
        return $lijst;
    }

}
/*pizza*/
class Pizza {

    public function __construct($pizzaId, $naam, $beschrijving, $prijs) {
        $this->pizzaId = $pizzaId;
        $this->naam = $naam;
        $this->beschrijving = $beschrijving;
        $this->prijs = $prijs;
    }

    public function getPizzaId() {
        return $this->pizzaId;
    }

    public function getNaam() {
        return $this->naam;
    }

    public function getBeschrijving() {
        return $this->beschrijving;
    }

    public function getPrijs() {
        return $this->prijs;
    }

}

class Pizzalijst {

    private $dbConn;
    private $dbUsername;
    private $dbPassword;

    public function __construct() {
        $this->dbConn = "mysql:host=localhost;dbname=pizzashop";
        $this->dbUsername = "root";
        $this->dbPassword = "vdab";
    }

    public function getAllePizzas() {
        $lijst = array();
        $sql = "select pizzaId, naam, beschrijving, prijs from pizza order by pizzaId asc";
        $dbh = new PDO($this->dbConn, $this->dbUsername, $this->dbPassword);
        $resultSet = $dbh->query($sql);
        foreach ($resultSet as $rij) {
            $pizza = new Pizza($rij["pizzaId"], $rij["naam"], $rij["beschrijving"], $rij["prijs"]);
            array_push($lijst, $pizza);
        }
        $dbh = null;
        return $lijst;
    }

}






$kl = new Klantenlijst();
$pl = new Pizzalijst();
?>

