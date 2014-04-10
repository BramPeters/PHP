<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
    "http://www.w3.org/TR/html4/loose.dtd">
<html>
    <head><title>PizzaShop: Login</title></head>
            <link rel="stylesheet" href="presentation/design.css" />
    </head>
    <body>
        <p style='margin: 1em;'>Pizzabestelling in 4 simpele stappen: </p>
        <ul class="breadcrumbs" style='margin: 1em;'>
          <li><a>Menu</a></li>
          <li class="actief"><a>Login</a></li>
          <li><a>Bestelling</a></li>
          <li><a>Finish</a></li>
        </ul>
        <h1>Aanmelden</h1>
        <form action="stap2_logincheck.php?action=login" method="post">
            <table>
                <tbody>
                    <tr>
                        <td>Emailadres:</td>
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
                    <tr> </tr>
                    <tr> </tr>
                    <tr> </tr>
                    <tr>
                        <td></td>						
                        <td><a href="stap2b_nieuwegebruiker.php">Nieuwe gebruiker aanmaken</a></td>						
                    </tr>
                </tbody>
            </table>
        </form>
        <?php
        if (isset($_SESSION["nexttry"]) && $_SESSION["nexttry"] == true) {
            echo("<p style='color:red;'>Inloggen is niet gelukt. Probeer opnieuw. </p>");
        }
        ?>
    </body>
</html>