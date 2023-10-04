<?php
session_start();
require_once '../controllers/stop_session.php';
require_once '../controllers/message_control.php';
require_once '../controllers/crud_insert_student.php';
require_once '../controllers/crud_edit_student.php';
require_once '../controllers/crud_eliminate_student.php';

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
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
    <link rel="stylesheet" href="../css/footer.css/">
    <link rel="stylesheet" href="css/custom.css">
    <!--my links css home_page and footer css-->
    <link rel="stylesheet" href="../css/home_page_preceptor.css">
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
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="dropdown-a" data-toggle="dropdown">Configuración</a>
                            <div class="dropdown-menu" aria-labelledby="dropdown-a">
                                <a class="dropdown-item" href="../controllers/disable_preinscription.php">Desactivar Preinscripción</a>
                                <a class="dropdown-item" href="../controllers/Enable_Preregistration.php">Habilitar Preinscripción</a>
                                <a class="dropdown-item" href="../controllers/destroy_Session.php">Cerrar Sesión</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
   


<!---tabla con nuestros datos--->  
   <!--<main class="container">
    <div class="row">
     <div class="col">
     <a class="btn btn-secondary" href="dasboard_home_preceptor.php">Regresar</a>
        <h4>Crud de Alumnos
        
        </h4>
    </div>
    <a href="form_insert_student.php" class="btn btn-primary btn-lg create_career_Btn text-white float-right"><i class="fas fa-plus-circle fa-lg"></i></a>
    </div>
    <div class="row py-3">
        <div class="col">
           <table class="table table-border ">
               <thead>
               <tr class="btn-primary">
                    
                    <th>Id alumno</th>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Fecha de nacimiento</th>
                    <th>Direccion</th>
                    <th>Altura</th>
                    <th>DNI</th>
                    <th>Email</th>
                    <th>Telefono</th>
                    <th>Carrera</th>
                    <th>Genero</th>
                    <th>fecha de creacion</th>
                    <th>ver detalle</th>
                    <th>Editar</th>
                    <th>Eliminar</th>
                    
                </tr>
               </thead>
               <tbody>
               <?php
              
               foreach ($union_Student as $row) {
                # code...
               
               ?>
               <tr>
                <td> <?php echo $row['id_estudents'] ?></td>
                <td> <?php echo $row['name'] ?></td>
                <td> <?php echo $row['last_name'] ?></td>
                <td><?php echo date('d/m/Y ', strtotime($row['birth_date'])); ?></td>
                <td> <?php echo $row['direction'] ?></td>
                <td> <?php echo $row['height'] ?></td>
                <td> <?php echo $row['uk_dni'] ?></td>
                <td> <?php echo $row['email'] ?></td>
                <td> <?php echo $row['phone'] ?></td>
                <td> <?php echo $row['career_name'] ?></td>
                <td> <?php echo $row['details'] ?></td>
                <td><?php echo date('d/m/Y ', strtotime($row['fech_creation'])); ?></td>
                <td><a href="dasboard_home_preceptor?id=<?php echo $row['id_estudents'] ?>" class="btn btn-info float-right">ver detalle</a></td>
                <td><a href="form_edit_student.php?id=<?php echo $row['id_estudents'] ?>" class="btn btn-warning float-right">Editar Alumnos</a></td>
                <td><a href="../views/eliminate_student.php?id=<?php echo $row['id_estudents'] ?>" class="btn btn-danger float-right">Eliminar Alumnos</a></td>
               </tr>
               </tr>
               <?php }?>
               </tbody>
           </table>
        </div>
    </div>

    </main>-->


    <br>
    <br>
    
    <main class="container">
     <?php 
      show_messages_verify('insertado', "se creo el registro correctamente");
      show_messages_verify('editado', "se edito el registro correctamente");
      show_messages_verify('borrado', "se borro registro correctamente");
     ?>
    <div class="row">
     <div class="col">
        <h4>Crud de Alumnos
        
    
       <a href="#" class="btn btn-primary btn-lg create_students_Btn text-white float-right"><i class="fas fa-plus-circle fa-lg"></i></a>

       </h4>
        
        
        
     </div>

    </div>
    <div class="row py-3">
        <div class="col">
           <table class="table table-border">
               <thead>
              
                    
                <tr class="btn-primary">
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th style="max-width: 160px; white-space: nowrap;">Fecha de nacimiento</th>
                    <th>Direccion</th>
                    <th>Altura</th>
                    <th>DNI</th>
                    <th>Email</th>
                    <th>Telefono</th>
                    <th  style="max-width: 170px; white-space: nowrap;">Carrera</th>
                    <th>Genero</th>
                    <th style="max-width: 170px; white-space: nowrap;">Fecha de Alta</th>
                    <th>Editar</th>
                    <th>Eliminar</th>
                </tr>
                    

               </thead>
               <tbody>
                
              <?php foreach ($union_Student as $row) {
                # code...
               
               ?>
               <tr>
               
                <td style="max-width: 170px; white-space: nowrap;"> <?php echo $row['name'] ?></td>
                <td><?php echo $row['last_name'] ?></td>
                <td style="text-align: center;"><?php echo date('d/m/Y ', strtotime($row['birth_date'])); ?></td>
                <td><?php echo $row['direction'] ?></td>
                <td><?php echo $row['height'] ?></td>
                <td><?php echo $row['uk_dni'] ?></td>
                <td><?php echo $row['email'] ?></td>
                <td><?php echo $row['phone'] ?></td>
                <td style="max-width: 170px; white-space: nowrap;"> <?php echo $row['career_name'] ?></td>
                <td><?php echo $row['details'] ?></td>
                <td style="text-align: center;"><?php echo date('d/m/Y ', strtotime($row['fech_creation'])); ?></td>
                <td><a class="btn btn-warning float-right editBtn text-white" data-id="<?php echo $row['id_estudents']; ?>" data-name="<?php echo $row['name']; ?>" data-last="<?php echo $row['last_name']; ?>" data-direction="<?php echo $row['direction']; ?>" data-height="<?php echo $row['height']; ?>" data-dni="<?php echo $row['uk_dni']; ?>" data-mail="<?php echo $row['email']; ?>" data-phone="<?php echo $row['phone']; ?>"><i class="fas fa-edit"></i></a></td>
                <td><a class="btn btn-danger float-right delete_Btn text-white" data-id_students="<?php echo $row['id_estudents']; ?>"><i class="fas fa-trash-alt"></i></a></td>
               
            </tr>
               <?php }?>
               </tbody>
           </table>
        </div>
    </div>
    </main>


    
<!-- Modal para Crear Alumnos-->
<div id="create_Modal" class="modal fade" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-md modal-dialog-scrollable"> <!-- Cambia modal-md para un tamaño mediano y permite el scroll -->
        <div class="modal-content">
            <div class="modal-header btn-primary">
                <h5 class="modal-title text-white">Dar de Alta Un Alumno</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="../controllers/crud_insert_teacher.php" method="post">
                    <div class="form-group">
                        <label for="name">Nombre</label>
                        <input type="text" name="name" class="form-control form-control-sm" required> <!-- Cambia a form-control-sm para un input más pequeño -->
                    </div>
                    <div class="form-group">
                        <label for="last_name">Apellido</label>
                        <input type="text" name="last_name" class="form-control form-control-sm" required> <!-- Cambia a form-control-sm para un input más pequeño -->
                    </div>
                    <div class="form-group">
                        <label for="direction">Dirección</label>
                        <input type="text" name="direction" class="form-control form-control-sm" required> <!-- Cambia a form-control-sm para un input más pequeño -->
                    </div>
                    <div class="form-group">
                        <label for="height">Altura</label>
                        <input type="text" name="height" class="form-control form-control-sm" required> <!-- Cambia a form-control-sm para un input más pequeño -->
                    </div>
                    <div class="form-group">
                        <label for="uk_dni">DNI</label>
                        <input type="text" name="uk_dni" class="form-control form-control-sm" required> <!-- Cambia a form-control-sm para un input más pequeño -->
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" name="email" class="form-control form-control-sm" required> <!-- Cambia a form-control-sm para un input más pequeño -->
                    </div>
                    <div class="form-group">
                        <label for="dni">DNI</label>
                        <input type="text" name="dni" class="form-control form-control-sm" required> <!-- Cambia a form-control-sm para un input más pequeño -->
                    </div>
                    <div class="form-group">
                        <label for="phone">Teléfono</label>
                        <input type="text" name="phone" class="form-control form-control-sm" required> <!-- Cambia a form-control-sm para un input más pequeño -->
                    </div>
                    <div class="form-group">
                        <label for="fk_career_id">Carrera</label>
                        <select name="fk_career_id" class="form-control form-control-sm" required> <!-- Cambia a form-control-sm para un input más pequeño -->
                            <?php foreach ($data_career as $show) { ?>
                                <option value="<?php echo $show['id_career']; ?>"><?php echo $show['career_name']; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="id_gender">Sexo</label>
                        <select name="id_gender" class="form-control form-control-sm" required> <!-- Cambia a form-control-sm para un input más pequeño -->
                            <?php foreach ($data_gender as $show) { ?>
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



<!--Modal de Editar Alumnos-->
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
                    <form action="../controllers/crud_edit_student.php" method="post">
                        <input type="hidden" name="id_estudents" id="id_students" class="form-control" value="<?php echo $get_student['id_estudents']; ?>">
                        <div class="form-group">
                            <label for="edit_name">editar Nombre</label>
                            <input type="text" class="form-control" id="name_students" name="name" required value="<?php echo $get_student['name']; ?>">
                        </div>
                        <div class="form-group">
                            <label for="edit_name">editar Apellido</label>
                            <input type="text" class="form-control" id="last_students" name="last_name" required value="<?php echo $get_student['last_name']; ?>">
                        </div>
                        <div class="form-group">
                            <label for="edit_directiòn">editar Direcciòn</label>
                            <input type="text" class="form-control" id="direction_students" name="direction" required value="<?php echo $get_student['direction']; ?>">
                        </div>
                        <div class="form-group">
                            <label for="edit_heigth">editar Altura</label>
                            <input type="text" class="form-control" id="heigh_students" name="height" required value="<?php echo $get_student['height']; ?>">
                        </div>
                        <div class="form-group">
                            <label for="edit_heigth">editar Dni</label>
                            <input type="text" class="form-control" id="dni_students" name="uk_dni" required value="<?php echo $get_student['uk_dni']; ?>">
                        </div>
                        <div class="form-group">
                            <label for="edit_mail">editar Mail</label>
                            <input type="text" class="form-control" id="mail_students" name="email" required value="<?php echo $get_student['email']; ?>">
                        </div>
                        <div class="form-group">
                            <label for="edit_phone">editar Telefono</label>
                            <input type="text" class="form-control" id="phone_students" name="phone" required value="<?php echo $get_student['phone']; ?>">
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




<!-- Eliminar Alumno -->
<div id="deleteModal" class="modal fade" tabindex="-1" role="dialog">
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
                    <form action="../controllers/crud_eliminate_student.php" method="post">
                        <input type="hidden" name="id_estudent" id="id_students_eliminate" value="<?php echo $get_student['id_estudents']; ?>">
                        <div class="btn-group" role="group" aria-label="Botones de acción">
                            <button type="submit" class="btn btn-outline-danger mr-2" name="delete">Eliminar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>




<!-- Agrega este código JavaScript al final de tu archivo -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="../js/bootstrap.min.js"></script>
<script src="../js/all.js"></script>
<script src="../js/modal_studens.js"></script>

</body>
</html>
