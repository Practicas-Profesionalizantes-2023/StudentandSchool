<?php
require_once '../model/query.php';

$database = new model_sql();

// Verifica si se envió el formulario de búsqueda
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Asegúrate de que se haya enviado un valor para 'search'
    if (isset($_POST['search'])) {
        // Obtiene el término de búsqueda ingresado por el usuario
        $searchTerm = $_POST['search_name'];
        $searchResults = $database->search_pre_register($searchTerm);

       

        // Incluye la vista HTML pasando los resultados de la búsqueda
        require_once '../views/views_crud_pre_registered.php';
        exit; // Detiene la ejecución del script después de mostrar los resultados
    }

    if(isset($_POST['copy'])){
        $id=$_POST['copy'];
        $get_user = $database->getSingleShow("pre_registration",$id);//funcion para mostrar la seleccion donde el id coincida
        $name=$get_user['name'];
        $last_name=$get_user['last_name'];
        $phone=$get_user['phone'];
        $mail=$get_user['mail'];
        $date=$get_user['date'];
        $dni=$get_user['dni'];
        $career=$get_user['carrer'];
        $heigth_street=$get_user['heigth_street'];
        $gender=$get_user['gender'];
        // Busca el último espacio en blanco en la cadena
       
        $space_position = strrpos($heigth_street, ' ');

        if ($space_position !== false) {
            // Si se encuentra un espacio en blanco
            $direction = substr($heigth_street, 0, $space_position); // Obtiene la dirección antes del último espacio
            $height = substr($heigth_street, $space_position + 1); // Obtiene la altura después del último espacio
        } else {
            // Si no se encuentra un espacio en blanco, asume que es solo la dirección
            $direccion = $heigth_street;
            $altura = ''; // Deja la altura vacía
        }
        
        $steal_id_career=$database->getCareerIDByName($career);
        $steal_id_gender=$database-> getGenderIDByName($gender);
        $insert=$database->insertStudent($name,$last_name,$direction,$height,$dni,$mail,$phone,$steal_id_career,$date,$steal_id_gender);
        if($insert){
            // Redirige a la página de dashboard de administrador con un parámetro de mensaje de éxito en la URL
            $delete_transfer=$database->delete_preinscription($id);
           header("Location: ../views/views_crud_pre_registered.php?transferido=correcto");

            
        }
    }

}

// Si no se envió el formulario de búsqueda o no se encontraron resultados, muestra la página normal
$show_pre_register = $database->show_state("pre_registration");
'../views/views_crud_pre_registered.php';
?>
