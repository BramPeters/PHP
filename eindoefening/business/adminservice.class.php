<?php 

require_once("data/userdao.class.php");
require_once("data/userdao.class.php");

class AdminService {
    
    public static function showAllProducten($productenfetch){
        $productenWeergave = "";
        foreach($productenfetch as $product){
            $productenWeergave = $productenWeergave."<tr><td>";
            $productenWeergave = $productenWeergave.$product->getProductId();
            $productenWeergave = $productenWeergave."</td><td>";
            $productenWeergave = $productenWeergave.$product->getProductNaam()." :  ".$product->getProductOmschrijving();
            $productenWeergave = $productenWeergave."</td><td>";
            $productenWeergave = $productenWeergave.$product->getProductPrijs();
            $productenWeergave = $productenWeergave."</td><td>";
            $productenWeergave = $productenWeergave."<a href=''>Update</a>";
            $productenWeergave = $productenWeergave."</td><td>";
            $productenWeergave = $productenWeergave."<a href=''>Delete</a>";
            $productenWeergave = $productenWeergave."</tr></td>";
        }
               
        return $productenWeergave;
    }
    
        
    public static function showAllBestellingen($bestellingenfetch){
        $bestellingenWeergave = "";
        foreach($bestellingenfetch as $bestelling){
            $bestellingenWeergave = $bestellingenWeergave."<tr><td>";
            $bestellingenWeergave = $bestellingenWeergave.$bestelling->getBestellingsNr();
            $bestellingenWeergave = $bestellingenWeergave."</td><td>";
            $bestellingenWeergave = $bestellingenWeergave.$bestelling->getKlantId()." :  ".$bestelling->getFNaam().", ".$bestelling->getVNaam();
            $bestellingenWeergave = $bestellingenWeergave."</td><td>";
            $bestellingenWeergave = $bestellingenWeergave.$bestelling->getBestellingsTijdstip();
            $bestellingenWeergave = $bestellingenWeergave."</td><td>";
            $bestellingenWeergave = $bestellingenWeergave.$bestelling->getStatus();
            $bestellingenWeergave = $bestellingenWeergave."</td><td>";
            $bestellingenWeergave = $bestellingenWeergave."<a href=''>Update</a>";
            $bestellingenWeergave = $bestellingenWeergave."</td><td>";
            $bestellingenWeergave = $bestellingenWeergave."<a href=''>Delete</a>";            
            $bestellingenWeergave = $bestellingenWeergave."</tr></td>";
        }
               
        return $bestellingenWeergave;
    }
    
    public static function optionListProductTypes($productTypes){
        $productTypesWeergave = "";
        foreach($productTypes as $type){                    
            $productTypesWeergave = $productTypesWeergave."<option value='".$type->getProductTypeId()."'>".$type->getProductSoort()."</option>";
        }
               
        return $productTypesWeergave;
    }
    
    public static function showAllExtras($extrasfetch){
        $extrasWeergave = "";
        foreach($extrasfetch as $extra){
            $extrasWeergave = $extrasWeergave."<tr><td>";
            $extrasWeergave = $extrasWeergave.$extra->getIngredientId();
            $extrasWeergave = $extrasWeergave."</td><td>";
            $extrasWeergave = $extrasWeergave.$extra->getIngredientNaam();
            $extrasWeergave = $extrasWeergave."</td><td>";
            $extrasWeergave = $extrasWeergave.$extra->getIngredientPrijs();
            $extrasWeergave = $extrasWeergave."</td><td>";
            $extrasWeergave = $extrasWeergave."<a href=''>Update</a>";
            $extrasWeergave = $extrasWeergave."</td><td>";
            $extrasWeergave = $extrasWeergave."<a href=''>Delete</a>";
            $extrasWeergave = $extrasWeergave."</tr></td>";
        }
               
        return $extrasWeergave;
    }
    
    
    public static function showAllKlanten($klantenfetch){
        $klantenWeergave = "";
        foreach($klantenfetch as $klant){
            $klantenWeergave = $klantenWeergave."<tr><td>";
            $klantenWeergave = $klantenWeergave.$klant->getKlantId();
            $klantenWeergave = $klantenWeergave."</td><td>";
            $klantenWeergave = $klantenWeergave.$klant->getKlantFamilienaam()." ,  ".$klant->getKlantVoornaam();
            $klantenWeergave = $klantenWeergave."</td><td>";
            $klantenWeergave = $klantenWeergave.$klant->getKlantAdres()." ;  ".$klant->getKlantPostcode();
            $klantenWeergave = $klantenWeergave."</td><td>";
            $klantenWeergave = $klantenWeergave.$klant->getTelefoonnummer();
            $klantenWeergave = $klantenWeergave."</td><td>";
            $klantenWeergave = $klantenWeergave.$klant->getEmailadres();
            $klantenWeergave = $klantenWeergave."</td><td>";
            $klantenWeergave = $klantenWeergave.$klant->getKlantStatus();
            $klantenWeergave = $klantenWeergave."</td><td>";
            $klantenWeergave = $klantenWeergave."<a href=''>Update</a>";
            $klantenWeergave = $klantenWeergave."</td><td>";
            $klantenWeergave = $klantenWeergave."<a href=''>Delete</a>";
            $klantenWeergave = $klantenWeergave."</tr></td>";
        }
               
        return $klantenWeergave;
    }
    
    
    public static function optionListUserTypes($klantTypes){
        $klantTypesWeergave = "";
        foreach($klantTypes as $type){                    
            $klantTypesWeergave = $klantTypesWeergave."<option value='".$type->getKlantStatusId()."'>".$type->getOmschrijving()."(".$type->getKortingsPercentage()."%)</option>";
        }
               
        return $klantTypesWeergave;
    }
    
    
}