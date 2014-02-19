<?php
class Bericht {
	public function __construct($id, $auteur, $boodschap, $datum) {
		$this->id = $id;
		$this->auteur = $auteur;
		$this->boodschap = $boodschap;
		$this->datum = $datum;
	}
	
	public function getId() {
		return $this->id;
	}
	
	public function getAuteur() {
		return $this->auteur;
	}
	
	public function getBoodschap() {
		return $this->boodschap;
	}
	
	public function getDatum() {
		return $this->datum;
	}
}

class Gastenboek {

	private $dbConn;
	private $dbUsername;
	private $dbPassword;
	
	public function __construct() {
		$this->dbConn = "mysql:host=localhost;dbname=cursusphp";
		$this->dbUsername = "cursusgebruiker";
		$this->dbPassword = "cursuspwd";
	}
	
	public function getAlleBerichten() {
		$lijst = array();
		$sql = "select id, auteur, boodschap, datum from gastenboek order by datum desc";
		$dbh = new PDO($this->dbConn, $this->dbUsername, $this->dbPassword);
		$resultSet = $dbh->query($sql);
		foreach ($resultSet as $rij) {
			$bericht = new Bericht($rij["id"], $rij["auteur"], $rij["boodschap"], $rij["datum"]);
			array_push($lijst, $bericht);
		}
		$dbh = null;
		return $lijst;
	}
	
	public function createBericht($auteur, $boodschap) {
		$dbh = new PDO($this->dbConn, $this->dbUsername, $this->dbPassword);
		$datum = date("Y-m-d H:i:s");
		$sql = "insert into gastenboek (auteur, boodschap, datum) values ('" . $auteur . "', '" .
									$boodschap . "', '" . $datum . "')";
		$dbh->exec($sql);
		$dbh = null;
	}

}


$gb = new Gastenboek();
if (ISSET($_GET["action"]) && $_GET["action"] == "create") {
	$auteur = $_POST["auteur"];
	$boodschap = $_POST["boodschap"];
	if (!empty($auteur) && !empty($boodschap)) {
		$gb->createBericht($auteur, $boodschap);
	}else{
                    print("<br>" . "<p style='color:red;font-size:20px'>Om een bericht toe te voegen moet een auteur en een boodschap ingevoegd worden</p>" . "<br>");
                }
}
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
	<head><title>Gastenboek</title></head>
	<body>
		<h2>Berichten</h2>
		<?php
		$berichten = $gb->getAlleBerichten();
		?>
		<ul>
			<?php
			foreach ($berichten as $bericht) {
				?>
				<strong>Auteur:</strong> <?php print($bericht->getAuteur());?>
				<br><em>
				<?php print($bericht->getBoodschap());?>
				</em></p>
				<hr>
				<?php
			}
			?>
		</ul>
		
		<h2>Bericht toevoegen</h2>
		<form method="post" action="9.5_gastenboek.php?action=create">
			<p><strong>Auteur:</strong> <input type="text" name="auteur"></p>
			<p><strong>Boodschap:</strong><br>
			<textarea name="boodschap" cols="50" rows="4" maxlength="200"></textarea></p>
			<input type="submit" value="Verzenden">
		</form>
	</body>
</html>