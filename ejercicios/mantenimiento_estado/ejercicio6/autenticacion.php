<?php

require_once($_SERVER['DOCUMENT_ROOT'] . "/dwes.com/includes/inicio_y_fin.php");
require_once($_SERVER['DOCUMENT_ROOT'] . "/dwes.com/ejercicios/mantenimiento_estado/ejercicio6/articulos_carrito.php");
require_once($_SERVER['DOCUMENT_ROOT'] . "/dwes.com/ejercicios/mantenimiento_estado/ejercicio6/includes.php");
require_once($_SERVER['DOCUMENT_ROOT'] . "/dwes.com/includes/jwt_include.php");


inicio_html('Ejercicio 6', ['/dwes.com/styles/formulario.css', '/dwes.com/styles/general.css', '/dwes.com/styles/tablas.css']);
session_start();

if( $_SERVER['REQUEST_METHOD'] == 'POST' && !isset($_COOKIE['token']) ){
    $correo_saneado = filter_input(INPUT_POST, 'correo', FILTER_SANITIZE_EMAIL);
    $correo = filter_var($correo_saneado, FILTER_VALIDATE_EMAIL);
    $contraseña = $_POST['contraseña'];

    if( autenticar($correo, $contraseña) ){
        $datos_usuario = ['correo'  => $correo];
        $jwt = generar_token($datos_usuario);
        setcookie('token', $jwt, time() + 30 * 60);
    }

    header('Location: /dwes.com/ejercicios/mantenimiento_estado/ejercicio6/carrito.php');
}
else{?>

    <form action="<?=$_SERVER['PHP_SELF']?>" method="post">
        <fieldset>
            <legend>Autenticación</legend>

            <label for="correo">Correo</label>
            <input type="email" name="correo">

            <label for="contraseña">Contraseña</label>
            <input type="password" name="contraseña">
        </fieldset>
        <input type="submit" name="autenticar">
    </form>

<?php
}

fin_html();


?>