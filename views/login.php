<?php session_start(); 
require_once '../controllers/message_control.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
	<link rel="stylesheet" href="../css/bootstrap.min.css">
	<link rel="stylesheet" href="../css/login.css">
	<link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon" />
    <link rel="apple-touch-icon" href="images/apple-touch-icon.png">
	<title>institutec</title>
</head>
<body>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
<body>
	<section class="login">
		<div class="login_box">
			<div class="left">
				<div class="top_link"><a href="../index.php"><img src="https://drive.google.com/u/0/uc?id=16U__U5dJdaTfNGobB_OpwAJ73vM50rPV&export=download" alt="">Return home</a></div>
				<div class="contact">
					<form action="../controllers/c_login.php" method="post">
					<?php show_messages_error('no_coinciden', "las credenciales no son válidas");
	  					  show_messages_error('desactivo', "su cuenta fue desactivada comuniquese con institutec");
						  show_messages_verify('cambio', "la contraseña se cambio correctamente,vuelva a iniciar session");
						  show_messages_verify('cambio_exito', "la contraseña olvidada se cambio correctamente");
   					?>
						<h3>Login</h3>
						<input type="text" placeholder="Ingrese su Dni" name="user">
						<div class="password-toggle">
							<input class="controls" type="password" name="password" placeholder="Contraseña" id="password">
							<label class="show-password-button" for="showPasswordCheckbox">&#x1f441;</label>
							<input type="checkbox" id="showPasswordCheckbox" style="display: none;">
						</div>
						<button class="submit" name="submit">Inicia Sesiòn</button>
						<div class="link">
							<a href="../views/view_i_forgot_password.php" class="control_link">¿te olvidaste la contraseña?</a>
						</div>
					</form>
				</div>
			</div>
			<div class="right">
				<div class="right-text">
					<h2>Institutec</h2>
					<h5>Escuela Educativa</h5>
		
				</div>
				<div class="right-inductor"><img src="https://lh3.googleusercontent.com/fife/ABSRlIoGiXn2r0SBm7bjFHea6iCUOyY0N2SrvhNUT-orJfyGNRSMO2vfqar3R-xs5Z4xbeqYwrEMq2FXKGXm-l_H6QAlwCBk9uceKBfG-FjacfftM0WM_aoUC_oxRSXXYspQE3tCMHGvMBlb2K1NAdU6qWv3VAQAPdCo8VwTgdnyWv08CmeZ8hX_6Ty8FzetXYKnfXb0CTEFQOVF4p3R58LksVUd73FU6564OsrJt918LPEwqIPAPQ4dMgiH73sgLXnDndUDCdLSDHMSirr4uUaqbiWQq-X1SNdkh-3jzjhW4keeNt1TgQHSrzW3maYO3ryueQzYoMEhts8MP8HH5gs2NkCar9cr_guunglU7Zqaede4cLFhsCZWBLVHY4cKHgk8SzfH_0Rn3St2AQen9MaiT38L5QXsaq6zFMuGiT8M2Md50eS0JdRTdlWLJApbgAUqI3zltUXce-MaCrDtp_UiI6x3IR4fEZiCo0XDyoAesFjXZg9cIuSsLTiKkSAGzzledJU3crgSHjAIycQN2PH2_dBIa3ibAJLphqq6zLh0qiQn_dHh83ru2y7MgxRU85ithgjdIk3PgplREbW9_PLv5j9juYc1WXFNW9ML80UlTaC9D2rP3i80zESJJY56faKsA5GVCIFiUtc3EewSM_C0bkJSMiobIWiXFz7pMcadgZlweUdjBcjvaepHBe8wou0ZtDM9TKom0hs_nx_AKy0dnXGNWI1qftTjAg=w1920-h979-ft" alt=""></div>
			</div>
		</div>
	</section>


	<script>
		const passwordInput = document.getElementById("password");
		const showPasswordCheckbox = document.getElementById("showPasswordCheckbox");

		showPasswordCheckbox.addEventListener("change", function () {
			if (showPasswordCheckbox.checked) {
				passwordInput.type = "text";
			} else {
				passwordInput.type = "password";
			}
		});
	</script>

</body>
</html>
