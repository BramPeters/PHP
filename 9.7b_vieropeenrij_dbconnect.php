<?php
class Spel {

	private $dbConn;
	private $dbUsername;
	private $dbPassword;
	
	public function __construct() {
		$this->dbConn = "mysql:host=localhost;dbname=cursusphp";
		$this->dbUsername = "cursusgebruiker";
		$this->dbPassword = "cursuspwd";
	}
}