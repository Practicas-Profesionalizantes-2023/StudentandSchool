<?php
require_once "../model/query.php";
$database = new model_sql();
$show_subject=$database->show_state("subjects");
$show_teacher=$database->show_state("teachers");

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['keep'])) {
    $id_Subject_teacher = $_POST['id_teacher_subject'];
    $subjects = $_POST['subjects'];
    
    // Llama a la función de actualización de la base de datos
    $updated = $database->update_subject_teacher($id_Subject_teacher, $subjects);

    if ($updated) {
        header("Location: ../views/views_teacher.php?actualizar=correcto");
        exit();
    } else {
        // Hubo un error en la actualización, muestra un mensaje de error
        echo "Error al actualizar los datos.";
    }
}


$teacher_subject = $_GET['id'];
$get = $database->getSingle_subject_teacher("teachers_subjects", $teacher_subject);