<?php
require_once '../model/query.php';

$database = new model_sql();
$careerData=$database->show_state("careers");

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <title>Document</title>
</head>
<body class="py-3">
    <main class="container">
     
    <div class="row">
     <div class="col">
        <h4>Crud de Carreras
        <div class="text-center">
    <a href="create_careers.php" class="btn btn-primary">Crear carrera</a>
        </div>
       <!--<a href="create_careers.php" class="btn btn-primary float-right">Crear carrera</a>-->

       </h4>
        
        
        
     </div>

    </div>
    <div class="row py-3">
        <div class="col">
           <table class="table table-border">
               <thead>
                <tr>
                    
                    <th>id Carrera</th>
                    <th>Carrera</th>
                    <th>Titulo</th>
                    <th>materias</th>
                    <th>fecha de creacion</th>
                    <th>estados</th>
                    <th>libros</th>
                    <th>editar</th>
                    <th>eliminar</th>
                    
                </tr>
               </thead>
               <tbody>
               <?php
               foreach ($careerData as $row) {
                # code...
               
               ?>
               <tr>
                <td> <?php echo $row['id_career'] ?></td>
                <td> <?php echo $row['career_name'] ?></td>
                <td> <?php echo $row['title'] ?></td>
                <td> <?php echo $row['amount_subjects'] ?></td>
                <td> <?php echo $row['date_high'] ?></td>
                <td> <?php echo $row['state'] ?></td>
                <td> <?php echo $row['fk_book_career_id'] ?></td>
                <td><a href="form_edit_careers.php?id=<?php echo $row['id_career'] ?>" class="btn btn-warning float-right">Editar carrera</a></td>
                <td><a href="views_delete_careers.php?id=<?php echo $row['id_career'] ?>" class="btn btn-danger float-right">Eliminar carrera</a></td>
               </tr>
               <?php }?>
               </tbody>
           </table>
        </div>
    </div>

    </main>
</body>
</html>