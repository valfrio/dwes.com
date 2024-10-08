<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 24</title>
</head>
<body>
    
<?php
    
    $num1 = random_int(0,10);
    $num2 = random_int(0,10);
    $num3 = random_int(0,10);
    echo "los números generados son $num1, $num2, $num3<br>";
    

    if( $num1 <= $num2 && $num2 <= $num3){
        echo " El orden es $num1, $num2, $num3<br>";
        echo "Se generaron en orden";
    }
    elseif( $num1 <= $num2 && $num3 <= $num2 && $num1 <= $num3){
        echo " El orden es $num1, $num3, $num2";
    }

    elseif( $num2 <= $num1 ){

        if( $num3 <= $num2){
            echo " El orden es $num3, $num2, $num1";
        }
        elseif( $num1 <= $num3){

            echo " El orden es $num2, $num1, $num3";
        }
        else{
            echo " El orden es $num2, $num3, $num1";
        }
        
    }

    elseif( $num3 <= $num1 ){
        
        // Solo existe esta opción, la otra la cubrimos arriba 
        echo " El orden es $num3, $num1, $num2";
    }

?>

</body>
</html>