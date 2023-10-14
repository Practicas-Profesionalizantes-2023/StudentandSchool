<?php
session_start();

require_once '../model/query.php';
require_once '../controllers/crud_edit_careers.php';
require_once '../controllers/message_control.php';
require_once '../controllers/stop_session.php';
checkSession();

$database = new model_sql();
$careerData = $database->show_state("careers");
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
                    <a href="#" class="nav-link">Carreras</a>
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
         <?php show_messages_verify('desabilitado', "se desabilito correctamente la preinscripcion");
         show_messages_error('ya_desabilitado', "ya esta  desabilitada la preinscripcion");
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
                            <h1 class="m-0">Gestion de Carreras</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Ver Carreras</a></li>
                                <li class="breadcrumb-item active">gestion de Carreras</li>
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
                <?php show_messages_verify('inserto', "la carrera se creo correctamente");
                show_messages_verify('modifico', "la Carrera se actualizo correctamente");
                show_messages_verify('correcto', "se Modifico Correctamente la Materia");
                show_messages_verify('borrado', "se Elimino correctamente la Carrera");
                show_messages_verify('eliminar_materia', "se Elimino correctamente la Materia");
                show_messages_verify('creo', "La Materia se Creo Correctamente");
                show_messages_verify('insertado', "se creo el registro correctamente");
                show_messages_verify('editado', "se edito el registro correctamente");
                show_messages_verify('eliminate_subject', "se borro registro correctamente");
                ?>
                <div class="row">
                    <div class="col">
                        <h4>Crud de Carreras
                            <a href="#" class="btn btn-primary btn-lg create_career_Btn text-white float-right"><i class="fas fa-plus-circle fa-lg"></i></a>
                        </h4>
                    </div>
                </div>
                <div class="row py-3">
                    <div class="col">
                        <table class="table table-border small" id="myTable">
                            <thead>
                                <tr class="bg-primary">
                                    <th class="text-center long-letter">Nombre de la Carrera</th>
                                    <th class="text-center long-letter">Título</th>
                                    <th class="text-center long-letter">Cantidad de Materias</th>
                                    <th class="text-center">Detalles</th>
                                    <th class="text-center">Editar</th>
                                    <th class="text-center">Eliminar</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                foreach ($careerData as $row) { ?>
                                    <tr>
                                        <td class="text-center align-middle"><?php echo $row['career_name'] ?></td>
                                        <td class="text-center align-middle"><?php echo $row['title'] ?></td>
                                        <td class="text-center  align-middle"><?php echo $row['amount_subjects'] ?></td>
                                        <td><a href="../views/views_crud_subject.php?id=<?php echo $row['id_career'] ?>" class="btn btn-info float-right"><i class="fas fa-info-circle"></i></a></td>
                                        <td><a class="btn btn-warning float-right editBtn text-white" data-id="<?php echo $row['id_career']; ?>" data-career="<?php echo $row['career_name']; ?>" data-title="<?php echo $row['title']; ?>" data-subjects="<?php echo $row['amount_subjects']; ?>"><i class="fas fa-edit"></i></a></td>
                                        <td> <a class="btn btn-danger float-right career_delete_Btn text-white" data-id_career="<?php echo $row['id_career']; ?>"><i class="fas fa-trash-alt"></i></a></td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                        <div id="pagination" class="text-center">
                        <button id="previous" class="btn-outline-primary">Anterior</button>
                        <span id="page">Pagina 1</span>
                         <button id="next" class="btn-outline-primary">Siguiente</button>
                       </div>
                    </div>
                </div>
            </main>
            <!-- Main content -->

            <!-- Modal para Crear Carreras-->
            <div id="create_Modal" class="modal fade" tabindex="-1" role="dialog">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header bg-primary">
                            <h5 class="modal-title text-white">Dar de Alta Una Carrera</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="color: white";>
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="../controllers/crud_keep_careers.php" method="post">
                                <div class="form-group">
                                    <label for="subject">Ingrese La Carrera</label>
                                    <input type="text" placeholder="Ingrese La Carrera" name="careers" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label for="subject">Ingrese el titulo de la Carrera</label>
                                    <input type="text" placeholder="Ingrese el titulo" name="title" class="form-control" required>
                                </div>
                                
                                <div class="form-group">
                                   <label for="subject">Ingrese La cantidad de materias </label>
                                   <input type="number" placeholder="Ingrese la cantidad de la materia" name="amoun_subjects" class="form-control" required min="1" max="26">
                                </div>
                                <div class="text-center">
                                    <a href="../views/views_crud_admin_careers.php" class="btn btn-outline-secondary mr-2">Cerrar</a>
                                    <button type="submit" class="btn btn-outline-primary" name="keep">Guardar Datos</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Fin Modal para Crear Carreras -->

            <!-- Modal para Editar Carreras -->
            <div id="editModal" class="modal fade" tabindex="-1" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header btn-primary">
                <h5 class="modal-title text-white">Editar Carrera</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="color: white";>
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
           
            <div class="modal-body">
                <form action="../controllers/crud_edit_careers.php" method="post">
                    <input type="hidden" name="id_career" id="id_career_edit" class="form-control" value="">
                    <div class="form-group">
                        <label for="career_edit">Nombre de la Carrera</label>
                        <input type="text" class="form-control" id="career_edit" name="career" required>
                    </div>
                    <div class="form-group">
                        <label for="title_edit">Título</label>
                        <input type="text" class="form-control" id="title_edit" name="title" required>
                    </div>
                    <div class="form-group">
                        <label for="subjects_edit">Cantidad de Materias</label>
                        <input type="number" class="form-control" id="subjects_edit" name="subjects" required min="1" max="26">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Cerrar</button>
                        <button type="submit" class="btn btn-outline-primary" name="keep">Guardar Cambios</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
            <!-- Fin Modal para Editar Carreras-->

            <!-- Modal para Eliminar Carreras -->
            <div id="delete_career_modal" class="modal fade" tabindex="-1" role="dialog">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header btn-primary">
                            <h5 class="modal-title text-white">Eliminar Carrera</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="color: white";>
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="advertencia">
                                <h2>Advertencia</h2>
                                <p>¿Seguro que desea eliminar este elemento?</p>
                                <form action="../controllers/delete_careers.php" method="post">
                                    <input type="hidden" name="id_career" id="id_career_eliminate" value="<?php echo $get_career['id_career']; ?>">
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
    <script src="../js/modal_career.js"></script>
    <script src="../js/page_table.js"></script>
    <script src="../plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="../dist/js/adminlte.min.js"></script>

</body>

</html>
