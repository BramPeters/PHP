<?php
session_start();
class Bericht {
	private $id;
	private $nickname;
	private $boodschap;
	
	public function __construct($id, $nickname, $boodschap) {
		$this->id = $id;
		$this->nickname = $nickname;
		$this->boodschap = $boodschap;
	}
	
	public function getNickname() {
		return $this->nickname;
	}
	
	public function getBoodschap() {
		return $this->boodschap;
	}
}

class BerichtLijst {

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
		$sql = "select id, nickname, boodschap from chatberichten order by datum desc";
		$dbh = new PDO($this->dbConn, $this->dbUsername, $this->dbPassword);
		$resultSet = $dbh->query($sql);
		foreach ($resultSet as $rij) {
			$bericht = new Bericht($rij["id"], $rij["nickname"], $rij["boodschap"]);
			array_push($lijst, $bericht);
		}
		$dbh = null;
		return $lijst;
	}
	
	public function createBericht($nickname, $boodschap) {
		if (!empty($boodschap)) {
			$dbh = new PDO($this->dbConn, $this->dbUsername, $this->dbPassword);
			$datum = date("Y-m-d H:i:s");
			$sql = "insert into chatberichten (nickname, boodschap, datum) values ('" . 
					$nickname . "', '" . $boodschap . "' , '" . $datum . "')";
			$dbh->exec($sql);
			$dbh = null;
		}
	}
}

$berichtLijst = new BerichtLijst();

if (!isset($_SESSION["nickname"])) {
	$getal = rand(111, 999);
	$_SESSION["nickname"] = "p" . $getal;
}

if (isset($_GET["action"]) && $_GET["action"] == "add") {
	$berichtLijst->createBericht($_SESSION["nickname"], $_POST["txtBoodschap"]);
}
$berichten = $berichtLijst->getAlleBerichten();

?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
	<head><title>Chatprogramma</title></head>
	<style>
		table {
			border-collapse: border;
		}
		td {
			vertical-align: top;
		}
	</style>
	<body>
		<table style="width: 500px;">
			<tbody>
				<?php
				foreach ($berichten as $bericht) {
					?>
					<tr>
						<td style="width: 150px;">
							<?php print($bericht->getNickname());?> >
						</td>
						<td>
							<?php print($bericht->getBoodschap());?>
						</td>
					</tr>
					<?php
				}
				?>
			</tbody>
		</table>
		<br>
		<br>
		<form method="post" action="9.6_chatprogramma.php?action=add">
			Bericht:<br>
			<textarea name="txtBoodschap" cols="60" rows="3"></textarea><br>
			<input type="submit" value="Versturen">
		</form>
	</body>
</html>