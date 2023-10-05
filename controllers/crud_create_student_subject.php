<?php
require_once '../model/query.php';
$database= new model_sql();
$student_data=$database->show_state("estudents");
$subject_data=$database->show_state("subjects");




if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["keep"])) {
  
 
        $selectedSubjects = $_POST["subjects"];

        // Obtén el ID del profesor una vez antes de entrar al bucle
        $student_id = $_POST["student"];
        
        foreach ($selectedSubjects as $subject) {
            $insert = $database->insert_student_subject($student_id,$subject);
        }
    
        if ($insert) {
            header("Location: ../views/views_crud_admin_careers.php?asignado_subject=correcto");
        }


    

}

$id_career = $_GET['id'];
  
  
$show=$database->show_date_id_career($id_career);

$get_career=$database->getUserCareer($id_career);






?>