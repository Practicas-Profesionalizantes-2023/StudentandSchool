<?php
require_once '../model/query.php';

$database = new model_sql();
$union_Student=$database->union_Student_gender_career("estudents");
require_once "../controllers/crud_insert_student.php";

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

    </main> 
</body>
</html>
