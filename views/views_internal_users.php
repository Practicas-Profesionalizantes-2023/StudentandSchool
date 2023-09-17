<?php
require_once '../controllers/stop_session.php';
require_once '../controllers/crud_view_internal_user.php';
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
    <link rel="stylesheet" href="../css/footer.css">
     <link rel="stylesheet" href="../css/datatable.css">
     
    <!-- Modernizer for Portfolio -->
    <script src="../js/modernizer.js"></script>
    <title>Institutec</title>
</head>
<body>


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
				    <ul class="navbar-nav ml-auto">
						<li class="nav-item "><a class="nav-link" href="dashboard.html">Inicio</a></li>
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
						<li class="nav-item dropdown active">
							<a class="nav-link dropdown-toggle" href="#" id="dropdown-a" data-toggle="dropdown"> Gestionar Usuarios</a>
							<div class="dropdown-menu" aria-labelledby="dropdown-a">
								<a class="dropdown-item" href="../views/create_new_user.php">Crear Nuevo Usuario</a>
								<a class="dropdown-item" href="#">Ver Usuarios</a>
							</div>
                        <li class="nav-item"><a class="nav-link" href="../controllers/destroy_Session.php">Cerrar Session</a></li>
					</ul>
				</div>
			</div>
		</nav>
	</header>
	<!-- End header -->
	

	<form action="../controllers/crud_view_internal_user.php" method="post">
	<div class="row">
    <div class="col-sm-12 col-md-12 col-lg-12">
        <div class="col-sm-offset-2 col-sm-8">
            <h3 class="text-center"><small class="mensaje"></small></h3>
        </div>
		<input type="text" class="search" placeholder="Buscar..." name="search_name">
	    <input type="submit" name="search" value="buscar">
            <table id="table-body" class="table table-bordered table-hover" cellspacing="0" width="100%">
                <thead style="background-color: #4c5a7d;">
                    <tr>
                        <th>id usuario</th>
                        <th>Nombre</th>
                        <th>Dni</th>
                        <th>Email</th>
						<th>tipo de rol</th>
						<th>Estado</th>
						<th>Desabilitar Cuenta</th>
						<th>Habilitar Cuenta</th>
						<th>Eliminar Cuenta</th>

                    </tr>
                </thead>
                <tbody>
                
				<?php
                        if (isset($searchResults)) {?>
						<?php foreach($searchResults as $row){?>	
				   
				   <tr>
						   <td><?php  echo $row['id_user']?></td>
						   <td><?php echo $row['name']?></td>
						   <td><?php echo $row['dni']?></td>
						   <td><?php echo $row['mail']?></td>
						   <td><?php echo $row['details']?></td>
						   <td><?php echo $row['state']?></td>
						   <td><button class="btn btn-danger" name="desability" value="<?php echo $row['id_user']?>">Desabilitar</button></td>
						   <td><button class="btn btn-primary" name="hability" value="<?php echo $row['id_user']?>">Habilitar</button></td>
						   <td><a class="btn btn-warning" href="../views/eliminate_new_user.php?id_user=<?php echo $row['id_user']?>">Eliminar</a></td>
				   </tr>
					  <?php } ?>
					  <?php } else { ?>

				<?php foreach($union as $row){?>	
				   
				<tr>
						<td><?php  echo $row['id_user']?></td>
                        <td><?php echo $row['name']?></td>
                        <td><?php echo $row['dni']?></td>
						<td><?php echo $row['mail']?></td>
						<td><?php echo $row['details']?></td>
						<td><?php echo $row['state']?></td>
						<td><button class="btn btn-danger" name="desability" value="<?php echo $row['id_user']?>">Desabilitar</button></td>
						<td><button class="btn btn-primary" name="hability" value="<?php echo $row['id_user']?>">Habilitar</button></td>
						<td><a class="btn btn-warning" href="../views/eliminate_new_user.php?id_user=<?php echo $row['id_user']; ?>">Eliminar</a>
</td>
				</tr>
                   <?php } ?>
				   <?php } ?>
               </tbody>
    	</table>

    

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
</body>
</html>



 