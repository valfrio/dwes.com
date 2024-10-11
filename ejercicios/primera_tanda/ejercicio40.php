<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 38</title>
</head>
<body>
    
<?php
    
    $perfect_square = false;

    do{
        $number = random_int(1, 100);
        $square_root = sqrt( $number );
        $square_root_str = (string) $square_root;
        

        if( ! str_contains($square_root_str, ".") ){
            $perfect_square = true;
        }

    }
    while( ! $perfect_square );

    echo "The number generated was $number and the square root $square_root";

    

?>

</body>
</html>