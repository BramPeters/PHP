<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
    "http://www.w3.org/TR/html4/loose.dtd">
<html>
    <head><title>PizzaShop: Login</title>
            <link rel="stylesheet" href="presentation/design.css" />
    </head>
    <body>
        <h1>Aanmelden</h1>
        <form action="admin.php?action=login" method="post">
            <table>
                <tbody>
                    <tr>
                        <td>Login:</td>
                        <td><input type="text" name="txtGebruikersnaam"></td>
                    </tr>
                    <tr>
                        <td>Wachtwoord:</td>
                        <td><input type="password" name="txtWachtwoord"></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td><input type="submit" value="Aanmelden"></td>
                    </tr>
                </tbody>
            </table>
        </form>
        <?php
       // if (isset($_SESSION["nexttry"]) && $_SESSION["nexttry"] == true) {
       //     echo("<p style='color:red;'>Inloggen is niet gelukt. Probeer opnieuw. </p>");
       // }
        ?>
    </body>
</html>