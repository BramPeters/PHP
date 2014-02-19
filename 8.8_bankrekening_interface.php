<?php
interface Omschrijving {
	public function getOmschrijving();
}

abstract class Rekening implements Omschrijving {
	
	private $rekeningnummer;
	private $saldo = 0;
		
	public function getSaldo() {
		return $this->saldo;
	}
	
	public function stort($bedrag) {
		$this->saldo = $this->saldo + $bedrag;
	}
	
	public function setRekeningnummer($rekeningnummer) {
		$this->rekeningnummer = $rekeningnummer;
	}
	
	public abstract function voerIntrestDoor();
}

class Zichtrekening extends Rekening {
	private static $intrest = 0.025;
	
	public function __construct($rekeningnummer) {
		parent::setRekeningnummer($rekeningnummer);
	}
	
	public function voerIntrestDoor() {
		parent::stort(parent::getSaldo() * self::$intrest);
	}
	
	public function getOmschrijving() {
		return "Kortetermijnrekening";
	}
}

class Spaarrekening extends Rekening {
	private static $intrest = 0.03;
	
	public function __construct($rekeningnummer) {
		parent::setRekeningnummer($rekeningnummer);
	}
	
	public function voerIntrestDoor() {
		parent::stort(parent::getSaldo() * self::$intrest);
	}
	
	public function getOmschrijving() {
		return "Langetermijnrekening";
	}
}
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
	<head><title>Rekeningnummers</title></head>
	<body>
		<h1>
			<?php
			$rek = new Zichtrekening("091-0122401-16");
                        print($rek->getOmschrijving(). "<br>");
			print("Het saldo is: " .$rek->getSaldo() . "<br>");
			$rek->stort(200);
			print("Het saldo is: " .$rek->getSaldo() . "<br>");
			$rek->voerIntrestDoor();
			print("Het saldo is: " .$rek->getSaldo() . "<br>");
			?>
                    			<?php
			$rek = new Spaarrekening("091-0122401-16");
                        print($rek->getOmschrijving(). "<br>");
			print("Het saldo is: " .$rek->getSaldo() . "<br>");
			$rek->stort(200);
			print("Het saldo is: " .$rek->getSaldo() . "<br>");
			$rek->voerIntrestDoor();
			print("Het saldo is: " .$rek->getSaldo() . "<br>");
			?>
                    
		</h1>
	</body>
</html>