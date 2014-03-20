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

                <h1>Nieuwe account aanmaken</h1>
        <form action="nieuwegebruikercheck.php" method="post">
            <table>
                <tbody>
                    <tr>
                        <td>Familienaam:</td>
                        <td><input type="text" name="txtFamilienaam" placeholder="Bvb. Peters" required></td>
                        <td>Voornaam:</td>
                        <td><input type="text" name="txtVoornaam" placeholder="Bvb. Piet" required></td>
                    </tr>
                    <tr>
                        <td>Telefoonnummer:</td>
                        <td><input type="text" name="txtTelefoonnummer" placeholder="Bvb. 050224488" required></td>
                        <td>Adres:</td>
                        <td><input type="text" name="txtAdres" placeholder="Bvb. Straatlaan 86" required></td>
                    </tr>
                    <tr>
                        <td>Postcode:</td>
                        <td><input type="text" name="txtPostcode" placeholder="Bvb. 8000" required maxlength="4"></td>
                       
                    </tr>
                    <tr>
                        <td>E-mailadres:</td>
                        <td><input type="email" name="txtGebruikersnaam" placeholder="Bvb. pietpeters@email.com" required></td>
                        <td>Wachtwoord:</td>
                        <td><input type="password" name="txtWachtwoord" placeholder="Gelieve een sterk wachtwoord in te geven." required></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td><input type="submit" value="Aanmaken"></td>
                        <td></td>
                        <td><?php if (isset($_GET["bestaandegebruiker"])) {print("<p style='color:red;'>Er bestaat al een gebruiker met het opgegeven emailadres.</p>");}?></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td><a href="logincheck.php">Terugkeren naar de login.</a></td>
                    </tr>
                </tbody>
            </table>
        </form>
        
    </body>
</html>