<?php
class GetallenReeksMaker {
	public function getReeks() {
		$tab = array();
		for ($i=0; $i<10; $i++) {
			array_push($tab, rand(1, 100));
		}
		sort($tab);
		$tab = array_reverse($tab);
		return $tab;
	}
}
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
	<head><title>Getallenreeksen</title></head>
        <body>
            <?php
            $getReeks = new GetallenReeksMaker();
            $tabel = $getReeks->getReeks();            
            ?>
            <table border="1">
                <tbody>
                    <?php
                    foreach ($tabel as $getal){
                      ?>
                    <tr>
                        <td>
                            <?php print($getal);?>
                        </td>
                    </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
	</body>
</html>