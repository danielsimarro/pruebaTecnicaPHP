<?php
// Iniciar sesión
session_start();

// Ordenar la variable de sesión
sort($_SESSION['jokes']);

// Redirigir al usuario de vuelta a la página principal
header("Location: index.php");
exit();
?>
