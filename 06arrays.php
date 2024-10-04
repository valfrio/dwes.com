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
        <h1>Array</h1>
        <p>Un array conjunto de elementos que se referencian
            con el mismo nombre. A cada variable del array
            se le conoce como componente o elemento del array.
            Cada componente tiene asociado una clave que se emplea
            para acceder a ese componente.
        </p>
        <p>En php los arrays son muy flexibles. Hay de dos tipos:
            escalares y asociativos. Para acceder a un elemento se usa su clave
            con el operador []. Si la clave es un numero entero mayor o igual que 0 es un
            array escalar. Si la clave es una cadena de caracteres es un array asociativo.
        </p>
    
    <h2>Array escalar</h2>

<?php
    // Un array se define de dos formas
    // 1º con la funcion Array()
    $notas = Array(4, 9, 7.5, 6, 2.5);
    // 2º con un literal
    $numeros = [8, 4, 2, 9 ,5.5];

    // Si spñp se indican los elementos del array, la clave comienza por 0 desde
    // la izquierda
    // EL acceso a los elementos es mediante su clave o índice entre corchetes

    echo "La primera nota es $notas[0]<br>";
    echo "La tercera nota es $nota[2]<br>";


    // Al indicar el array podemos indicar los indices
    $notas = Array( 2 => 8.5, 4 => 4.75, 8 => 3.5);

    // Puedo definir indice para algunos y no para otros
    $notas = Array( 3 => 5, 6.5, 8, 7 => 2, 9, 5);

    echo "Indice 0: $notas[0]<br>";
    echo "Indice 1: $notas[1]<br>";
    echo "Indice 2: $notas[2]<br>";
    echo "Indice 3: $notas[3]<br>";
    echo "Indice 4: $notas[4]<br>";
    echo "Indice 5: $notas[5]<br>";
    echo "Indice 6: $notas[6]<br>";
    echo "Indice 7: $notas[7]<br>";
    echo "Indice 8: $notas[8]<br>";
    echo "Indice 9: $notas[9]<br>";

    // Borramos el elemento 4
    unset($notas[4]);
    if( isset($notas[4]) ){
        echo "El elemento 4 está definido y es $notas[4]<br>";
    }
    else {
        echo "El elemento 4 no está definido<br>";
    }

    // Modificar un elemento del array
    $notas[5] = rand(1, 10);
    echo "índice 5: $notas[5]<br>";


    // para añadir algo al final del array solo hace falta no poner inidice
    $notas[] = 7.5;
    echo "He añadido el elemento con indice 10: $notas[10]<br>";

?>

<h2>Arrays asociativos</h2>
<p>Array que tiene una cadena de caracteres como clave</p>

<?php
    $coche['1234BBC'] = "Seat leon";
    $coche['4321CCB'] = "Ford focus";


    echo "Mi coche es {$coche['1234BBC']}<br>";
    echo "Mi coche es " . $coche['1234BBC'] . "<br>";
 
?>

    <h2>Array mixto</h2>
    <p>Cuando las claves son ínidices numeros o cadenas indistintamente</p>

<?php
    $alumno ['Nombre'] = "Manolillo";
    $alumno[0] = 4; 
    $alumno[1] = 6;
    $alumno[2] = 5;
    $alumno['media'] = 5;

    echo "El alumno {$alumno['nombre']} y teiene de notas $alumno[0], $alumno[1] y $alumno[2].<br>";
    echo "Su media es {$alumno['media']}<br>";

    $alumno = ['nombre' => "Manolitros", 0 => 3, 8, 5 ,4 , 'media' => 5];

    echo "El alumno {$alumno['nombre']} y teiene de notas $alumno[0], $alumno[1] y $alumno[2].<br>";
    echo "Su media es {$alumno['media']}<br>";
?>

    <h2>Arrays bidimensionales</h2>
    <p>Arrays con dos dimensiones y por tanto para acceder a un elemento hacen
        falta dos claves
    </p>

<?php
    
?>
</body>