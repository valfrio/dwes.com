<?php

require_once($_SERVER['DOCUMENT_ROOT'] . "/includes/inicio_y_fin.php");

inicio_html('Ejercicio 2', ['/styles/formulario.css', '/styles/general.css']);

if( $_SERVER['REQUEST_METHOD'] == 'GET'){?>

    <form action="<?=$_SERVER['PHP_SELF']?>" method="post">
        <fieldset>
            <legend>Datos del libro</legend>

            <label for="isbn">Isbn</label>
            <input name="isbn" id="isbn" type="text" size="17">

            <label for="titulo">Título</label>
            <input name="titulo" id="titulo" type="text" size="30">

            <label for="autor">Autor</label>
            <select name="autor[]" id="autor" size="6" multiple>
                <option value="KF">Ken Follet</option>
                <option value="MH">Max Hastings</option>
                <option value="IA">Isaac Asimov</option>
                <option value="CS">Carl Sagan</option>
                <option value="SJ">Steve Jacobson</option>
                <option value="GM">George R.R. Martin</option>
            </select>

            <label for="genero">Género</label>
            <select name="genero[]" id="genero" multiple size="4">
                <option value="NH">Novela histórica</option>
                <option value="DC">Divulgación científica</option>
                <option value="B">Biografía</option>
                <option value="F">Fantasía</option>
            </select>
        </fieldset>
        <input name="enviar" type="submit" value="enviar">
    </form>


<?php
}
else{

    $libros = [
        '123-4-56789-012-3' => [
            'autor'     => 'Ken Follet',
            'titulo'    => 'Los pilares de la tierra',
            'genero'    => 'Novela histórica'
        ],

        '987-6-54321-098-7' => [
            'autor'     => 'Ken Follet',
            'titulo'    => 'La caída de los gigantes',
            'genero'    => 'Novela histórica'
        ],

        '345-1-91827-019-4' => [
            'autor'     => 'Max Hastings',
            'titulo'    => 'La guerra de Churchill',
            'genero'    => 'Biografía'
        ],

        '908-2-10928-374-5' => [
            'autor'     => 'Isaac Asimov',
            'titulo'    => 'Fundación',
            'genero'    => 'Fantasía'
        ],

        '657-4-39856-543-3' => [
            'autor'     => 'Isaac Asimov',
            'titulo'    => 'Yo, robot',
            'genero'    => 'Fantasía'
        ],

        '576-4-23442-998-5' => [
            'autor'     => 'Carl Sagan',
            'titulo'    => 'Cosmos',
            'genero'    => 'Divulgación científica'
        ],

        '398-4-92438-323-2' => [
            'autor'     => 'Carl Sagan',
            'titulo'    => 'La diversidad de la ciencia',
            'genero'    => 'Divulgación científica'
        ],

        '984-5-39874-209-4' => [
            'autor'     => 'Steve Jacobson',
            'titulo'    => 'Jobs',
            'genero'    => 'Biografía'
        ],

        '564-7-54937-300-6' => [
            'autor'     => 'George R.R. Martin',
            'titulo'    => 'Juego de tronos',
            'genero'    => 'Fantasía'
        ],

        '677-2-10293-833-8' => [
            'autor'     => 'George R.R. Martin',
            'titulo'    => 'Sueño de primavera',
            'genero'    => 'Fantasía'
        ]
    ];
    $autores_validos = ['GM', 'SJ', 'CS', 'IA', 'KF', 'MH'];
    $titulos_validos = ['Los pilares de la tierra', 'La caída de los gigantes', 'La guerra de Churchill', 'Fundación', 'Yo, robot', 'Cosmos',
                        'La diversidad de la ciencia', 'Jobs', 'Juego de tronos', 'Sueño de primavera'];
    $generos_validos = ['NH', "DC", "B" , "F"];

    function isbn_check($isbn){
        $isbn_format = '/^\d{3}-\d-\d{5}-\d{3}-\d$/';

        $is_correct = false;
        if( preg_match($isbn_format, $isbn) ){
            $is_correct = true;
        }

        return $is_correct;
    }

?>

    <table border="1">
        <th>
                <td>ISBN</td>
                <td>Autor</td>
                <td>Título</td>
                <td>Género</td>
        </th>
        <tbody>

<?php

    $opciones_filtrado = [
        'isbn'              =>  FILTER_SANITIZE_SPECIAL_CHARS,
        'titulo'            =>  FILTER_SANITIZE_FULL_SPECIAL_CHARS,
        'autor'             =>  [
                                 'filter'   =>  FILTER_SANITIZE_FULL_SPECIAL_CHARS,
                                 'flags'    =>  FILTER_REQUIRE_ARRAY | FILTER_NULL_ON_FAILURE
                                ],
        'genero'            =>  [
                                 'filter'   =>  FILTER_SANITIZE_FULL_SPECIAL_CHARS,
                                 'flags'    =>  FILTER_REQUIRE_ARRAY | FILTER_NULL_ON_FAILURE
                                ]
        ];

    
    $datos_saneados = filter_input_array(INPUT_POST, $opciones_filtrado);

    if( isbn_check($datos_saneados['isbn']) ){
        $isbn_validado = $datos_saneados['isbn'];
    }
    
    if( isset($datos_saneados['titulo']) ){
        if( in_array($datos_saneados['titulo'], $titulos_validos))
            $titulo_validado = $datos_saneados['titulo'];
    }

    $autores_validados = [];
    if( isset($datos_saneados['autor']) ){
        foreach($datos_saneados['autor'] as $autor){
            if( in_array($autor, $autores_validos) ){
                $autores_validados[] = $autor;
        }
    }
    echo implode(' ',$autores_validados);
    
    $generos_validados = [];
    if( isset($datos_saneados['genero']) ){
        foreach($datos_saneados['genero'] as $genero){
            if( in_array($genero, $generos_validos) ){
                $generos_validados[] = $genero;
        }
    }

    $isbn_finales = [];
    if( isset($isbn_validado) ){
        $isbn_finales[] = $isbn_validado;
    }

    foreach($libros as $isbn){
        if( isset($titulo_validado) && $libros[$isbn]['titulo'] == $titulo_validado && !in_array($libros[$isbn], $isbn_finales)){
            $isbn_finales[] = $libros[$isbn]; 
        }
    }

    if( isset($generos_validados) ){
        foreach($generos_validados as $genero){  
            foreach($libros as $isbn){
                if( $libros[$isbn]['genero'] == $genero && !in_array($libros[$isbn], $isbn_finales)){
                    $isbn_finales[] = $libros[$isbn]; 
                }
            }
        }
    }

    if( isset($autores_validados) ){
        foreach($autores_validados as $autor){  
            foreach($libros as $isbn){
                if( $libros[$isbn]['autor'] == $autor && !in_array($libros[$isbn], $isbn_finales)){
                    $isbn_finales[] = $libros[$isbn]; 
                }
            }
        }
    }

    foreach($isbn_finales as $isbn){
?>


        <tr>
            <td><?=$isbn?></td>
            <td><?=$libros[$isbn]['autor']?></td>
            <td><?=$libros[$isbn]['titulo']?></td>
            <td><?=$libros[$isbn]['genero']?></td>
        </tr>

<?php
    }
        

    }  

    echo "</tbody>";
    echo "</table>";

    }
}
fin_html();
?>