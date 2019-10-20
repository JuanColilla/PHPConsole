<?php

class Directorios {

    function __construct() {}

    // mkdir
    function crear_directorio($directorio) {
        if (!is_dir($directorio)) {
            mkdir($directorio);
            echo "El directorio se ha creado satisfactoriamente.", "<br>";
        } else {
            echo "El directorio que intentas crear ya existe.";
        }
    }

    // rm -d
    function borrar_directorio($directorio) {
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
    function borrar_directorio_forzado($directorio) {
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

    // mv -d
    function mover_directorio($directorio, $ruta_destino) {
        if (is_dir($directorio)) {
            rename($directorio, ($ruta_destino . DIRECTORY_SEPARATOR . $directorio));
            echo "Directorio movido satisfactoriamente.", "<br>";
        } else {
            echo "El directorio especificado no existe o no es un directorio en si.", "<br>";
        }
    }

    // cp -d
    function copiar_directorio($directorio, $rutaCopiaDirectorio) {
        if (is_dir($directorio)) {
            mkdir($rutaCopiaDirectorio, 0755);
            echo "Directorio copiado satisfactoriamente.", "<br>";
        } else {
            echo "El directorio especificado no existe o no es un directorio en si.", "<br>";
        }
    }

}