<?php 
require_once '../model/query.php';
$database = new model_sql();



if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['delete'])){//le dice que si el boton presionado el nombre es delete 
        $id_career = $_POST['id_career'];//y lo que le paso el post es el id_career
        
        /*en eliminated le guardo la database con la ejecucion de la funcion 
        y les paso los parametros de la tabla y la bariable $id_career me tae el id
        del $_POST que viene del boton de la vista*/
        $eliminated = $database->eliminated_career("careers", $id_career);
        
        if ($eliminated) {
            header("Location: ../views/views_crud_admin_careers.php");
            exit(); // Agrega esta línea para evitar que se ejecute código adicional después de la redirección
        } 
    }
}

$id_careers = $_GET['id'];//traigp el id del formulario
$get_career = $database->getSingleShowCareer("careers", $id_careers);//aca va la tabla



?>
        