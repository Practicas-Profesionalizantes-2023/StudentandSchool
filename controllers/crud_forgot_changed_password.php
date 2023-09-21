<?php
session_start();
require_once '../model/query.php';
$database = new model_sql();
$table = "internal_users";
$dni=$_SESSION['dni'];
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $password = $_POST["password"];
    $repeat_password = $_POST["repeat_password"];

    // Verifica que las contraseñas coincidan.
    if ($password === $repeat_password) {
        // Actualiza la contraseña en la base de datos aquí.
        $hash_password = password_hash($password, PASSWORD_DEFAULT);

        $update =$database->forgot_password($table, $dni, $hash_password);
        
        if ($update) {
            // Contraseña actualizada con éxito
            header("Location: ../views/login.php?cambio_exito=correcto");
            exit();
        } else {
            // Error al actualizar la contraseña
            header("Location: ../views/login.php?error=error");
            exit();
        }
    } else {
        // Contraseñas no coinciden
        header("Location: ../views/forgot_password.php?no_coinciden=error");
        exit();
    }
}?>