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
        <h4>Editar Carrera </h4>
       </div>
      </div>
      <div class="row">
     
           <div class="col">
                <form class="row g-3" method="POST" action="../controllers/crud_keep_careers.php" autocomplete="off">
                <div class="col-md-4">
                    <label for="careers" class="form-label">carreras</label>
                    <input type="text" name="careers" id="careers" class="form-control" required autofocus>
                </div>
                <div class="col-md-4">
                    <label for="title" class="form-label">titulo</label>
                    <input type="text" name="title" id="title" class="form-control" required >
                </div>
                <div class="col-md-8">
                    <label for="amoun_subjects" class="form-label">Cantidad de materias</label>
                    <input type="text" name="amoun_subjects" id="amoun_subjects" class="form-control" required >
                </div>
                <div class="col-md-8">
                    <label for="book" class="form-label">Cantidad de libros</label>
                    <input type="text" name="book" id="book" class="form-control" required >
                </div>
               
                <div class="col-md-8">
                  <a class="btn btn-secondary" href="views_crud_admin_careers.php">Regresar</a>
                  <button type="submit" class="btn btn-primary" name="keep">Guardar</button>
                </div>

                </form>
            </div>
      </div>
      </main>
</body>
</html>