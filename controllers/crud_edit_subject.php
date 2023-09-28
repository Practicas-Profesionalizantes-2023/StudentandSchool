<?php
require_once "../model/query.php";
$database = new model_sql();


if (isset($_GET['id'])) {
    $id_subject = $_GET['id'];
   
    $get_subject = $database->getSingle_subject("subjects",$id_subject);//funcion para mostrar la seleccion donde el id coincida
} else {
    // Manejar el caso en el que no se proporciona un ID de usuario válido
    $get_subject = null;
}
if ($_SERVER["REQUEST_METHOD"] === "POST") {
   
    $id_subject=$_POST['id_subject'];
    $subject_name=$_POST['subject'];
    

    

    // Llama a la función de actualización de la base de datos
    $updated = $database->update_subject($id_subject, $subject_name);

    if ($updated) {
     
      header("Location: ../views/views_crud_admin_careers.php?correcto=correcto");
        exit();
    } else {
        // Hubo un error en la actualización, muestra un mensaje de error
        echo "Error al actualizar los datos.";
    }
}