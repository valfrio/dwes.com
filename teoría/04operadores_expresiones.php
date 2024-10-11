<?php
define("SALTO", "<br>");
?>
<?php
define("PI", "3.14159");
?>
<!DOCTYPE html>
<html lant='es'>
    <head>
        <meta charset="utf-8"/>
        <meta name="viewport" content="width=device-width;initial-scale=1"/>
        <title>Primer script PHP</title>
    </head>
    <h1>Operadores y expresiones: 04_operadores_expresiones.php</h1>

<h2>Expresiones, operadores y operandos</h2>
<p>Una expresión es una combinación de operandos y operadores que
    arroja un resultado. Tiene tipo de datos de sus operandos
    y de la operacion realizada<br>
    Un operador es un simbolo formado por uno, dos o tres caracteres que denota
    una operacion<br>
    Los operadores pueden ser:<br>
    - Unarios. SOlo necesitan un operando.
    - Binarios. Utilizan dos operandos.
    - Ternarios. Utilizan tres operandos.
    Un operando es una expresion en si misma, siendo la mas simple
    un literal o una variable, pero tambien puede ser un valor devuleto por una funcion o 
    el resultado de otra expresion<br>
</p>

<h3>Operadores aritmeticos</h3>
<?php
    /* + Suma
       - Resta
       * Multiplicacion
       / Division
       % Módulo
       ** Exponenciacion

       Unarios
       + Conversión a entero
       - El opuesto
    */

    $numero1 = 15;
    $numero2 = 18;
    $suma = $numero1 + 10;
    $resta = 25 - $numero2;
    $opuesto = -$numero1;
    $multiplicacion = $numero1 * 3;
    $division = $numero2 / 3;
    $modulo = $numero1 % 4;
    $potencia = $numero1 ** 2;
    echo "$numero1 y $numero2" . SALTO;
    echo "$suma $resta $opuesto $multiplicacion $division $modulo $potencia" . SALTO; 

    $numero3 = "35";
    $numero4 = +$numero3;
    echo "El \$numero4 es $numero4 y su tipo es " . gettype($numero4) . SALTO;

    // No lo hace con float
    $numero5 = PI;
    $numero6 = +$numero5;
    echo "El \$numero6 es $numero6 y su tipo es " . gettype($numero6) . SALTO;

    $numero1 = 35;
    $numero2 = 15;
    $resultado_entero = (int)($numero1 / $numero2);
    echo "EL resultado entero es $resultado_entero" . SALTO;

    
    ?>

    <h2>Asignacion aumentada</h2>
<?php
    /* Operadores de asignacion aumentada
    ++ Incremento
    -- Decrementos
    +=
    -=
    *=
    /=
    %=
    */

    $numero  = 4;
    $numero++;  // Equivalente a $numero = $numero + 1, primero se utiliza el valor actual y despues se aumenta
    echo "Antes el numero era 4 ahora es $numero" . SALTO;
    ++$numero; // Euivale a $numero = $numero + 1, primero se aumenta y despues se utiliza
    echo "Antes el numero era 5 ahora es $numero" . SALTO;

    $numero = 10;
    $resultado = $numero++ * 2;  // Equivale a $resultado = $numero * 2; $numero = $numero + 1;
    echo "El resultado es $resultado y el numero es $numero<br>";
    
    $numero = 10;
    $resultado = ++$numero * 2;  // Equivale a $resultado = $numero + 1; $numero = $numero * 2;
    echo "El resultado es $resultado y el numero es $numero<br>";

    $numero += 5; // equivale a $numero = $numero + 5;
    echo "El numero es $numero<br>";

    $numero -= 3; // equivale a $numero = $numero - 3;
    echo "El numero es $numero<br>";

    $numero *= 3; // equivale a $numero = $numero * 3;
    echo "El numero es $numero<br>";

    $numero %= 7; // equivale a $numero = $numero % 7;
    echo "El numero es $numero<br>";

    $numero /= 5; // equivale a $numero = $numero / 5;
    echo "El numero es $numero<br>";
?>

    <h2>Operadores relacionales</h2>
<?php

    /*
        == Igual a
        === Idéntico a
        != Distinto
        !== Distinto valor o distinto tipo
        > Mayor que
        < Menor que
        >= Mayor o igual
        <= Menor o igual
        <=> Nave espacial
    */

    $n1 = 5;
    $cadena = "5";
    $n2 = 8;

    $resultado = $n1 == $n2;
    echo "Es n1 igual a que n2: " . (int)$resultado . SALTO;

    $resultado = $n1 == $cadena;  // Dado que lso operadores relacionales tienen que comparar cosas del mismo tipo. POr ello convierte implicitamente a uno de los dos, al tipo del primo que aparezca en la expresion
    echo "Es n1 igual a que cadena: " . (int)$resultado . SALTO;

    // Operador ===. Es True su los valores de los operandos son iguales y del mismo tipo
    $resultado = $n1 === $cadena;
    echo "Es n1 igual a que cadena: " . (int)$resultado . SALTO;


    // Operador !== . Es True si son distintos o de diferente tipo, falso en caso contrario
    $resultado = $n1 != $cadena;
    echo "Es n1 distinto de cadena: " .  (int)$resultado . SALTO;

    $resultado = $n1 !== $cadena;
    echo "Es n1 distinto de cadena: " .  (int)$resultado . SALTO;

    // Nave espacial
    // Si n1 es mayor que n2 -> 1
    // Si n1 es igual que n2 -> 0
    // si n1 es menor que n2 -> -1
    // Se emplea para evitar esto:
    // if( $n1 < $n2 ) {
    // 
    // elsif ($n1 == $n2)
    // 
    // else {
    //
    // }

    $resultado = $n1 <=> $n2;
    echo "Es n1 menor, igual o mayor que n2: $resultado<br>";

    $nombre1 = "abcZacarias";
    $nombre2 = "abcadela";
    $resultado = $nombre1 > $nombre2;  // Se comparan por orden de ASCII caracter a caracter
    echo "El resultado es " . (int)$resultado . "<br>";


    $nombre1 = "MariO";
    $nombre2 = "Maria";
    $resultado = $nombre1 < $nombre2;
    echo "El resultado es " . (int)$resultado . "<br>";

    $nombre1 = "maria";
    $nombre2 = "Maria";
    $resultado = $nombre1 === strtolower($nombre2);
    echo "El resultado es " . (int)$resultado . "<br>";
?>

    <h2>Operadores lógicos</h2>

<?php
    // AND      And lógico o conjunción lógica
    // OR      Or lógico o disyunción lógica
    // XOR     Or exclusico
    // !       not 
    // &&      And lógico con mayor precedencia
    // ||      Or lógico con mayor precedencia

    $n1 = 9;
    $n2 = 5;
    $n3 = 10;
    $resultado = $n1 == $n2 OR $n2 > $n3;
    $resultado = $n1 == $n2 AND $n2 < $n3;

    echo "El resultado es: ". (int)$resultado . "<br>";

    $resultado1 = $n1 == 9 OR $n2 < $n1 AND $n3 > 10;
    echo "El resultado es: " . (int)$resultado1 . "<br>";
    
    $resultado1 = $n1 == 9 OR $n2 < $n1;
    $resultado = $resultado1 AND $n3 > 10;
    $resultado = ($n1 == 9 OR $n2 < $n1) ? "True": "False";
    $resultado = ($resultado1 AND $n3 > 10) ? "True": "False";

    echo "El resultado es: " . (int)$resultado . "<br>";

    $n1 = 9;
    $n2 = 5;
    $n3 = 10;
    $resultado = $n1 == 9 || $n2 < $n1 AND $n3 > 10;
    echo "El resultado es: " . (int)$resultado . "<br>";

    $resultado = $n1 + 5 / $n3 < $n1 ** 3 && $n3 / 5 + $n2 * 2 >= $n1 * $n2 /$n3 ||
            $n1 - 3 % 2 == $n3 - 7;

    echo "El resultado de la expresion grande es: " . (int)$resultado . "<br>";
 ?>

</html>