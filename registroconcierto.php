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
                            echo "<h4 id='buttons'>Bienvenid@, <a id='link' href='pub.php'>$user!</a><a class='button' href='logout.php'>Logout</a></h4>";		
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
            <a class="menubutton" href="modificarconcierto.php">Modificar Concierto</a>
        </div>
        </section>
        <div class="beforeForm">
<?php
	//session_start();
	require_once("conection.php");
	if (!isset($_SESSION['id'])) {
    header('Location: index.php');
	} 
	else {
	if(isset($_POST['enviar'])){
		$nombre = $_POST['nombre'];
		$fecha = $_POST ['fecha'];	
		$estado = $_POST['estado'];
		$id_genero=$_POST['id_genero'];
		
		$insert = "insert into Concierto (nombre , fecha, estado, id_genero) values 
		('$nombre','$fecha','$estado','$id_genero')";
		if(mysqli_query($con,$insert)){
			echo "Concierto registrado.";	
		}
		else{
			echo mysqli_error($con);
		}
		}else{
		echo "</br><h2> - REGISTRAR CONCIERTOS -</h2>";
	echo "<div id='form'><form method='post' action='".$_SERVER['PHP_SELF']."'>
			Nombre del concierto:<input type='text' placeholder='Nombre concierto' name='nombre'/><br/>
			Fecha del concierto:<input type='date' name='fecha'/><br/>
			Estado:<input type='radio' name='estado' value='1'>Confirmado</input>
			<input type='radio' name='estado' value='0'>Sin confirmar</input><br/>
			Genero: <select name='id_genero'>";
			$consulta="select*from Genero";		
			$resultado = mysqli_query($con,$consulta);	
			while($fila = mysqli_fetch_array($resultado)){
			extract($fila);
			echo "<option value='$id'>$genero</option>";
			}
			echo "</select><br/></br>
			<input type='submit' name='enviar' value='Registrar Concierto'/></form></div>";	
		}
	}
?>
             <?php  
            // TABLA CONCIETOS CERRADOS
            $query14 = "select c.id as 'idConce', u.nombre as 'Concierto', c.fecha, c.id_genero, g.genero, a.ciudad, u.nombre from Concierto c,
            Genero g, Usuario u, Ciudad a, Inscripcion i where u.id=a.id and u.id=c.id_pub and g.id=c.id_genero and g.genero=$genero
            and c.estado=1 and c.id=i.id_concierto and i.id_grupo= $id and order by c.id_genero";
            $result14 = mysqli_query($con,$query14);
            $fila14 = mysqli_num_rows($result14);
             // Empezamos a dibujar la tabla
             echo "<h2> - CONCIERTOS CERRADOS -</h2>";
            echo "<table id='taula'>";
            // Fila de cabecera
            echo "<tr><th>Id</th>
            <th>Nombre</th>
            <th>Fecha</th>
            <th>Género</th>
            <th>Grupo</th>
            <th>Acción</th></tr>";
            while($fila14 = mysqli_fetch_array($result14)){
            // sacamos las variables de la fila
             extract($fila14);
            // Creamos los datos en html
            echo "<tr><td>$idConce</td>
            <td>$Concierto</td>
            <td>$fecha</td>
            <td>$genero</td>
            <td><a class='menubutton2' href='editar.php?id=$id'>Editar</a></td>
            <td><a class='menubutton2' href='eliminar.php?id=$id'>Eliminar</a></td></tr>";
            }
            echo "</table>"; 
            
            // TABLA CONCIETOS ABIERTOS
             $query15 = "select c.nombre as 'nombreConcierto', g.id, c.fecha from Concierto c, Genero g
                where  c.id_genero = g.id and c.estado=0";
             $result15 = mysqli_query($con,$query15);
             //echo $query;
            $fila15 = mysqli_num_rows($result15);
             // Empezamos a dibujar la tabla
             echo"</br><h2> - CONCIERTOS ABIERTOS -</h2>";
            echo "<table id='taula'>";
            // Fila de cabecera
            echo "<tr><th>Nombre</th>
            <th>Género</th>
            <th>Fecha</th>
            <th>Grupo</th>
            </tr>";
            while($fila15 = mysqli_fetch_array($result15)){
            // sacamos las variables de la fila
             extract($fila15);
            // Creamos los datos en html
            echo "<tr><td>$nombreConcierto</td>
            <td>$genero</td>
            <td>$fecha</td>";
            $query16="select u.nombre as 'gr' from Concierto c, Usuario u where u.id=c.id_grupo and c.id_grupo=$id;";
            $result16=mysqli_query($con, $query16);
            $fila16=mysqli_fetch_array($result16);
            if($fila16){
            	 extract($fila16);
            	echo "<td>$gr</td>";
            }
           echo "<td class='menubutton2' href='aceptar.php?id=$id'>Aceptar</td>
            	<td class='menubutton2' href='declinar.php?id=$id'>Declinar</td>
            	<td class='menubutton2' href='cerrar.php?id=$id'>Cerrar</td>";
            }
            echo "</tr></table>";                     
 ?>
        </div>
 <footer id="pie">
            <span>Template © by musicalsound 2016</span>
        </footer>
    </body>
</html>