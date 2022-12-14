<?php
require_once 'sesiones.php';
include 'bd.php';
    comprobar_sesion();
    $palabraCorrecta = true;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    echo "<div class='respuesta'>";
    echo "<br>La palabra es: " . $_SESSION["palabraIngles"] ."<br><br>";
    echo "Tu has dicho que era: " . strtolower($_POST['palabraEspañol'])."<br><br>";
    
    if(comprobarPalabra($_SESSION["palabraIngles"],strtolower($_POST['palabraEspañol']))){
        echo "RESPUESTA CORRECTA.<br><br>";
        $_SESSION['puntuacion'] += 50;
        if (count($_SESSION['numerosRepetidos']) < 50) {
            $_SESSION['numeroSeleccionado'] = numeroSinRepetir($_SESSION['numerosRepetidos']);
            array_push($_SESSION['numerosRepetidos'],$_SESSION['numeroSeleccionado']);
            $_SESSION['palabraIngles'] = seleccionarPalabra($_SESSION['numeroSeleccionado']);
        }else {
            echo "<h3>Enhorabuena has acertado todas las preguntas</h3>";
            header('Refresh: 10; URL=postGame.php');
        }
        

    }else{
        echo "<p>La respuesta correcta era: ". palabraEsp($_SESSION['numeroSeleccionado'])."</p>";
        $palabraCorrecta = false;
    }

    echo "</div>";

    
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="estilo.css">
    <title>Document</title>
</head>
<body>
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
    <?php
    //Inicializo la variable y le doy un valor
    echo "<div class='contenedorJuego'>";
        if ($palabraCorrecta) {
            
            echo "<div class='c1'>";
            echo '<p id="puntucacion">Puntuacion Actual: ' . $_SESSION["puntuacion"] .'</p>
            <p id="palabraIngles">Palabra en Ingles: ' .  $_SESSION["palabraIngles"] .'</p>
            <label for="palabraEspañol">Introduce la traduccion: </label>
            <input type="text" name="palabraEspañol"/>
            <br>
            <input type="submit" value="Comprobar"/>';
            echo "<br>";
            echo "</div>";
            
        }else {
            echo '<h3>Respuesta incorrecta</h3>';
            echo '<p>Has conseguido '. $_SESSION["puntuacion"].' puntos.</p>';
            header('Refresh: 5; URL=postGame.php');
        }
        echo "</div>";
    ?>
</form>
</body>
</html>