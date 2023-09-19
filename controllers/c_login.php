<?php
// Incluye el archivo de la clase Database (ajusta la ruta según tu estructura de archivos)
session_start();
require_once '../model/query.php';

// Crea una instancia de la clase Database y establece la conexión
$modelSql = new model_sql();

// Obtiene los datos del formulario
$user = $_POST['user'];
$password = $_POST['password'];

$resul = $modelSql->login($user, $password);

if (isset($_POST['submit'])) {
    if ($resul != false) {
        $name = $resul['name'];
        $rol = $resul['fk_rol_id'];
        $state = $resul['state'];
        $_SESSION['name'] = $name;
        $_SESSION['fk_rol_id'] = $rol;

        if ($state == 1) {
            // El estado de la cuenta es activo
            $_SESSION['state'] = $state;
            switch ($rol) {
                case 1:
                    // Redirige al usuario con rol 1 a una página específica
                    header("Location: ../views/dasboard_home_preceptor.php?mensaje=correcto");
                    exit();
                case 2:
                    // Redirige al usuario con rol 2 a otra página específica
                    header("Location: ../views/dasboard_home_rol.php?mensaje=correcto");
                    exit();
                case 3:
                    // Redirige al usuario con rol 3 a otra página específica
                    header("Location: ../views/dasboard_home_rol.php?mensaje=correcto");
                    exit();
                
            }
        } else {
            // El estado de la cuenta está desactivado
            //echo "Su cuenta está desactivada comuniquese con institutec";
           // Redirige a la página de inicio de sesión con un parámetro de error en la URL
           // Redirige a la página de inicio de sesión con un parámetro de error en la URL
           header("Location: ../views/login.php?desactivo=error");
          
        }
    } else {
        //echo "Credenciales incorrectas. Por favor, inténtelo de nuevo.";
        // Redirige a la página de inicio de sesión con un parámetro de error en la URL
      // Redirige a la página de inicio de sesión con un parámetro de error en la URL
      header("Location: ../views/login.php?no_coinciden=error");
    }
}
?>

