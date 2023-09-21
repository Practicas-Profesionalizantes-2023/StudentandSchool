<?php
 require_once '../controllers/stop_session.php';
 require_once '../controllers/message_control.php';
 require_once '../controllers/crud_changed_password.php';
 session_start();
;

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
	<link rel="stylesheet" href="../css/create_new_user.css">
    <title>institutec</title>
</head>
<body>
<section class="create">
		<div class="create_box">
			<div class="left">
				<div class="contact">
                        <form action="../controllers/crud_forgot_password.php" method="post">
                        <?php show_messages_error('no_coinciden', "el dni no existe"); ?>    
						<h3>Olvidaste la contraseña</h3>
						<input type="text" placeholder="Ingrese la contraseña" name="dni" required>
						<div class="button-container">
                            <button class="submit" name="submit">Comprobar_dni</button>
                        </div>
                        <button class="back"><a href="../views/login.php" >volver</a></button>
                    </form>
				</div>
			
	</section>
</body>
</html>