<?php
require_once "../model/query.php";
$database = new model_sql();// Si no se encontraron datos o hubo un error, devuelve un mensaje de error

if (isset($_GET['id'])) {
    $id_career = $_GET['id'];
    
    $get_career = $database->getUserCareer($id_career);//funcion para mostrar la seleccion donde el id coincida
} else {
    // Manejar el caso en el que no se proporciona un ID de usuario válido
    $get_career = null;
}
if ($_SERVER["REQUEST_METHOD"] === "POST") {
   
    // Verifica si se ha enviado el formulario
    $id_career = $_POST["id_career"];
    $career = isset($_POST["career"]) ? $_POST["career"] : null;
    $title = isset($_POST["title"]) ? $_POST["title"] : null;
    $subjects = isset($_POST["subjects"]) ? $_POST["subjects"] : null;// La siguiente línea asigna el valor de $_POST["heigth_street"] a $heigth_street si está definido, de lo contrario, asigna null.

    

    // Llama a la función de actualización de la base de datos
    $updated = $database->updateUserCareer($id_career, $career, $title, $subjects);

    if ($updated) {
        // La actualización fue exitosa, redirige a una página de éxito o muestra un mensaje de éxito
        // Redirige a la página de dashboard de administrador con un parámetro de mensaje de éxito en la URL
        header("Location: ../views/views_crud_admin_careers.php?modifico=correcto");
        exit();
    } else {
      
       // Redirige a la página de inicio de sesión con un parámetro de error en la URL
       header("Location: ../views/views_crud_admin_careers.php?no_se_actualizo=error");
       exit();
    }
}
?>
