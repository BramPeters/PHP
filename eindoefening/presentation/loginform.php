<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
    "http://www.w3.org/TR/html4/loose.dtd">
<html>
    <head><title>PizzaShop: Login</title></head>
            <style>
            table{border-collapse:collapse;}
            td, th{padding:0.5em;}
            th{background-color:#ddd}
                        .breadcrumbs{
            list-style:none;
            overflow:hidden;
            margin:0;
            padding:0;
            }
            .breadcrumbs li{
                display:inline;
            }
            .breadcrumbs li a{
                position:relative;
                display:block;
                float:left;
                background:#E0ECF4;
                text-decoration:none;
                line-height:40px;
                padding-left:30px;
            }
            .breadcrumbs li:first-child a{
             padding-left:10px;   
            }
            .breadcrumbs li a:after{
                content: "";
                display:block;
                width:0;
                height:0;
                border-top:20px solid transparent;
                border-bottom:20px solid transparent;
                border-left:20px solid #E0ECF4;
                position:absolute;
                top:50%;
                margin-top:-20px;
                left:100%;
                z-index:2;
            }
            .breadcrumbs li a:before{
                content: "";
                display:block;
                width:0;
                height:0;
                border-top:23px solid transparent;
                border-bottom:23px solid transparent;
                border-left:23px solid white;
                position:absolute;
                top:50%;
                margin-top:-23px;
                margin-left: 0px;
                left:100%;
                z-index:1;
            }
            .breadcrumbs .actief a{
                background:#005689;
                color:#FFF;
            }
            .breadcrumbs .actief a:after{
                border-left-color:#005689;
            }
        </style>
    </head>
    <body>
        <ul class="breadcrumbs" style='margin: 1em;'>
          <li><a>Menu</a></li>
          <li class="actief"><a>Login</a></li>
          <li><a>Bestelling</a></li>
          <li><a>Finish</a></li>
        </ul>
        <h1>Aanmelden</h1>
        <form action="logincheck.php?action=login" method="post">
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
                        <td><a href="nieuwegebruiker.php">Nieuwe gebruiker aanmaken</a></td>						
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