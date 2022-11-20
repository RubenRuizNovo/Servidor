<?php
/*comprueba que el usuario haya abierto sesión o redirige*/
require_once 'sesiones.php';
require_once 'bd.php';
comprobar_sesion();
$_COOKIE['NumPartidas'] += 1;
$_SESSION['puntuacion'] = 0;
$_SESSION['numerosRepetidos'] = array();
$_SESSION['numeroSeleccionado'] = numeroSinRepetir($_SESSION['numerosRepetidos']);
array_push($_SESSION['numerosRepetidos'],$_SESSION['numeroSeleccionado']);
$_SESSION['palabraIngles'] = seleccionarPalabra($_SESSION['numeroSeleccionado']);

print_r($_SESSION);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h2>Bienvenido al juego <?php echo $_SESSION['usuario']?></h2>
    <p>Tu puntuación maxima es: <?php echo puntuacionMaxima($_SESSION['usuario'])?></p>
    <?php
    if(isset($_COOKIE['NumPartidas'])){
        echo "<p>Llevas ". $_COOKIE['NumPartidas']." partidas jugadas</p>";
    }else{
        echo "Las cookies no estan habilitadas";
    }
    ?>
    
    <button>
        <a href="juego.php">JUGAR</a>
    </button>
    <button>
        <a href="logout.php">SALIR</a>
    </button>
</body>

</html>