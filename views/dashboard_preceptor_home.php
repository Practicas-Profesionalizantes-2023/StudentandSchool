<?php
session_start();
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
      <li class="nav-item d-none d-sm-inline-block active">
        <a href="#" class="nav-link">Inicio</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="../views/views_crud_admin_careers.php" class="nav-link">Carreras</a>
      </li>

      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="../views/views_teacher.php" class="nav-link">Profesores</a>
      </li>

      <li class="nav-item d-none d-sm-inline-block">
        <a href="../views/views_crud_pre_registered.php" class="nav-link">Preinscriptos</a>
      </li>

      <li class="nav-item d-none d-sm-inline-block">
        <a href="../views/views_students.php" class="nav-link">Alumno</a>
      </li>

      <li class="nav-item d-none d-sm-inline-block">
        <a href="../views/views_internal_users.php" class="nav-link">Usuarios</a>
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
          <input class="form-control form-control-sidebar" id="searchInput" type="search" placeholder="Search" aria-label="Search">
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
              <li class="nav-item d-none d-sm-inline-block text-center">
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
            <h1 class="m-0">Gestion de Control Institucional</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Inicio</a></li>
              <li class="breadcrumb-item active">Panel de control</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
<!-- Main content -->
<div class="content margin">
    <div class="container-fluid">
      <div class="row">
        <!-- Primera fila de tarjetas -->
        <div class="col-lg-6">
          <!-- Tarjeta 1 -->
          <div class="card">
            <div class="card-header bg-primary text-white">
              <h5 class="m-0">Gestionar Carreras</h5>
            </div>
            <div class="card-body">
              <h6 class="card-title">Tenga Control Sobre las Carreras que proporciona institutec</h6>
  
              <p class="card-text">cree,Actualize,Edite y Elimine todo lo relacionado con las carreras y las materias que hay en ella</p>
              <a href="../views/views_crud_admin_careers.php" class="btn btn-outline-primary">Ver Ahora</a>
            </div>
          </div>
        </div>
        
        <!-- Segunda fila de tarjetas -->
        <div class="col-lg-6">
          <!-- Tarjeta 2 -->
          <div class="card card-primary card-outline">
            <div class="card-header bg-primary text-white">
              <h5 class="m-0">Gestionar Profesores</h5>
            </div>
            <div class="card-body">
              <h6 class="card-title">Tenga Control sobre los profesores de institutec</h6>
  
              <p class="card-text">Observe a los profesores, que materia dan, Modifique su informaciòn</p>
              <a href="../views/views_teacher.php" class="btn btn-outline-primary">Ver Ahora</a>
            </div>
          </div>
        </div>
        
        <!-- Tercera fila de tarjetas -->
        <div class="col-lg-6 target-top">
          <!-- Tarjeta 3 -->
          <div class="card">
            <div class="card-header bg-primary text-white">
              <h5 class="m-0">Gestionar Preinscriptos</h5>
            </div>
            <div class="card-body">
              <h6 class="card-title">Oberve las preinscripciones que llegan y los nuevos alumnos que pertenecen a institutec</h6>
  
              <p class="card-text">Modifique los preincriptos y a los alumnos, para poder actualizar,crear, eliminar o editar un registro</p>
              <a href="../views/views_crud_pre_registered.php" class="btn btn-outline-primary">Ver Ahora</a>
            </div>
          </div>
        </div>
        
        <!-- Cuarta fila de tarjetas -->
        <div class="col-lg-6 target-top">
          <!-- Tarjeta 4 -->
          <div class="card">
            <div class="card-header bg-primary text-white text-center">
              <h5 class="m-0">Gestionar Usuario</h5>
            </div>
            <div class="card-body">
              <h6 class="card-title">Genere cuentas para los usuarios de institutec</h6>
  
              <p class="card-text">Vea y Modifque su contenido</p>
              <a href="../views/views_internal_users.php" class="btn btn-outline-primary">Ver Ahora</a>
            </div>
          </div>
        </div>
      
      </div>
      <!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  
  

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
  <footer class="main-footer">
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


<script src="../plugins/jquery/jquery.min.js"></script>
<script src="../dist/js/search_page.js"></script>
<!-- Bootstrap 4 -->
<script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="../dist/js/adminlte.min.js"></script>
</body>
</html>
