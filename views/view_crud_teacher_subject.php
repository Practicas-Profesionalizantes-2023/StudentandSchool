<?php
session_start();

require_once '../model/query.php';
require_once '../controllers/crud_teacher_subject.php';
require_once '../controllers/crud_asignament_teacher.php';
require_once '../controllers/crud_eliminate_asignament.php';
require_once '../controllers/edit_teacher_subject.php';
require_once '../controllers/message_control.php';
//require_once '../controllers/stop_session.php';
//checkSession();

$database = new model_sql();
$careerData = $database->show_state("careers");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <!-- Site CSS -->
    <link rel="stylesheet" href="../css/style.css">
    <!-- ALL VERSION CSS -->
    <link rel="stylesheet" href="../css/versions.css">
    <!-- Responsive CSS -->
    <link rel="stylesheet" href="../css/responsive.css">
    <!-- Custom CSS -->
    <!-- Modernizer for Portfolio -->
    <script src="../js/modernizer.js"></script>
    <title>institutec</title>
</head>

<body class="py-3">

    <header class="top-navbar">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
                <a class="navbar-brand" href="dashboard.html">
                    <img src="images/favicon.ico" alt="" />
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbars-host"
                    aria-controls="navbars-rs-food" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbars-host">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item "><a class="nav-link" href="../views/dasboard_home_preceptor.php">Inicio</a></li>
                        <li class="nav-item dropdown active">
                            <a class="nav-link dropdown-toggle" href="#" id="dropdown-a" data-toggle="dropdown"> Gestionar Carrera</a>
                            <div class="dropdown-menu" aria-labelledby="dropdown-a">
                                <a class="dropdown-item" href="../views/views_crud_admin_careers.php">Carreras</a>
                            </div>
                        </li>
                        <li class="nav-item dropdown ">
                            <a class="nav-link dropdown-toggle" href="#" id="dropdown-a"
                                data-toggle="dropdown"> Gestionar Profesores</a>
                            <div class="dropdown-menu" aria-labelledby="dropdown-a">
                                <a class="dropdown-item" href="../views/views_teacher.php">Ver Profesores</a>
                            </div>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="dropdown-a" data-toggle="dropdown"> Gestionar Alumnos</a>
                            <div class="dropdown-menu" aria-labelledby="dropdown-a">
                                <a class="dropdown-item" href="../views/views_crud_pre_registered.php">Preinscriptos</a>
                                <a class="dropdown-item" href="../views/views_students.php">Inscribir Alumnos</a>
                            </div>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="dropdown-a" data-toggle="dropdown">Gestionar Usuarios</a>
                            <div class="dropdown-menu" aria-labelledby="dropdown-a">
                                <a class="dropdown-item" href="../views/views_internal_users.php">Ver Usuarios</a>
                            </div>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="dropdown-a" data-toggle="dropdown">Configuracion</a>
                            <div class="dropdown-menu" aria-labelledby="dropdown-a">
                                <a class="dropdown-item" href="../controllers/disable_preinscription.php">Desactivar Preinscripción</a>
                                <a class="dropdown-item" href="../controllers/Enable_Preregistration.php">Habilitar Preinscripción</a>
                                <a class="dropdown-item" href="../controllers/destroy_Session.php">Cerrar Session</a>
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
        // ...
        ?>
        <div class="row">
            <div class="col">
                <h4>Crud de de las Materias que da el Profesor <?php echo $get_teacher['name']." ".$get_teacher['surname'] ?></h4>
                    <a href="#" class="btn btn-primary btn-lg create_career_Btn text-white float-right"><i
                            class="fas fa-plus-circle fa-lg"></i></a>
                </h4>
            </div>
        </div>
        <div class="row py-3">
            <div class="col">
                <table class="table table-border table-condensed">
                    <thead>
                        <tr class="btn-primary">
                            <th class="align-middle">Nombre del Profesor</th>
                            <th class="align-middle">Apellido del Profesor</th>
                            <th class="align-middle">Materia que da</th>
                            <th class="align-middle">Carrera</th>
                            <th class="text-center">Editar</th>
                            <th class="text-center">Eliminar</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($show as $row) { ?>
                            <tr>
                                <td class="align-middle"><?php echo $row['teacher_name'] ?></td>
                                <td class="align-middle"><?php echo $row['teacher_surname'] ?></td>
                                <td class="align-middle"><?php echo $row['subject_name'] ?></td>
                                <td class="align-middle"><?php echo $row['name_career'] ?></td>
                                <td><a class="btn btn-warning float-right edit_Btn text-white" data-id="<?php echo $row['id_teacher_subject']; ?>" data-subject="<?php echo $row['subject_name']; ?>"><i class="fas fa-edit"></i></a></td>
                                <td><a class="btn btn-danger float-right teacher_delete_Btn text-white"
                                        data-id_teacher_subject="<?php echo $row['id_teacher_subject']; ?>"><i
                                            class="fas fa-trash-alt"></i></a></td>

                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </main>

    <!-- Modal para Asignar Materias a un Profesor -->
    <div id="create_Modal" class="modal fade" tabindex="-1" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header btn-primary">
                    <h5 class="modal-title text-white">Asignar Materias a un Profesor</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="../controllers/crud_asignament_teacher.php" method="post">
                        <div class="form-group">
                            <label for="teacher" class="text-white">Seleccione un Profesor</label>
                            <select name="teacher" id="select_teacher" class="form-control" required>
                                <?php foreach ($show_teacher as $row) { ?>
                                    <option value="<?php echo $row['id_teacher']; ?>"><?php echo $row['name']; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="subjects" class="text-white">Seleccione las Materias (Mantén presionada la tecla Ctrl para seleccionar varias)</label>
                            <select name="subjects[]" id="select_subject" class="form-control" multiple required>
                                <?php foreach ($show_subject as $row) { ?>
                                    <option value="<?php echo $row['id_subjects']; ?>"><?php echo $row['subject_name']; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="text-center">
                            <a href="../views/views_crud_admin_careers.php" class="btn btn-outline-secondary mr-2">Cerrar</a>
                            <button type="submit" class="btn btn-outline-primary" name="assign">Asignar Materias</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


<!--Modal de Editar Profesor Materia-->
<div id="editModal" class="modal fade" tabindex="-1" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header btn-primary">
                <h5 class="modal-title text-white">Actualizar datos del Profesor y la Materia</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="color: white";>
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
           
            <div class="modal-body">
                <form action="../controllers/edit_teacher_subject.php" method="post">
                    <input type="hidden" name="id_teacher_subject" id="id_teacher_subject" class="form-control" value="<?php $get['id_teacher_subject'] ?>">
                    <div class="form-group">
                        <label for="title_edit">Modifique la Materia del profesor</label>
                        <select name="subjects" id="id_subject"  class="form-control"  required>
                         <?php foreach ($show_subject as $row) { ?>
                                    <option value="<?php echo $row['id_subjects']; ?>"><?php echo $row['subject_name']; ?></option>
                                <?php } ?>
                            </select>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Cerrar</button>
                        <button type="submit" class="btn btn-outline-primary" name="keep">Actualizar Datos</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


    <!-- Modal para Eliminar Profesor -->
    <div id="delete_career_modal" class="modal fade" tabindex="-1" role="dialog">
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
                        <form action="../controllers/crud_eliminate_asignament.php" method="post">
                            <input type="hidden" name="teacher_subject" id="id_teacher_eliminate"
                                value="<?php echo $get['id_teacher_subject']; ?>">
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
    <script src="../js/modal_teacher_subject.js"></script>
    <script src="../js/all.js"></script>

</body>

</html>
