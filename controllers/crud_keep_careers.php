<?php

require_once '../model/query.php';

$database = new model_sql();


    $carers = $_POST['careers'];
    $title = $_POST['title'];
    $amount_subjects=$_POST['amoun_subjects'];
    $book=$_POST['book'];
    $keep=$_POST['keep'];
    if (isset($keep)) {
        $insert=$database->insertCareer($carers, $title, $amount_subjects, $book);
        if($insert){
            echo "se insertaron los datos correctamente";
            
        }
    }
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <title>Document</title>
</head>
<body>
<a class="btn btn-secondary" href="../views/views_crud_admin_careers.php">Regresar</a>
</body>
</html>