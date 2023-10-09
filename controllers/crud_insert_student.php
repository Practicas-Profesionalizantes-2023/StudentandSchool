<?php

require_once '../model/query.php';

$database = new model_sql();
$data_career =$database->show_state("careers");
$data_gender =$database->show_table("genders");
$union_Student=$database->union_Student_gender_career("estudents");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $name = $_POST['name'];
    $last_name = $_POST['last_name'];
    $direction=$_POST['direction'];
    $height=$_POST['height'];
    $uk_dni=$_POST['uk_dni'];
    $email=$_POST['email'];
    $phone=$_POST['phone'];
    $birth_date=$_POST['birth_date'];
    $fk_career_id=$_POST['fk_career_id'];
    $fk_id_gender=$_POST['id_gender'];
   
    $keep=$_POST['keep'];

    if (isset($keep)) {
        $insert=$database->insertStudent($name,$last_name,$direction,$height,$uk_dni,$email,$phone,$fk_career_id,$birth_date,$fk_id_gender);
        if($insert){
            // Redirige a la página de dashboard de administrador con un parámetro de mensaje de éxito en la URL
            header("Location: ../views/views_students.php?insertado=correcto");
            
        }

}
}
    ?>
