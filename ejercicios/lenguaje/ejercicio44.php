<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 38</title>
</head>
<body>



    
<?php
    
    if( $_SERVER['REQUEST_METHOD'] == 'GET'){ ?>

        <form method="POST" action="<?=$_SERVER['PHP_SELF']?>">
            <header>Actividad 44</header>
            <fieldset>
                <legend>Introduce los dos números</legend>

                <label for="numero1">Número 1</label>
                <input type="text" name="numero1" id="numero1" size="6" required>

                <label for="numero2">Número 2</label>
                <input type="text" name="numero2" id="numero" size="6" required>
            </fieldset>
            <input type="submit" name="operation" value="Enviar">
        </form>
   

<?php
    }

    else{

        function sum_divisores( $num ){

            $total = 0;
            for( $i = 1; $i <= $num; $i++){
    
                if( $num % $i == 0) {
                    $total += $i;
                    echo "$total<br>";

                }

            }
            return $total;
        }
        
        $num1 = +$_POST['numero1'];
        $num2 = +$_POST['numero2'];


    
        $sum_div_num1 = sum_divisores($num1);
        $sum_div_num2 = sum_divisores($num2);
    
        echo $sum_div_num1 == $sum_div_num2 ? "<h1>Son amiguitos</h1>" : "<h1>No</h1>";
    
    }
  
?>

</body>
</html>