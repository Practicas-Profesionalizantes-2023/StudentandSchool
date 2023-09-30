<?php 
session_start();

require_once '../controllers/crud_pre_registered_controller.php';
require_once '../controllers/crud_edit_controller.php';
require_once '../controllers/crud_eliminate_register.php';
require_once '../controllers/stop_session.php';
require_once '../controllers/message_control.php';

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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
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
    <link rel="stylesheet" href="../css/home_page_preceptor.css">
    <link rel="stylesheet" href="../css/footer.css">
    <!-- Modernizer for Portfolio -->
    <script src="../js/modernizer.js"></script>
    <title>Institutec</title>
</head>
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
                               
                            </div>
                        </li>
                        <li class="nav-item dropdown ">
							<a class="nav-link dropdown-toggle" href="../views/views_teacher.php" id="dropdown-a" data-toggle="dropdown"> Gestionar Profesores</a>
							<div class="dropdown-menu" aria-labelledby="dropdown-a">
								<a class="dropdown-item" href="views_teacher.php">Ver Profesores</a>
							</div>
						</li>
                        <li class="nav-item dropdown active">
                            <a class="nav-link dropdown-toggle" href="#" id="dropdown-a" data-toggle="dropdown"> Gestionar Alumnos</a>
                            <div class="dropdown-menu" aria-labelledby="dropdown-a">
                                <a class="dropdown-item" href="#">Preinscriptos</a>
                                <a class="dropdown-item" href="#">Inscribir Alumnos</a>
                            </div>
                        </li>
                        <li class="nav-item dropdown">
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

    <!-- Agrega aquí el resto de tu código HTML -->

    <!-- Vista usuarios internos -->
    <main class="container">
        <div class="row">
            <div class="col">
                <br>
                <br>
                <br>
                <?php
                show_messages_verify('eliminado', "se elimino el registro correctamente");
                show_messages_verify('editado', "se  edito el registro correctamente");
                ?>
            </div>
        </div>

        <div class="row py-3">
            <div class="col">
                <form action="../controllers/crud_pre_registered_controller.php" method="post">
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
                                <th style="max-width: 170px; white-space: nowrap;">Nombre Completo</th>
                                <th style="max-width: 170px; white-space: nowrap;">Apellido</th>
                                <th style="max-width: 170px; white-space: nowrap;">Telefono</th>
                                <th style="max-width: 170px; white-space: nowrap;">E_mail</th>
                                <th style="max-width: 170px; white-space: nowrap;">Fecha de nacimiento</th>
                                <th style="max-width: 170px; white-space: nowrap;">Dni</th>
                                <th style="max-width: 170px; white-space: nowrap;">Carrera</th>
                                <th style="max-width: 170px; white-space: nowrap;">Calle y Altura</th>
                                <th style="max-width: 170px; white-space: nowrap;">Genero</th>
                                <th style="max-width: 170px; white-space: nowrap;">Editar</th>
                                <th style="max-width: 170px; white-space: nowrap;">Borrar</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (isset($searchResults)) { ?>
                                <?php foreach($searchResults as $row) { ?>
                                    <tr>
                                        <td><?php echo $row['name']?></td>
                                        <td> <?php echo $row['last_name']?></td>
                                        <td><?php echo $row['phone']?></td>
                                        <td><?php echo $row['mail']?></td>
                                        <td><?php echo date('d/m/Y', strtotime($row['date'])); ?></td>
                                        <td><?php echo $row['dni']?></td>
                                        <td><?php echo $row['carrer']?></td>
                                        <td><?php echo $row['heigth_street']?></td>
                                        <td><?php echo $row['gender']?></td>
                                        <td><a class="btn btn-warning float-right editBtn text-white" data-id="<?php echo $row['id_pre_user']; ?>" data-name="<?php echo $row['name']; ?>" data-last="<?php echo $row['last_name']; ?>" data-phone="<?php echo $row['phone']; ?>" data-mail="<?php echo $row['mail']; ?>" data-career="<?php echo $row['carrer']; ?>" data-street="<?php echo $row['heigth_street']; ?>"><i class="fas fa-edit"></i></a></td>
                                        <td>
                                            <a class="btn btn-warning float-right user_delete_Btn text-white" data-id_user="<?php echo $row['id_user']; ?>">
                                                <i class="fas fa-trash-alt"></i>
                                            </a>
                                        </td>  
                                    </tr>
                                <?php } ?>
                            <?php } else { ?>
                                <?php foreach ($show_pre_register as $row) { ?>
                                    <tr>
                                        <td><?php echo $row['name']?></td>
                                        <td> <?php echo $row['last_name']?></td>
                                        <td><?php echo $row['phone']?></td>
                                        <td><?php echo $row['mail']?></td>
                                        <td><?php echo date('d/m/Y', strtotime($row['date'])); ?></td>
                                        <td><?php echo $row['dni']?></td>
                                        <td><?php echo $row['carrer']?></td>
                                        <td><?php echo $row['heigth_street']?></td>
                                        <td><?php echo $row['gender']?></td>
                                        <td><a class="btn btn-warning float-right editBtn text-white" data-id="<?php echo $row['id_pre_user']; ?>" data-name="<?php echo $row['name']; ?>" data-last="<?php echo $row['last_name']; ?>" data-phone="<?php echo $row['phone']; ?>" data-mail="<?php echo $row['mail']; ?>" data-career="<?php echo $row['carrer']; ?>" data-street="<?php echo $row['heigth_street']; ?>"><i class="fas fa-edit"></i></a></td>
                                        <td>
                                            <a class="btn btn-warning float-right user_delete_Btn text-white" data-id_pre_user="<?php echo $row['id_pre_user']; ?>">
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

    <!--Modal de Editar pre inscripto-->
    <div id="editModal" class="modal fade" tabindex="-1" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header btn-primary">
                    <h5 class="modal-title text-white">Editar A Preinscriptos</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="color: white;">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <form action="../controllers/crud_edit_controller.php" method="post">
                        <input type="hidden" name="user_id" id="id_pre_user" class="form-control" value="<?php echo $get_user['id_pre_user']; ?>">
                        <div class="form-group">
                            <label for="edit_name">editar Nombre</label>
                            <input type="text" class="form-control" id="name" name="name" required value="<?php echo $get_user['name']; ?>">
                        </div>
                        <div class="form-group">
                            <label for="edit_last">editar Apellido</label>
                            <input type="text" class="form-control" id="last" name="last_name" required value="<?php echo $get_user['last_name']; ?>">
                        </div>
                        <div class="form-group">
                            <label for="edit_phone">editar Telefono</label>
                            <input type="text" class="form-control" id="phone" name="phone" required value="<?php echo $get_user['phone']; ?>">
                        </div>
                        <div class="form-group">
                            <label for="edit_mail">editar Email</label>
                            <input type="text" class="form-control" id="mail" name="mail" required value="<?php echo $get_user['mail']; ?>">
                        </div>
                        <div class="form-group">
                            <label for="edit_Career">editar Carrera</label>
                            <select name="carrer" id="carrer" class="form-control">
                                <?php foreach ($show as $carrer) { ?>
                                 <option value="<?php echo $carrer['career_name']; ?>"><?php echo $carrer['career_name']; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="edit_direction">editar Direccion</label>
                            <input type="text" class="form-control" id="street" name="heigth_street" required value="<?php echo $get_user['heigth_street']; ?>">
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

    <!-- Eliminar preinscripto -->
    <div id="delete_modal" class="modal fade" tabindex="-1" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header btn-primary">
                    <h5 class="modal-title text-white">Eliminar Materia</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="color: white;">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="advertencia">
                        <h2>Advertencia</h2>
                        <p>¿Seguro que desea eliminar este elemento?</p>
                        <form action="../controllers/crud_eliminate_register.php" method="post">
                        <input type="hidden" id="id" name="id_pre_user" value="<?php echo $get_user['id_pre_user'];?>">
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

 