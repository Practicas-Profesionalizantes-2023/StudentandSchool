<?php
session_start();
require_once '../controllers/stop_session.php';
require_once '../model/query.php';
require_once "../controllers/crud_insert_teacher.php";
require_once '../controllers/message_control.php';
require '../controllers/crud_edit_teachers.php';
require_once '../controllers/crud_delete_teacher.php';
checkSession();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
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
    <title>institutec</title>
</head>
<body>
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
						<li class="nav-item "><a class="nav-link" href="../views/dasboard_home_preceptor.php">Inicio</a></li>
						<li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle" href="#" id="dropdown-a" data-toggle="dropdown"> Gestionar Carrera</a>
							<div class="dropdown-menu" aria-labelledby="dropdown-a">
								<a class="dropdown-item" href="../views/views_crud_admin_careers.php">Carreras</a>
								
							</div>
						</li>
                        <li class="nav-item dropdown active">
							<a class="nav-link dropdown-toggle" href="#" id="dropdown-a" data-toggle="dropdown"> Gestionar Profesores</a>
							<div class="dropdown-menu" aria-labelledby="dropdown-a">
								<a class="dropdown-item" href="views_teacher.php">Ver Profesores</a>
							</div>
						</li>
                        <li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle" href="#" id="dropdown-a" data-toggle="dropdown"> Gestionar Alumnos</a>
							<div class="dropdown-menu" aria-labelledby="dropdown-a">
								<a class="dropdown-item" href="views_crud_pre_registered.php">Preinscriptos</a>
								<a class="dropdown-item" href="#">Inscribir Alumnos</a>
							</div>
						</li>
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
     <?php 
     show_messages_verify('editado', "se edito el registro correctamente");
     show_messages_verify('se_ah_borrado', "se borro corectamente el registro");
     show_messages_verify('creado', "se  creo el registro correctamente");
     show_messages_verify('asignado', "se asigno al maestro materias  correctamente");
     show_messages_verify('asignacion', "se elimino correctamente la asignacion del profesor a la materia");
     ?>
    <div class="row">
     <div class="col">
        <h4>Crud de Profesores
        
    
       <a href="#" class="btn btn-primary btn-lg create_career_Btn text-white float-right"><i class="fas fa-plus-circle fa-lg"></i></a>

       </h4>
        
        
        
     </div>

    </div>
    <div class="row py-3">
        <div class="col">
           <table class="table table-border">
               <thead>
              
                    
                <tr class="btn-primary">
                        <th style="max-width: 170px; white-space: nowrap;">Nombre</th>
                        <th style="max-width: 170px; white-space: nowrap;">Apellido</th>
                        <th style="max-width: 150px; white-space: nowrap;">Telefono</th>
                        <th style="max-width: 150px; white-space: nowrap;">E-mail</th>
                        <th style="max-width: 170px; white-space: nowrap;">Direccion</th>
                        <th style="max-width: 170px; white-space: nowrap;">Altura</th>
                        <th style="max-width: 170px; white-space: nowrap;">DNI</th>
                        <th style="max-width: 170px; white-space: nowrap;">Fecha de Alta</th>
                        <th style="max-width: 150px; white-space: nowrap;">Ver Detalles</th>
                        <th style="max-width: 150px; white-space: nowrap;">Editar</th>
                        <th style="max-width: 150px; white-space: nowrap;">Eliminar</th>
                </tr>
                    

               </thead>
               <tbody>
               <?php
               foreach ($teacherData as $row) { ?>
               
            <tr>
                <td> <?php echo $row['name'] ?></td>
                <td ><?php echo $row['surname'] ?></td>
                <td> <?php echo $row['phone'] ?></td>
                <td> <?php echo $row['mail'] ?></td>
                <td> <?php echo $row['direction'] ?></td>
                <td> <?php echo $row['height'] ?></td>
                <td> <?php echo $row['dni'] ?></td>
                <td><?php echo date('d/m/Y ', strtotime($row['fech'])); ?></td>
                <td><a href="../views/view_crud_teacher_subject.php?id=<?php echo $row['id_teacher'] ?>" class="btn btn-info float-right"><i class="fas fa-info-circle"></i></a></td>
                <td><a class="btn btn-warning float-right editBtn text-white" data-id="<?php echo $row['id_teacher']; ?>" data-name="<?php echo $row['name']; ?>" data-surname="<?php echo $row['surname']; ?>" data-phone="<?php echo $row['phone']; ?>" data-mail="<?php echo $row['mail']; ?>" data-direcction="<?php echo $row['direction']; ?>" data-height="<?php echo $row['height']; ?>"><i class="fas fa-edit"></i></a></td>
                <td><a class="btn btn-danger float-right teacher_delete_Btn text-white" data-id_teacher="<?php echo $row['id_teacher']; ?>"><i class="fas fa-trash-alt"></i></a></td>
               
            </tr>
               <?php }?>
               </tbody>
           </table>
        </div>
    </div>

    </main><!-- Modal para Crear Profesores -->
<div id="create_Modal" class="modal fade" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header btn-primary">
                <h5 class="modal-title text-white">Dar de Alta Un Profesor</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="../controllers/crud_insert_teacher.php" method="post">
                    <div class="form-group">
                        <label for="name">Nombre del Profesor</label>
                        <input type="text" id="name" name="name" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="surname">Apellido</label>
                        <input type="text" id="surname" name="surname" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="phone">Teléfono</label>
                        <input type="text" id="phone" name="phone" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="text" id="email" name="email" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="direction">Dirección</label>
                        <input type="text" id="direction" name="direction" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="height">Altura</label>
                        <input type="text" id="height" name="height" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="dni">DNI</label>
                        <input type="text" id="dni" name="dni" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="fk_gender_id">Sexo</label>
                        <select id="fk_gender_id" name="fk_gender_id" class="form-control" required>
                            <?php foreach ($gender_data as $show) { ?>
                                <option value="<?php echo $show['id_gender']; ?>"><?php echo $show['details']; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="text-center">
                        <a href="../views/views_teacher.php" class="btn btn-outline-secondary mr-2">Cerrar</a>
                        <button type="submit" class="btn btn-outline-primary" name="keep">Guardar Datos</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!--Modal de Editar profesores-->
<div id="editModal" class="modal fade" tabindex="-1" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header btn-primary">
                    <h5 class="modal-title text-white">Editar Profesores</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="color: white;">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <form action="../controllers/crud_edit_teachers.php" method="post">
                        <input type="hidden" name="id_teacher" id="id_teacher" class="form-control" value="<?php echo $get_teacher['id_teacher']; ?>">
                        <div class="form-group">
                            <label for="edit_name">editar Nombre</label>
                            <input type="text" class="form-control" id="name_teacher" name="name" required value="<?php echo $get_teacher['name']; ?>">
                        </div>
                        <div class="form-group">
                            <label for="edit_last">editar Apellido</label>
                            <input type="text" class="form-control" id="surname_teacher" name="surname" required value="<?php echo $get_teacher['surname']; ?>">
                        </div>
                        <div class="form-group">
                            <label for="edit_phone">editar Telefono</label>
                            <input type="text" class="form-control" id="phone_teacher" name="phone" required value="<?php echo $get_teacher['phone']; ?>">
                        </div>
                        <div class="form-group">
                            <label for="edit_mail">editar Email</label>
                            <input type="text" class="form-control" id="mail_teacher" name="mail" required value="<?php echo $get_teacher['mail']; ?>">
                        </div>
                        <div class="form-group">
                            <label for="edit_direction">editar Direccion</label>
                            <input type="text" class="form-control" id="direction_teacher" name="direction" required value="<?php echo $get_teacher['direction']; ?>">
                        </div>
                        <div class="form-group">
                            <label for="edit_heigth">editar Altura</label>
                            <input type="text" class="form-control" id="height_teacher" name="height" required value="<?php echo $get_teacher['height']; ?>">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Cerrar</button>
                            <button type="submit" class="btn btn-outline-primary" name="save_data">Guardar Cambios</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


<!-- Eliminar Profesor -->
<div id="delete_career_modal" class="modal fade" tabindex="-1" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header btn-primary">
                <h5 class="modal-title text-white">Eliminar Profesor</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="color: white";>
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="advertencia">
                    <h2>Advertencia</h2>
                    <p>¿Seguro que desea eliminar este elemento?</p>
                    <form action="../controllers/crud_delete_teacher.php" method="post">
                        <input type="hidden" name="id_teacher" id="id_teacher_eliminate" value="<?php echo $get_teacher['id_teacher']; ?>">
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
<script src="../js/modal.js"></script>
<script src="../js/all.js"></script>



</body>
</html>
