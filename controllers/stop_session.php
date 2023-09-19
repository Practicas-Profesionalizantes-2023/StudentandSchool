<?php
function checkSession() {
    session_start();
    
    // Comprueba si no hay una sesión activa (el usuario no ha iniciado sesión)
    if (!isset($_SESSION['name']) || $_SESSION['state'] != 1) {
        //header("Location: ../index.php");
       
        header("Location: ../index.php?inicio=error"); 
        exit();
    }
}
?>
