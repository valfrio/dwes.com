<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/dwes.com/includes/inicio_y_fin.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/dwes.com/includes/jwt_include.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/dwes.com/ejercicios/mantenimiento_estado/ejercicio8/includes_ej8.php');


inicio_html('Ejercicio 8', ['/dwes.com/styles/formulario.css', '/dwes.com/styles/general.css', '/dwes.com/styles/tablas.css']);
session_start();

$temas_posibles = [
    'fi'    =>  'Física',
    'bi'    =>  'Biología',
    'qui'   =>  'Química',
];

if( isset($_COOKIE['token']) && verificar_token($_COOKIE['token']) ){

    $comentario_texto = filter_input(INPUT_POST, 'comentario', FILTER_SANITIZE_SPECIAL_CHARS);

    if( !array_key_exists($_POST['tema'], $temas_posibles) ){
        header('Location: /dwes.com/ejercicios/mantenimiento_estado/ejercicio8/inicio.php');
        exit(3);
    }

    $tema = $_POST['tema'];
    date_default_timezone_set('UTC');

    $_SESSION['comentarios'][] = [
        'tema'          =>  $temas_posibles[$tema],
        'comentario'    =>  $comentario_texto,
        'tiempo'          =>  date('d-m-Y H:i:s')
    ];

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

    echo "<p><a href='/dwes.com/ejercicios/mantenimiento_estado/ejercicio8/introducir_comentario.php'>Link para aportar otro comentario</a></p>";
    echo "<p><a href='/dwes.com/ejercicios/mantenimiento_estado/ejercicio8/final.php'>Link para ir a la pantalla final</a></p>";

}

else{
    cerrar_sesion();
    session_start();
    header('Location: /dwes.com/ejercicios/mantenimiento_estado/ejercicio8/inicio.php');
}

?>