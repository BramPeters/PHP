<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
	<head><title>Getallenreeksen</title></head>
        <body>
            <table border="1">
                		<thead>
			<?php
			$grondtal = $_GET["grondtal"];
			print("De tafel van " . $grondtal . "<br>");

			?>
		</thead>
                <tbody>
                    <?php
                    for ($i=1; $i<=10; $i++){
                      ?>
                    <tr>
                        <td>
                            <?php print($i." maal ".$grondtal);?>
                        </td>
                                                <td>
                            <?php print($i*$grondtal);?>
                        </td>
                    </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
	</body>
</html>