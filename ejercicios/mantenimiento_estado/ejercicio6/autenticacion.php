<?php

require_once($_SERVER['DOCUMENT_ROOT'] . "/dwes.com/includes/inicio_y_fin.php");
require_once($_SERVER['DOCUMENT_ROOT'] . "/dwes.com/ejercicios/mantenimiento_estado/ejercicio6/articulos_carrito.php");
require_once($_SERVER['DOCUMENT_ROOT'] . "/dwes.com/ejercicios/mantenimiento_estado/ejercicio6/includes.php");

inicio_html('Ejercicio 6', ['/dwes.com/styles/formulario.css', '/dwes.com/styles/general.css', '/dwes.com/styles/tablas.css']);
session_start();

if( $_SERVER['REQUEST_METHOD'] == 'POST' && !isset($_COOKIE['token']) ){
    $correo_saneado = filter_input(INPUT_POST, 'correo', FILTER_SANITIZE_EMAIL);
    $correo = filter_var($correo_saneado, FILTER_VALIDATE_EMAIL);
    $contraseña = $_POST['contraseña'];

    if(  ){
        
    }
}

fin_html();


?>