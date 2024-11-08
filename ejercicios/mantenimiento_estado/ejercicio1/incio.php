<?php

require_once($_SERVER['DOCUMENT_ROOT'] . '/includes/inicio_y_fin.php');

inicio_html('Ejercicio 1', ['/styles/formulario.css', '/styles/general.css']);

ob_start();
if( $_SERVER['REQUEST_METHOD'] == 'GET' ){?>

    <form action="/ejercicios/mantenimiento_estado/ejercicio1/lista_archivos.php" method="post">
            <legend>Elige la carpeta a listar</legend>
            <fieldset>
                <label for="ruta">Ruta de la carpeta a listar</label>
                <textarea name="ruta" ></textarea>
            </fieldset>
    </form>


<?php

}


fin_html()

?>