<?php
require_once "../model/query.php";
$database = new model_sql();
$show=$database->show_table("careers");//llama la tabla carreras para mostrarlas

if (isset($_GET['id_pre_user'])) {
    $pre_user_id = $_GET['id_pre_user'];
    
    $get_user = $database->getUserData($pre_user_id);//funcion para mostrar la seleccion donde el id coincida
} else {
    // Manejar el caso en el que no se proporciona un ID de usuario válido
    $get_user = null;
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
   
    // Verifica si se ha enviado el formulario
    $user_id = $_POST["user_id"];
    $name = isset($_POST["name"]) ? $_POST["name"] : null;
    $last_name = isset($_POST["last_name"]) ? $_POST["last_name"] : null;
    $phone = isset($_POST["phone"]) ? $_POST["phone"] : null;
    $mail = isset($_POST["mail"]) ? $_POST["mail"] : null;
    $career = isset($_POST["carrer"]) ? $_POST["carrer"] : null;
    $heigth_street = isset($_POST["heigth_street"]) ? $_POST["heigth_street"] : null;// La siguiente línea asigna el valor de $_POST["heigth_street"] a $heigth_street si está definido, de lo contrario, asigna null.

    

    // Llama a la función de actualización de la base de datos
    $updated = $database->updateUserData($user_id, $name, $last_name, $phone, $mail, $career, $heigth_street);

    if ($updated) {
        // La actualización fue exitosa, redirige a una página de éxito o muestra un mensaje de éxito
        header("Location: ../views/views_crud_pre_registered.php");
        exit;
    } else {
        // Hubo un error en la actualización, muestra un mensaje de error
        echo "Error al actualizar los datos.";
    }
}



?>
