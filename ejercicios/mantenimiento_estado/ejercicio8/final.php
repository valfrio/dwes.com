<?php

require_once($_SERVER['DOCUMENT_ROOT'] . '/dwes.com/includes/inicio_y_fin.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/dwes.com/includes/jwt_include.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/dwes.com/ejercicios/mantenimiento_estado/ejercicio8/includes_ej8.php');


inicio_html('Ejercicio 8', ['/dwes.com/styles/formulario.css', '/dwes.com/styles/general.css', '/dwes.com/styles/tablas.css']);
session_start();
ob_start();

if( !isset($_SESSION['comentarios']) || !isset($_COOKIE['token']) || !verificar_token($_COOKIE['token']) ){
    
    header('Location: /dwes.com/ejercicios/mantenimiento_estado/ejercicio8/inicio.php');
    exit(5);

}


?>

    <table>
        <thead>
            <tr>
                <td>Tema</td>
                <td>Comentario</td>
                <td>Fecha y hora</td>
            </tr>
        </thead>
        <tbody>
<?php

    foreach( $_SESSION['comentarios'] as $comentario ){
        echo "<tr>";

        echo "<td>{$comentario['tema']}</td>";
        echo "<td>{$comentario['comentario']}</td>";
        echo "<td>{$comentario['tiempo']}</td>";

        echo "</tr>";
    }
    
?>
        </tbody>
    </table>
<?php

$nombre_sesion = session_module_name();

$cokie_sesion = session_get_cookie_params();
setcookie($nombre_sesion, '', time() - 10000000, $cokie_sesion['path'], $cokie_sesion['secure'], $cokie_sesion['domain'], $cokie_sesion['httponly']);

session_unset();
session_destroy();
ob_flush();
echo "<p><a href='/dwes.com/ejercicios/mantenimiento_estado/ejercicio8/inicio.php'>Link para la pantalla incial</a></p>";

?>