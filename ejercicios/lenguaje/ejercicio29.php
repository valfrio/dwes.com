<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 24</title>
</head>
<body>
    
<?php
    
    $edad = random_int(1, 100);
    $sueldo = random_int(5000, 50000);
    $sueldo_mensual = $sueldo / 12;
    echo "El sueldo mensual es de $sueldo_mensual y la edad $edad<br>";

    echo $edad > 16 && $sueldo_mensual > 1000 ? "Paga" : "No pagas";
    
?>

</body>
</html>