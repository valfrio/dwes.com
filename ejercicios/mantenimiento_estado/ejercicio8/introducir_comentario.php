<?php

require_once($_SERVER['DOCUMENT_ROOT'] . '/dwes.com/includes/inicio_y_fin.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/dwes.com/includes/jwt_include.php');

inicio_html('Ejercicio 8', ['/styles/formulario.css', '/styles/general.css']);
session_start();

if( isset($_COOKIE['token']) && verificar_token($_COOKIE['token']) ){
    
}
else{
    header('Location: /dwes.com/ejercicios/mantenimiento_estado/ejercicio8/inicio.php');
}

?>