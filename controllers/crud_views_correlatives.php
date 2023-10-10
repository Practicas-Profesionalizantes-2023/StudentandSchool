<?php
require_once '../model/query.php';
$database=new model_sql();
$id_subject = $_GET['id'];

$get_subject = $database->getSingle_subject("subjects",$id_subject);//funcion para mostrar la seleccion donde el id coincida

$correlatives=$database->union_correlative_subject($id_subject);



?>