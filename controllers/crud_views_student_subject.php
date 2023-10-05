<?php
require_once '../model/query.php';
$database=new model_sql();
$id_subject = $_GET['id'];


$union=$database->union_Student_subject($id_subject);

$get_subject=$database->getUserCareer($id_subject);

?>