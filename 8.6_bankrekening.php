<?php
class Rekening {
	
	private static $intrest = 0.03;
	private $rekeningnummer;
	private $saldo;
	
	public function __construct($rekeningnummer) {
		$this->rekeningnummer = $rekeningnummer;
		$this->saldo = 0;
	}
	
	public function getSaldo() {
		return $this->saldo;
	}
	
	public function stort($bedrag) {
		$this->saldo = $this->saldo + $bedrag;
	}
	
	public function voerIntrestDoor() {
		$this->saldo = $this->saldo + ($this->saldo * self::$intrest);
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
			$rek = new Rekening("091-0122401-16");
			print("Het saldo is: " .$rek->getSaldo() . "<br>");
			$rek->stort(200);
			print("Het saldo is: " .$rek->getSaldo() . "<br>");
			$rek->voerIntrestDoor();
			print("Het saldo is: " .$rek->getSaldo() . "<br>");
			?>
		</h1>
	</body>
</html>
