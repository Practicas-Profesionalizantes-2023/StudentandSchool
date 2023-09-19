<?php
session_start();
require_once '../model/query.php';
$database= new model_sql();
$table="internal_users";
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $password=$_POST['password'];
    $repeat=$_POST['repeat_password'];
    $hash_password = password_hash($password, PASSWORD_DEFAULT); 
   
    if($password!=$repeat){
       
       header("Location: ../views/views_changed_password.php?no_coinciden=error");
    }else{
        $user_id=$_SESSION['id_user'];
        $element = $database->getSingleuser($table,$user_id);
        
        if($element){
            $update=$database->update_password($table,$user_id,$hash_password);

            if($update){
                
                header("Location: ../views/login.php?cambio=correcto");
            }else{
                echo "no se pudo actualizar la clave";
            }

        }
        
    }


}


?>