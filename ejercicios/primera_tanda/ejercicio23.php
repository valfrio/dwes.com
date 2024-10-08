<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 23</title>
</head>
<body>
    
<?php
    
    $edad = random_int(0, 90);
    echo "La edad generada $edad<br>";

    if( $edad >= 0 && $edad <= 3) echo "Infancia";
    elseif ( $edad >= 4 && $edad <= 11 ) echo "Infantil";
    elseif ( $edad >= 12 && $edad <= 20 ) echo "Adolescente";
    elseif ( $edad >= 21 && $edad <= 65 ) echo "Adulto";
    else echo "Tercera edad";


?>

</body>
</html>