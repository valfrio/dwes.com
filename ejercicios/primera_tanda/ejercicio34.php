<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 33</title>
</head>
<body>
    
<?php
    
    $N = 6;
    $M = 100;
    echo "Los números múltiplos de $N menores que $M son:<br>";

    echo "$N";
    for($i = $N + 1; $i <= $M; $i++){
        echo $i % $N == 0 ? ", $i" : "";
    }  
    
?>

</body>
</html>