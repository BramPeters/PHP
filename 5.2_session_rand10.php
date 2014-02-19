<?php
session_start();
if (!isset($_SESSION["aantal"])) {
	$_SESSION["aantal"] = 0;
} else {
	$_SESSION["aantal"]++;
}
if (!isset($_SESSION["getal"]) || $_SESSION["aantal"] == 10) {
	$_SESSION["aantal"] = 0;
	$_SESSION["getal"] = rand(1, 100);
}
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" 
"http://www.w3.org/TR/html4/loose.dtd">
<html>
	<head><title>Oefening</title></head>
	<body>
		<?php
		print($_SESSION["getal"]);
		?>
	</body>
</html>