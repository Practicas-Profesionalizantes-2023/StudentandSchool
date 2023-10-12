<?php
session_start();
require_once '../controllers/stop_session.php';
require_once '../controllers/message_control.php';
require_once '../controllers/crud_insert_student.php';
require_once '../controllers/crud_edit_student.php';
require_once '../controllers/crud_eliminate_student.php';
checkSession();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Institutec</title>
    <link rel="stylesheet" href="../dist/css/footer.css">
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../dist/css/adminlte.min.css">
    <link rel="stylesheet" href="../dist/css/desing.css">
</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">
        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-blue navbar-dark">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="../views/dashboard_preceptor_home.php" class="nav-link">inicio</a>
                </li>
                <li class="nav-item d-none d-sm-inline-block active">
                    <a href="#" class="nav-link">Alumnos</a>
                </li>
               
            </ul>
            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                <!-- Navbar Search -->
                <li class="nav-item">
                    <a class="nav-link" data-widget="navbar-search" href="#" role="button">
                        <i class="fas fa-search"></i>
                    </a>
                    <div class="navbar-search-block">
                        <form class="form-inline">
                            <div class="input-group input-group-sm">
                                <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
                                <div class="input-group-append">
                                    <button class="btn btn-navbar" type="submit">
                                        <i class="fas fa-search"></i>
                                    </button>
                                    <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                                        <i class="fas fa-times"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                        <i class="fas fa-expand-arrows-alt"></i>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
                        <i class="fas fa-th-large"></i>
                    </a>
                </li>
            </ul>
         <?php show_messages_verify('desabilitado', "se deshabilito correctamente la preinscripcion");
         show_messages_error('ya_desabilitado', "ya esta  deshabilitada la preinscripcion");
         show_messages_verify('habilitado', "se habilito correctamente la preinscripcion");
         show_messages_error('ya_habilitado', "ya esta habilitada  la preinscripcion");
         ?>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-warning elevation-4">
            <!-- Brand Logo -->
            <a href="#" class="brand-link">
                <img src="../dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
                <span class="brand-text font-weight-light">Administrador</span>
            </a>
            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user panel (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <img src="../dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
                    </div>
                    <div class="info">
                        <a href="#" class="d-block"><?php echo $_SESSION['name'] ?></a>
                    </div>
                </div>
                <!-- SidebarSearch Form -->
                <div class="form-inline">
                    <div class="input-group" data-widget="sidebar-search">
                        <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
                        <div class="input-group-append">
                            <button class="btn btn-sidebar">
                                <i class="fas fa-search fa-fw"></i>
                            </button>
                        </div>
                    </div>
                </div>
                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                        <!-- Add icons to the links using the .nav-icon class
                           with font-awesome or any other icon font library -->
                        <li class="nav-item menu-open">
                            <a href="#" class="nav-link active">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p style="font-size: 14px;">
                                Configuraciòn
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="../controllers/Enable_Preregistration.php" class="nav-link active">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Activar Preinscripciones</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="../controllers/disable_preinscription.php" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p style="font-size: 14px;">Desactivar Preinscripciones</p>
                                    </a>
                                </li>
                                <li class="nav-item d-none d-sm-inline-block">
                                    <a href="../controllers/destroy_Session.php" class="nav-link">Cerrar Session</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">Gestion de Alumnos</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Ver Alumnos</a></li>
                                <li class="breadcrumb-item active">gestion de Alumnos</li>
                            </ol>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
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
        <h4>Alumnos
        
    
       <a href="#" class="btn btn-primary btn-lg create_students_Btn text-white float-right"><i class="fas fa-plus-circle fa-lg"></i></a>

       </h4>
        
        
        
     </div>

    </div>
    <div class="row py-5">
        <div class="col">
           <table class="table table-border small">
               <thead>
              
                    
                <tr class="bg-primary">
                    <th class="text-center long_letter">Nombre</th>
                    <th class="text-center long_letter">Apellido</th>
                    <th class="text-center long_letter">Fecha de nacimiento</th>
                    <th class="text-center long_letter">Direccion</th>
                    <th class="text-center long_letter">Altura</th>
                    <th class="text-center long_letter">DNI</th>
                    <th class="text-center long_letter">Email</th>
                    <th class="text-center long_letter">Telefono</th>
                    <th class="text-center long_letter">Ciclo Lectivo</th>
                    <th class="text-center long_letter">Carrera</th>
                    <th class="text-center long_letter">Genero</th>
                    <th class="text-center long_letter">Fecha de Alta</th>
                    <th class="text-center">Editar</th>
                    <th class="text-center">Eliminar</th>
                </tr>
                    

               </thead>
               <tbody>
                
              <?php foreach ($union_Student as $row) {
                # code...
               
               ?>
               <tr>
               
                <td class="text-center long_letter align-middle"> <?php echo $row['name'] ?></td>
                <td class="text-center long_letter align-middle"><?php echo $row['last_name'] ?></td>
                <td class="text-center long_letter align-middle"><?php echo date('d/m/Y ', strtotime($row['birth_date'])); ?></td>
                <td class="text-center long_letter align-middle"><?php echo $row['direction'] ?></td>
                <td class="text-center long_letter align-middle"><?php echo $row['height'] ?></td>
                <td class="text-center long_letter align-middle"><?php echo $row['uk_dni'] ?></td>
                <td class=" long_letter align-middle"><?php echo $row['email'] ?></td>
                <td class="text-center long_letter align-middle"><?php echo $row['phone'] ?></td>
                <td class="text-center long_letter align-middle"><?php echo $row['school_year'] ?></td>
                <td class="text-center long_letter align-middle"> <?php echo $row['career_name'] ?></td>
                <td class="text-center long_letter align-middle"><?php echo $row['details'] ?></td>
                <td class="text-center long_letter align-middle"><?php echo date('d/m/Y ', strtotime($row['fech_creation'])); ?></td>
                <td><a class="btn btn-warning float-right editBtn text-white" data-id="<?php echo $row['id_estudents']; ?>" data-name="<?php echo $row['name']; ?>" data-last="<?php echo $row['last_name']; ?>" data-direction="<?php echo $row['direction']; ?>" data-height="<?php echo $row['height']; ?>" data-dni="<?php echo $row['uk_dni']; ?>" data-mail="<?php echo $row['email']; ?>" data-phone="<?php echo $row['phone']; ?>"><i class="fas fa-edit"></i></a></td>
                <td><a class="btn btn-danger float-right delete_Btn text-white" data-id_students="<?php echo $row['id_estudents']; ?>"><i class="fas fa-trash-alt"></i></a></td>
               
            </tr>
               <?php }?>
               </tbody>
           </table>
        </div>
    </div>
    </main>
            <!-- Main content -->

          
<!-- Modal para Crear Alumnos-->
<div id="create_Modal" class="modal fade" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-md modal-dialog-scrollable"> <!-- Cambia modal-md para un tamaño mediano y permite el scroll -->
        <div class="modal-content">
            <div class="modal-header bg-primary">
               
                <h5 class="modal-title text-white">Dar de Alta Un Alumno</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="../controllers/crud_insert_student.php" method="post">
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
                        <input type="text" name="uk_dni" class="form-control form-control-sm" required pattern="^\d{8}$" title="Debe contener exactamente 8 dígitos">
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" name="email" class="form-control form-control-sm" required> <!-- Cambia a form-control-sm para un input más pequeño -->
                    </div>
                   
                    <div class="form-group">
                        <label for="phone">Teléfono</label>
                        <input type="text" name="phone" class="form-control form-control-sm" required pattern="^\d{10}$" title="Debe contener exactamente 11 dígitos"> <!-- Cambia a form-control-sm para un input más pequeño -->
                    </div>
                    <div class="form-group">
                        <label for="date">Fecha de Nacimiento</label>
                        <input type="date" name="birth_date" class="form-control form-control-sm" required> <!-- Cambia a form-control-sm para un input más pequeño -->
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

<!-- Fin Modal para Crear Alumnos -->
<!--Modal de Editar Alumnos-->
<div id="editModal" class="modal fade" tabindex="-1" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-primary">
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
                            <input type="text" class="form-control" id="dni_students" name="uk_dni"  required pattern="^\d{8}$" title="Debe contener exactamente 8 dígitos" value="<?php echo $get_student['uk_dni']; ?>">
                        </div>
                        <div class="form-group">
                            <label for="edit_mail">editar Mail</label>
                            <input type="text" class="form-control" id="mail_students" name="email" required value="<?php echo $get_student['email']; ?>">
                        </div>
                        <div class="form-group">
                            <label for="edit_phone">editar Telefono</label>
                            <input type="text" class="form-control" id="phone_students" name="phone"  required pattern="^\d{10}$" title="Debe contener exactamente 11 dígitos" value="<?php echo $get_student['phone']; ?>">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Cerrar</button>
                            <button type="submit" class="btn btn-outline-primary" name="save_data">Guardar Cambios</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div> <!-- Fin Modal para Editar Alumnos-->


<!-- Eliminar Alumno -->
<div id="deleteModal" class="modal fade" tabindex="-1" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h5 class="modal-title text-white">Eliminar al Alumno</h5>
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
</div>
            <!--final del eliminar carrera--->
        </div>
        <!-- /.content-wrapper -->

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <div class="p-3">
                <h5>Institutec</h5>
                <p>Aplicacion web para la gestion institucional de nivel terciario</p>
            </div>
        </aside>
        <!-- /.control-sidebar -->

        <!-- Main Footer -->
        <footer class="footer">
            <!-- To the right -->
            <div class="float-right d-none d-sm-inline">
                Descubre más sobre nosotros
            </div>
            <!-- Default to the left -->
            <strong>© 2023 <a href="../views/about.php">Institutec</a>.</strong> todos los derechos reservados
        </footer>
    </div>
    <!-- ./wrapper -->

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="../js/modal_studens.js"></script>
    <script src="../plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="../dist/js/adminlte.min.js"></script>

</body>

</html>
