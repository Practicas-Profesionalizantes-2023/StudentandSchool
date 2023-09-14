<?php
session_start();
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
		<nav class="navbar navbar-expand-lg navbar-light bg-light">
			<div class="container-fluid">
				<a class="navbar-brand" href="dashboard.html">
					<img src="images/favicon.ico" alt="" />
				</a>
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbars-host" aria-controls="navbars-rs-food" aria-expanded="false" aria-label="Toggle navigation">
					<span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
				</button>
				<div class="collapse navbar-collapse" id="navbars-host">
                <p class="welcome" style="color: white; font-size: 25px;">Bienvenido: <?php echo $_SESSION['name'] ?></p>
				    <ul class="navbar-nav ml-auto">
						<li class="nav-item active"><a class="nav-link" href="dashboard.html">Inicio</a></li>
						<li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle" href="#" id="dropdown-a" data-toggle="dropdown"> Gestionar Carrera</a>
							<div class="dropdown-menu" aria-labelledby="dropdown-a">
								<a class="dropdown-item" href="#">Carreras</a>
								<a class="dropdown-item" href="#">Materia</a>
								
							</div>
						</li>
                        <li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle" href="#" id="dropdown-a" data-toggle="dropdown"> Gestionar Alumnos</a>
							<div class="dropdown-menu" aria-labelledby="dropdown-a">
								<a class="dropdown-item" href="views_crud_pre_registered.php">Preinscriptos</a>
								<a class="dropdown-item" href="#">Inscribir Alumnos</a>
							</div>
						</li>
						<li class="nav-item"><a class="nav-link" href="teachers.html">Gestionar Profesores</a></li>
						<li class="nav-item"><a class="nav-link" href="views/login.php">Crear Nuevo Usuario</a></li>
                        <li class="nav-item"><a class="nav-link" href="../controllers/destroy_Session.php">Cerrar Session</a></li>
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
            <a href="#">INSTITUTEC 2023</a>
        </div>
        <div class="footer-links">
            <ul>
                <li><a href="#">Inicio</a></li>
                <li><a href="#">Acerca de Nosotros</a></li>
                <li><a href="#">Programas Académicos</a></li>
                <li><a href="#">Admisiones</a></li>
                <li><a href="#">Contacto</a></li>
            </ul>
        </div>
        <div class="social-icons">
            <a href="#"><img src="facebook-icon.png" alt="Facebook"></a>
            <a href="#"><img src="twitter-icon.png" alt="Twitter"></a>
            <a href="#"><img src="instagram-icon.png" alt="Instagram"></a>
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
