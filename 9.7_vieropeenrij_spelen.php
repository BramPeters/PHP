<?php

class Spel {

    private $dbConn;
    private $dbUsername;
    private $dbPassword;

    public function __construct() {
        $this->dbConn = "mysql:host=localhost;dbname=cursusphp";
        $this->dbUsername = "cursusgebruiker";
        $this->dbPassword = "cursuspwd";
    }

    public function getStatus($rij, $kolom) {
        $sql = "select status from vieropeenrij_spelbord where rijnummer = " . $rij .
                " and kolomnummer = " . $kolom;
        $dbh = new PDO($this->dbConn, $this->dbUsername, $this->dbPassword);
        $resultSet = $dbh->query($sql);
        if ($resultSet) {
            $record = $resultSet->fetch();
            if ($record) {
                $dbh = null;
                return $record["status"];
            }
            else
                return false;
        }
        else
            return false;
    }

	public function gooiMunt($kolom, $status) {
		// Zoek een beschikbare rij
		$gevondenRij = -1;
		$i=6;
		while ($gevondenRij == -1 && $i >= 0) {
			if ($this->getStatus($i, $kolom) == 0) $gevondenRij = $i;
			else $i--;
		}
		if ($gevondenRij != -1) {
			$sql = "update vieropeenrij_spelbord set status = " . $status . " where rijnummer = " .
									$gevondenRij . " and kolomnummer = " . $kolom;
			$dbh = new PDO($this->dbConn, $this->dbUsername, $this->dbPassword);
			$dbh->exec($sql);
			$dbh = null;
		} else return false;
	}

    public function reset() {
        $sql = "update vieropeenrij_spelbord set status = 0";
        $dbh = new PDO($this->dbConn, $this->dbUsername, $this->dbPassword);
        $dbh->exec($sql);
        $dbh = null;
    }

}

session_start();
$spel = new Spel();

if (isset($_GET["action"])) {
	if ($_GET["action"] == "kiesgeel") {
		$_SESSION["mijnkleur"] = 1;
	} elseif ($_GET["action"] == "kiesrood") {
		$_SESSION["mijnkleur"] = 2;
	} elseif ($_GET["action"] == "plaatsmunt") {
		$kolom = $_GET["kolom"];
		$spel->gooiMunt($kolom, $_SESSION["mijnkleur"]);
	} elseif ($_GET["action"] == "reset") {
		$spel->reset();
	}
}
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
    "http://www.w3.org/TR/html4/loose.dtd">
<html>
    <head>
        <title>Vier op een Rij</title>
        <style>
            table { background-color: #204080; }
            img { border: none; }
        </style>
    </head>
    <body>
        <h1>Vier op een Rij</h1>
        <table>
                        <?php
                        for ($rij = 1; $rij <= 6; $rij++) {
                            ?>
                <tr>
                            <?php
                            for ($kolom = 1; $kolom <= 7; $kolom++) {
                                ?>
                        <td>
                            <a href="9.7_vieropeenrij_spelen.php?action=plaatsmunt&kolom=<?php print($kolom); ?>">
                                <?php
                                if ($spel->getStatus($rij, $kolom) == 0) {
                                    ?>
                                    <img src="images/emptyslot.png">
                                    <?php
                                } elseif ($spel->getStatus($rij, $kolom) == 1) {
                                    ?>
                                    <img src="images/yellowslot.png">
                            <?php
                        } elseif ($spel->getStatus($rij, $kolom) == 2) {
                            ?>
                                    <img src="images/redslot.png">
                        <?php
                    }
                    ?>

                            </a>
                        </td>
        <?php
    }
    ?>
                </tr>
    <?php }
?>
        </table>
        <p><a href="9.7_vieropeenrij_spelen.php">Vernieuw bord (refresh)</a></p>
        <p><a href="9.7_vieropeenrij_spelen.php?action=reset">Spel herstarten</a></p>
    </body>
</html>