<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/includes/inicio_y_fin.php');

inicio_html('Ejercicio 1', ['/styles/formulario.css', '/styles/general.css']);

if( $_SERVER['REQUEST_METHOD'] == 'GET'){?>

    <form action="<?=$_SERVER['PHP_SELF']?>" method="post">
        <fieldset>
            <legend>Introduce el numero</legend>
            <label for="numero">Numero:</label>
            <input name="numero" id="numero" type="text" size="6" required>
        </fieldset>
        <input type="submit" name="enviar" value="Enviar">
    </form>

<?php
}

else{
    $numero_decimal = $_POST['numero'];
    
    // function is_natural_number($numero_decimal){
        
    //     $regex_pattern = "\d{6}";
    //     $is_number = preg_match($regex_pattern, $numero_decimal);


    //     return $is_number;
    // }    
    
    // $is_number = is_natural_number($numero_decimal);

    // if( $is_number ){

?>
    <table>
        <title>Numero en distintos formatos</title>
        <tbody>
            <tr>
                <td>Decimal</td>
                <td>Octal</td>
                <td>Hexadecimal</td>
                <td>Binario</td>
            </tr>

            <tr>
                <td><?=$numero_decimal?></td>
                <td><?=decoct($numero_decimal)?></td>
                <td><?=dechex($numero_decimal)?></td>
                <td><?=decbin($numero_decimal)?></td>
            </tr>
        </tbody>
    </table>
<?php
    
    // }
    // else{
    //     echo "El no has introducido un numero entero >:(";
    // }

}

fin_html();
?>