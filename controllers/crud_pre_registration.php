<?php
//require_once "mail.php";
require_once "../model/query.php";


$database = new model_sql();
$carrerData = $database->show_state("careers"); // Obtener datos de carreras
$genderData = $database->show_table("genders"); // Obtener datos de carreras

if (isset($save_data)) {
    $phone_max_length = 10;
    $dni_max_length = 8;

    $nam_pre = $_POST['name'];
    $last_pre = $_POST['l_name'];
    $phone_pre = $_POST['phone'];
    $email_pre = $_POST['email'];
    $date_pre = $_POST['date'];
    $dni_pre = $_POST['dni'];
    $carrer_pre = $_POST['carrer'];
    $street_pre = $_POST['street'];
    $gender_pre = $_POST['gender'];

    // Validar que los campos no estén vacíos
    if (empty($nam_pre) || empty($last_pre) || empty($phone_pre) || empty($email_pre) || empty($date_pre) || empty($dni_pre) || empty($carrer_pre) || empty($street_pre) || empty($gender_pre)) {
        // Al menos uno de los campos está vacío, muestra un mensaje de error.
        header("Location: ../views/pre_register.php?campo=error");
    } else {
        // Verifica duplicados antes de intentar la inserción
        $checkforduplicated = $database->checkForDuplicates("pre_registration", $dni_pre, $email_pre);
        if ($checkforduplicated !== false) {
            // Se encontraron duplicados, muestra el mensaje personalizado
            echo $checkforduplicated;
        } else {
            // No se encontraron duplicados, procede con la inserción

            // Valida la longitud del teléfono
            if (strlen($phone_pre) > $phone_max_length) {
                echo "El número de teléfono no puede tener más de $phone_max_length dígitos.";
            }
            // Valida la longitud del DNI
            if (strlen($dni_pre) > $dni_max_length) {
                echo "El DNI no puede tener más de $dni_max_length dígitos.";
            }

            // Valida la fecha de nacimiento
            $birthdate = strtotime($date_pre);
            $minimumAge = strtotime('-17 years'); // Calcula la fecha mínima para ser mayor de 17 años

            if ($birthdate <= $minimumAge) {
                // La persona es mayor de 17 años, procede con la inserción
                $insert = $database->pre_registration($nam_pre, $last_pre, $phone_pre, $email_pre, $date_pre, $dni_pre, $carrer_pre, $street_pre, $gender_pre);

                if ($insert) {
                    // Parte de envío de correo electrónico
                    require_once 'mail.php';
                } else {
                    echo "Hubo un error al guardar los datos en la base de datos.";
                }
            } else {
                echo "Debes ser mayor de 17 años para ingresar la fecha de nacimiento.";
            }
        }
    }
}

?>