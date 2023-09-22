<?php require_once '../controllers/crud_pre_registered_controller.php';
      require_once '../controllers/stop_session.php';
      require_once '../controllers/message_control.php';
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
     <link rel="stylesheet" href="../css/datatable.css">
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
					<img src="images/favicon.ico" alt=""/>
				</a>
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbars-host" aria-controls="navbars-rs-food" aria-expanded="false" aria-label="Toggle navigation">
					<span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
				</button>
				<div class="collapse navbar-collapse" id="navbars-host">
				    <ul class="navbar-nav ml-auto">
						<li class="nav-item "><a class="nav-link" href="../views/dasboard_home_preceptor.php">Inicio</a></li>
						<li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle" href="#" id="dropdown-a" data-toggle="dropdown"> Gestionar Carrera</a>
							<div class="dropdown-menu" aria-labelledby="dropdown-a">
								<a class="dropdown-item" href="../views/views_crud_admin_careers.php">Carreras</a>
								<a class="dropdown-item" href="#">Materia</a>
								
							</div>
						</li>
                        <li class="nav-item dropdown active">
							<a class="nav-link dropdown-toggle" href="#" id="dropdown-a" data-toggle="dropdown"> Gestionar Alumnos</a>
							<div class="dropdown-menu" aria-labelledby="dropdown-a">
								<a class="dropdown-item" href="#">Preinscriptos</a>
								<a class="dropdown-item" href="#">Inscribir Alumnos</a>
							</div>
						</li>
						<li class="nav-item"><a class="nav-link" href="teachers.html">Gestionar Profesores</a></li>
						<li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle" href="#" id="dropdown-a" data-toggle="dropdown"> Gestionar Usuarios</a>
							<div class="dropdown-menu" aria-labelledby="dropdown-a">
								<a class="dropdown-item" href="../views/create_new_user.php">Crear Nuevo Usuario</a>
								<a class="dropdown-item" href="../views/views_internal_users.php">Ver Usuarios</a>
							</div>
                        <li class="nav-item"><a class="nav-link" href="../controllers/destroy_Session.php">Cerrar Session</a></li>
					</ul>
				</div>
			</div>
		</nav>
	</header>
	<!-- End header -->


<body class="host_version"> 
	<form action="../controllers/crud_pre_registered_controller.php" method="post">
	<div class="row">
    <div class="col-sm-12 col-md-12 col-lg-12">
        <div class="col-sm-offset-2 col-sm-8">
            <h3 class="text-center"><small class="mensaje"></small></h3>
        </div>
		<input type="text" class="search" placeholder="Buscar..." name="search">
        <?php
        show_messages_verify('eliminado', "se elimino el registro correctamente");
        show_messages_verify('editado', "se  edito el registro correctamente");
        ?>
            <table id="table-body" class="table table-bordered table-hover" cellspacing="0" width="100%">
                <thead style="background-color: #4c5a7d;">
                    <tr>
                        <th>id preinscriptos</th>
                        <th>Nombre Completo</th>
                        <th>Apellido</th>
                        <th>Telefono</th>
						<th>E_mail</th>
                        <th>Fecha de nacimiento</th>
                        <th>Dni</th>
                        <th>Carrera</th>
                        <th>Calle y Altura</th>
                        <th>Genero</th>
                        <th>Editar</th>
                        <th>Borrar</th>

                    </tr>
                </thead>
                <tbody>
                    <tr>
                    <?php
                        if (isset($searchResults)) {?>
                           
                            <?php foreach ($searchResults as $row) {?>
                            <tr>
                                <td><?php  echo $row['id_pre_user']?></td>
                                <td><?php echo $row['name']?></td>
                                <td> <?php echo $row['last_name']?></td>
                                <td><?php echo $row['phone']?></td>
                                <td><?php echo $row['mail']?></td>
                                <td><?php echo $row['date']?></td>
                                <td><?php echo $row['dni']?></td>
                                <td><?php echo $row['carrer']?></td>
                                <td><?php echo $row['heigth_street']?></td>
                                <td><?php echo $row['gender']?></td>
                                <td><a class="btn btn-danger" href="../views/form_edit_pre_register.php?id_pre_user=<?php echo $row['id_pre_user']?>">Editar</a></td>
                                <td><a class="btn btn-warning" href="../views/views_eliminate_register.php?id_pre_user=<?php echo $row['id_pre_user']?>">Eliminar</a></td>

                            </tr>
                            <?php } ?>
                        <?php } else { ?>
                           
                            <?php foreach ($show_pre_register as $row) {?>
                                <tr>
                                <td><?php echo $row['id_pre_user']?></td>
                                <td><?php echo $row['name']?></td>
                                <td><?php echo $row['last_name']?></td>
                                <td><?php echo $row['phone']?></td>
                                <td><?php echo $row['mail']?></td>
                                <td><?php echo $row['date']?></td>
                                <td><?php echo $row['dni']?></td>
                                <td><?php echo $row['carrer']?></td>
                                <td><?php echo $row['heigth_street']?></td>
                                <td><?php echo $row['gender']?></td>
                                <td><a class="btn btn-danger" href="../views/form_edit_pre_register.php?id_pre_user=<?php echo $row['id_pre_user']?>">Editar</a></td>
                                <td><a class="btn btn-warning" href="../views/views_eliminate_register.php?id_pre_user=<?php echo $row['id_pre_user']?>">Eliminar</a></td>
                                
                                
                                </tr>
                            <?php } ?>
                        <?php } ?>
        </tbody>
    </table>

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

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.2/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.html5.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.print.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jsPDF/2.4.0/jspdf.umd.min.js"></script>

<script>
/*$(document).ready(function () {
    // Inicializa la tabla DataTables sin barra de búsqueda
    var table = $('#table-body').DataTable({
        dom: 'Bfrtip',
        buttons: [
            'csv', 'excel', 'pdf', 'print'
        ],
        searching: false, // Desactiva la barra de búsqueda
    });
});
</script>
    <script src="js/custom.js"></script>
	<script src="js/timeline.min.js"></script>
	
    <script>
		timeline(document.querySelectorAll('.timeline'), {
			forceVerticalMode: 700,
			mode: 'horizontal',
			verticalStartPosition: 'left',
			visibleItems: 4
		});
	
</script>





 