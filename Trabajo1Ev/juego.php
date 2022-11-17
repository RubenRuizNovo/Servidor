<?php
require_once 'sesiones.php';
    comprobar_sesion();
    $palabraCorrecta = true;
    
    echo "PASA POR AQUI<br>";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    //Cuando llega aqui me dice que la variable no existe
    echo "La palabra es: " . $palabraIngles ."<br>";
    echo "Tu has dicho que era: " . $_POST['palabraEspañol'];
    if($palabraIngles == $_POST['palabraEspañol']){
        echo "RESPUESTA CORRECTA.";
        $_SESSION['puntuacion'] += 50;
        $palabraIngles = "funciona";
        echo "LA palabra dentro del if del post es: ". $palabraIngles;

    }else{
        $palabraCorrecta = false;
    }

    
}
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
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
    <?php
    //Inicializo la variable y le doy un valor
        $palabraIngles = "hola";
        if ($palabraCorrecta) {
            echo '<p id="puntucacion">Puntuacion Actual: ' . $_SESSION["puntuacion"] .'</p>
            <p id="palabraIngles">Palabra en Ingles: ' .  $palabraIngles .'</p>
            <label for="palabraEspañol">Introduce la traduccion: </label>
            <input type="text" name="palabraEspañol"/>
            <br>
            <label for="Comprobar">Comprobar</label>
            <input type="submit"/>';
        }else {
            echo '<h3>Respuesta incorrecta</h3>';
            echo '<p>Has conseguido '. $_SESSION["puntuacion"].' puntos.</p>';
        }
    ?>
</form>
</body>
</html>