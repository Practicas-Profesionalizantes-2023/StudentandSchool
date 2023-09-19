<?php
require_once '../model/query.php';
$database = new model_sql;
$rol = $database->show_table("rol");

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $name = $_POST['name'];
    $dni = $_POST['dni'];
    $password = $_POST['password'];
    $hash_password = password_hash($password, PASSWORD_DEFAULT);
    $mail=$_POST['mail'];
    $fk_rol_id = $_POST['rol'];

    // Validar que los campos no estén vacíos
    if (empty($name) || empty($dni) || empty($hash_password) || empty($fk_rol_id)||empty($mail)) {
        // Al menos uno de los campos está vacío, muestra un mensaje de error.
        echo "Todos los campos son obligatorios. Por favor, llene todos los campos.";
    } else {
        // Verifica duplicados antes de intentar la inserción
        $checkforduplicated = $database->checkForDuplicates("internal_users", $dni,$mail);
        if ($checkforduplicated !== false) {
            // Se encontraron duplicados, muestra el mensaje personalizado
            echo $checkforduplicated;
        } else {
            // No se encontraron duplicados, procede con la inserción
            $insert_usser = $database->create_account($name, $dni, $hash_password,$mail, $fk_rol_id);

            if ($insert_usser) {
                // Redirige a la página de dashboard de administrador con un parámetro de mensaje de éxito en la URL
                header("Location: ../views/create_new_user.php?creado=correcto");
                exit(); // Asegura que no se ejecuten más instrucciones después de la redirección
            } else {
                echo "Error en la inserción: No se pudo crear la cuenta.";
            }
        }
    }
}
?>
