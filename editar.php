<?php
session_start();
require_once('conection.php');

if(!isset($_SESSION['id'])){
    echo "El usuario no ha iniciado la sesión.";
    // header('Location: index.php');    
}else{
$id_concierto = $_GET['id'];
$query = "update Concierto set estado=0";
echo $query;
$result = mysqli_query($con, $query);
				
if($result){
    echo " Se ha editado el concierto correctamente.";
}else {
    echo "No tse ha podido editar dicho concierto.";
}			
}
?>
