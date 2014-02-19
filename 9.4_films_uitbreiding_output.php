<?php
class Film {
	private $id;
	private $titel;
	private $duurtijd;
	
	public function __construct($id, $titel, $duurtijd) {
		$this->id = $id;
		$this->titel = $titel;
		$this->duurtijd = $duurtijd;
	}
	
	public function getId() {
		return $this->id;
	}
	
	public function getTitel() {
		return $this->titel;
	}
	
	public function getDuurtijd() {
		return $this->duurtijd;
	}
}

class FilmLijst {

	private $dbConn;
	private $dbUsername;
	private $dbPassword;
	
	public function __construct() {
		$this->dbConn = "mysql:host=localhost;dbname=cursusphp";
		$this->dbUsername = "cursusgebruiker";
		$this->dbPassword = "cursuspwd";
	}
	
	public function createFilm($titel, $duurtijd) {
		if (is_numeric($duurtijd) && $duurtijd > 0 && !empty($titel)) {
			$dbh = new PDO($this->dbConn, $this->dbUsername, $this->dbPassword);
			$sql = "insert into films (titel, duurtijd) values ('" . $titel . "', " . $duurtijd . ")";
			$dbh->exec($sql);
			$dbh = null;
		}
	}
	
	public function deleteFilm($id) {
		$dbh = new PDO($this->dbConn, $this->dbUsername, $this->dbPassword);
		$sql = "delete from films where id = " . $id;
		$dbh->exec($sql);
		$dbh = null;
	}
	
	public function getLijst() {
		$lijst = array();
		$dbh = new PDO($this->dbConn, $this->dbUsername, $this->dbPassword);
		$resultSet = $dbh->query("select id, titel, duurtijd from films order by titel");
		foreach ($resultSet as $rij) {
			$film = new Film($rij["id"], $rij["titel"], $rij["duurtijd"]);
			array_push($lijst, $film);
		}
		$dbh = null;
		return $lijst;
	}
	
	public function getFilmById($id) {
		$sql = "select titel, duurtijd from films where id = " . $id;
		$dbh = new PDO($this->dbConn, $this->dbUsername, $this->dbPassword);
		$resultSet = $dbh->query($sql);
		if ($resultSet) {
			$rij = $resultSet->fetch();
			if ($rij) {
				$film = new Film($id, $rij["titel"], $rij["duurtijd"]);
				$dbh = null;
				return $film;
			} else return false;
		} else return false;
		
	}
	
	public function updateFilm($film) {
		$sql = "update films set titel = '" . $film->getTitel() . "', duurtijd = " . $film->getDuurtijd() . 
										" where id = " . $film->getId();
		$dbh = new PDO($this->dbConn, $this->dbUsername, $this->dbPassword);
		$dbh->exec($sql);
		$dbh = null;
	}
	
}

if (ISSET($_GET["action"]) && $_GET["action"] == "verwerk") {
	$film = new Film($_GET["id"], $_POST["titel"], $_POST["duurtijd"]);
	$filmLijst = new FilmLijst();
	$filmLijst->updateFilm($film);
	$updated = true;
}
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
	<head><title>Films</title></head>
	<body>
		<h1>Film bewerken</h1>
		<?php
		if (ISSET($updated)&&$updated) print("Record bijgewerkt!");
		$filmLijst = new FilmLijst();
		$film = $filmLijst->getFilmById($_GET["id"]);
		?>
		<form action="9.4_films_uitbreiding_output.php?action=verwerk&id=<?php print($_GET["id"]);?>" method="post">
			Titel:
			<input type="text" name="titel" value="<?php print($film->getTitel()); ?>"><br><br>
			Duurtijd:
			<input type="text" name="duurtijd" value="<?php print($film->getDuurtijd()); ?>"> min<br>
			<input type="submit" value="Opslaan">
		</form>
		<br>
		<a href="9.4_films_uitbreiding_input.php">Terug naar overzicht</a>
		
	</body>
</html>