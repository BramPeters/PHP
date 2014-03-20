<?php
class Pizza {
    public function __construct($ProductId,$ProductType, $ProductNaam,$ProductOmschrijving, $ProductPrijs) {
        $this->ProductId = $ProductId;
        $this->ProductType = $ProductType;
        $this->ProductNaam = $ProductNaam;
        $this->ProductOmschrijving = $ProductOmschrijving;
        $this->ProductPrijs = $ProductPrijs;
    }
    public function getProductId() {
        return $this->ProductId;
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