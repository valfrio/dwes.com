<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 33</title>
</head>
<body>
    
<?php
    
    $CAPITAL_INICIAL = 1000000;
    $INTERES_ANUAL = 4;
    $AÑOS = 20;
    $capital_anual_actualizado = $CAPITAL_INICIAL;
    echo "Lista de incrementos y capital anuales durante $AÑOS años al $INTERES_ANUAL% con capital inicial de $CAPITAL_INICIAL<br><br>";

    for($i = 1; $i <= $AÑOS; $i++){
        $incremento_anual = $capital_anual_actualizado * ($INTERES_ANUAL / 100);
        $capital_anual_actualizado += $incremento_anual;
        printf("El año %02d el incremento es de %05d
        y el capital actualizado es %06d.<br>", $i, $incremento_anual ,$capital_anual_actualizado); 
    }  
    
?>

</body>
</html>