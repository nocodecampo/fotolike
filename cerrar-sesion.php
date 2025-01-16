<?php
// Iniciamos la sesión
session_start();
// Cerramos la sesión
session_destroy();
// Redirigimos a la página de inicio
header('Location: login.php');
?>