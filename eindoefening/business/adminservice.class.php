<?php 

require_once("data/userdao.class.php");
require_once("data/userdao.class.php");
require_once("data/admindao.class.php");

class AdminService {
    
    public static function showAllProducten($productenfetch){
        $productenWeergave = "";
        
        $productenWeergave = $productenWeergave." <table style='margin: 1.2em; background-color: lightblue;'>";
        $productenWeergave = $productenWeergave." <td style='background-color:#ddd'>Nr</td><td style='background-color:#ddd'>Info</td><td style='background-color:#ddd'>Prijs</td><td style='background-color:#ddd'></td><td style='background-color:#ddd'></td><td style='background-color:#ddd'></td>";
            
        foreach($productenfetch as $product){
            $id=$product->getProductId();
            
            $productenWeergave = $productenWeergave."<form action='admin.php?action=update&type=product&id=$id' method='post'>";
            $productenWeergave = $productenWeergave."<tr><td>";
            $productenWeergave = $productenWeergave.$product->getProductId();
            $productenWeergave = $productenWeergave."</td><td>";
            $productenWeergave = $productenWeergave."<input type='text' name='txtNaam' value='".$product->getProductNaam()."' required>"." :  "."<input type='text' name='txtOmschrijving' value='".$product->getProductOmschrijving()."' required>";
            $productenWeergave = $productenWeergave."</td><td>";
            $productenWeergave = $productenWeergave."<input type='text' name='txtPrijs' value='".$product->getProductPrijs()."' required>";
            $productenWeergave = $productenWeergave."</td><td>";
            $productenWeergave = $productenWeergave."<td><input type='submit' value='Aanpassen'></td>";
            $productenWeergave = $productenWeergave."</td><td>";
            $productenWeergave = $productenWeergave."<a href='admin.php?action=delete&type=product&id=$id'>Delete</a>";
            $productenWeergave = $productenWeergave."</tr></td>";
            $productenWeergave = $productenWeergave."</form>";      
        }
         $productenWeergave = $productenWeergave."</table>"; 
         
        return $productenWeergave;
    }
    
        
    public static function showAllBestellingen($bestellingenfetch){
        $bestellingenWeergave = "";
        
        //$bestellingenWeergave = $bestellingenWeergave."<form action='admin.php?action=update&type=bestelling' method='post'>";
        $bestellingenWeergave = $bestellingenWeergave." <table style='margin: 1.2em; background-color: lightblue;'>";
        $bestellingenWeergave = $bestellingenWeergave." <td style='background-color:#ddd'>Nr</td><td style='background-color:#ddd'>Info</td><td style='background-color:#ddd'>Prijs</td><td style='background-color:#ddd'></td><td style='background-color:#ddd'></td><td style='background-color:#ddd'></td>";
        
        
        foreach($bestellingenfetch as $bestelling){
            $bestellingenWeergave = $bestellingenWeergave."<tr><td>";
            $bestellingenWeergave = $bestellingenWeergave.$bestelling->getBestellingsNr();
            $bestellingenWeergave = $bestellingenWeergave."</td><td>";
            $bestellingenWeergave = $bestellingenWeergave.$bestelling->getKlantId()." :  ".$bestelling->getFNaam().", ".$bestelling->getVNaam();
            $bestellingenWeergave = $bestellingenWeergave."</td><td>";
            $bestellingenWeergave = $bestellingenWeergave.$bestelling->getBestellingsTijdstip();
            $bestellingenWeergave = $bestellingenWeergave."</td><td>";
            $bestellingenWeergave = $bestellingenWeergave.$bestelling->getStatus();

        }
        
        $bestellingenWeergave = $bestellingenWeergave."</table>"; 
         //$bestellingenWeergave = $bestellingenWeergave."</form>";      
        
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
        
        
        $extrasWeergave = $extrasWeergave." <table style='margin: 1.2em; background-color: lightblue;'>";
        $extrasWeergave = $extrasWeergave." <td style='background-color:#ddd'>Nr</td><td style='background-color:#ddd'>Info</td><td style='background-color:#ddd'>Prijs</td><td style='background-color:#ddd'></td><td style='background-color:#ddd'></td><td style='background-color:#ddd'></td>";
        
        
        foreach($extrasfetch as $extra){
            $id=$extra->getIngredientId();
            
            $extrasWeergave = $extrasWeergave."<form action='admin.php?action=update&type=extra&id=$id' method='post'>";
            $extrasWeergave = $extrasWeergave."<tr><td>";
            $extrasWeergave = $extrasWeergave.$extra->getIngredientId();
            $extrasWeergave = $extrasWeergave."</td><td>";
            $extrasWeergave = $extrasWeergave."<input type='text' name='txtNaam' value='".$extra->getIngredientNaam()."' required>";
            $extrasWeergave = $extrasWeergave."</td><td>";
            $extrasWeergave = $extrasWeergave."<input type='text' name='txtPrijs' value='".$extra->getIngredientPrijs()."' required>";
            $extrasWeergave = $extrasWeergave."</td><td>";
            $extrasWeergave = $extrasWeergave."<td><input type='submit' value='Aanpassen'></td>";
            $extrasWeergave = $extrasWeergave."</td><td>";
            $extrasWeergave = $extrasWeergave."<a href='admin.php?action=delete&type=extra&id=$id'>Delete</a>";
            $extrasWeergave = $extrasWeergave."</tr></td>";
            $extrasWeergave = $extrasWeergave."</form>";  
        }
        
        $extrasWeergave = $extrasWeergave."</table>"; 
             
               
        return $extrasWeergave;
    }
    
    
    public static function showAllKlanten($klantenfetch){
        $klantenWeergave = "";
        
        $klantenWeergave = $klantenWeergave." <table style='margin: 1.2em; background-color: lightblue;'>";
        $klantenWeergave = $klantenWeergave." <td style='background-color:#ddd'>Nr</td><td style='background-color:#ddd'>Naam</td><td style='background-color:#ddd'>Adres</td><td style='background-color:#ddd'>TelefoonNr</td><td style='background-color:#ddd'>Email</td><td style='background-color:#ddd'>Klantstatus</td><td style='background-color:#ddd'></td><td style='background-color:#ddd'></td></td><td style='background-color:#ddd'></td>";
        
        
        foreach($klantenfetch as $klant){
            $id=$klant->getKlantId();
            
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
            $klantenWeergave = $klantenWeergave."</td><td>";
            $klantenWeergave = $klantenWeergave."<a href='admin.php?action=delete&type=klant&id=$id'>Delete</a>";
            $klantenWeergave = $klantenWeergave."</tr></td>";
        }
        
        $klantenWeergave = $klantenWeergave."</table>"; 
  
               
        return $klantenWeergave;
    }
    
    
    public static function optionListUserTypes($klantTypes){
        $klantTypesWeergave = "";
        foreach($klantTypes as $type){                    
            $klantTypesWeergave = $klantTypesWeergave."<option value='".$type->getKlantStatusId()."'>".$type->getOmschrijving()."(".$type->getKortingsPercentage()."%)</option>";
        }
               
        return $klantTypesWeergave;
    }
    
    
    public static function deleteFromDB($type, $id){
       if(AdminDAO::deleteFromDB($type, $id)){
           return true;
       }else{
           return false;
       }
    }
    
    public static function insertIntoDB($type, $insertInfo){
       if(AdminDAO::insertIntoDB($type, $insertInfo)){
           return true;
       }else{
           return false;
       }
    }
    
    public static function updateInDB($type,$id, $itemNaam, $itemPrijs,$itemOmschrijving ){
       if(AdminDAO::updateInDB($type,$id, $itemNaam, $itemPrijs,$itemOmschrijving )){
           return true;
       }else{
           return false;
       }
    }
    
    
}