<?php
include "validadorRegistro.php";
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $nombre = $_POST["nombre"];
    $usuario = $_POST["usuario"];
    $email = $_POST["email"];
    $pasw = $_POST["pasw"];
    $flag = false;

    if (validadorNombre($nombre)) {
        echo "Error. El apellido tiene que tener una longitud entre 3 y 20 caracteres y la primera letra tiene que ser mayuscula. <br>";
        $flag = true;
    }
    if (correoRepetido($email)) {
        echo "Este correo ya esta en uso. Introduce otro correo.";
        $flag = true;
    }
    if(usuarioRepetido($usuario)) {
        echo "Este usuario ya esta en uso. Intenta otro nombre de usuario";
        $flag = true;
    }
    // if(validadorEdad($pasw)){
    //     echo "Error. La pasw indicada es no es lo esperado. <br>";
    //     $flag = true;
    // }

    if (!$flag) {
        header("Location: login.php");
    }
}
?>
<html>

<head>
    <!-- <link rel="stylesheet" href="style.css"> -->
</head>

<body>

    <div class="Formulario">
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <h1>Registrarse</h1>
            <br><br>
            <label for="nombre"> Nombre: </label>
            <input type="text" name="nombre" value="<?php if (isset($nombre) && !validadorNombre($nombre)) echo $nombre; ?>" />
            <br><br>
            <label for="Nombre usuario">Nombre de Usuario: </label>
            <input type="text" name="usuario" value="<?php if (isset($usuario) && !usuarioRepetido($usuario)) echo $usuario; ?>" />
            <br><br>
            <label for="email">Email: </label>
            <input type="email" name="email" value="<?php if (isset($email) && !correoRepetido($email)) echo $email; ?>" />
            <br><br>
            <label for="Contraseña">Contraseña:</label>
            <input type="password" name="pasw" />
            <br><br>
            <input type="submit">
            <br><br>
            <a href="login.php">Login</a>
        </form>
    </div>
</body>

</html>