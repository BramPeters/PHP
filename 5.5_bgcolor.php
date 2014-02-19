<?php
	$achtergrondkleur = "white";
	if (isset($_POST["kleur"])) {
		setcookie("achtergrondkleur", $_POST["kleur"], time() + 24 * 3600);
		$achtergrondkleur = $_POST["kleur"];
	} elseif (isset($_COOKIE["achtergrondkleur"])) {
		$achtergrondkleur = $_COOKIE["achtergrondkleur"];
	}
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
	<head><title>Achtergrondkleuren</title></head>
	<body style="background-color: <?php print($achtergrondkleur);?>">
		<form action="5.5_bgcolor.php" method="post">
			Kies uw favoriete achtergrondkleur:
			<select name="kleur">
				<option value="red">Rood</option>
				<option value="blue">Blauw</option>
				<option value="green">Groen</option>
				<option value="yellow">Geel</option>
				<option value="white">Wit</option>
			</select>
			<input type="submit" value="OK">
		</form>
		<a href="achtergrondkleuren.php">Pagina vernieuwen</a>
	</body>
</html>