<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $usu = comprobarUsuario($_POST['usuario'], $_POST['clave']);
    if ($usu === false) {
        $err = true;
        $usuario = $_POST['usuario'];
    } else {
        session_start();
        $_SESSION['usuario'] = $_POST['usuario'];
        $_SESSION['puntuacion'] = 0;
        setcookie("NumPartidas", 0);
        header("Location: juego.php");
        return;
    }

    
}
?>
<html>

<head>
    <link rel="stylesheet" href="style.css">
</head>

<body>

    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <div class="cajon">
            <h2 class="usuario">Login</h2>
            <p>Usuario</p>
            <input type="text" name="usuario" />
            <br>
            <br>
            <p>Contraseña</p>
            <input type="text" name="contraseña" />
            <br>
            <br>
            <div class="enviar">
                <input type="submit" />
            </div>
            <br>
            <div class="registro">
                <button>
                    <a href="registro.php">Registro</a>
                </button>
            </div>


        </div>
    </form>
</body>

</html>