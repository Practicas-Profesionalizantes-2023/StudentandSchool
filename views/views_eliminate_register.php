<?php
require_once '../controllers/crud_eliminate_register.php';
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/eliminate_register.css">
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
        <button class="back"><a href="../views/views_crud_pre_registered.php" >volver</a></button>
    </div>
</body>
</html>