<?php
require_once '../model/query.php';
$database = new model_sql();

// Obtiene el parámetro 'id' de la URL


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['delete'])) { // Verifica si el botón 'delete' se ha presionado
        $correlative = $_POST['correlative']; // Obtiene el correlative del formulario

        // Elimina el registro de la base de datos
        $eliminated = $database->delete_Correlative($correlative);
        
        if ($eliminated) {
            header("Location: ../views/views_crud_correlatives.php?eliminate_correlative=correcto");
            exit(); // Agrega esta línea para evitar que se ejecute código adicional después de la redirección
        }
    }
}

$correlative = $_GET['id'];
$get = $database->getSingle_Correlative($correlative);

?>