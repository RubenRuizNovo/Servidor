<?php
    include "bd.php";
    require_once "sesiones.php";
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
    <h1>Estas en el postGame</h1>
    <p>Has conseguido un total de <?php echo $_SESSION['puntuacion']?> puntos</p>
    <p>Tu record era de:  <?php echo puntuacionMaxima($_SESSION['usuario'])?></p>
    <?php
        if ($_SESSION['puntuacion'] > puntuacionMaxima($_SESSION['usuario'])) {
            echo "<p>Enhorabuena has superado tu record.</p>";
        }else{
            echo "<p>Vaya... No has podido superar tu record</p>";
        }
    ?>

    <p>¿Que quieres hacer ahora?</p>
    <button>
        <a href="bienvenido.php">Volver a Jugar</a>
    </button>
    <button>
    <a href="logout.php">Cerrar Sesion</a>
    </button>
</body>
</html>