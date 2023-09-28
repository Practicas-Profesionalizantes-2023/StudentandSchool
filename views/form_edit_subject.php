<?php

 require_once  '../controllers/crud_edit_subject.php'; 
 require_once '../controllers/stop_session.php';
 session_start();
 checkSession();
 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/edit.css">
    <title>institutec</title>
</head>
<body>
    <form action="../controllers/crud_edit_subject.php" method="post">
        <!-- Agrega los campos ocultos para mantener el ID del usuario -->
        <input type="hidden" name="id_subject" value="<?php echo $get_subject['id_subjects']; ?>">
        
        <!-- Muestra los datos del usuario en los campos de entrada -->
        <label for="name">Materia</label>
        <input type="text" name="subject" id="name" value="<?php echo $get_subject['subject_name']; ?>">
        <button type="submit">Actualizar</button>
        <button class="back"><a href="../views/views_crud_admin_careers.php" >volver</a></button>
    </form>
    

</body>
</html>