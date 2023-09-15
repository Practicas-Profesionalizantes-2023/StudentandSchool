<?php

 require_once  '../controllers/crud_edit_controller.php'; 


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/edit.css">
    <title>Editar Usuario</title>
</head>
<body>
    <form action="../controllers/crud_edit_controller.php" method="post">
        <!-- Agrega los campos ocultos para mantener el ID del usuario -->
        <input type="hidden" name="user_id" value="<?php echo $get_user['id_pre_user']; ?>">
        
        <!-- Muestra los datos del usuario en los campos de entrada -->
        <label for="name">Nombre:</label>
        <input type="text" name="name" id="name" value="<?php echo $get_user['name']; ?>"><br>
        
        <label for="last_name">Apellido:</label>
        <input type="text" name="last_name" id="last_name" value="<?php echo $get_user['last_name']; ?>"><br>
        
        <label for="phone">Teléfono:</label>
        <input type="text" name="phone" id="phone" value="<?php echo $get_user['phone']; ?>"><br>
        
        <label for="mail">Email:</label>
        <input type="text" name="mail" id="mail" value="<?php echo $get_user['mail']; ?>"><br>
        
        
        
                <label for="carrer">Carrera:</label>
                <select name="carrer" id="carrer">
                    <?php foreach ($show as $carrer) { ?>
                        <option value="<?php echo $carrer['career_name']; ?>"><?php echo $carrer['career_name']; ?></option>
                    <?php } ?>
                </select>
        
        <label for="heigth_street">Calle y Altura:</label>
        <input type="text" name="heigth_street" id="heigth_street" value="<?php echo $get_user['heigth_street']; ?>"><br>
        
        
        
        <!-- Botón para enviar el formulario -->
        <button type="submit">Actualizar</button>
        <button class="back"><a href="../views/views_crud_pre_registered.php" >volver</a></button>
    </form>
    

</body>
</html>
