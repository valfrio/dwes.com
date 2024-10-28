<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/includes/inicio_y_fin.php');

inicio_html('Ejercicio 3', ['/styles/formulario.css', '/styles/general.css']);

if( $_SERVER['REQUEST_METHOD'] == 'GET'){?>

    <form action="<?=$_SERVER['PHP_SELF']?>" method="post">
        <fieldset>
            <legend>Pizzas</legend>
            
            <label for="nombre">Nombre</label>
            <input id="nombre" name="nombre" type="text" size="30" required>

            <label for="direccion">Dirección</label>
            <input id="direccion" name="direccion" type="text" size="50" required>

            <label for="telefono">Teléfono</label>
            <input type="number" name="telefono" id="telefono" required>

            <label for="tipo">Tipo</label>
            <div>
                <input id="veg" name="tipo" type="radio" value="veg" required>Vegetariana<br>
                <input id="noveg" name="tipo" type="radio" value="noveg">No Vegetariana<br>
            </div>

            <label for="ingredientesveg">Ingredientes Veg</label>
            <select id="igredienteveg" name="ingredientesveg[]" multiple>
                <option value="pe">Pepino-1€</option>
                <option value="ca">Calabacín-1.5€</option>
                <option value="pive">Pimiento Verde-1.25€</option>
                <option value="piro">Pimineto Rojo-1.75€</option>
                <option value="to">Tomate-1.5€</option>
                <option value="ac">Aceitunas-3€</option>
                <option value="ce">Cebolla-1€</option>
            </select>

            <label for="igredientesnoveg">Igredientes No Veg</label>
            <select name="igredientesnoveg[]" id="igredientesnoveg" multiple>
                <option value="at">Atún-2€</option>
                <option value="capi">Carne picada-2.5€</option>
                <option value="pe">Peperoni-1.75€</option>
                <option value="mo">Morcilla-2.25€</option>
                <option value="an">Anchoas-1.5€</option>
                <option value="sa">Salmón-3€</option>
                <option value="ga">Gambas-4€</option>
                <option value="la">Langostinos-4€</option>
                <option value="me">Mejillones-2€</option>
            </select>

            <label for="extraqueso">Extra de queso</label>
            <input type="checkbox" name="extraqueso" id="extraqueso">

            <label for="bordesrrellenos">Bordes rellenos</label>
            <input type="checkbox" name="bordesrrellenos" id="bordesrrellenos">

            <label for="numpizza">Nº de pizzas</label>
            <input name="numpizza" id="numpizza" type="text">
        </fieldset>
        <input name="enviar" type="submit" value="enviar">
    </form>

<?php
}

$opciones_saneammiento = [
    
    'nombre'            =>  FILTER_SANITIZE_FULL_SPECIAL_CHARS,
    'direccion'         =>  FILTER_SANITIZE_FULL_SPECIAL_CHARS,
    'telefono'          =>  FILTER_SANITIZE_NUMBER_INT,
    'tipo'              =>  FILTER_SANITIZE_FULL_SPECIAL_CHARS,
    'ingredientesveg'   =>  [
                            'filter'    =>  FILTER_SANITIZE_FULL_SPECIAL_CHARS,
                            'flags'     =>  FILTER_REQUIRE_ARRAY
                            ],
    'ingredientesnoveg' =>  [
                            'filter'    =>  FILTER_SANITIZE_FULL_SPECIAL_CHARS,
                            'flags'     =>  FILTER_REQUIRE_ARRAY
                            ],
    'extraqueso'        =>  FILTER_SANITIZE_FULL_SPECIAL_CHARS,
    'bordesrellenos'    =>  FILTER_SANITIZE_FULL_SPECIAL_CHARS,
    'numpizza'          =>  FILTER_SANITIZE_NUMBER_INT

];

$datos_saneado = filter_input_array(INPUT_POST, $opciones_saneammiento);

$ingredientes_veg = [
    "pe"    =>  [
        'nombre'    =>      'Pepino',
        'precio'    =>      1
    ],

    "ca"    =>  [
        'nombre'    =>      'Calabacín',
        'precio'    =>      1.5
    ],

    "pive"  =>  [
        'nombre'    =>      'Pimiento Verde',
        'precio'    =>      1.25
    ],

    "piro"  =>  [
        'nombre'    =>      'Pimineto Rojo',
        'precio'    =>      1.75
    ],

    "to"    =>  [
        'nombre'    =>      "Tomate",
        'precio'    =>      1.5
    ],

    "ac"    =>  [
        'nombre'    =>      'Aceitunas',
        'precio'    =>      3
    ],

    "ce"    =>  [
        'nombre'    =>      'Cebolla',
        'precio'    =>      1
    ]
];



$ingredientes_no_veg = [
    "at"        =>  [
        'nombre'    =>      'Atún',
        'precio'    =>      2
    ],

    "capi"      =>  [
        'nombre'    =>      'Carne picada',
        'precio'    =>      2.5
    ],

    "pe"        =>  [
        'nombre'    =>      'Peperoni',
        'precio'    =>      1.75
    ],

    "mo"        =>  [
        'nombre'    =>      "Morcilla",
        'precio'    =>      2.25
    ],

    "an"        =>  [
        'nombre'    =>      "Anchoas",
        'precio'    =>      1.5
    ],

    "sa"        =>  [
        "nombre"    =>      "Salmón",
        'precio'    =>      3
    ],

    "ga"        =>  [
        "nombre"    =>      "Gambas",
        'precio'    =>      4
    ],

    "la"        =>  [
        "nombre"    =>      "Langostinos",
        'precio'    =>      4
    ],

    "me"        =>  [
        "nombre"    =>      "Mejillones",
        'precio'    =>      2
    ]
];



$num_pizza = filter_input(INPUT_POST, 'numpizza', FILTER_VALIDATE_INT,
                                                                    array(
                                                                        'options'   =>  ['min_range' => 1, 'max_range' => 5],
                                                                        'flags'     =>  FILTER_NULL_ON_FAILURE
                                                                    ));
$num_telf_regex = '/^[6-9]\d{8}$/';
$num_telf = preg_match($num_telf_regex, $datos_saneado['telefono']);


$todo_ok = true;

if( !$num_pizza ){
    $todo_ok = false;
}
elseif( !$num_telf ){
    $todo_ok = false;
}
elseif( $datos_saneado['extraqueso'] != 'on' || $datos_saneado['extraqueso'] != 'off' ){
    $todo_ok = false;
}
elseif( $datos_saneado['bordesrrellenos'] != 'on' || $datos_saneado['bordesrrellenos'] != 'off' ){
    $todo_ok = false;
}
elseif( $datos_saneado['tipo'] != 'veg' || $datos_saneado['tipo'] != 'noveg' ){
    $todo_ok = false;
};

    
$tipo_pizza = $datos_saneado['tipo'];

if( $tipo_pizza == 'veg'){
    
    foreach( $datos_saneado['igredientesveg'] as $igrediente ){
        if( !key_exists($igrediente, $ingredientesx_veg) ){
            $todo_ok = false;
        }
    }
    $igredientes = $datos_saneado['igredientesveg'];
}
else{

    foreach( $datos_saneado['igredientesnoveg'] as $igrediente ){
        if( !key_exists($igrediente, $ingredientes_no_veg) ){
            $todo_ok = false;
        }
    }

}

if( !$todo_ok ){
    echo "<h2>Alguno de los datos introducidos no está bien, vuelve rellenar el formulario.</h2>";
    exit(1);
}

$bordes_rellenos = $datos_saneado['bordesrrellenos'] == 'on' ? true : false;
$extra_queso = $datos_saneado['extraqueso'] == 'on' ? true : false;

$PRECIO_BASE = 5;
$PRECIO_VEG = 2;
$PRECIO_NO_VEG = 3;

$precio_total = $PRECIO_BASE;

if( $tipo_pizza == 'veg'){
    $ingredientes = $datos_saneado['igredientesveg'];
    $listado_ingredientes_seleccionado = $ingredientes_veg;
    $precio_total += $PRECIO_VEG;
}
else{
    $ingredientes = $datos_saneado['igredientesnoveg'];
    $listado_ingredientes_seleccionado = $ingredientes_no_veg;
    $precio_total += $PRECIO_NO_VEG;

}

?>

<table>
    <tbody>
        <thead>
            <td>Ingredientes</td>
            <td>Precio</td>
        </thead>
        <tr>
            <td>Base de tomtate y queso</td>
            <td><?=$PRECIO_BASE?></td>
        </tr>
        <tr>
            <td>Pizza tipo <?=$tipo_pizza?></td>
            <td><?=$tipo_pizza == 'veg' ? $PRECIO_VEG : $PRECIO_NO_VEG?></td>
        </tr>
    


<?php



    
    
foreach($ingredientes as $igrediente){
        echo "<tr>";
        echo "<td>$ingrediente</td>";
        echo "<td>{$listado_ingredientes_seleccionado[$ingrediente]['precio']}</td>";
        echo "</tr>";
        $precio_total += $listado_ingredientes_seleccionado[$ingrediente]['precio'];
}


?>
        <tr>
            <td style="font-weight: bold;">Precio total</td>
            <td style="font-weight: bold;"><?=$precio_total?></td>
        </tr>
    </tbody>
</table>

<?php

fin_html();

?>