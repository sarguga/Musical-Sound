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
                            echo "<h4 id='buttons'>Bienvenid@, <a id='link' href='group.php'>$user!</a><a class='button' href='logout.php'>Logout</a></h4>";		
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
            <a class="menubutton" href="index.php">Inicio</a>
            <a class="menubutton" href="group.php">Perfil</a>
            <a class="menubutton" href="adminconciertos.php">Admin. Conciertos</a>
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
       $user = $_POST['user'];
		$nombre=$_POST['nombre'];
		$num_integrantes=$_POST['num_integrantes'];
		$email=$_POST['email'];
		$telefono=$_POST['telefono'];
		$ciudad = $_POST['ciudad'];
		$id_genero = $_POST['id_genero'];
        // comprobamos si ha modificado el password
        if (isset($_POST['pass']) && $_POST['pass'] != "") {
            $pass = $_POST['pass'];
            $pass = crypt($pass, "asd");
            $update = "update Usuario set user='$user', 
			nombre='$nombre', email='$email', telefono='$telefono',
			ciudad='$ciudad', pass='$pass' where 
			id='$id'";
            if (mysqli_query($con, $update)) {
                echo "Los datos se han modificado correctamente";
            } else {
                mysqli_error();
            }
        } else { // No ha modificado el password;
            $update = "update Usuario set user='$user', 
			nombre='$nombre',  email='$email', 
			telefono='$telefono', ciudad='$ciudad' where id='$id'";
            if (mysqli_query($con, $update)) {
                echo "Los datos se han modificado correctamente";
            } else {
                mysqli_error();
            }
        }
        $update = "update Grupo set num_integrantes='$num_integrantes', id_genero='$id_genero'
			where id_grupo='$id'";
        if (mysqli_query($con, $update)) {
            echo ".";
        } else {
            mysqli_error();
        }
    } else {
        $consulta = "select * from Usuario join Grupo on id=id_grupo where id=$id";
        $resultado = mysqli_query($con, $consulta);
        $fila = mysqli_fetch_array($resultado);
        extract($fila);
         echo "</br><h2> - MODIFICAR PERFIL -</h2>";
       echo "<div id='form'><form method='post' action='".$_SERVER['PHP_SELF']."'>
			User:<input type='text' name='user' value='$user'><br/>
			Password:<input type='password' name='pass'><br/>
			Nombre:<input type='text' name='nombre' value='$nombre'><br/>
			Integrantes:<input type='text' name='num_integrantes' value='$num_integrantes'><br/>
			Email:<input type='email' name='email' value='$email'><br/>
			Telefono:<input type='text' name='telefono' value='$telefono'><br/>
			Ciudad: <select name='ciudad' value='$ciudad'>";
			$consulta = "select * from Ciudad";
			$resultado = mysqli_query($con, $consulta);
			while ($fila = mysqli_fetch_array($resultado)) {
            extract($fila);
            if ($ciudad == $id) {
                echo "<option value='$id' selected>$nombre</option>";
            } else {
                echo "<option value='$id'>$ciudad</option>";
            }
        }
        echo "</select> <br/>
			Genero: <select name='id_genero' value='$id_genero'>";
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



