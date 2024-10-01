<?php
define("SALTO", "<br>");
?>
<!DOCTYPE html>
<html lant='es'>
    <head>
        <meta charset="utf-8"/>
        <meta name="viewport" content="width=device-width;initial-scale=1"/>
        <title>Primer script PHP</title>
    </head>
    <body>
    <h1>Operadores y expresiones: 04_operadores_expresiones.php</h1>
    <h2>Sentencias</h2>
    <p>La sentencias simples acaban en ;, pudiendo haber más de una 
        en la misma línea
    </p>

<?php
    $numero = 3; echo "El numero es $numero<br>"; $numero += 3; print "Ahora es $numero<br>"
?>

    <p>Un bloque de sentencias es un conjunto de sentencias encerrados entre llaves.
        No suelen ir solas, sino formar parte de una estrctura de control. Además, se
        pueden anidar.
    </p>

<?php
{
    $numero = 5;
    echo "El número es $numero<br>";
    $numero -= 2;
    echo "Ahora es $numero<br>";
    {
        $numero = 8;
        $numero *= 2;
        echo "El resultado es $numero<br>";
    }
}

?>

    <h2>Estructuras de control simples</h2>
<?php
    // if( expresion ) sentencia;
    $numero = 4;
    if( $numero >= 4) echo "El numero es mayor o igual a 4<br>";

    if( $numero === 4 and $numero % 2 == 0 ) 
        echo "El numero es mayor o igual a 4 y su resto al dividir por 2 es 0<br>";

?>
</body>

</html>