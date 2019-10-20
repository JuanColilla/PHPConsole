<?php

class Archivos {

    function __construct() {}

    // find
    function buscar_fichero($fichero, $directorio){
        $found = false;
       if (is_dir($directorio)) {
           $files = scandir($directorio);
           foreach ($files as $file) {
               if ((string)$file == (string)$fichero) {
                   $found = true;
               }
           }
           if ($found) {
               echo "¡El fichero ha sido encontrado!", "<br>";
           } else {
               echo "El fichero no se ha encontrado...", "<br>";
           }
       }
    }

    // stats
    function status_fichero($fichero){
        if (file_exists($fichero)) {
            $detalles = stat($fichero);
            echo "ID Propietario: ", $detalles[4], "<br>";
            echo "ID Grupo: ", $detalles[5], "<br>";
            echo "Tamaño: ", $detalles[7], "<br>";
            echo "Último acceso: ", $detalles[8], "<br>";
            echo "Última modificación: ", $detalles[9], "<br>";
        } else {
            echo "El archivo que buscas no existe.", "<br>";
        }
    }

    // rm -f
    function borrar_fichero($fichero) {
        if (file_exists($fichero)) {
            unlink($fichero);
            echo "Archivo borrado satisfactoriamente.", "<br>";
        } else {
            echo "El fichero que intentas borrar no existe.", "<br>";
        }
    }

    // mv -f
    function mueve_fichero($fichero, $ruta_destino) {
        if (file_exists($fichero)) {
            rename($fichero, ($ruta_destino . DIRECTORY_SEPARATOR . $fichero));
            echo "Archivo movido satisfactoriamente.", "<br>";
        } else {
            echo "El archivo que intentas mover no existe.", "<br>";
        }
    }

    // cp -f
    function copia_fichero($fichero, $ruta_destino) {
        if (file_exists($fichero)) {
            copy($fichero, $ruta_destino);
            echo "Fichero copiado correctamente", "<br>";
        } else {
            echo "El fichero que intentas copiar no existe.", "<br>";
        }
    }

    // vim -f
    function creaOmodifica_fichero($fichero, $contenido) {
            $fichero_abierto = fopen($fichero, "a");
            fwrite($fichero_abierto, $contenido);
            fclose($fichero_abierto);
    }

}