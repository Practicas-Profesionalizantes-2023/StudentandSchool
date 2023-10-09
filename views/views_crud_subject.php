<?php
require_once '../model/query.php';
require_once '../controllers/crud_views_subject.php';
require_once '../controllers/crud_create_Subject.php';
require_once '../controllers/stop_session.php';
session_start();
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
        <a href="../views/views_crud_admin_careers.php" class="nav-link">Carrera</a>
      </li>

      <li class="nav-item d-none d-sm-inline-block active">
        <a href="#" class="nav-link">Materias</a>
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
            <h1 class="m-0">Gestion de Materias</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Ver Materias</a></li>
              <li class="breadcrumb-item active">gestion de Materias</li>
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
     <h1 style="text-align: center;">Materias de la carrera <?php echo $get_career['career_name']?></h1>
    <br>
    <br>
     <div class="row">
     <div class="col">
      
        <h4>Crud de Materias Primer Año
        
        <a class="btn bg-primary float-right create_subject_Btn text-white"><i class="fas fa-plus-circle fa-lg"></i></a>
        
        </h4>
    </div>

    </div>
    <div class="row py-3">
        <div class="col">
           <table class="table table-border small ">
               <thead>
                <tr class="bg-primary">
                    
                    <th class="text-center">Materia</th>
                    <th class="text-center">Año</th>
                    <th class="text-center">Fecha de Alta</th>
                    <th class="text-center">Carrera</th>
                    <th class="text-center">Detalles</th>
                    <th class="text-center">editar</th>
                    <th class="text-center">eliminar</th>
                    
                </tr>
               </thead>
               <tbody>
               <?php
               foreach ($show as $row) {
                # code...
               
               ?>
              
              <tr>
                
                <td class="align-middle text-center"><?php echo $row['subject_name'] ?></td>
                <td class="align-middle text-center"><?php echo $row['details'] ?></td>
                <td class="align-middle text-center"><?php echo date('d/m/Y', strtotime($row['create_date'])); ?></td>
                <td class="align-middle text-center"><?php echo $row['career_name'] ?></td>
                <td class="align-middle">
                 <div class="text-center">
                  <a href="../views/views_crud_student_subject.php?id=<?php echo $row['id_subjects']; ?>" class="btn btn-info"><i class="fas fa-info-circle"></i></a>
                </div>
               </td>
               <td class="align-middle">
                <div class="text-center">
                  <a class="btn btn-warning subject_edit_Btn text-white" data-id="<?php echo $row['id_subjects']; ?>" data-subject="<?php echo $row['subject_name']; ?>"><i class="fas fa-edit"></i></a>
                </div>
               </td>
               <td class="align-middle">
                <div class="text-center">
                 <a class="btn btn-danger subject_delete_Btn text-white" data-id_subject="<?php echo $row['id_subjects']; ?>"><i class="fas fa-trash-alt"></i></a>
                </div>
               </td>

               
            </tr>
               <?php }?>
               </tbody>
           </table>
        </div>
    </div>

    </main>
    <!-- Main content -->

    <main class="container">
    <br>
    <br>
     <div class="row">
     <div class="col">
      
        <h4>Crud de Materias Segundo Año
        
        
        </h4>
    </div>

    </div>
    <div class="row py-3">
        <div class="col">
           <table class="table table-border small ">
               <thead>
                <tr class="bg-primary">
                    
                    <th class="text-center">Materia</th>
                    <th class="text-center">Año</th>
                    <th class="text-center">Fecha de Alta</th>
                    <th class="text-center">Carrera</th>
                    <th class="text-center">Detalles</th>
                    <th class="text-center">editar</th>
                    <th class="text-center">eliminar</th>
                    
                </tr>
               </thead>
               <tbody>
               <?php
               foreach ($show2 as $row) {
                # code...
               
               ?>
              
              <tr>
                
                <td class="align-middle text-center"><?php echo $row['subject_name'] ?></td>
                <td class="align-middle text-center"><?php echo $row['details'] ?></td>
                <td class="align-middle text-center"><?php echo date('d/m/Y', strtotime($row['create_date'])); ?></td>
                <td class="align-middle text-center"><?php echo $row['career_name'] ?></td>
                <td class="align-middle">
                 <div class="text-center">
                  <a href="../views/views_crud_student_subject.php?id=<?php echo $row['id_subjects']; ?>" class="btn btn-info"><i class="fas fa-info-circle"></i></a>
                </div>
               </td>
               <td class="align-middle">
                <div class="text-center">
                  <a class="btn btn-warning subject_edit_Btn text-white" data-id="<?php echo $row['id_subjects']; ?>" data-subject="<?php echo $row['subject_name']; ?>"><i class="fas fa-edit"></i></a>
                </div>
               </td>
               <td class="align-middle">
                <div class="text-center">
                 <a class="btn btn-danger subject_delete_Btn text-white" data-id_subject="<?php echo $row['id_subjects']; ?>"><i class="fas fa-trash-alt"></i></a>
                </div>
               </td>

               
            </tr>
               <?php }?>
               </tbody>
           </table>
        </div>
    </div>

    </main>

    <main class="container">
    <br>
    <br>
     <div class="row">
     <div class="col">
      
        <h4>Crud de Materias Tercer Año
        
        
        </h4>
    </div>

    </div>
    <div class="row py-3">
        <div class="col">
           <table class="table table-border small ">
               <thead>
                <tr class="bg-primary">
                    
                    <th class="text-center">Materia</th>
                    <th class="text-center">Año</th>
                    <th class="text-center">Fecha de Alta</th>
                    <th class="text-center">Carrera</th>
                    <th class="text-center">Detalles</th>
                    <th class="text-center">editar</th>
                    <th class="text-center">eliminar</th>
                    
                </tr>
               </thead>
               <tbody>
               <?php
               foreach ($show3 as $row) {
                # code...
               
               ?>
              
              <tr>
                
                <td class="align-middle text-center"><?php echo $row['subject_name'] ?></td>
                <td class="align-middle text-center"><?php echo $row['details'] ?></td>
                <td class="align-middle text-center"><?php echo date('d/m/Y', strtotime($row['create_date'])); ?></td>
                <td class="align-middle text-center"><?php echo $row['career_name'] ?></td>
                <td class="align-middle">
                 <div class="text-center">
                  <a href="../views/views_crud_student_subject.php?id=<?php echo $row['id_subjects']; ?>" class="btn btn-info"><i class="fas fa-info-circle"></i></a>
                </div>
               </td>
               <td class="align-middle">
                <div class="text-center">
                  <a class="btn btn-warning subject_edit_Btn text-white" data-id="<?php echo $row['id_subjects']; ?>" data-subject="<?php echo $row['subject_name']; ?>"><i class="fas fa-edit"></i></a>
                </div>
               </td>
               <td class="align-middle">
                <div class="text-center">
                 <a class="btn btn-danger subject_delete_Btn text-white" data-id_subject="<?php echo $row['id_subjects']; ?>"><i class="fas fa-trash-alt"></i></a>
                </div>
               </td>

               
            </tr>
               <?php }?>
               </tbody>
           </table>
        </div>
    </div>

    </main>
   
<!-- Modal para Crear Materias-->
<div id="create_Modal" class="modal fade" tabindex="-1" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h5 class="modal-title text-white" >Dar de alta Materia</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="color: white";>
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="../controllers/crud_create_Subject.php" method="post">
                    <div class="form-group">
                        <label for="career">Seleccione la carrera</label>
                        <select name="career" id="carrer" class="form-control">
                            <?php foreach ($show_state as $show) { ?>
                                <option value="<?php echo $show['id_career']; ?>"><?php echo $show['career_name']; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="subject">Ingrese La Materia</label>
                        <input type="text" placeholder="Ingrese La Materia" name="Subject" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="subject">Ingrese de que año es la Materia</label>
                        <input type="text" placeholder="Ingrese de que año es la materia" name="details" class="form-control" required>
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-outline-primary">Guardar Datos</button>
                        <a href="../views/views_crud_admin_careers.php" class="btn btn-outline-secondary">Regresar a las Carreras</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
    <!-- Fin Modal para Crear Materias -->

    <!-- Modal para Editar Materias -->
    <div id="editModal" class="modal fade" tabindex="-1" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h5 class="modal-title text-white">Editar Materia</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="color: white";>
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="../controllers/crud_edit_subject.php" method="post">
                    <!-- Agrega los campos ocultos para mantener el ID de la materia -->
                    <input type="hidden" name="id_subject" id="id_subject" value="<?php echo $get_subject['id_subjects']; ?>">

                    <!-- Campo de entrada para el nombre de la materia -->
                    <div class="form-group">
                        <label for="name">Materia</label>
                        <input type="text" class="form-control" id="name" name="subject" value="<?php echo $get_subject['subject_name']; ?>">
                    </div>

                    <!-- Botón para actualizar y botón de volver -->
                    <div class="text-center">
                        <button type="submit" class="btn btn-outline-primary">Actualizar Datos</button>
                        <a href="../views/views_crud_admin_careers.php" class="btn btn-outline-secondary">Regresar a las Carreras</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
    <!-- Fin Modal para Editar Materias -->

 <!-- Modal para Eliminar Materias -->
 <div id="deleteModal" class="modal fade" tabindex="-1" role="dialog">
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
                    <form action="../controllers/crud_eliminate_subject.php" method="post">
                        <input type="hidden" name="id_subject" id="id_subject_eliminate" value="<?php echo $get_career['id_career'];?>">
                        <div class="btn-group" role="group" aria-label="Botones de acción">
                            <button type="submit" class="btn btn-outline-danger mr-2" name="delete">Eliminar</button>
                            <a class="btn btn-outline-secondary" href="../views/views_crud_admin_careers.php">Regresar a las Carreras</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!--Fin del modal de eliminar materias-->

    
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <div class="p-3">
        <h5>Institutec</h5>
        <p>Aplicacion web para la gestion institucional de nivel terciario</p>
      </div>
  </aside>
  <!-- /.control-sidebar -->

<!-- ./wrapper -->

  <br>
  <br>
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

<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script src="../js/modal_subject.js"></script>
<script src="../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="../dist/js/adminlte.min.js"></script>



</body>
</html>
