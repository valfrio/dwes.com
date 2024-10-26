<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/includes/inicio_y_fin.php');

inicio_html('Ejercicio 3', ['/styles/formulario.css', '/styles/general.css']);

if( $_SERVER['REQUEST_METHOD'] == 'GET'){?>

    <form action="<?=$_SERVER['PHP_SELF']?>" method="post">
        <fieldset>
            <legend>Pizzas</legend>
            
            <label for="nombre">Nombre</label>
            <input id="nombre" name="nombre" type="text" size="30">

            <label for="direccion">Dirección</label>
            <input id="direccion" name="direccion" type="text" size="50">

            <label for="telefono">Teléfono</label>
            <input type="number" name="telefono" id="telefono">

            <label for="tipo">Tipo</label>
            <div>
                <input id="vegetariana" name="tipo" type="radio" value="veg">Vegetariana<br>
                <input id="novegetariana" name="tipo" type="radio" value="noveg">No Vegetariana<br>
            </div>

            <label for="ingredientesveg">Ingredientes Veg</label>
            <select id="igredienteveg" name="ingredientesveg[]" multiple>
                <option value="pe">Pepino</option>
                <option value="ca">Calabacín</option>
                <option value="pive">Pimiento Verde</option>
                <option value="piro">Pimineto Rojo</option>
                <option value="to">Tomate</option>
                <option value="ac">Aceitunas</option>
                <option value="ce">Cebolla</option>
            </select>

            <label for="igredientesnoveg">Igredientes No Veg</label>
            <select name="igredientesnoveg[]" id="igredientesnoveg" multiple>
                <option value="at">Atún</option>
                <option value="capi">Carne picada</option>
                <option value="pe">Peperoni</option>
                <option value="mo">Morcilla</option>
                <option value="an">Anchoas</option>
                <option value="sa">Salmón</option>
                <option value="ga">Gambas</option>
                <option value="la">Langostinos</option>
                <option value="me">Mejillones</option>
            </select>

            <label for="extraqueso">Extra de queso</label>
            <input type="checkbox" name="extraqueso" id="extraqueso">

            <label for="bordesrrellenos">Bordes rellenos</label>
            <input type="checkbox" name="bordesrrellenos" id="bordesrrellenos">
        </fieldset>
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
    'bordesrellenos'    =>  FILTER_SANITIZE_FULL_SPECIAL_CHARS

];


fin_html();

?>