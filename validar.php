<?php
	// Iniciamos sesión
	session_start();
	require_once("conection.php");
	$user = $_POST['user'];
	$pass = $_POST['pass'];
	$pass = crypt($pass, "asd");

	$consulta = "select * from Usuario where user='$user' and pass='$pass'";
	$resultado = mysqli_query($con, $consulta);
	// Número de filas del resultado
	$num_fila = mysqli_num_rows($resultado);
	if ($num_fila==0){
		echo "Nombre de usuario o contraseña incorrectos.";
	} else {
		$fila = mysqli_fetch_array($resultado);
		extract($fila);
		$_SESSION['id'] = $id;
		$_SESSION['user'] = $user;
                
		// tipo 1 es pub, tipo 2 group, tipo 3 fan
		if ($tipo_usu == 1) {
			header('Location: pub.php');
		} else if ($tipo_usu==2) {
                    $consulta = "select * from Grupo where id_grupo = '$id'";
                    $resultado = mysqli_query($con, $consulta);
                    $num_fila = mysqli_num_rows($resultado);
                    $fila = mysqli_fetch_array($resultado);
                    extract($fila);
                    $_SESSION['id_genero'] = $id_genero;
                        header('Location: group.php');
		} else if ($tipo_usu==3) {
                        header('Location: fan.php');
                }
	}
	
?>
