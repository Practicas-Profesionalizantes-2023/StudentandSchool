<?php
require_once "../model/query.php";
$database = new model_sql();


if(isset($_GET['id'])){
        $id_student=$_GET['id'];
        $get_student = $database->getStudent($id_student);//funcion para mostrar la seleccion donde el id coincida
     
    } else {
        // Manejar el caso en el que no se proporciona un ID de usuario válido
        $get_student = null;
    }
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        
     
        if(isset($_POST['save_data'])){
               
        $id_student = $_POST["id_estudents"];
        $name = isset($_POST["name"]) ? $_POST["name"] : null;
        $last_name = isset($_POST["last_name"]) ? $_POST["last_name"] : null;
        $direction = isset($_POST["direction"]) ? $_POST["direction"] : null;// La siguiente línea asigna el valor de $_POST["heigth_street"] a $heigth_street si está definido, de lo contrario, asigna null.
        $height = isset($_POST["height"]) ? $_POST["height"] : null;
        $uk_dni = isset($_POST["uk_dni"]) ? $_POST["uk_dni"]: null;
        $email = isset($_POST["email"]) ? $_POST["email"] : null;// La siguiente línea asigna el valor de $_POST["heigth_street"] a $heigth_street si está definido, de lo contrario, asigna null.
        $phone = isset($_POST["phone"]) ? $_POST["phone"] : null;
       

        // Llama a la función de actualización de la base de datos
        $updated = $database->updateStudent($id_student, $name,$last_name,$direction,$height,$uk_dni,$email,$phone,);
    
        if ($updated) {
            // Redirige a la página de dashboard de administrador con un parámetro de mensaje de éxito en la URL
            header("Location: ../views/views_students.php?editado=correcto");
            exit();
        } else {
            // Hubo un error en la actualización, muestra un mensaje de error
            echo "Error al actualizar los datos.";
        }
        }

    }


?>