<?php
require_once '../model/query.php';
$database = new model_sql();

// Obtén el estado actual
$verify_state = $database->get_state("controls_states", "1");
if ($verify_state !== false) {
    if ($verify_state['state'] == 0) { // Cambia == 1 a == 0
        // Redirige a la página de error si el estado es 0
        header("Location: ../views/stop_preinscripcion.php?no_coinciden=error");
        exit();
    } else {
        // Redirige a la página de preinscripción si el estado es 1
        header("Location: ../views/pre_register.php?pre_register=correcto");
        exit();
    }
}
?>