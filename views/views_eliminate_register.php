<?php
require_once '../controllers/crud_eliminate_register.php';
/*$pre_user_id = $_GET['id_pre_user'];
   
$get_user = $database->getSingleShow("pre_registration",$pre_user_id);//funcion para mostrar la seleccion donde el id coincida
*/
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/barnavfooter.css">   
    <link rel="stylesheet" href="../assets/css/warning_delete.css">
    <title>Borrar</title>
</head>
<body>
    <div class="advertencia">
        <h2>Advertencia</h2>
        <p>¿Seguro que desea eliminar este elemento?</p>
        <form action="../controllers/crud_eliminate_register.php" method="post">
        <input type="hidden" name="id_pre_user" value="<?php echo $get_user['id_pre_user'];?>">
            <button type="submit" class="btn-delete" name="delete">Eliminar</button>
        </form>
    </div>
</body>
</html>