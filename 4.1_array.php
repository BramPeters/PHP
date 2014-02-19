<?php
class GetalArrayGenerator {
	public function getArray() {
		$tab = array();
		for ($i=0; $i<20; $i++) {
			$willekeurigGetal = rand(-50, 50);
			$tab[$i] = $willekeurigGetal;
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
			$arrGen= new GetalArrayGenerator();
			print_r($arrGen->getArray());
			?>
		</pre>
	</body>
</html>