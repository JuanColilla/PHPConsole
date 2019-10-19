<?php

class Directorios {

    function Directorios() {

    }

    // mkdir
    function crearDirectorio($directorio) {
        if (!is_dir($directorio)) {
            mkdir($directorio);
            echo "El directorio se ha creado satisfactoriamente.", "<br>";
        } else {
            echo "El directorio que intentas crear ya existe.";
        }

    }

    // rm -d
    function borrarDirectorio($directorio) {
        if (is_dir($directorio)) {
            $filesList = scandir($directorio);
            if (empty($filesList)) {
                rmdir($directorio);
                echo "Directorio borrado satisfactoriamente.", "<br>";
            } else {
               echo "El directorio no está vacío, ejecuta 'rm -df' para borrar el directorio y todo su contenido.", "<br>";
            }
        } else {
            echo "El directorio que intentas borrar no existe.";
        }
    }

    // rm -df:
    function borrarDirectorioForzado($directorio) {
        if (is_dir($directorio)) {
            $files = scandir($directorio);
            foreach ($files as $file) {
                unlink($file);
            }
            rmdir($directorio);
            echo "El directorio y todos los archivos que contenía han sido borrados satisfactoriamente.", "<br>";
        } else {
            echo "El directorio que intentas borrar no existe.";
        }
    }


    function moverDirectorio($directorio, $nuevaRutaDirectorio) {

    }


    function copiarDirectorio($directorio, $rutaCopiaDirectorio) {

    }

    // Falta terminar funciones de Directorios, Sistemas y de Archivos.

}