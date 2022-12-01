<?php
// Sesiones. Es un array asociativo el cual perdura hasta que se cierre el navegador o se destruya la sesion

// Para iniciar una sesion

session_start();

//Indicar un valor en sesion

$_SESSION['prueba'] = 3;

//Eliminar una sesion. Primero dejamos la sesion vacia y luego la destruimos

$_SESSION = array();
session_destroy();

//Cookies

//Para definir una cookie

setcookie('cookie1',3);

//Para eliminar una cookie

setcookie('cookie1', 123, time() -1000);

//MYSQLI

new mysqli("localhost", "root", "","empresa");

//PDO

//La sentencia es: 

new PDO('mysql:host=localhost,dbname=empresa','root','');

//Sentencia preparada por marcadores y marcadores posicionales

prepare('INSERT into usuarios(Codigo,Nombre,Clave,Rol) values ("",:nombre,:clave,:rol)');
$sentencia -> bindParam(':nombre', $nombre);
$sentencia -> bindParam(':clave', $clave);
$sentencia -> bindParam(':rol', $rol);

$sentencia -> execute();

prepare('INSERT into usuarios(Codigo,Nombre,Clave,Rol) values ("",?,?,?)');
    $sentencia -> bindParam(1, $nombre);
    $sentencia -> bindParam(2, $clave);
    $sentencia -> bindParam(3, $rol);

$sentencia -> execute();

//Transaccion

try {
    $mbd -> beginTransaction();
    
    $mbd -> exec('INSERT into antiguos_empleados values (1,"Nico")');
    $mbd -> exec('DELETE from empleados where ID = 3');
    //si hubiera ido bien...
    $mbd -> commit();
    echo "Se ha hecho un commit";
    

} catch (\Throwable $th) {
    echo "Error: " . print_r($mbd -> errorInfo());
    //Deshace el primer cambio
    $mbd -> rollBack();
    echo "<br>Transaccion anulada <br>";
}

//Ficheros

//Abrir fichero

fopen("fichero_ejemplo.txt","r");

//Recorrer fichero

while( !feof($fich) ){
    $car = fgets($fich, 40);        
    echo "<br>";    
    echo $car;
}

//Cerar fichero

fclose($ficheroAbierto);

//Crear una ruta

mkdir($ruta,0777,true);

//Abrir fichero xml

simplexml_load_file('fichero_ejemplo.xml');

//Seleccionar valores etiqueta xml

$ejemplo = $lecturaxml->xpath("//etiqueta1");

//Recepción de ficheros

$nombreRuta = $_POST["ruta"];

echo "ESta es la ruta enviada: $nombreRuta <br>";

if (file_exists($nombreRuta)) {
    echo "La ruta si existe <br>";
}else {
    echo "La ruta no existe <br>";
}

if (is_uploaded_file($_FILES["imagen"]["tmp_name"])) {
    $nombreDirectorio = $nombreRuta;
    $nombreFichero = $_FILES["imagen"]["name"];
    $nombreCompleto = $nombreDirectorio.$nombreFichero;
    if (is_file($nombreCompleto)) {
        $idUnico = time();
        $nombreFichero = $idUnico. "-" .$nombreFichero;
        $nombreCompleto = $nombreDirectorio.$nombreFichero;
        echo "Is File inside <br>";
    }else {
        echo "Is no file inside <br>";
    }
    move_uploaded_file($_FILES["imagen"]["tmp_name"],$nombreCompleto);
    echo "Fichero subido con el nombre: $nombreFichero<br>";
}else {
    print("No se ha podido subir el fichero <br>");
}

//Crear tabla con json

