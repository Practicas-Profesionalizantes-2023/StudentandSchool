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
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
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
        <a href="#" class="nav-link">Preinscriptos</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="../views/views_students.php" class="nav-link">Ver Estudiantes</a>
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
        <?php show_messages_verify('desabilitado', "se deshabilito correctamente la preinscripcion");
         show_messages_error('ya_desabilitado', "ya esta  deshabilitada la preinscripcion");
         show_messages_verify('habilitado', "se habilito correctamente la preinscripcion");
         show_messages_error('ya_habilitado', "ya esta habilitada  la preinscripcion");
        ?>
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
            <h1 class="m-0">Gestion de Preinscriptos</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Ver Preinscriptos</a></li>
              <li class="breadcrumb-item active">gestion de prenscriptos</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
<!-- Main content -->


<main class="container">
    <div class="row">
        <div class="col">
            <br>
            <br>
            <br>
            <?php
            show_messages_verify('eliminado', "se eliminó el registro correctamente");
            show_messages_verify('editado', "se editó el registro correctamente");
            show_messages_verify('transferido', "La inscripción del alumno se ha realizado con éxito");
            ?>
        </div>
    </div>

    <div class="row py-5">
        <div class="col-22">
            <form action="../controllers/crud_pre_registered_controller.php" method="post">
                <div class="input-group mb-3">
                    <div class="input-group-append">
                        <input type="text" class="search" placeholder="Buscar..." name="search_name">
                        <button class="btn btn-outline-primary" type="submit" name="search">
                            <i class="fas fa-search"></i> Buscar
                        </button>
                    </div>
                </div>
            
                <table id="table-body" class="table table-border small">
                    <thead class="bg-primary">
                        <tr>
                            <th class="text-center long_letter">Nombre Completo</th>
                            <th class="text-center long_letter">Apellido</th>
                            <th class="text-center long_letter">Teléfono</th>
                            <th class="text-center long_letter">Email</th>
                            <th class="text-center long_letter">Fecha de nacimiento</th>
                            <th class="text-center long_letter">DNI</th>
                            <th class="text-center long_letter">Carrera</th>
                            <th class="text-center long_letter">Calle y Altura</th>
                            <th class="text-center long_letter">Género</th>
                            <th>Aceptar Inscripcion</th>
                            <th>Editar</th>
                            <th>Borrar</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (isset($searchResults)) { ?>
                            <?php foreach($searchResults as $row) { ?>
                                <tr>
                                    <td class="text-center align-middle"><?php echo $row['name']?></td>
                                    <td class="text-center align-middle"><?php echo $row['last_name']?></td>
                                    <td class="text-center align-middle"><?php echo $row['phone']?></td>
                                    <td class="text-center align-middle"><?php echo $row['mail']?></td>
                                    <td class="text-center align-middle"><?php echo date('d/m/Y', strtotime($row['date'])); ?></td>
                                    <td class="text-center align-middle"><?php echo $row['dni']?></td>
                                    <td class="text-center align-middle"><?php echo $row['carrer']?></td>
                                    <td class="text-center align-middle"><?php echo $row['heigth_street']?></td>
                                    <td class="text-center align-middle"><?php echo $row['gender']?></td>
                                    <td class="text-center align-middle">
                                      <button class="btn btn-primary" name="copy" value="<?php echo $row['id_pre_user'] ?>">
                                         <i class="fas fa-user"></i>
                                     </a>
                                 </td>
                                    <td>
                                        <a class="btn btn-warning float-right editBtn text-white" data-id="<?php echo $row['id_pre_user']; ?>" data-name="<?php echo $row['name']; ?>" data-last="<?php echo $row['last_name']; ?>" data-phone="<?php echo $row['phone']; ?>" data-mail="<?php echo $row['mail']; ?>" data-career="<?php echo $row['carrer']; ?>" data-street="<?php echo $row['heigth_street']; ?>"><i class="fas fa-edit"></i></a>
                                    </td>
                                    <td>
                                        <a class="btn btn-danger float-right delete_Btn text-white" data-id_user="<?php echo $row['id_user']; ?>">
                                            <i class="fas fa-trash-alt"></i>
                                        </a>
                                    </td>  
                                </tr>
                            <?php } ?>
                        <?php } else { ?>
                            <?php foreach ($show_pre_register as $row) { ?>
                                <tr>
                                    <td class="text-center align-middle"><?php echo $row['name']?></td>
                                    <td class="text-center align-middle"><?php echo $row['last_name']?></td>
                                    <td class="text-center align-middle"><?php echo $row['phone']?></td>
                                    <td class="text-center align-middle"><?php echo $row['mail']?></td>
                                    <td class="text-center align-middle"><?php echo date('d/m/Y', strtotime($row['date'])); ?></td>
                                    <td class="text-center align-middle"><?php echo $row['dni']?></td>
                                    <td class="text-center align-middle" style="max-width: 200px; white-space: nowrap;"><?php echo $row['carrer']?></td>
                                    <td class="text-center align-middle" style="max-width: 200px; white-space: nowrap;"><?php echo $row['heigth_street']?></td>
                                    <td class="text-center align-middle"><?php echo $row['gender']?></td>
                                    <td class="text-center">
                                      <button class="btn btn-primary" name="copy" value="<?php echo $row['id_pre_user'] ?>">
                                         <i class="fas fa-user"></i>
                                     </a>
                                 </td>
                                    <td>
                                        <a class="btn btn-warning float-right editBtn text-white" data-id="<?php echo $row['id_pre_user']; ?>" data-name="<?php echo $row['name']; ?>" data-last="<?php echo $row['last_name']; ?>" data-phone="<?php echo $row['phone']; ?>" data-mail="<?php echo $row['mail']; ?>" data-career="<?php echo $row['carrer']; ?>" data-street="<?php echo $row['heigth_street']; ?>"><i class="fas fa-edit"></i></a>
                                    </td>
                                    <td> <a class="btn btn-danger float-right delete_Btn text-white" data-id_id_pre="<?php echo $row['id_pre_user']; ?>"><i class="fas fa-trash-alt"></i></a></td>

                                </tr>
                            <?php } ?>
                        <?php } ?>
                    </tbody>
                </table>
            </form>
        </div>
    </div>
</main>

<!-- Modal de Editar preinscripto -->
<div id="editModal" class="modal fade" tabindex="-1" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h5 class="modal-title text-white">Editar Preinscriptos</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="color: white;">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <form action="../controllers/crud_edit_controller.php" method="post">
                    <input type="hidden" name="user_id" id="id_pre_user" class="form-control" value="<?php echo $get_user['id_pre_user']; ?>">
                    <div class="form-group">
                        <label for="edit_name">Editar Nombre</label>
                        <input type="text" class="form-control" id="name" name="name" required value="<?php echo $get_user['name']; ?>">
                    </div>
                    <div class="form-group">
                        <label for="edit_last">Editar Apellido</label>
                        <input type="text" class="form-control" id="last" name="last_name" required value="<?php echo $get_user['last_name']; ?>">
                    </div>
                    <div class="form-group">
                        <label for="edit_phone">Editar Teléfono</label>
                        <input type="text" class="form-control" id="phone" name="phone" required value="<?php echo $get_user['phone']; ?>">
                    </div>
                    <div class="form-group">
                        <label for="edit_mail">Editar Email</label>
                        <input type="text" class="form-control" id="mail" name="mail" required value="<?php echo $get_user['mail']; ?>">
                    </div>
                    <div class="form-group">
                        <label for="edit_Career">Editar Carrera</label>
                        <select name="carrer" id="carrer" class="form-control">
                            <?php foreach ($show as $carrer) { ?>
                             <option value="<?php echo $carrer['career_name']; ?>"><?php echo $carrer['career_name']; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="edit_direction">Editar Dirección</label>
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



<!-- Eliminar Carrera -->
<div id="delete_modal" class="modal fade" tabindex="-1" role="dialog">
<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header bg-primary">
            <h5 class="modal-title text-white">Eliminar Carrera</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="color: white";>
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <div class="advertencia">
                <h2>Advertencia</h2>
                <p>¿Seguro que desea eliminar este elemento?</p>
                <form action="../controllers/crud_eliminate_register.php" method="post">
                    <input type="hidden" name="id_pre_user" id="pre_user" value="<?php echo $get_user['id_pre_user']; ?>">
                    <div class="btn-group" role="group" aria-label="Botones de acción">
                        <button type="submit" class="btn btn-outline-danger mr-2" name="delete">Eliminar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</div>


  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
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

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="../js/modal_pre_user.js"></script>
<script src="../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="../dist/js/adminlte.min.js"></script>
				

</body>
</html>
