<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
	<head><title>De tafels van vermenigvuldiging</title></head>
	<body>
		<table border="1">
			<tbody>
				<tr>
					<td> </td>
					<?php
					for ($i=1; $i<=10; $i++) {
						?>
						<td><?php print($i);?></td>
						<?php
					}
					?>
				</tr>
				<?php
				for ($i=1; $i<=10; $i++) {
					?>
					<tr>
						<td><?php print($i);?>
						<?php
						for ($j=1; $j<=10; $j++) {
						?>
							<td><?php print($i*$j);?></td>
						<?php
						}
						?>
					</tr>
					<?php
				}
				?>
			</tbody>
		</table>
	</body>
</html>