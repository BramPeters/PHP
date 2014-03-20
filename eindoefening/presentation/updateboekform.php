<!DOCTYPE HTML>
<html>
    <head>
        <meta charset="utf-8">
        <title>Boeken</title>
    </head>
    <body>
        <h1>Boek bijwerken</h1>
        
                <?php
        if($error == "titleexists"){
            ?>
                <p style ="color:red">Titel bestaat al</p>
                <?php
        }
        ?>
        
        <form method='post' action="10.0_updateboek.php?action=process&id=<?php print($boek->getId());?>">
            <table>
                <tr>
                    <td>Titel: </td>
                    <td><input type="text" name="txtTitel"></td>
                </tr>
                <tr>
                    <td>Genre:</td>
                    <td>
                        <select name="selGenre">
                            <?php
                            foreach ($genreLijst as $genre){
                                if ($genre->getId() == $boek->getGenre() ->getId()){
                                    $selWaarde = " selected";
                                }else{
                                    $selWaarde = "";
                                }
                                ?>
                            <option value="<?php print($genre->getId()); ?> " <?php print($selWaarde);?> > <?php print($genre->getOmschrijving()); ?> </option>
                            <?php
                            }
                                ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td><input type="submit" value="Toevoegen"></td>
                </tr>
            </table>
        </form>

    </body>
</html>