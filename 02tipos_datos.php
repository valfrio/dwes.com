<!DOCTYPE html>
<html lant='es'>
    <head>
        <meta charset="utf-8"/>
        <meta name="viewport" content="width=device-width;initial-scale=1"/>
        <title>Tipos de datos</title>
    </head>
    <body>
        <h1>Tipos de datos</h1>
        <p>Tipos de datos escalares (primigenios)</p>
        <ul>
            <li>Booleano</li>
            <li>Númerico entero</li>
            <li>En coma flotante</li>
            <li>Cadena de caracteres</li>
        </ul>
        <p>Datos compuestos</p>
        <ul>
            <li>Arrays</li>
            <li>Objetos</li>
            <li>Callable (todo lo que es llamable)</li>
            <li>Iterable</li>
        </ul>
        <p>Tipos especiales</p>
        <ul>
            <li>Resource</li>
            <li>NULL</li>
        </ul>

        <h2>Boolean</h2>
        <p>Inicialmente las constante True y False. Sim embargo, otros Tipo
            de datos tienen conversión implícita al tipo booleano
        </p>

        <ul>
            <li>Númerico entero: 0 y el -0 es False, cualquier otra cosa es TRUE</li>
            <li>Numérico en coma flotante es: 0.0 y -0.0 es False, otro valor es True</li>
            <li>Un array con 0 elementos es FAlse, con elementos es True</li>
            <li>El tipo especial NULL es False, otro valor distinto de NULL es True</li>
            <li>Una variable no definida es False</li>
        </ul>
<?php
    $valor_booleano = True;
    $edad = 20;
    $mayor_edad = $edad > 18;

    echo "Mayor de edad es booleano: " . is_bool($mayor_edad). "<br>";

    $dinero = 10;
    // equivale a $dinero != 0
    if( $dinero ) echo "Soy rico<br>";
    else echo "Estoy arruinado<br>";

    $mi_nombre = "";
    if( $mi_nombre ) echo "Me llamo $mi_nombre<br>";
    else echo "no tengo nombre<br>";
?>

<h2>Enteros</h2>
<p>Números enteros en PHP son de 32 bits (depende de la platforma)
    Pueden expresarse en diferentes notaciones
</p>

<?php
    $numero_entero = 1234;
    echo "EL número etnero es $numero_entero<br>";

    $numero_negativo = -1234;
    echo "Un número negativo con - delante: $numero_negativo<br>";

    // Si quiero expresar un número etneori en octal
    $numero_octal = 0123;
    echo "El número 0123 en octal es en decimal: $numero_octal<br>";

    // puedo mostrar un numero entero en octal. Internamente la variable se guarda en octal
    echo "EL número $numero_octal es en octal ". decoct($numero_octal). "<br>";


    // Número etnero en hexadecimal
    $numero_hex = 0x8AE;
    echo "El número 0x8AE en hexadecimal es en decimal: $numero_hex<br>";

    // Mostrar un número expresado en hexadecimal
    echo "El numero $numero_hex en hexadeciaml es ". dechex($numero_hex) . "<br>";

    // Un numero entero en binario
    $numero_binario = 0b110101101;
    echo "El numero 110101101 es en decimal: $numero_binario<br>";


    // Mostrar un numero expresado en binario
    echo "El numero $numero_binario en binario es ". decbin($numero_binario) . "<br>";
?>

<h2>Números en punto flotante</h2>
<p>El separador decimal es el puunto . y se pueden expresar números muy grandes
    muy pequeños mediante la notacion cientifica en base 10
</p>

<?php

    $pi = 3.14159;
    echo "El número PI es $pi<br>";
    echo "El pi con dos decimales es " . round($pi, 4) . "<br>";

    $inf_int = 7.9e13;
    echo "Información que circula en Internet en un día $inf_int <br>";


    $tamaño_virus = 0.2e-9;
    echo "Un virus tiene un tamaño de $tamaño_virus<br>"
?>

<h2>Cadenas de caracteres</h2>
<p>EL string o cadena es una serie de dcracteres donde cada caracter equivale a un byte. 
    Esto significa que php solo admite 256 caracteres u por ello no afrece
    soporte nativo a utf8. Un literal tipo string se expresa de 4 formas:
</p>
<ul>
    <il>Comillas simples</il>
    <il>Comillas dobles</il>
    <il>heredoc</il>
    <il>nowdoc</il>
</ul>

<?php
    //Una cadena encerrada entre comillas simples
    //Solo admite el cracter de escape \' \\

    echo 'Esto es una cadena sencilla<br>';
    echo 'Puedo poner una cadea
    en varias lineas
    porque la sentencia
    no acaba hasta
    el punto y coma<br>';

    // Nose reconocen caracteres de escape exepto ' y \
    echo 'El mejor pub de la ciudad es 0\'Donnel<br>';
    echo 'La raiz del disco duro es C:\<br>';
    echo 'La raiz del disco duro es C:\\<br>';

    // El salto de linea no se exprande
    echo 'Esta cadena tiene\nmas de una linea<br>';
    
    // NO interpola variables
    $mi_nombre = "Manueal";
    echo 'Hola, $mi_nombre, ¿como estas?<br>';
?>

<h3>COmillas dobles</h3>
<p>Esto es la forma habitual de xpresar cadenas de caracteres ya que expande
    los caracteres de escape y las variables
</p>

<?php

        $cadena = "Esto es uan cadena con comillas dobles";
        // las cadenas en php no son objetos, son tipos primigenos
        echo "Es una cadena un objeto? " . is_object($cadena) . "<br>";
        if( is_object($cadena) ) echo "Las cadenas en PHP son objetos<br>";
        else echo "Las cadenas en php no son objetos<br>";

        $con_secuencias_esc = "\t\tEl simbolo \$ se emplea para las variables\n
        y si lo quieres en una cadena hay que escaparlo con \\. Es mejor usar \"
        para delimitar las cadenas en lugar de '<br>";

        echo $con_secuencias_esc;
?>

<h3>Cadenas heredoc</h3>
<p>Es una cadena muy larga que comienza con <<< le sigue un identificador
   y justo despues un salto de linea. A continuacion se escribe la cadena
   con los saltos de linea que necesitemos, podemos inteporlar las variable
   t loner lso caracteres de escape. Para finalizar hay qie hacer un salto de linea y volver a poner el identificador. 
</p>

<?php
    $cadena_hd = <<<HD
    Esto es una cadena heredoc
    qie respuesta los saltos de linea
    , lepuedo poner variables $mi_nombre y
    ademas secuancias de escape. El
    identificador no necesitas \$ y tampoco usamos \"
    , simplemtene la escribimos y acabamos con un salto de linea
    mas el identificador
    HD;

    echo $cadena_hd;
?>


<h3>Cadena NOWDOC</h3>

    <p>La cadena nowdoc es como heredoc con comillas simples
        no se interpolan varaibles ni se reconocen sencuencias de escape mas alla 
        \ y '. No se respetan los saltos de linea.
    </p>

<?php
    $cadena_nd = <<<'ND'
    Esto es una cadena nowdoc
    y el salto de linea si lo respeta (en el codigo fuente)
    no le puedo meter variabes
    y solo reconoce \\ y \'. <br>
    ND;

    echo $cadena_nd;

?>

<h2>Conversion de tipos de datos</h2>

<p>HAy dos tipos de conversiones: iMmplicitas y explciaitas. Las priemras
    ocurren cuando en una expresion hay operandos de diferente tipo. PHP convierte algos de ellos
    para evaluar la expresión.
</p>

<?php
    $cadena = "25";
    $numero = 8;
    $booleano = True;
    $resultado = $cadena + $numero + $booleano; // como + es operador aritmetico, la expresion es artimetica por webos
    echo "El resultado es $resultado<br>";

    ?>
    <p>CUando se hace una conversion implicita solo afecta al operando
        pero no a la variable. Es decir, la conversion de $cadena a entero solamente 
        para evaluar la expresion, pero al $cadena sigue siendo de tipo string
    </p>

<?php

$flotante = 3.5;
$resultado = $cadena + $flotante +$numero + $booleano;
echo "EL resultado ahora es $resultado<br>";

$cadena = "25 marranos dan mucho provecho menor que 7 lechones";
$resultado = $numero + $cadena;
echo "El resultado es $resultado<br>";
echo "Después de la utlima conversion<br>"; 
?>

<p>Conversiones explicitas</p>
<p>Se conocen como casting o moldeo y se hacen precediendo
    la expresion con el tiempo a convertir entre parentesis
</p>

<?php
    // si quiero convertir a un entero -> (int)expresion
    // si quiero convertir a float -> (float)expresion
    // Si quiero convertir a string -> (string)expresion

    echo "Conversiones a entero<br>";
    $valor_booleano = True;
    $valor_convertido = (int)$valor_booleano;
    echo "El valor convertido a entero es $valor convertido<br>";
    $valor_float = 3.14159;
    $valor_convertido = (int)$valor_float;
    echo "El valor convertido a entero es $valor_convertido<br>";
    $valor_redondeado = round($valor_float, 0);

    $valor_cadena = "123";
    $valor_convertido = (int)$valor_cadena;
    echo "El valor convertido a enteroe s $valor_convertido<br>";

    

?>

    </body>
</html>