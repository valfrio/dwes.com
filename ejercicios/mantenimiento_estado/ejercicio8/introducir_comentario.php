<?php

require_once($_SERVER['DOCUMENT_ROOT'] . '/dwes.com/includes/inicio_y_fin.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/dwes.com/ejercicios/mantenimiento_estado/ejercicio8/includes_ej8.php');

inicio_html('Ejercicio 8', ['/styles/formulario.css', '/styles/general.css']);

session_start();

if( $_SERVER['REQUEST_METHOD'] == 'POST'){
    $usuario = filter_input(INPUT_POST, 'usuario', FILTER_SANITIZE_SPECIAL_CHARS);
    $contraseña = $_POST['contraseña'];

    if( !autenticar($usuario, $contraseña) ){
        header("Location: /dwes.com/ejercicios/mantenimiento_estado/ejercicio8/inicio.php");
    }
}

fin_html();
?>