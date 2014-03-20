<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
    "http://www.w3.org/TR/html4/loose.dtd">
<html>
    <head><title>test: pizza</title>
        <style>
            table{border-collapse:collapse;}
            td, th{padding:0.5em;}
            th{background-color:#ddd}
        </style>
    </head>
    <body>

                <h1>Account aanpassen</h1>
        <form action="alterusercheck.php?action=login" method="post">
            <table>
                <tbody>
                    <tr>
                        <td>Familienaam:</td>
                        <td><input type="text" name="txtFamilienaam" value="<?php print($gebruikerInfo->getKlantFamilienaam()); ?>" required></td>
                        <td>Voornaam:</td>
                        <td><input type="text" name="txtVoornaam" value="<?php print($gebruikerInfo->getKlantVoornaam()); ?>" required></td>
                    </tr>
                    <tr>
                        <td>Telefoonnummer:</td>
                        <td><input type="text" name="txtTelefoonnummer" value="<?php print($gebruikerInfo->getTelefoonnummer()); ?>" required></td>
                        <td>Adres:</td>
                        <td><input type="text" name="txtAdres" value="<?php print($gebruikerInfo->getKlantAdres()); ?>" required></td>
                    </tr>
                    <tr>
                        <td>Postcode:</td>
                        <td><input type="text" name="txtPostcode" value="<?php print($gebruikerInfo->getKlantPostcode()); ?>" required maxlength="4"></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td><input type="submit" value="Aanpassen"></td>
                        <td></td>
                        <td></td>
                    </tr>
                </tbody>
            </table>
        </form>
        
    </body>
</html>