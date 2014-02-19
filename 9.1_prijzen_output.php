<?php
class ModuleLijst {

	public function getLijst() {
		$lijst = array();
		$dbh = new PDO("mysql:host=localhost;dbname=cursusphp", "root", "vdab");
		$sql = "select naam, prijs from modules where prijs >= " . $_GET["minprijs"] . 
					" and prijs <= " . $_GET["maxprijs"] . " order by prijs";
		$resultSet = $dbh->query($sql);
		foreach ($resultSet as $rij) {
			$module = $rij["naam"] . " (" . $rij["prijs"] . " euro)";
			array_push($lijst, $module);
		}
		$dbh = null;
		return $lijst;
	}
	
}
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
	<head><title>Modules</title></head>
	<body>
		<h1>Zoekresultaat</h1>
		<?php
		$pl = new ModuleLijst();
		$tab = $pl->getLijst();
		?>
		<ul>
			<?php
			foreach ($tab as $module) {
				print("<li>" . $module . "</li>");
			}
			?>
		</ul>
		
	</body>
</html>
