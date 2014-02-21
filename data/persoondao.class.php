<?php
require_once("entities/persoon.class.php");

class PersoonDAO{
    public static function getAll(){
        $lijst=array();
        array_push($lijst, new Persoon("Peters","Bram"));
        array_push($lijst, new Persoon("Van Dessel","Rude"));
        array_push($lijst, new Persoon("Vereecken","Marie"));
        array_push($lijst, new Persoon("Maes","Eveline"));
        return $lijst;
        
    }
}