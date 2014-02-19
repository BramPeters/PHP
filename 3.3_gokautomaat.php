<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
	<head><title>Oefening</title></head>
	<body>
		<h1>
			<?php
			$getal = rand(1, 10);
			$gok = $_GET["mijngok"];
			print("Gezochte getal: " . $getal . "<br>");
			print("Uw gok: " . $gok . "<br><br>");
			if ($getal == $gok)
				print("Het getal is geraden!");
			else
				print("U hebt verkeerd gegokt!");
			?>
		</h1>
	</body>
</html>