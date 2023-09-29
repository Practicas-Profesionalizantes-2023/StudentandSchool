<?php  require_once '../controllers/crud_insert_teacher.php';
      require_once '../controllers/stop_session.php';
	  require_once '../controllers/message_control.php';
      

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
					<form action="../controllers/crud_insert_teacher.php" method="post">
						<h3>Dar de Alta al Profesor</h3>
						<div class="form-group" >
                        <input type="text" class="form-control" placeholder="Ingrese el Nombre" name="name">
                        </div>
                        <input type="text" required placeholder="Ingrese el Apellido" name="surname">
                        <input type="text" required placeholder="Ingrese el Telefono" name="phone">
                        <input type="text" required placeholder="Ingrese su Email" name="email">
                        <input type="text" required placeholder="Ingrese la Direccion" name="direction">
                        <input type="text" required placeholder="Ingrese la Altura" name="height">
                        <input type="text" required placeholder="Ingrese el DNI" name="dni">
                       
                        
                        <label for="subject">Asigna el sexo</label>
                        <select required name="fk_gender_id" id="gender">
                            <?php foreach ($gender_data as $show) { ?>
                                <option value="<?php echo $show['id_gender']; ?>"><?php echo $show['details']; ?></option>
                            <?php } ?>
                        </select>
						<div class="button-container">
                            <button class="submit" name="submit">Crear Cuenta</button>
                        </div>
                        <button class="back"><a href="../views/views_internal_users.php" >volver</a></button>
                    </form>
				</div>
			
	</section>


	
</body>
</html>


