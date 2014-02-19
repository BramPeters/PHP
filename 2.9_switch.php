<?php

class Oefening {
	public function getWaarde($getal) {
		switch ($getal) {
			case 1:
				return "Een";
				break;
				
			case 2:
				return "Twee";
				break;
				
			case 3:
				return "Drie";
				break;
				
			case 4:
				return "Vier";
				break;
				
			case 5:
				return "Vijf";
				break;
			
			default:
				return $getal;
				break;
		}
	}
}
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
	<head><title>Getalwaarde</title></head>
	<body>
		<h1>
			<?php
			$oef = new Oefening();
			print($oef->getWaarde(2));
			?>
		</h1>
	</body>
</html>