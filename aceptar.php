<?php
session_start();
require_once('conection.php');

if(!isset($_SESSION['id'])){    
echo "El usuario no ha iniciado la sesión.";    
// header('Location: index.php');    
}else{$id_concierto = $_GET['id'];
$query4 = "insert into Inscripcion (id_concierto,id_grupo) values ($id_concierto,$id_grupo);";
echo $query4;$result4 = mysqli_query($con, $query4);				
if($result4){    
echo " Te has unido correctamente.";
}else {    
echo "No te has podido unir a dicho concierto.";
}			
}

?>