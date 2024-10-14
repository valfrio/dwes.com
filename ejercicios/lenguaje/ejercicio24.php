<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 24</title>
</head>
<body>
    
<?php
    
    $num_veces = random_int(1, 10);
    $nombre = "Salva<br>";

    echo "El número entero generado es $num_veces<br>";
    do{
        echo "$nombre";
        $num_veces--;
    }
    while( $num_veces > 0 );

    


?>

</body>
</html>