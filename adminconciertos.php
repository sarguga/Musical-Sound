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
            <a class="menubutton" href="modificargroup.php">Modificar Perfil</a>
        </div>
        </section>
        <div class="beforeTable">
        <?php
        require_once("conection.php");
        if(!isset($_SESSION['id'])){
	 header('Location: index.php');
	}else{
            $id=$_SESSION['id'];
            // TABLA CONCIERTOS CONFIRMADOS
            $query16 = "select c.id_genero, c.nombre as 'concierto', c.fecha, g.genero, u.nombre as 'pub', c.id_pub, a.ciudad
            from Concierto c, Genero g, Usuario u, Ciudad a where a.id=u.ciudad and u.id=c.id_pub and g.id=c.id_genero 
            and c.id_grupo=$id and c.estado=1";
            /*$query16 = "select c.nombre as 'concierto', c.fecha, g.genero, u.nombre as 'pub', a.ciudad from Concierto c, Genero g, Usuario u, Ciudad a where c.id_genero=g.id and c.id_pub=u.id and a.id=u.ciudad and c.id_grupo=$id and c.estado=1";*/
            $result16 = mysqli_query($con,$query16);
            $fila16= mysqli_num_rows($result16);
             // Empezamos a dibujar la tabla
            echo "<h2> - CONCIERTOS CONFIRMADOS -</h2>";
            echo "<table id='taula'>";
            // Fila de cabecera
            echo "<tr><th>Nombre</th>
            <th>Local</th>
            <th>Fecha</th>
            <th>Género</th>
            <th>Ciudad</th></tr>";
            while($fila16 = mysqli_fetch_array($result16)){
            // sacamos las variables de la fila
             extract($fila16);
            // Creamos los datos en html
            echo "<tr><td>$concierto</td>
            <td>$pub</td>
            <td>$fecha</td>
            <td>$genero</td>
            <td>$ciudad</td></tr>";
            }
            echo "</table>";
        }
      
        if(!isset($_SESSION['id'])){
	 header('Location: index.php');
	}else{
            $id=$_SESSION['id'];
            $id_genero = $_SESSION['id_genero'];
            // TABLA CONCIERTOS ABIERTOS (Por Apuntarse)
           $query17 = "select c.nombre as 'nombreConcierto', c.fecha, c.id_genero, g.genero,
           a.ciudad, u.nombre as 'pub' from Concierto c, Genero g, Usuario u, Ciudad a
           where a.id=u.id and u.id=c.id_pub and c.id_genero=g.id and g.genero=$genero and c.estado=0 and c.id
           not in(select id_concierto from Inscripcion where id_grupo=$id)";
            $result17 = mysqli_query($con,$query17);
            $filas17 = mysqli_num_rows($result17);
             // Empezamos a dibujar la tabla
            echo "<h2> - CONCIERTOS DISPONIBLES -</h2>";
            echo "<table id='taula'>";
             /*echo "<tr><th>Top Conciertos!</th></tr>";*/
            // Fila de cabecera
            echo "<tr><th>Nombre</th>
            <th>Local</th>
            <th>Fecha</th>
            <th>Género</th>
            <th>Ciudad</th>
            <th>Acción</th></tr>";
            while($fila17 = mysqli_fetch_array($result17)){
            // sacamos las variables de la fila
             extract($fila17);
            // Creamos los datos en html
            echo "<tr><td>$nombreConcierto</td>
            <td>$pub</td>
            <td>$fecha</td>
            <td>$genero</td>
            <td>$ciudad</td>
            <td><a class='menubutton2' href='apuntarse.php?id=$idconcierto'>Unirse</a></td><td></tr>";
            }
            echo "</table>";
        }
        
        
        if(!isset($_SESSION['id'])){
	 header('Location: index.php');
	}else{
            $id=$_SESSION['id'];
            $user=$_SESSION['user'];
            // TABLA CONCIERTOS CERRADOS (Ya apuntados)
            $query18 = "select distinct c.nombre as 'nombreConcierto', c.fecha, g.genero, u.nombre as 'nombreLocal', a.ciudad, gr.id_genero from
            Concierto c, Genero g, Usuario u, Ciudad a, Grupo gr where g.id = '$id_genero'
            and a.id = u.ciudad and c.estado = 0 and c.id_genero = '$id_genero' and c.id_pub = u.id and c.id_grupo = '$id'";
            $result18 = mysqli_query($con,$query18);
            $fila18 = mysqli_num_rows($result18);
             // Empezamos a dibujar la tabla
            echo "</br><h2> - CONCIERTOS APUNTADOS -</h2>";
            echo "<table id='taula'>";
             /*echo "<tr><th>Top Conciertos!</th></tr>";*/
            // Fila de cabecera
            echo "<tr><th>Nombre</th><th>Local</th><th>Fecha</th><th>Género</th><th>Ciudad</th><th>Acción</th></tr>";
            while($fila18 = mysqli_fetch_array($result18)){
            // sacamos las variables de la fila
             extract($fila18);
            // Creamos los datos en html
            echo "<tr><td>$nombreConcierto</td><td>$nombreLocal</td><td>$fecha</td><td>$genero</td><td>$ciudad</td><td><a  class='menubutton2' href='abandonar.php?id=$id'>Abandonar</a></td><td></tr>";
            }
            echo "</table>";
        }
 ?>
        </div>
        <footer id="pie">
            <span>Template © by musicalsound 2016</span>
        </footer>
    </body>
</html>