<?php
class GetalArrayGenerator {
	public function getArray() {
		$tab = array();
		for ($i = 1; $i <= 50; $i+=2) {
			array_push($tab, $i);
		}
		for ($i = 2; $i <= 50; $i+=2) {
			array_push($tab, $i);
		}		
		return $tab;
	}
}
?>
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