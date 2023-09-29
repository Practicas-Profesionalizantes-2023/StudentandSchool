<?php
require_once '../model/query.php';

$database = new model_sql();

// Verifica si se envió el formulario de búsqueda
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Asegúrate de que se haya enviado un valor para 'search'
    if (isset($_POST['search'])) {
        // Obtiene el término de búsqueda ingresado por el usuario
        $searchTerm = $_POST['search_name'];
        $searchResults = $database->search_pre_register($searchTerm);

       

        // Incluye la vista HTML pasando los resultados de la búsqueda
        require_once '../views/views_crud_pre_registered.php';
        exit; // Detiene la ejecución del script después de mostrar los resultados
    }
}

// Si no se envió el formulario de búsqueda o no se encontraron resultados, muestra la página normal
$show_pre_register = $database->show_state("pre_registration");
'../views/views_crud_pre_registered.php';
?>
