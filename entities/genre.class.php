<?php

class Genre {

    private static $idMap = array();
    
    private $id;
    private $omschrijving;

    private function __construct($id, $omschrijving) {
        $this->id = $id;
        $this->omschrijving = $omschrijving;
    }

    public static function create($id, $omschrijving) {
        if (!isset(self::$idMap[$id])) {
            self::$idMap[$id] = new Genre($id, $omschrijving);
        }
        return self::$idMap[$id];
    }

    public function getId() {
        return $this->id;
    }

    public function getOmschrijving() {
        return $this->omschrijving;
    }

    public function setOmschrijving($omschrijving) {
        $this->omschrijving = $omschrijving;
    }

}