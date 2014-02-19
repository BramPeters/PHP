<?php
class GreetingGenerator{
    public function getGreeting (){
        //return "Hello World!";
        return "Hello World!  The time is: ".date("d/m/Y - H:i:s");
    }
}
?>

<!DOCTYPE HTML>
<html>
    <head>
        <meta charset='utf-8'>
        <title>Hello World</title>
    </head>
    <body>
        <h1>
            <?php 
            $gg = new greetingGenerator();
            print($gg->getGreeting());
            ?>
        </h1>
    </body>
</html>