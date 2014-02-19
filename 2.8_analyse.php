<?php
class Oefening {
	public function getAnalyse($getal1, $getal2) {
if($getal1<$getal2){
    return "het eerste getal is kleiner";    
} elseif($getal1>$getal2){
       return "het tweede getal is groter";     
}else{
    return "het eerste getal is gelijk aan het tweede";  
}
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
			$oef = new Oefening();
			print($oef->getAnalyse(2, 2));
			?>
		</h1>
	</body>
</html>