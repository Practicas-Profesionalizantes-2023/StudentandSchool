<?php
session_start();

require_once '../model/query.php';
require_once '../controllers/crud_edit_careers.php';
require_once '../controllers/message_control.php';
require_once '../controllers/stop_session.php';
checkSession();

$database = new model_sql();
$careerData=$database->show_state("careers");
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
							<a class="nav-link dropdown-toggle" href="#" id="dropdown-a" data-toggle="dropdown">Gestionar Usuarios</a>
							<div class="dropdown-menu" aria-labelledby="dropdown-a">
								<a class="dropdown-item" href="../views/views_internal_users.php">Ver Usuarios</a>
							</div>
                            <li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle" href="#" id="dropdown-a" data-toggle="dropdown">Configuracion</a>
							<div class="dropdown-menu" aria-labelledby="dropdown-a">
                                <a class="dropdown-item" href="../controllers/disable_preinscription.php">Desactivar Preinscripción</a>
                                <a class="dropdown-item" href="../controllers/Enable_Preregistration.php">Habilitar Preinscripción</a>
                                <a class="dropdown-item" href="../controllers/destroy_Session.php">Cerrar Session</a>
							</div>
                        </ul>
				</div>
			</div>
		</nav>
	</header>
    <br>
    <br>
    <main class="container">
     <?php show_messages_verify('inserto', "la carrera se creo correctamente");
           show_messages_verify('modifico', "la Carrera se actualizo correctamente");
           show_messages_verify('correcto', "se Modifico Correctamente la Materia");
           show_messages_verify('borrado', "se Elimino correctamente la Carrera");
           show_messages_verify('eliminar_materia', "se Elimino correctamente la Materia");
           show_messages_verify('creo', "La Materia se Creo Correctamente");
           ?>
    <div class="row">
     <div class="col">
        <h4>Crud de Carreras
        
    
       <a href="#" class="btn btn-primary btn-lg create_career_Btn text-white float-right"><i class="fas fa-plus-circle fa-lg"></i></a>

       </h4>
        
        
        
     </div>

    </div>
    <div class="row py-3">
        <div class="col">
           <table class="table table-border">
               <thead>
              
                    
                <tr class="btn-primary">
                        <th style="max-width: 170px; white-space: nowrap;">Nombre de la Carrera</th>
                        <th style="max-width: 170px; white-space: nowrap;">Título</th>
                        <th style="max-width: 170px; white-space: nowrap;">Cantidad de Materias</th>
                        <th style="max-width: 150px; white-space: nowrap;">Fecha de Alta</th>
                        <th style="max-width: 150px; white-space: nowrap;">Ver Detalles</th>
                        <th style="max-width: 150px; white-space: nowrap;">Editar</th>
                        <th style="max-width: 150px; white-space: nowrap;">Eliminar</th>
                </tr>
                    

               </thead>
               <tbody>
               <?php
               foreach ($careerData as $row) { ?>
               
            <tr>
               
                <td> <?php echo $row['career_name'] ?></td>
                <td> <?php echo $row['title'] ?></td>
                <td> <?php echo $row['amount_subjects'] ?></td>
                <td><?php echo date('d/m/Y H:i:s', strtotime($row['date_high'])); ?></td>
                <td><a href="../views/views_crud_subject.php?id=<?php echo $row['id_career'] ?>" class="btn btn-info float-right"><i class="fas fa-info-circle"></i></a></td>
                <td><a class="btn btn-warning float-right editBtn text-white" data-id="<?php echo $row['id_career']; ?>" data-career="<?php echo $row['career_name']; ?>" data-title="<?php echo $row['title']; ?>" data-subjects="<?php echo $row['amount_subjects']; ?>"><i class="fas fa-edit"></i></a></td>
                <td> <a class="btn btn-danger float-right career_delete_Btn text-white" data-id_career="<?php echo $row['id_career']; ?>"><i class="fas fa-trash-alt"></i></a></td>
               
            </tr>
               <?php }?>
               </tbody>
           </table>
        </div>
    </div>

    </main>


 

  <!-- Modal para Crear Carrera -->
<div id="create_Modal" class="modal fade" tabindex="-1" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header btn-primary">
                <h5 class="modal-title text-white" >Dar de Alta Una Carrera</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="color: white";>
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="../controllers/crud_keep_careers.php" method="post">
                    <div class="form-group">
                        <label for="subject">Ingrese La Carrera</label>
                        <input type="text" placeholder="Ingrese La Carrera" name="careers" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="subject">Ingrese el titulo de la Carrera</label>
                        <input type="text" placeholder="Ingrese el titulo" name="title" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="subject">Ingrese La cantidad de materias</label>
                        <input type="number" placeholder="Ingrese la cantidad de la materia" name="amoun_subjects" class="form-control" required>
                    </div>
                    <div class="text-center">
                        <a href="../views/views_crud_admin_careers.php" class="btn btn-outline-secondary mr-2">Cerrar</a>
                        <button type="submit" class="btn btn-outline-primary" name="keep">Guardar Datos</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!--Modal de Editar Carrera-->
<div id="editModal" class="modal fade" tabindex="-1" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header btn-primary">
                <h5 class="modal-title text-white">Editar Carrera</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="color: white";>
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
           
            <div class="modal-body">
                <form action="../controllers/crud_edit_careers.php" method="post">
                    <input type="hidden" name="id_career" id="id_career_edit" class="form-control" value="">
                    <div class="form-group">
                        <label for="career_edit">Nombre de la Carrera</label>
                        <input type="text" class="form-control" id="career_edit" name="career" required>
                    </div>
                    <div class="form-group">
                        <label for="title_edit">Título</label>
                        <input type="text" class="form-control" id="title_edit" name="title" required>
                    </div>
                    <div class="form-group">
                        <label for="subjects_edit">Cantidad de Materias</label>
                        <input type="number" class="form-control" id="subjects_edit" name="subjects" required>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Cerrar</button>
                        <button type="submit" class="btn btn-outline-primary" name="keep">Guardar Cambios</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>




<!-- Eliminar Carrera -->
<div id="delete_career_modal" class="modal fade" tabindex="-1" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header btn-primary">
                <h5 class="modal-title text-white">Eliminar Carrera</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="color: white";>
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="advertencia">
                    <h2>Advertencia</h2>
                    <p>¿Seguro que desea eliminar este elemento?</p>
                    <form action="../controllers/delete_careers.php" method="post">
                        <input type="hidden" name="id_career" id="id_career_eliminate" value="<?php echo $get_career['id_career']; ?>">
                        <div class="btn-group" role="group" aria-label="Botones de acción">
                            <button type="submit" class="btn btn-outline-danger mr-2" name="delete">Eliminar</button>
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
<script src="../js/modal_career.js"></script>
<script src="../js/all.js"></script>


</body>
</html>