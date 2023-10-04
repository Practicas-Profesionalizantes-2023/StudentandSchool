<?php
require_once '../controllers/crud_edit_student.php';

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
					<form action="../controllers/crud_edit_student.php" method="post">
						<h3>Editar Alumnos</h3>
                        <input type="hidden" name="id_estudents" value="<?php echo $get_student['id_estudents'];?>">
						<input type="text" required placeholder="Edite el Nombre" name="name" value="<?php echo $get_student['name']; ?>">
                        <input type="text" required placeholder="Edite el Apellido" name="last_name" value="<?php echo $get_student['last_name']; ?>">
                        <input type="text" required placeholder="Edite el Direccion" name="direction" value="<?php echo $get_student['direction']; ?>">
                        <input type="text" required placeholder="Edite su Altura" name="height" value="<?php echo $get_student['height']; ?>">
                        <input type="text" required placeholder="Edite el DNI" name="uk_dni" value="<?php echo $get_student['uk_dni']; ?>">
                        <input type="text" required placeholder="Edite el Email" name="email" value="<?php echo $get_student['email']; ?>">
                        <input type="text" required placeholder="Edite el Telefono" name="phone" value="<?php echo $get_student['phone']; ?>">
                        <input type="text" required placeholder="Edite la Fecha de Nacimiento" name="birth_date" value="<?php echo $get_student['birth_date']; ?>">
                        
                        
                        <label for="subject">Cambie carrera</label>
                        <select required name="fk_career_id" id="career">
                            <?php foreach ($data_career  as $show) { ?>
                                <option value="<?php echo $show['id_career']; ?>"><?php echo $show['career_name']; ?></option>
                            <?php } ?>
                        </select>
                        <label for="subject">Cambie sexo</label>
                        <select required name="id_gender" id="gender">
                            <?php foreach ($data_gender as $show) { ?>
                                <option value="<?php echo $show['id_gender']; ?>"><?php echo $show['details']; ?></option>
                            <?php } ?>
                        </select>
                        
						<div class="button-container">
                            <button class="submit" name="submit">Actualizar</button>
                        </div>
                        <button class="back"><a href="../views/views_teacher.php" >volver</a></button>
                    </form>
				</div>
			
	</section>




</body>
</html>