<?php
require_once '../model/query.php';

$database = new model_sql();
$teacherData=$database->show_state("teachers");
require_once "../controllers/crud_insert_teacher.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <title>Document</title>
</head>
<body>
   <!---tabla con nuestros datos--->  
   <main class="container">
    <div class="row">
     <div class="col">
      
        <h4>Crud de Profesores
        
        </h4>
    </div>
    <a href="form_insert_teacher.php" class="btn btn-primary btn-lg create_career_Btn text-white float-right"><i class="fas fa-plus-circle fa-lg"></i></a>
    </div>
    <div class="row py-3">
        <div class="col">
           <table class="table table-border ">
               <thead>
               <tr class="btn-primary">
                    
                    <th>Id Profesor</th>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Telefono</th>
                    <th>Direccion</th>
                    <th>Altura</th>
                    <th>DNI</th>
                    <th>Fecha de Alta</th>
                    <th>ver detalle</th>
                    <th>Editar</th>
                    <th>Eliminar</th>
                    
                </tr>
               </thead>
               <tbody>
               <?php
               foreach ($teacherData as $row) {
                # code...
               
               ?>
               <tr>
                <td> <?php echo $row['id_teacher'] ?></td>
                <td> <?php echo $row['name'] ?></td>
                <td> <?php echo $row['surname'] ?></td>
                <td> <?php echo $row['phone'] ?></td>
                <td> <?php echo $row['direction'] ?></td>
                <td> <?php echo $row['height'] ?></td>
                <td> <?php echo $row['dni'] ?></td>
                <td><?php echo date('d/m/Y ', strtotime($row['fech'])); ?></td>
                <td><a href="dasboard_home_preceptor?id=<?php echo $row['id_teacher'] ?>" class="btn btn-info float-right">ver detalle</a></td>
                <td><a href="form_edit_teachers.php?id=<?php echo $row['id_teacher'] ?>" class="btn btn-warning float-right">Editar Profesor</a></td>
                <td><a href="eliminate_teacher.php?id=<?php echo $row['id_teacher'] ?>" class="btn btn-danger float-right">Eliminar Profesor</a></td>
               </tr>
               </tr>
               <?php }?>
               </tbody>
           </table>
        </div>
    </div>

    </main> 
</body>
</html>
