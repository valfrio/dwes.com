<?php

require_once($_SERVER['DOCUMENT_ROOT'] . "/dwes.com/includes/inicio_y_fin.php");
require_once($_SERVER['DOCUMENT_ROOT'] . "/dwes.com/ejercicios/mantenimiento_estado/ejercicio6/articulos_carrito.php");
require_once($_SERVER['DOCUMENT_ROOT'] . "/dwes.com/ejercicios/mantenimiento_estado/ejercicio6/includes.php");
require_once($_SERVER['DOCUMENT_ROOT'] . "/dwes.com/includes/jwt_include.php");

inicio_html('Ejercicio 6', ['/dwes.com/styles/formulario.css', '/dwes.com/styles/general.css', '/dwes.com/styles/tablas.css']);
session_start();

if( !isset($_SESSION['articulos'])){
    header('Location: /dwes.com/ejercicios/mantenimiento_estado/ejercicio6/carrito.php');
}
elseif( verificar_token($_COOKIE['token']) ){
    header('Location: /dwes.com/ejercicios/mantenimiento_estado/ejercicio6/autenticacion.php');
}

?>

<table>
    <thead>
        <tr>
            <td>Articulos</td>
            <td>Cantidad</td>
            <td>Precio</td>
        </tr>
    </thead>
    <tbody>
        <?php

$precio_total = 0;
foreach( $_SESSION['articulos'] as $articulo_comprado ){
    echo "<tr>";
    $nombre_articulo = $articulos[$articulo_comprado['articulo']]['descripcion'];
    echo "<td>$nombre_articulo</td>";
    echo "<td>{$articulo_comprado['cantidad']}</td>";
    echo "<td>{$articulo_comprado['precio']}$ x {$articulo_comprado['cantidad']}</td>";
    echo "</tr>";

    $precio_articulo = $articulo_comprado['precio'] * $articulo_comprado['cantidad'];
    $precio_total += $precio_articulo;
}
echo "</tbody>";
echo "</table>";

    ?>

    <form action="/dwes.com/ejercicios/mantenimiento_estado/ejercicio6/autenticacion.php" method="post">
        <fieldset>
            <legend>Datos para la compra</legend>
            
            <label for="num_tarjeta">Número de la tarjeta bancaria</label>
            <input type="number" name="num_tarjeta" >

            <label for="titular">Nombre del titular de la tarjeta</label>
            <input type="text" name="titular">

            <label for="cvv">CVV</label>
            <input type="number" name="cvv">
        </fieldset>
        <input type="submit" value="entregar">  
    </form>

    <?php




?>

<?php

fin_html();


?>