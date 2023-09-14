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

if(isset($_POST['submit'])){
if ($resul!=false) {
  
        $name = $resul['name'];
        $_SESSION['name'] = $name;
       
        // Redirige al usuario al dashboard u otra página
        
        header("Location: ../views/dasboard_home_preceptor.php?mensaje=correcto"); // Cambia "dashboard.php" al nombre de tu página de destino
        exit();
    } else {
        echo "credenciales incorrecta vuelve a ingresar porfavor";
    }   
    }
  
?>
