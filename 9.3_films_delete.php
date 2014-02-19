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

	public function createFilm($titel, $duurtijd) {
		if (is_numeric($duurtijd) && $duurtijd > 0 && !empty($titel)) {
			$dbh = new PDO("mysql:host=localhost;dbname=cursusphp", "cursusgebruiker", "cursuspwd");
			$sql = "insert into films (titel, duurtijd) values ('" . $titel . "', " . $duurtijd . ")";
			$dbh->exec($sql);
			$dbh = null;
		}else{
                    print("<br>" . "<p style='color:red;font-size:20px'>Een film moet een titel hebben en een filmtijd in minuten (een getal)</p>" . "<br>");
                }
	}
	
	public function deleteFilm($id) {
		$dbh = new PDO("mysql:host=localhost;dbname=cursusphp", "cursusgebruiker", "cursuspwd");
		$sql = "delete from films where id = " . $id;
		$dbh->exec($sql);
		$dbh = null;
	}
	
	public function getLijst() {
		$lijst = array();
		$dbh = new PDO("mysql:host=localhost;dbname=cursusphp", "cursusgebruiker", "cursuspwd");
		$resultSet = $dbh->query("select id, titel, duurtijd from films order by titel");
		foreach ($resultSet as $rij) {
			$film = new Film($rij["id"], $rij["titel"], $rij["duurtijd"]);
			array_push($lijst, $film);
		}
		$dbh = null;
		return $lijst;
	}
	
}
$filmlijst = new FilmLijst();
if (isset($_GET["action"]) && $_GET["action"] == "new") {
	$filmlijst->createFilm($_POST["titel"], $_POST["duurtijd"]);
}
if (isset($_GET["action"]) && $_GET["action"] == "delete") {
	$filmlijst->deleteFilm($_GET["id"]);
}
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
	<head><title>Films</title></head>
	<body>
		<h1>Alle films</h1>
		<?php
		$tab = $filmlijst->getLijst();
		?>
		<ul>
			<?php
			foreach ($tab as $film) {
				?>
				<li>
					<?php print($film->getTitel());?>
					(<?php print($film->getDuurtijd());?> min)
					<a href="9.3_films_delete.php?action=delete&id=<?php print($film->getId());?>">
					<img src="images/delete.png"></a>
				</li>
				<?php
			}
			?>
		</ul>
		<h1>Film toevoegen</h1>
		<form action="9.3_films_delete.php?action=new" method="post">
			Titel:
			<input type="text" name="titel"><br><br>
			Duurtijd:
			<input type="text" name="duurtijd"> minuten<br>
			<input type="submit" value="Toevoegen">
		</form>
	</body>
</html>