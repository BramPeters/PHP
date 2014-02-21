<!DOCTYPE HTML>
<html>
    <head>
        <meta charset="utf-8">
        <title>Hello World</title>
    </head>
    <body>
        <h1>Personenlijst</h1>
        <ul>
            <?php
            foreach ($personen as $persoon){
                ?>
            <li>
                <?php print($persoon->getFamilienaam().", ".$persoon->getVoornaam());?>
            </li>
            <?php
            }
            ?>
        </ul>
    </body>
</html>