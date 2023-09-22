<?php
require_once '../model/query.php';

$database = new model_sql();
$careerData=$database->show_state("careers");

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <!-- Site CSS -->
    <link rel="stylesheet" href="../css/style.css">
    <!-- ALL VERSION CSS -->
    <link rel="stylesheet" href="../css/versions.css">
    <!-- Responsive CSS -->
    <link rel="stylesheet" href="../css/responsive.css">
    <!-- Custom CSS -->
     <!-- Modernizer for Portfolio -->
     <script src="../js/modernizer.js"></script>
    <title>Document</title>
</head>
<body class="py-3">

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
						<li class="nav-item dropdown active">
							<a class="nav-link dropdown-toggle" href="#" id="dropdown-a" data-toggle="dropdown"> Gestionar Carrera</a>
							<div class="dropdown-menu" aria-labelledby="dropdown-a">
								<a class="dropdown-item" href="#">Carreras</a>
								<a class="dropdown-item" href="#">Materia</a>
								
							</div>
						</li>
                        <li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle" href="#" id="dropdown-a" data-toggle="dropdown"> Gestionar Alumnos</a>
							<div class="dropdown-menu" aria-labelledby="dropdown-a">
								<a class="dropdown-item" href="../views/views_crud_pre_registered.php">Preinscriptos</a>
								<a class="dropdown-item" href="#">Inscribir Alumnos</a>
							</div>
						</li>
						<li class="nav-item"><a class="nav-link" href="teachers.html">Gestionar Profesores</a></li>
						<li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle" href="#" id="dropdown-a" data-toggle="dropdown">Gestionar Usuarios</a>
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
    <br>
    <br>
    <main class="container">
     
    <div class="row">
     <div class="col">
        <h4>Crud de Carreras
        
       <a href="create_careers.php" class="btn btn-primary float-right">Crear carrera</a>

       </h4>
        
        
        
     </div>

    </div>
    <div class="row py-3">
        <div class="col">
           <table class="table table-border ">
               <thead>
                <tr class="btn-primary">
                    
                    <th>id Carrera</th>
                    <th>Carrera</th>
                    <th>Titulo</th>
                    <th>materias</th>
                    <th>fecha de creacion</th>
                    <th>estados</th>
                    <th>editar</th>
                    <th>eliminar</th>
                    
                </tr>
               </thead>
               <tbody>
               <?php
               foreach ($careerData as $row) {
                # code...
               
               ?>
               <tr>
                <td> <?php echo $row['id_career'] ?></td>
                <td> <?php echo $row['career_name'] ?></td>
                <td> <?php echo $row['title'] ?></td>
                <td> <?php echo $row['amount_subjects'] ?></td>
                <td> <?php echo $row['date_high'] ?></td>
                <td> <?php echo $row['state'] ?></td>
                <td><a href="form_edit_careers.php?id=<?php echo $row['id_career'] ?>" class="btn btn-warning float-right">Editar carrera</a></td>
                <td><a href="views_delete_careers.php?id=<?php echo $row['id_career'] ?>" class="btn btn-danger float-right">Eliminar carrera</a></td>
               </tr>
               <?php }?>
               </tbody>
           </table>
        </div>
    </div>

    </main>

    <script src="../js/all.js"></script>

</body>
</html>