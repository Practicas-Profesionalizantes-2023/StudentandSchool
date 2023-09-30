<?php 
require_once '../model/query.php';
$database = new model_sql();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['delete'])){//le dice que si el boton presionado el nombre es delete 
        $id_teacher = $_POST['id_teacher'];//y lo que le paso el post es el id_teacher
        
        /*en eliminated le guardo la database con la ejecucion de la funcion 
        y les paso los parametros de la tabla y la bariable $id_teacher me tae el id
        del $_POST que viene del boton de la vista*/
        $eliminated = $database->eliminated_Teacher("teachers", $id_teacher);
        
        if ($eliminated) {
            
            header("Location: ../views/views_teacher.php?se_ah_borrado=correcto");
            exit(); // Agrega esta línea para evitar que se ejecute código adicional después de la redirección
        } 
    }
}
$id_teachers = $_GET['id'];//traigp el id del formulario
$get_teacher = $database->getSingleShowTeacher("teachers", $id_teachers);//aca va la tabla
?>