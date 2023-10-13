<?php
require_once "../model/query.php";
$database = new model_sql();


if(isset($_GET['id'])){
        $id_teacher=$_GET['id'];
        $get_teacher = $database->getUserTeacher($id_teacher);//funcion para mostrar la seleccion donde el id coincida
    } else {
        // Manejar el caso en el que no se proporciona un ID de usuario válido
        $get_teacher = null;
    }
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
       
        // Verifica si se ha enviado el formulario
        $phone_max_length = 10;
        $id_teacher = $_POST["id_teacher"];
        $name = isset($_POST["name"]) ? $_POST["name"] : null;
        $surname = isset($_POST["surname"]) ? $_POST["surname"] : null;
        $phone = isset($_POST["phone"]) ? $_POST["phone"] : null;// La siguiente línea asigna el valor de $_POST["heigth_street"] a $heigth_street si está definido, de lo contrario, asigna null.
        $mail = isset($_POST["mail"]) ? $_POST["mail"]: null;
        $direction = isset($_POST["direction"]) ? $_POST["direction"] : null;
        $height = isset($_POST["height"]) ? $_POST["height"]: null;
        $keep=$_POST['save_data'];
      

        if(isset($keep)){

            if (strlen($phone) > $phone_max_length  ||strlen($phone) <$phone_max_length) {
                header("Location: ../views/views_teacher.php?telefono_digito=error");
                exit();
            }
        // Llama a la función de actualización de la base de datos
        $updated = $database->updateUserTeacher($id_teacher, $name,$surname,$phone,$mail,$direction, $height);
    
        if ($updated) {
           header("Location: ../views/views_teacher.php?editado=correcto");
            exit;
        } else {
            // Hubo un error en la actualización, muestra un mensaje de error
            echo "Error al actualizar los datos.";
        }
        }
        
     
        }


?>