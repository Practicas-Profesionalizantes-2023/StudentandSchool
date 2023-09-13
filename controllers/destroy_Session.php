<?php
session_start(); // Inicia la sesión (asegúrate de llamar a esto al principio de tu script)

// Cuando quieras cerrar la sesión (por ejemplo, en un botón de "Cerrar sesión")
session_destroy(); // Cierra la sesión

// Redirige al usuario a una página de inicio de sesión o a donde desees
// Redirige a la página de dashboard de administrador con un parámetro de mensaje de éxito en la URL
header("Location: ../index.php?mensaje=correcto"); // Cambia la URL según tu estructura de archivos
exit();
?>
