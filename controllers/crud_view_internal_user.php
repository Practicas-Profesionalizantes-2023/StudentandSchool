<?php
require_once '../model/query.php';
$database= new model_sql();
$table="internal_users";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['desability'])) {
       
        $user_id = $_POST['desability'];
      
       
        $user = $database->getUserById($table,$user_id); 

    
        if (!$user) {
            // El usuario no se encontró en la base de datos, maneja el error
            echo "Usuario no encontrado";
        } else {
            if ($user['state'] == 0) {
                // El usuario ya está deshabilitado
               header("Location: ../views/views_internal_users.php?desabilitado=error");
            } else {
                // Llamar a la función para deshabilitar el usuario
                $desability = $database->disableUser($user_id);

                if ($desability) {
                    header("Location: ../views/views_internal_users.php?desabilitado_correcto=correcto");
                } else {
                    echo "Error al deshabilitar al usuario";
                }
            }
        }
    } else if (isset($_POST['hability'])) {
        $user_id = $_POST['hability'];

        // Verificar el estado actual del usuario
        $user = $database->getUserById($table,$user_id);

        if (!$user) {
            // El usuario no se encontró en la base de datos, maneja el error
            echo "Usuario no encontrado";
        } else {
            if ($user['state'] == 1) {
                // El usuario ya está habilitado
                //echo "El usuario ya está habilitado";
                // Redirige a la página de inicio de sesión con un parámetro de error en la URL
                header("Location: ../views/views_internal_users.php?habilitado=error");
            } else {
                // Llamar a la función para habilitar el usuario
                $hability = $database->enableUser($user_id);

                if ($hability) {
                    header("Location: ../views/views_internal_users.php?habilitado_correcto=correcto");
                } else {
                    echo "Error al habilitar al usuario";
                }
            }
        }
    }


    if (isset($_POST['search'])) {
        $searchTerm = $_POST['search_name'];
        $searchResults = $database->search_internal_users($searchTerm);

        // Incluye la vista HTML pasando los resultados de la búsqueda
        require_once '../views/views_internal_users.php';
        exit; // Detiene la ejecución del script después de mostrar los resultados
    }
}


$union=$database->union_table();
'../views/views_crud_pre_registered.php';




?>