<?php
require_once '../model/query.php';

$database = new model_sql();

// Verifica si se envió el formulario de búsqueda
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Asegúrate de que se haya enviado un valor para 'search'
    if (isset($_POST['search'])) {
        // Obtiene el término de búsqueda ingresado por el usuario
        $searchTerm = $_POST['search_name'];
        $searchResults = $database->search_pre_register($searchTerm);

        // Incluye la vista HTML pasando los resultados de la búsqueda
        require_once '../views/views_crud_pre_registered.php';
        exit; // Detiene la ejecución del script después de mostrar los resultados
    }

    if (isset($_POST['copy'])) {
        $id = $_POST['copy'];
        $get_user = $database->getSingleShow("pre_registration", $id);

        // Verifica si se encontró el usuario
        if ($get_user) {
            $name = $get_user['name'];
            $last_name = $get_user['last_name'];
            $phone = $get_user['phone'];
            $mail = $get_user['mail'];
            $date = $get_user['date'];
            $dni = $get_user['dni'];
            $career = $get_user['carrer'];
            $heigth_street = $get_user['heigth_street'];
            $gender = $get_user['gender'];

            // Divide la dirección en dirección y altura
            $space_position = strrpos($heigth_street, ' ');
            $direction = ($space_position !== false) ? substr($heigth_street, 0, $space_position) : $heigth_street;
            $height = ($space_position !== false) ? substr($heigth_street, $space_position + 1) : '';

            $currentYear = date('Y');
            $currentMonth = date('m');

            if ($currentMonth >= 10) {
                $academicYearStart = $currentYear + 1;
            } else {
                $academicYearStart = $currentYear;
            }

            // Obtiene el ID de la carrera y el género
            $steal_id_career = $database->getCareerIDByName($career);
            $steal_id_gender = $database->getGenderIDByName($gender);

            // Inserta al estudiante y obtiene su ID
            $insert = $database->insertStudent($name, $last_name, $direction, $height, $dni, $mail, $phone, $academicYearStart, $steal_id_career, $date, $steal_id_gender);

            if ($insert) {
                $studentId = $database->getLastInsertId();
                $delete_transfer = $database->delete_preinscription($id);
                $careerId = $database->getCareerIdByStudentId($studentId);

                // Obtiene las materias asociadas a la carrera del estudiante
                $subjects = $database->getSubjectsByCareerId($careerId);

                // Inserta cada materia asociada al estudiante
                foreach ($subjects as $subjectId) {
                    $schoolYear = $academicYearStart;
                    $inserted = $database-> insert_student_subject($studentId, $subjectId, $schoolYear);
                }

                header("Location: ../views/views_crud_pre_registered.php?transferido=correcto");
                exit();
            }
        }
    }
}

// Si no se envió el formulario de búsqueda o no se encontraron resultados, muestra la página normal
$show_pre_register = $database->show_state("pre_registration");
require_once '../views/views_crud_pre_registered.php';
?>
