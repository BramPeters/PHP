<?php
class Oefening {
	public function getArray() {
		$tab = array();
		for ($i = 1; $i <= 40; $i++) {
			$tab[$i] = 0;
		}
		for ($i = 0; $i < 100; $i++) {
			$getal = rand(1, 40);
			$tab[$getal]++;
		}
		return $tab;
	}
}
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" 
"http://www.w3.org/TR/html4/loose.dtd">
<html>
	<head><title>Willekeurige getallen</title></head>
	<body>
		<?php
		$oef = new Oefening();
		$tab = $oef->getArray();
		for ($i = 1; $i <= 40; $i++) {
			?>
			Getal <?php print($i);?> werd <?php print($tab[$i]);?> keer gegenereerd.<br>
			<?php
		}
		?>
	</body>
</html>