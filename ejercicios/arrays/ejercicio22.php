<?php

require_once($_SERVER['DOCUMENT_ROOT'] . '/includes/inicio_y_fin.php');

inicio_html('Ejercicio 19', ['/styles/genral.css']);

$cuentas = [];
$tipos_movimientos = ["I", "R", "T"];
$saldo_cuentas = [];

function add_account($numero){
    $cuentas[] = $numero;
    $saldo_cuentas[$numero] = 0;
} 

function check_account($num_cuenta, $cuentas){
    $account_exits = false;
    return in_array($num_cuenta, $cuentas) ? $account_exits = true : $account_exits;
}

function check_movimiento($movimiento, $tipos_movimientos){
    $tipo_movimiento_exits = false;
    return in_array($movimiento, $tipos_movimientos) ? $tipo_movimiento_exits = true : $tipo_movimiento_exits;
}

function add_movimiento($cuentas , $num_cuenta, $movimiento, $tipos_movimientos, $concepto, $cantidad, $saldo_cuentas, $cuenta_trasnfe = null){
    $account_exists = check_account($num_cuenta, $cuentas);
    $movimiento_exists = check_movimiento($movimiento, $tipos_movimientos);

    if( $account_exists && $movimiento_exists){
            $cuentas[$num_cuenta][] = [
                'Movimiento'    =>  $movimiento,
                'Fecha'         =>  new DateTime(),
                'Concepto'      =>  $concepto,
                'Cantidad'      =>  $cantidad
            ];

            if( $concepto == 'T'){
                $cuentas[$num_cuenta]['Cuenta transferencia'] = $cuenta_trasnfe;
            }
    }

    if( $movimiento == 'R' ){
        $saldo_cuentas[$num_cuenta] -= $cantidad;
    }
    else{
        $saldo_cuentas[$num_cuenta] += $cantidad;
    }
}



fin_html();

?>
