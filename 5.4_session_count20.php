<?php
session_start();
if (!isset($_SESSION["teller"]) || $_SESSION["teller"] == 20) {
	$_SESSION["teller"] = 0;
} else {
	$_SESSION["teller"]++;
}
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" 
"http://www.w3.org/TR/html4/loose.dtd">
<html>
	<head><title>Oefening</title></head>
	<body>
		<?php
		print($_SESSION["teller"]);
		?>
	</body>
</html>