<?php
require_once "../model/query.php";
$database = new model_sql();



    $id_career = $_GET['id'];
  
  
 $show=$database->show_date_id_career($id_career);

 $get_career=$database->getUserCareer($id_career);

