<?php
require_once "../model/query.php";
$database = new model_sql();



    $id_career = $_GET['id'];
  
  //funcion para mostrar los distintas materias segun el año
 $show=$database->show_date_id_career($id_career);
 

 //para seleccionar el id de carrera y poder traerme el nombre de la carrera
 $get_career=$database->getUserCareer($id_career);

