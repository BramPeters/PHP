<?php
class FilmLijst {

	public function createFilm($titel, $duurtijd) {
		if (is_numeric($duurtijd) && $duurtijd > 0 && !empty($titel)) {
			$dbh = new PDO("mysql:host=localhost;dbname=cursusphp", "root", "vdab");
			$sql = "insert into films (titel, duurtijd) values ('" . $titel . "', " . $duurtijd . ")";
			$dbh->exec($sql);
			$dbh = null;
                }else{
                    print("<br>" . "<p style='color:red;font-size:20px'>Een film moet een titel hebben en een filmtijd in minuten (een getal)</p>" . "<br>");
                }
	}
	
	public function getLijst() {
		$lijst = array();
		$dbh = new PDO("mysql:host=localhost;dbname=cursusphp", "root", "vdab");
		$resultSet = $dbh->query("select titel, duurtijd from films order by titel");
		foreach ($resultSet as $rij) {
			$film = $rij["titel"] . " (" . $rij["duurtijd"] . " min)";
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
				print("<li>" . $film . "</li>");
			}
			?>
		</ul>
		<h1>Film toevoegen</h1>
		<form action="9.2_films.php?action=new" method="post">
			Titel:
			<input type="text" name="titel"><br><br>
			Duurtijd:
			<input type="text" name="duurtijd"> minuten<br>
			<input type="submit" value="Toevoegen">
		</form>
	</body>
</html>