<?php
session_start();
require_once '../model/query.php';
$database = new model_sql();

$table = "internal_users";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $dni = $_POST["dni"];
    $_SESSION['dni']=$dni;
    $user = $database->getSingleuserByDNI($table, $dni);
     
    if ($user) {
        // El DNI coincide, redirigir al usuario a otra página
        header("Location: ../views/forgot_changed_password.php"); // Reemplaza con la URL de la página a la que deseas redirigir
        exit();
    } else {
        // El DNI no coincide, mostrar un mensaje de error
       header("Location: ../views/view_i_forgot_password.php?no_coinciden=error");
    }
}
?>
