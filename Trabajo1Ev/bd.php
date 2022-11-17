<?php

function conexionBD() {
    $mysqli = new mysqli("localhost", "root", "","juego");
    return $mysqli;
}

//Devuelve True en el caso de que el usuario introduicido este repetido.

function usuarioRepetido($usuario) {
    $mysqli = new mysqli("localhost", "root", "","juego");
    $query = "SELECT nom_usu FROM login";
    $result = $mysqli -> query($query);
    $usuEncontrado = false;
    foreach ($result as $res) {
        if ($res['nom_usu'] == $usuario) {
            $usuEncontrado = true;
        }
    }

    return $usuEncontrado;
}

//Devuelve True en el caso de que el email introduicido este repetido.

function correoRepetido($email) {
    $mysqli = new mysqli("localhost", "root", "","test_juego");
    $query = "SELECT email FROM login";
    $result = $mysqli -> query($query);
    $emailEncontrado = false;
    foreach ($result as $res) {
        if ($res['correo'] == $email) {
            $emailEncontrado = true;
        }
    }

    return $emailEncontrado;
}

//Devuelve True en el caso de que el usuario y la contraseña sea correcta
function comprobarUsuario($usuario,$contraseña) {
    $mysqli = new mysqli("localhost", "root", "","test_juego");
    $query = "SELECT nom_usu,passw FROM login";
    $result = $mysqli -> query($query);
    $datosCorrectos = false;
    foreach ($result as $res) {
        if ($res['nom_usu'] == $usuario && $res['passw'] == $contraseña) {
            $datosCorrectos = true;
        }
    }

    return $datosCorrectos;
}

function puntuacionMaxima($usuario) {
    $mysqli = new mysqli("localhost", "root", "","test_juego");
    //$query = "SELECT pun_max FROM usuarios where usu_login = '$usuario'";
    $query = "SELECT usu_login,pun_max FROM usuarios where usu_login = '$usuario'";
    $result = $mysqli -> query($query);
    while ($registro = $result -> fetch_assoc()) {
        print_r($registro);

    }
    return;
}

function seleccionarPalabra($posRepetidas) {
    $mysqli = new mysqli("localhost", "root", "","test_juego");
    $query = 'SELECT * from palabras';
    $result = $mysqli -> query($query);
    $registro = $result -> fetch_assoc();

}