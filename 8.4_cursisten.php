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
	
	public function getAantalCursussen() {
		return $this->aantalCursussen;
	}
	
	public function setAantalCursussen($aantalCursussen) {
		$this->aantalCursussen = $aantalCursussen;
	}
}

class Medewerker extends Persoon {
	private $aantalCursisten;
	
	public function getAantalCursisten() {
		return $this->aantalCursisten;
	}
	
	public function setAantalCursisten($aantalCursisten) {
		$this->aantalCursisten = $aantalCursisten;
	}
}
?>
<?php
	$cursist = new Cursist();
	$medewerker = new Medewerker();
	$cursist->setFamilienaam("Peeters");
	$cursist->setVoornaam("Jan");
	$medewerker->setFamilienaam("Janssens");
	$medewerker->setVoornaam("Tom");
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
	<head><title>Cursisten en medewerkers</title></head>
	<body>
		<h1>Namen</h1>
		<ul>
			<li><?php print($cursist->getVollNaam());?></li>
			<li><?php print($medewerker->getVollNaam());?></li>
		</ul>
	</body>
</html>
