<?php
require_once '../model/query.php';
$database = new model_sql();

// Obtén el estado actual
$verify_state=$database->get_state("controls_states","1");

if ($verify_state !== false) {
    // Verifica si ya está deshabilitado
    if ($verify_state['state'] == 1) {
        header("Location: ../views/dasboard_home_preceptor.php?ya_habilitado=error");
    } else {
        // Intenta deshabilitar la preinscripción
        $disable = $database->enable_preinscription("controls_states", "1");
        
        if ($disable) {
            // Redirige a la página de dashboard de administrador con un mensaje de éxito en la URL
            header("Location: ../views/dasboard_home_preceptor.php?habilitado=correcto");
            exit();
        } else {
            // Maneja el caso en que no se pudo deshabilitar
            header("Location: ../views/error.php");
            exit();
        }
    }
} else {
    // Maneja el caso en que no se pudo obtener el estado actual
    header("Location: ../views/error.php");
    exit();
}
?>