<?php

define("DIRECTORIO_CLASES", __DIR__ . "/clases");

function carga_clases ($clase) {

    if ( file_exists(DIRECTORIO_CLASES . "/$clase.php") ){
        require_once(DIRECTORIO_CLASES . "/$clase.php");
    }
    else {
        throw new Exception("La clase $clase no se ha podido cargar");
    }
}

try {
    spl_autoload_register("carga_clases");
}
catch (Exception $e){
    die($e->getMessage());
}


?>