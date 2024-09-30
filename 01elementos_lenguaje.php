<!DOCTYPE html>
<html lant='es'>
    <head>
        <meta charset="utf-8"/>
        <meta name="viewport" content="width=device-width;initial-scale=1"/>
        <title>Primer script PHP</title>
    </head>

    <body>
        <h1>Elementos del lenguaje</h1>

<?php        
    echo "<p>La función echo emite el resultado de una expresión a la salida.
            Se puede usar como función o como construcción del lenguaje (sin paréntesis)
        </p>";
    echo "<p>Esto es un parrafo HTML enviado por echo</p>";

    
    $nombre = "Juan";
    echo "hola", $nombre, "como estas?<br>";
    // echo ("hola", $nombre, "como estas?"); no funciona porque recibe más de un argumento
    echo ("Hola, Juan, como estas?<br>");

    //Quiero un salto de línea al final de la línea
    echo "Hola, esta línea acaba en un salto \n";
    echo "Supuestamente esta línea es la siguiente a la anterior\n y esta va después"; // no furula porque mete un salto en el codigo fuente de html, que no se interpreta
    
    $nombre = "José";
    $apellidos = "Gómez";

    echo "<br>Mi nombre es $nombre y mi apellido es $apellidos<br>";

    echo "<br>Mi nombre es ".$nombre." y mi apellido es ".$apellidos."<br>"; // Aqui podríamos poner una expresión
    echo "<br>Uno más dos son ", 1 + 2, " y tiene que haber salido 3 <br>";

    // El operador . tiene precedencia sobre el operador +
    echo "<br>Uno más dos son". 1 + 2 ."y tiene que haber salido 3<br>";

    echo "<h4>Forma abreviada de echo</h4>";
    echo "<p>Cuando hay que enviar a la salida el resultado de una expresión pequeña
    disponemos de la forma abreviada de echo que permite intercalarse en el código HTML
    con menos esfuerzo</p>";

    $tiene_portatil = True;
?>
    <!-- La forma abreviada de echo va dentro del HTML -->
        <p>Mi nombre es <?= $nombre. " " .$apellidos. "3"?></p>

    <!-- Uso habitual en los valores por defecto en controles de formulario-->
     <input type="text" name="nombre" size="15" value="<?=$nombre?>"><br>
     <input type="checkbox" name="portatil" <?= $tiene_portatil ? 'checked': ''?>> tienes portatil?</input>

<?php
    echo "<br><input type='text' name='apellidos' size='50'>";
?>

        <h2>Entrada y salida</h2>
        <p>La entrada de datos en PHP es con un formulario html o con un enlace.</p>
        <p>
            Para la salida de datos se produce con la función echo, y su forma abreviada
            y la función print. Además la salida de datos con formato tenemos printf
        </p>

        <h3>Función echo</h3>

        <h4>Función printf</h4>
        <p>Funciona igual que echo</p>
<?php
    print "<p>Esto es una cadena \nque tiene mas de una línea\ny se envían a la salidas</p>";
    print "<p>Mi nombre es $nombre $apellidos<br></p>";
?>

<?php
    $pi = 3.14159;
    $radio = 3;
    $circunferencia = 2 * $pi * $radio;
    printf("<br>La circunferencia de radio %d es %5.2f", $radio, $circunferencia);
?>
    <h5>Tipos de datos</h5>
    </body>

</html>