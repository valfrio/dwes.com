<?php

require_once($_SERVER['DOCUMENT_ROOT'] . '/includes/inicio_y_fin.php');

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

    function isbn_check($isbn){
        $isbn_format = '^\d{3}-\d-\d{5}-\d{3}-\d$';

        $is_correct = false;
        if( preg_match($isbn_format, $isbn) ){
            $is_correct = true;
        }

        return $is_correct;
    }

?>

    <table border="1">
        <th>
            <tr>
                <td>ISBN</td>
                <td>Autor</td>
                <td>Título</td>
                <td>Género</td>
            </tr>
        </th>
        <tbody>

<?php


    if( isset($_POST['isbn']) && isbn_check($_POST['isbn']) ){
        $single_isbn = $_POST['isbn'];       
?>


        <tr>
            <td><?=$single_isbn?></td>
            <td><?=$libros[$single_isbn]['autor']?></td>
            <td><?=$libros[$single_isbn]['titulo']?></td>
            <td><?=$libros[$single_isbn]['genero']?></td>
        </tr>

<?php
    }

    echo "</tbody>";
    echo "</table>";

}

fin_html();
?>
