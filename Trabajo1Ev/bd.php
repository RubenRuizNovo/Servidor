<?php

//Devuelve True en el caso de que el usuario introduicido este repetido.

function usuarioRepetido($usuario) {
    $mysqli = new mysqli("localhost", "root", "","juego");
    $query = "SELECT nombreUsuario FROM usuarios";
    $result = $mysqli -> query($query);
    $usuEncontrado = false;
    foreach ($result as $res) {
        if ($res['usuario'] == $usuario) {
            $usuEncontrado = true;
        }
    }

    return $usuEncontrado;
}

//Devuelve True en el caso de que el email introduicido este repetido.

function correoRepetido($email) {
    $mysqli = new mysqli("localhost", "root", "","juego");
    $query = "SELECT email FROM usuarios";
    $result = $mysqli -> query($query);
    $emailEncontrado = false;
    foreach ($result as $res) {
        if ($res['email'] == $email) {
            $emailEncontrado = true;
        }
    }

    return $emailEncontrado;
}

//Devuelve True en el caso de que el usuario y la contraseña sea correcta
function comprobarUsuario($usuario,$contraseña) {
    $mysqli = new mysqli("localhost", "root", "","juego");
    $query = "SELECT correo,pasw FROM usuarios";
    $result = $mysqli -> query($query);
    $datosCorrectos = false;
    foreach ($result as $res) {
        if ($res['correo'] == $usuario && $res['pasw'] == $contraseña) {
            $datosCorrectos = true;
        }
    }

    return $datosCorrectos;
}

function puntuacionMaxima($usuario) {
    $mysqli = new mysqli("localhost", "root", "","juego");
    $query = "SELECT puntuacionMaxima FROM usuarios where usuario = $usuario";
    $result = $mysqli -> query($query);
    return $result['puntuacionMaxima'];
}