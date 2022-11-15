<header>
 Usuario: <?php echo $_SESSION['usuario']['correo']?>
 <a href="categorias.php">Home</a>
 <a href="carrito.php">Ver carrito</a>
 <?php
    if ($_SESSION['usuario']['rol'] == 1) {
        echo "<a href='panelAdministrador.php'>Administrador</a>";
    }
 ?>

 <a href="logout.php">Cerrar sesión</a>
</header>
<hr>