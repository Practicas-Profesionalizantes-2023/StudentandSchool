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
      <li class="nav-item d-none d-sm-inline-block  active">
        <a href="#" class="nav-link">Usuarios</a>
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
          <!-- Add icons to the links using the .nav-icon class with font-awesome or any other icon font library -->
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
            <h1 class="m-0">Gestion de Usuarios</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Ver Usuario</a></li>
              <li class="breadcrumb-item active">gestion de usuarios</li>
            </ol>
          </div>
        </div>
      </div>
    </div>
    <!-- /.content-header -->
    <!-- Main content -->
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
          show_messages_error('dni_email', "Ya existe el dni o el email");

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
            <table id="table-body" class="table table-border small">
              <thead class="bg-primary">
                <tr>
                  <th class="text-center">Nombre</th>
                  <th class="text-center">DNI</th>
                  <th class="text-center">Email</th>
                  <th class="text-center">Tipo de Rol</th>
                  <th class="text-center">Estado</th>
                  <th class="text-center">Desabilitar Cuenta</th>
                  <th class="text-center">Habilitar Cuenta</th>
                  <th class="text-center">Eliminar</th>
                </tr>
              </thead>
              <tbody>
                <?php if (isset($searchResults)) { ?>
                  <?php foreach($searchResults as $row) { ?>
                    <tr>
                      <td class="align-middle text-center"><?php echo $row['name'] ?></td>
                      <td class="align-middle text-center"><?php echo $row['dni'] ?></td>
                      <td class="align-middle text-center"><?php echo $row['mail'] ?></td>
                      <td class="align-middle text-center"><?php echo $row['details'] ?></td>
                      <td class="align-middle text-center"><?php echo ($row['state'] == 1) ? 'Activo' : 'Inactivo'; ?></td>
                      <td class="text-center text-center">
                        <button class="btn btn-danger" name="desability" value="<?php echo $row['id_user'] ?>">
                          <i class="fas fa-ban"></i>
                        </button>
                      </td>
                      <td class="text-center">
                        <button class="btn btn-primary" name="hability" value="<?php echo $row['id_user'] ?>">
                          <i class="fas fa-check"></i>
                        </button>
                      </td>
                      <td class="text-center">
                        <a class="btn btn-warning float-right user_delete_Btn text-white " data-id_user="<?php echo $row['id_user']; ?>">
                          <i class="fas fa-trash-alt"></i>
                        </a>
                      </td>
                    </tr>
                  <?php } ?>
                <?php } else { ?>
                  <?php foreach ($union as $row) { ?>
                    <tr>
                      <td class="align-middle text-center"><?php echo $row['name'] ?></td>
                      <td class="align-middle text-center"><?php echo $row['dni'] ?></td>
                      <td class="align-middle text-center"><?php echo $row['mail'] ?></td>
                      <td class="align-middle text-center"><?php echo $row['details'] ?></td>
                      <td class="align-middle text-center"><?php echo ($row['state'] == 1) ? 'Activo' : 'Inactivo'; ?></td>
                      <td class="text-center align-middle">
                        <button class="btn btn-danger" name="desability" value="<?php echo $row['id_user'] ?>">
                          <i class="fas fa-ban"></i>
                        </button>
                      </td>
                      <td class="text-center">
                        <button class="btn btn-primary" name="hability" value="<?php echo $row['id_user'] ?>">
                          <i class="fas fa-check"></i>
                        </button>
                      </td>
                      <td class="text-center">
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
          <div id="pagination" class="text-center">
           <button id="previous" class="btn-outline-primary">Anterior</button>
            <span id="page">Pagina 1</span>
            <button id="next" class="btn-outline-primary">Siguiente</button>
          </div>
        </div>
        </div>
      </div>
    </main>
    <!-- Modal para Crear nuevo usuario -->
    <div id="create_Modal" class="modal fade" tabindex="-1" role="dialog">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header bg-primary">
            <h5 class="modal-title text-white">Dar de Alta a un Usuario</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="color: white";>
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
                <input type="number" placeholder="Ingrese el dni" name="dni" class="form-control"  required pattern="^\d{8}$" title="Debe contener exactamente 8 dígitos">
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
          <div class="modal-header bg-primary">
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
  </main>
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
<script src="../js/modal_internal_user.js"></script>
<script src="../js/page_table.js"></script>
<script src="../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="../dist/js/adminlte.min.js"></script>
<!-- Agrega este código JavaScript al final de tu archivo -->

</body>
</html>
