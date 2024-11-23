<?php

require_once($_SERVER['DOCUMENT_ROOT'] . '/dwes.com/includes/inicio_y_fin.php');

inicio_html('Ejercicio 8', ['/dwes.com/styles/formulario.css', '/dwes.com/styles/general.css']);
session_start();

?>

<form action="/ejercicios/mantenimiento_estado/ejercicio8/introducir_comentario.php" method="post">
    <fieldset>
        <legend>Inicio de sesión</legend>

        <label for="usuario">usuario</label>
        <input type="text" name="usuario" id="usuario">

        <label for="contraseña">Contraseña</label>
        <input type="password" name="contraseña" id="contraseña">
    </fieldset>
    <input type="button" value="envio">
</form>

<?php

fin_html();

?>