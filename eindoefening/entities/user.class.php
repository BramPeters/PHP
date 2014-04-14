<?php
class User {

	private static $idMap = array();

	private $KlantId;
	private $KlantFamilienaam;
	private $KlantVoornaam;
        private $KlantAdres;
        private $KlantPostcode;
        private $Telefoonnummer;
        private $Emailadres;
        private $Wachtwoord;
        private $KlantStatus;
        
	
	public static function create($id, $gebruikersnaam, $wachtwoord) {
		if (!isset(self::$idMap[$id])) {
			self::$idMap[$id] = new User($id, $gebruikersnaam, $wachtwoord);
		}
		return self::$idMap[$id];
	}
	
	public function __construct($KlantId, $Emailadres, $Wachtwoord, $KlantFamilienaam, $KlantVoornaam, $KlantAdres, $KlantPostcode, $Telefoonnummer, $KlantStatus) {
                $this->KlantId = $KlantId;	
                $this->KlantFamilienaam = $KlantFamilienaam;
                $this->KlantVoornaam = $KlantVoornaam;
                $this->KlantAdres = $KlantAdres;
                $this->KlantPostcode = $KlantPostcode;
                $this->Telefoonnummer = $Telefoonnummer;
                $this->Emailadres = $Emailadres;
                $this->Wachtwoord = $Wachtwoord;
                $this->KlantStatus = $KlantStatus;
                 
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
        public function getKlantStatus() {
		return $this->KlantStatus;
	}
        
}

//$klant = new Klant($rij["KlantId"],$rij["KlantFamilienaam"], $rij["KlantVoornaam"],$rij["KlantAdres"], $rij["KlantPostCode"], $rij["KlantStatus"], $rij["Telefoonnummer"], $rij["Emailadres"]);
class Klant{
    
    public function __construct($KlantId, $KlantFamilienaam, $KlantVoornaam, $KlantAdres, $KlantPostcode, $KlantStatus, $Telefoonnummer, $Emailadres) {
                $this->KlantId = $KlantId;	
                $this->KlantFamilienaam = $KlantFamilienaam;
                $this->KlantVoornaam = $KlantVoornaam;
                $this->KlantAdres = $KlantAdres;
                $this->KlantPostcode = $KlantPostcode;
                $this->Telefoonnummer = $Telefoonnummer;
                $this->Emailadres = $Emailadres;
                $this->KlantStatus = $KlantStatus;
                 
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
        public function getKlantStatus() {
		return $this->KlantStatus;
	}
    
}


//class om prod types weer te geven
class KlantType {
    public function __construct($KlantStatusId,$Omschrijving, $KortingsPercentage ) {
        $this->KlantStatusId = $KlantStatusId;
        $this->Omschrijving = $Omschrijving;
        $this->KortingsPercentage = $KortingsPercentage;

    }
    public function getKlantStatusId() {
        return $this->KlantStatusId;
    }
    public function getOmschrijving() {
        return $this->Omschrijving;
    }
    public function getKortingsPercentage() {
        return $this->KortingsPercentage;
    }


}