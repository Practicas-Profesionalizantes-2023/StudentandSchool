<?php
require_once '../model/query.php';

$database = new model_sql();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['delete'])) {
        $pre_user_id = $_POST['id_pre_user'];
        $eliminated = $database->eliminated_register("pre_registration", $pre_user_id);
        
        if ($eliminated) {
            header("Location: ../views/views_crud_pre_registered.php");
            exit(); // Agrega esta línea para evitar que se ejecute código adicional después de la redirección
        } 
    }
}

$pre = $_GET['id_pre_user'];
$get_user = $database->getSingleShow("pre_registration", $pre);

// Resto del código
?>
