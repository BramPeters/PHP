<?php
require_once("data/PersoonDAO.class.php");

class PersoonService{
    public static function getAllePersonen(){
        $personen = PersoonDAO::getAll();
        return $personen;
    }
}