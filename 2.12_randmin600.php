<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
	<head><title>Oefening</title></head>
	<body>
		<?php
		$getal = rand(1, 1000);
		while ($getal < 600) {
			print($getal . ", ");
			$getal = rand(1, 1000);
		}
		print($getal);
		?>
	</body>
</html>