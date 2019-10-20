<?php

class Sistema {


    function __construct() {}

    // ls
    function listado($directorio) {
        if (is_dir($directorio)) {
            $contents = scandir($directorio);
            $files = [];
            $dirs = [];
            foreach ($contents as $content) {
                if (file_exists($content)) {
                    $files[] = (string)$content;
                }

                if (is_dir($content)) {
                    $dirs[] = (string)$content;
                }
            }
            echo "A continuación tienes una lista con los elementos encontrados:", "<br>";
            foreach ($files as $file) {
                echo (string)$file, " -file", "<br>";
            }
            foreach ($dirs as $dir) {
                echo (string)$dir, " -directory", "<br>";
            }
        } else {
            echo "El directorio que intentas listar no existe.", "<br>";
        }
    }

    // pwd
    function ruta() {
        echo getcwd();
    }

    // cd
    function cambiarRuta() {

    }

    //
    function stats_sistema() {
        $sysStats = Array();
        $diskTotal = disk_total_space(DIRECTORY_SEPARATOR);
        $diskFree = disk_free_space(DIRECTORY_SEPARATOR);
        $gbFree = number_format($diskFree / pow(10, 9), 2);
        $percFree = number_format($diskFree / $diskTotal * 100, 2);
        $storageFree = $gbFree . "Gb's lliures al disc --------------- " . $percFree . "%";
        $gbStored = number_format(($diskTotal - $diskFree) / pow(10, 9), 2);
        $percStored = number_format(($diskTotal - $diskFree) / $diskTotal * 100, 2);
        $storageFull = $gbStored . "Gb's omplerts al disc --------------- " . $percStored . "%";
        array_push($sysStats, $storageFree, $storageFull);
        return $sysStats;
    }


}