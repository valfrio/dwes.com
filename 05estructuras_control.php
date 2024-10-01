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

    <h2>Estructuras condicional simples</h2>
<?php
    // if( expresion ) sentencia;
    $numero = 4;
    if( $numero >= 4) echo "El numero es mayor o igual a 4<br>";

    if( $numero === 4 and $numero % 2 == 0 ) 
        echo "El numero es mayor o igual a 4 y su resto al dividir por 2 es 0<br>";
?>

<h2>Estructura condicional compuesta</h2>

<?php

    $n1 = 9;
    $n2 = 5;
    $n3 = 10;
    if ( ($n1 == 9 OR $n2 < $n1 ) AND $n3 > 10) {
        echo "El resultado global es True<br>";
    }
    else {
        echo "El resultado global es False <br>";
    }

    $tipo_carnet = "C1";
    $edad = 21;
    if( $edad > 18 and $tipo_carnet == "C1"){
        echo "Obtención del carnet de camión<br>";
        echo "Tienes $edad años y al superar los 21 puedes obtener el carnet $tipo_carnet<br>";
    }
    else {
        echo "No cumples los requisitos para el carnet $tipo_carnet<br>";
        echo "Comprueba que tienes más de 21 años<br>";
    }

    // Uso de código HTML en las estructuras de control
    if( $edad > 18 and $edad < 65) { ?>
        <h3>Servicios del gimnasio disponibles para la edad <?= $edad?>: </h3>
        <ul>
            <li>Spinning</li>
            <li>Boxeo</li>
            <li>Zumba</li>
        </ul>
<?php
    }
    else { ?>
        <h3>Servicios para jubilados o menores de 18 para la edad <?= $edad?></h3>
        <ul>
            <li>Taichi</li>
            <li>Pilates</li>
            <li>Yoga</li>
        </ul>
<?php
    }

    if ( $tipo_carnet == "C1" )
        echo <<<CARNET_C1
    <h2>Documentacion para obtener el carnet $tipo_carnet</h2>
    <ul>
        <li>Fotocopia del carnet</li>
        <li>Certificado de penales</li>
        <li>Carnet B2</li>
    </ul>
    CARNET_C1;
?>
    <h2>If else anidado</h2>
<?php
    $nota = 6.5;
    if ($nota >= 0 and $nota < 5)
        echo "Suspenso";
    else
        if( $nota < 6 )
            echo "Aprobado";
        else
            if( $nota < 7 )
                echo "Bien";
            else
                if( $nota < 9 )
                    echo "Notable";
                else
                    if( $nota <= 10 )
                        echo "Sobresaliente";
                    else
                        echo "El valor de la nota no es correcto";
?>


</body>

</html>