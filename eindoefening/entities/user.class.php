<?php
class User {

	private static $idMap = array();

	private $id;
	private $gebruikersnaam;
	private $wachtwoord;
	
	public static function create($id, $gebruikersnaam, $wachtwoord) {
		if (!isset(self::$idMap[$id])) {
			self::$idMap[$id] = new User($id, $gebruikersnaam, $wachtwoord);
		}
		return self::$idMap[$id];
	}
	
	public function __construct($KlantId, $Emailadres, $Wachtwoord, $KlantFamilienaam, $KlantVoornaam, $KlantAdres, $KlantPostcode, $Telefoonnummer) {
                $this->KlantId = $KlantId;	
                $this->KlantFamilienaam = $KlantFamilienaam;
                $this->KlantVoornaam = $KlantVoornaam;
                $this->KlantAdres = $KlantAdres;
                $this->KlantPostcode = $KlantPostcode;
                $this->Telefoonnummer = $Telefoonnummer;
                $this->Emailadres = $Emailadres;
                 $this->Wachtwoord = $Wachtwoord;
	}
        public function getKlantId() {
		return $this->KlantId;
	}
        
	public function getGebruikersnaam() {
		return $this->Emailadres;
	}
        
	public function getKlantFamilienaam() {
		return $this->KlantFamilienaam;
	}
        public function getKlantVoornaam() {
		return $this->KlantVoornaam;
	}
        public function getKlantAdres() {
		return $this->KlantAdres;
	}
        public function getKlantPostcode() {
		return $this->KlantPostcode;
	}
        public function getTelefoonnummer() {
		return $this->Telefoonnummer;
	}
        public function getEmailadres() {
		return $this->Emailadres;
	}
        public function getWachtwoord() {
		return $this->Wachtwoord;
	}
        
}
