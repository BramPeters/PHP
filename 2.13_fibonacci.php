<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
	<head><title>Oefening</title></head>
	<body>
		<?php
		$oud = 0;
		$nieuw = 1;
		print($oud . " " );
		while ($nieuw < 5000) {
			print($nieuw . " ");
			$vorigOud = $oud;
			$oud = $nieuw;
			$nieuw = $vorigOud  + $oud;
		}
		?>
	</body>
</html>