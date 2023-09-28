<?php require_once '../controllers/crud_create_Subject.php';
      require_once '../controllers/stop_session.php';
	  require_once '../controllers/message_control.php';
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
					<form action="../controllers/crud_create_Subject.php" method="post">
						
						<h3>Crear Materia</h3>
                        <label for="career">Seleccione la carrera</label>
                        <select name="career" id="carrer">
                            <?php foreach ($show_state as $show) { ?>
                                <option value="<?php echo $show['id_career']; ?>"><?php echo $show['career_name']; ?></option>
                            <?php } ?>
                        </select>
						<input type="text" placeholder="Ingrese La Materia" name="Subject">
						<div class="button-container">
                            <button class="submit" name="submit">Crear Cuenta</button>
                        </div>
                        <button class="back"><a href="../views/views_crud_admin_careers.php" >volver</a></button>
                    </form>
				</div>
			
	</section>


	
</body>
</html>
