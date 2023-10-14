<?php

require_once '../model/query.php';

$database = new model_sql();
$data_career = $database->show_state("careers");
$data_gender = $database->show_table("genders");
$union_Student = $database->union_Student_gender_career("estudents");
$phone_max_length = 10;
$dni_max_length = 8;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $last_name = $_POST['last_name'];
    $direction = $_POST['direction'];
    $height = $_POST['height'];
    $uk_dni = $_POST['uk_dni'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $date_pre = $_POST['birth_date'];
    $fk_career_id = $_POST['fk_career_id'];
    $fk_id_gender = $_POST['id_gender'];
    $currentYear = date('Y');
    $currentMonth = date('m');
    $minimumAge = strtotime('-17 years'); // Fecha mínima para ser mayor o igual a 17 años
    if(!empty($phone)&&!empty($uk_dni)){
    if (strlen($phone) > $phone_max_length  ||strlen($phone) <$phone_max_length) {
        header("Location: ../views/views_students.php?telefono_digito=error");
        exit();
    }
    // Valida la longitud del DNI
    if (strlen($uk_dni) > $dni_max_length ||strlen($uk_dni) <$dni_max_length) {
        header("Location: ../views/views_students.php?dni_digito=error");
        exit();
    }

    if ($currentMonth >= 10) {  
        $academicYearStart = $currentYear + 1;
    } else {
        $academicYearStart = $currentYear;
    }
    }
    $keep = $_POST['keep'];
    $birth_date = strtotime($date_pre);

  // ... (código existente)

if (isset($keep)) {
   

    if ($birth_date <= $minimumAge) {
        // Formatea la fecha en el formato correcto 'Y-m-d H:i:s'
        $formatted_birth_date = date('Y-m-d H:i:s', $birth_date);
        
        // La persona es mayor o igual a 17 años, procede con la inserción
        $insert = $database->insertStudent($name, $last_name, $direction, $height, $uk_dni, $email, $phone, $academicYearStart, $fk_career_id, $formatted_birth_date, $fk_id_gender);
        if ($insert) {
            // Redirige a la página de dashboard de administrador con un parámetro de mensaje de éxito en la URL
            header("Location: ../views/views_students.php?insertado=correcto");
            exit(); // Termina el script después de la redirección
        } else {
            echo "Hubo un error al guardar los datos en la base de datos.";
        }
    } else {
        header("Location: ../views/views_students.php?edad=error");
        exit();
    }
}

}    
?>
