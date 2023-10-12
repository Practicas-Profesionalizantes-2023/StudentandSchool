<?php
require_once '../model/query.php';
$database= new model_Sql();
$show_state=$database->show_state("careers");

// Suponiendo que tienes un formulario para ingresar los detalles de la materia
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $subject_name = $_POST['Subject'];
    $carrer_id=$_POST['career'];
    $details=$_POST['details'];
    $year=date('Y');
  
if(!empty($subject_name)){
    // Inserta la nueva materia en la base de datos y asocia la carrera
    $insert=$database->insert_subject($subject_name,$details,$year,$carrer_id);
    
    if($insert){
        // Redirige a la página de dashboard de administrador con un parámetro de mensaje de éxito en la URL
        header("Location: ../views/views_crud_admin_careers.php?creo=correcto");
    }
    
}else{
 // Redirige a la página de inicio de sesión con un parámetro de error en la URL
 header("Location: ../views/create_subject.php?no_coinciden=error");
}

}



?>