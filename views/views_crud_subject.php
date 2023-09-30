<?php
require_once '../model/query.php';
require_once '../controllers/crud_views_subject.php';
require_once '../controllers/crud_create_Subject.php';
require_once '../controllers/stop_session.php';
session_start();
checkSession();


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <!-- Site CSS -->
    <link rel="stylesheet" href="../css/style.css">
    <!-- ALL VERSION CSS -->
    <link rel="stylesheet" href="../css/versions.css">
    <!-- Responsive CSS -->
    <link rel="stylesheet" href="../css/responsive.css">
    <!-- Custom CSS -->
     <!-- Modernizer for Portfolio -->
     <script src="../js/modernizer.js"></script>
    <title>institutec</title>
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
								
								
							</div>
						</li>
                        <li class="nav-item dropdown ">
							<a class="nav-link dropdown-toggle" href="../views/views_teacher.php" id="dropdown-a" data-toggle="dropdown"> Gestionar Profesores</a>
							<div class="dropdown-menu" aria-labelledby="dropdown-a">
								<a class="dropdown-item" href="views_teacher.php">Ver Profesores</a>
							</div>
						</li>
                        <li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle" href="#" id="dropdown-a" data-toggle="dropdown"> Gestionar Alumnos</a>
							<div class="dropdown-menu" aria-labelledby="dropdown-a">
								<a class="dropdown-item" href="../views/views_crud_pre_registered.php">Preinscriptos</a>
								<a class="dropdown-item" href="#">Inscribir Alumnos</a>
							</div>
						</li>
                        <li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle" href="views_teacher.php" id="dropdown-a" data-toggle="dropdown"> Gestionar Carrera</a>
							<div class="dropdown-menu" aria-labelledby="dropdown-a">
                        <li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle" href="#" id="dropdown-a" data-toggle="dropdown">Gestionar Usuarios</a>
							<div class="dropdown-menu" aria-labelledby="dropdown-a">
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

     <!---tabla con nuestros datos--->  
    <main class="container">
     <h1 style="text-align: center;">Materias de la carrera <?php echo $get_career['career_name']?></h1>
    <div class="row">
     <div class="col">
      
        <h4>Crud de Materias
        
        <a class="btn btn-primary float-right create_subject_Btn text-white"><i class="fas fa-plus-circle fa-lg"></i></a>
        
        </h4>
    </div>

    </div>
    <div class="row py-3">
        <div class="col">
           <table class="table table-border ">
               <thead>
                <tr class="btn-primary">
                    
                    <th>Materia</th>
                    <th>Fecha de Alta</th>
                    <th>Carrera</th>
                    <th>Ver detalles</th>
                    <th>editar</th>
                    <th>eliminar</th>
                    
                </tr>
               </thead>
               <tbody>
               <?php
               foreach ($show as $row) {
                # code...
               
               ?>
              
              <tr>
                <!--<td> </*?php echo $row['id_subjects'] ?*/></td>-->
                <td> <?php echo $row['subject_name'] ?></td>
                <td><?php echo date('d/m/Y H:i:s', strtotime($row['create_date'])); ?></td>
                <td> <?php echo $row['career_name'] ?></td>
                <td><a href="form_edit_careers.php?id=<?php echo $row['id_subjects'] ?>" class="btn btn-info float-right"><i class="fas fa-info-circle"></i></a></td>
                <td><a class="btn btn-warning float-right subject_edit_Btn  text-white" data-id="<?php echo $row['id_subjects']; ?>" data-subject="<?php echo $row['subject_name']; ?>"><i class="fas fa-edit"></i></a></td>
                <td><a class="btn btn-danger float-right subject_delete_Btn text-white" data-id_subject="<?php echo $row['id_subjects']; ?>"><i class="fas fa-trash-alt"></i></a></td>
               
            </tr>
               <?php }?>
               </tbody>
           </table>
        </div>
    </div>

    </main>

  <!-- Modal para Crear Materia -->
<div id="create_Modal" class="modal fade" tabindex="-1" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header btn-primary">
                <h5 class="modal-title text-white" >Dar de alta Materia</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="color: white";>
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="../controllers/crud_create_Subject.php" method="post">
                    <div class="form-group">
                        <label for="career">Seleccione la carrera</label>
                        <select name="career" id="carrer" class="form-control">
                            <?php foreach ($show_state as $show) { ?>
                                <option value="<?php echo $show['id_career']; ?>"><?php echo $show['career_name']; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="subject">Ingrese La Materia</label>
                        <input type="text" placeholder="Ingrese La Materia" name="Subject" class="form-control">
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-outline-primary">Guardar Datos</button>
                        <a href="../views/views_crud_admin_careers.php" class="btn btn-outline-secondary">Regresar a las Carreras</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


                        <!--Editar Materia-->
    <div id="editModal" class="modal fade" tabindex="-1" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header btn-primary">
                <h5 class="modal-title text-white">Editar Materia</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="color: white";>
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="../controllers/crud_edit_subject.php" method="post">
                    <!-- Agrega los campos ocultos para mantener el ID de la materia -->
                    <input type="hidden" name="id_subject" id="id_subject" value="<?php echo $get_subject['id_subjects']; ?>">

                    <!-- Campo de entrada para el nombre de la materia -->
                    <div class="form-group">
                        <label for="name">Materia</label>
                        <input type="text" class="form-control" id="name" name="subject" value="<?php echo $get_subject['subject_name']; ?>">
                    </div>

                    <!-- Botón para actualizar y botón de volver -->
                    <div class="text-center">
                        <button type="submit" class="btn btn-outline-primary">Actualizar Datos</button>
                        <a href="../views/views_crud_admin_careers.php" class="btn btn-outline-secondary">Regresar a las Carreras</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Eliminar Materia -->
<div id="deleteModal" class="modal fade" tabindex="-1" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header btn-primary">
                <h5 class="modal-title text-white">Eliminar Materia</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="color: white";>
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="advertencia">
                    <h2>Advertencia</h2>
                    <p>¿Seguro que desea eliminar este elemento?</p>
                    <form action="../controllers/crud_eliminate_subject.php" method="post">
                        <input type="hidden" name="id_subject" id="id_subject_eliminate" value="<?php echo $get_career['id_career'];?>">
                        <div class="btn-group" role="group" aria-label="Botones de acción">
                            <button type="submit" class="btn btn-outline-danger mr-2" name="delete">Eliminar</button>
                            <a class="btn btn-outline-secondary" href="../views/views_crud_admin_careers.php">Regresar a las Carreras</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>



<!-- Agrega este código JavaScript al final de tu archivo -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="../js/bootstrap.min.js"></script>
<script src="../js/modal.js"></script>
<script src="../js/all.js"></script>

</body>
</html>