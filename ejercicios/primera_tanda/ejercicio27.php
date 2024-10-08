<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 24</title>
</head>
<body>
    
<?php
    
    $nota = random_int(0,10);
    echo "La nota generada es $nota<br>";
    
    if( $nota >= 0 && $nota < 5) echo "Suspenso";
    elseif( $nota >= 5 && $nota < 6) echo "Aprobado";
    elseif( $nota >= 6 && $nota < 7) echo "Suficiente";
    elseif( $nota >= 7 && $nota < 9) echo "Notable";
    else echo "Sobresaliente";



?>

</body>
</html>