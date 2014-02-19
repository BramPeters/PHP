<?php
class Vergelijking {
	public function getSomIsStriktPositief($getal1, $getal2) {
		$antw = (($getal1 + $getal2) > 0);
		if ($antw == true) return "JA";
		else return "NEEN";
	}
	public function getSomIsStriktNegatief($getal1, $getal2, $getal3) {
		$antw = (($getal1 + $getal2 + $getal3) < 0);
		if ($antw == true) return "JA";
		else return "NEEN";
	}
}
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" 
"http://www.w3.org/TR/html4/loose.dtd">
<html>
	<head><title>Vergelijking</title></head>
	<body>

		<h1>
			<?php
			$vgl = new Vergelijking();
                        print($vgl->getSomIsStriktPositief(10, -9));
			print($vgl->getSomIsStriktNegatief(10, -9, -7));
			?>
		</h1>
	</body>
</html>