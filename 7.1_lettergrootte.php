<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
	<head><title>Hello world</title></head>
	<body>
		<p style="text-align: center">
		<?php
		for ($i=1; $i<7; $i++) {
			?>
			<span style="font-size: <?php print($i*10);?>px">PHP is FANTASTISCH</span><br>
			<?php
		}
		for ($i=7; $i>=0; $i--) {
			?>
			<span style="font-size: <?php print($i*10);?>px">PHP is FANTASTISCH</span><br>
			<?php
		}
		?>
		</p>
	</body>
</html>