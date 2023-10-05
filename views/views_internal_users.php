<?php
session_start();
require_once '../controllers/stop_session.php';
require_once '../controllers/crud_view_internal_user.php';
require_once '../controllers/message_control.php';
require_once '../controllers/crud_create_new_user.php';
require_once '../controllers/crud_eliminate_user.php';

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
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/../js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
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
						<li class="nav-item "><a class="nav-link" href="../views/dasboard_home_preceptor.php">Inicio</a></li>
						<li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle" href="#" id="dropdown-a" data-toggle="dropdown"> Gestionar Carrera</a>
							<div class="dropdown-menu" aria-labelledby="dropdown-a">
								<a class="dropdown-item" href="../views/views_crud_admin_careers.php">Carreras</a>
								
							</div>
						</li>
                        <li class="nav-item dropdown ">
							<a class="nav-link dropdown-toggle" href="#" id="dropdown-a" data-toggle="dropdown"> Gestionar Profesores</a>
							<div class="dropdown-menu" aria-labelledby="dropdown-a">
								<a class="dropdown-item" href="../views/views_teacher.php">Ver Profesores</a>
							</div>
						</li>
                        
                        <li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle" href="#" id="dropdown-a" data-toggle="dropdown"> Gestionar Alumnos</a>
							<div class="dropdown-menu" aria-labelledby="dropdown-a">
								<a class="dropdown-item" href="views_crud_pre_registered.php">Preinscriptos</a>
								<a class="dropdown-item" href="#">Inscribir Alumnos</a>
							</div>
						</li>
						
                       
						
                            <li class="nav-item dropdown active">
							<a class="nav-link dropdown-toggle" href="#" id="dropdown-a" data-toggle="dropdown"> Gestionar Usuarios</a>
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
	<!-- End header -->
	
	<!---vista usuarios internos-->
	<main class="container">
    <div class="row">
        <div class="col">
            <br>
            <br>
            <br>
            <?php
                show_messages_verify('eliminado', "se eliminó el registro correctamente");
                show_messages_error('desabilitado', "el registro ya está deshabilitado");
                show_messages_verify('desabilitado_correcto', "el registro ya se encuentra deshabilitado correctamente");
                show_messages_error('habilitado', "el registro ya se encuentra habilitado");
                show_messages_verify('habilitado_correcto', "se registro se habilitó correctamente");
                show_messages_verify('creado', "se registro correctamente");
                show_messages_error('dato_no_encontrado', "no se encontraron datos");
            ?>
            <a class="btn btn-primary btn-lg create_career_Btn text-white float-right"><i class="fas fa-plus-circle fa-lg"></i></a>
        </div>
    </div>

    <div class="row py-3">
        <div class="col">
            <form action="../controllers/crud_view_internal_user.php" method="post">
                <div class="input-group mb-3">
                    <div class="input-group-append">
                        <input type="text" class="search" placeholder="Buscar..." name="search_name">
                        <button class="btn btn-outline-primary" type="submit" name="search">
                            <i class="fas fa-search"></i> Buscar
                        </button>
                    </div>
                </div>
           
                <table id="table-body" class="table table-border">
                    <thead class="btn-primary">
                        <tr>
                            <th>Nombre</th>
                            <th>DNI</th>
                            <th>Email</th>
                            <th>Tipo de Rol</th>
                            <th>Estado</th>
                            <th>Desabilitar Cuenta</th>
                            <th>Habilitar Cuenta</th>
                            <th>Eliminar Cuenta</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (isset($searchResults)) { ?>
                            <?php foreach($searchResults as $row) { ?>
                                <tr>
                                    <td><?php echo $row['name'] ?></td>
                                    <td><?php echo $row['dni'] ?></td>
                                    <td><?php echo $row['mail'] ?></td>
                                    <td><?php echo $row['details'] ?></td>
                                    <td><?php echo ($row['state'] == 1) ? 'Activo' : 'Inactivo'; ?></td>
                                    <td>
                                        <button class="btn btn-danger" name="desability" value="<?php echo $row['id_user'] ?>">
                                            <i class="fas fa-ban"></i>
                                        </button>
                                    </td>
                                    <td>
                                        <button class="btn btn-primary" name="hability" value="<?php echo $row['id_user'] ?>">
                                            <i class="fas fa-check"></i>
                                        </button>
                                    </td>
                                    <td>
                                        <a class="btn btn-warning float-right user_delete_Btn text-white" data-id_user="<?php echo $row['id_user']; ?>">
                                            <i class="fas fa-trash-alt"></i>
                                        </a>
                                    </td>
                                </tr>
                            <?php } ?>
                        <?php } else { ?>
                            <?php foreach ($union as $row) { ?>
                                <tr>
                                    <td><?php echo $row['name'] ?></td>
                                    <td><?php echo $row['dni'] ?></td>
                                    <td><?php echo $row['mail'] ?></td>
                                    <td><?php echo $row['details'] ?></td>
                                    <td><?php echo ($row['state'] == 1) ? 'Activo' : 'Inactivo'; ?></td>
                                    <td>
                                        <button class="btn btn-danger" name="desability" value="<?php echo $row['id_user'] ?>">
                                            <i class="fas fa-ban"></i>
                                        </button>
                                    </td>
                                    <td>
                                        <button class="btn btn-primary" name="hability" value="<?php echo $row['id_user'] ?>">
                                            <i class="fas fa-check"></i>
                                        </button>
                                    </td>
                                    <td>
                                        <a class="btn btn-warning float-right user_delete_Btn text-white" data-id_user="<?php echo $row['id_user']; ?>">
                                            <i class="fas fa-trash-alt"></i>
                                        </a>
                                    </td>
                                </tr>
                            <?php } ?>
                        <?php } ?>
                    </tbody>
                </table>
            </form>
        </div>
    </div>
</main>

<!-- Modal para Crear nuevo usuario -->
<div id="create_Modal" class="modal fade" tabindex="-1" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header btn-primary">
                <h5 class="modal-title text-white">Dar de Alta a un Usuario</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"  style="color: white";>
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="../controllers/crud_create_new_user.php" method="post">
                    <div class="form-group">
                        <label for="subject">Ingrese Nombre Completo</label>
                        <input type="text" placeholder="Ingrese el Nombre" name="name" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="subject">Ingrese el Documento de Identidad</label>
                        <input type="text" placeholder="Ingrese el dni" name="dni" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="subject">Ingrese un Correo Electrónico</label>
                        <input type="text" placeholder="Ingrese el correo electrónico" name="mail" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="subject">Ingrese La Contraseña</label>
                        <input class="form-control" type="password" name="password" placeholder="Contraseña" id="password" required>
                    </div>
                    <div class="form-group">
                        <label for="rol">Elija el rol del usuario:</label>
                        <select name="rol" id="rool" class="form-control" required>
                            <?php foreach ($rol as $roles) { ?>
                                <option value="<?php echo $roles['id_rol']; ?>"><?php echo $roles['details']; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="text-center">
                        <a href="../views/views_internal_users.php" class="btn btn-outline-secondary mr-2">Cerrar</a>
                        <button type="submit" class="btn btn-outline-primary" name="save_data">Guardar Datos</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


<!-- Eliminar Usuario -->
<div id="delete_modal" class="modal fade" tabindex="-1" role="dialog">
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
                    <form action="../controllers/crud_eliminate_user.php" method="post">
                        <input type="hidden" name="id_user" id="id_user_eliminate" value="<?php echo $get_user['id_user']; ?>">
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
<script src="../js/modal_internal_user.js"></script>
<script src="../js/all.js"></script>


</body>
</html>


