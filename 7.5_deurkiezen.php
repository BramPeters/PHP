

<?php
session_start();
//if ($_GET["reset"] == 1) unset($_SESSION["deurenReeks"]);
if (!isset($_SESSION["deurenReeks"])) {
	$_SESSION["deurenReeks"] = array();
	for ($i=1; $i<=7; $i++) $_SESSION["deurenReeks"][$i] = 0;
	$_SESSION["schattenDeurNr"] = rand(1, 7);
}
if (isset($_GET["kiesdeur"])) {
	$gekozenDeurNr = $_GET["kiesdeur"];
	if ($gekozenDeurNr == $_SESSION["schattenDeurNr"]) {
		$_SESSION["deurenReeks"][$gekozenDeurNr] = 2;
	} else {
		$_SESSION["deurenReeks"][$gekozenDeurNr] = 1;
	}
}
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
	<head><title>Schattenjacht</title></head>
	<style>
		img { border-width: 0px;}
	</style>
	<body>
		<h1>Kies een deur</h1>
		<?php
		for ($i=1; $i<=7; $i++) {
			?>
			<a href="7.5_deurkiezen.php?kiesdeur=<?php print($i);?>">
			<?php
			if ($_SESSION["deurenReeks"][$i] == 0) {
				?>
				<img src="images/doorclosed.png">
				<?php
			} elseif ($_SESSION["deurenReeks"][$i] == 1) {
				?>
				<img src="images/dooropen.png">
				<?php
			} elseif ($_SESSION["deurenReeks"][$i] == 2) {
				?>
				<img src="images/doortreasure.png">
				<?php
			}
			?>
			</a>
			<?php
		}
		?>
		<br>
		Klik <a href="7.5_deurkiezen.php?reset=1">hier</a> om een nieuw spel te beginnen.
	</body>
</html>
