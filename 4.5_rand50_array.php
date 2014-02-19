<?php
class Oefening {
	public function getArray() {
		$tab = array();
		$getal = rand(1, 100);
		array_push($tab, $getal);
		while ($getal <= 80) {
			$getal = rand(1, 100);
			array_push($tab, $getal);
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
		<pre>
			<?php
			$oef = new Oefening();
			print_r($oef->getArray());
			?>
		</pre>
	</body>
</html>