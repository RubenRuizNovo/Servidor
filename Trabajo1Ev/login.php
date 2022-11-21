<?php
include "bd.php";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $usu = comprobarUsuario($_POST['usuario'], $_POST['passw']);
    if ($usu === false) {
        $err = true;
        $usuario = $_POST['usuario'];
        echo "<div class='errorlogin'>";
        echo "Usuario o contraseña incorrecta.";
        echo "</div>";
    } else {
        setcookie("NumPartidas", 0);
        session_start();
        $_SESSION['usuario'] = $_POST['usuario'];
        header("Location: bienvenido.php");
    }

    
}
?>
<html>

<head>
    <link rel="stylesheet" href="estilo.css">
</head>

<body>

    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <div class="contenedor">
            <div class="c1">
            <h2 class="usuario">Login</h2>
            <p>Usuario</p>
            <input type="text" name="usuario" placeholder="Introduce nombre..."/>
            <br>
            <p>Contraseña</p>
            <input type="password" name="passw" />
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
            <br>
            <br>


        </div>
    </form>
</body>

</html>