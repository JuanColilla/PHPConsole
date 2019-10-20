<!DOCTYPE html>
<html lang="es">

<head>
    <title>PHP Console</title>
</head>
<body style="background-color: black" text="white" style="align-content: center">
<?php

require "archivos.inc.php";
require "directorios.inc.php";
require "sistema.inc.php";

$userInput = $_POST["comando"];

$gestorDirectorios = new Directorios();
$gestorArchivos = new Archivos();
$sistema = new Sistema();

$comando = "";
$parametros1 = "";
$parametros2 = "";

$entradaDividida = explode(" ", $userInput);
$comando = $entradaDividida[0];
$parametros1 = $entradaDividida[1];
$parametros2 = $entradaDividida[2];
$parametros3 = $entradaDividida[3];

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
                $gestorArchivos->borrar_fichero($parametros2);
                break;
                default;
                echo "El comando no se ha escrito correctamente... La sintaxis correcta es 'rm -d PARAM' o 'rm -df PARAM' según si quieres un borrado seguro o un borrado forzoso.", "<br>";
                break;
            }
        break;
        case "mv";
            switch ($parametros1) {
                case "-d";
                $gestorDirectorios->mover_directorio($parametros2, $parametros3);
                break;
                case "-f";
                $gestorArchivos->mueve_fichero($parametros2, $parametros3);
                break;
                default;
                echo "No se ha llamado al comando 'mv' de forma adecuada, prueba con 'mv -d PARAM PARAM' o 'mv -f PARAM PARAM'", "<br>";
                break;
            }
        break;
        case "cp";
            switch ($parametros1) {
                case "-d";
                $gestorDirectorios->copiar_directorio($parametros2, $parametros3);
                break;
                case "-f";
                $gestorArchivos->copia_fichero($parametros2, $parametros3);
                break;
                default;
                echo "No se ha llamado al comando 'cp' de forma adecuada, prueba con 'cp -d PARAM PARAM' o 'cp -f PARAM PARAM'", "<br>";
                break;
            }
        break;
        case "find";
        $gestorArchivos->buscar_fichero($parametros1, $parametros2);
        break;
        case "stats";
        $gestorArchivos->status_fichero($parametros2);
        break;
        case "vim";
        $gestorArchivos->creaOmodifica_fichero($parametros2, $parametros3);
        break;
        case "ls";
        $sistema->listado($parametros1);
        break;
        case "pwd";
        $sistema->ruta();
        break;
        case "df";
        $sistema->stats_sistema();
        break;
        case "help";
        echo "Esta es la lista de comandos que puedes utilizar:","<br>";
        echo "mkdir ", "------------------------------------", " Crea un directorio.", "<br>";
        echo "rm ", "----- '-d', '-df' o '-f' ", "------------------------------------", " Borra un directorio o archivo.", "<br>";
        echo "mv ", "----- '-d' o '-f' ", "------------------------------------", " Mueve un directorio o archivo.", "<br>";
        echo "cp ", "----- '-d' o '-f' ", "------------------------------------", " Crea un directorio.", "<br>";
        echo "find ", "------------------------------------", " Busca un archivo, responde a si el archivo existe o no.", "<br>";
        echo "stats ", "------------------------------------", " Responde con información sobre el archivo solicitado.", "<br>";
        echo "vim ", "------------------------------------", " Añade el contenido a un fichero, si este no existe, lo crea antes de añadirlo.", "<br>";
        echo "ls ", "------------------------------------", " Hace un listado con el contenido de un directorio.", "<br>";
        echo "pwd ", "------------------------------------", " Consulta el directorio de trabajo actual.", "<br>";
        echo "cd ", "------------------------------------", " Cambia el directorio de trabajo actual.", "<br>";
        echo "df ", "------------------------------------", " Responde con estadísticas sobre la partición de trabajo.", "<br>";
        break;
        default;
        echo "Comando no reconocido, escribe 'help' para obtener la lista de comandos posibles.","<br>";
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

