<?php

function autenticar($usuario, $contraseña){
    
    $usuarios_registrados = [
        'valfrio'       =>  ['nombre' => 'Salvador Martínez Jimenez', 'password' => password_hash("toolbarlinux57", PASSWORD_DEFAULT)],
        'valfrio4'       =>  ['nombre' => 'Salvador Martínez Jimenez', 'password' => password_hash("toolbarlinux57", PASSWORD_DEFAULT)],
        'jpradillo'     =>  ['nombre' => 'Jorge Pradillo Hintenberger', 'password' => password_hash("marta", PASSWORD_DEFAULT)]
    ];

    if( array_key_exists($usuario, $usuarios_registrados) ){
        return password_verify($contraseña, $usuarios_registrados[$usuario]['password']);
    }
    else{
        return false;
    }
}

function cerrar_sesion(){
    $nombre_sesison = session_name();
    $cookie_params = session_get_cookie_params();

    setcookie($nombre_sesison, "", time() - 1000000, $cookie_params['path'], $cookie_params['domain'],
              $cookie_params['secure'], $cookie_params['httponly']);
    session_unset();
    session_destroy();
}

?>