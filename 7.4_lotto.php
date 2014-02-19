<?php
class GetallenKiezer {

	public function getGetallenReeks() {
		$tab = array();
		while (count($tab) < 6) {
			$getal = rand(1, 42);
			if (!in_array($getal, $tab)) array_push($tab, $getal);
		}
		return $tab;
	}
	
}
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
	<head><title>Lotto</title></head>
	<body>
		<h1>De winnende lotto-getallen</h1>
		<table border="1">
			<tbody>
				<?php
				$kiezer = new GetallenKiezer();
				$reeks = $kiezer->getGetallenReeks();
				for ($i=1; $i<=42; $i++) {
					if (in_array($i, $reeks)) {
						$bgcolor = "#aaa";
					} else {
						$bgcolor = "#eee";
					}
					if ($i % 7 == 1) print("<tr>");
					print("<td style='text-align: center; background-color: " . 
									$bgcolor . "'>" . $i . "</td>");
					if ($i % 7 == 0) print("</tr>");
				}
				?>
			</tbody>
		</table>
	</body>
</html>