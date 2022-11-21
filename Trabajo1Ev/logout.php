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
    <?php
    include "bd.php";
    session_start();
    $_SESSION = array();
    session_destroy();
    unset($_COOKIE['NumPartidas']);
    echo "<div class='contenedor'>";
    echo "<h3>Ranking</h3>";
    echo "<div class='c1'>";
    mostrarRanking();
    echo "</div>";
    echo "</div>";
    header('Refresh: 10; URL=login.php');
    ?>

</body>

</html>