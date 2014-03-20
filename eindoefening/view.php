<?php
/*pizza*/
class Pizza {

    public function __construct($ProductType, $ProductNaam,$ProductOmschrijving, $ProductPrijs) {
        $this->ProductType = $ProductType;
        $this->ProductNaam = $ProductNaam;
        $this->ProductOmschrijving = $ProductOmschrijving;
        $this->ProductPrijs = $ProductPrijs;
    }
    public function getProductType() {
        return $this->ProductType;
    }

    public function getProductNaam() {
        return $this->ProductNaam;
    }
    public function getProductOmschrijving() {
        return $this->ProductOmschrijving;
    }
    public function getProductPrijs() {
        return $this->ProductPrijs;
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
        $sql = "select ProductType, ProductNaam, ProductOmschrijving, ProductPrijs from producten order by ProductPrijs asc";
        $dbh = new PDO($this->dbConn, $this->dbUsername, $this->dbPassword);
        $resultSet = $dbh->query($sql);
        foreach ($resultSet as $rij) {
            if($rij["ProductType"] == 1){
            $pizza = new Pizza("Pizza", $rij["ProductNaam"],$rij["ProductOmschrijving"], $rij["ProductPrijs"]);
            array_push($lijst, $pizza);
            }elseif($rij["ProductType"] == 2){
            $pizza = new Pizza("Frisdrank", $rij["ProductNaam"],$rij["ProductOmschrijving"] , $rij["ProductPrijs"]);
            array_push($lijst, $pizza);   
            }
        }
        $dbh = null;
        return $lijst;
    }

}






//$kl = new Klantenlijst();
$pl = new Pizzalijst();
?>

