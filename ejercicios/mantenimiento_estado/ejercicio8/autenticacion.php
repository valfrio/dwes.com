<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/dwes.com/includes/inicio_y_fin.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/dwes.com/ejercicios/mantenimiento_estado/ejercicio8/includes_ej8.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/dwes.com/includes/jwt_include.php');


inicio_html('Ejercicio 8', ['/dwes.com/styles/formulario.css', '/dwes.com/styles/general.css']);

session_start();

if( isset($_POST['usuario']) ){
    $usuario = filter_input(INPUT_POST, 'usuario', FILTER_SANITIZE_SPECIAL_CHARS);
    $datos_usuario = ['nombre' => $usuario];
    $contraseña = $_POST['contraseña'];
}

if( $_SERVER['REQUEST_METHOD'] == 'POST' && !isset($_COOKIE['token'])){

    if( !autenticar($usuario, $contraseña) ){
        header("Location: /dwes.com/ejercicios/mantenimiento_estado/ejercicio8/inicio.php");
        exit(1);
    }

    $jwt = generar_token($datos_usuario);
    setcookie("token", $jwt, time() + 2 * 60 * 60);

    echo "<h2>Autenticación completada, bienvenid@</h2>";
    echo "<p><a href='/dwes.com/ejercicios/mantenimiento_estado/ejercicio8/introducir_comentario.php'>Link a la pantalla de introducción de comentario</a></p>";

}
elseif( isset($_COOKIE['token']) && autenticar($usuario, $contraseña) && $_SERVER['REQUEST_METHOD'] == 'POST' ){

    $jwt = generar_token($datos_usuario);
    if( !verificar_token($jwt) ){
        header("Location: /dwes.com/ejercicios/mantenimiento_estado/ejercicio8/inicio.php");
        exit(2);
    }
    else{
        header("Location: /dwes.com/ejercicios/mantenimiento_estado/ejercicio8/introducir_comentario.php");
    }

}
else{
    header("Location: /dwes.com/ejercicios/mantenimiento_estado/ejercicio8/inicio.php");
}

fin_html();
?>