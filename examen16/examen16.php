<?php
// Salvador Martínez Jiménez

require_once($_SERVER['DOCUMENT_ROOT'] . '/examen16/includes/funciones.php');

inicio_html('Venta de un inmueble', ['estilos/formulario.css', 'estilos/general.css', 'estilos/tablas.css']);

if( $_SERVER['REQUEST_METHOD'] == 'POST'){

    $SERVICIO_CLAVE_VALOR = [
        'ed'        =>  [
                        'nombre'    =>  'Elaborar documentación',
                        'precio'    =>  200
        ],
        'alf'       =>  [
                        'nombre'    =>  'Asesoramiento legal y fiscal',
                        'precio'    =>  150
        ],
        'mv'        =>  ['nombre'    =>  'Marketing de venta',
                        'precio'    =>  300
        ]
    ];

    $opciones_saneamento = [
        'email'         =>  FILTER_SANITIZE_EMAIL,
        'tipo_inmueble' =>  FILTER_SANITIZE_SPECIAL_CHARS,
        'servicios'     =>  [
                            'filter'    =>  FILTER_SANITIZE_SPECIAL_CHARS,
                            'flags'     =>  FILTER_REQUIRE_ARRAY
        ],
        'duracion'      =>  [
                            'filter'    =>  FILTER_SANITIZE_NUMBER_FLOAT,
                            'flags'     =>  FILTER_FLAG_ALLOW_FRACTION | FILTER_NULL_ON_FAILURE
        ]
    ];

    $datos_saneados = filter_input_array(INPUT_POST, $opciones_saneamento);


    $email = filter_var($datos_saneados['email'], FILTER_VALIDATE_EMAIL, FILTER_NULL_ON_FAILURE);

    if( !isset($email) ){
        echo "<h2>Error, el email no tenía formato adecuado</h2>";
        exit(1);
    }

    if( !( $datos_saneados['tipo_inmueble'] == 'casa' || $datos_saneados['tipo_inmueble'] == 'piso') ){
        echo "<h2>Error, el tipo de inmueble solo puede ser piso o casa</h2>";
        exit(2);
    }
    $tipo_inmueble = $datos_saneados['tipo_inmueble'];

    foreach( $datos_saneados['servicios'] as $servicio ){
        if( !key_exists($servicio, $SERVICIO_CLAVE_VALOR) ){
            echo "<h2>Error, el $servicio no está incluido en la lista</h2>";
            exit(3);
        }
    }
    $servicios = $datos_saneados['servicios']; 

    $duracion = filter_var($datos_saneados['duracion'], FILTER_VALIDATE_FLOAT, array( 'options' =>[ 'min_range' => 1, 'max_range' => 3], 'flags' => FILTER_NULL_ON_FAILURE));

    if( !isset($duracion) ){
        echo "<h2>Error, la duración no es correcta</h2>";
        exit(4);
    }

    if( $tipo_inmueble == 'piso'){

        if($_FILES['certificado']['error'] == UPLOAD_ERR_OK){
            $tipo_mime = $_FILES['certificado']['type'];
            $tipo_mime_aceptados = ['application/pdf'];
            $tipo_mime_contenido = mime_content_type($_FILES['certificado']['tmp_name']);
    
            if( $tipo_mime == $tipo_mime_contenido && in_array($tipo_mime_contenido, $tipo_mime_aceptados) ){
                $path = $_SERVER['DOCUMENT_ROOT'] . '/examen16/certificados/';
                if( !is_dir($path) && !file_exists($path) ){
                    
                    if( mkdir($path, 0755) ){
                        $nombre_archivo = $path . $email . '.pdf';
                    }
                }
    
                if( !move_uploaded_file($_FILES['certificado']['tmp_name'], $nombre_archivo) ){
                    $subida_archivo = false;
                }
                else{
                    $subida_archivo = true;
                }
            }
        }
    }

    ob_start();

?>

<table>
    <thead>
        <tr>
            <td>Campo</td>
            <td>Valor introducido</td>
        </tr>
    </thead>

    <tbody>
        <tr>
            <td>Email</td>
            <td><?=$email?></td>
        </tr>
        
        <tr>
            <td>tipo_inmueble</td>
            <td><?= $tipo_inmueble == 'piso' ? 'Piso' : 'Casa' ?></td>
        </tr>

        
<?php
        foreach( $servicios as $servicio){
            echo "<tr>";
            echo "<td>Servicio</td>";
            echo "<td>{$SERVICIO_CLAVE_VALOR[$servicio]['nombre']}</td>";
            echo "</tr>";
        }
?>
        <tr>
            <td>Duración del contrato</td>
            <td><?=$duracion?> años</td>
        </tr>
    </tbody>
</table>

<?php

$precio_total = 0;

foreach( $servicios as $servicio ){
    $precio_total += $SERVICIO_CLAVE_VALOR[$servicio]['precio'];
}

$DURACION_POR_AÑO = 20;
$precio_duracion_contrato = round($duracion * $DURACION_POR_AÑO, 2);

$precio_total += $precio_duracion_contrato;

?>
<table>
    <thead>
        <tr>
            <td>Gasto</td>
            <td>Precio</td>
        </tr>
    </thead>
    <tbody>
<?php

    foreach( $servicios as $servicio){
            echo "<tr>";
            echo "<td>{$SERVICIO_CLAVE_VALOR[$servicio]['nombre']}</td>";
            echo "<td>{$SERVICIO_CLAVE_VALOR[$servicio]['precio']}</td>";
            echo "</tr>";
        }
    echo "<tr>";
    echo "<td>Precio por duración de contrato (20$/año)</td>";
    echo "<td>$precio_duracion_contrato</td>";
    echo "</tr>";

    if( $tipo_inmueble == 'piso' ){
        $suplemento_piso = round( $precio_total * 0.1, 2 );
        $precio_total += $suplemento_piso;

        echo "<tr>";
        echo "<td>Precio suplemento piso (10%)</td>";
        echo "<td>$suplemento_piso</td>";
        echo "</tr>";
    }

    echo "<tr>";
    echo "<td>Precio total</td>";
    echo "<td>$precio_total</td>";
    echo "</tr>";
    

?>
    </tbody>

<?php
    
    if( isset($subida_archivo) && $subida_archivo ){
        echo "<p>Se subió con exito el archivo</p>";
        echo "<p>Nombre de archivo del usuario: {$_FILES['certificado']['name']}</p>";
        echo "<p>Nombre de archivo guardado: " . $email . ".pdf </p>";
        echo "<p>Tamaño del archivo: {$_FILES['certificado']['size']} bytes</p>";
    }
    elseif( isset($subida_archivo) && !$subida_archivo ){
        echo "<p>No se subió el archivo con exito</p>";
    }
    else{
        echo "<p>No se subió archivo</p>";
    }

    ob_flush();

}
elseif( $_SERVER['REQUEST_METHOD'] == 'GET'){ ?>
    <form action="<?=$_SERVER['PHP_SELF']?>" method="post" enctype="multipart/form-data">
            <fieldset>
                <legend>Presupuesto</legend>
    
                <label for="email">Email</label>
                <input type="email" name="email" id="email" required>
    
                <label for="tipo_inmueble">Tipo de inmueble</label>
                <div>
                <input type="radio" value="piso" name="tipo_inmueble" required>Piso<br>
                <input type="radio" value="casa" name="tipo_inmueble">Casa
                </div>
    
                <label for="servicios">Servicios a contratar</label>
                <select name="servicios[]" id="servicios" multiple required>
                    <option value="ed">Elaborar documentación(200$)</option>
                    <option value="alf">Asesoramiento legal y fiscal(150$)</option>
                    <option value="mv">Marketing de venta(300$)</option>
                </select>
    
                <label for="duracion">Duración del contrato</label>
                <input type="text" name="duracion" id="duracion" required>
    
                <label for="certificado">Certificado eficiencia energética</label>
                <input type="file" name="certificado">
            </fieldset>
            <input type="submit" name="operacion"?>
        </form>
    
    <?php
    }

fin_html();

?>