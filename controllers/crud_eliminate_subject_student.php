<?php
require_once '../model/query.php';
$database = new model_sql();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['delete'])) { // Verifica si el botón 'delete' se ha presionado
        $id_student_subject = $_POST['id_student_subject']; // Obtiene el id_teacher_subject del formulario
       
        // Elimina el registro de la base de datos
        $eliminated = $database->delete_students_subject($teacher_subject);
        
        if ($eliminated) {
          header("Location: ../views/views_crud_admin_careers.php?borrado=correcto");
            exit(); // Agrega esta línea para evitar que se ejecute código adicional después de la redirección
        }
    }
}

// Obtiene el parámetro 'id' de la URL
$student_subject = $_GET['id'];

$get = $database->getSingle_subject_students($student_subject);

?>