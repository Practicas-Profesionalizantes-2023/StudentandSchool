<?php
require_once "../model/query.php";
$database = new model_sql();
$show=$database->show_state("careers");//llama la tabla carreras para mostrarlas

if (isset($_GET['id_pre_user'])) {
    $pre_user_id = $_GET['id_pre_user'];
    
    $get_user = $database->getSingleShow("pre_registration",$pre_user_id);//funcion para mostrar la seleccion donde el id coincida
} else {
    // Manejar el caso en el que no se proporciona un ID de usuario válido
    $get_user = null;
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
  


    if(isset($_POST['save_data'])){

     $phone_max_length=10;
        
    // Verifica si se ha enviado el formulario
    $user_id = $_POST["user_id"];
    $name = isset($_POST["name"]) ? $_POST["name"] : null;
    $last_name = isset($_POST["last_name"]) ? $_POST["last_name"] : null;
    $phone = isset($_POST["phone"]) ? $_POST["phone"] : null;
    $mail = isset($_POST["mail"]) ? $_POST["mail"] : null;
    $career = isset($_POST["carrer"]) ? $_POST["carrer"] : null;
    $heigth_street = isset($_POST["heigth_street"]) ? $_POST["heigth_street"] : null;// La siguiente línea asigna el valor de $_POST["heigth_street"] a $heigth_street si está definido, de lo contrario, asigna null.

    if (strlen($phone) > $phone_max_length  ||strlen($phone) <$phone_max_length) {
        header("Location: ../views/views_crud_pre_registered.php?telefono_digito=error");
        exit();
    }
    // Llama a la función de actualización de la base de datos
    $updated = $database->updateUserData($user_id, $name, $last_name, $phone, $mail, $career, $heigth_street);

    if ($updated) {
        
        header("Location: ../views/views_crud_pre_registered.php?editado=correcto");
        exit;
    } else {
        echo "Error al actualizar los datos.";
    }
    }
}



?>
