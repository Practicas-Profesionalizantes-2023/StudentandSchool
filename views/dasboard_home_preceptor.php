<?php
require_once '../controllers/stop_session.php';
session_start();
checkSession();

?>
<!DOCTYPE html>
<html lang="es">
<head>
    
    <meta name="viewport" content="width=device-width, initial-scale=1">
 
     <!-- Site Metas -->
    <title>Institutec</title>  
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Site Icons -->
    <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon" />
    <link rel="apple-touch-icon" href="images/apple-touch-icon.png">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.../js/1.16.0/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/../js/bootstrap.min.js"></script>
    <!-- Site CSS -->
    <link rel="stylesheet" href="../css/style.css">
    <!-- ALL VERSION CSS -->
    <link rel="stylesheet" href="../css/versions.css">
    <!-- Responsive CSS -->
    <link rel="stylesheet" href="../css/responsive.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/custom.css">
    <!--my links css home_page and footer css-->
    <link rel="stylesheet" href="../css/home_page_preceptor.css">
     <link rel="stylesheet" href="../css/footer.css">
    <!-- Modernizer for Portfolio -->
    <script src="../js/modernizer.js"></script>
    <title>Institutec</title>
</head>
<body>

<body class="host_version"> 
<!-- Start header -->
<header class="top-navbar">
		<div class="header-top">
			<div class="container">
				<div class="row">
					<div class="col-md-8 col-sm-8 col-xs-12">
						<div class="header-top-left">
							<p>CONTACTANOS:institutec16@gmail.com</p>
						</div>
					</div>
					<div class="col-md-4 col-sm-4 col-xs-12">
						<div class="header-top-right text-right">
							<ul>
								<li><a href="views/login.php">LOGIN</a></li>
								<li><a href="views/pre_register.php">PREINSCRIPCION</a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
		<nav class="navbar navbar-expand-lg navbar-light bg-light">
			<div class="container-fluid">
				<a class="navbar-brand" href="index.html">
					<img src="images/favicon.ico" alt="" />
				</a>
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbars-host" aria-controls="navbars-rs-food" aria-expanded="false" aria-label="Toggle navigation">
					<span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
				</button>
				<div class="collapse navbar-collapse" id="navbars-host">
					<ul class="navbar-nav ml-auto">

						<li class="nav-item active"><a class="nav-link" href="index.php">Inicio</a></li>
						<li class="nav-item active"><a class="nav-link" href="about.php">Sobre Nosotros</a></li>
						<li class="nav-item dropdown">
							<a href="views/views_carrer.php" class="nav-link">Carreras</a>
						</li>
						
						<li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle" href="#" id="dropdown-a" data-toggle="dropdown">Alumnos</a>
							<div class="dropdown-menu" aria-labelledby="dropdown-a">
								<a class="dropdown-item" href="#">RESOLUCIONES</a>
								<a class="dropdown-item" href="views/reglament.php">REGLAMENTO</a>
								<a class="dropdown-item" href="#">CONSTANCIA</a>
								<a class="dropdown-item" href="#">CAI</a>
								
							</div>
						</li>
					</ul>
				</div>
			</div>
		</nav>
	</header>
	<!-- End header -->
    <main>
        <section>
            <h2>Gestionar Carreras</h2>
            <p>Añade, edita o elimina carreras disponibles para los estudiantes.</p>
        </section>
        <section>
            <h2>Gestionar Materias</h2>
            <p>Asigna materias a las carreras disponibles y actualiza su información.</p>
        </section>
        <section>
            <h2>Gestionar Profesores</h2>
            <p>Registra a los profesores asignados a cada materia y administra su información.</p>
        </section>
        <section>
            <h2>Gestionar Alumnos</h2>
            <p>Agrega estudiantes y lleva un seguimiento de sus registros académicos.</p>
        </section>
        <section>
            <h2>Gestionar Usuarios</h2>
            <p>Administra cuentas de usuario y asigna roles y permisos según sea necesario.</p>
        </section>
    </main>
    
    <!-- Footer -->
    <footer>
        <div class="footer-logo">
            <a href="../index.php">INSTITUTEC 2023</a>
        </div>
		<div class="footer-links">
                <a href="../index.php">Inicio</a>
                <a href="../views/about.php">Acerca de Nosotros</a>
                <a href="#">Programas Académicos</a>
                <a href="#">Admisiones</a>
                <a href="contact.php">Contacto</a>
        </div>
        <div class="social-icons">
            <a href="#"><i class="fab fa-facebook"></i></a>
            <a href="#"><i class="fab fa-twitter"></i></a>
            <a href="#"><i class="fab fa-instagram"></i></a>
        </div>
    </footer>

    <a href="#" id="scroll-to-top" class="dmtop global-radius"><i class="fa fa-angle-up"></i></a>

    <!-- ALL JS FILES -->
    <script src="../js/all.js"></script>
    <!-- ALL PLUGINS -->
    <script src="../js/custom.js"></script>
	<script src="../js/timeline.min.js"></script>
	<script>
		timeline(document.querySelectorAll('.timeline'), {
			forceVerticalMode: 700,
			mode: 'horizontal',
			verticalStartPosition: 'left',
			visibleItems: 4
		});
	</script>


</body>
</html>
