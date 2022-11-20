<?php
function puntuacionMaxima($usuario) {
    $mysqli = new mysqli("localhost", "root", "","prueba_juego");
    //$query = "SELECT pun_max FROM usuarios where usu_login = '$usuario'";
    $query = "SELECT pun_max FROM usuarios where usu_login = '$usuario'";
    $result = $mysqli -> query($query);
    $registro = $result -> fetch_assoc();
    return $registro['pun_max'];
}

echo "La puntuacion maxima es: " . puntuacionMaxima("ruben");









// echo "<pre>";

// function nR($a) {
//     $numRept = false;
//     $numRand = rand(1,50);
//     do {
//         $numRand = rand(1,50);
//         if (in_array($numRand,$a)) {
//             $numRept = true;
//         }else{
//             $numRept = false;
//         }
//     } while ($numRept == true);
//     echo "El numero es: " . $numRand . "<br>";
//     return $numRand;

// }
// $arr = array();
// for ($i=0; $i < 50; $i++) { 
//     array_push($arr,nR($arr));
// }

// $mysqli = new mysqli("localhost", "root", "","prueba_juego");
// $query = 'SELECT * from palabras';
// $result = $mysqli -> query($query);
// while ($registro = $result -> fetch_assoc()) {
//     echo "Hola Antonio <br>";
//     if($registro['palabraIngles'] == "be") {
//         echo"true";
//     }
//     echo "Igual: " ."<br>";
//     echo "ingles: " . $registro['palabraIngles']."<br>";
//     echo "español: " . $registro['palabraEsp']."<br>";
    
//     print_r($registro);

// }