<?php
require_once '../model/query.php';
$database= new model_sql();

$subject_data=$database->show_state("subjects");




if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["keep"])) {
  
 
        $selectedSubjects = $_POST["subjects"];

        // Obtén el ID del profesor una vez antes de entrar al bucle
        $subject_id = $_POST["subject"];
        
        foreach ($selectedSubjects as $subject) {
            $insert = $database->insert_Correlatives($subject_id,$subject);
        }
    
        if ($insert) {
            header("Location: ../views/views_crud_correlatives.php?asignado_correlative=correcto");
        }


    

}








?>