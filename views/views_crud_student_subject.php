<?php
session_start();
require_once '../model/query.php';
require_once '../controllers/stop_session.php';
require_once '../controllers/message_control.php';
require_once '../controllers/crud_create_student_subject.php';
require_once '../controllers/crud_views_student_subject.php';
require_once '../controllers/crud_create_student_subject.php';
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
        
    
       <a href="#" class="btn btn-primary btn-lg create_Btn text-white float-right"><i class="fas fa-plus-circle fa-lg"></i></a>

       </h4>
        
        
        
     </div>

    </div>
    <div class="row py-3">
        <div class="col">
           <table class="table table-border">
               <thead>
              
                    
                <tr class="btn-primary">
                    <th>id</th>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Materia</th>
                    <th>Carrera</th>
                    <th>Eliminar</th>
                </tr>
                    

               </thead>
               <tbody>
                
              <?php foreach ($union as $row) {
                # code...
               
               ?>
               <tr>
                <td><?php echo $row['id'] ?></td>
                <td><?php echo $row['name'] ?></td>
                <td><?php echo $row['last_name'] ?></td>
                <td><?php echo $row['subject_name'] ?></td>
                <td><?php echo $row['name_career'] ?></td>
                <td><a class="btn btn-danger float-right delete_Btn text-white" data-id_subject_students="<?php echo $row['student_subject_id']; ?>"><i class="fas fa-trash-alt"></i></a></td>
               
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
                <form action="../controllers/crud_create_student_subject.php" method="post">
                    
                    <div class="form-group">
                        <label for="students">Elija el alumno al que asignarle las materias</label>
                        <select name="student" class="form-control form-control-sm" required> <!-- Cambia a form-control-sm para un input más pequeño -->
                            <?php foreach ($student_data as $show) { ?>
                                <option value="<?php echo $show['id_estudents'];?>"><?php echo $show['name'].$show['last_name']; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group">
                            <label for="subjects" class="text-white">Seleccione las Materias (Mantén presionada la tecla Ctrl para seleccionar varias)</label>
                            <select name="subjects[]" id="select_subject" class="form-control" multiple required>
                                <?php foreach ($subject_data as $row) { ?>
                                    <option value="<?php echo $row['id_subjects']; ?>"><?php echo $row['subject_name']; ?></option>
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



<!-- Eliminar asignacion de alumno con la materia -->
<div id="deleteModal" class="modal fade" tabindex="-1" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header btn-primary">
                <h5 class="modal-title text-white">Eliminar La relacion del Alumno con la Materia</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="color: white";>
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="advertencia">
                    <h2>Advertencia</h2>
                    <p>¿Seguro que desea eliminar este elemento?</p>
                    <form action="../controllers/crud_eliminate_subject_student.php" method="post">
                        <input type="hidden" name="id_student_subject" id="id_students_subject_eliminate" value="<?php echo $get['id_estudents']; ?>">
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
<script src="../js/modal_student_subject.js"></script>

</body>
</html>
