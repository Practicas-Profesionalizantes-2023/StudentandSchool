<?php 
require_once '../model/query.php';
$database = new model_sql();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['delete'])){//le dice que si el boton presionado el nombre es delete 
        $id_student = $_POST['id_estudent'];//y lo que le paso el post es el id_student
        
        /*en eliminated le guardo la database con la ejecucion de la funcion 
        y les paso los parametros de la tabla y la bariable $id_student me tae el id
        del $_POST que viene del boton de la vista*/
        $eliminated = $database->eliminated_Student("estudents", $id_student);
        
        if ($eliminated) {
            
            header("Location: ../views/views_students.php?borrado=correcto");
            exit(); // Agrega esta línea para evitar que se ejecute código adicional después de la redirección
        } 
    }
 
}

$id_estudents = $_GET['id'];//traigp el id del formulario
$get_student = $database->getStudent($id_estudents);//aca va la tabla


?>