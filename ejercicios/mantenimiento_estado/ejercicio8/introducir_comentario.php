<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/dwes.com/includes/inicio_y_fin.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/dwes.com/includes/jwt_include.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/dwes.com/ejercicios/mantenimiento_estado/ejercicio8/includes_ej8.php');


inicio_html('Ejercicio 8', ['/dwes.com/styles/formulario.css', '/dwes.com/styles/general.css']);
session_start();

if( isset($_COOKIE['token']) && verificar_token($_COOKIE['token']) ){?>

    <form action="/dwes.com/ejercicios/mantenimiento_estado/ejercicio8/lista_comentarios.php" method="post">
        <fieldset>
            <legend>Dejanos un comentario</legend>

            <label for="tema">Tema</label>
            <select name="tema" size="1" required>
                <option value="">...</option>
                <option value="fi">Física</option>
                <option value="bi">Biología</option>
                <option value="qui">Química</option>
            </select>

            <label for="comentario">Comentario</label>
            <textarea name="comentario" cols="12" rows="7" placeholder="Introduce tu comentario" required></textarea>
        </fieldset>
        <input type="submit" name="enviar" value="enviar">
    </form>

<?php
}
else{
    cerrar_sesion();
    session_start();
    header('Location: /dwes.com/ejercicios/mantenimiento_estado/ejercicio8/inicio.php');
}

?>