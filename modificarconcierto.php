<?php
session_start();
?>
<html>
    <head>
        <title>Musical Sound</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="css/register.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>
        <div id="social">
            <div id="socialbar">
                <nav>
                <a href="http://www.facebook.com"><img src="image/facebook.png" alt=""/></a>
                <a href="http://www.twitter.com"><img src="image/twitter.png" alt=""/></a>
                <a href="http://www.plus.google.com"><img src="image/google.png" alt=""/></a>
                </nav>  
                  <?php
            	require_once('conection.php');
            	   if (isset ($_SESSION['id'])){
                            $user= $_SESSION['user'];
                            echo "<h4 id='buttons'>Bienvenid@, $user!<a class='button' href='logout.php'>Logout</a></h4>";		
                        }else{
                            echo "<div id='buttons'>
                                <div class='contDesplegable'>
                                    <div class='button'>Login</div>
                                    <form method='post' action='validar.php' class='hidDesplegable'>
              				<label for='user'>Usuario</label>
					<input id='user' type='text' placeholder='User' name='user'><br/>
					<label for='user'>Password</label>
					<input id='pass' type='password' placeholder='Password' name='pass'><br/>
					<input type='submit' name='enviar' value='Login'>
                                   </form>
                                </div>
                         <div class='contDesplegable registre'>
                        <div class='button'>Sign Up</div>
                        <form class='hidDesplegable'>
                            <a href='registropub.php'>Pub</a><br>
                            <a href='registrogroup.php'>Grupo</a><br>
                            <a href='registrofan.php'>Fan</a><br>
                        </form>
                    </div> 
                  </div>
            </div>";                 
                }?>
            </div>         
        </div>
         <header>
            <div id="img">
                <div id="myimg">
                    <a href="index.php"><img class="logo" src="image/logo.png" alt=""/></a>
                </div>
            </div>
        </header>
        <section>
        <nav id="menu">
            <a class="menubutton" href="pub.php">Perfil</a>
            <a class="menubutton" href="modificarpub.php">Modificar Perfil</a>
            <a class="menubutton" href="registroconcierto.php">Admin. Conciertos</a>
        </nav>
        </section>
        <div class="beforeForm">
<?php
    //session_start();
    require_once("conection.php");
    if (!isset($_SESSION['id'])) {
        header('Location: index.php');
    } else {
        $id = $_SESSION['id'];
        if (isset($_POST['modificar'])) {
            $nombre = $_POST['nombre'];
            $fecha = $_POST ['fecha'];	
            $estado = $_POST['estado'];
            $id_genero=$_POST['id_genero'];
      
    $update = "update Concierto set nombre='$nombre', fecha='$fecha', estado='$estado', id_genero='$id_genero' 
		where id='$id'";
    if (mysqli_query($con, $update)) {
        echo "Los datos se han modificado correctamente.";
    } else {
        mysqli_error();
    }
    } else {
        $consulta = "select * from Concierto where id=$id";
        $resultado = mysqli_query($con, $consulta);
        $fila = mysqli_fetch_array($resultado);
        extract($fila);
        echo "</br><h2> - MODIFICAR CONCIERTOS -</h2>";
        echo "<div id='form'><form method='post' action = '" . $_SERVER['PHP_SELF'] . "'> 
	Nombre del concierto:<input type='text' name='nombre' value='$nombre'><br/>
	Fecha del concierto:<input type='date' name='fecha' value='$fecha'><br/>";
        if ('$estado' == '1') {
            echo "Estado: <input type='radio' name='estado' value='1' checked>Confirmado
            <input type='radio' name='estado' value='0'>Sin confirmar<br/>";
	} else {
            echo "Estado: <input type='radio' name='estado' value='1'>Confirmado
                <input type='radio' name='estado' value='0' checked>Sin confirmar<br/>";
	}   
	echo "Genero: <select name='id' value='$id'>";
	$consulta="select*from Genero";		
	$resultado = mysqli_query($con,$consulta);	
	while($fila = mysqli_fetch_array($resultado)){
	extract($fila);
	if($id_genero==$id){
	echo "<option value='$id' selected>$genero</option>";
	}else{
	echo "<option value='$id'>$genero</option>";
	}
        }
	echo "</select><br/>
	<input type='submit' name='modificar' value='Modificar'/></form></div>";
    }
}
?>
        </div>
        <footer id="pie">
            <span>Template © by musicalsound 2016</span>
        </footer>
    </body>
</html>