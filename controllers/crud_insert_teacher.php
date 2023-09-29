<?php

require_once '../model/query.php';

$database = new model_sql();

$gender_data=$database->show_table("genders");
    $name = $_POST['name'];
    $surname = $_POST['surname'];
    $phone=$_POST['phone'];
    $email=$_POST['email'];
    $direction=$_POST['direction'];
    $height=$_POST['height'];
    $dni=$_POST['dni'];
    $fk_gender_id=$_POST['fk_gender_id'];
    $keep=$_POST['submit'];

    if (isset($keep)) {
        $insert=$database->insertTeacher($name, $surname, $phone, $email,$direction,$height,$dni,$fk_gender_id);
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
<a class="btn btn-secondary" href="../views/views_teacher.php">Regresar</a>
</body>
</html>