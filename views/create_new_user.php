<?php require_once '../controllers/crud_create_new_user.php';
      require_once '../controllers/stop_session.php';
      session_start();
      checkSession();

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
					<form action="../controllers/crud_create_new_user.php" method="post">
						<h3>Crear Cuenta</h3>
						<input type="text" placeholder="Ingrese el Nombre" name="name">
                        <input type="text" placeholder="Ingrese el dni" name="dni">
                        <input type="text" placeholder="Ingrese el correo Electronico" name="mail">
						<div class="password-toggle">
							<input class="controls" type="password" name="password" placeholder="Contraseña" id="password">
						</div>
                        <label for="rol">Elija el rol del usuario:</label>
                        <select name="rol" id="carrer">
                            <?php foreach ($rol as $roles) { ?>
                                <option value="<?php echo $roles['id_rol']; ?>"><?php echo $roles['details']; ?></option>
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
