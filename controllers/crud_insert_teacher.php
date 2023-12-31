<?php

require_once '../model/query.php';

$database = new model_sql();
$gender_data=$database->show_table("genders");
$teacherData=$database->show_state("teachers");
$phone_max_length = 10;
$dni_max_length = 8;

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
    
        if (strlen($phone) > $phone_max_length  ||strlen($phone) <$phone_max_length) {
            header("Location: ../views/views_students.php?telefono_digito=error");
            exit();
        }
        // Valida la longitud del DNI
        if (strlen($dni) > $dni_max_length ||strlen($dni) <$dni_max_length) {
            header("Location: ../views/views_students.php?dni_digito=error");
            exit();
        }
    $checkforduplicated = $database->checkForDuplicates("teachers",$dni, $email);
    if($checkforduplicated !== false){
        header("Location: ../views/views_teacher.php?dni_email=error");
        exit();
    }else{
      
        $insert=$database->insertTeacher($name, $surname, $phone, $email,$direction,$height,$dni,$fk_gender_id);
        if($insert){
         // Redirige a la página de dashboard de administrador con un parámetro de mensaje de éxito en la URL
         header("Location: ../views/views_teacher.php?creado=correcto");
            
        }
    
    }
    }

    
    ?>
