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
    $parametros3 = $entradaDividida[3];
}

        switch ($comando) {
            case "mkdir";
            $gestorDirectorios->crear_directorio($parametros1);
            break;
            case "rm";
                switch ($parametros1) {
                    case "-d";
                    $gestorDirectorios->borrar_directorio($parametros2);
                    break;
                    case "-df";
                    $gestorDirectorios->borrar_directorio_forzado($parametros2);
                    break;
                    case "-f";

                    break;
                    default;
                    echo "El comando no se ha escrito correctamente... La sintaxis correcta es 'rm -d PARAM' o 'rm -df PARAM' según si quieres un borrado seguro o un borrado forzoso.", "<br>";
                    break;
                }
            case "mv";
                $gestorDirectorios->mover_directorio();
            break;
            case "cp";

            break;
            case "find";

            break;
            case "stats";

            break;
            case "vim";

            break;
            case "ls";

            break;
            case "pwd";

            break;
            case "df";

            break;

        }










?>
<div align="center">
<form action="consola.php" method="post">
    <input type="submit" value="Atrás">
</form>
</div>
</body>
</html>

