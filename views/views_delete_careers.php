<?php 
require_once '../controllers/delete_careers.php';



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
        <form action="../controllers/delete_careers.php" method="post">
        <input type="hidden" name="id_career" value="<?php echo $get_career['id_career'];?>">
            <button type="submit" class="btn-delete" name="delete">Eliminar</button>
        </form>
        <button class="back"><a href="../views/views_crud_admin_careers.php" >volver</a></button>
    </div>
</body>
</html>