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
                <div id="buttons">
			<div class="contDesplegable">
                            <div class="button">Login</div>
				<?php
				//Iniciamos sesion
				//session_start();
            			require_once("conection.php");
              			echo "<form method='post' action='validar.php' class='hidDesplegable'>
              				<label for='user'>Usuario</label>
					<input id='user' type='text' placeholder='User' name='user'><br/>
					<label for='user'>Password</label>
					<input id='pass' type='password' placeholder='Password' name='pass'><br/>
					<input type='submit' name='enviar' value='Login'>
                                   </form>
                    </div>";
					?>
                    <div class="contDesplegable registre">
                        <div class="button">Sign Up</div>
                        <form class="hidDesplegable">
                            <a href="registropub.php">Pub</a><br>
                            <a href="registrogroup.php">Grupo</a><br>
                            <a href="registrofan.php">Fan</a><br>
                        </form>
                    </div> 
                  </div>
            </div>
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
            <a class="menubutton" href="registrogroup.php">GRUPOS</a>
            <a class="menubutton" href="registropub.php">LOCALES</a>
            <a class="menubutton" href="registrofan.php">FANS</a>
        </nav>
        </section>
        <div class="beforeForm">
	<?php
	require_once("conection.php");
	if(isset($_POST['enviar'])){
		$user = $_POST['user'];
		$pass =	$_POST ['pass'];	
		$pass = crypt($pass, "asd");
		$nombre=$_POST['nombre'];
		$aforo=$_POST['aforo'];
		$direccion=$_POST['direccion'];
		$email=$_POST['email'];
		$telefono=$_POST['telefono'];
		$ciudad = $_POST['ciudad'];
		
		$insert = "insert into Usuario (user , pass, nombre, email, telefono, tipo_usu, ciudad) values 
		('$user', '$pass', '$nombre', '$email', '$telefono', 1, '$ciudad')";
		if(mysqli_query($con,$insert)){
			echo "Usuario Registrado";
			$id=mysqli_insert_id($con);
			$sql="insert into Pub(id_pub, aforo, direccion) values ('$id', '$aforo', '$direccion')";
			if(mysqli_query($con,$sql)){
				echo ".";
			}
		}
		else{
			echo mysqli_error($con);
		}
		
	}else{
	echo "<div id='form'><form method='post' action='".$_SERVER['PHP_SELF']."'>
			User:<input type='text' placeholder='User' name='user'/><br/>
			Password:<input type='password' placeholder='Password' name='pass'><br/>
			Nombre:<input type='text' placeholder='Nombre' name='nombre'/><br/>
			Aforo:<input type='num' placeholder='Aforo' name='aforo'/><br/>
			Direccion del Pub:<input type='text' placeholder='Dirección' name='direccion'/><br/>
			Email:<input type='email' placeholder='E-mail' name='email'/><br/>
			Telefono:<input type='text' placeholder='Teléfono' name='telefono'/><br/>
			Ciudad: <select name='ciudad'>";
			$consulta="select*from Ciudad";		
			$resultado = mysqli_query($con,$consulta);	
			while($fila = mysqli_fetch_array($resultado)){
			extract($fila);
			echo "<option value='$id'>$ciudad</option>";
		}			
			echo "</select><br/>
			<input type='submit' name='enviar' value='Registrarse'/></form></div>";	
	
	}			
?>
        </div>
         <footer id="pie">
        <span>Template © by musicalsound 2016</span>
        </footer>
    </body>
</html>