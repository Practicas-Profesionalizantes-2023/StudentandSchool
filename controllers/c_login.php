<?php
// Incluye el archivo de la clase Database (ajusta la ruta según tu estructura de archivos)
session_start();
require_once '../model/query.php';

// Crea una instancia de la clase Database y establece la conexión
$modelSql = new model_sql();


// Obtiene los datos del formulario
$user = $_POST['user'];
$password = $_POST['password'];

$resul=$modelSql->login($user,$password);

if ($resul!=false) {
  
        $name = $row['name'];
        $_SESSION['name'] = $name;


        // Redirige al usuario al dashboard u otra página
        
        header("Location: ../views/dasboard_home_preceptor.php?mensaje=correcto"); // Cambia "dashboard.php" al nombre de tu página de destino
        exit();
    } else {
        echo "Credenciales incorrectas. Por favor, intente de nuevo.";
    }
  
?>
