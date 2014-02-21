<?php
require_once("data/genredao.class.php");

class GenreService{
    public static function toonAlleGenres(){
        $lijst = GenreDAO::getAll();
        return $lijst;
    }
}