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
    <h1>Variables: 03variables.php</h1>

<?php

    // Las varaibles se definen con $identificador
    $nombre_variable = 'Valor de la variable';

    // Variables que no se han definido
    $resultado = $numero + 25;
    echo "El valor de numero es $numero y el resultado es $resultado<br>";

    $resultado = $sin_definir + 5.5;
    echo "El valor sin definir es $sin_definir y el resultado es $resultado<br>";

    // Si la variable está en un contexto lógico su valor 
    // lógico asume por defecto False

?>

<h2>Analisis de variables</h2>
<h3>Analisis simple</h3>

<?php
    // Consiste enintroducir una variable en una cadena con " o heredoc
    // para incrustar su valor dentro de la cadena
    echo "El resultado es $resultado<br>";

?>

<?php
    // EN algunas situaciones nos encontramos ambiguedad en
    // una variable interpolada. Para ello usamos las llaves
    // y se elimina la ambigüedad.
    $calle = "Trafalgar Sq";
    $numero = "5";
    $poblacion = "London";
    $distrito = "50000";

    echo "Mi direccion en londres es {$numero}th, $calle<br>$poblacion<br>$distrito<br>";
?>

<h2>Funciones para variables</h2>
<?php
    // funcion gettype()
    echo "El tipo de datos de $resultado es " . gettype($resultado). "<br>";
    echo "El tipo de datos de uan expresión es " . gettype($numero) . "<br>";

    // FUnción empty()
    /* Comprueba si una variable si tiene un valor
        - Si es entero devuelve True si es 0, Flase en caso contrario.
        - Si es float devuelve True si es 0.0, False en caso contrario.
        - Si es cadena devuelve True si es "", False en caso contrario.
        - Devuelve True si es NULL o False
    */

    if (empty($numero) ) echo "\$numero tiene el valor $numero<br>";
    else echo "\$numero tiene un valor no vacio<br>";

    $numero = NULL;
    if ( empty($numero) ) $numero = 18;
    else echo "\$numero ya tiene un valor asignado y es $numero<br>";

    // Función isset()
    // Devuelve True si la variable está definida y no es NULL
    if (isset($nueva_variable)) echo "La variable está definida
                                      y su valor es $nueva_variable<br>";
    else "La variable no está definida<br>";

    $variable_null = NULL;
    if( isset($variable_null) ) echo "La variable está definida<br>";
    else echo "La variable $variable_null no está definida o tiene valor NULL";

   /* Funciones que comprueban los tipos de datos

      - is_bool() -> True si la expresión es booleana
      - is_int() -> True si la expresión es integer
      - is_float() -> True si la expresión es float
      - is_string() -> True si la expresión es una cadena
      - is_array() -> True si la expresión es un array

      En cualquier otro caso devuelve False.
    */

    $edad = 25;
    $mayor_edad = $edad > 18;
    $numero_e = 2.71;
    $mensaje = "El número e es " . $numero_e . "<br>";

    if ( is_int($edad) ) echo "\$edad es un entero <br>";
    
    if ( is_bool($mayor_edad) ) echo "\$mayor_edad es booleana<br>";
    
    if ( is_float($numero_e) ) echo "\$numero_e es float <br>";
    
    if ( is_string($mensaje) ) echo "\$mensaje es una cadena<br>";

?>

<h2>Constantes</h2>
<p>Una constante es un valor con nombre que no puede cambiar de valor en el programa.
    Se le asigna un valor en al declaracion y permanece invariable. Se definen de dos formas:<br>
    - Mediante la función define()<br>
    - Mediante la palabra clave const
</p>

<?php
    define("PI", 3.14159);
    define("Precio_base", 1500);
    define("Directorio_subidas", "/uploads/archivos");


    echo "El número PI es " . PI . "<br>";
    $area_circulo = PI * PI * 5;
    echo "EL area del circulo de radio 5 es $area_circulo<br>";

    $path_archivo = Directorio_subidas . "/archivo.pdf";
    echo "El archivo subido es $path_archivo<br>";

    $precio_rebajado = Precio_base -Precio_base * 0.25;
    echo "El precio rebajado es $precio_rebajado<br>";

    const SESION_USUARIO = 600;
    echo "La sesion de usuario finaliza en " . SESION_USUARIO . " segundos<br>";

    // Constantes predefinidas por PHP
    echo "El script es " . __FILE__ . " y la linea es " . __LINE__ . SALTO;
?>
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

    $numero += 5; // equivale a $numero = $numero + 5;
    echo "El numero es $numero<br>";

    $numero += 5; // equivale a $numero = $numero + 5;
    echo "El numero es $numero<br>";

?>

</html>