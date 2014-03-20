<?php

class Spel {

    public $dbConn;
    public $dbUsername;
    public $dbPassword;

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
        $i = 6;
        while ($gevondenRij == -1 && $i >= 0) {
            if ($this->getStatus($i, $kolom) == 0)
                $gevondenRij = $i;
            else
                $i--;
        }
        if ($gevondenRij != -1) {
            $sql = "update vieropeenrij_spelbord set status = " . $status . " where rijnummer = " .
                    $gevondenRij . " and kolomnummer = " . $kolom;
            /* if($_SESSION["aanBeurt"] == 1){$_SESSION["aanBeurt"]=2; ?><p>help<p><?php }else{$_SESSION["aanBeurt"]=1; ?><p>helpmij<p><?php } */
            $dbh = new PDO($this->dbConn, $this->dbUsername, $this->dbPassword);
            $dbh->exec($sql);
            $dbh = null;
        }
        else
            return false;
    }

    public function reset() {
        $sql = "update vieropeenrij_spelbord set status = 0";
        $dbh = new PDO($this->dbConn, $this->dbUsername, $this->dbPassword);
        $dbh->exec($sql);
        $dbh = null;
        ?> <p>Spel is herstart; Geel begint.</p> <?php
    }

}

session_start();

$spel = new Spel();
$num_rows_geel = 0;
$num_rows_rood = 0;

//var_dump($_SESSION);    check inhoud v $_SESSION


if (isset($_GET["action"])) {
    if ($_GET["action"] == "kiesgeel") {
        $_SESSION["mijnkleur"] = 1;
    } elseif ($_GET["action"] == "kiesrood") {
        $_SESSION["mijnkleur"] = 2;
    } elseif ($_GET["action"] == "plaatsmunt") {
        if (isset($_SESSION["mijnkleur"])) {

            //test
            $con = mysql_connect("localhost", "root", "vdab");
            if (!$con) {
                die('Could not connect: ' . mysql_error());
            }
            $db_selected = mysql_select_db("cursusphp", $con);

            $sql = "SELECT * FROM vieropeenrij_spelbord WHERE status=1";
            $result = mysql_query($sql, $con);
            $num_rows_geel = mysql_num_rows($result);

            $sql = "SELECT * FROM vieropeenrij_spelbord WHERE status=2";
            $result = mysql_query($sql, $con);
            $num_rows_rood = mysql_num_rows($result);
            
            $sql = "SELECT * FROM vieropeenrij_spelbord WHERE status=0";
            $result = mysql_query($sql, $con);
            $num_rows_leeg = mysql_num_rows($result);
            mysql_close($con);

//end test

            //

            
            if ($num_rows_geel == $num_rows_rood) { //if gelijk, geel aan zet
                if ($_SESSION["mijnkleur"] == 1) { //ik ben geel en geel moet spelen
                    $kolom = $_GET["kolom"];
                    $spel->gooiMunt($kolom, $_SESSION["mijnkleur"]);
                }// else {}//het is aan geel en ik ben rood; er moet niets gebeuren.(tenzij een waarschuwing)
            } elseif ($_SESSION["mijnkleur"] == 2) { //ik ben rood en rood moet spelen
                $kolom = $_GET["kolom"];
                $spel->gooiMunt($kolom, $_SESSION["mijnkleur"]);
            }// else {}//het is aan geel en ik ben rood; er moet niets gebeuren.(tenzij een waarschuwing)
        } else {
            ?> <p><a href="9.7b_vieropeenrij_kleurkiezen.php" style="color: red; ">Gelieve een kleur te kiezen zodat u kan meespelen.</a></p> <?php
        }//endof if/else (isset($_SESSION["mijnkleur"])) {
        
                    //overwinning test
            if($num_rows_leeg ==0){
                ?> <p>Alle vakjes zijn gevuld; er is geen winnaar.</p> <?php
            }
            
            //
        
    } elseif ($_GET["action"] == "reset") {
        $spel->reset();
    }
}//endof if (isset($_GET["action"])) {
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
    "http://www.w3.org/TR/html4/loose.dtd">
<html>
    <head>
        <meta http-equiv="refresh" content="5; url=9.7b_vieropeenrij_spelen.php" >
        <title>Vier op een Rij</title>
        <style>
            table { background-color: #204080; }
            img { border: none; }
        </style>
    </head>
    <body style="margin-left:2em;">
        <h1 style="margin-left:4.5em;">Vier op een Rij</h1>
        <table style="border:2px black solid">
                <?php
                for ($rij = 1; $rij <= 6; $rij++) {
                    ?>
                <tr>
                            <?php
                            for ($kolom = 1; $kolom <= 7; $kolom++) {
                                ?>
                        <td>
                            <a href="9.7b_vieropeenrij_spelen.php?action=plaatsmunt&kolom=<?php print($kolom); ?>">
                                <?php
                                if ($spel->getStatus($rij, $kolom) == 0) {
                                    ?>
                                    <img src="images/emptyslot.png">
                                    <?php
                                } elseif ($spel->getStatus($rij, $kolom) == 1) {
                                    $num_rows_geel++;
                                    ?>
                                    <img src="images/yellowslot.png">
                                    
                                    <?php
                                } elseif ($spel->getStatus($rij, $kolom) == 2) {
                                    $num_rows_rood++;
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
        
                <div style="background-color: #204080; font-weight: bold; width:31.6em;padding-top:0.5em;padding-bottom:0.5em;text-align: center; border-left:2px black solid;border-bottom:3px black solid;border-right:2px black solid"> <?php
            //test
//            $con = mysql_connect("localhost", "root", "vdab");
//            if (!$con) {
//                die('Could not connect: ' . mysql_error());
//            }
//            $db_selected = mysql_select_db("cursusphp", $con);
//            $sql = "SELECT * FROM vieropeenrij_spelbord WHERE status=1"; //geel
//            $result = mysql_query($sql, $con);
//            $num_rows_geel = mysql_num_rows($result);
//            $sql = "SELECT * FROM vieropeenrij_spelbord WHERE status=2"; //rood
//            $result = mysql_query($sql, $con);
//            $num_rows_rood = mysql_num_rows($result);
//            mysql_close($con);
            
//        $sql = "SELECT * FROM vieropeenrij_spelbord WHERE status=2"; //rood
//        $dbh = new PDO($spel->dbConn, $spel->dbUsername, $spel->dbPassword);
//        
//        $num_rows_geel = $dbh->exec($sql);
//        $dbh = null;
//        $sql = "SELECT COUNT(status) FROM vieropeenrij_spelbord WHERE status=1"; //geel
//        $dbh = new PDO($spel->dbConn, $spel->dbUsername, $spel->dbPassword);
//        
//        $num_rows_rood = $dbh->exec($sql);
//        $dbh = null;
//            print ($num_rows_rood);
//            print ($num_rows_geel);

//end test

            if ($num_rows_geel == $num_rows_rood) { //if gelijk, geel aan zet
                ?> <h2 style="color:#f0e130">De gele speler is aan zet</h2> <?php
                if ($_SESSION["mijnkleur"] == 1) { //ik ben geel en geel moet spelen
                    ?> <h2>Dat ben jij!</h2> <?php } else {
                    ?> <h2>Het is niet aan jou</h2> <?php
                }//het is aan geel en ik ben rood; er moet niets gebeuren.(tenzij een waarschuwing)
            } else {
                ?> <h2 style="color:#E02000">De rode speler is aan zet</h2> <?php
                if ($_SESSION["mijnkleur"] == 2) { //ik ben rood en rood moet spelen
                    ?> <h2>Dat ben jij!</h2> <?php } else {
                    ?> <h2>Het is niet aan jou</h2> <?php
                }//het is aan geel en ik ben rood; er moet niets gebeuren.(tenzij een waarschuwing)
            }
            ?> </div>
        
        <p style="width:31.7em;"><a href="9.7b_vieropeenrij_spelen.php" style="
	border-top: 1px solid #96d1f8;
	background: #204080;
	padding: 5px 10px;
        margin-left: 2em;
        	
	-webkit-border-radius: 8px;
	-moz-border-radius: 8px;
	border-radius: 8px;
	
	color: white;
	font-size: 18px;
	text-decoration: none; 
	vertical-align: middle;
">Update bord</a>
            <a href="9.7b_vieropeenrij_spelen.php?action=reset"style="
	border-top: 1px solid #96d1f8;
	background: #204080;
	padding: 5px 10px;
        margin-left: 11em;
	
	-webkit-border-radius: 8px;
	-moz-border-radius: 8px;
	border-radius: 8px;
	
	color: white;
	font-size: 18px;
	text-decoration: none; 
	vertical-align: middle;
">Herstart spel</a></p>
    </body>
</html>