<?php
require_once '../model/query.php';
$database= new model_sql();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Asegúrate de que se haya enviado un valor para 'search'
    if (isset($_POST['submit'])) {
        // Obtiene el término de búsqueda ingresado por el usuario
        $searchTerm = $_POST['search'];
        
        $searchResults = $database->search_students($searchTerm);

        // Incluye la vista HTML pasando los resultados de la búsqueda
        require_once '../views/views_students.php';
        exit; // Detiene la ejecución del script después de mostrar los resultados
    }
}

require_once '../views/views_students.php';


?>