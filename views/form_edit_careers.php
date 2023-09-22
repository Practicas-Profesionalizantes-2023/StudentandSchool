<?php
require_once '../controllers/crud_edit_careers.php';

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
        <h4>Edite la Carrera </h4>
       </div>
      </div>
      <div class="row">
     
           <div class="col">
                <form class="row g-3" method="POST" action="../controllers/crud_edit_careers.php" autocomplete="off">
                <div class="col-md-0">
                    
                    <input type="hidden" name="id_career" id="id_career" class="form-control" 
                    value="<?php echo $get_career['id_career'];?>" required autofocus>
                </div>
                
                <div class="col-md-4">
                    <label for="career" class="form-label" > Edite Carrera: </label>
                    <input type="text" name="career" id="career" class="form-control" 
                    value="<?php echo $get_career['career_name'];?>" required autofocus>
                </div>
                <div class="col-md-4">
                    <label for="title" class="form-label">Edite Titulo:</label>
                    <input type="text" name="title" id="title" class="form-control"
                     value="<?php echo $get_career['title'];?>"required >
                </div>
                <div class="col-md-8">
                    <label for="subjects" class="form-label">Edite Cantidad de Materias:</label>
                    <input type="text" name="subjects" id="subjects" class="form-control"
                    value="<?php echo $get_career['amount_subjects'];?>" required >
                </div> 
               
                <div class="col-md-12">
                  <a class="btn btn-secondary" href="views_crud_admin_careers.php">Regresar</a>
                  <button type="submit" class="btn btn-primary" >Guardar</button>
                </div>
        
                </form>
            </div>
      </div>
      </main>
</body>
</html>