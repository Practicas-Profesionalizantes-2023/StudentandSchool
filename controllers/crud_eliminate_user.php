<?php
require_once '../model/query.php';

$database = new model_sql();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['delete'])) {
        $user_id = $_POST['id_user'];
        $eliminated = $database->deleteUserData("internal_users", $user_id);
        
        if ($eliminated) {
            //header("Location: ../views/views_internal_users.php");
            
            header("Location: ../views/views_internal_users.php?eliminado=correcto");
            exit();
        } 
    }
}

$user = $_GET['id_user'];
$get_user = $database->getSingleuser("internal_users",$user);


?>
