<?php
require_once '../model/query.php';
$database = new model_sql();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['delete'])) { // Verifica si el botón 'delete' se ha presionado
        $teacher_subject = $_POST['teacher_subject']; // Obtiene el id_teacher_subject del formulario
       
        // Elimina el registro de la base de datos
        $eliminated = $database->delete_teacher_subject("teachers_subjects", $teacher_subject);
        
        if ($eliminated) {
            header("Location: ../views/views_teacher.php?asignacion=correcto");
            exit(); // Agrega esta línea para evitar que se ejecute código adicional después de la redirección
        }
    }
}

// Obtiene el parámetro 'id' de la URL
$teacher_subject = $_GET['id'];

$get = $database->getSingle_subject_teacher("teachers_subjects", $teacher_subject);

?>