<?php
class Persoon{
    private $familienaam;
    private $voornaam;
    
    public function _construct($familienaam, $voornaam){
        $this->setFamilienaam($familienaam);
        $this->setVoornaam($voornaam);
    }
        public function getFamilienaam(){
        return $this->familienaam;
    }
    public function getVoornaam(){
        return $this->voornaam;
    }
    public function setFamilienaam($familienaam){
        $this ->familienaam = $familienaam;
    }
    public function setVoornaam($voornaam){
        $this ->voornaam = $voornaam;
    }
}