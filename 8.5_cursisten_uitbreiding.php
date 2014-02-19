<?php
class Persoon {
	private $familienaam;
	private $voornaam;
	
	public function getVollNaam() {
		return $this->familienaam  . ", " . $this->voornaam;
	}
	
	public function setFamilienaam($familienaam) {
		$this->familienaam = $familienaam;
	}
	
	public function setVoornaam($voornaam) {
		$this->voornaam = $voornaam;
	}
}

class Cursist extends Persoon {
	private $aantalCursussen;
	
	public function __construct($familienaam, $voornaam, $aantalCursussen) {
		parent::setFamilienaam($familienaam);
		parent::setVoornaam($voornaam);
		$this->aantalCursussen = $aantalCursussen;
	}
	
	public function getAantalCursussen() {
		return $this->aantalCursussen;
	}
	
	public function setAantalCursussen($aantalCursussen) {
		$this->aantalCursussen = $aantalCursussen;
	}
}

class Medewerker extends Persoon {
	private $aantalCursisten;
	
	public function __construct($familienaam, $voornaam, $aantalCursisten) {
		parent::setFamilienaam($familienaam);
		parent::setVoornaam($voornaam);
		$this->aantalCursisten = $aantalCursisten;
	}
	
	public function getAantalCursisten() {
		return $this->aantalCursisten;
	}
	
	public function setAantalCursisten($aantalCursisten) {
		$this->aantalCursisten = $aantalCursisten;
	}
}
?>
<?php
	$cursist = new Cursist("Peeters", "Jan", 3);
	$medewerker = new Medewerker("Janssens", "Tom", 8);
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
	<head><title>Cursisten en medewerkers</title></head>
	<body>
		<h1>Namen</h1>
		<ul>
			<li><?php print($cursist->getVollNaam() . " volgt " . 
			$cursist->getAantalCursussen() . " cursus(sen)");?></li>
			<li><?php print($medewerker->getVollNaam() . " begeleidt " .
			$medewerker->getAantalCursisten() . " cursist(en)");?></li>
		</ul>
	</body>
</html>