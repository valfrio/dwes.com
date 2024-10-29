<?php

require_once($_SERVER['DOCUMENT_ROOT'] . '/includes/inicio_y_fin.php');

inicio_html('Ejercicio 6', ['/styles/formulario.css', '/styles/general.css', '/styles/tablas.css']);

$proyectoClaveValor = [
    'ap'    =>  'Agua potable',
    'ep'    =>  'Escuela de primaria',
    'ps'    =>  'Placas solares',
    'cm'    =>  'Centro médico'
];

if ($_SERVER['REQUEST_METHOD']  == 'POST') {
    $todo_ok = true;

    $opciones_saneamiento = [
        'email'     =>  FILTER_SANITIZE_EMAIL,
        'autore'    =>  FILTER_SANITIZE_FULL_SPECIAL_CHARS,
        'cantidad'  =>  FILTER_SANITIZE_NUMBER_INT,
        'proyecto'  =>  [
            'filter'   =>  FILTER_SANITIZE_FULL_SPECIAL_CHARS,
            'flags'     =>  FILTER_REQUIRE_ARRAY
        ],
        'propuesta' =>  FILTER_SANITIZE_FULL_SPECIAL_CHARS
    ];


    $datos_saneados = filter_input_array(INPUT_POST, $opciones_saneamiento);

    $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL, FILTER_NULL_ON_FAILURE);
    $cantidad = filter_input(INPUT_POST, 'cantidad', FILTER_VALIDATE_INT, array(
        'options' => ['min_range' => 1],
        'flags'   => FILTER_NULL_ON_FAILURE
    ));
    if (!($datos_saneados['autore'] == 'on' || $datos_saneados['autore'] == 'off')) {
        $todo_ok = false;
    }

    foreach ($datos_saneados['proyecto'] as $proyecto) {
        if (!key_exists($proyecto, $proyectoClaveValor)) {
            $todo_ok = false;
            break;
        }
    }

    if ($todo_ok) {
        $proyectos = $datos_saneados['proyecto'];
        $propuesta = $datos_saneados['propuesta'];
        $autorizo_registro = $datos_saneados['autore'] == 'on' ? true : false;
    } else {
        echo "<h2>ERROR: alguno de los datos introducidos no esta correcto.</h2>";
        exit(1);
    }


?>

    <table>
        <tbody>
            <tr>
                <th>Campo</th>
                <th>Datos introducidos</th>
            </tr>

            <tr>
                <td>Email</td>
                <td><?= $email ?></td>
            </tr>
            <tr>
                <td>Autorizo registro</td>
                <td><?= $autorizo_registro ? 'Sí' : 'No' ?></td>
            </tr>
            <tr>
                <td>cantidad</td>
                <td><?= $cantidad ?></td>
            </tr>
<?php
            foreach ($proyectos as $proyecto) {
                echo "<tr>";
                echo "<td>Proyecto</td>";
                echo "<td>{$proyectoClaveValor[$proyecto]}</td>";
                echo "</tr>";
            }
?>
            <tr>
                <td>Propuesta</td>
                <td><?= $propuesta ?></td>
            </tr>
        </tbody>

    </table>

<?php

}

?>
<form action="<?=$_SERVER['PHP_SELF']?>" method="post">
    <fieldset>
        <legend>ONG</legend>
        <label for="email">Email</label>
        <input type="email" name="email" id="email" value="<?=isset($email) ? $email : ""?>">

        <label for="autore">Autorizo registro</label>
        <input type="checkbox" name="autore" id="autore" <?=isset($autorizo_registro) ? "checked" : "" ?>>

        <label for="cantidad">Cantidad</label>
        <input type="number" name="cantidad" id="cantidad" value="<?=$cantidad?>">

        <label for="proyecto">Proyecto</label>
        <select name="proyecto[]" id="proyecto" multiple>
<?php
        foreach($proyectoClaveValor as $clave => $valor){
            $seleccionado = "";
            if( isset($proyectos) ){
                $seleccionado = in_array($clave, $proyectos) ? "selected" : "";
            }
            echo "<option value='$clave' $seleccionado>$valor</option>";
        }
?>
        </select>

        <label for="propuesta">Propuesta</label>
        <textarea name="propuesta" id="propuesta" rows="3" cols="30"><?=isset($propuesta) ? $propuesta : ""?></textarea>
    </fieldset>
    <input type="submit" name="enviar" value="enviar">


</form>

<?php


fin_html();


?>