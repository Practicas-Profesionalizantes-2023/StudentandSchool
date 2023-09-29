<?php
require_once '../controllers/crud_edit_teachers.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
	<link rel="stylesheet" href="../css/create_new_user.css">
	<link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon" />
    <link rel="apple-touch-icon" href="images/apple-touch-icon.png">
	<title>institutec</title>
</head>
<body>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
<body>
	<section class="create">
		<div class="create_box">
			<div class="left">
				<div class="contact">
					<form action="../controllers/crud_edit_teachers.php" method="post">
						<h3>Editar Profesor</h3>
                        <input type="hidden" name="id_teacher" value="<?php echo $get_teacher['id_teacher'];?>">
						<input type="text" required placeholder="Edite el Nombre" name="name" value="<?php echo $get_teacher['name']; ?>">
                        <input type="text" required placeholder="Edite el Apellido" name="surname" value="<?php echo $get_teacher['surname']; ?>">
                        <input type="text" required placeholder="Edite el Telefono" name="phone" value="<?php echo $get_teacher['phone']; ?>">
                        <input type="text" required placeholder="Edite su Email" name="email" value="<?php echo $get_teacher['email']; ?>">
                        <input type="text" required placeholder="Edite la Direccion" name="direction" value="<?php echo $get_teacher['direction']; ?>">
                        <input type="text" required placeholder="Edite la Altura" name="height" value="<?php echo $get_teacher['height']; ?>">

                        
                        
                        
						<div class="button-container">
                            <button class="submit" name="submit">Actualizar</button>
                        </div>
                        <button class="back"><a href="../views/views_teacher.php" >volver</a></button>
                    </form>
				</div>
			
	</section>




</body>
</html>