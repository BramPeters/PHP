<?php
class Oefening {
	public function getArray() {
		$tab = array();
		array_push($tab, "Lente");
		array_push($tab, "Zomer");
		array_push($tab, "Herfst");
		array_push($tab, "Winter");
		return $tab;
	}
}
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" 
"http://www.w3.org/TR/html4/loose.dtd">
<html>
	<head><title>Seizoenen</title></head>
	<body>
		<pre>
			<?php
			$oef = new Oefening();
			print_r($oef->getArray());
			?>
		</pre>
	</body>
</html>