<?php require_once '../controllers/message_control.php'?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Contacto</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../vendor/animate/animate.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../css/util.css">
	<link rel="stylesheet" type="text/css" href="../css/main.css">
	<link rel="stylesheet" href="../css/bootstrap.min.css">
<!--===============================================================================================-->
</head>
<body>
	<div class="contact1">
		<div class="container-contact1">
			<div class="contact1-pic js-tilt" data-tilt>
				<img src="../images/img_01.png" alt="IMG">
			</div>

			<form class="contact1-form validate-form" action="../controllers/send-email.php" form name="contact" method="POST" data-netlify="true" >
				<span class="contact1-form-title">
					¿Alguna duda? Contactenos
				</span>

				<div class="wrap-input1 validate-input" data-validate = "Este campo no puede quedar vacio">
					<input class="input1" type="text" name="name" placeholder="Su nombre">
					<span class="shadow-input1"></span>
				</div>

				<div class="wrap-input1 validate-input" data-validate = "Ingrese un email valido">
					<input class="input1" type="text" name="email" placeholder="Su e-mail">
					<span class="shadow-input1"></span>
				</div>

				<div class="wrap-input1 validate-input" data-validate = "Este campo no puede quedar vacio">
					<input class="input1" type="text" name="subject" placeholder="Carrera">
					<span class="shadow-input1"></span>
				</div>

				<div class="wrap-input1 validate-input" data-validate = "Su consulta no puede exceder los 500 caracteres ni estar en blanco">
					<textarea class="input1" name="message" placeholder="Consulta"></textarea>
					<span class="shadow-input1"></span>
				</div>

				<div class="container-contact1-form-btn">
					<button class="contact1-form-btn"button type="submit" >
						<span>
							Enviar
							<i class="fa fa-long-arrow-right" aria-hidden="true"></i>
						</span>
					</button>	
					<button class="back"><a href="../index.php" >volver</a></button>
				</div>
			</form>
			<?php show_messages_verify('mensaje_enviado', "Se envio correctamente el mensaje"); ?>
		</div>
		<div class="mapouter"><div class="gmap_canvas"><iframe width="1000" height="670" id="gmap_canvas" src="https://maps.google.com/maps?q=merlo%2C+buenos+aires&t=&z=13&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe><a href="https://alarmclock.cloud/">online alarm clock</a><br><a href="https://online.stopwatch-timer.net/"></a><br><style>.mapouter{position: relative;text-align: right;height: 670px;width: 1000px;}</style><a href="https://www.embedmaps.co">google maps embed</a><style>.gmap_canvas{overflow: hidden;background: none !important;height: 670px;width: 1000px;}</style></div></div>
	</div>



<!--===============================================================================================-->
	<script src="../vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="../vendor/bootstrap/js/popper.js"></script>
	<script src="../vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="../vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="../vendor/tilt/tilt.jquery.min.js"></script>
	<script >
		$('.js-tilt').tilt({
			scale: 1.1
		})
	</script>
	<script>
    const messageTextarea = document.querySelector('textarea[name="message"]');

    messageTextarea.addEventListener('input', () => {
        const maxLength = 500;
        let message = messageTextarea.value;

        if (message.length > maxLength) {
            // Si el mensaje excede la longitud máxima, recortar el texto a 500 caracteres
            messageTextarea.value = message.substring(0, maxLength);
        }
    });
</script>


<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-23581568-13"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-23581568-13');
</script>

<!--===============================================================================================-->
	<script src="../js/main.js"></script>


    <script>
        // Función para volver atrás en la historia del navegador
        function goBack() {
            window.history.back();
        }
	</script>

</body>
</html>
