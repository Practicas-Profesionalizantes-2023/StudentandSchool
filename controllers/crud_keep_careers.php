<?php

require_once '../model/query.php';

$database = new model_sql();


    $carers = $_POST['careers'];
    $title = $_POST['title'];
    $amount_subjects=$_POST['amoun_subjects'];
    $keep=$_POST['keep'];
    if (isset($keep)) {
        $insert=$database->insertCareer($carers, $title, $amount_subjects);
        if($insert){
            // Redirige a la página de dashboard de administrador con un parámetro de mensaje de éxito en la URL
            header("Location: ../views/views_crud_admin_careers.php?inserto=correcto");
            
        }
    }
 ?>