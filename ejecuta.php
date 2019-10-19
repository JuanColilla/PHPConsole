<!DOCTYPE html>
<html>

<head>
    <title>PHP Console</title>
</head>
<body style="background-color: black" text="white" style="align-content: center">
<?php

require "archivos.inc.php";
require "directorios.inc.php";
require "sistema.inc.php";

session_start();

$userInput = $_POST["comando"];

$gestorDirectorios = new Directorios();

$comando = "";
$parametros1 = "";
$parametros2 = "";

if ($userInput == "help") {
    echo "Esta es la lista de comandos que puedes utilizar:","<br>";

} else {
    $entradaDividida = explode(" ", $userInput);
    $comando = $entradaDividida[0];
    $parametros1 = $entradaDividida[1];
    $parametros2 = $entradaDividida[2];
}

        switch ($comando) {
            case "mkdir";
            $gestorDirectorios->crearDirectorio($parametros1);
            break;
            case "rm";
                switch ($parametros1) {
                    case "-d";
                    $gestorDirectorios->borrarDirectorio($parametros2);
                    break;
                    case "-df";
                    $gestorDirectorios->borrarDirectorioForzado($parametros2);
                    default;
                    echo "El comando no se ha escrito correctamente... La sintaxis correcta es 'rm -d PARAM' o 'rm -df PARAM' según si quieres un borrado seguro o un borrado forzoso.", "<br>";
                }
// Switch intérprete de comandos, a falta de rellenar.



        }










?>
<div align="center">
<form action="consola.php" method="post">
    <input type="submit" value="Atrás">
</form>
</div>
</body>
</html>

