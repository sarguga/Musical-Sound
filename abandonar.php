<?php
session_start();
require_once('conection.php');

if(!isset($_SESSION['id'])){
    echo "no ta";
    // header('Location: index.php');
}else{
$id_grupo = $_SESSION['id'];
$id_concierto = $_GET['id'];
$query = "update Inscripcion set (id_grupo, id_concierto, estado_inscripcion) values($id_grupo, $id_concierto, 0)";
echo $query;
$result = mysqli_query($con, $query);
				
if($result){
    echo " Te has unido correctamente.";
   // header("Refresh: 2; url = adminconciertos.php");
}else {
    echo "No te has podido unir al concierto indicado.";
}			
}
?>