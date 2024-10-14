<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 33</title>
</head>
<body>
    
<?php
    
    $N = 3;
    $acumulador = 1;

    for($i = 1; $i <= $N; $i++){
        $acumulador *= $i;
    }  

    echo "El factorial de $N es $acumulador";
?>

</body>
</html>