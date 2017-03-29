<?php
    session_start();
    if(isset($_SESSION['error'])){
	echo $_SESSION['error'];
    }	
	//$con = mysqli_connect("localhost", "rwoerptg_fosa", "stucom8","rwoerptg_musicalsound")
          $con = mysqli_connect("localhost", "sarguga", "","ms")
		or die("No se ha podido conectar con la base de datos.");
			session_destroy();
			header("Location: index.php");
?>