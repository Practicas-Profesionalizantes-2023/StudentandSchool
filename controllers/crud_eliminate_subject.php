<?php
require_once '../model/query.php';

$database = new model_sql();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['delete'])) {
        $id_subject = $_POST['id_subject'];
        $eliminated = $database->eliminated_subject("subjects", $id_subject);
        
        if ($eliminated) {
            //header("Location: ../views/views_crud_pre_registered.php");
            header("Location: ../views/views_crud_admin_careers.php?eliminar_materia=correcto");
            exit(); // Agrega esta línea para evitar que se ejecute código adicional después de la redirección
        } 
    }
}

$id_subject = $_GET['id'];
$get_subject = $database->getSingle_subject("subjects", $id_subject);

?>
