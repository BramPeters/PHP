<?php

//class om producten weer te geven
class Product {
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


//class gebruikt om producten weer te geven in mandje
class ProductInMandje {
    public function __construct(/*$regel,*/ $ProductNaam, $ProductType, $ProductPrijs, $ProductSoort, $item, $aantal, $ProductId, $extra) {
        //$this->ProductRegel = $regel;
        $this->ProductNaam = $ProductNaam;
        $this->ProductType = $ProductType;
        $this->ProductPrijs = $ProductPrijs;
        $this->ProductSoort = $ProductSoort;
        $this->ProductAantal = $aantal;
        $this->ProductId = $ProductId;
        $this->ProductExtra = $extra;
        
    }
//    public function getProductRegel() {
//        return $this->ProductRegel;
//    }
    
    public function getProductNaam() {
        return $this->ProductNaam;
    }
    public function getProductType() {
        return $this->ProductType;
    }
    public function getProductPrijs() {
        return $this->ProductPrijs;
    }
    public function getProductSoort() {
        return $this->ProductSoort;
    }
    public function getProductAantal() {
        return $this->ProductAantal;
    }
    public function getProductId() {
        return $this->ProductId;
    }
    public function getProductExtra() {
        return $this->ProductExtra;
    }


}
//class om extras weer te geven
class Extra {
    public function __construct($IngredientId,$IngredientNaam, $IngredientPrijs) {
        $this->IngredientId = $IngredientId;
        $this->IngredientNaam = $IngredientNaam;
        $this->IngredientPrijs = $IngredientPrijs;

    }
    public function getIngredientId() {
        return $this->IngredientId;
    }
    public function getIngredientNaam() {
        return $this->IngredientNaam;
    }

    public function getIngredientPrijs() {
        return $this->IngredientPrijs;
    }

}


//class om prod types weer te geven
class ProductType {
    public function __construct($productTypeId,$productSoort) {
        $this->productTypeId = $productTypeId;
        $this->productSoort = $productSoort;

    }
    public function getProductTypeId() {
        return $this->productTypeId;
    }
    public function getProductSoort() {
        return $this->productSoort;
    }


}

//class om bestellingen weer te geven
class Bestelling {
    public function __construct($bestellingsNr,$klantId,$BestellingsTijdstip,$FNaam,$VNaam, $status) {
        $this->bestellingsNr = $bestellingsNr;
        $this->klantId = $klantId;
        $this->bestellingsTijdstip = $BestellingsTijdstip;
        $this->FNaam = $FNaam;
        $this->VNaam = $VNaam;
        $this->status = $status;

    }
    public function getBestellingsNr() {
        return $this->bestellingsNr;
    }
    public function getKlantId() {
        return $this->klantId;
    }
    public function getBestellingsTijdstip() {
        return $this->bestellingsTijdstip;
    }
    public function getFNaam() {
        return $this->FNaam;
    }
    public function getVNaam() {
        return $this->VNaam;
    }
    public function getStatus() {
        return $this->status;
    }


}