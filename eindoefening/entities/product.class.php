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

class MandProduct {
    public function __construct($BestellingsNr, $BestelRegel, $ProductId, $ProductAantal, $b, $c, $d, $ProductSoort, $ProductNaam, $ProductOmschrijving, $ProductPrijs ) {
        $this->BestellingsNr = $BestellingsNr;
        $this->BestelRegel = $BestelRegel;
        $this->ProductId = $ProductId;
        $this->ProductAantal = $ProductAantal;
        $this->ProductSoort = $ProductSoort;
        $this->ProductNaam = $ProductNaam;
        $this->ProductOmschrijving = $ProductOmschrijving;
        $this->ProductPrijs = $ProductPrijs;
    }
    public function getBestellingsNr() {
        return $this->BestellingsNr;
    }
    public function getBestelRegel() {
        return $this->BestelRegel;
    }

    public function getProductId() {
        return $this->ProductId;
    }
    public function getProductAantal() {
        return $this->ProductAantal;
    }
    public function getProductSoort() {
        return $this->ProductSoort;
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
//$sql = "select ProductNaam, ProductType, ProductPrijs, producttype.ProductTypeId, producttype.ProductSoort from producten,producttype where ProductId = ".$productId ." and producten.ProductType=producttype.ProductTypeId";
class ProductInMandje {
    public function __construct($ProductNaam, $ProductType, $ProductPrijs, $ProductSoort, $item, $aantal, $ProductId) {
        $this->ProductNaam = $ProductNaam;
        $this->ProductType = $ProductType;
        $this->ProductPrijs = $ProductPrijs;
        $this->ProductSoort = $ProductSoort;
        $this->ProductAantal = $aantal;
        $this->ProductId = $ProductId;
        
    }
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


}




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