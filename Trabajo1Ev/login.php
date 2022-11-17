<?php
include "bd.php";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    echo "El usuario es: " . $_POST['usuario'];
    echo "La contrasseña es: ". $_POST['passw'];

    $usu = comprobarUsuario($_POST['usuario'], $_POST['passw']);
    if ($usu === false) {
        $err = true;
        $usuario = $_POST['usuario'];
        echo "Usuario o contraseña incorrecta.";
    } else {
        session_start();
        $_SESSION['usuario'] = $_POST['usuario'];
        $_SESSION['puntuacion'] = 0;
        setcookie("NumPartidas", 0);
        header("Location: bienvenido.php");
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
            <input type="text" name="usuario" placeholder="Introduce nombre..."/>
            <br>
            <br>
            <p>Contraseña</p>
            <input type="text" name="passw" />
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