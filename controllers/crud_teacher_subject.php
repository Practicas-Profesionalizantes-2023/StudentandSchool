<?php
require_once "../model/query.php";
$database = new model_sql();



    $id_teacher = $_GET['id'];
   
  
 $show=$database->show_date_id_teacher($id_teacher);

 $get_teacher=$database-> getUserTeacher($id_teacher);

