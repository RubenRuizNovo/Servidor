<?php
include "bd.php";
session_start();
$_SESSION = array();
session_destroy();
mostrarRanking();
header('Refresh: 10; URL=login.php');