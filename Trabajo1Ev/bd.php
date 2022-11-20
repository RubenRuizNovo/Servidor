<?php



//Devuelve True en el caso de que el usuario introduicido este repetido.

function usuarioRepetido($usuario) {
    $mysqli = new mysqli("localhost", "root", "","prueba_juego");
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
    $mysqli = new mysqli("localhost", "root", "","prueba_juego");
    $query = "SELECT email FROM login";
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
    $mysqli = new mysqli("localhost", "root", "","prueba_juego");
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
    $mysqli = new mysqli("localhost", "root", "","prueba_juego");
    //$query = "SELECT pun_max FROM usuarios where usu_login = '$usuario'";
    $query = "SELECT pun_max FROM usuarios where usu_login = '$usuario'";
    $result = $mysqli -> query($query);
    $registro = $result -> fetch_assoc();
    return $registro['pun_max'];
}

function seleccionarPalabra($numeroASeleccionar) {
    // $numPalabra = numeroSinRepetir($posRepetidas);
    $mysqli = new mysqli("localhost", "root", "","prueba_juego");
    $query = 'SELECT palabraIngles from palabras where id='.$numeroASeleccionar.'';
    $result = $mysqli -> query($query);
    $registro = $result -> fetch_assoc();
    return $registro['palabraIngles'];
    

}

function comprobarPalabra($palabraIngles, $palabraEsp) {
    $mysqli = new mysqli("localhost", "root", "","prueba_juego");
    $query = 'SELECT palabraIngles,palabraEsp from palabras';
    $result = $mysqli -> query($query);
    $palabraCorrecta = false;
    while($registro = $result -> fetch_assoc()) {
        if ($registro['palabraIngles'] == $palabraIngles && $registro['palabraEsp'] == $palabraEsp) {
            $palabraCorrecta = true;
        }
    }
    return $palabraCorrecta;

}

function numeroSinRepetir($nRepetidos) {
    $numRept = false;
    $numRand = rand(1,50);
    do {
        $numRand = rand(1,50);
        if (in_array($numRand,$nRepetidos)) {
            $numRept = true;
        }else{
            $numRept = false;
        }
    } while ($numRept == true);
    return $numRand;
}

function palabraEsp($numeroASeleccionar) {
    $mysqli = new mysqli("localhost", "root", "","prueba_juego");
    $query = 'SELECT palabraEsp from palabras where id='.$numeroASeleccionar.'';
    $result = $mysqli -> query($query);
    $registro = $result -> fetch_assoc();
    return $registro['palabraEsp'];
}

function crearUsuarioLogin($usuario,$pasword,$email,$nombre) {
    $mysqli = new mysqli("localhost", "root", "","prueba_juego");
    $query = 'INSERT into login(Nombre,nom_usu,passw,email) values ("'.$nombre.'","'.$usuario.'","'.$pasword.'","'.$email.'")';
    $result = $mysqli -> query($query);
    return;
}

function crearUsuarioPartidas($usuario) {
    $mysqli = new mysqli("localhost", "root", "","prueba_juego");
    $query = 'INSERT into usuarios(usu_login) values ("'.$usuario.'")';
    $result = $mysqli -> query($query);
    return;
}

function mostrarRanking() {
    $mysqli = new mysqli("localhost", "root", "","prueba_juego");
    $query = 'SELECT usu_login,pun_max from usuarios ORDER BY pun_max ASC';
    $result = $mysqli -> query($query);
    $pos = 1;
    foreach ($result as $res) {
        echo "<p>" . $pos . "º posicion -> " . $res['usu_login'] . " con ". $res['pun_max'] . "puntos</p>";
        $pos += 1;
    }
    return;
}