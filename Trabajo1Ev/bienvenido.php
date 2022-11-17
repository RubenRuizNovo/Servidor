<?php
/*comprueba que el usuario haya abierto sesión o redirige*/
require_once 'sesiones.php';
require_once 'bd.php';
comprobar_sesion();
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
    <h2>Bienvenido al juego <?php $_SESSION['usuario'] ?></h2>
    <p>Tu puntuación maxima es: <?php puntuacionMaxima($_SESSION['usuario'])?></p>
    <?php
    if(isset($_COOKIE['numPartidas'])){
        echo "<p>LLevas".$_COOKIE['numPartidas']." partidas jugadas</p>";
    }
    ?>
    
    <button>
        <a href="juego.php">JUGAR</a>
    </button>
    <button>
        <a href="login.php">SALIR</a>
    </button>
</body>

</html>