<?php
require_once "../model/query.php";
$database= new model_sql();

/*$show_teacher=$database->show_state("teachers");*/
$show_subject=$database->show_state("subjects");
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["assign"])) {
    $selectedSubjects = $_POST["subjects"];

    // Obtén el ID del profesor una vez antes de entrar al bucle
    $teacherId = $_POST["teacher"];
 
    foreach ($selectedSubjects as $subject) {
        $insert = $database->insert_subject_teacher( $subject,$teacherId);
    }

    if ($insert) {
        header("Location: ../views/views_teacher.php?asignado=correcto");
    }
}

$id_teacher = $_GET['id'];
$get_teacher=$database-> getUserTeacher($id_teacher);

?>
