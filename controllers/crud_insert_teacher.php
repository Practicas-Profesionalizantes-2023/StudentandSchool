<?php

require_once '../model/query.php';

$database = new model_sql();
$gender_data=$database->show_table("genders");
$teacherData=$database->show_state("teachers");

    $name = $_POST['name'];
    $surname = $_POST['surname'];
    $phone=$_POST['phone'];
    $email=$_POST['email'];
    $direction=$_POST['direction'];
    $height=$_POST['height'];
    $dni=$_POST['dni'];
    $fk_gender_id=$_POST['fk_gender_id'];
    $keep=$_POST['keep'];
   
    if(isset($keep)){
    $checkforduplicated = $database->checkForDuplicates("teachers",$dni, $email);
    if($checkforduplicated !== false){
        echo $checkforduplicated;
    }else{
      
        $insert=$database->insertTeacher($name, $surname, $phone, $email,$direction,$height,$dni,$fk_gender_id);
        if($insert){
         // Redirige a la página de dashboard de administrador con un parámetro de mensaje de éxito en la URL
         header("Location: ../views/views_teacher.php?creado=correcto");
            
        }
    
    }
    }
    ?>
