<?php

require_once($_SERVER['DOCUMENT_ROOT'] . "/dwes.com/includes/inicio_y_fin.php");
require_once($_SERVER['DOCUMENT_ROOT'] . "/dwes.com/ejercicios/mantenimiento_estado/ejercicio6/articulos_carrito.php");

inicio_html('Ejercicio 6', ['/dwes.com/styles/formulario.css', '/dwes.com/styles/general.css', '/dwes.com/styles/tablas.css']);
session_start();
ob_start();

if( $_SERVER['REQUEST_METHOD'] == 'GET' && isset($_SERVER['HTTP_REFERER']) && $_SERVER['HTTP_REFERER'] == "/dwes.com/ejercicios/mantenimiento_estado/ejercicio6/autenticacion.php" && !isset($_COOKIE['token']) ){
    echo "<h2>ERROR EN LA AUTENTICACÓN</h2>";
}

if( $_SERVER['REQUEST_METHOD'] == "POST" ){

    $articulo_seleccionado = array_key_exists($_POST['articulo'], $articulos) ? $_POST['articulo'] : null;
    $cantidad_saneada = filter_input(INPUT_POST, 'cantidad', FILTER_SANITIZE_NUMBER_INT);
    $cantidad = filter_var($cantidad_saneada, FILTER_VALIDATE_INT);

    $_SESSION['articulos'][] = ['articulo'  => $articulo_seleccionado, 'cantidad' => $cantidad];

?>

<table>
    <thead>
        <tr>
            <td>Articulos</td>
            <td>Cantidad</td>
        </tr>
    </thead>
    <tbody>
        <?php

foreach( $_SESSION['articulos'] as $articulo_comprado ){
    echo "<tr>";
    $nombre_articulo = $articulos[$articulo_comprado['articulo']]['descripcion'];
    echo "<td>$nombre_articulo</td>";
    echo "<td>{$articulo_comprado['cantidad']}</td>";
    
    echo "</tr>";
}
    echo "</tbody>";
    echo "</table>";
}

if( isset($_COOKIE['token']) && verificar_token($_COOKIE['token']) ){
    $payload = verificar_token($_COOKIE['token']);
    echo "{$payload['correo']}";
}
elseif( isset($_COOKIE['token']) && !verificar_token($_COOKIE['token']) ){
    header('Location: /dwes.com/ejercicios/mantenimiento_estado/ejercicio6/autenticacion.php');
}

?>

<form action="<?=$_SERVER['PHP_SELF']?>" method="post">
    <fieldset>
        <legend>Carrito de compra</legend>

        <label for="articulo">Artículos</label>
        <select name="articulo" required size="1">
            <option value="">...</option>
<?php
            foreach( $articulos as $clave => $articulo){
                echo "<option value='$clave'>{$articulo['descripcion']} - {$articulo['precio']}</option>";
            }   
?>
        </select>
        
        <label for="cantidad">Cantidad</label>
        <input type="number" name="cantidad" required>
</fieldset>
<input type="submit" name="operacion" value="añadir al carrito"> 
</form>
<p><a href="/dwes.com/ejercicios/mantenimiento_estado/ejercicio6/pago.php">Link a la pantalla de pago</a></p>
<p><a href="/dwes.com/ejercicios/mantenimiento_estado/ejercicio6/autenticacion.php">Link a la pantalla de autenticación</a></p>

<?php
ob_flush();

fin_html();

?>